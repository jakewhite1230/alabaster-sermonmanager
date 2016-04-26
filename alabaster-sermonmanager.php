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


/* Create the custom post type of Sermons */
include('inc/alabaster-sermonmanager-post.php');



/* Create the taxonomies for Sermons */
include('inc/alabaster-sermonmanager-taxonomies.php');

/* Create the date selector meta box for Sermons (Including save features.) */
include('inc/alabaster-sermonmanager-audio-upload.php');

/* Create the date selector meta box for Sermons (Including save features.) */
include('inc/alabaster-sermonmanager-date-selector.php');

/* Create the settings page for the Alabaster Sermon Manager Plugin) */
include('inc/alabaster-sermonmanager-settings.php');

include('inc/alabaster-sermonmanager-taxonomy-image.php'); 

include('inc/alabaster-sermonmanager-shortcodes.php');

function alabaster_sermonmanager_frontend_styles_and_scripts(){
	wp_enqueue_style('alabaster_sermonmanager_frontend_css', plugins_url('alabaster-sermonmanager/css/bootstrap.min.css'));
	wp_enqueue_script('alabaster_sermonmanager_frontend_js', plugins_url('alabaster-sermonmanager/js/bootstrap.min.js'), array('jquery'), '', true);
	  if ( is_singular( 'alabaster-sermons' ) ){
	  	wp_enqueue_script('alabaster_sermonmanager_audiocontrols_js', plugins_url('alabaster-sermonmanager/js/alabaster-sermonmanager-audio-controls.js'), array('jquery'), '', true);
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
