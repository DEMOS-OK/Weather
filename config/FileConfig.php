<?php

namespace config;

use config\Config;

/**
 * Содержит в себе настройки, связанные с файлами
 */
class FileConfig extends Config
{
    protected static $settings = [
        'controllers_postfix' => 'Controller',
        'controllers_ext'    => '.php',
        'views_ext'          => '.php',
    ];
}
