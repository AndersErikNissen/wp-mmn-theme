<header id="Header">
  <nav id="Header-content">
    <div id="Header-icon" class="pos:rel">
      <?php get_template_part( 'template-parts/parts/logo' ); ?>
      <a class="pos:abs-cover" href="/"></a>
    </div>
    <?php wp_nav_menu( array( 
      'menu'       => 'Global',
      'menu_id' => 'Header-row',
      'container'  => false
    ) ); ?>
  </nav>
</header>