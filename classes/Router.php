<?php

namespace classes;

use config\RouterConfig as Config;

/**
 * Класс-маршрутизатор, определяет какой контроллер и метод
 * использовать для формирования страницы 
 */
class Router
{
    /**
     * Имя контроллера
     * @var string $controllerName
     */
    private $controllerName;


    /**
     * Имя метода в контроллере
     * @var string $actionName
     */
    private $actionName;

    /**
     * Конструктор маршрутизатора
     * @param string $controllerName
     * @param string $actionName
     */
    public function __construct($controllerName, $actionName)
    {
        $this->controllerName = $controllerName . Config::get('controllers_prefix');
        $this->actionName = $actionName . Config::get('actions_prefix');
    }

    /**
     * Запускает процесс роутинга
     */
    public function run()
    {
        dd($this->controllerName);
    }
}