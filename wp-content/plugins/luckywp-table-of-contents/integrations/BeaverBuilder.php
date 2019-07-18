<?php

namespace luckywp\tableOfContents\integrations;

use luckywp\tableOfContents\core\base\BaseObject;
use luckywp\tableOfContents\core\Core;

class BeaverBuilder extends BaseObject
{

    public function init()
    {
        add_filter('fl_builder_before_render_shortcodes', [Core::$plugin, 'onTheContentTrue'], 1);
        add_filter('fl_builder_after_render_shortcodes', [Core::$plugin->shortcode, 'theContent'], 9999);
        add_filter('fl_builder_after_render_shortcodes', [Core::$plugin, 'onTheContentFalse'], 10000);
    }
}
