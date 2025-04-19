<?php
  get_header();

  if ( !wp_style_is( 'front-page' ) ) :
    wp_enqueue_style( 'front-page' ); 
  endif;

  get_template_part( 'template-parts/content/content-page-hero' );
?>

<section class="front-page-intro section">
  <div class="site-width">
    <div class="sxs justify:end">
      <div class="sxs-item">
        <div class="rte">
          <?php echo the_content(); ?>
        </div>
        <?php 
          $link = get_field( 'section_intro' )['link'];
          if( $link ) : ?>
            <div class="front-page-intro-link">
              <a class="link" href="<?php echo esc_url( $link['url'] ); ?>">
                <?php echo esc_html( $link['title'] ); ?>
              </a>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php
  $cases = get_field( 'section_cases_handpicked_cases' );

  $case_query = new WP_Query( array (
    'post_type'      => 'case',
    'posts_per_page' => 3,
    'post_status'    => 'published'
  ) );

  echo $cases;

  if( $case_query->have_posts() ) : 
  $count = 0; 
?>
  <section class="front-page-cases section">
    <div class="site-width">
      <div class="front-page-cases-content">
        <div class="front-page-section-header sxs">
          <h2 class="h2 sxs-item"><?php the_field( 'section_cases_title' ); ?></h2>
          <a class="front-page-section-btn link sxs-item" href="<?php get_post_type_archive_link( 'case' ); ?>">Se alle</a>
        </div>

        <div class="front-page-cases-grid sxs">
          <?php while( $case_query->have_posts() ) : 
            $case_query->the_post(); 
            $firstCase = $count === 0 ? true : false;
            $count++;
          ?>
            <div class="front-page-case sxs-item <?php if ( $firstCase ) : echo 'sxs-item-full'; endif; ?>">
              <div class="ratio-container <?php if ( $firstCase ) : echo 'ratio:half'; endif; ?>">
                <?php if ( has_post_thumbnail( get_the_ID() ) ) : 
                  echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array(
                    'sizes' => $firstCase ? '(max-width: 1899px) 100vw, 1900px' : '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px'
                  ) ); 
                endif; ?>
                <a class="pos:abs-cover" href="<?php echo get_permalink(); ?>"></a>
              </div>
              <p class="front-page-case-title h3">
                <a href="<?php echo get_permalink(); ?>">
                  <?php echo get_the_title(); ?>
                </a>
              </p>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </section>
<?php 
  endif; 
  wp_reset_postdata();
?>



<?php
  get_footer();
