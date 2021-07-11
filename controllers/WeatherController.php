<?php

namespace controllers;

use classes\loaders\LoaderJSON;
use classes\loaders\LoaderXML;
use classes\weather\WeatherAPI;

/**
 * Контроллер для получения данных о погоде
 */
class WeatherController extends Controller
{

    /**
     * Конструктор класса
     */
    public function __construct()
    {
        $this->weatherAPI = new WeatherAPI;
        $this->loaderJSON = new LoaderJSON;
        $this->loaderXML = new LoaderXML;
    }

    /**
     * Возвращает данные о погоде в нужном формате
     */
    public function get()
    {
        //Получение данных формы
        $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $format = filter_var($_POST['format'], FILTER_SANITIZE_STRING);

        if (!$city || !$format)
            redirect('/');

        //Получение данных о погоде
        $data = $this->weatherAPI->getWeather($city);

        //Установка загрузчика файла в нужном формате
        if ($format == 'json') {
            $loader = $this->loaderJSON;
        } elseif ($format == 'xml') {
            $loader = $this->loaderXML;
        }

        if ($data->cod == 404)
            $this->loadInSection('city_not_found');

        //Формируем данные и скачиваем файл
        $loader->saveData($data);
    }

}
