<?php

//Подключение необходимых компонентов
require_once 'autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../helpers/functions.php';

//Подключение необходимых классов
use classes\Router;

//Получение имени контроллера и его экшена
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
$actionName = isset($_GET['action']) ? ucfirst($_GET['action']) : 'index';

//Загружаем нужную страницу, используя роутер
$router = new Router($controllerName, $actionName);
$router->run();