<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "property_hers_index",
 *  admin_label = @Translation("Property index block"),
 * )
 */
class PropertyHersIndex extends BlockBase implements BlockPluginInterface {

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
    $config = \Drupal::config('gsh_blocks.hers_block');
    $hers_title = $config->get('hers_title');
    $hers_description = $config->get('hers_description');
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      if ($node->field_hers_index_score->value) {
        $res['hers_index'] = $node->field_hers_index_score->value;
      }
    }
    $res['hers_title'] = $hers_title;
    $res['hers_description'] = $hers_description;
    return [
      '#theme' => 'property-hers-index',
      '#node' => $res,
    ];
  }

}
