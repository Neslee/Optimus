<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "breadcrumb_block",
 *  admin_label = @Translation("Breadcrumb block"),
 * )
 */
class Breadcrumb extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $res = [];
    $options = ['absolute' => TRUE];
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      if ($node->getType() == 'property_spec') {
        $property_url = Link::fromTextAndUrl($node->title->value, Url::fromRoute('entity.node.canonical', ['node' => $node->nid->value], $options));
        $res['property_url'] = $property_url->toString();

        $community_data = $this->getBreadcrumbInfo('node__field_community', 'field_community_target_id', $node->nid->value);
        if ($community_data[0]->tid != '') {
          $community_url = Link::fromTextAndUrl($community_data[0]->name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $community_data[0]->tid], $options));
          $res['community_url'] = $community_url->toString();

          $area_data = $this->getBreadcrumbInfo('taxonomy_term__field_quadrant', 'field_quadrant_target_id', $community_data[0]->tid);
          $area_url = Link::fromTextAndUrl($area_data[0]->name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $area_data[0]->tid], $options));
          $res['area_url'] = $area_url->toString();

          $city_data = $this->getBreadcrumbInfo('taxonomy_term__field_city', 'field_city_target_id', $area_data[0]->tid);
          $city_url = Link::fromTextAndUrl($city_data[0]->name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $city_data[0]->tid], $options));
          $res['city_url'] = $city_url->toString();
        }
      }
    }
    else {
      if ($term = \Drupal::routeMatch()->getParameter('taxonomy_term')) {
        $res['taxonomy_tid'] = $term->tid->value;
      }
      elseif ($param = \Drupal::request()->query->get('tid')) {
        $term = Term::load($param);
        $res['taxonomy_tid'] = $term->tid->value;
      }
      $query = \Drupal::database()->select('taxonomy_term_field_data', 'term_data');
      $query->addField('term_data', "vid");
      $query->condition('tid', $res['taxonomy_tid']);
      $result = $query->execute()->fetchAll();
      $term_vocabulary = NULL;
      if ($result) {
        $term_vocabulary = $result[0]->vid;
      }
      switch ($term_vocabulary) {
        case 'communities':
          $community_url = Link::fromTextAndUrl($term->name->value, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $term->tid->value], $options));
          $res['community_url'] = $community_url->toString();
          $area_data = $this->getBreadcrumbInfo('taxonomy_term__field_quadrant', 'field_quadrant_target_id', $term->tid->value);
          $area_url = Link::fromTextAndUrl($area_data[0]->name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $area_data[0]->tid], $options));
          $res['area_url'] = $area_url->toString();
          $city_data = $this->getBreadcrumbInfo('taxonomy_term__field_city', 'field_city_target_id', $area_data[0]->tid);
          $city_url = Link::fromTextAndUrl($city_data[0]->name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $city_data[0]->tid], $options));
          $res['city_url'] = $city_url->toString();
          break;

        case 'areas':
          $area_url = Link::fromTextAndUrl($term->name->value, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $term->tid->value], $options));
          $res['area_url'] = $area_url->toString();
          $city_data = $this->getBreadcrumbInfo('taxonomy_term__field_city', 'field_city_target_id', $term->tid->value);
          $city_url = Link::fromTextAndUrl($city_data[0]->name, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $city_data[0]->tid], $options));
          $res['city_url'] = $city_url->toString();
          break;

        case 'floorplans':
          $floorplan_url = Link::fromTextAndUrl($term->name->value, Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $term->tid->value], $options));
          $res['floorplan_url'] = $floorplan_url->toString();
          break;
      }
    }
    return [
      '#theme' => 'breadcrumb-block',
      '#breadcrumb' => $res,
    ];
  }

  /**
   * Helper function to fetch breadcrumb data.
   *
   * @param string $taxonomy_field_table_name
   *   Parameter to fetch the table name.
   * @param string $field
   *   Parameter to fetch the table name.
   * @param int $tid
   *   Parameter to fetch the taxonomy term id.
   *
   * @return object
   *   Returns breadcrumb result.
   */
  public function getBreadcrumbInfo($taxonomy_field_table_name, $field, $tid) {
    $query = \Drupal::database()->select('taxonomy_term_field_data', 'term_data');
    $query->addField('term_data', "tid");
    $query->addField('term_data', "name");
    $query->join($taxonomy_field_table_name, 'term_alias', 'term_alias.' . $field . '=term_data.tid');
    $query->condition('term_alias.entity_id', $tid);
    $result = $query->execute()->fetchAll();
    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return Cache::mergeContexts(parent::getCacheContexts(), ['route']);
  }

}
