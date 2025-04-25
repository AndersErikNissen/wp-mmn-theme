<?php
  get_header();

  $options = get_field( 'page_cases', get_page_by_path( 'options' )->ID );
  $title = isset( $options['title'] ) ? $options['title'] : get_the_archive_title();
?>

<section class="cases-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php echo $title; ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="cases-cases section">
  <div class="site-width">
    <div class="sxs">
      <?php
        if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <div class="cases-case sxs-item">
              <div class="ratio-container">
                <?php if ( has_post_thumbnail( get_the_ID() ) ) : 
                  echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array( 
                    'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 33vw, 633px' 
                  ) ); 
                endif; ?>

                <a class="pos:abs-cover" href="<?php echo get_permalink(); ?>"></a>
              </div>

              <p class="cases-case-title h3">
                <a href="<?php echo get_permalink(); ?>">
                  <?php echo get_field('section_info_client') ?: get_the_title(); ?>
                </a>
              </p>
            </div>
          <?php endwhile;
        }
      ?>
    </div>
  </div>
</section>

<?php
  get_footer();