<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://tspycher.com
 * @since      1.0.0
 *
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/includes
 * @author     Thomas Spycher <me@tspycher.com>
 */
class Wedding_Gifts_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wedding-gifts',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
