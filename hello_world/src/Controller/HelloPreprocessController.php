<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloPreprocessController extends ControllerBase {

  public function content(): array {
    return [
      '#theme' => 'hello_preprocess_page',  // template custom
    ];
  }

}