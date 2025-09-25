<?php
  get_header();
?>

<section class="front-page-scroller js-front-page-scroller">
  <div class="front-page-scroller-content">
    <p class="front-page-scroller-title">
      <span class="front-page-scroller-title-wrapper js-front-page-scroller-title-wrapper">
        <span class="front-page-scroller-title-name">METTE-MARIE NISSEN</span>
        <span class="front-page-scroller-title-portfolio">PORTFOLIO</span>
      </span>
    </p>

    <div class="front-page-scroller-links">
      <?php 
        get_template_part( 'template-parts/parts/email' );
        get_template_part( 'template-parts/parts/linkedin' );
      ?>
    </div>
  </div>
  
  <div class="front-page-scroller-cover"></div>
</section>

<div class="front-page-main-wrapper js-front-page-main-wrapper">
  <?php
    get_template_part( 'template-parts/header/navigation' );
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
            $link = get_field( 'section_intro_link' );

            if( $link ) : ?>
              <div class="front-page-intro-link">
                <a class="btn" href="<?= esc_url( $link['url'] ); ?>">
                  <?php get_template_part( 'template-parts/parts/animate-string', null, array( 'string' => $link['title'] ) ); ?>
                </a>
              </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <?php
    get_template_part('template-parts/content/content-page-posts', null, array(
      'posts' => get_field( 'section_cases_cases' ),
      'class' => 'front-page-cases',
      'title' => get_field( 'section_cases_title' ),
      'link'  => get_post_type_archive_link( 'case' ),
      'limit' => 3,
      'sizes' => array(
        -1 => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px', //fallback
        0  => '(max-width: 1899px) 100vw, 1900px'
      )
    ));

    get_template_part('template-parts/content/content-page-posts', null, array(
      'posts' => get_field( 'section_kunst_kunst' ),
      'class' => 'front-page-art',
      'title' => get_field( 'section_kunst_title' ),
      'link'  => get_post_type_archive_link( 'kunst' ),
      'limit' => 4,
      'sizes' => '(max-width: 979px) 50vw, (max-width: 1899px) 25vw, 475px'
    )); ?>
</div>

<?php 
get_template_part( 'template-parts/content/kunst-gallery' ); 
get_footer();