<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       alabaster.io
 * @since      1.0.0
 *
 * @package    Alabaster_Sermons
 * @subpackage Alabaster_Sermons/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Alabaster_Sermons
 * @subpackage Alabaster_Sermons/includes
 * @author     Jake White <jake.white@teamalabaster.com>
 */
class Alabaster_Sermons_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'alabaster-sermons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
