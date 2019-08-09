<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "property_address_block",
 *  admin_label = @Translation("Property address block"),
 * )
 */
class PropertyAddressBlock extends BlockBase implements BlockPluginInterface {

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
      if ($node->field_address->value) {
        $res['address'] = $node->field_address->value;
      }
      if ($node->field_city->value) {
        $res['city'] = $node->field_city->value;
      }
      if ($node->field_state->value) {
        $res['state'] = $node->field_state->value;
      }
      if ($node->field_zip_code->value) {
        $res['zip_code'] = $node->field_zip_code->value;
      }
      if ($node->field_address->value) {
        $res['address'] = $node->field_address->value;
      }
      if ($node->field_city->value) {
        $res['city'] = $node->field_city->value;
      }
      if ($node->field_state->value) {
        $res['state'] = $node->field_state->value;
      }
      if ($node->field_zip_code->value) {
        $res['zip_code'] = $node->field_zip_code->value;
      }
      if ($node->field_display_name->value) {
        $res['display_name'] = $node->field_display_name->value;
      }
    }
    return [
      '#theme' => 'property-address-block',
      '#node' => $res,
    ];
  }

}
