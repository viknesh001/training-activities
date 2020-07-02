<?php

namespace Drupal\userform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class userform.
 *
 * @package Drupal\userdata\Form
 */
class UserForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'user_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $conn = Database::getConnection();
     $record = array();
    if (isset($_GET['num'])) {
        $query = $conn->select('userform', 'm')
            ->condition('id', $_GET['num'])
            ->fields('m');
        $record = $query->execute()->fetchAssoc();

    }

    

    $form['mobile_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Mobile Number:'),
      '#default_value' => (isset($record['mobilenumber']) && $_GET['num']) ? $record['mobilenumber']:'',
      );

    

    $form['address'] = array (
      '#type' => 'textfield',
      '#title' => t('Address'),
      '#required' => TRUE,
      '#default_value' => (isset($record['address']) && $_GET['num']) ? $record['address']:'',
       );
	
	
    $form['submit'] = [
        '#type' => 'submit',
        '#value' => 'save',
       
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {

         
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $field=$form_state->getValues();   
    
    $number=$field['mobile_number'];
    $address=$field['address'];
    
    
   $field  = array(	  
	  'mobilenumber' =>  $number,              
	  'address' => $address,
  );
   $query = \Drupal::database();
   $query ->insert('userform')
	   ->fields($field)
	   ->execute();
   drupal_set_message("succesfully saved");

     }

}
