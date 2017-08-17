<?php
/**
 * Plugin Name: Torima
 * Plugin URI: https://github.com/hametuha/torima
 * Description: WP-CLI based dummy data generator
 * Version: 0.1.0
 * Author: Takahashi_Fumiki, hametuha
 * Author URI: https://hametuha.co.jp
 *
 * @package Hametuha\Torima
 */

// Skip if wp cli doesn't exist.
if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

// If it's already loaded, skip.
if ( defined( 'TORIMA_VERSION' ) ) {
	return;
}

/**
 * Get Trima's data
 *
 * @package Hametuha\Trima
 * @return array
 */
if ( ! function_exists( 'torima_data' ) ) {
	function torima_data() {
		static $info = [];
		if ( ! $info ) {
			$info = get_file_data( __FILE__, [
				'name'    => 'Plugin Name',
				'version' => 'Version',
			] );
		}

		return $info;
	}
}


// If plugin mode, require directly
$autoloader = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $autoloader ) ) {
	require $autoloader;
}

// Parse Directory and register commands.
$dir = __DIR__ . '/src/Hametuha/Torima/Commands';
if ( is_dir( $dir ) ) {
	foreach ( scandir( $dir ) as $file ) {
		if ( preg_match( '#^([^._].*)\.php$#', $file, $match ) ) {
			$class_name = "Hametuha\\Torima\\Commands\\{$match[1]}";
			if ( class_exists( $class_name ) ) {
				/** @var \Hametuha\Torima\AbstractCommand $class_name */
				WP_CLI::add_command( $class_name::command_name(), $class_name );
			}
		}
	}
}


define( 'TORIMA_VERSION', torima_data()['version'] );
