<?php


namespace ItalyStrap\Cleaner;


interface Validable_Interface
{
	/**
	 * Validate the give value
	 *
	 * @todo Aggiungere rule required
	 *       Prendere spunto da questo articolo
	 *       https://tommcfarlin.com/validation-and-sanitization-wordpress-settings-api
	 *       In particolare la classe Address_Validator
	 *       Se presente il parametro required inviare
	 *       un errore che notifica il campo richiesto.
	 *       Esempio: 'required|alpha_dash'

	 * @param  string $rules          Insert the rule name you want to use
	 *                                for validation.
	 *                                Use | to separate more rules.
	 * @param  string $instance_value The value you want to validate.
	 * @return bool                   Return true if valid and folse if it is not
	 */
	public function validate( string $rules, $instance_value = '' );
}