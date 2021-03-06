<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54adbc9c1988fe89152531a879345034
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyTodo\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyTodo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'MyTodo\\Database\\Database' => __DIR__ . '/../..' . '/src/app/Database.php',
        'MyTodo\\Todo\\Todo' => __DIR__ . '/../..' . '/src/todo/Todos.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54adbc9c1988fe89152531a879345034::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54adbc9c1988fe89152531a879345034::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54adbc9c1988fe89152531a879345034::$classMap;

        }, null, ClassLoader::class);
    }
}
