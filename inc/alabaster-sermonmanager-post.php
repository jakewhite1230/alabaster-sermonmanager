<?php

function alabaster_sermonmanager() {

    $labels = array(
        'name' => _x( 'Sermon', 'sermon' ),
        'singular_name' => _x( 'Sermon', 'sermon' ),
        'add_new' => _x( 'Add New', 'alabaster-sermon' ),
        'add_new_item' => _x( 'Add New Sermon', 'sermon' ),
        'edit_item' => _x( 'Edit Sermon', 'sermon' ),
        'new_item' => _x( 'New Sermon', 'sermon' ),
        'view_item' => _x( 'View Sermon', 'sermon' ),
        'search_items' => _x( 'Search Sermon', 'sermon' ),
        'not_found' => _x( 'No sermons found', 'sermon' ),
        'not_found_in_trash' => _x( 'No sermons found in Trash', 'sermon' ),
        'parent_item_colon' => _x( 'Parent Sermon:', 'sermon' ),
        'menu_name' => _x( 'Sermons', 'sermon' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Sermon filterable by series',
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'sermon-options',
        'menu_position' => 5,
        'menu_icon' => 'dashicons-controls-volumeon',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' =>  array('slug'=>false, 'with_front' => false),
        'capability_type' => 'post'
    );

    register_post_type( 'sermon', $args );
}

add_action( 'init', 'alabaster_sermonmanager' );
