<?php

namespace Drupal\lenguaje_favorito\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigurationForm extends ConfigFormBase
{

	/**
	 * {@inheritdoc}
	 */
	public function getFormId()
	{
		return 'lenguaje_favorito.configuration_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state)
	{
		$form = parent::buildForm($form, $form_state);

		$config = $this->config('lenguaje_favorito.configuration');

		// para agregar un nuevo elemento solo usamos el nombre del array y la llave

		// https://api.drupal.org/api/drupal/elements/8.5.x
		$form['lenguaje_favorito'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Ingrese su lenguaje de programación favorito'),
			'#default_value' => $config->get('lenguaje_favorito'),
			'#size' => 64,
			'#maxlength' => 64,
		];

		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state)
	{
		// TODO: Validar que el campo no sea vacío
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state)
	{
		$this->config('lenguaje_favorito.configuration')
			->set('lenguaje_favorito', $form_state->getValue('lenguaje_favorito'))
			->save();

		return parent::submitForm($form, $form_state);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getEditableConfigNames()
	{
		return [
			'lenguaje_favorito.configuration'
		];
	}
}
