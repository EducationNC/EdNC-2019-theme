<?php if (get_post_type() == 'post'): ?>
    <?php get_template_part('templates/layouts/content-single-2019', get_post_type()); ?>
<?php else: ?>
    <?php get_template_part('templates/layouts/content-single', get_post_type()); ?>
<?php endif; ?>
<script>(function (c, i, t, y, z, e, n, x) { x = c.createElement(y), n = c.getElementsByTagName(y)[0]; x.async = 1; x.src = t; n.parentNode.insertBefore(x, n); i.czen = { pub: z, dom: e };})(document, window, '//app.cityzen.io/static/pub.js', 'script', 1114, 0);</script>
`
