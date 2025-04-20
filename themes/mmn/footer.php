      </main>
      <?php
        $label = get_field( 'footer', get_page_by_path( 'options' )->ID )['label'];
      ?>

      <footer id="Footer">
        <div class="site-width">
          <div class="footer-content">
            <div class="footer-communication">
              <div class="footer-contact">
                <?php if ( $label ) : ?>
                  <p class="footer-label h4"><?php echo $label ?></p>  
                <?php endif; ?>
                <div class="footer-contact-links">
                  <?php 
                    get_template_part( 'template-parts/parts/email', null, array( 'class' => 'link-medium' ) );
                    get_template_part( 'template-parts/parts/linkedin', null, array( 'class' => 'link-medium' ) );
                  ?>
                </div>
              </div>
            </div>

            <?php wp_nav_menu( array(
              'menu_class' => 'footer-row desktop:only',
              'container'  => false
            ) ); ?>
          </div>

          <div class="footer-bottom">
            <p class="footer-copyright">Mette-marie Nissen</p>
          </div>
        </div>
        
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
<html>