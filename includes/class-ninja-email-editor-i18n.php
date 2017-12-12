<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://rafsan.pro
 * @since      1.0.0
 *
 * @package    Ninja_Email_Editor
 * @subpackage Ninja_Email_Editor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ninja_Email_Editor
 * @subpackage Ninja_Email_Editor/includes
 * @author     Hashemi Rafsan <rafsan@authalab.io>
 */
class Ninja_Email_Editor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ninja-email-editor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
