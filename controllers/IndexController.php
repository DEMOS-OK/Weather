<?php

namespace controllers;

/**
 * Контроллер, содержащий в себе методы по работе с главной страницей
 */
class IndexController extends Controller
{

    /**
     * Главная страница
     */
    public function index()
    {
        $this->loadInSection('index');
    }

}
