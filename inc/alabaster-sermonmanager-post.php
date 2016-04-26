<?php 

function alabaster_sermonmanager() {
 
    $labels = array(
        'name' => _x( 'Sermons', 'alabaster-sermons' ),
        'singular_name' => _x( 'Sermon', 'alabaster-sermon' ),
        'add_new' => _x( 'Add New', 'alabaster-sermon' ),
        'add_new_item' => _x( 'Add New Sermon', 'alabaster-sermon' ),
        'edit_item' => _x( 'Edit Sermon', 'alabaster-sermon' ),
        'new_item' => _x( 'New Sermon', 'alabaster-sermon' ),
        'view_item' => _x( 'View Sermon', 'alabaster-sermon' ),
        'search_items' => _x( 'Search Sermons', 'alabaster-sermon' ),
        'not_found' => _x( 'No sermons found', 'alabaster-sermon' ),
        'not_found_in_trash' => _x( 'No sermons found in Trash', 'alabaster-sermon' ),
        'parent_item_colon' => _x( 'Parent Sermon:', 'alabaster-sermon' ),
        'menu_name' => _x( 'Sermons', 'alabaster-sermon' ),
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
 
    register_post_type( 'alabaster-sermons', $args );
}
 
add_action( 'init', 'alabaster_sermonmanager' );

