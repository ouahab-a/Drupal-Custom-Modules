<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines HelloController class.
 */
class HelloController extends ControllerBase
{

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */

  public function __construct(
    private readonly LoggerChannelInterface $logger,
  ) {}

  public static function create(ContainerInterface $container): static
  {
    return new static(
      $container->get('logger.factory')->get('hello_world'),
    );
  }


  public function content()
  {

    // Récupérer la configuration.
    $config = $this->config('hello_world.settings');
    $name = $config->get('hello.name');

    // ✅ Logger en action — différents niveaux
    $this->logger->info('HelloController appelé pour @name', ['@name' => $name]);
    $this->logger->warning('Attention : nom vide !');
    $this->logger->error('Erreur critique dans HelloController');

    // Fallback si la config est vide
    if (!$name) {
      $name = 'World';
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, @name!', ['@name' => $name]),
      '#attached' => [
        'library' => ['hello_world/tailwind'],
      ],
    ];
  }
}
