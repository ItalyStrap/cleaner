<?php
/**
 * Validation API: Validation Class
 *
 * @package ItalyStrap
 * @since 1.0.0
 */

declare(strict_types=1);

namespace ItalyStrap\Cleaner;

/**
 * Validation class
 */
class Validation implements Validable_Interface {

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
	public function validate( string $rules, $instance_value = '' ): bool {

		if ( empty( $rules ) ) {
			return true;
		}

		$rules = explode( '|', $rules );

		foreach ( $rules as $rule ) {
			if ( false === $this->do_validation( $rule, $instance_value ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Validate the value of key
	 *
	 * @access private
	 * @param string $rule Insert the rule name you want to use for validation.
	 * @param string $instance_value The value you want to validate.
	 *
	 * @return bool
	 */
	private function do_validation( $rule, $instance_value = '' ): bool {

		if ( \is_callable( $rule ) ) {
			return (bool) \call_user_func( $rule, $instance_value );
		}

		return false;
	}
}
