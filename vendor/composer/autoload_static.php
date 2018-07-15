<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9b53417e4f24b85d28186f2a7d640f1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/rest-api-sdk-php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9b53417e4f24b85d28186f2a7d640f1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9b53417e4f24b85d28186f2a7d640f1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite9b53417e4f24b85d28186f2a7d640f1::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
