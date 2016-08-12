<?php

$plugins_url = WP_PLUGIN_URL . '/alabaster-sermonmanager';
$style_options = array();

function add_settings_page() {
    $page = add_submenu_page(
        'edit.php?post_type=sermons', 
        'Options',
        'Settings',
        'manage_options',
        'sermon-options',
        'alabaster_sermonmanager_options_page' );

        add_action('admin_print_styles-' . $page, 'alabaster_sermonmanager_admin_styles_and_scripts');


}

add_action('admin_menu', 'add_settings_page');

function alabaster_sermonmanager_admin_styles_and_scripts(){
	wp_enqueue_style('alabaster_sermonmanager_frontend_css', plugins_url('alabaster-sermon-manager/css/bootstrap.min.css'));
	wp_enqueue_style('alabaster_sermonmanager_audioskin_css', plugins_url('alabaster-sermon-manager/css/alabaster-sermonmanager-audio-skin.css'));
    wp_enqueue_script('font_awesome', 'https://use.fontawesome.com/e8cbf9f68e.js', array('jquery'), '', true);
}



function alabaster_sermonmanager_options_page() {
    if(!current_user_can('manage_options') ){
        wp_die('You do not have sufficient permissions to access this page.');
    }

    global $plugins_url;
    global $style_options;

    $seekbar_style = "#DC3522";
    $dock_color_style = "#1e1e20";
    $button_color_style = "#ffffff";

    if (isset($_POST['alabaster-sermonmanager-colorSubmit'])){

        $hidden_field = esc_html($_POST['alabaster-sermonmanager-colorSubmit']);

        if($hidden_field == 'Y'){
            $alabaster_sermonmanager_seekbar_color = esc_html($_POST['alabaster-sermonmanager-seekbar-color']);
            $alabaster_sermonmanager_dock_color = esc_html($_POST['alabaster-sermonmanager-dock-color']);
            $alabaster_sermonmanager_button_color = esc_html($_POST['alabaster-sermonmanager-button-color']);


            $style_options['alabaster-sermonmanager-seekbar-color'] = $alabaster_sermonmanager_seekbar_color;
            $style_options['alabaster-sermonmanager-dock-color'] = $alabaster_sermonmanager_dock_color;
            $style_options['alabaster-sermonmanager-button-color'] = $alabaster_sermonmanager_button_color;
            $style_options['last-updated'] = time();

            update_option( 'alabaster-sermonmanager-options', $style_options );

        }

    }

     $style_options = get_option('alabaster-sermonmanager-options');

        if($style_options != '' ){
            $seekbar_style = $style_options['alabaster-sermonmanager-seekbar-color'];
            $dock_color_style = $style_options['alabaster-sermonmanager-dock-color'];
            $button_color_style = $style_options['alabaster-sermonmanager-button-color'];
            $alabaster_sermonmanager_lastUpdate = $style_options['last-updated'];

        }


    require ("options-page-wrapper.php");
}
