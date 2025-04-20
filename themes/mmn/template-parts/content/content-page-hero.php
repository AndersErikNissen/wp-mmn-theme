<section class="content-page-hero section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php the_title(); ?></h1>

        <div class="content-page-hero-links">
          <?php 
            get_template_part( 'template-parts/parts/email' );
            get_template_part( 'template-parts/parts/linkedin' );
          ?>
        </div>
      </div>
    
      <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
        <div class="sxs-item">
          <div class="ratio-container">
            <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array(
              'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px'
            ) ); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>