<the-gallery>
  <div class="gallery-main">
    <div class="gallery-aside">
      <div class="gallery-aside-content rte">
        <!-- CONTENT GOES HERE... -->
        <!-- CONTENT GOES HERE... -->
        <!-- CONTENT GOES HERE... -->
      </div>

      <gallery-btn class="gallery-aside-btn-close" item-type="aside">
        <?php get_template_part( 'template-parts/parts/icon', null, array( 'type' => 'left' ) ); ?>
      </gallery-btn>
    </div>

    <div class="gallery-images">
      <!-- IMAGES GOES HERE... -->
      <!-- IMAGES GOES HERE... -->
      <!-- IMAGES GOES HERE... -->
    </div>

    <gallery-btn class="gallery-aside-btn-open" item-type="aside">
      <?php get_template_part( 'template-parts/parts/icon', null, array( 'type' => 'right' ) ); ?>
    </gallery-btn>
  </div>

  <span class="gallery-counter">
    <!-- ACTIVE IMAGE INDEX / IMAGE NUMBERS - GOES HERE ... -->
    <!-- ACTIVE IMAGE INDEX / IMAGE NUMBERS - GOES HERE ... -->
    <!-- ACTIVE IMAGE INDEX / IMAGE NUMBERS - GOES HERE ... -->
  </span>

  <div class="gallery-footer">
    <gallery-btn item-type="prev">
      <?php get_template_part( 'template-parts/parts/icon', null, array( 'type' => 'left' ) ); ?>
    </gallery-btn>

    <gallery-btn item-type="close">
      <?php get_template_part( 'template-parts/parts/icon', null, array( 'type' => 'close' ) ); ?>
    </gallery-btn>

    <gallery-btn item-type="next">
      <?php get_template_part( 'template-parts/parts/icon', null, array( 'type' => 'right' ) ); ?>
    </gallery-btn>
  </div>
</the-gallery>