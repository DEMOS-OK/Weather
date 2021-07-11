<?php

namespace config;

use config\Config;

/**
 * Содержит в себе настройки Weather API
 */
class APIConfig extends Config
{
    protected static $settings = [
        'api_key' => '987049b9d3154a2085a3f1de74aae1f5',
        'lang'    => 'ru',
        'units'   => 'metric',
    ];
}
