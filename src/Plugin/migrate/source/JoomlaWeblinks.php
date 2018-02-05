<?php

namespace Drupal\joomla_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for joomla weblink content.
 *
 * @MigrateSource(
 *   id = "joomla_weblinks"
 * )
 */
class JoomlaWeblinks extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    /**
     * An important point to note is that your query *must* return a single row
     * for each item to be imported.
     *
     */
    $config = \Drupal::config('joomlamigrate.settings');
    $database = $config->get('database');
    $prefix = $config->get('table_prefix');
    $query = $this->select($prefix . 'weblinks', 'jweb');
    //$query->join($prefix . 'contentitem_tag_map', 'jctm', 'jcon.id = jctm.content_item_id');
    $query->fields('jweb', [
                    'id',
                    'catid',
                    'title',
                    'alias',
                    'url',
                    'description',
                    'created_by',
                    'language']);
    // $query->fields('jctm', [
     //               'tag_id']);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('ID'),
      'catid' => $this->t('Category ID'),
      'title' => $this->t('Title'),
      'alias' => $this->t('Article URL'),
      'url' => $this->t('URLs'),
      'description' => $this->t('Description'),
      'created_by' => $this->t('Author ID'),
      'language' => $this->t('Language'),
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
        // This is an optional key currently only used by SqlBase.
        'alias' => 'jweb',
      ],
    ];
  }

}
