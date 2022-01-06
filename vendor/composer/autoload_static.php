<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc010b6d03c41634c2ca2fa30378402bc
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc010b6d03c41634c2ca2fa30378402bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc010b6d03c41634c2ca2fa30378402bc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc010b6d03c41634c2ca2fa30378402bc::$classMap;

        }, null, ClassLoader::class);
    }
}