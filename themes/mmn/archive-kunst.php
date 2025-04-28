<?php
  get_header();

  $options = get_field( 'page_kunst', get_page_by_path( 'options' )->ID );
  $title = isset( $options['title'] ) ? $options['title'] : get_the_archive_title();
  $content = isset( $options['content'] ) ? $options['content'] : false;
?>

<section class="kunst-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php echo $title; ?></h1>
      </div>
    </div>
  </div>
</section>

<?php if ( $content ) : ?>
  <section class="kunst-content section">
    <div class="site-width">
      <div class="sxs">
        <div class="sxs-item">
          <div class="rte">
            <?php echo $content; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="kunst-items section">
  <div class="site-width">
    <div class="sxs">
      <?php
        if ( have_posts() ) {
          $i = 0; 
          while ( have_posts() ) : 
            the_post(); 
            if ( has_post_thumbnail( get_the_ID() ) ) : ?>
              <gallery-item class="kunst-item sxs-item" id="kunst-id-<?php echo str_replace( ' ', '', get_the_title() ); ?>">
              <?php
                echo '<div class="ratio-container">';
                echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array( 
                    'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 33vw, 633px' 
                  ) ); 
                echo '</div>';
                
                $json = array(
                  "images" => array(
                    "image_0" => array(
                      "src" => wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' ),
                      "srcset" => wp_get_attachment_image_srcset( get_post_thumbnail_id(), 'large' ),
                    ),
                  ),
                );

                if ( get_the_title() ) {
                  $json["title"] = get_the_title();
                }

                if ( get_the_content() ) {
                  $json["content"] = get_the_content();
                }

                for ( $i = 1; $i < 7; $i++ ) {
                  $image_id = get_field( 'image_' . $i );
                  if ( $image_id ) {
                    $json["images"]["image_" . $i] = array(
                      "src" => wp_get_attachment_image_url( $image_id, 'large' ),
                      "srcset" => wp_get_attachment_image_srcset( $image_id, 'large' ),
                    );
                  }
                }

                echo '<script type="application/json">';
                echo json_encode( $json );
                echo '</script>';
              ?>
              </gallery-item>
            <?php endif; 
          endwhile;
        }
      ?>
    </div>
  </div>
</section>

<the-gallery>
  <div class="gallery-header">
    <gallery-item item-type="more">
      Læs mere
    </gallery-item>
    <gallery-item item-type="close">
      Luk
    </gallery-item>
  </div>
  <div class="gallery-images"></div>
  <div class="gallery-footer">
    <gallery-item item-type="prev">
      Forige
    </gallery-item>
    <gallery-item item-type="next">
      Næste
    </gallery-item>
  </div>
</the-gallery>
<?php
  get_footer();