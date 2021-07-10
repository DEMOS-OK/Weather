<?php

namespace classes;

use config\FileConfig;
use config\PathConfig;

/**
 * Класс-маршрутизатор, определяет какой контроллер и метод
 * использовать для формирования страницы и подключает.
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
        $this->controllerFile = $this->getControllerFile($controllerName);
        $this->controllerClass = $controllerName;
        $this->actionName = $actionName;
    }

    /**
     * Запускает процесс роутинга
     */
    public function run()
    {
        //Получение полного пути к контроллеру
        $controllerPath = $this->getControllerPath();

        if (file_exists($controllerPath)) {
            require_once $controllerPath;

            $controller = new $this->controllerClass;
            $action = $this->actionName;

            $controller->$action();
        } else {
            dd('error');
        }
    }

    /**
     * Получает полный путь к контроллеру
     */
    private function getControllerPath()
    {
        //Формирование пути к контроллеру
        $dir = PathConfig::get('controllers_dir');
        $path = $_SERVER['DOCUMENT_ROOT'] . $dir . $this->controllerFile;

        return $path;
    }

    /**
     * Получает имя файла контроллера по имени контроллера
     * @param string $name
     * @return string
     */
    private function getControllerFile($name)
    {
        //Формирование имени контроллера
        $postfix = FileConfig::get('controllers_postfix');
        $extension = FileConfig::get('controllers_ext');
        $file = $name . $postfix . $extension;

        return $file;
    }
}