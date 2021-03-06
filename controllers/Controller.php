<?php

namespace controllers;

/**
 * Базовый контроллер
 */
class Controller
{

    /**
     * Оборачивает указанное представление хедером сверху и футером снизу
     * @param string $view
     */
    protected function loadInSection($view)
    {
        view('header');
        view($view);
        view('footer');
        exit;
    }

}