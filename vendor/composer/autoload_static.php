<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit923c53156f8f60ff5bd7f4c84a321b8e
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'modules\\' => 8,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modules',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit923c53156f8f60ff5bd7f4c84a321b8e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit923c53156f8f60ff5bd7f4c84a321b8e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit923c53156f8f60ff5bd7f4c84a321b8e::$classMap;

        }, null, ClassLoader::class);
    }
}
