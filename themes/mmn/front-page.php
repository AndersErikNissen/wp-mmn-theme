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
  get_template_part('template-parts/content/content-page-posts', null, array(
    'posts' => get_field( 'section_cases' )['cases'],
    'class' => 'front-page-cases',
    'title' => get_field( 'section_cases' )['title'],
    'link'  => get_post_type_archive_link( 'case' ),
    'limit' => 3,
    'sizes' => array(
      -1 => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px', //fallback
      0  => '(max-width: 1899px) 100vw, 1900px'
    )
  ));

  get_template_part('template-parts/content/content-page-posts', null, array(
    'posts' => get_field( 'section_kunst' )['kunst'],
    'class' => 'front-page-art',
    'title' => get_field( 'section_kunst' )['title'],
    'link'  => get_post_type_archive_link( 'kunst' ),
    'limit' => 4,
    'sizes' => '(max-width: 979px) 50vw, (max-width: 1899px) 25vw, 475px'
  ));
?>

<?php
  get_footer();
