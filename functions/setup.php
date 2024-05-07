<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

function b4st_setup() 
{
	// Gutenberg
	add_theme_support( 'wp-block-styles' );

	// b4st cannot support extra-wide blocks
	//add_theme_support( 'align-wide' );

	add_theme_support( 'editor-styles' );
	add_editor_style('theme/css/editor.css');

	// Theme
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	update_option('thumbnail_size_w', 285); /* internal max-width of col-3 */
	update_option('small_size_w', 350); /* internal max-width of col-4 */
	update_option('medium_size_w', 730); /* internal max-width of col-8 */
	update_option('large_size_w', 1110); /* internal max-width of col-12 */

	if ( ! isset($content_width) ) {
		$content_width = 1100;
	}

	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) );

	add_theme_support('automatic-feed-links');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Custom Excerpts
function b4stwp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function b4stwp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function b4stwp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function b4st_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'b4st') . '</a>';
}

// AVATAR ATTR
function b4st_avatar_attributes($avatar_attributes) 
{
	$display_name = get_the_author_meta( 'display_name' );
	$avatar_attributes = str_replace('alt=\'\'', 'alt=\'Avatar for '.$display_name.'\' title=\'Gravatar for '.$display_name.'\'',$avatar_attributes);
	return $avatar_attributes;
}

// AVATAR
function b4st_author_avatar() 
{
	echo get_avatar('', $size = '96');
}

// AUTHOR DESCIRPTIONS
function b4st_author_description() 
{
	echo get_the_author_meta('user_description');
}

// POST DATA
function b4st_post_date() 
{
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">(updated %4$s)</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		echo $time_string;
	}
}


/*------------------------------------*\
	ACTIONS
\*------------------------------------*/
add_action('init', 'b4st_setup');

/*------------------------------------*\
	FILTERS
\*------------------------------------*/

add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)

add_filter('excerpt_more', 'b4st_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts

add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)

add_filter('get_avatar','b4st_avatar_attributes');
