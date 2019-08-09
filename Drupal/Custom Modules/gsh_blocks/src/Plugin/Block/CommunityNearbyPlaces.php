<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "community_nearby_places",
 *  admin_label = @Translation("Community nearby places block"),
 * )
 */
class CommunityNearbyPlaces extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $res = [];
    if ($term = \Drupal::routeMatch()->getParameter('taxonomy_term')) {
      if ($term->id()) {
        $res['term_id'] = $term->id();
      }
      if ($term->field_latitude->value) {
        $res['latitude'] = $term->field_latitude->value;
      }
      if ($term->field_longitude->value) {
        $res['longitude'] = $term->field_longitude->value;
      }
    }
    return [
      '#theme' => 'community-nearby-places-block',
      '#term' => $res,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return Cache::mergeContexts(parent::getCacheContexts(), ['route']);
  }

}
