<?php

namespace Hametuha\Torima\Commands;


use Hametuha\Torima\Data\Prefecture;
use Hametuha\Torima\Pattern\AbstractCommand;
use cli\Table;

/**
 * Dummy data collection for WordPress.
 *
 * @package Hametuha\Torima\Commands
 */
class Torima extends AbstractCommand {


	protected $prefs = [

	];

	/**
	 * Show information about this command.
	 */
	public function info() {
		$table = new Table();
		$table->setHeaders( [ 'Property', 'Value' ] );
		foreach ( torima_data() as $key => $value ) {
			$table->addRow( [ strtoupper( $key ), $value ] );
		}
		$table->display();
	}

	/**
	 * Register all prefectures in Japan as taxonomy.
	 *
	 * ## OPTIONS
	 *
	 * [--taxonomy=<taxonomy>]
	 * : Taxonomy name. Default is area.
	 *
	 * [--no-root]
	 * : If set, area name like "Tohoku" will not be imported.
	 *
	 * [--no-index]
	 * : If set, term meta won't be imported.
	 *
	 * @synopsis [--taxonomy=<taxonomy>] [--no-root] [--no-index]
	 * @param array $args
	 * @param array $assoc
	 */
	public function todoufuken( $args, $assoc ) {
		$taxonomy = isset( $assoc['taxonomy'] ) ? $assoc['taxonomy'] : 'area';
		$no_root = isset( $assoc['no-root'] ) && $assoc['no-root'];
		$no_index = isset( $assoc['no-index'] ) && $assoc['no-index'];
		$errors = 0;
		$pref_index = 0;
		foreach ( Prefecture::$prefs as $index => $area ) {
			list( $area_name, $area_slug, $prefs ) = $area;
			$area_id = 0;
			if ( ! $no_root ) {
				$result = wp_insert_term($area_name, $taxonomy, [
					'slug' => $area_slug,
				] );
				if ( ! is_wp_error( $result ) ) {
					$area_id = $result['term_id'];
					if ( ! $no_index ) {
						update_term_meta( $area_id, 'area_order', $index );
					}
				} else {
					\WP_CLI::warning( $result->get_error_message() );
					$errors++;
				}
			}
			foreach ( $prefs as $pref ) {
				list( $pref_name, $pref_slug ) = $pref;
				$result = wp_insert_term( $pref_name, $taxonomy, [
					'slug' => $pref_slug,
					'parent' => $area_id,
				] );
				if ( is_wp_error( $result ) ) {
					\WP_CLI::warning( $result->get_error_message() );
					$errors++;
				} else {
					if ( ! $no_index ) {
						update_term_meta( $result['term_id'], 'pref_order', $pref_index );
					}
				}
				$pref_index++;
			}
		}
		if ( $errors ) {
			\WP_CLI::error( sprintf( 'Import done with %s.', ( 1 === $errors ) ? '1 error' : sprintf( '%d errors', $errors ) ) );
		} else {
			\WP_CLI::success( 'Import done!' );
		}
	}
}
