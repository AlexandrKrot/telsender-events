<?php

\spl_autoload_register(function ($class) {

    if (stripos($class, 'pechenki\TelsenderEvent') !== 0) {
    return;
    }


    $classFile = str_replace('\\', '/', substr($class, strlen('pechenki\TelsenderEvent') + 1) . '.php');

    include_once __DIR__ . '/' . $classFile; 
});
