<?php

use luckywp\tableOfContents\core\Core;
use luckywp\tableOfContents\front\Toc;

/**
 * @param array $items
 * @param bool $echo
 * @return string|null
 */
function lwptoc_items($items, $echo = true)
{
    $html = '';
    if ($items) {
        Toc::$currentOutputDepth++;
        $html = Core::$plugin->front->render('items', [
            'items' => $items,
            'depth' => Toc::$currentOutputDepth,
        ]);
        Toc::$currentOutputDepth--;
    }
    if ($echo) {
        echo $html;
        return null;
    }
    return $html;
}
