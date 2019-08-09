<?php

namespace Drupal\articleform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Custom form.
 */
class ArticleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['title'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => $this->t('Title'),
    ];
    $form['body'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Body'),
    ];
    $form['field_tags'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'taxonomy_term',
      '#selection_settings' => [
        'target_bundles' => ['tags'],
      ],
      '#title' => ('Tags'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'article')
      ->condition('title', $form_state->getValue('title'));
    $result = $query->execute();
    if (!empty($result)) {
      $form_state->setErrorByName('title', t('Title Already Exists'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $newNode = Node::create([
      'type' => 'article',
      'title' => $form_state->getValue('title'),
      'body' => $form_state->getValue('body'),
      'field_tags' => $form_state->getValue('field_tags'),
    ]);
    $newNode->save();

    $form_state->setRedirect('entity.node.canonical',
        ['node' => $newNode->id()]
     );
    drupal_set_message('Article ' . $form_state->getValue('title') . ' has been created.', 'status');
  }

}
