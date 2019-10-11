<?php
/**
 * @package wp-active-check
 * @author kmix39
 * @license GPL-2.0+
 */

namespace Kmix39\WP_Active_Check;

class Bootstrap {

	public function is_theme_active( $check_options ) {
		if ( ! is_array( $check_options ) ) {
			error_log( 'Kmix39_WP_Active_Check error. is_theme_active: $check_options is not array.' );
			return false;
		}
		$now_theme = wp_get_theme( get_template() );
		foreach ( $check_options as $name => $version ) {
			if ( $now_theme->template === $name && version_compare( $now_theme->get( 'Version' ), $version[0], $version[1] ) ) {
				return true;
			}
		}
		return false;
	}

	public function is_plugin_active( $check_options ) {
		if ( ! is_array( $check_options ) ) {
			error_log( 'Kmix39_WP_Active_Check error. is_plugin_active: $check_options is not array.' );
			return false;
		}
		if ( ! function_exists( 'is_plugin_active' ) || ! function_exists( 'get_plugin_data' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		foreach ( $check_options as $name => $version ) {
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $name );
			if ( is_plugin_active( $name ) && version_compare( $plugin_data['Version'], $version[0], $version[1] ) ) {
				return true;
			}
		}
		return false;
	}

	public function is_plugins_active( $check_options ) {
		if ( ! is_array( $check_options ) ) {
			error_log( 'Kmix39_WP_Active_Check error. is_plugins_active: $check_options is not array.' );
			return false;
		}
		if ( ! function_exists( 'is_plugin_active' ) || ! function_exists( 'get_plugin_data' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		foreach ( $check_options as $name => $version ) {
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $name );
			if ( ! is_plugin_active( $name ) || ! version_compare( $plugin_data['Version'], $version[0], $version[1] ) ) {
				return false;
			}
		}
		return true;
	}

}
