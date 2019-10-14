<?php


namespace ItalyStrap\Cleaner;


interface Sanitizable_Interface
{

	/**
	 * Filter the given value
	 *
	 * @param  string $rules          Insert the filter name you want to use.
	 *                                Use | to separate more filter.
	 *
	 * @param  string $instance_value The value you want to filter.
	 * @return string                 Return the value filtered
	 */
	public function sanitize( string $rules, $instance_value = '' );
}