<?php
/**
 * Plugin Name: Alabaster Sermon Manager.
 * Plugin URI: http://www.alabastercreative.co/SermonManager
 * Description: A wordpress plugin for churches to host their Sermons
 * Version: 1.0
 * Author: Jake White
 * Author URI: http://www.alabastercreative.co
 * License: GPL2
 */


/*
* Add a link to our plugin in the admin menu
*/

// This is the secret key for API authentication. You configured it in the settings menu of the license manager plugin.
define('YOUR_SPECIAL_SECRET_KEY', '57ba6fd56b4126.07916970'); //Rename this constant name so it is specific to your plugin or theme.

// This is the URL where API query request will be sent to. This should be the URL of the site where you have installed the main license manager plugin. Get this value from the integration help page.
define('YOUR_LICENSE_SERVER_URL', 'http://sermons.alabaster.io'); //Rename this constant name so it is specific to your plugin or theme.

// This is a value that will be recorded in the license manager data so you can identify licenses for this item/product.
define('YOUR_ITEM_REFERENCE', 'Alabaster Sermons - Single License'); //Rename this constant name so it is specific to your plugin or theme.

/* Create the settings page for the Alabaster Sermon Manager Plugin) */
include('inc/alabaster-sermonmanager-settings.php');


$license_data = get_option('sample_license_key');

if($license_data !=''){
	/* Create the custom post type of Sermons */
	include('inc/alabaster-sermonmanager-post.php');



	/* Create the taxonomies for Sermons */
	include('inc/alabaster-sermonmanager-taxonomies.php');

	/* Create the date selector meta box for Sermons (Including save features.) */
	include('inc/alabaster-sermonmanager-audio-upload.php');

	/* Create the date selector meta box for Sermons (Including save features.) */
	include('inc/alabaster-sermonmanager-date-selector.php');

	include('inc/alabaster-sermonmanager-taxonomy-series-image.php');
	include('inc/alabaster-sermonmanager-taxonomy-speaker-image.php');

	include('inc/alabaster-sermonmanager-shortcodes.php');

	function alabaster_sermonmanager_frontend_styles_and_scripts(){
		wp_enqueue_style('alabaster_sermonmanager_bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		wp_enqueue_script('alabaster_sermonmanager_bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array('jquery'), '', true);
		  if ( is_singular( 'sermon' ) ){
		  	wp_enqueue_script('alabaster_sermonmanager_audiocontrols_js', plugins_url('alabaster-sermon-manager/js/alabaster-sermonmanager-audio-controls.js'), array('jquery'), '', true);
				wp_enqueue_style('alabaster_sermonmanager_frontend_css', plugins_url('alabaster-sermon-manager/css/asm-audio-player.css'));
				wp_enqueue_style('source_sans_pro','https://fonts.googleapis.com/css?family=Source+Sans+Pro');
				wp_enqueue_style('material','https://fonts.googleapis.com/icon?family=Material+Icons');
				wp_enqueue_style('socialicons','https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css');
		  }

	}

	add_action('wp_enqueue_scripts', 'alabaster_sermonmanager_frontend_styles_and_scripts');


	function get_custom_field($field_name){
	  return get_post_meta(get_the_ID(),$field_name,'true');
	}

	add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
	function mw_enqueue_color_picker( $hook_suffix ) {
	    // first check that $hook_suffix is appropriate for your admin page
	    wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker' );
	}
}
