<?php
  get_header();

  if ( get_post()->ID === get_page_by_path( 'kontakt' )->ID ) {
    get_template_part( 'template-parts/content/content-page-hero' );
  }

  if ( get_post()->ID === get_page_by_path( 'om-mig' )->ID ) {
    get_template_part( 'template-parts/content/content-page-about' );
  }

  get_footer();
