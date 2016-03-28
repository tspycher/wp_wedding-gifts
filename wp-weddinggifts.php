<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://tspycher.com
 * @package           Wedding_Gifts
 *
 * @wordpress-plugin
 * Plugin Name:       Wedding Gifts
 * Plugin URI:        http://tspycher.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.1.0
 * Author:            Thomas Spycher
 * Author URI:        http://tspycher.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wedding-gifts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wedding-gifts-activator.php
 */
function activate_wedding_gifts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts-activator.php';
	Wedding_Gifts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wedding-gifts-deactivator.php
 */
function deactivate_wedding_gifts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts-deactivator.php';
	Wedding_Gifts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wedding_gifts' );
register_deactivation_hook( __FILE__, 'deactivate_wedding_gifts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts-giftrenderer.php';

require plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts-entitymanager.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts-entity.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts-donation-entity.php';

require plugin_dir_path( __FILE__ ) . 'includes/class-wedding-gifts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wedding_gifts() {

	$plugin = new Wedding_Gifts();
	$plugin->run();

}
run_wedding_gifts();
