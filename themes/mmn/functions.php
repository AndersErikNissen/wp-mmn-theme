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
  add_post_type_support('post', 'excerpt');
  add_post_type_support('case', 'excerpt');
  add_post_type_support('art', 'excerpt');
}
add_action('init', 'add_excerpts');

function register_styles()
{
  wp_register_style( 'front-page', get_theme_file_uri( 'assets/css/front-page.css' ) );
  wp_register_style( 'content-page-hero', get_theme_file_uri( 'assets/css/content-page-hero.css' ) );
}
add_action('init', 'register_styles');

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

function custom_image_sizes()
{
  add_image_size( 'small-medium', 768);
  add_image_size( 'medium-large', 1920);
}
add_action('after_setup_theme', 'custom_image_sizes');

