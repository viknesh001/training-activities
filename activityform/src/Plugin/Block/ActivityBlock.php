<?php

namespace Drupal\activityform\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'activity' block.
 *
 * @Block(
 *  id = "activityform_block",
 *  admin_label = @Translation("activityform block"),
 * )
 */
class MyformBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\activityform\Form\MyformForm');

    return $form;
  }

}
