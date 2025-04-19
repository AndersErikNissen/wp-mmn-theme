<?php 
  if ( !wp_style_is( 'content-page-hero' ) ) :
    wp_enqueue_style( 'content-page-hero' ); 
  endif;

  // Used with front-page.php
  $path = "";
  if ( get_field( 'section_hero' ) ) : 
    $path = "section_hero_";
  endif;

  $email = get_field( $path . 'email' );
  $link = get_field( $path . 'link' ); 
  $image = get_field( $path . 'image' );   
?>

<section class="content-page-hero section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php the_title(); ?></h1>
        <?php if ( $email || $link ) : ?>
          <div class="content-page-hero-links">
            <?php if ( $email ) : ?>
              <a class="link-large" href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>">
                <?php echo esc_html( antispambot( $email ) ); ?>
              </a>
            <?php endif; ?>
              
            <?php if ( $link ) : ?>
              <a class="link-large" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ? $link['target'] : '_blank' ); ?>">
                <?php echo esc_html( $link['title'] ); ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    
      <?php if( $image ) : ?>
        <div class="sxs-item">
          <div class="ratio-container">
            <?php echo wp_get_attachment_image( $image, 'large', false, array(
              'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 50vw, 950px'
            ) ); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>