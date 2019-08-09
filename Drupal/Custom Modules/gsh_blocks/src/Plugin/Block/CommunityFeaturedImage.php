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
 *  id = "community_featured_image",
 *  admin_label = @Translation("Community featured image block"),
 * )
 */
class CommunityFeaturedImage extends BlockBase implements BlockPluginInterface {

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
      $gallery_images = [];
      if ($term->id()) {
        $res['term_id'] = $term->id();
      }
      if ($term->field_marketing_tagline->value) {
        $res['marketing_tagline'] = $term->field_marketing_tagline->value;
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
      if ($term->field_gallery_images->target_id) {
        foreach ($term->get('field_gallery_images') as $item) {
          if ($item->entity) {
            $fid = $item->entity->get('field_media_image')->target_id;
            $file = File::load($fid);
            $image_uri = ImageStyle::load('featured_image')->buildUrl($file->getFileUri());
            $gallery_images[] = $image_uri;
          }
          $res['gallery_image'] = $gallery_images;
        }
      }
      if ($term->field_latitude->value) {
        $res['latitude'] = $term->field_latitude->value;
      }
      if ($term->field_longitude->value) {
        $res['longitude'] = $term->field_longitude->value;
      }
      if ($term->field_is_coming_soon->value) {
        $res['coming_soon'] = $term->field_is_coming_soon->value;
      }
    }
    return [
      '#theme' => 'community-featured-image',
      '#term' => $res,
    ];
  }

}
