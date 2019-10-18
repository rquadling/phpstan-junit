<?php

function pollyfiller(string $directory)
{
    foreach (
        new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $directory,
                RecursiveDirectoryIterator::SKIP_DOTS
            )
        )
        as $fileName => $file) {
        if ($fileName !== __FILE__) {
            require_once $fileName;
        }
    }
}

pollyfiller(__DIR__);
