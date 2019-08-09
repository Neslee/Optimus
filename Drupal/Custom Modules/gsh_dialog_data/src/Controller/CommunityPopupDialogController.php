<?php

namespace Drupal\gsh_dialog_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;

/**
 * Class CommunityPopupDialogController.
 */
class CommunityPopupDialogController extends ControllerBase {

  /**
   * Function Content.
   */
  public function content($id) {
    $res = [];
    $gallery_images_count = 0;
    $taxonomy = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($id);
    $res['title'] = $taxonomy->getName();
    $res['tid'] = $taxonomy->tid->value;
    $startprice['min'] = number_format($taxonomy->field_new_homes_starting_at->value);
    $sqft = $this->getCommunityInfo('node__field_square_feet', 'field_square_feet_value', $res['tid']);
    $sqft['max'] = number_format($sqft[0]->max);
    $sqft['min'] = number_format($sqft[0]->min);

    $bedrooms = $this->getCommunityInfo('node__field_bedrooms', 'field_bedrooms_value', $res['tid']);
    $bedrooms['max'] = $bedrooms[0]->max;
    $bedrooms['min'] = $bedrooms[0]->min;

    $bath = $this->getCommunityInfo('node__field_full_baths', 'field_full_baths_value', $res['tid']);
    $bath['max'] = $bath[0]->max;
    $bath['min'] = $bath[0]->min;

    $garage = $this->getCommunityInfo('node__field_garages', 'field_garages_value', $res['tid']);
    $garage['max'] = $garage[0]->max;
    $garage['min'] = $garage[0]->min;

    $storey = $this->getCommunityInfo('node__field_floors', 'field_floors_value', $res['tid']);
    $storey['max'] = $storey[0]->max;
    $storey['min'] = $storey[0]->min;

    if ($taxonomy->field_featured_image->target_id) {
      foreach ($taxonomy->get('field_featured_image') as $item) {
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

    if ($taxonomy->field_gallery_images->target_id) {
      foreach ($taxonomy->get('field_gallery_images') as $item) {
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
    if ($taxonomy->field_latitude->value || ($taxonomy->field_longitude->value)) {
      $res['location_count'] = 1;
      if ($taxonomy->field_latitude->value) {
        $res['latitude'] = $taxonomy->field_latitude->value;
      }
      if ($taxonomy->field_longitude->value) {
        $res['longitude'] = $taxonomy->field_longitude->value;
      }
    }

    if ($res['gallery_images_count'] >= 1) {
      $popup_count_data['marketing_images_count'] = $res['gallery_images_count'];
    }
    if ($res['property_video_count'] >= 1) {
      $popup_count_data['video_count'] = $res['property_video_count'];
    }
    if ($res['location_count'] >= 1) {
      $popup_count_data['location_count'] = $res['location_count'];
    }

    return [
      '#title' => 'Community Popup',
      '#theme' => 'community-popup-dialog-data',
      '#term' => $res,
      '#sqft' => $sqft,
      '#bedrooms' => $bedrooms,
      '#bath' => $bath,
      '#garage' => $garage,
      '#storey' => $storey,
      '#startprice' => $startprice,
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

  /**
   * Helper function to fetch max and min values from property table.
   *
   * @param string $property_field_table_name
   *   Parameter to fetch the table name.
   * @param string $field
   *   Parameter to fetch the table name.
   * @param int $tid
   *   Parameter to fetch the taxonomy term id.
   *
   * @return object
   *   Returns the max and min values of the particular field.
   */
  public function getCommunityInfo($property_field_table_name, $field, $tid) {

    $query = \Drupal::database()->select($property_field_table_name, 'property_field_table_name');
    $query->addExpression("MAX($field)", 'max');
    $query->addExpression("MIN($field)", 'min');
    $query->leftJoin('node__field_community', 'community', 'property_field_table_name.entity_id = community.entity_id');
    $query->join('taxonomy_term_data', 'taxonomy', 'taxonomy.tid = community.field_community_target_id');
    $query->condition('taxonomy.tid', $tid);
    $result = $query->execute()->fetchAll();
    return $result;

  }

}
