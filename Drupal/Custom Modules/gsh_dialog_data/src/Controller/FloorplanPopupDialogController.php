<?php

namespace Drupal\gsh_dialog_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;

/**
 * Class FloorplanPopupDialogController.
 */
class FloorplanPopupDialogController extends ControllerBase {

  /**
   * Function Content.
   */
  public function content($id) {
    $term_data = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($id);
    $res['term_id'] = $id;
    $res['floorplan_title'] = $term_data->getName();
    if ($term_data->field_square_feet->value) {
      $res['floorplan_sqft'] = number_format($term_data->field_square_feet->value);
    }
    if ($term_data->field_bedrooms->value) {
      $res['floorplan_bed'] = $term_data->field_bedrooms->value;
    }
    if ($term_data->field_full_baths->value) {
      $res['floorplan_bath'] = $term_data->field_full_baths->value;
    }
    if ($term_data->field_garages->value) {
      $res['floorplan_cars'] = $term_data->field_garages->value;
    }
    if ($term_data->field_floors->value) {
      $res['floorplan_floors'] = $term_data->field_floors->value;
    }
    if ($term_data->field_downloadable_brochure->target_id) {
      foreach ($term_data->field_downloadable_brochure as $item) {
        if ($item->entity) {
          $res['floorplan_brochure'] = $item->entity->url();
        }
      }
    }
    if ($term_data->field_marketing_images->target_id) {
      $marketing_images_count = 0;
      foreach ($term_data->get('field_marketing_images') as $item) {
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
    if ($term_data->field_floorplan_video->value) {
      $floorplan_video = $term_data->field_floorplan_video->value;
      if (!empty($floorplan_video)) {
        $res['floorplan_video_count'] = 1;
        $video = $floorplan_video;
        if (preg_match("/(https?:\/\/)?(www\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $video, $output_array)) {
          $res['floorplan_video'] = 'https://player.vimeo.com/video/' . $output_array[4];
        }
        else {
          $link = $floorplan_video;
          $video_id = explode("?v=", $link);
          $res['floorplan_video'] = 'https://www.youtube.com/embed/' . $video_id[1];
        }
      }
    }
    if ($res['marketing_images_count'] >= 1) {
      $popup_count_data['marketing_images_count'] = $res['marketing_images_count'];
    }
    return [
      '#title' => 'Floorplan Popup',
      '#theme' => 'floorplan-popup-dialog-data',
      '#term' => $res,
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
