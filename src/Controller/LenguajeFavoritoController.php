<?php

namespace Drupal\lenguaje_favorito\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LenguajeFavoritoController extends ControllerBase {
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
		//parent::__construct();
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
		$config = $this->config_factory->get('lenguaje_favorito.configuration');
		//$lenguaje = 'JS';
		return [
			'#theme' => 'lenguaje_favorito',
            '#title' => 'Aqui esta tu lenguaje favorito',
            '#lenguaje' => $config->get('lenguaje_favorito'),
			'#attached' => [
				'library' => [
					'lenguaje_favorito/lenguaje_favorito',
				]
			]
		];   
	}
}