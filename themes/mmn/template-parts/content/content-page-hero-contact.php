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
    </div>
  </div>
</section>

<section class="content-page-contact section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item"></div>
      <div class="sxs-item">
        <div class="rte">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
<section class="content-page-contact-image section">
  <div class="site-width">
    <div class="ratio-container">
      <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array(
        'sizes' => '(max-width: 1899px) 100vw, 1900px'
      ) ); ?>
    </div>
  </div>
  </section>
<?php endif; ?>