<?php
/**
 * Sanitization API: Sanitization Class
 *
 * @todo https://github.com/zendframework/zend-escaper/blob/master/src/Escaper.php
 *
 * @package ItalyStrap
 * @since 1.0.0
 */

declare(strict_types=1);

namespace ItalyStrap\Cleaner;

/**
 * Sanitization class
 */
class Sanitization implements Sanitizable_Interface {

	/**
	 * Filter the given value
	 *
	 * @param  string $rules          Insert the filter name you want to use.
	 *                                Use | to separate more filter.
	 *                                The order of the filters is evaluate as is
	 *                                trim|strip_tags will be executed with this order:
	 *                                trim( strip_tags() )
	 *
	 * @param  string $instance_value The value you want to filter.
	 * @return string                 Return the value filtered
	 */
	public function sanitize( string $rules, $instance_value = '' ) {

		/**
		 * If $rules is empty explode will return an array with always be count() === 1
		 * [
		 * 	0	=> null
		 * ]
		 * and foreach will always run do_filter at least one time
		 */
		$rules = \explode( '|', $rules );

		foreach ( $rules as $rule ) {
			$instance_value = $this->do_filter( $rule, $instance_value );
		}

		return $instance_value;
	}

	/**
	 * Filter the value of key
	 *
	 * List of functions for sanitizing data:
	 * strip_tags
	 * wp_strip_all_tags
	 * esc_attr
	 * esc_url
	 * esc_textarea
	 * sanitize_email
	 * sanitize_file_name
	 * sanitize_html_class
	 * sanitize_key
	 * sanitize_meta
	 * sanitize_mime_type
	 * sanitize_sql_orderby
	 * sanitize_text_field
	 * sanitize_title
	 * sanitize_title_for_query
	 * sanitize_title_with_dashes
	 * sanitize_user
	 * sanitize_option // sanitize_option ha bisogno di 2 valori eseguire test
	 *
	 * @access private
	 * @param  string $rule         The filter name you want to use.
	 * @param  string $instance_value The value you want to filter.
	 * @return string                 Return the value filtered
	 */
	private function do_filter( $rule, $instance_value ) {

		if ( \is_callable( $rule ) ) {
			return \call_user_func( $rule, $instance_value );
		}

		return \strip_tags( (string) $instance_value );
	}
}
