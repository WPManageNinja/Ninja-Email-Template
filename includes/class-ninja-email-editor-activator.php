<?php

/**
 * Fired during plugin activation
 *
 * @link       http://rafsan.pro
 * @since      1.0.0
 *
 * @package    Ninja_Email_Editor
 * @subpackage Ninja_Email_Editor/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ninja_Email_Editor
 * @subpackage Ninja_Email_Editor/includes
 * @author     Hashemi Rafsan <rafsan@authalab.io>
 */
class Ninja_Email_Editor_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		self::createEmailStoreTable();

	}

	public static function createEmailStoreTable() {
		global $wpdb;
		$table_name = $wpdb->prefix.'ninja_email_template';
		if (! self::tableExists( $table_name )) {
			$sql = "CREATE TABLE $table_name(
					id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					title VARCHAR(250) NOT NULL,
					template text,
					status ENUM('published','draft','trashed') DEFAULT 'draft',
					created_at timestamp NULL,
					updated_at timestamp NULL

			)";

			self::runSQL($sql);
		}

	}

	private static function tableExists($table_name) {
		global $wpdb;
		return $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) == $table_name;
	}

	private static function runSQL($sql) {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql. " $charset_collate;" );
	}

}
