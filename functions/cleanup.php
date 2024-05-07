<?php

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Less stuff in <head>
function b4st_cleanup_head() 
{
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
}

// Show less info to users on failed login for security.
// (Will not let a valid username be known.)
function show_less_login_info() 
{
  return "<strong>ERROR</strong>: Stop guessing!";
}

// Do not generate and display WordPress version
function b4st_remove_generator()  
{
  return '';
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove Query Strings From Static Resources
function b4st_remove_script_version( $src ) 
{
  if ( current_user_can('manage_options') ) {
    return $src;
  }
  if( strpos( $src, '?ver=' ) ) {
    $src = remove_query_arg( 'ver', $src );
    return $src;
  }
}



/*------------------------------------*\
	ADD ACTIONS
\*------------------------------------*/
add_action('init', 'b4st_cleanup_head');

/*------------------------------------*\
	ADD FILTERS
\*------------------------------------*/ 
add_filter( 'login_errors', 'show_less_login_info' );
add_filter( 'the_generator', 'no_generator' );
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation

// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)

add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)

// add_filter( 'script_loader_src', 'b4st_remove_script_version', 15, 1 );
// add_filter( 'style_loader_src', 'b4st_remove_script_version', 15, 1 );


/*------------------------------------*\
	REMOVE FILTERS
\*------------------------------------*/ 
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether