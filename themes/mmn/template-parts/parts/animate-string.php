<?php if ( isset( $args['string'] ) ) : 
$i = 0;
$letters = mb_str_split( $args["string"] ); ?>

<span class="animate-string">
  <?php foreach ( $letters as $letter ) : if ( $letter === ' ' ) $letter = '&nbsp;'; ?>
    <span class="animate-string-letter" style="--delay:<?= $i * 25; ?>ms">
      <span class="animate-string-letter-wrapper">
        <span class="animate-string-letter-inview"><?= $letter ?></span>
        <span class="animate-string-letter-outside"><?= $letter ?></span>
      </span>
    </span>
  <?php $i++; endforeach; ?>
</span>

<?php endif;
