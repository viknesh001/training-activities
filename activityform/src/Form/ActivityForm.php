<?php

namespace Drupal\activityform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class MydataForm.
 *
 * @package Drupal\mydata\Form
 */
class ActivityForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'activityform_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $conn = Database::getConnection();
     $record = array();
    if (isset($_GET['num'])) {
        $query = $conn->select('activityform', 'm')
            ->condition('id', $_GET['num'])
            ->fields('m');
        $record = $query->execute()->fetchAssoc();

    }

    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name:'),      
      );
	  
	  $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name:'),      
      );
	  
	 
	$form['bio'] = array (
      '#type' => 'date',
      '#title' => t('Bio'),
    );
    
    $form['gender'] = array (
      '#type' => 'radios',
      '#title' => ('Gender'),
      '#options' => array(
        'Male' =>t('Male'),
        'Female' =>t('Female'),
		
      ),
    );   
	
	
    $form['submit'] = [
        '#type' => 'submit',
        '#value' => 'save',
        '#value' => t('Submit'),
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
  $first_name=$field['first_name'];
    
    $last_name=$field['last_name'];
    $bio=$field['bio'];
    $gender=$field['gender'];


   $field  = array(
              'first_name'   => $first_name,
              'last_name' =>  $last_name,
              'dob' =>  $dob,              
              'gender' => $gender,
          );
           $query = \Drupal::database();
           $query ->insert('activityform')
               ->fields($field)
               ->execute();
           drupal_set_message("succesfully saved");

       
  }
     }

	
