<?php

namespace luckywp\tableOfContents\front;

use luckywp\tableOfContents\core\Core;
use luckywp\tableOfContents\core\front\BaseFront;
use luckywp\tableOfContents\core\helpers\ArrayHelper;
use luckywp\tableOfContents\plugin\PostSettings;

class Front extends BaseFront
{

    public $defaultThemeViewsDir = 'luckywp-table-of-contents';

    public function init()
    {
        parent::init();
        if (Core::isFront()) {
            add_action('wp_enqueue_scripts', [$this, 'assets']);
            add_action('init', function () {
                if (Core::$plugin->settings->getPostTypesForProcessingHeadings()) {
                    add_filter('the_content', [$this, 'autoInsert'], 998);
                }
            });
            add_action('wp_footer', [$this, 'overrideColors']);
        }
    }

    public function assets()
    {
        wp_register_style('lwptoc-main', Core::$plugin->url . '/front/assets/main.min.css', [], Core::$plugin->version);
        if (apply_filters('lwptoc_enqueue_style', true)) {
            wp_enqueue_style('lwptoc-main');
        }
        wp_register_script('lwptoc-main', Core::$plugin->url . '/front/assets/main.min.js', ['jquery'], Core::$plugin->version);
        if (apply_filters('lwptoc_enqueue_script', true)) {
            wp_enqueue_script('lwptoc-main');
        }
    }

    public function overrideColors()
    {
        if (Toc::$overrideColors) {
            $styles = [];

            $iStyles = [];
            if ($color = ArrayHelper::getValue(Toc::$overrideColors, 'backgroundColor')) {
                $iStyles[] = 'background-color:' . $color . ';';
            }
            if ($color = ArrayHelper::getValue(Toc::$overrideColors, 'borderColor')) {
                $iStyles[] = 'border:1px solid ' . $color . ';';
            }
            if ($iStyles) {
                $styles[] = '.lwptoc .lwptoc_i{' . implode($iStyles) . '}';
            }

            if ($color = ArrayHelper::getValue(Toc::$overrideColors, 'titleColor')) {
                $styles[] = '.lwptoc_header{color:' . $color . ';}';
            }

            if ($color = ArrayHelper::getValue(Toc::$overrideColors, 'linkColor')) {
                $styles[] = '.lwptoc .lwptoc_i A{color:' . $color . ';}';
            }
            if ($color = ArrayHelper::getValue(Toc::$overrideColors, 'hoverLinkColor')) {
                $styles[] = '.lwptoc .lwptoc_i A:hover,.lwptoc .lwptoc_i A:focus,.lwptoc .lwptoc_i A:active{color:' . $color . ';border-color:' . $color . ';}';
            }
            if ($color = ArrayHelper::getValue(Toc::$overrideColors, 'visitedLinkColor')) {
                $styles[] = '.lwptoc .lwptoc_i A:visited{color:' . $color . ';}';
            }

            if ($styles) {
                echo '<style>' . implode('', $styles) . '</style>';
            }
        }
    }

    /**
     * @param string $content
     * @return string
     */
    public function autoInsert($content)
    {
        global $post;

        if (!is_single($post) && !is_page($post)) {
            return $content;
        }

        if (!in_array($post->post_type, Core::$plugin->settings->getPostTypesForProcessingHeadings())) {
            return $content;
        }

        if (has_shortcode($content, Core::$plugin->shortcode->getTag())) {
            return $content;
        }

        if (apply_filters('lwptoc_disable_autoinsert', false)) {
            return $content;
        }

        $settings = new PostSettings($post->ID);
        if (!$settings->enabled) {
            return $content;
        }

        $attrs = [];
        $attrs['min'] = $settings->min;
        $attrs['depth'] = $settings->depth;
        $attrs['hierarchical'] = $settings->hierarchical;
        $attrs['numeration'] = $settings->numeration;
        $attrs['numerationSuffix'] = $settings->numerationSuffix;
        $attrs['title'] = $settings->title;
        $attrs['toggle'] = $settings->toggle;
        $attrs['labelShow'] = $settings->labelShow;
        $attrs['labelHide'] = $settings->labelHide;
        $attrs['hideItems'] = $settings->hideItems;
        $attrs['smoothScroll'] = $settings->smoothScroll;
        $attrs['smoothScrollOffset'] = $settings->smoothScrollOffset;
        $attrs['width'] = $settings->width;
        $attrs['float'] = $settings->float;
        $attrs['titleFontSize'] = $settings->titleFontSize;
        $attrs['titleFontWeight'] = $settings->titleFontWeight;
        $attrs['itemsFontSize'] = $settings->itemsFontSize;
        $attrs['colorScheme'] = $settings->colorScheme;
        $attrs['backgroundColor'] = $settings->backgroundColor;
        $attrs['borderColor'] = $settings->borderColor;
        $attrs['titleColor'] = $settings->titleColor;
        $attrs['linkColor'] = $settings->linkColor;
        $attrs['hoverLinkColor'] = $settings->hoverLinkColor;
        $attrs['visitedLinkColor'] = $settings->visitedLinkColor;
        $attrs['wrapNoindex'] = $settings->wrapNoindex;
        $attrs['useNofollow'] = $settings->useNofollow;
        $attrs['skipHeadingLevel'] = $settings->skipHeadingLevel;
        $attrs['skipHeadingText'] = $settings->skipHeadingText;

        $shortcode = Core::$plugin->shortcode->make($attrs);

        $position = $settings->position ? $settings->position : Core::$plugin->settings->autoInsertPosition;
        switch ($position) {
            case 'beforefirstheading':
            default:
                $result = preg_replace($this->generateRegexp('h[1-6]'), $shortcode . ' $1', $content, 1, $count);
                return $count ? $result : ($shortcode . $content);

            case 'afterfirstheading':
                $result = preg_replace($this->generateRegexp('h[1-6]'), '$1 ' . $shortcode, $content, 1, $count);
                return $count ? $result : ($shortcode . $content);

            case 'afterfirstblock':
                $result = preg_replace($this->generateRegexp('p|h[1-6]'), '$1 ' . $shortcode, $content, 1, $count);
                return $count ? $result : ($shortcode . $content);

            case 'bottom':
                return $content . $shortcode;

            case 'top':
                return $shortcode . $content;
        }
    }

    /**
     * @param string $tagsRe
     * @return string
     */
    protected function generateRegexp($tagsRe)
    {
        return '#(<(' . $tagsRe . ')[^>]*>.*?</\2>)#imsu';
    }
}