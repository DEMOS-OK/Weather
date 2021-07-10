<?php

namespace config;

use config\Config;

/**
 * Содержит в себе настройки маршрутизатора
 */
class RouterConfig extends Config
{
    protected static $settings = [
        'controllers_prefix' => 'Controller.php',
        'actions_prefix'     => '',
    ];
}