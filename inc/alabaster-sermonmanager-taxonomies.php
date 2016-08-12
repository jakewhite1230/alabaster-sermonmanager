<?php

function series_taxonomy() {
    register_taxonomy(
        'series',
        'sermons',
        array(
            'hierarchical' => true,
            'label' => 'Series',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'series',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'series_taxonomy');

function speaker_taxonomy() {
    register_taxonomy(
        'speakers',
        'sermons',
        array(
            'hierarchical' => true,
            'label' => 'Speaker',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'speakers',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'speaker_taxonomy');

function create_podcast() {
        wp_insert_term(
            'Podcast',
            'category',
                array(
                    'description' => 'Select this category to podcast the sermon',
                    'slug'    => 'podcast'
                     )
            );

}

add_action( 'after_setup_theme', 'create_podcast' );



?>
