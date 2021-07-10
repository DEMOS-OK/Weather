<?php

/**
 * Этот файл содержит в себе функции, помогающие в разработке
 */

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