<?php

namespace Drupal\joomla_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for Joomla Low Vision Providers Application.
 *
 * @MigrateSource(
 *   id = "joomla_low_vision"
 * )
 */
class JoomlaLowVision extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $config = \Drupal::config('joomlamigrate.settings');
    $database = $config->get('database');
    $prefix = $config->get('table_prefix');
    return $this->select('clinical_low_vision_service_providers2', 'jlv')
                ->fields('jlv', ['ID', 'date_time', 'clinic_name', 'director', 'email',
                  'street', 'zip_code', 'city', 'state', 'phone', 'tax', 'website', 'ages_served',
                  'other_services', 'specialty', 'if_other_please_enter_', 'country']);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'ID' => $this->t('Account ID'),

    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'ID' => [
        'type' => 'integer',
        'alias' => 'jlv',
      ],
    ];
  }

}