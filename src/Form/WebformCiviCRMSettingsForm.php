<?php

namespace Drupal\webform_civicrm\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

include_once __DIR__ . '/../../includes/utils.inc';
include_once __DIR__ . '/../../includes/wf_crm_admin_help.inc';
include_once __DIR__ . '/../../includes/wf_crm_admin_form.inc';

class WebformCiviCRMSettingsForm extends FormBase {

  public function getFormId() {
    return 'webform_civicrm_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    /** @var \Drupal\webform\WebformInterface $webform */
    $webform =$this->getRouteMatch()->getParameter('webform');
    $admin_form = new \wf_crm_admin_form($form, $form_state, (object) [
      'nid' => $webform->id(),
      'title' => $this->getRouteMatch()->getParameter('webform')->label(),
    ]);
    $form = $admin_form->buildForm();;
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // @todo push settings into the civicrm webform handler.
  }

}
