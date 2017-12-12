<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://rafsan.pro
 * @since      1.0.0
 *
 * @package    Ninja_Email_Editor
 * @subpackage Ninja_Email_Editor/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ninja_Email_Editor
 * @subpackage Ninja_Email_Editor/admin
 * @author     Hashemi Rafsan <rafsan@authalab.io>
 */
class Ninja_Email_Editor_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->addMenu();

	}

	public function addMenu() {
		add_action('admin_menu', array($this, 'addMenuSettings'));
	}

	public function addMenuSettings() {
		global $submenu;
		add_menu_page(
			__('Ninja Email Editor', 'ninja-email-editor'),
			__('Ninja Email Editor', 'ninja-email-editor'),
			'manage_options',
			'ninja_email_editor',
			array($this, 'main_page')
		);

		$submenu['ninja_email_editor'][] = array(
			__( 'All Email Template', 'ninja-email-editor' ),
			'manage_options',
			'admin.php?page=ninja_email_editor#/',
			array($this, 'menu_page_callback')
		);
	}

	public function main_page() {
		echo "<div>";
			include __DIR__.'/partials/ninja-email-editor-admin-display.php';
		echo '</div>';
	}

	public function menu_page_callback() {
		
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ninja_Email_Editor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ninja_Email_Editor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ninja-email-editor-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ninja_Email_Editor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ninja_Email_Editor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ninja-email-editor-admin.js', array( 'jquery' ), $this->version, false );

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ninja-email.js', array( 'jquery' ), $this->version, false );

	}

	public function react_load() {
		echo '"<script type="text/javascript" src="'. plugin_dir_url( __FILE__ ) . 'js/ninja-email.js' . '"></script>"';
	}

}
