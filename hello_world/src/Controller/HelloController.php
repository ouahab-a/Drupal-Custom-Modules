<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines HelloController class.
 */
class HelloController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function content() {
    // Récupérer la configuration.
    $config = $this->config('hello_world.settings');
    $name = $config->get('hello.name');

    // Fallback si la config est vide
    if (!$name) {
      $name = 'World';
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, @name!', ['@name' => $name]),
    ];
  }

}