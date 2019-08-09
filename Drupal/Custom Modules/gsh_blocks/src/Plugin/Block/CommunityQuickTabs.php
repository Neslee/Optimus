<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Entity\Query\entityQuery;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "community_quicktabs_block",
 *  admin_label = @Translation("Community Quick Tabs"),
 * )
 */
class CommunityQuickTabs extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $tid = [];
    if (\Drupal::routeMatch()->getParameter('taxonomy_term')) {
      $taxonomy = \Drupal::routeMatch()->getParameter('taxonomy_term');
    }
    elseif ($param = \Drupal::request()->query->get('tid')) {
      $taxonomy = Term::load($param);
    }
    else {
      $taxonomy = NULL;
    }
    if (empty($taxonomy)) {
      return [];
    }
    $tid['tid'] = $taxonomy->tid->value;

    $quick_move_in_count = $this->getPropertyCount($tid['tid'], 24, 'field_marketing_flag');
    $count['quickmovein'] = $quick_move_in_count;

    $available_homes_count = $this->getAvailablehomeCount($tid['tid']);
    $count['availablehomes'] = $available_homes_count;

    $hot_deals_count = $this->getPropertyCount($tid['tid'], 25, 'field_marketing_flag');
    $count['hotdeals'] = $hot_deals_count;

    $url = Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $taxonomy->tid->value], ['absolute' => TRUE]);
    $link['community'] = Link::fromTextAndUrl('Community Info', $url);

    $url = Url::fromRoute('view.community.quick_moveins', $tid);
    $link['quickmovein'] = Link::fromTextAndUrl('Quick-Move-ins', $url);

    $url = Url::fromRoute('view.community.available_homes', $tid);
    $link['availablehomes'] = Link::fromTextAndUrl('Available-Homes', $url);

    $url = Url::fromRoute('view.community.hot_deals', $tid);
    $link['hotdeals'] = Link::fromTextAndUrl('Hot-Deals', $url);

    return [
      '#theme' => 'community-quicktabs-block',
      '#link' => $link,
      '#count' => $count,
    ];

  }

  /**
   * Helper function to fetch the count of properties.
   *
   * @param int $tid
   *   Parameter to fetch the taxonomy term id.
   * @param int $spec_type_id
   *   Parameter to fetch the field spec type taxonomy id.
   * @param string $term_name
   *   Parameter to fetch the field name of property.
   *
   * @return int
   *   Returns the count of properties.
   */
  public function getPropertyCount($tid, $spec_type_id, $term_name) {

    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', 'property_spec');
    $query->condition($term_name, $spec_type_id);
    $query->condition('field_community', $tid);
    $entity_ids = $query->execute();
    return count($entity_ids);
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailablehomeCount($tid) {

    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', 'property_spec');
    $query->condition('field_community', $tid);
    $entity_ids = $query->execute();
    return count($entity_ids);
  }

}
