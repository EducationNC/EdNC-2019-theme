<?php

use Roots\Sage\Assets;

$edtalk_header = get_field('edtalk_banner', 'option');

?>


<div class="bg-image">
  <?php if( !empty($edtalk_header) ): ?>
    <img src="<?php echo $edtalk_header['url']; ?>" alt="<?php echo $edtalk_header['alt']; ?>">
  <?php endif; ?>
</div>
