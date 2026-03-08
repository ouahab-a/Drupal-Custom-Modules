<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class HelloForm extends FormBase {

  public function getFormId(): string {
    return 'hello_world_hello_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['name'] = [
      '#type'        => 'textfield',
      '#title'       => $this->t('Votre nom'),
      '#required'    => TRUE,
      '#placeholder' => 'Entrez votre nom...',
    ];

    $form['submit'] = [
      '#type'  => 'submit',
      '#value' => $this->t('Envoyer'),
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state): void {
    $name = $form_state->getValue('name');

    // Validation : nom trop court
    if (strlen($name) < 3) {
      $form_state->setErrorByName(
        'name',
        $this->t('Le nom doit contenir au moins 3 caractères.')
      );
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $name = $form_state->getValue('name');

    // ✅ Message vert après soumission
    $this->messenger()->addStatus(
      $this->t('Bonjour @name, votre formulaire a été soumis !', ['@name' => $name])
    );

    // ✅ Redirect après soumission
    $form_state->setRedirectUrl(
      Url::fromRoute('hello_world.content')
    );
  }
}