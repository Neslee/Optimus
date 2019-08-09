<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "property_community_image",
 *  admin_label = @Translation("Property community image block"),
 * )
 */
class PropertyCommunityImage extends BlockBase implements BlockPluginInterface {

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
    $gallery_image = [];
    if ($node_data = \Drupal::routeMatch()->getParameter('node')) {
      if ($node_data->id()) {
        $res['node_id'] = $node_data->id();
      }
      if ($node_data->field_community[0]) {
        $tags = $node_data->field_community[0]->getValue();
        $tid = $tags['target_id'];
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
        $gallery_images_count = 0;
        foreach ($term->field_gallery_images as $item) {
          if ($item->entity) {
            $res['gallery_image_count'] = 1;
            $gallery_image[] = $item->entity->url();
          }
          $res['gallery_image'] = $gallery_image;
          $gallery_images_count++;
        }
        $res['gallery_images_count'] = $gallery_images_count;
        if ($term->field_community_video->value) {
          $community_video = $term->field_community_video->value;
          if (!empty($community_video)) {
            $res['community_video_count'] = 1;
            $res['community_video'] = $community_video;
          }
        }
      }
    }
    return [
      '#theme' => 'property-community-image',
      '#node' => $res,
    ];
  }

}
