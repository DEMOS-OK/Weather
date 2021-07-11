<?php

namespace classes\loaders;

/**
 * Загрузчик данных о погоде в формате JSON
 */
class LoaderJSON extends Loader
{

    /**
     * Конструктор класса
     */
    public function __construct()
    {
        $this->format = 'json';
    }

    /**
     * Возвращает данные в нужном формате
     * @return mixed
     */
    public function generateData()
    {
        //Получаем данные и кодируем в JSON
        $data = json_encode($this->genDataArray());

        return $data;
    }

    /**
     * Формирует массив с нужными данными
     * @return array
     */
    private function genDataArray()
    {
        $data = [
            'Date'          => date('Y-m-d H:i:s'),
            'Temperature'   => $this->data->main->temp,
            'WindDirection' => $this->data->wind->deg,
            'City'          => $this->data->name,
            'FeelsLike'     => $this->data->main->feels_like,
        ];

        return $data;
    }

}