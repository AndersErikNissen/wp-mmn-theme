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
          while ( have_posts() ) : 
            the_post(); 
            $case_img_id = get_field( 'case_card_img' ) ?: get_post_thumbnail_id() ?: null; ?>

            <div class="cases-case sxs-item case-card">
              <div class="ratio-container">
                <?php if ( $case_img_id ) : 
                  echo wp_get_attachment_image( $case_img_id, 'large', false, array( 
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