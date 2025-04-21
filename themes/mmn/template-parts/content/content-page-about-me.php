<section class="about-me-hero section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>

<?php 
  get_template_part( 'template-parts/sections/about-me-intro' );
?>

<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
  <section class="about-me-image section">
    <div class="site-width">
      <div class="ratio-container ratio-16:9">
        <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array(
          'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px'
        ) ); ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php 
  $freelance_title = get_field( 'section_freelance_title' );
  $freelance_content = get_field( 'section_freelance_content' );

  if ( $freelance_title || $freelance_content ) : ?>
  <section class="about-me-freelance section">
    <div class="site-width">
      <div class="sxs">
        <div class="sxs-item">
          <?php if ( $freelance_title ) : ?>
            <h2 class="h2"><?php echo $freelance_title ?></h2>
          <?php endif; ?>
        </div>

        <div class="sxs-item">
          <?php if ( $freelance_content ) : ?>
            <div class="rte">
              <?php echo $freelance_content ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php 
  $services_title = get_field( 'section_services_title' );
  $dropdown_path = 'section_services_dropdown_';
?>

<section class="about-me-services section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <?php if ( $services_title ) : ?>
          <h2 class="h2"><?php echo $services_title ?></h2>
        <?php endif; ?>
      </div>

      <div class="about-me-services-dropdowns sxs-item">
      <?php 
        for ($i = 1; $i < 7; $i++) {
          $label = get_field( $dropdown_path . $i . '_label' );
          $content = get_field( $dropdown_path . $i . '_content' );
          if ( $label && $content ) : ?>
            <drop-down>
              <p data-header class="drop-down-header">
                <span class="drop-down-label h3"><?php echo $label ?></span>
                <span class="drop-down-icon"></span>
              </p>
              <div class="drop-down-content rte-small"><?php echo $content ?></div>
            </drop-down>
          <?php endif;
          }
        ?>
      </div>
    </div>
  </div>
</section>

<?php if ( get_field( 'bottom_image' ) ) : ?>
  <section class="about-me-image section">
    <div class="site-width">
      <div class="ratio-container ratio-16:9">
        <?php echo wp_get_attachment_image( get_field( 'bottom_image' ), 'large', false, array(
          'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px'
        ) ); ?>
      </div>
    </div>
  </section>
<?php endif; ?>