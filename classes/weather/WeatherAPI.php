<?php

namespace classes\weather;

use config\APIConfig;

/**
 * Класс, работающий с OpenWeatherAPI
 */
class WeatherAPI
{

    /**
     * Ключ API OpenWeather
     * @var string $apiKey
     */
    protected $apiKey;

    /**
     * Градусы
     * @var string $units
     */
    protected $units;

    /**
     * Язык
     * @var string $lang
     */
    protected $lang;

    /**
     * Инициализация основных свойств класса
     */
    public function __construct()
    {
        $this->apiKey = APIConfig::get('api_key');
        $this->units  = APIConfig::get('units');
        $this->lang   = APIConfig::get('lang');
    }

    /**
     * Возвращает данные о погоде в городе
     * @param string $city
     */
    public function getWeather($city)
    {
        //Инициализируем запрос
        $ch = curl_init();
        $url = $this->getUrl($city);

        //Настраиваем запрос
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        //Отправляем запрос и получаем ответ
        $data = json_decode(curl_exec($ch));

        //Закрываем запрос
        curl_close($ch);
        
        return $data;
    }

    /**
     * Формирует url запроса к open weather api
     * @param string $city
     * @return string
     */
    private function getUrl($city)
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&lang={$this->lang}&units={$this->units}&appid={$this->apiKey}";
        
        return $url;
    }

}