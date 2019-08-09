<?php

namespace Drupal\gsh_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\taxonomy\Entity\Term;

/**
 * County Map Data.
 */
class CountyMapData extends ControllerBase {

  /**
   * Callback for County Map Data.
   */
  public function content($id) {
    $area_id = [];
    $community_id = [];
    $property_id = [];
    $community_count = 0;

    $term = Term::load($id);
    if ($term != NULL) {
      if ($term->getName()) {
        $name = $term->getName();
      }
      $city_query = \Drupal::database()->query('select entity_id from {taxonomy_term__field_county} where field_county_target_id = ' . $id);
      $city_id = $city_query->fetchCol();
      if ($city_id) {
        $area_query = \Drupal::database()->query('select entity_id from {taxonomy_term__field_city} where field_city_target_id = ' . $city_id[0]);
        $area_id = $area_query->fetchCol();
      }
      if ($area_id) {
        foreach ($area_id as $area) {
          $community_query = \Drupal::database()->query("select entity_id from {taxonomy_term__field_quadrant} where bundle = 'communities' and field_quadrant_target_id = " . $area . "
          and entity_id IN(select tid from {taxonomy_term_field_data} where vid = 'communities' and status = 1)");
          $community_id[] = $community_query->fetchCol();
        }
      }

      $community_url_data = [];
      for ($i = 0; $i < count($community_id); $i++) {
        foreach ($community_id[$i] as $key => $value) {
          $community_data_id = \Drupal::database()->query("select entity_id from {taxonomy_term__field_is_coming_soon} where field_is_coming_soon_value = 0 and entity_id = " . $value);
          $community_data_ids[] = $community_data_id->fetchCol();
          $community_url_data[] = 'community%5B%5D=' . $value;
        }
      }

      $community_url = implode('&', $community_url_data);
      if ($community_id) {
        for ($i = 0; $i < count($community_id); $i++) {
          foreach ($community_id[$i] as $community) {
            $query = \Drupal::database()->query("select nid from {node_field_data} where status = 1 and nid IN (select entity_id from {node__field_community} where field_community_target_id =  $community)");
            $property_id[] = $query->fetchCol();
          }
        }
      }
      foreach ($property_id as $property) {
        if ($property != NULL) {
          $community_count++;
        }
      }

      $total_count = count($property_id, 1);
      $comm_count = count($property_id);
      $property_count = $total_count - $comm_count;
      $data = [
        'name' => $name,
        'community_url' => $community_url,
        'community_count' => $community_count,
        'property_count' => $property_count,
      ];

      return new JsonResponse([
        'data' => $data,
        'method' => 'GET',
      ]);
    }
    else {
      return new JsonResponse([
        'null_data' => 'Not Found',
        'method' => 'GET',
      ]);
    }
  }

}
