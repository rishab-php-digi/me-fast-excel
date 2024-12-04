<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb9b6d3a5442ce9512557271c266898e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Me\\FastExcel\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Me\\FastExcel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb9b6d3a5442ce9512557271c266898e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb9b6d3a5442ce9512557271c266898e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb9b6d3a5442ce9512557271c266898e::$classMap;

        }, null, ClassLoader::class);
    }
}