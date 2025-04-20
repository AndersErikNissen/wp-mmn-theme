<?php 
  /**
   * Argument
   * class [string] (optional)
   */

  $options_page_info = get_field( 'info', get_page_by_path( 'options' )->ID );
  $email = $options_page_info['email'];
  $class = isset( $args['class'] ) ? $args['class'] : 'link-large';

  if ( $email ) : ?>
    <a class="<?php echo $class; ?>" href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a>
<?php endif;