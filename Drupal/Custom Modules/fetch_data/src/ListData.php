<?php

namespace Drupal\fetch_data;

/**
 * Class ListBooks.
 *
 * @package Drupal\fetch_data
 */
class ListData {

  /**
   * ListData Constructor.
   */
  public function __construct($data) {
    $this->data = $data;
  }

  /**
   * ListData returner.
   */
  public function getData() {
    $json = file_get_contents($this->data['base_uri']);
    $json_data = json_decode($json, TRUE);
    return $json_data;
  }

}
