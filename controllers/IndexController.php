<?php

namespace controllers;

/**
 * Контроллер, содержащий в себе методы по работе с главной страницей
 */
class IndexController extends Controller
{

    /**
     * Страница не найдена. Загружает представление 404 ошибки
     */
    public function index()
    {
        $this->loadInSection('index');
    }

}
