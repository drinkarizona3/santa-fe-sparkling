<?php
// Our custom post type function
function SF_create_flavor_post_type() {
  
    register_post_type( 'sf_flavor',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Flavors', 'santa-fe' ),
                'singular_name' => __( 'Flavor', 'santa-fe' )
            ),
            'public' => true,
            'publicly_queryable' => false,
            'has_archive' => true,
            'rewrite' => array('slug' => 'flavors'),
            'show_in_rest' => true,
            'menu_position' => '3.3',
            'menu_icon' => 'dashicons-carrot',
            'supports'  => array( 
                'title', 
                'editor', 
                'excerpt', 
                'author', 
                'thumbnail', 
                'revisions', 
                'custom-fields', 
            )
        )
    );
}

add_action( 'init', 'SF_create_flavor_post_type' );