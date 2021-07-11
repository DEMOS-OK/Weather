<?php

/**
 * Этот файл содержит в себе функции, помогающие в разработке
 */

//Подключение необходимых компонентов
use config\PathConfig;
use config\FileConfig;


/**
 * Функция-отладчик, выводит 
 * @param mixed $value
 * @param int $die
 */
function dd($value = null, $die = 1)
{

    function debugOut($a)
    {
        echo "<br><b>" . basename($a['file']) . "</b>"
        . "&nbsp;<font color = 'red'> ({$a['line']}) </font>"
        . "&nbsp;<font color = 'green'> {$a['function']}() </font>"
        . "&nbsp; -- " . dirname($a['file']);
    }

    echo "<pre style='background: #01001c; color: white; padding: 5px;'>";
    $trace = debug_backtrace();
    array_walk($trace, 'debugOut');
    echo "\n\n";
    print_r($value);
    echo "</pre>";

    if ($die) die;
}

/**
 * Перенаправляет на указанную страницу
 * @param string $url
 */
function redirect($url = '')
{
    header("Location: {$url}");
}

/**
 * Загружает указанное представление
 * @param string $name
 */
function view($name)
{
    //Формирование пути к представлению
    $dir = PathConfig::get('views_dir');
    $ext = FileConfig::get('views_ext');
    $path = "{$_SERVER['DOCUMENT_ROOT']}{$dir}/{$name}{$ext}";

    //Если такого файла нет, то грузим 404
    if (!file_exists($path)) {
        $path = "{$_SERVER['DOCUMENT_ROOT']}{$dir}/404{$ext}";
    }

    require_once $path;
}