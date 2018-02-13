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
                  'street', 'zip_code', 'city', 'state', 'phone', 'fax', 'website', 'ages_served',
                  'other_services', 'specialty', 'if_other_please_enter_', 'country']);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'ID' => $this->t('Account ID'),
      'date_time' => $this->t('Creation Date'),
      'clinic_name' => $this->t('Clinic Name'),
      'director' => $this->t('Director'),
      'email' => $this->t('Email'),
      'street' => $this->t('Street Address'),
      'city' => $this->t('City'),
      'country' => $this->t('Country'),
      'state' => $this->t('State'),
      'zip_code' => $this->t('Zipcode'),
      'phone' => $this->t('Phone'),
      'fax' => $this->t('Fax'),
      'website' => $this->t('Website'),
      'ages_served' => $this->t('Ages Served'),
      'specialty' => $this->t('Specialty Group'),
      'if_other_please_enter_' => $this->t('Other Details'),
      'other_services' => $this->t('Other Services'),


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