<?php

namespace Drupal\webform_civicrm\Form;

use Drupal\Component\Utility\NestedArray;
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

  /**
   * AJAX callback for elements with a pathstr.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   The form element to refresh.
   */
  public static function pathstrAjaxRefresh(array &$form, FormStateInterface $form_state) {
    $triggering_element = $form_state->getTriggeringElement();
    $element = NestedArray::getValue($form, explode(':', $triggering_element['#ajax']['pathstr']));
    return $element;
  }

}
