<?php

namespace Drupal\gsh_dialog_data\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class NearbyPlacesDialogController.
 */
class NearbyPlacesDialogController extends ControllerBase {

  /**
   * Function Content.
   */
  public function content($location) {
    $location_data = explode("&", $location);
    $res['latitude'] = $location_data[0];
    $res['longitude'] = $location_data[1];
    return [
      '#theme' => 'nearby-places-dialog-data',
      '#node' => $res,
      '#attached' => [
        'library' => [
          'gsh_theme/global-styling',
          'gsh_layout_builder/gsh_layout',
        ],
      ],
    ];
  }

}
