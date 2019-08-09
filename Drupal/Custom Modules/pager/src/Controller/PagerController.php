<?php

namespace Drupal\pager\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\node\Entity\Node;

/**
 * Article Pager.
 */
class PagerController extends ControllerBase {

  /**
   * Content to display 8 Articles Per Page.
   */
  public function content() {
    $title = $_GET['title'];
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'article')
      ->condition('title', "%" . $title . "%", 'LIKE')
      ->condition('status', 1)
      ->pager(8)
      ->execute();
    $nodes = Node::loadMultiple($nids);
    if (empty($nodes)) {
      $result[] = [
        '#markup' => '<h1> No Result Found , Please Try Again</h1>',
      ];
    }
    $node_arr = [];
    foreach ($nodes as $node) {
      $node_arr[] = Link::createFromRoute($node->getTitle(),
          'entity.node.canonical',
          ['node' => $node->id()]
      );
    }
    $result[] = [
      '#theme' => 'item_list',
      '#items' => $node_arr,
    ];
    $result[] = [
      '#type' => 'pager',
    ];

    return $result;
  }

}
