<?php
/* Hide ADMIN-BAR */
add_filter('show_admin_bar', '__return_false');

add_action('after_setup_theme', function() {
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
  
  // Custom image sizes
  add_image_size( 'small-medium', 768);
  add_image_size( 'medium-large', 1920);
});


function redirects()
{
  if ( is_single() && get_post_type() === 'art' ) {
    wp_redirect( get_post_type_archive_link( 'art' ) );
    exit();
  }
  
  // Used for global settings
  if ( is_page( 'options' ) ) {
    wp_redirect( home_url() );
    exit();
  }
}
add_action('template_redirect', 'redirects');

function add_excerpts()
{
  add_post_type_support('page', 'excerpt');
  add_post_type_support('post', 'excerpt');
}
add_action('init', 'add_excerpts');

function header_styles() 
{
  wp_enqueue_style( 'reset', get_theme_file_uri( 'assets/css/reset.css' ) );
  wp_enqueue_style( 'header', get_theme_file_uri( 'assets/css/header.css' ) );
  wp_enqueue_style( 'footer', get_theme_file_uri( 'assets/css/footer.css' ) );
  wp_enqueue_style( 'style', get_theme_file_uri( 'style.css' ) );
  
  if ( get_post() ) {
    if ( get_post()->ID === get_page_by_path( 'om-mig' )->ID ) {
      wp_enqueue_style( 'about-me', get_theme_file_uri( 'assets/css/about-me.css' ) );
      wp_enqueue_style( 'drop-down', get_theme_file_uri( 'assets/css/drop-down.css' ) );
    }

    if ( is_front_page() ) {
      wp_enqueue_style( 'front-page', get_theme_file_uri( 'assets/css/front-page.css' ) );
      wp_enqueue_style( 'content-page-posts', get_theme_file_uri( 'assets/css/content-page-posts.css' ) );
    }
  
    if ( is_front_page() || get_post()->ID === get_page_by_path( 'kontakt' )->ID ) {
      wp_enqueue_style( 'content-page-hero', get_theme_file_uri( 'assets/css/content-page-hero.css' ) );
    }
  }

  if ( is_post_type_archive( 'case' ) ) {
    wp_enqueue_style( 'cases', get_theme_file_uri( 'assets/css/cases.css' ) );
  }

  if ( is_post_type_archive( 'kunst' ) ) {
    wp_enqueue_style( 'kunst', get_theme_file_uri( 'assets/css/kunst.css' ) );
    wp_enqueue_style( 'gallery', get_theme_file_uri( 'assets/css/gallery.css' ) );
  }

  if ( get_post_type( get_the_ID() ) == 'case' ) {
    if ( is_single() ) {
      wp_enqueue_style( 'content-page-posts', get_theme_file_uri( 'assets/css/content-page-posts.css' ) );
    }
    
    wp_enqueue_style( 'cases', get_theme_file_uri( 'assets/css/case.css' ) );
  }
}
add_action('wp_enqueue_scripts', 'header_styles');

function footer_scripts() 
{
  wp_enqueue_script( 'mobile-menu', get_theme_file_uri( 'assets/js/mobile-menu.js' ), array(), "1.0", TRUE );

  if ( get_post() ) {
    if ( get_post()->ID === get_page_by_path( 'om-mig' )->ID ) {
      wp_enqueue_script( 'drop-down', get_theme_file_uri( 'assets/js/drop-down.js' ), array(), "1.0", TRUE );
    }
  }
  
  if ( is_post_type_archive( 'kunst' ) ) {
    wp_enqueue_script( 'gallery', get_theme_file_uri( 'assets/js/gallery.js' ), array(), "1.0", TRUE );
  }
}
add_action('get_footer', 'footer_scripts');