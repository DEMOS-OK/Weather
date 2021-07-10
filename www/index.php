<?php

//Подключение необходимых компонентов
require_once 'autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../helpers/functions.php';

//Получение имени контроллера и его экшена
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
$actionName = isset($_GET['action']) ? ucfirst($_GET['action']) : 'index';

