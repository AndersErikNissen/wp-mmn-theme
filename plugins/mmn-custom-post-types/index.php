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
      'menu_icon'    => 'dashicons-clipboard',
      'rest_base'    => 'cases',
      'supports'     => array ( 'editor', 'title', 'excerpt', 'thumbnail', 'custom-fields' ),
      'taxonomies'   => array ( 'category', 'post_tag' ),
      'rewrite'      => array ( 'slug' => 'cases' ),
    )   
  );

  register_post_type('kunst', 
    array(
      'labels' => array(
        'name'          => __('Kunst', 'textdomain'),
        'singular_name' => __('Kunst', 'textdomain'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'menu_icon'    => 'dashicons-art',
      'rest_base'    => 'kunst',
      'supports'     => array ( 'editor', 'title', 'excerpt', 'thumbnail', 'custom-fields' ),
      'taxonomies'   => array ( 'category', 'post_tag' ),
    )   
  );
}

add_action('init','generate_custom_post_types');