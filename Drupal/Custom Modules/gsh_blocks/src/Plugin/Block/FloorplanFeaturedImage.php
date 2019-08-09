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
 *  id = "floorplan_featured_image",
 *  admin_label = @Translation("Floorplan featured image block"),
 * )
 */
class FloorplanFeaturedImage extends BlockBase implements BlockPluginInterface {

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
      $featured_image = [];
      $marketing_images = [];
      if ($term->id()) {
        $res['term_id'] = $term->id();
      }
      if ($term->field_featured_image->target_id) {
        foreach ($term->get('field_featured_image') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $featured_image[] = $image_uri;
          }
        }
        $res['featured_image'] = $featured_image[0];
      }
      if ($term->field_marketing_images->target_id) {
        foreach ($term->get('field_marketing_images') as $item) {
          if ($item->entity) {
            $res['marketing_images_count'] = 1;
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $marketing_images[] = $image_uri;
          }
          $res['marketing_image'] = $marketing_images;
        }
      }
      foreach ($term->field_elevation as $elevation) {
        $tid = $elevation->target_id;
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
        foreach ($term->get('field_featured_image') as $item) {
          if ($item->entity) {
            $elevation_name[] = $term->name->value;
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $elevation_images[] = $image_uri;
          }
        }
        $res['elevation_image'] = array_combine($elevation_images, $elevation_name);
      }
      if ($term->field_floorplan_video->value) {
        $floorplan_video = $term->field_floorplan_video->value;
        if (!empty($floorplan_video)) {
          $res['floorplan_video_count'] = 1;
        }
      }
    }
    return [
      '#theme' => 'floorplan-featured-image',
      '#term' => $res,
    ];
  }

}
