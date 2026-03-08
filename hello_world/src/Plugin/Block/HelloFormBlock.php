<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "hello_form_block",
 *   admin_label = @Translation("Hello Form Block"),
 *   category = @Translation("Hello World"),
 * )
 */
class HelloFormBlock extends BlockBase {

  public function build(): array {
    // ✅ Injecter le formulaire dans le build du block
    $form = \Drupal::formBuilder()->getForm(
      'Drupal\hello_world\Form\HelloForm'
    );

    return [
      '#type'     => 'markup',
      'form'      => $form,   // ← le formulaire dans le render array
    ];
  }
}