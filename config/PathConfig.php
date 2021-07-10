<?php

namespace config;

use config\Config;

/**
 * Содержит в себе настройки путей
 */
class PathConfig extends Config
{
    protected static $settings = [
        'controllers_dir' => "../controllers/",
        'views_dir'       => '../views/',
    ];
}
