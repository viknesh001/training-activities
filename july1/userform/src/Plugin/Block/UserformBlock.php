<?php

namespace Drupal\userform\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'userformBlock' block.
 *
 * @Block(
 *  id = "userform_block",
 *  admin_label = @Translation("userform block"),
 * )
 */
class UserformBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    
    $form = \Drupal::formBuilder()->getForm('Drupal8\userform\Form\UserForm');

    return $form;
  }

}
