<?php 

/**
 * Add theme support
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 */

add_theme_support('post-thumbnails');
add_theme_support('menus');

add_theme_support( 'custom-logo', array(
    'height'               => 100,
    'width'                => 400,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true,
) );


/**
 * Enqueue scxripts and styles
 * @link  https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */

 function flamingo_enqueue_scripts_and_styles() {
    wp_enqueue_style( 'flamingo_style',  'get_stylesheet_uri'());
 }

 add_action('wp_enqueue_scripts', 'flamingo_enqueue_scripts_and_styles' );


 /**
  * Register post types 
  * @link https://developer.wordpress.org/reference/functions/register_post_type/
  */
function flamingo_custom_post_init() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post type general name', 'flamingo-theme' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'flamingo-theme' ),
        'menu_name'             => _x( 'Projects', 'Admin Menu text', 'flamingo-theme' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'flamingo-theme' ),
        'add_new'               => __( 'Add New', 'flamingo-theme' ),
        'add_new_item'          => __( 'Add New project', 'flamingo-theme' ),
        'new_item'              => __( 'New project', 'flamingo-theme' ),
        'edit_item'             => __( 'Edit project', 'flamingo-theme' ),
        'view_item'             => __( 'View project', 'flamingo-theme' ),
        'all_items'             => __( 'All projects', 'flamingo-theme' ),
        'search_items'          => __( 'Search projects', 'flamingo-theme' ),
        'parent_item_colon'     => __( 'Parent projects:', 'flamingo-theme' ),
        'not_found'             => __( 'No projects found.', 'flamingo-theme' ),
        'not_found_in_trash'    => __( 'No projects found in Trash.', 'flamingo-theme' ),
        'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'flamingo-theme' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'flamingo-theme' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'flamingo-theme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'flamingo-theme' ),
        'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'flamingo-theme' ),
        'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'flamingo-theme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'flamingo-theme' ),
        'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'flamingo-theme' ),
        'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'flamingo-theme' ),
        'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'flamingo-theme' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'project custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-portfolio', //Change icon here
        'supports'           => array( 'title', 'editor','excerpt', 'thumbnail' ),
        'taxonomies'         => array(),
        'show_in_rest'       => true
    );
      
    register_post_type( 'project', $args ); //Register name of post type and its settings
}
add_action( 'init', 'flamingo_custom_post_init' );


/**
 * Register menus
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */

 function flamingo_register_menus() {

    $args = [
        'main_menu' => 'Huvudmeny',
        'main_menu_singular' => 'Huvudmeny (undersidor/enskilda inkägg'
    ];

    register_nav_menus( $args );
 }

 add_action('after_setup_theme', 'flamingo_register_menus');