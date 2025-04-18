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

function header_styles() 
{
  wp_enqueue_style( 'reset', get_theme_file_uri( 'assets/css/reset.css' ) );
  wp_enqueue_style( 'header', get_theme_file_uri( 'assets/css/header.css' ) );
  wp_enqueue_style( 'style', get_theme_file_uri( 'style.css' ) );
  // wp_enqueue_style( 'name', get_theme_file_uri( 'assets/css/name.css' ) );
}
add_action('wp_enqueue_scripts', 'header_styles');

function footer_styles() 
{
  
}
add_action('get_footer', 'footer_styles');

function header_scripts() 
{
  // wp_enqueue_script( 'name', get_theme_file_uri( 'assets/js/name.js' ), array(), "1.0", TRUE );
}
add_action('wp_enqueue_scripts', 'header_scripts');

function footer_scripts() 
{
  wp_enqueue_script( 'mobile-menu', get_theme_file_uri( 'assets/js/mobile-menu.js' ), array(), "1.0", TRUE );
}
add_action('get_footer', 'footer_scripts');

