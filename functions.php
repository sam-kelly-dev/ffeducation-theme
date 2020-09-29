<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
function wpb_custom_new_menu() {
  register_nav_menu('footer-nav-menu',__( 'Footer Navigation Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function wpb_list_child_pages() { 
	global $post;

	if ( is_page() && $post->post_parent )	 
	    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
	else
	    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );	 
	if ( $childpages ) {	 
	    $string = '<ul>' . $childpages . '</ul>';
	}
	return $string;
}

function module_setup_post_type() {
	$labels = array(
		'parent_label_colon' => __('Parent Module')
	);
    $args = array(
        'hierarchical'  => true,
        'public'    	=> true,
        'labels'		=> $labels,
        'label'     	=> __( 'Modules', 'textdomain' ),
        'menu_icon' 	=> 'dashicons-book',
        'show_in_rest' 	=> true,
        'show_in_admin' => true,
        'show_in_ui'	=> true,
        'supports' 		=> array('page-attributes', 'editor', 'title', 'excerpt', 'thumbnail'),
    );
    register_post_type( 'module', $args );
}
add_action( 'init', 'module_setup_post_type' );

function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );
add_post_type_support( 'page', 'excerpt' );

function preview_page_filter ($content) {
	return apply_filters('the_content', $content);
}
add_filter('preview_page_filter', 'preview_page_filter', 10, 1);

function custom_excerpt_more($more) {
   global $post;
   $more_text = '';
   return '… <a href="'. get_permalink($post->ID) . '">' . $more_text . '</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function siblings($link) {
    global $post;
    $siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent);
    foreach ($siblings as $key=>$sibling){
        if ($post->ID == $sibling->ID){
            $ID = $key;
        }
    }
    $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));

    if ($link == 'before' || $link == 'after') { echo $closest[$link]; } else { return $closest; }
}