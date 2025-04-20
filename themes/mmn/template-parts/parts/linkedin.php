<?php 
  /**
   * Argument
   * class [string] (optional)
   */

  $options_page_info = get_field( 'info', get_page_by_path( 'options' )->ID );
  $linkedin = $options_page_info['linkedin'];
  $class = isset( $args['class'] ) ? $args['class'] : 'link-large';

  if ( $linkedin ) : ?>
    <a class="<?php echo $class; ?>" href="<?php echo esc_url( $linkedin['url'] ); ?>" target="<?php echo esc_attr( $linkedin['target'] ?: '_blank' ); ?>">
      <?php echo esc_html( $linkedin['title'] ); ?>
    </a>
<?php endif;