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

<section class="case-info section">
  <div class="site-width">
    <div class="sxs">
      <div class="case-info-items sxs-item">
        <?php if ( get_field( 'section_info_year' ) ) : ?>
          <div class="info-item">
            <p class="h4">År</p>
            <p class="info-item-content"><?php echo get_field( 'section_info_year' ) ?></p>
          </div>
        <?php endif; ?>

        <?php if ( get_field( 'section_info_client' ) ) : ?>
          <div class="info-item">
            <p class="h4">Kunde</p>
            <p class="info-item-content"><?php echo get_field( 'section_info_client' ) ?></p>
          </div>
        <?php endif; ?>
        
        <?php 
          $themes = get_field( 'section_info_themes' );
          if ( $themes ) : 
        ?>
          <div class="info-item">
            <p class="h4">Temaer</p>
            <div class="info-item-content case-info-item-flex">
              <?php 
                $themes = explode( '/', $themes );
                $count = 0;

                foreach ( $themes as $itheme ) {
                  $count++;
                  echo '<p>' . $itheme . '</p>';
                  if ($count !== count( $themes ) ) echo '<p>/</p>';
                }
              ?>
            </div>
          </div>
        <?php endif; ?>
        
        <?php 
          $tools = get_field( 'section_info_tools' );
          if ( $tools ) : 
        ?>
          <div class="info-item">
            <p class="h4">Værktøjer</p>
            <div class="info-item-content case-info-item-flex">
              <?php 
                $tools = explode( '/', $tools );
                $count = 0;

                foreach ( $tools as $tool ) {
                  $count++;
                  echo '<p>' . $tool . '</p>';
                  if ($count !== count( $tools ) ) echo '<p>/</p>';
                }
              ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <div class="sxs-item">
        <div class="rte">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="case-images section">
  <div class="site-width">
    <div class="sxs">
      <?php 
        for ($i = 1; $i < 4; $i++) {
          $image = get_field( 'image_' . $i );

          if ( $image ) :
            $sizes = '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px';
            $class = 'sxs-item';
            
            if ($i === 3) {
              $sizes = '(max-width: 1899px) 100vw, 1900px';
              $class .= ' case-image-wide';
            }
            ?>
            <div class="<?php echo $class; ?>">
              <div class="ratio-container">
                <?php 
                  echo wp_get_attachment_image( $image, 'large', false, array(
                    'sizes' => $sizes
                  ) );
                ?>
              </div>
            </div>

            <?php
          endif;
        }
      ?>
    </div>
  </div>
</section>

<section class="case-extra-content section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <?php if ( get_field( 'section_extra_content_title' ) ) : ?>
          <h2 class="h2"><?php the_field( 'section_extra_content_title' ); ?></h2>
        <?php endif; ?>
      </div>
      <div class="sxs-item">
        <?php if ( get_field( 'section_extra_content_content' ) ) : ?>
          <div class="rte"><?php the_field( 'section_extra_content_content' ); ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="case-images section">
  <div class="site-width">
    <div class="sxs">
      <?php 
        for ($i = 4; $i < 7; $i++) {
          $image = get_field( 'image_' . $i );

          if ( $image ) :
            $sizes = '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px';
            $class = 'sxs-item';
            
            if ($i === 4) {
              $sizes = '(max-width: 1899px) 100vw, 1900px';
              $class .= ' case-image-wide';
            }
            ?>
            <div class="<?php echo $class; ?>">
              <div class="ratio-container">
                <?php 
                  echo wp_get_attachment_image( $image, 'large', false, array(
                    'sizes' => $sizes
                  ) );
                ?>
              </div>
            </div>

            <?php
          endif;
        }
      ?>
    </div>
  </div>
</section>

<?php 
  $random_posts = new WP_Query( array(
    'post_type' => 'case',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() ),
  ) );

  $title = get_field( 'section_other_cases_title', get_page_by_path( 'options' )->ID ) ?: "Andre cases";

  get_template_part('template-parts/content/content-page-posts', null, array(
    'posts' => $random_posts->posts,
    'class' => 'case-random-cases',
    'title' => $title,
    'link'  => get_post_type_archive_link( 'case' ),
    'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px',
  ));

  get_footer();
