<?php

namespace Drupal\gsh_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Drupal\media\Entity\Media;

/**
 * Class FinancePopupComtroller.
 */
class FinancePopupController extends ControllerBase {

  /**
   * Function Content.
   *
   * @param int $id
   *   Description of this parameter, takes the content id as an arguement.
   */
  public function content($id) {

    $node_data = \Drupal::entityTypeManager()->getStorage('node')->load($id);
    $res['bank_name'] = $node_data->getTitle();
    $image_field = $node_data->get('field_bank_logo')->first()->getValue();
    $media = Media::load($image_field['target_id']);
    $media_field = $media->get('field_media_image')->first()->getValue();
    $file = File::load($media_field['target_id']);
    $res['bank_logo'] = file_create_url($file->getFileUri());
    $res['bank_description'] = $node_data->field_description->value;

    return [
      '#theme' => 'finance-popup',
      '#term' => $res,
      '#attached' => [
        'library' => [
          'core/drupal.dialog.ajax',
          'gsh_theme/global-styling',
        ],
      ],
    ];
  }

}
