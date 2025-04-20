      </main>
      <?php 
        $test = get_page_by_path( 'options' );
        echo get_the_title( $test );
      ?>

      <footer id="Footer">
        <div class="site-width">
          <div class="footer-content">
            <div class="footer-communication">
              <div class="footer-email-area">
                <p class="h4"></p>

              </div>
            </div>

          <?php wp_nav_menu( array(
            'menu_class' => 'header-row desktop:only',
            'container'  => false
          ) ); ?>
          </div>
        </div>
        
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
<html>