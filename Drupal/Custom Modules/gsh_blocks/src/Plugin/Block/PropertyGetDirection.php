<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "property_get_direction",
 *  admin_label = @Translation("Property get direction block"),
 * )
 */
class PropertyGetDirection extends BlockBase implements BlockPluginInterface {

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
      if ($node->id()) {
        $res['node_id'] = $node->id();
      }
      if ($node->field_latitude->value) {
        $res['latitude'] = $node->field_latitude->value;
      }
      if ($node->field_longitude->value) {
        $res['longitude'] = $node->field_longitude->value;
      }
    }
    return [
      '#theme' => 'property-get-direction-block',
      '#node' => $res,
    ];
  }

}
