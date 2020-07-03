<?php

namespace Drupal\api_clima\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigurationForm extends ConfigFormBase
{

	/**
	 * {@inheritdoc}
	 */
	public function getFormId()
	{
		return 'api_clima.configuration_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state)
	{
		$form = parent::buildForm($form, $form_state);

		$config = $this->config('api_clima.configuration');

		// para agregar un nuevo elemento solo usamos el nombre del array y la llave

		// https://api.drupal.org/api/drupal/elements/8.5.x
		$form['api_clima'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Ingrese tu clima mientras preparanos una sorpresa'),
			'#default_value' => $config->get('api_clima'),
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
		$this->config('api_clima.configuration')
			->set('api_clima', $form_state->getValue('api_clima'))
			->save();

		return parent::submitForm($form, $form_state);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getEditableConfigNames()
	{
		return [
			'api_clima.configuration'
		];
	}
}
