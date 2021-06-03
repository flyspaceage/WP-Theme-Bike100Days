<?php
/**
 * Plugin Name: Bike 100 Days Calendar Events Plugin
 * Plugin URI: http://www.bike100days.com/
 * Description: Let's go add some events...
 * Version: 1.0
 * Author: FlySpaceAge
 * Author URI: https://www.facebook.com/spaceagepurp
 */


/* Calendar Events | Custom Post Type */
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

/* Taxonomy for Calendar Events */
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