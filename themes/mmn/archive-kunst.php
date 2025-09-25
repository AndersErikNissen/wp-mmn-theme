<?php
  get_header();

  $options = get_field( 'page_kunst', get_page_by_path( 'options' )->ID );
  $title = isset( $options['title'] ) ? $options['title'] : get_the_archive_title();
  $content = isset( $options['content'] ) ? $options['content'] : false;
  $art = isset( $options['art'] ) ? $options['art'] : false;
?>

<section class="kunst-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?= $title; ?></h1>
      </div>
    </div>
  </div>
</section>

<?php if ( $content ) : ?>
  <section class="kunst-content section">
    <div class="site-width">
      <div class="sxs">
        <div class="sxs-item">
          <div class="rte">
            <?= $content; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="kunst-items section">
  <div class="site-width">
    <div class="sxs">
      <?php
        if ( $art ) {

          foreach ( $art as $post ) {
            setup_postdata( $post );
            get_template_part( 'template-parts/content/content-page-kunst' );
          }

        } elseif ( have_posts() ) {

          while ( have_posts() ) {
            the_post(); 
            get_template_part( 'template-parts/content/content-page-kunst' );
          }
          
        }

        wp_reset_postdata();
      ?>
    </div>
  </div>
</section>


<?php get_template_part( 'template-parts/content/kunst-gallery' );
get_footer();