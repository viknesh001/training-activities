<?php

namespace Drupal\userform\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class userformController.
 *
 * @package Drupal\userform\Controller
 */
class UserController extends ControllerBase {

  /**
   * Display.
   *
   * @return string
   *   Return Hello string.
   */
  public function display() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This page contain all inforamtion about user  ')
    ];
  }

}
