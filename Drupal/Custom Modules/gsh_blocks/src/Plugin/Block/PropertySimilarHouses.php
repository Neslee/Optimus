<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "property_similar_houses",
 *  admin_label = @Translation("Property similar houses block"),
 * )
 */
class PropertySimilarHouses extends BlockBase implements BlockPluginInterface {

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
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      if ($node->field_community[0]) {
        $tags = $node->field_community[0]->getValue();
        $tid = $tags['target_id'];
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
        $res['community_name'] = $term->getName();
      }
    }
    return [
      '#theme' => 'property-similar-houses',
      '#node' => $res,
    ];
  }

}
