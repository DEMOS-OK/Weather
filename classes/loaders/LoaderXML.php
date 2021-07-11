<?php

namespace classes\loaders;

use SimpleXMLElement;

/**
 * Загрузчик данных о погоде в формате XML
 */
class LoaderXML extends Loader
{

    /**
     * Конструктор класса
     */
    public function __construct()
    {
        $this->format = 'xml';
    }

    /**
     * Возвращает данные в нужном формате
     * @return mixed
     */
    public function generateData()
    {
        $data = $this->genDataArray();
        
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><values/>');

        foreach ($data as $key => $value) {
            $xml->addChild($key, $value);
        }

        return $xml->asXML();
    }

    /**
     * Формирует массив с нужными данными
     * @return array
     */
    private function genDataArray()
    {
        $data = [
            'Date'       => date('Y-m-d H:i:s'),
            'WindSpeed'  => $this->data->wind->speed,
            'Temprature' => $this->data->main->temp,
            'City'       => $this->data->name,
            'FeelsLike'  => $this->data->main->feels_like,
        ];

        return $data;
    }

}
