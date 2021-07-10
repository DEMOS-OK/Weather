<?php

namespace config;

/**
 * Базовый класс конфигурации
 */
abstract class Config
{

    /**
     * Массив с настройками
     * @var array $settings
     */
    protected static $settings;

    /**
     * Возвращает нужное значение из конфигурацмии
     * @param string $key
     * @return mixed
     */
    public static function get($key)
    {
        if (key_exists($key, static::$settings))
            return static::$settings[$key];

        return null;
    }
}
