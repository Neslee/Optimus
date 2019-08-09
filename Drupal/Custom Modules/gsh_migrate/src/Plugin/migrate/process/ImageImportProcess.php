<?php

namespace Drupal\gsh_migrate\Plugin\migrate\process;

/**
 * Create image from URL.
 *
 * @MigrateProcessPlugin(
 *   id = "image_import_process"
 * )
 */
class ImageImportProcess {

  /**
   * Image Import.
   */
  public function transformFile($value, $key) {
    if (!empty($value)) {
      $data = file_get_contents($value);
      $file = file_save_data($data, 'public://' . $key . basename($value), FILE_EXISTS_REPLACE);
      return $file->id();
    }
  }

}
