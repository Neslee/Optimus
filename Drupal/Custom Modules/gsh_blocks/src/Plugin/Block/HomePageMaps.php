<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "homepage_maps",
 *  admin_label = @Translation("Homepage View Maps"),
 * )
 */
class HomePageMaps extends BlockBase implements BlockPluginInterface {

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
    $result = [];
    $i = 0;
    $get_community_id = \Drupal::database()->query("select tid from {taxonomy_term_field_data} where vid = 'communities' and status = 1");
    $community_data[] = $get_community_id->fetchCol();
    foreach ($community_data[0] as $community_id) {
      $result[$i]['id'] = $community_id;
      $get_latitude = \Drupal::database()->query("select field_latitude_value from {taxonomy_term__field_latitude} where bundle = 'communities' and entity_id = $community_id");
      $result[$i]['lat'] = $get_latitude->fetchCol();
      $get_longitude = \Drupal::database()->query("select field_longitude_value from {taxonomy_term__field_longitude} where bundle = 'communities' and entity_id = $community_id");
      $result[$i]['log'] = $get_longitude->fetchCol();
      $get_coming_soon = \Drupal::database()->query("select field_is_coming_soon_value from {taxonomy_term__field_is_coming_soon} where field_is_coming_soon_value = 0 and entity_id = $community_id");
      $result[$i]['coming_soon'] = $get_coming_soon->fetchCol();
      $get_not_coming_soon = \Drupal::database()->query("select field_is_coming_soon_value from {taxonomy_term__field_is_coming_soon} where field_is_coming_soon_value = 1 and entity_id = $community_id");
      $result[$i]['coming_soon'] = $get_not_coming_soon->fetchCol();
      $i++;
    }

    return [
      '#attached' => [
        'library' => [
          'gsh_blocks/homepage-map',
        ],
        'drupalSettings' => [
          'homepage_map' => $result,
        ],
      ],
      '#theme' => 'homepage-maps',
    ];
  }

}
