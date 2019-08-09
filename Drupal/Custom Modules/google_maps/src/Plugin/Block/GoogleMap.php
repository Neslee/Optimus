<?php

namespace Drupal\google_maps\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Render\Markup;

/**
 * Provides a 'GoogleMap' block.
 *
 * @Block(
 *  id = "maps_block",
 *  admin_label = @Translation("GoogleMaps"),
 * )
 */
class GoogleMap extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['field_location'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter Location'),
      '#description' => $this->t('Eg: Brazil,Mumbai,Portugal'),
      '#required' => TRUE,
      '#default_value' => isset($config['location']) ? $config['location'] : '',
    ];
    $form['field_latitude'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter Latitude'),
      '#description' => $this->t('Eg: 12.9716'),
      '#required' => TRUE,
      '#default_value' => isset($config['latitude']) ? $config['latitude'] : '',
    ];
    $form['field_longitude'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter Longitude'),
      '#description' => $this->t('Eg: 77.5946'),
      '#required' => TRUE,
      '#default_value' => isset($config['longitude']) ? $config['longitude'] : '',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('location', $form_state->getValue('field_location'));
    $this->setConfigurationValue('latitude', $form_state->getValue('field_latitude'));
    $this->setConfigurationValue('longitude', $form_state->getValue('field_longitude'));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $location = $config['location'];
    $latitude = $config['latitude'];
    $longitude = $config['longitude'];
    $res['latitude'] = $latitude;
    $res['longitude'] = $longitude;
    return [
      '#theme' => 'google-maps',
      '#node' => $res,
      '#title' => Markup::create('<h1>' . $location . '</h1>'),
    ];
  }

}
