<?php

/**
 * Plugin Name: MMN - Custom post types
 * Description: This plugin will create custom post types for the MMN WP Theme.
 * Version: 1.0
 */

function generate_custom_post_types() {
  register_post_type('case', 
    array(
      'labels' => array(
        'name'          => __('Cases', 'textdomain'),
        'singular_name' => __('Case', 'textdomain'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'menu_icon'    => 'dashicons-button',
      'rest_base'    => 'cases'
    )   
  );

  register_post_type('art', 
    array(
      'labels' => array(
        'name'          => __('Art', 'textdomain'),
        'singular_name' => __('Art', 'textdomain'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'menu_icon'    => 'dashicons-art',
      'rest_base'    => 'art',
    )   
  );
}

add_action('init','generate_custom_post_types');