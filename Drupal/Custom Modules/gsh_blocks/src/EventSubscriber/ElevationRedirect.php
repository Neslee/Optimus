<?php

namespace Drupal\gsh_blocks\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class ElevationRedirect.
 */
class ElevationRedirect implements EventSubscriberInterface {

  /**
   * Constructor.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['redirectelevation'];
    return $events;
  }

  /**
   * Code that should be triggered on event specified.
   */
  public function redirectelevation() {
    \Drupal::service('page_cache_kill_switch')->trigger();
    $current_path = \Drupal::service('path.current')->getPath();

    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('elevations');
    foreach ($terms as $term) {

      $term_data[] = [
        'id' => $term->tid,
      ];

    }

    foreach ($term_data as $data) {

      $url = '/taxonomy/term/' . $data['id'];
      if ($url == $current_path) {
        $response = new RedirectResponse('/403-access-denied', 302);
        $response->send();
      }
    }

  }

}
