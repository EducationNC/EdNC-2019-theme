<?php

use Roots\Sage\Assets;

$edtalk_header = get_field('edtalk_banner', 'option');

?>

<?php if( !empty($edtalk_header) ): ?>
  <div class="">
      <img class="issues-header-image" src="<?php echo $edtalk_header['url']; ?>" alt="<?php echo $edtalk_header['alt']; ?>">
  </div>
<?php endif; ?>
