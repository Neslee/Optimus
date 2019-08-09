<?php

namespace Drupal\pager\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "serach_title",
 *   admin_label = @Translation("Search Title"),
 *   category = @Translation("Search Title")
 * )
 */
class SearchBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\pager\Form\ArticleSearch');
    return $form;
  }

}
