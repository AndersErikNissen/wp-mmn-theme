<?php
  get_header();

  $title = null;
  $image = null;
  $options_page_404 = get_field( 'page_404', get_page_by_path( 'options' )->ID );

  if ( $options_page_404 ) {
    $title = $options_page_404['title'];
    $image = $options_page_404['image'];
  }
?>

<section class="content-404 section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <?php if ( $title ) : ?>
          <h1 class="h1"><?php echo $title; ?></h1>
        <?php endif; ?>

        <a class="link-large front-page-link" href="<?php echo home_url(); ?>">Til forsiden</a>
      </div>
      
      <?php if ( $image ) : ?>
        <div class="sxs-item">
          <div class="ratio-container">
            <?php echo wp_get_attachment_image( $image, 'large', false, array(
              'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px'
            ) ); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php
  get_footer();
