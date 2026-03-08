<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class NodeSelectForm extends FormBase {

  public function getFormId(): string {
    return 'hello_world_node_select_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['node'] = [
      '#type'        => 'entity_autocomplete',
      '#target_type' => 'node',
      '#title'       => $this->t('Choisir un article'),
      '#required'    => TRUE,
    ];

    $form['submit'] = [
      '#type'  => 'submit',
      '#value' => $this->t('Valider'),
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state): void {
    $nid = $form_state->getValue('node');
    if (empty($nid)) {
      $form_state->setErrorByName('node', $this->t('Veuillez sélectionner un node.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $nid = $form_state->getValue('node');

    // Sauvegarder le nid sélectionné en session
    \Drupal::service('tempstore.private')
      ->get('hello_world')
      ->set('selected_nid', $nid);

    $this->messenger()->addStatus(
      $this->t('Node sélectionné avec succès !')
    );
  }
}