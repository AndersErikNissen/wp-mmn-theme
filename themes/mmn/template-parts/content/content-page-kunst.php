<?php if ( has_post_thumbnail( get_the_ID() ) ) : 
  // Creating JSON for the <the-gallery>
  // Uses the thumbnail as the first image

  $json = array(
    "images" => array(
      "image_0" => array(
        "src" => wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' ),
        "srcset" => wp_get_attachment_image_srcset( get_post_thumbnail_id(), 'large' ),
      ),
    ),
  );

  for ( $i = 1; $i < 7; $i++ ) {
    $image_id = get_field( 'image_' . $i );
    if ( $image_id ) {
      $json["images"]["image_" . $i] = array(
        "src" => wp_get_attachment_image_url( $image_id, 'large' ),
        "srcset" => wp_get_attachment_image_srcset( $image_id, 'large' ),
      );
    }
  }

  if ( get_the_content() ) {
    $json["content"] = get_the_content();
  }
?>

<gallery-item class="kunst-item kunst-card sxs-item <?php if ( isset( $args['class'] ) ) $args['class']; ?>" id="kunst-id-<?php echo str_replace( ' ', '', get_the_title() ); ?>">
  <div class="ratio-container">
    <?= wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array( 
      'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 33vw, 633px' 
    ) ); ?>
  </div>

  <?= '<script type="application/json">' . json_encode( $json ) . '</script>'; ?>
</gallery-item>

<?php endif; 