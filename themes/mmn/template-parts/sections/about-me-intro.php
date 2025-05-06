<?php 
  $birthdate = new DateTime( '1996-08-01' );
  $now = new DateTime();
  $age = $now->diff( $birthdate );
?>

<section class="about-me-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="about-me-intro-info-items sxs-item">

        <?php if ( get_field( 'section_intro_about' ) ) : ?>
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