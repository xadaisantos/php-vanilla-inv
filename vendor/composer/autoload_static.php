<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit855de6806da9c016b8330d95da905bf4
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit855de6806da9c016b8330d95da905bf4::$classMap;

        }, null, ClassLoader::class);
    }
}
