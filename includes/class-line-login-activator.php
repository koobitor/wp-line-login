<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/koobitor/wp-line-login
 * @since      1.0.0
 *
 * @package    Line_Login
 * @subpackage Line_Login/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Line_Login
 * @subpackage Line_Login/includes
 * @author     Sakol Assawasagool <koobitor@gmail.com>
 */
class Line_Login_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$upgrader = new Linel_Upgrader( 'linel', LINEL_VERSION);
		$upgrader->upgrade_plugin();

		update_option('linel_version', LINEL_VERSION);
	}

}
