<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/layouts/head'); ?>
<body <?php body_class(); ?>>
<!--[if IE]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->
<?php
//do_action('get_header');

get_template_part('templates/layouts/header', 'article');
/*
if ( is_front_page() && is_home() ) {
get_template_part('templates/layouts/header', 'home');
} else {
get_template_part('templates/layouts/header', 'article');
}
get_template_part('templates/components/alert'); */
?>
<div class="wrap" role="document">
    <div class="content clearfix">
        <main class="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.content -->
</div><!-- /.wrap -->

<?php
do_action('get_footer');
get_template_part('templates/layouts/footer');
get_template_part('templates/components/mobile-ad');
wp_footer();
?>

</body>
</html>
