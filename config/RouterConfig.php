<?php

namespace config;

use config\Config;

/**
 * Содержит в себе настройки маршрутизатора
 */
class RouterConfig extends Config
{
    protected static $settings = [
        'error_controller'      => 'ErrorController.php',
        'namespace_controllers' => 'controllers',
        'default_controller'    => 'Index',
        'default_action'        => 'index',
    ];
}
