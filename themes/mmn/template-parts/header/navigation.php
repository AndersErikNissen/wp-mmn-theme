<header id="Header">
  <nav id="Header-content" class="site-width">
    <div id="Header-icon" class="pos:rel">
      <?php get_template_part( 'template-parts/parts/logo' ); ?>
      <a class="pos:abs-cover" href="/"></a>
    </div>
    <?php wp_nav_menu( array(
      'menu_class' => 'header-row desktop:only',
      'container'  => false
    ) ); ?>

    <div class="mobile-menu-btn-wrapper mobile:only">
      <div class="js-mobile-menu-btn"></div>
    </div>
  </nav>
</header>

<div class="js-mobile-menu mobile:only">
  <?php wp_nav_menu( array( 
    'container'  => false
  ) ); ?>
</div>