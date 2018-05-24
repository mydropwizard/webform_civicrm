<?php

namespace Drupal\webform_civicrm\Plugin\WebformHandler;


use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\WebformSubmissionInterface;

/**
 * CiviCRM Webform Handler plugin.
 *
 * @WebformHandler(
 *   id = "webform_civicrm",
 *   label = @Translation("CiviCRM"),
 *   category = @Translation("CRM"),
 *   description = @Translation("Create some data in CiviCRM."),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 *   submission = \Drupal\webform\Plugin\WebformHandlerInterface::SUBMISSION_OPTIONAL,
 * )
 */
class CivicrmWebformHandler extends WebformHandlerBase {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    $form['stuff'] = [
      '#type' => 'textfield',
      '#title' => $this->t("Stuff"),
      '#default_value' => isset($config['settings']['stuff']) ? $config['settings']['stuff'] : '',
    ];

    $form['additional'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Additional stuff'),
    ];

    $form['additional']['hi'] = [
      '#type' => 'textfield',
      '#title' => $this->t('hi'),
    ];

    $form['other'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Other'),
    ];

    $form['other']['bye'] = [
      '#type' => 'textfield',
      '#title' => $this->t('bye'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();
    $config['settings']['stuff'] = $form_state->getValue('stuff');
    $this->setConfiguration($config);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission) {
    $this->getLogger('webform_civicrm')->info("Hi!");
    //$this->getWebform()->getHandlers();

    $webform = $this->getWebform();
  }

}