<?php

namespace Drupal\fetch_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\fetch_data\ListData;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Article Pager.
 */
class FetchData extends ControllerBase {

  /**
   * Service variable.
   *
   * @var service
   */
  private $service;

  /**
   * FetchData Constructor.
   */
  public function __construct(ListData $myservice) {
    $this->service = $myservice;
  }

  /**
   * Content to display URL Data.
   */
  public function content() {
    $json_data = $this->service->getData();
    return [
      '#theme' => 'data-theme',
      '#data' => $json_data,
    ];
  }

  /**
   * Service Container.
   */
  public static function create(ContainerInterface $container) {
    $obj = $container->get('fetch_data.content');
    return new static($obj);
  }

}
