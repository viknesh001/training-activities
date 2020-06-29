<?php

namespace Drupal\activityform\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class MydataController.
 *
 * @package Drupal\mydata\Controller
 */
class AddController extends ControllerBase {

  /**
   * Display.
   *
   * @return string
   *   Return Hello string.
   */
  public function display() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Lisitng all users ')
    ];
  }

}
