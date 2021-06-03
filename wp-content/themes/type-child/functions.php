<?php
//* Code goes here

// import parent theme styles
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

// import BootStrap scripts & styles
function bootstrap_styles_scripts() {
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri().'/bootstrap/dist/js/bootstrap.min.js', array('jquery'), NULL, true);
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri().'/bootstrap/dist/css/bootstrap.min.css', false, NULL, 'all');
}
add_action('wp_enqueue_scripts', 'bootstrap_styles_scripts', PHP_INT_MAX);

// import cardTile scripts
function cardtile_scripts() {
  wp_enqueue_script('cardTile-js', get_stylesheet_directory_uri().'/js/cardTile.js', array('jquery'), NULL, true);
}
add_action('wp_enqueue_scripts', 'cardtile_scripts', PHP_INT_MAX);

//import FontAwesome
function load_font_awesome() {
    wp_enqueue_style('font-awesome-css', get_stylesheet_directory_uri().'/fontawesome/css/all.css', false, NULL, 'all');
}
add_action( 'wp_enqueue_scripts', 'load_font_awesome' );

/* Calendar Events | Custom Post Type 
function custom_post_calendar_event() {
  $labels = array(
    'name'               => _x( 'Calendar Events', 'post type general name' ),
    'singular_name'      => _x( 'Calendar Event', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'event' ),
    'add_new_item'       => __( 'Add New Event' ),
    'edit_item'          => __( 'Edit Event' ),
    'new_item'           => __( 'New Event' ),
    'all_items'          => __( 'All Events' ),
    'view_item'          => __( 'View Event' ),
    'search_items'       => __( 'Search Events' ),
    'not_found'          => __( 'No calendar events found' ),
    'not_found_in_trash' => __( 'No calendar events found in the Trash' ), 
    'menu_name'          => 'Calendar'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our calendar event specific data',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
    'has_archive'   => true,
    'hierarchical' => false,
    'order' => 'DESC'
  );
  register_post_type( 'event', $args ); 
}
add_action( 'init', 'custom_post_calendar_event' );
*/
/* Taxonomy for Calendar Events 
function create_event_taxonomies() {
  register_taxonomy(
      'event_order',
      'event',
      array(
          'labels' => array(
              'name' => 'Add Tag',
              'add_new_item' => 'Add tag',
              'new_item_name' => "New tag"
          ),
          'show_ui' => true,
          'show_tagcloud' => false,
          'hierarchical' => true
      )
  );
}
add_action( 'init', 'create_event_taxonomies', 0 );
*/