<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0b308bc055bd9c291364960c1158f06
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..' . '/illuminate/support/helpers.php',
        '86ade239cbe8025aa999b5c6eb117f17' => __DIR__ . '/..' . '/watson/active/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webmkr\\Hub\\' => 11,
            'Watson\\Active\\' => 14,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\' => 18,
            'Symfony\\Component\\Translation\\' => 30,
            'Symfony\\Component\\Routing\\' => 26,
            'Symfony\\Component\\HttpKernel\\' => 29,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Symfony\\Component\\Debug\\' => 24,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Session\\' => 19,
            'Illuminate\\Routing\\' => 19,
            'Illuminate\\Pipeline\\' => 20,
            'Illuminate\\Http\\' => 16,
            'Illuminate\\Filesystem\\' => 22,
            'Illuminate\\Database\\' => 20,
            'Illuminate\\Contracts\\' => 21,
            'Illuminate\\Container\\' => 21,
            'Illuminate\\Config\\' => 18,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Inflector\\' => 26,
        ),
        'C' => 
        array (
            'Cviebrock\\EloquentSluggable\\' => 28,
            'Cocur\\Slugify\\' => 14,
            'Carbon\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webmkr\\Hub\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Watson\\Active\\' => 
        array (
            0 => __DIR__ . '/..' . '/watson/active/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/contracts',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Symfony\\Component\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/routing',
        ),
        'Symfony\\Component\\HttpKernel\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-kernel',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/support',
        ),
        'Illuminate\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/session',
        ),
        'Illuminate\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/routing',
        ),
        'Illuminate\\Pipeline\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/pipeline',
        ),
        'Illuminate\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/http',
        ),
        'Illuminate\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/filesystem',
        ),
        'Illuminate\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/database',
        ),
        'Illuminate\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/contracts',
        ),
        'Illuminate\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/container',
        ),
        'Illuminate\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/config',
        ),
        'Doctrine\\Common\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Common/Inflector',
        ),
        'Cviebrock\\EloquentSluggable\\' => 
        array (
            0 => __DIR__ . '/..' . '/cviebrock/eloquent-sluggable/src',
        ),
        'Cocur\\Slugify\\' => 
        array (
            0 => __DIR__ . '/..' . '/cocur/slugify/src',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0b308bc055bd9c291364960c1158f06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0b308bc055bd9c291364960c1158f06::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
