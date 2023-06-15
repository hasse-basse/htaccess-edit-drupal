<?php

namespace Drupal\htaccess_editor\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a form for editing the htaccess file.
 */
class HtaccessEditorForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'htaccess_editor_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['htaccess_editor'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Htaccess Editor'),
      '#description' => $this->t('Edit the htaccess file.'),
      '#default_value' => file_get_contents('.htaccess'),
      '#rows' => 20,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save htaccess'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $content = $form_state->getValue('htaccess_editor');

    // Save the edited htaccess content to the file.
    $result = file_put_contents('.htaccess', $content);

    if ($result !== FALSE) {
      \Drupal::messenger()->addMessage($this->t('Htaccess file saved successfully.'));
    }
    else {
      \Drupal::messenger()->addError($this->t('Error saving htaccess file.'));
    }
  }

}
