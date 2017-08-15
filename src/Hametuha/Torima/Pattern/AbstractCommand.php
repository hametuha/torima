<?php

namespace Hametuha\Torima\Pattern;

/**
 * Command sequesnce
 *
 * @package Hametuha\Torima
 */
abstract class AbstractCommand extends \WP_CLI_Command {

	/**
	 * Returns command name
	 *
	 * @return string
	 */
	public static function command_name() {
		$class_name = explode( '\\', get_called_class() );
		return strtolower( ltrim( preg_replace_callback( '#(?<![A-Z])([A-Z])#', function( $matches ) {
			return '-' . $matches[1];
		}, $class_name[ count( $class_name ) - 1 ] ), '-' ) );
	}
}
