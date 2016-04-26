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

	require('archive-sermons.php');

	$content = ob_get_clean();

	return $content;
}

add_shortcode('alabaster_sermonmanager_sermons', 'alabaster_sermonmanager_sermons_shortcode');

add_filter( 'the_content', 'my_the_content_filter', 20 );
function my_the_content_filter( $content ) {

    if ( is_singular( 'alabaster-sermons' ) ){
      
    	$sermonDate = get_custom_field("sermon_date");
    	$sermonSpeaker = get_the_term_list($post->ID, 'speakers');
    	$sermonSeries = get_the_term_list($post->ID, 'series');
    	//$audio = "<audio id='alabaster-sermoncontrol-audio'> <source src='".get_custom_field('meta-image') ."'/> Your browser does not support the audio element. Please update browser.</audio>";
    	include('alabaster-sermonmanager-audio-skin.php');

    	$output = "<p>" . $sermonDate . " | " . $sermonSpeaker . " | " . $sermonSeries ."</p>";
		$output = $output . $audio;

		$content = $output . $content;

}

    // Returns the content.
    return $content;
}