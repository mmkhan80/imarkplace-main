<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9d546b77beba259dc3e85b1f3822ca7
{
    public static $files = array (
        '6603ea0d28863725562c9f5b49a3f898' => __DIR__ . '/../..' . '/registration.php',
    );

    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Easypaisa\\Easypay\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Easypaisa\\Easypay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $fallbackDirsPsr0 = array (
        0 => __DIR__ . '/../..' . '/app/code',
        1 => __DIR__ . '/../..' . '/var/generation',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
//            $loader->prefixLengthsPsr4 = ComposerStaticInitc9d546b77beba259dc3e85b1f3822ca7::$prefixLengthsPsr4;
//            $loader->prefixDirsPsr4 = ComposerStaticInitc9d546b77beba259dc3e85b1f3822ca7::$prefixDirsPsr4;
//            $loader->fallbackDirsPsr0 = ComposerStaticInitc9d546b77beba259dc3e85b1f3822ca7::$fallbackDirsPsr0;

        }, null, ClassLoader::class);
    }
}
