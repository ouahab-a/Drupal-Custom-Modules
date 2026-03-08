<?php

declare(strict_types=1);

namespace Drupal\hello_world\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Returns responses for Hello World Module routes.
 */
final class HelloQueryController extends ControllerBase
{

  /**
   * Builds the response.
   */
  public function build(): JsonResponse
  {

    $name = \Drupal::request()->query->get('name') ?: 'anonyme';

    $url = Url::fromRoute('hello_world.hello_query');

    $link = Link::fromTextAndUrl('Hello Query', $url);
    $link = $link->toString();
    // dump($link); ==> "<a href="/en/hello-query">Hello Query</a>"

    if ($name !== '' && $name !== null) {
      $result = new JsonResponse([
        'message' => 'Hello',
        'name' => $name,
      ]);
    }

    return $result;
  }
}
