<?php
namespace Drupal\register\Controller;
 
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Database\Database;
 
/**
 * Provides route responses for the Example module.
 */
class RegisterController extends ControllerBase {
 
  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function successpage() {
  //display thankyou page
    $element = array(
      '#markup' => 'Form  submitted',
    );
    return $element;
  }
 
 
}