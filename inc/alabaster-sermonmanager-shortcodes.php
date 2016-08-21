<?php

	function alabaster_sermonmanager_series_shortcode($atts, $content = null) {

	global $post;
	extract(shortcode_atts(array(
			'num_sermons' => '8',
		), $atts));

	ob_start();

	require('taxonomy-series.php');

	$content = ob_get_clean();

	return $content;
}

add_shortcode('alabaster_sermonmanager_series', 'alabaster_sermonmanager_series_shortcode');

function alabaster_sermonmanager_speaker_shortcode($atts, $content = null) {

	global $post;
	extract(shortcode_atts(array(
			'num_sermons' => '8',
		), $atts));

	ob_start();

	require('taxonomy-speaker.php');

	$content = ob_get_clean();

	return $content;
}

add_shortcode('alabaster_sermonmanager_speaker', 'alabaster_sermonmanager_speaker_shortcode');

function alabaster_sermonmanager_sermons_shortcode($atts, $content = null) {

	global $post;
	extract(shortcode_atts(array(
			'num_sermons' => '8',
		), $atts));

	ob_start();

	require('archive.php');

	$content = ob_get_clean();

	return $content;
}

add_shortcode('alabaster_sermonmanager_sermons', 'alabaster_sermonmanager_sermons_shortcode');

add_filter( 'the_content', 'my_the_content_filter', 20 );

//This will add a button to pages for shortcode
add_action('init', 'add_asm_shortcode_button_to_pages');
function add_asm_shortcode_button_to_pages() {
	$asmPostId = $_REQUEST['post'];
	$asmPostType = get_post_type($asmPostId);
   if ($_REQUEST['post_type'] == "page" || $asmPostType == "page")
   {
     add_filter('mce_external_plugins', 'register_asm_shortcode_button');
     add_filter('mce_buttons', 'add_asm_shortcode_button');
   }
}

// inlcude the js for tinymce
function register_asm_shortcode_button( $plugin_array ) {

    $plugin_array['asm_button_location'] = plugins_url('alabaster-sermon-manager/js/asm-shortcodes.js');
    return $plugin_array;

}

// Add the button key for address via JS
function add_asm_shortcode_button( $buttons ) {

    array_push( $buttons, shortcodes );
    return $buttons;

}

add_action( 'admin_head', 'add_asm_shortcode_button');












function my_the_content_filter( $content ) {

    if ( is_singular( 'sermon' ) ){

    	$sermonDate = get_custom_field("sermon_date");
    	$sermonSpeaker = get_the_term_list($post->ID, 'speakers');
    	$sermonSeries = get_the_term_list($post->ID, 'series');
    	//$audio = "<audio id='alabaster-sermoncontrol-audio'> <source src='".get_custom_field('meta-image') ."'/> Your browser does not support the audio element. Please update browser.</audio>";
    	include('alabaster-sermonmanager-audio-skin.php');
		$output = $output . $audio;

		$content = $output . $content;

}

    // Returns the content.
    return $content;
}
