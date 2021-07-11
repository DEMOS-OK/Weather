<?php

namespace classes;

use config\FileConfig;
use config\PathConfig;
use config\RouterConfig;

/**
 * Класс-маршрутизатор, определяет какой контроллер и метод
 * использовать для формирования страницы и подключает.
 */
class Router
{
    /**
     * Название файла контроллера
     * @var string $controllerFile
     */
    private $controllerFile;


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
        //Получение полного пути к контроллеру, названия файла, экшена
        $controllerPath = $this->getControllerPath($this->controllerFile);
        $controllerFile = $this->controllerFile;
        $action = $this->actionName;

        //Если такого контроллера нет, то вызываем контроллер ошибок
        if (!file_exists($controllerPath)) {
            $controllerFile = RouterConfig::get('error_controller');
            $controllerPath = $this->getControllerPath($controllerFile);
            $action = 'pageNotFound';
        } 

        //Подключение нужного контроллера
        require_once $controllerPath;

        //Создание объекта и вызов соответствующего метода
        $controllerClass = $this->getControllerClass($controllerFile);
        $controller = new $controllerClass;
        $controller->$action();
    }

    /**
     * Получает полный путь к контроллеру
     * @param string $controllerFile
     * @return string
     */
    private function getControllerPath($controllerFile)
    {
        //Формирование пути к контроллеру
        $dir = PathConfig::get('controllers_dir');
        $path = $dir . $controllerFile;

        return $path;
    }

    /**
     * Получает имя файла по имени контроллера
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

    /**
     * Получает полное имя класса по названию файла
     * @param string $file
     * @return string
     */
    private function getControllerClass($file)
    {
        $namespace = RouterConfig::get('namespace_controllers');
        $class = "{$namespace}\\" . explode('.', $file)[0];

        return $class;
    }
}