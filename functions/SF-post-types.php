<?php
// Our custom post type function
function create_posttype() {
  
    register_post_type( 'flavors',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Flavors' ),
                'singular_name' => __( 'Flavor' )
            ),
            'public' => true,
            'publicly_queryable' => false,
            'has_archive' => false,
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

add_action( 'init', 'create_posttype' );