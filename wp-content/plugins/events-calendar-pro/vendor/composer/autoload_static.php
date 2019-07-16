<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba54c820ae95b33570d5e4d41836d52a
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tribe\\Tests\\Pro\\' => 16,
            'Tribe\\Tests\\Modules\\Pro\\' => 24,
            'Tribe\\Events\\Pro\\Views\\' => 23,
            'Tribe\\Events\\Pro\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tribe\\Tests\\Pro\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/_support',
        ),
        'Tribe\\Tests\\Modules\\Pro\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/_support/Modules',
        ),
        'Tribe\\Events\\Pro\\Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/views_integration/Tribe/Events/Pro/Views',
        ),
        'Tribe\\Events\\Pro\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tribe',
        ),
    );

    public static $classMap = array (
        'Tribe\\Events\\Pro\\Rewrite\\Provider' => __DIR__ . '/../..' . '/src/Tribe/Rewrite/Provider.php',
        'Tribe\\Events\\Pro\\Rewrite\\Rewrite' => __DIR__ . '/../..' . '/src/Tribe/Rewrite/Rewrite.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Assets' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Assets.php',
        'Tribe\\Events\\Pro\\Views\\V2\\ContextMocker' => __DIR__ . '/../..' . '/tests/views_integration/Tribe/Events/Pro/Views/V2/ContextMocker.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Hooks' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Hooks.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Location' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Location.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Recurrence' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Recurrence.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Service_Provider.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Shortcodes\\Manager' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Shortcodes/Manager.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Shortcodes\\Shortcode_Abstract' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Shortcodes/Shortcode_Abstract.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Shortcodes\\Shortcode_Interface' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Shortcodes/Shortcode_Interface.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Shortcodes\\Tribe_Events' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Shortcodes/Tribe_Events.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Templates' => __DIR__ . '/../..' . '/src/Tribe/Views/V2/Templates.php',
        'Tribe\\Events\\Pro\\Views\\V2\\TestCase' => __DIR__ . '/../..' . '/tests/views_integration/Tribe/Events/Pro/Views/V2/TestCase.php',
        'Tribe\\Events\\Pro\\Views\\V2\\TestHtmlCase' => __DIR__ . '/../..' . '/tests/views_integration/Tribe/Events/Pro/Views/V2/TestHtmlCase.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Views\\HTML\\LocationTest' => __DIR__ . '/../..' . '/tests/views_integration/Tribe/Events/Pro/Views/V2/HTML/LocationTest.php',
        'Tribe\\Events\\Pro\\Views\\V2\\Views\\HTML\\RecurrenceTest' => __DIR__ . '/../..' . '/tests/views_integration/Tribe/Events/Pro/Views/V2/HTML/RecurrenceTest.php',
        'Tribe\\Tests\\Modules\\Pro\\Acceptance\\Options' => __DIR__ . '/../..' . '/tests/_support/Modules/Acceptance/Options.php',
        'Tribe\\Tests\\Modules\\Pro\\Acceptance\\Theme' => __DIR__ . '/../..' . '/tests/_support/Modules/Acceptance/Theme.php',
        'Tribe\\Tests\\Modules\\Pro\\Acceptance\\Widgets' => __DIR__ . '/../..' . '/tests/_support/Modules/Acceptance/Widgets.php',
        'Tribe\\Tests\\Pro\\Factories\\Event' => __DIR__ . '/../..' . '/tests/_support/Factories/Event.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba54c820ae95b33570d5e4d41836d52a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba54c820ae95b33570d5e4d41836d52a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba54c820ae95b33570d5e4d41836d52a::$classMap;

        }, null, ClassLoader::class);
    }
}
