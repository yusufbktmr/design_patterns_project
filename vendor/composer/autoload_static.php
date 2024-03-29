<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5fa95ced6cf1221f884f79dfcc319864
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Application\\Libraries\\Api\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Application\\Libraries\\Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/libraries/Api',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5fa95ced6cf1221f884f79dfcc319864::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5fa95ced6cf1221f884f79dfcc319864::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
