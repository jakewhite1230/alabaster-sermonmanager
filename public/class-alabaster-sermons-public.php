<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       alabaster.io
 * @since      1.0.0
 *
 * @package    Alabaster_Sermons
 * @subpackage Alabaster_Sermons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Alabaster_Sermons
 * @subpackage Alabaster_Sermons/public
 * @author     Jake White <jake.white@teamalabaster.com>
 */
class Alabaster_Sermons_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		if ( is_singular( 'sermons' ) ){
			wp_enqueue_style('alabaster_sermonmanager_frontend_css', plugins_url('alabaster-sermon-manager/css/asm-audio-player.css'));
			wp_enqueue_style('source_sans_pro','https://fonts.googleapis.com/css?family=Source+Sans+Pro');
			wp_enqueue_style('material','https://fonts.googleapis.com/icon?family=Material+Icons');
			wp_enqueue_style('socialicons','https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css');
	  }

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/alabaster-sermons-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if ( is_singular( 'sermons' ) ){
		  	wp_enqueue_script('alabaster_sermonmanager_audiocontrols_js', plugins_url('alabaster-sermon-manager/js/alabaster-sermonmanager-audio-controls.js'), array('jquery'), '', true);
		  }

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/alabaster-sermons-public.js', array( 'jquery' ), $this->version, false );

	}

	function add_asm_products_post_type() {

    $labels = array(
        'name' => _x( 'Sermons', 'sermons' ),
        'singular_name' => _x( 'Sermon', 'sermon' ),
        'add_new' => _x( 'Add New', 'alabaster-sermon' ),
        'add_new_item' => _x( 'Add New Sermon', 'sermon' ),
        'edit_item' => _x( 'Edit Sermon', 'sermon' ),
        'new_item' => _x( 'New Sermon', 'sermon' ),
        'view_item' => _x( 'View Sermon', 'sermon' ),
        'search_items' => _x( 'Search Sermons', 'sermon' ),
        'not_found' => _x( 'No sermons found', 'sermon' ),
        'not_found_in_trash' => _x( 'No sermons found in Trash', 'sermon' ),
        'parent_item_colon' => _x( 'Parent Sermon:', 'sermon' ),
        'menu_name' => _x( 'Sermons', 'sermon' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Sermons filterable by series',
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-controls-volumeon',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'sermons', $args );
}

}
