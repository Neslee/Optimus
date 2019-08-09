<?php

namespace Drupal\gsh_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'GSH' block.
 *
 * @Block(
 *  id = "community_information_block",
 *  admin_label = @Translation("Community Information Block"),
 * )
 */
class CommunityInformationBlock extends BlockBase implements BlockPluginInterface {

  /**
   * Returns the term object of the current page if applicable.
   */
  private function getTerm() {
    if (\Drupal::routeMatch()->getParameter('taxonomy_term')) {
      $taxonomy = \Drupal::routeMatch()->getParameter('taxonomy_term');
    }
    elseif ($param = \Drupal::request()->query->get('tid')) {
      $taxonomy = Term::load($param);
    }
    else {
      $taxonomy = NULL;
    }

    return $taxonomy;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $result = [];
    $taxonomy = $this->getTerm();
    if ($taxonomy) {
      $result['title'] = $taxonomy->getName();
      $result['sub_title'] = $taxonomy->field_sub_title->value;
      $result['city'] = $taxonomy->field_sales_city->value;
      $result['state'] = $taxonomy->field_state->value;
      $result['street'] = $taxonomy->field_street_1->value;
      $result['zip'] = $taxonomy->field_zip->value;
      $result['tid'] = $taxonomy->tid->value;
      $startprice['min'] = number_format($taxonomy->field_new_homes_starting_at->value);
      $result['is_outside_community'] = $taxonomy->field_is_outside_of_community->value;
      $result['physical_city'] = $taxonomy->field_physical_city->value;
      $result['physical_state'] = $taxonomy->field_physical_state->value;
    }
    $sqft = $this->getCommunityInfo('node__field_square_feet', 'field_square_feet_value', $result['tid']);
    $sqft['max'] = number_format($sqft[0]->max);
    $sqft['min'] = number_format($sqft[0]->min);

    $bedrooms = $this->getCommunityInfo('node__field_bedrooms', 'field_bedrooms_value', $result['tid']);
    $bedrooms['max'] = $bedrooms[0]->max;
    $bedrooms['min'] = $bedrooms[0]->min;

    $bath = $this->getCommunityInfo('node__field_full_baths', 'field_full_baths_value', $result['tid']);
    $bath['max'] = $bath[0]->max;
    $bath['min'] = $bath[0]->min;

    $garage = $this->getCommunityInfo('node__field_garages', 'field_garages_value', $result['tid']);
    $garage['max'] = $garage[0]->max;
    $garage['min'] = $garage[0]->min;

    $storey = $this->getCommunityInfo('node__field_floors', 'field_floors_value', $result['tid']);
    $storey['max'] = $storey[0]->max;
    $storey['min'] = $storey[0]->min;

    return [
      '#theme' => 'community-information-block',
      '#term' => $result,
      '#sqft' => $sqft,
      '#bedrooms' => $bedrooms,
      '#bath' => $bath,
      '#garage' => $garage,
      '#storey' => $storey,
      '#startprice' => $startprice,
      '#cache' => [
        'tags' => $this->getCacheTags(),
        'contexts' => $this->getCacheContexts(),
      ],

    ];
  }

  /**
   * Helper function to fetch max and min values from property table.
   *
   * @param string $property_field_table_name
   *   Parameter to fetch the table name.
   * @param string $field
   *   Parameter to fetch the table name.
   * @param int $tid
   *   Parameter to fetch the taxonomy term id.
   *
   * @return object
   *   Returns the max and min values of the particular field.
   */
  public function getCommunityInfo($property_field_table_name, $field, $tid) {

    $query = \Drupal::database()->select($property_field_table_name, 'property_field_table_name');
    $query->addExpression("MAX($field)", 'max');
    $query->addExpression("MIN($field)", 'min');
    $query->leftJoin('node__field_community', 'community', 'property_field_table_name.entity_id = community.entity_id');
    $query->join('taxonomy_term_data', 'taxonomy', 'taxonomy.tid = community.field_community_target_id');
    $query->condition('taxonomy.tid', $tid);
    $result = $query->execute()->fetchAll();
    return $result;

  }

  /**
   * Helper function to get cache data.
   */
  public function getCacheTags() {
    // With this when your node change your block will rebuild.
    $term = $this->getTerm();
    if (empty($term)) {
      return parent::getCacheTags();
    }
    return Cache::mergeTags(parent::getCacheTags(), ['term:' . $term->id()]);
  }

  /**
   * Helper function to get cache contexts.
   */
  public function getCacheContexts() {
    // If you depends ona \Drupal::routeMatch()
    // you must set context of this block with 'route' context tag.
    // Every new route this block will rebuild.
    return Cache::mergeContexts(parent::getCacheContexts(), ['route']);
  }

}
