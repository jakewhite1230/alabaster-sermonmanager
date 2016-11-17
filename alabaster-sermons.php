<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              alabaster.io
 * @since             1.0.0
 * @package           Alabaster_Sermons
 *
 * @wordpress-plugin
 * Plugin Name:       Alabaster Sermons
 * Plugin URI:        sermons.alabaster.io
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Jake White
 * Author URI:        alabaster.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       alabaster-sermons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-alabaster-sermons-activator.php
 */
function activate_alabaster_sermons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alabaster-sermons-activator.php';
	Alabaster_Sermons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-alabaster-sermons-deactivator.php
 */
function deactivate_alabaster_sermons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alabaster-sermons-deactivator.php';
	Alabaster_Sermons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_alabaster_sermons' );
register_deactivation_hook( __FILE__, 'deactivate_alabaster_sermons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-alabaster-sermons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_alabaster_sermons() {

	$plugin = new Alabaster_Sermons();
	$plugin->run();

}
run_alabaster_sermons();
