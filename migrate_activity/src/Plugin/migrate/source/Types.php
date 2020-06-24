<?php
namespace Drupal\migrate_example\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for the types.
 *
 * @MigrateSource(
 *   id = "types"
 * )
 */
class Types extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('types', 'd')
      ->fields('d', ['id', 'name', 'description']);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Types ID'),
      'name' => $this->t('Type Name'),
      'description' => $this->t('Type Description'),
      'vegetables' => $this->t('Lists of vegetables'),
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
        'alias' => 'd',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    $vegetables = $this->select('Vegatables', 'g')
      ->fields('g', ['id'])
      ->condition('types_id', $row->getSourceProperty('id'))
      ->execute()
      ->fetchCol();
    $row->setSourceProperty('vegetables', $vegetables);
    return parent::prepareRow($row);
  }
}