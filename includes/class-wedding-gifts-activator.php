<?php

/**
 * Fired during plugin activation
 *
 * @link       http://tspycher.com
 * @since      1.0.0
 *
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/includes
 * @author     Thomas Spycher <me@tspycher.com>
 */
class Wedding_Gifts_Activator {

	const DB_NAME = "weddinggifts_";

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::install_db();
	}

	protected static function install_db() {
		global $wpdb;
		self::install_db_gifts($wpdb);
		self::install_db_donations($wpdb);
	}

	private static function install_db_donations($wpdb) {
		$sql = sprintf("CREATE TABLE %s (
			id INT NOT NULL AUTO_INCREMENT,
			gift_id INT NOT NULL,
			comment text NOT NULL,
		  	`name` text NOT NULL,
		  	user_id INT,
			amount double NOT NULL,
		  	email text,
			`date` DATETIME NULL DEFAULT NOW(),
			PRIMARY KEY (`id`),
			CONSTRAINT `fk_gifts`
				FOREIGN KEY (gift_id)
				REFERENCES %s(id)
				ON DELETE NO ACTION
				ON UPDATE NO ACTION
		) %s;", Wedding_Gifts_Donation_Entity::dbname(), Wedding_Gifts_Entity::dbname(), $wpdb->get_charset_collate());

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

	private static function install_db_gifts($wpdb) {
		global $wpdb;

		$sql = sprintf("CREATE TABLE %s (
			id INT NOT NULL AUTO_INCREMENT,
			name varchar(250) NOT NULL,
			description text NOT NULL,
			picture_url text,
			price double,
			fixprice tinyint(1),
			url varchar(250),
			PRIMARY KEY (`id`)
		) %s;", Wedding_Gifts_Entity::dbname(), $wpdb->get_charset_collate());

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
}
