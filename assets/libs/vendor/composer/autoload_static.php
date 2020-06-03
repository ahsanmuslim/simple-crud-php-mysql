<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit914344b9d1826bb688e8a87a10d1f918
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        'e39a8b23c42d4e1452234d762b03835a' => __DIR__ . '/..' . '/ramsey/uuid/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'R' => 
        array (
            'Ramsey\\Uuid\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Ramsey\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramsey/uuid/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit914344b9d1826bb688e8a87a10d1f918::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit914344b9d1826bb688e8a87a10d1f918::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit914344b9d1826bb688e8a87a10d1f918::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}