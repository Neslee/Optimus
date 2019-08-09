<?php

namespace Drupal\gsh_dialog_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;

/**
 * Class PropertyCommunityPopupDialogController.
 */
class PropertyCommunityPopupDialogController extends ControllerBase {

  /**
   * Function Content.
   */
  public function content($id) {
    $node_data = \Drupal::entityTypeManager()->getStorage('node')->load($id);
    $res['node_id'] = $id;
    $res['property_title'] = $node_data->getTitle();
    if ($node_data->field_price->value) {
      if ($node_data->field_price->value > 0) {
        $res['property_price'] = number_format($node_data->field_price->value);
      }
    }
    if ($node_data->field_lot_number->value) {
      $res['property_lot_number'] = $node_data->field_lot_number->value;
    }
    if ($node_data->field_square_feet->value) {
      $res['property_sqft'] = number_format($node_data->field_square_feet->value);
    }
    if ($node_data->field_bedrooms->value) {
      $res['property_bed'] = $node_data->field_bedrooms->value;
    }
    if ($node_data->field_full_baths->value) {
      $res['property_bath'] = $node_data->field_full_baths->value;
    }
    if ($node_data->field_garages->value) {
      $res['property_cars'] = $node_data->field_garages->value;
    }
    if ($node_data->field_floors->value) {
      $res['property_floors'] = $node_data->field_floors->value;
    }
    if ($node_data->field_address->value) {
      $res['address'] = $node_data->field_address->value;
    }
    if ($node_data->field_city->value) {
      $res['city'] = $node_data->field_city->value;
    }
    if ($node_data->field_state->value) {
      $res['state'] = $node_data->field_state->value;
    }
    if ($node_data->field_zip_code->value) {
      $res['zip_code'] = $node_data->field_zip_code->value;
    }
    if ($node_data->field_downloadable_brochure->target_id) {
      foreach ($node_data->field_downloadable_brochure as $item) {
        if ($item->entity) {
          $res['property_brochure'] = $item->entity->url();
        }
      }
    }
    if ($node_data->field_community[0]) {
      $tags = $node_data->field_community[0]->getValue();
      $tid = $tags['target_id'];
      $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
      if ($term->field_gallery_images->target_id) {
        $gallery_images_count = 0;
        foreach ($term->get('field_gallery_images') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = $file->getFileUri();
            $gallery_image[] = file_url_transform_relative(file_create_url($image_uri));
          }
          $res['gallery_image'] = $gallery_image;
          $gallery_images_count++;
        }
        $res['gallery_images_count'] = $gallery_images_count;
      }
      if ($term->field_community_video->value) {
        $community_video = $term->field_community_video->value;
        if (!empty($community_video)) {
          $res['community_video_count'] = 1;
          $vimeo = $community_video;
          if (preg_match("/(https?:\/\/)?(www\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo, $output_array)) {
            $res['community_video'] = 'https://player.vimeo.com/video/' . $output_array[4];
          }
          else {
            $link = $community_video;
            $video_id = explode("?v=", $link);
            $res['community_video'] = 'https://www.youtube.com/embed/' . $video_id[1];
          }
        }
      }
      if ($term->field_latitude->value || ($term->field_longitude->value)) {
        $res['location_count'] = 1;
        if ($term->field_latitude->value) {
          $res['latitude'] = $term->field_latitude->value;
        }
        if ($term->field_longitude->value) {
          $res['longitude'] = $term->field_longitude->value;
        }
      }
    }
    if ($res['gallery_images_count'] >= 1) {
      $popup_count_data['marketing_images_count'] = $res['gallery_images_count'];
    }
    if ($res['community_video_count'] >= 1) {
      $popup_count_data['video_count'] = $res['community_video_count'];
    }
    if ($res['location_count'] >= 1) {
      $popup_count_data['location_count'] = $res['location_count'];
    }
    return [
      '#title' => 'Properties Community Popup',
      '#theme' => 'property-community-dialog-data',
      '#node' => $res,
      '#attached' => [
        'library' => [
          'gsh_dialog_data/popup-data',
          'gsh_theme/global-styling',
          'gsh_layout_builder/gsh_layout',
        ],
        'drupalSettings' => [
          'popup_count_data' => $popup_count_data,
        ],
      ],
    ];
  }

}
