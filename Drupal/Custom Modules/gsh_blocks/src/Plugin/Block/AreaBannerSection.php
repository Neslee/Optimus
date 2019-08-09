<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "area_banner_block",
 *  admin_label = @Translation("Area banner block"),
 * )
 */
class AreaBannerSection extends BlockBase implements BlockPluginInterface {

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
    if ($taxonomy = \Drupal::routeMatch()->getParameter('taxonomy_term')) {
      $result['tid'] = $taxonomy->id();
      $result['name'] = $taxonomy->getName();
      if ($taxonomy->field_featured_image->target_id) {
        foreach ($taxonomy->get('field_featured_image') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('city_and_area_banner_image')->buildUrl($file->getFileUri());
            $featured_image[] = $image_uri;
          }
        }
        $result['featured_image'] = $featured_image[0];
      }
      $result['field_sub_title'] = $taxonomy->field_sub_title->value;
      $result['field_intro'] = $taxonomy->field_intro->value;
    }
    return [
      '#theme' => 'area-banner-block',
      '#term' => $result,
    ];
  }

}
