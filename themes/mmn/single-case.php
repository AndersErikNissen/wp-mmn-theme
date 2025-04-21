<?php
  get_header();
?>

<section class="case-title section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="case-hero-image section">
  <div class="site-width">
    <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
      <div class="ratio-container">
        <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array(
          'sizes' => '(max-width: 1899px) 100vw, 1900px'
        ) ); ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="case-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        
      </div>
      
      <div class="sxs-item">
        
      </div>
    </div>
  </div>
</section>


<?php
  get_footer();
