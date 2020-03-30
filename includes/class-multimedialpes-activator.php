<?php

/**
 * Fired during plugin activation
 *
 * @link       contact@leoboyer.fr
 * @since      1.0.0
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Multimedialpes
 * @subpackage Multimedialpes/includes
 * @author     Léo Boyer <contact@leoboyer.fr>
 */
class Multimedialpes_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
    global $wpdb;
    
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}multimedialpes_contest_types (id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255) NOT NULL, media_type VARCHAR(255) NOT NULL);");
	}

}
