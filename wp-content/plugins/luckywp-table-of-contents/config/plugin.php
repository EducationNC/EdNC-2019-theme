<?php
return [
    'textDomain' => 'luckywp-table-of-contents',
    'bootstrap' => [
        'activation',
        'admin',
        'editorBlock',
        'front',
        'mcePlugin',
        'shortcode',
    ],
    'pluginsLoadedBootstrap' => [
        'settings',
    ],
    'components' => [
        'activation' => \luckywp\tableOfContents\plugin\Activation::className(),
        'admin' => \luckywp\tableOfContents\admin\Admin::className(),
        'front' => \luckywp\tableOfContents\front\Front::className(),
        'mcePlugin' => \luckywp\tableOfContents\plugin\mcePlugin\McePlugin::className(),
        'options' => \luckywp\tableOfContents\core\wp\Options::className(),
        'rate' => \luckywp\tableOfContents\admin\Rate::className(),
        'request' => \luckywp\tableOfContents\core\base\Request::className(),
        'settings' => [
            'class' => \luckywp\tableOfContents\plugin\Settings::className(),
            'initGroupsConfigFile' => __DIR__ . '/settings.php',
        ],
        'editorBlock' => \luckywp\tableOfContents\plugin\editorBlock\EditorBlock::className(),
        'shortcode' => \luckywp\tableOfContents\plugin\Shortcode::className(),
        'view' => \luckywp\tableOfContents\core\base\View::className(),
    ],
];
