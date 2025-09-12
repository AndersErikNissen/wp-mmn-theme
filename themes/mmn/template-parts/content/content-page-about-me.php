<section class="about-me-hero section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="about-me-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="about-me-intro-info-items sxs-item">
        <?php if ( get_field( 'section_intro_name' ) ) : ?>
          <div class="info-item">
            <p class="h4">Navn</p>
            <p class="info-item-content"><?php echo get_field( 'section_intro_name' ) ?></p>
          </div>
        <?php endif; ?>

        <?php if ( get_field( 'section_intro_about' ) ) : 
          $birthdate = new DateTime( '1996-08-01' );
          $now = new DateTime();
          $age = $now->diff( $birthdate );
          ?>
          
          <div class="info-item">
            <p class="h4">Personlig information</p>
            <p class="info-item-content"><?php echo str_replace( '[age]', $age->y . ' år', get_field( 'section_intro_about' ) ) ?></p>
          </div>
        <?php endif; ?>
        
        <?php if ( get_field( 'section_intro_location' ) ) : ?>
          <div class="info-item">
            <p class="h4">Lokation</p>
            <p class="info-item-content"><?php echo get_field( 'section_intro_location' ) ?></p>
          </div>
        <?php endif; ?>
        
        <?php if ( get_field( 'section_intro_education' ) ) : ?>
          <div class="info-item">
            <p class="h4">Uddannelse</p>
            <p class="info-item-content"><?php echo get_field( 'section_intro_education' ) ?></p>
          </div>
        <?php endif; ?>
        
        <?php if ( get_field( 'section_intro_experience' ) ) : ?>
          <div class="info-item">
            <p class="h4">Erfaring</p>
            <p class="info-item-content"><?php echo get_field( 'section_intro_experience' ) ?></p>
          </div>
        <?php endif; ?>
        
        <?php 
          $interests = get_field( 'section_intro_interests' );
          if ( $interests ) : 
        ?>
          <div class="info-item">
            <p class="h4">Interesser</p>
            <div class="info-item-content about-me-intro-interests-items">
              <?php 
                $interests = explode( '/', $interests );
                $count = 0;

                foreach ( $interests as $interest ) {
                  $count++;
                  echo '<p>' . $interest . '</p>';
                  if ($count !== count( $interests ) ) echo '<p>/</p>';
                }
              ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <div class="sxs-item">
        <div class="about-me-intro-content rte">
          <?php the_content(); ?>
        </div>

        <?php if ( get_field( 'section_intro_extra_content' ) ) : ?>
          <div class="about-me-intro-extra-content rte-small">
            <?php the_field( 'section_intro_extra_content' ) ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

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