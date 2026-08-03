<?php
get_header();

$post_id = get_post()->ID;
$contact_id = get_page_by_path( 'kontakt' )->ID ?? null;
$about_me_id = get_page_by_path( 'om-mig' )->ID ?? null;

if ( $contact_id || $about_me_id ) {
  if ( $post_id === $contact_id ) {
    get_template_part( 'template-parts/content/content-page-hero-contact' );
  } elseif ( $post_id === $about_me_id ) {
    get_template_part( 'template-parts/content/content-page-about-me' );
  }
}
get_footer();
