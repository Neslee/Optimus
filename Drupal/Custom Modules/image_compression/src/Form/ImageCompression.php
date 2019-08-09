<?php

namespace Drupal\image_compression\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
  * Form handling for the image compression.
  */
class ImageCompression extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'image_compression_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'image_compression.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('image_compression.settings');
    $form['path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter the path to your file directory'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   *
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('image_compression.settings')
      ->set('path', $form_state->getValue('path'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}



