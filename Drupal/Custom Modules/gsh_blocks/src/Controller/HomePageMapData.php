<?php

namespace Drupal\gsh_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Homepage Map Data.
 */
class HomePageMapData extends ControllerBase {

  /**
   * Callback for Homepage Map Data.
   */
  public function content($id) {
    $options = ['absolute' => TRUE];

    $term = Term::load($id);
    if ($term != NULL) {
      if ($term->getName()) {
        $name = $term->getName();
      }
      $community_url_data = Link::fromTextAndUrl($name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $id], $options));
      $community_url = $community_url_data->toString();
      $is_coming_soon = $term->field_is_coming_soon->value;
      $new_homes_starting_at = number_format($term->field_new_homes_starting_at->value);
    }

    $data = [
      'community_url' => $community_url,
      'coming_soon' => $is_coming_soon,
      'starting_price' => $new_homes_starting_at,
    ];

    return new JsonResponse([
      'data' => $data,
      'method' => 'GET',
    ]);
  }

}
