<?php

/**
 * Автозагрузка классов
 */

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '_', $className);
    $className = str_replace('/', '_', $className);
    $fileName = '../' . str_replace('_', '/', $className) . '.php';

    if (file_exists($fileName))
        require_once $fileName;
});
