<?php
function my_custom_autoloader(string $class_name): void
{
    $path = mb_split(
        '\\\\',
        mb_strtolower($class_name),
    );
    $file = __DIR__.'/includes/'.join('/', $path).'.php';

    if ( file_exists($file) ) {
        require_once $file;
    }
}