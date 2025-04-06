<?php

/**
 * Plugin Name: MMN - Custom post types
 * Description: This plugin will create custom post types for the MMN Theme.
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
      'rest_base'    => 'cases'
    )   
  );

  register_post_type('product', 
    array(
      'labels' => array(
        'name'          => __('Products', 'textdomain'),
        'singular_name' => __('Product', 'textdomain'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'rest_base'    => 'products'
    )   
  );

  register_post_type('collection', 
    array(
      'labels' => array(
        'name'          => __('Collections', 'textdomain'),
        'singular_name' => __('Collection', 'textdomain'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'rest_base'    => 'collections',
    )   
  );
}

add_action('init','generate_custom_post_types');