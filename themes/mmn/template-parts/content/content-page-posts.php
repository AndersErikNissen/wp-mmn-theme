<?php
  /**
   * Arguments ($args):
   * posts [WP_Post]        (required)
   * title [string]         (required)
   * link  [url]            (recommended)
   * sizes [string / array] (recommended) (Array: Fallback key NEEDS TO BE NAMED -1)
   * limit [integer]        (optional)
   * class [string]         (optional)
   */

  $posts = $args['posts'];
  
  if( $posts ) : 
    $count = 0;
  ?>
    <section class="content-page-posts section <?php if ( $args['class'] ) { echo $args['class']; }; ?>">
      <div class="site-width">
        <div class="content-page-posts-content">
          <div class="content-page-posts-header">
            <h2 class="content-page-posts-title h2"><?php if ( $args['title'] ) { echo $args['title']; }; ?></h2>
            <?php if ( isset( $args['link'] ) ) : ?>
              <a class="content-page-posts-btn link" href="<?php echo $args['link']; ?>">Se alle</a>
            <?php endif; ?>
          </div>

          <div class="content-page-posts-flexgrid sxs">
            <?php foreach ($posts as $post) : 
              if ( isset( $args['limit'] ) && $count >= $args['limit'] ) break;
              setup_postdata($post);
              $sizes = '100vw';

              if ( isset( $args['sizes'] ) ) {
                if ( is_array( $args['sizes'] ) ) {
                  $sizes = isset( $args['sizes'][$count] ) ? $args['sizes'][$count] : $args['sizes'][-1];
                } else {
                  $sizes = $args['sizes'];
                }
              }

              if ( get_post_type() === 'kunst' ) :
                get_template_part( 
                  'template-parts/content/content-page-kunst', 
                  null, 
                  array( 'class' => 'content-page-posts-post content-page-posts-post-count-' . $count ),
                );
              else :
            ?>
              <div class="content-page-posts-post sxs-item <?= 'content-page-posts-post-count-' . $count; ?> <?= get_post_type() . '-card' ?>">
                <div class="ratio-container">
                  <?php if ( has_post_thumbnail( get_the_ID() ) ) : 
                    echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false, array( 'sizes' => $sizes ) ); 
                  endif; ?>

                  <a class="pos:abs-cover" href="<?= get_permalink(); ?>"></a>
                </div>

                <p class="content-page-posts-post-title h3">
                  <a href="<?php echo get_permalink(); ?>">
                    <?php echo get_field('section_info_client') ?: get_the_title(); ?>
                  </a>
                </p>
              </div>
              <?php endif;
              $count++;
              endforeach; 
            ?>
          </div>
        </div>
      </div>
    </section>
  <?php 
  wp_reset_postdata();
endif;