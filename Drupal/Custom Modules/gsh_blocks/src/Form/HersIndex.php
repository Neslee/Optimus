<?php

namespace Drupal\gsh_blocks\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
 * Class HersIndex.
 */
class HersIndex extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hers_index_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'gsh_blocks.hers_block',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('gsh_blocks.hers_block');
    $form['hers_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('HERS Index Title'),
      '#default_value' => $config->get('hers_title'),
    ];
    $form['hers_description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('HERS Index Description'),
      '#default_value' => $config->get('hers_description'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('gsh_blocks.hers_block')
      ->set('hers_title', $values['hers_title'])
      ->set('hers_description', $values['hers_description'])
      ->save();
    parent::submitForm($form, $form_state);
  }

}
