<?php
/* Hide ADMIN-BAR */
add_filter('show_admin_bar', '__return_false');

function base_theme_features()
{
   add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
      )
   );

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails'); 
}
add_action('after_setup_theme', 'base_theme_features');

function add_excerpts()
{
  add_post_type_support('page', 'excerpt');
}
add_action('init', 'add_excerpts');

function base_theme_files() 
{
  // wp_enqueue_style( 'name', get_theme_file_uri( 'assets/css/name.css' ) );
  // wp_enqueue_script( 'name', get_theme_file_uri( 'assets/js/name.js' ), array(), "1.0", TRUE );
}
add_action('wp_enqueue_scripts', 'base_theme_files');

