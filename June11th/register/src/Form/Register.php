<?php

namespace Drupal\register\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Entity;
use Drupal\Core\Url;
use Drupal\Core\Database\Database;

class Register extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'register';
  }
  
  public function buildForm(array $form, FormStateInterface $form_state) {
	
	$config = \Drupal::config('register.settings');
	$form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#maxlength' => 50,
      '#required' => TRUE,
    
    ];
    
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      '#maxlength' => 50,
      '#required' => TRUE,
    
    ];
	
	$form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('Password'),
	  '#required' => TRUE,	  
    ];
	
    
    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;

  }
  
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

    

  }
  
   public function submitForm(array &$form, FormStateInterface $form_state) {
    
    
    $config = \Drupal::service('config.factory')->getEditable('register.settings');
    $config->set('user.name', $form_state->getValue('username'));
    $config->set('user.email', $form_state->getValue('email'));
    $config->save();

    drupal_set_message($this->t("@message", ['@message' => 'Configuration Successfully Updated.']));
  }

}
