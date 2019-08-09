<?php

namespace Drupal\gsh_dialog_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;

/**
 * Class PropertyPopupDialogController.
 */
class PropertyPopupDialogController extends ControllerBase {

  /**
   * Function Content.
   */
  public function content($id) {
    $res = [];
    $marketing_images_count = 0;
    $marketing_image = [];
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
    if ($node_data->field_latitude->value || ($node_data->field_longitude->value)) {
      $res['location_count'] = 1;
      if ($node_data->field_latitude->value) {
        $res['latitude'] = $node_data->field_latitude->value;
      }
      if ($node_data->field_longitude->value) {
        $res['longitude'] = $node_data->field_longitude->value;
      }
    }
    if ($node_data->field_downloadable_brochure->target_id) {
      foreach ($node_data->field_downloadable_brochure as $item) {
        if ($item->entity) {
          $res['property_brochure'] = $item->entity->url();
        }
      }
    }
    if ($node_data->field_featured_image->target_id) {
      foreach ($node_data->get('field_featured_image') as $item) {
        if ($item->entity) {
          $fid = $item->entity->get('field_media_image')->target_id;
          $file = File::load($fid);
          $image_uri = $file->getFileUri();
          $marketing_image[] = file_url_transform_relative(file_create_url($image_uri));
        }
        $res['marketing_image'] = $marketing_image;
        $marketing_images_count++;
      }
      $res['marketing_images_count'] = $marketing_images_count;
    }
    if ($node_data->field_marketing_images->target_id) {
      foreach ($node_data->get('field_marketing_images') as $item) {
        if ($item->entity) {
          $fid = $item->entity->get('field_media_image')->target_id;
          $file = File::load($fid);
          $image_uri = $file->getFileUri();
          $marketing_image[] = file_url_transform_relative(file_create_url($image_uri));
        }
        $res['marketing_image'] = $marketing_image;
        $marketing_images_count++;
      }
      $res['marketing_images_count'] = $marketing_images_count;
    }
    if ($node_data->field_community[0]) {
      $tags = $node_data->field_community[0]->getValue();
      $tid = $tags['target_id'];
      $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
      if ($term->field_featured_image->target_id) {
        foreach ($term->get('field_featured_image') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = $file->getFileUri();
            $marketing_image[] = file_url_transform_relative(file_create_url($image_uri));
          }
          $res['marketing_image'] = $marketing_image;
          $marketing_images_count++;
        }
        $res['marketing_images_count'] = $marketing_images_count;
      }
      if ($term->field_gallery_images->target_id) {
        foreach ($term->get('field_gallery_images') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = $file->getFileUri();
            $marketing_image[] = file_url_transform_relative(file_create_url($image_uri));
          }
          $res['marketing_image'] = $marketing_image;
          $marketing_images_count++;
        }
        $res['marketing_images_count'] = $marketing_images_count;
      }
      if ($res['latitude'] == NULL || $res['longitude'] == NULL) {
        $res['location_count'] = 1;
        if ($res['latitude'] == NULL) {
          $res['latitude'] = $term->field_latitude->value;
        }
        if ($res['longitude'] == NULL) {
          $res['longitude'] = $term->field_longitude->value;
        }
      }
    }
    foreach ($node_data->field_elevation as $elevation) {
      $floorplan_images_count = 0;
      $tid = $elevation->target_id;
      $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
      foreach ($term->get('field_basement') as $item) {
        if ($item->entity) {
          $imageUrl = $item->entity->get('field_media_image')->entity->uri->value;
          $illustration_image[] = file_url_transform_relative(file_create_url($imageUrl));
        }
        $res['illustration_image'] = $illustration_image;
        $floorplan_images_count++;
      }
      foreach ($term->get('field_main_level') as $item) {
        if ($item->entity) {
          $imageUrl = $item->entity->get('field_media_image')->entity->uri->value;
          $illustration_image[] = file_url_transform_relative(file_create_url($imageUrl));
        }
        $res['illustration_image'] = $illustration_image;
        $floorplan_images_count++;
      }
      foreach ($term->get('field_second_level') as $item) {
        if ($item->entity) {
          $imageUrl = $item->entity->get('field_media_image')->entity->uri->value;
          $illustration_image[] = file_url_transform_relative(file_create_url($imageUrl));
        }
        $res['illustration_image'] = $illustration_image;
        $floorplan_images_count++;
      }
      foreach ($term->get('field_optional_updates') as $item) {
        if ($item->entity) {
          $imageUrl = $item->entity->get('field_media_image')->entity->uri->value;
          $illustration_image[] = file_url_transform_relative(file_create_url($imageUrl));
        }
        $res['illustration_image'] = $illustration_image;
        $floorplan_images_count++;
      }
    }
    $res['floorplan_images_count'] = $floorplan_images_count;
    if ($node_data->field_property_video->value) {
      $property_video = $node_data->field_property_video->value;
      if (!empty($property_video)) {
        $res['property_video_count'] = 1;
        $vimeo = $property_video;
        if (preg_match("/(https?:\/\/)?(www\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo, $output_array)) {
          $res['property_video'] = 'https://player.vimeo.com/video/' . $output_array[4];
        }
        else {
          $link = $property_video;
          $video_id = explode("?v=", $link);
          $res['property_video'] = 'https://www.youtube.com/embed/' . $video_id[1];
        }
      }
    }
    if ($res['marketing_images_count'] >= 1) {
      $popup_count_data['marketing_images_count'] = $res['marketing_images_count'];
    }
    if ($res['floorplan_images_count'] >= 1) {
      $popup_count_data['floorplan_images_count'] = $res['floorplan_images_count'];
    }
    if ($res['property_video_count'] >= 1) {
      $popup_count_data['video_count'] = $res['property_video_count'];
    }
    if ($res['location_count'] >= 1) {
      $popup_count_data['location_count'] = $res['location_count'];
    }
    return [
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
      '#theme' => 'property-popup-dialog-data',
      '#node' => $res,
    ];
  }

}
