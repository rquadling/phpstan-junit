<?php

function pollyfiller(string $directory)
{
    /** @var \Composer\Autoload\ClassLoader $autoLoader */
    $autoLoader = require dirname(__DIR__).'/vendor/autoload.php';
    foreach (
        new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $directory,
                RecursiveDirectoryIterator::SKIP_DOTS
            )
        )
        as $file) {
        if ($file !== __FILE__) {
            $class = require_once $file;
            if (is_string($class)) {
                $autoLoader->add($class, $file);
            }
        }
    }
}

pollyfiller(__DIR__);
