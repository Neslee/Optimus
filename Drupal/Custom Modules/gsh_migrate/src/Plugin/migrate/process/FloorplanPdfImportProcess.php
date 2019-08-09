<?php

namespace Drupal\gsh_migrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Create image from URL.
 *
 * @MigrateProcessPlugin(
 *   id = "floorplan_pdf_import_process"
 * )
 */
class FloorplanPdfImportProcess extends ProcessPluginBase {

  /**
   * Image Import.
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $file_process = new ImageImportProcess();
    $result = $file_process->transformFile($value, 'gsh-documents/');
    return $result;
  }

}
