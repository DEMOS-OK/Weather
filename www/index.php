<?php

//Подключение необходимых компонентов
require_once 'autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../helpers/functions.php';

//Подключение необходимых классов
use classes\Router;

//Загружаем нужную страницу, используя роутер
$router = new Router();
$router->run();