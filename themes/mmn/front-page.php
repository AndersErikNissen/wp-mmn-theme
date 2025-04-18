<?php
  get_header();

  if ( !wp_style_is( 'front-page' ) ) :
    wp_enqueue_style( 'front-page' ); 
  endif;

  get_template_part( 'template-parts/content/content-page-hero' );

?>

<section class="front-page-content section">
  <div class="site-width">
    <div class="sxs justify:end">
      <div class="sxs-item">
        <div class="rte">
          <?php echo the_content(); ?>
        </div>
        <?php if( get_field( 'content_link' ) ) : ?>
          <div class="front-page-content-link">
            <a class="link" href="<?php the_field( 'content_link' ); ?>">Læs mere</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


<?php
  get_footer();
