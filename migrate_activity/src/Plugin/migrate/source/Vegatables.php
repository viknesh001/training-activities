<?php

namespace Drupal\migrate_example\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Source plugin for the vegetables.
 *
 * @MigrateSource(
 *   id = "vegetables"
 * )
 */
class Vegetables extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('vegetables', 'g')
      ->fields('g', ['id', 'types_id', 'name']);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Vegetables ID'),
      'types_id' => $this->t('Types ID'),
      'name' => $this->t('Vegetables name'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'g',
      ],
    ];
  }
}