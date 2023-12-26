<?php
function university_post_types(){
  //EVENT POST TYPE
  register_post_type('event', array(
    // to appear in members plugin post types tab
    'capability_type' => 'event',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

  //PROGRAM POST TYPE
  register_post_type('program', array(
    'supports' => array('title', 'editor'),
    'rewrite' => array('slug' => 'programs'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));

  //PROFESSOR POST TYPE
  register_post_type('professor', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'Professors',
      'add_new_item' => 'Add New Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));

  //CAMPUS POST TYPE
  register_post_type('campus', array(
    'capability_type' => 'campus',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'campuses'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Campuses',
      'add_new_item' => 'Add New Campus',
      'edit_item' => 'Edit Campus',
      'all_items' => 'All Campuses',
      'singular_name' => 'Campus'
    ),
    'menu_icon' => 'dashicons-location-alt'
  ));

  // Note Post Type
  register_post_type('note', array(
    'capability_type' => 'note', // doesn't have to match the post type, just to be unique
    'map_meta_cap' => true, // require the permissions at the right time at the right place
    'show_in_rest' => true,   // to work with rest API
    'supports' => array('title', 'editor'),
    'public' => false,
    'show_ui' => true,  // show in the admin dashboard
    'labels' => array(
      'name' => 'Notes',
      'add_new_item' => 'Add New Note',
      'edit_item' => 'Edit Note',
      'all_items' => 'All Notes',
      'singular_name' => 'Note'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));

  // Like Post Type
  register_post_type('like', array(
    'supports' => array('title', 'editor', 'author'),
    'public' => false,
    'show_ui' => true,  // show in the admin dashboard
    'labels' => array(
      'name' => 'Likes',
      'add_new_item' => 'Add New Like',
      'edit_item' => 'Edit Like',
      'all_items' => 'All Likes',
      'singular_name' => 'Like'
    ),
    'menu_icon' => 'dashicons-heart'
  ));
}

add_action('init', 'university_post_types');

/*
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum, velit a fermentum mattis, neque urna vulputate metus, a fermentum ante magna vel orci. Maecenas ornare luctus lectus et dapibus. Donec auctor varius risus in laoreet. Proin posuere iaculis dapibus. Sed ut dolor vehicula, rhoncus elit quis, commodo nulla. In urna libero, congue non libero et, hendrerit elementum ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Pellentesque dictum lectus leo, quis cursus tellus luctus sed. Morbi bibendum odio volutpat tellus imperdiet aliquet. Nullam pellentesque nisi quis porta feugiat. In imperdiet magna id ipsum dapibus, vel finibus dui sagittis.
*/
?>
