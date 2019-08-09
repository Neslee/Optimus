<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\image\Entity\ImageStyle;
use Drupal\file\Entity\File;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "property_featured_image",
 *  admin_label = @Translation("Property featured image block"),
 * )
 */
class PropertyFeaturedImage extends BlockBase implements BlockPluginInterface {

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
      $featured_image = [];
      $marketing_images = [];
      if ($node->id()) {
        $res['node_id'] = $node->id();
      }
      if ($node->field_latitude->value) {
        $res['latitude'] = $node->field_latitude->value;
      }
      if ($node->field_longitude->value) {
        $res['longitude'] = $node->field_longitude->value;
      }
      if ($node->field_marketing_tagline->value) {
        $res['marketing_tagline'] = $node->field_marketing_tagline->value;
      }
      if ($node->field_featured_image->target_id) {
        foreach ($node->get('field_featured_image') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $featured_image[] = $image_uri;
          }
        }
        $res['featured_image'] = $featured_image[0];
      }
      if ($node->field_marketing_images->target_id) {
        foreach ($node->get('field_marketing_images') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $marketing_images[] = $image_uri;
          }
          $res['marketing_image'] = $marketing_images;
        }
      }
      foreach ($node->field_marketing_flag as $item) {
        $marketing_flag = $item->target_id;
        if ($marketing_flag == 1481) {
          $res['maketing_flag_name'] = 'Green Tag Sale';
        }
        if ($marketing_flag == 25) {
          $res['hot_deal_flag'] = 'Hot Deal';
        }
      }
      if ($node->field_incentive->value) {
        $res['incentive'] = $node->field_incentive->value;
      }

      if ($node->field_property_video->value) {
        $res['property_video_count'] = 1;
      }

      if ($node->field_community[0]) {
        $tags = $node->field_community[0]->getValue();
        $tid = $tags['target_id'];
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
        foreach ($term->get('field_featured_image') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $marketing_images[] = $image_uri;
          }
          $res['marketing_image'] = $marketing_images;
        }
        foreach ($term->get('field_gallery_images') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $marketing_images[] = $image_uri;
          }
          $res['marketing_image'] = $marketing_images;
        }

      }
    }
    return [
      '#theme' => 'property-featured-image',
      '#node' => $res,
    ];
  }

}
