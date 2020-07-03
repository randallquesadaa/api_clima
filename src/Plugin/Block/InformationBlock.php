<?php

namespace Drupal\api_clima\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

//https://www.drupal.org/docs/8/creating-custom-modules/creating-custom-blocks/create-a-custom-block

/**
 * Bloque de información
 *
 * @Block(
 *   id = "information_block",
 *   admin_label = @Translation("Temperatura de Costa Rica"),
 * )
 */
class InformationBlock extends BlockBase implements ContainerFactoryPluginInterface
{

	/**
	 * @var AccountProxyInterface
	 */
	protected $current_user;

	/**
	 *@var ConfigFactory
	 */
	protected $config_factory;

	public function __construct(
		array $configuration,
		$plugin_id,
		$plugin_definition,
		AccountProxyInterface $current_user,
		ConfigFactory $config_factory
	) {
		parent::__construct($configuration, $plugin_id, $plugin_definition);

		$this->current_user = $current_user;
		$this->config_factory = $config_factory;
	}

	/**
	 * @param ContainerInterface $container
	 * @param array $configuration
	 * @param string $plugin_id
	 * @param mixed $plugin_definition
	 * @return static
	 */
	public static function create(
		ContainerInterface $container,
		array $configuration,
		$plugin_id,
		$plugin_definition
	) {
		return new static(
			$configuration,
			$plugin_id,
			$plugin_definition,
			$container->get('current_user'),
			$container->get('config.factory')
		);
	}

	public function build()
	{
		$build = [];

		$config = $this->config_factory->get('api_clima.configuration');
		$build['information_block'] = [
			'#prefix' => '<div class="card p-5 text-center mb-3" id="resultados">',
			'#suffix' => '</div>',
			'#attached' => [
                'library' => [
                    'api_clima/api_clima'
                ]
            ]
		];

		return $build;
	}

}
