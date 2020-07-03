<?php

namespace Drupal\api_clima\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiClimaController extends ControllerBase {
	/*Inyección de dependencias, esto se hace cuando se puede llamar el constructor, se importa el controllerBase
	para poder acceder al metodo create y a partir de este podemos inyectar las dependencias, y podes acceder los
	accesos que necesitamos.*/
	/**
	 *@var ConfigFactory
	 */
	protected $config_factory;

	public function __construct(
		ConfigFactory $config_factory
	){
		$this->config_factory = $config_factory;
	}
	public static function create(
		ContainerInterface $container
	){
		return new static(
			$container->get('config.factory')
		);
	}
	/**
	 * Index.
	 *
	 * @return string
	 */
	public function index()
	{
		$config = $this->config_factory->get('api_clima.configuration');
		return [
			'#theme' => 'api_clima',
            '#title' => 'Aqui esta tu clima wey',
            '#clima' => $config->get('api_clima'),
			'#attached' => [
				'library' => [
					'api_clima/api_clima',
				]
			]
		];   
	}
}