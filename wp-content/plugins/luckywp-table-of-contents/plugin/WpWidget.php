<?php

namespace luckywp\tableOfContents\plugin;

use luckywp\tableOfContents\admin\widgets\widget\Widget;
use luckywp\tableOfContents\core\Core;
use luckywp\tableOfContents\core\helpers\ArrayHelper;
use WP_Widget;

class WpWidget extends WP_Widget
{

    /**
     * Конструктор
     */
    public function __construct()
    {
        parent::__construct(
            'lpwtoc_widget',
            esc_html__('Table of Contents', 'luckywp-table-of-contents')
        );
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $attrs = Shortcode::attrsFromJson(ArrayHelper::getValue($instance, 'config', ''));
        echo do_shortcode(Core::$plugin->shortcode->make($attrs));
    }

    /**
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        echo Widget::widget([
            'id' => $this->id,
            'inputName' => $this->get_field_name('config'),
            'value' => ArrayHelper::getValue($instance, 'config', ''),
            'instance' => $instance,
        ]);
    }

    /**
     * @param array $newInstance
     * @param array $oldInstance
     * @return array
     */
    public function update($newInstance, $oldInstance)
    {
        return ['config' => ArrayHelper::getValue($newInstance, 'config', '')];
    }
}
