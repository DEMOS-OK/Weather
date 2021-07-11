<?php

namespace controllers;

/**
 * Контроллер, содержащий в себе методы, загружающие страницы в случае ошибок
 */
class ErrorController extends Controller
{

    /**
     * Страница не найдена. Загружает представление 404 ошибки
     */
    public function pageNotFound()
    {
        view('404');
    }
}