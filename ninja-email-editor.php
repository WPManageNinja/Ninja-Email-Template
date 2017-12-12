<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://rafsan.pro
 * @since             1.0.0
 * @package           Ninja_Email_Editor
 *
 * @wordpress-plugin
 * Plugin Name:       Ninja Email Editor
 * Plugin URI:        https://authlab.io
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hashemi Rafsan
 * Author URI:        http://rafsan.pro
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ninja-email-editor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently pligin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
// define( 'PLUGIN_NAME_VERSION', '1.0.0' );
define( 'NINJA_EMAIL_EDITOR_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'NINJA_EMAIL_EDITOR_PUBLIC_DIR_URL', NINJA_EMAIL_EDITOR_DIR_URL . 'public/' );
define( 'NINJA_EMAIL_EDITOR_RESOURCE_DIR_URL', NINJA_EMAIL_EDITOR_DIR_URL . 'resources/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ninja-email-editor-activator.php
 */
function activate_ninja_email_editor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ninja-email-editor-activator.php';
	Ninja_Email_Editor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ninja-email-editor-deactivator.php
 */
function deactivate_ninja_email_editor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ninja-email-editor-deactivator.php';
	Ninja_Email_Editor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ninja_email_editor' );
register_deactivation_hook( __FILE__, 'deactivate_ninja_email_editor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ninja-email-editor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ninja_email_editor() {

	$plugin = new Ninja_Email_Editor();
	$plugin->run();

}
run_ninja_email_editor();
