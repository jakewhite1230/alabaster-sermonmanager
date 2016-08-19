<?php

$plugins_url = WP_PLUGIN_URL . '/alabaster-sermonmanager';
$style_options = array();

function add_settings_page() {
    $page = add_submenu_page(
        'edit.php?post_type=sermon',
        'Options',
        'Settings',
        'manage_options',
        'sermon-options',
        'alabaster_sermonmanager_options_page' );

        add_action('admin_print_styles-' . $page, 'alabaster_sermonmanager_admin_styles_and_scripts');


}

add_action('admin_menu', 'add_settings_page');

function alabaster_sermonmanager_admin_styles_and_scripts(){
	wp_enqueue_style('alabaster_sermonmanager_audioskin_css', plugins_url('alabaster-sermon-manager/css/alabaster-sermonmanager-audio-player.css'));
  wp_enqueue_style('source_sans_pro','https://fonts.googleapis.com/css?family=Source+Sans+Pro');
	wp_enqueue_style('material','https://fonts.googleapis.com/icon?family=Material+Icons');
	wp_enqueue_style('socialicons','https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css');
}



function alabaster_sermonmanager_options_page() {
    if(!current_user_can('manage_options') ){
        wp_die('You do not have sufficient permissions to access this page.');
    }

    global $plugins_url;
    global $style_options;

    $primary_style = "#f05555";
    $secondary_style = "#656565";

    if (isset($_POST['alabaster-sermonmanager-colorSubmit'])){

        $hidden_field = esc_html($_POST['alabaster-sermonmanager-colorSubmit']);

        if($hidden_field == 'Y'){
            $alabaster_sermonmanager_primary_color = esc_html($_POST['alabaster-sermonmanager-primary-color']);
            $alabaster_sermonmanager_secondary_color = esc_html($_POST['alabaster-sermonmanager-secondary-color']);



            $style_options['alabaster-sermonmanager-primary-color'] = $alabaster_sermonmanager_primary_color;
            $style_options['alabaster-sermonmanager-secondary-color'] = $alabaster_sermonmanager_secondary_color;
            $style_options['last-updated'] = time();

            update_option( 'alabaster-sermonmanager-options', $style_options );

        }

    }

     $style_options = get_option('alabaster-sermonmanager-options');

        if($style_options != '' ){
            $primary_style = $style_options['alabaster-sermonmanager-primary-color'];
            $secondary_style = $style_options['alabaster-sermonmanager-secondary-color'];
            $alabaster_sermonmanager_lastUpdate = $style_options['last-updated'];

        }


    require ("options-page-wrapper.php");
}
