<?php

namespace Drupal\article\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class ArticleController.
 */
class ArticleController extends ControllerBase {

  /**
   * Function Content.
   */
  public function content($nodes) {
    $node_data = \Drupal::entityTypeManager()->getStorage('node')->load($nodes);
    if (empty($node_data) ||  $node_data->getType() != 'article') {
      $url = Url::fromUri('http://optimus.drupal.com', []);
      $response = new RedirectResponse($url->toString());
      $response->send();
      return [
        '#type' => 'markup',
        '#title' => Markup::create('Not Found'),
      ];
    }
    else {
      $title = $node_data->getTitle();
      $body = $node_data->get('body')->value;
      $image = file_create_url($node_data->get('field_image')->entity->uri->value);
      $tags = $node_data->field_tags[0]->getValue();
      $tid = $tags['target_id'];
      $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
      $name = $term->label();
      return [
        '#type' => 'markup',
        '#title' => Markup::create('<h1 class="article-title">' . $title . '</h1>'),
        '#markup' => '<div class="col-md-12 article-container">
                   <div class="col-md-6 section-left">
                   <img class="article-image" src=' . $image . '/>
                   </div>
                   <div class="col-md-6 section-right">
                   <p class="article-body">' . $body . '</p>
                   </div>
                   <div class="col-md-12 article-tags">
                   <a href="http://optimus.drupal.com/taxonomy/term/' . $tags['target_id'] . '">' . $name . '</a>
                   </div>
                   </div>',
        '#attached' => [
          'library' => [
            'article/article_css',
          ],
        ],
      ];
    }
  }

}
