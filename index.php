<?php
/*
Plugin Name: Cleaner
Description: Data cleaner for PHP
Plugin URI: https://italystrap.com
Author: Enea Overclokk
Author URI: https://italystrap.com
Version: 1.0.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

/*

    Copyright (C) Year  Enea Overclokk  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require( __DIR__ . '/vendor/autoload.php' );

/**
 * debug_example
 */
function cleaner_example() {
	$sanitizator = new \ItalyStrap\Cleaner\Sanitization();
	$validator = new \ItalyStrap\Cleaner\Validation();


//	d( $sanitizator, $validate );

	$value = ' <p>Test</p> ';
	$expected = 'Test';

//	d( $sanitizator->sanitize( '', true ) );
//	d( $sanitizator->sanitize( '', 1.1 ) );
//	d( $sanitizator->sanitize( '', 1 ) );
//	d( $sanitizator->sanitize( 'trim|strip_tags|trim', $value ) );
//	d( $sanitizator->sanitize( '', $value ) );
//	d( $sanitizator->sanitize( 'trim', $value ) );
//	d( $sanitizator->sanitize( 'trim|strip_tags', $value ) );
//	d( $sanitizator->sanitize( 'trim|strip_tags|trim', $value ) );

//	\ItalyStrap\Cleaner\Sanitization::$always_sanitize = false;

//	d( $sanitizator->sanitize( '', 1 ) );
//	d( $sanitizator->sanitize( '', $value ) );

//	d( $validator->validate( 'is_email', 'test@localhost.com' ) );

	$callback = function ( $value ) {
		return  'New value from callback';
	};

//	d( $callback );
//
//	d( \call_user_func( $callback, 'Value' ) );

//	d( \explode( '|', '' ) );

	$rule = 'trim';

//	d( \explode( '|', $rule ) );

	$rules = 'trim|strip_tags';

//	d( \explode( '|', $rules ) );

	$rule_callable = [
		$callback
	];

//	d( $rule_callable );

	$rules_callable = [
		$callback,
		$callback,
	];

//	d( $rules_callable );

	$rules_arr = [
		'trim',
		'strip_tags'
	];

//	d( $rules_arr );


//	d( \array_merge(
//		\explode( '|', $rule ),
//		\explode( '|', $rules )
//	) );


//	$sanitizator->addRules( 'trim' );
//	$sanitizator->addRules( $callback );
//	$sanitizator->addRules( [$callback] );
//	$sanitizator->addRules( [$callback] );
//
//	d( $sanitizator->sanitize( '<p>Testo</p>' ) );
}

add_action( 'wp_footer', 'cleaner_example' );
