<?php
  get_header();

  $options = get_field( 'page_kunst', get_page_by_path( 'options' )->ID );
  $title = isset( $options['title'] ) ? $options['title'] : get_the_archive_title();
  $content = isset( $options['content'] ) ? $options['content'] : false;
?>

<section class="art-intro section">
  <div class="site-width">
    <div class="sxs">
      <div class="sxs-item">
        <h1 class="h1"><?php echo $title; ?></h1>
      </div>
    </div>
  </div>
</section>

<?php if ( $content ) : ?>
  <section class="art-content section">
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

<section class="art-items section">
  <div class="site-width">
    <div class="sxs">
      <?php
        if ( have_posts() ) {
          $i = 0;
          while ( have_posts() ) : the_post(); ?>
            <div class="art-item sxs-item" data-art-index="<?php $i++; ?>">
              <div class="ratio-container">
                <?php if ( has_post_thumbnail( get_the_ID() ) ) : 
                  echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array( 
                    'sizes' => '(max-width: 979px) 100vw, (max-width: 1899px) 33vw, 633px' 
                  ) ); 
                endif; ?>
              </div>
            </div>
          <?php endwhile;
        }
      ?>
    </div>
  </div>
</section>

<?php
  get_footer();