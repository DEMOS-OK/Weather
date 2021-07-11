<?php

namespace classes\loaders;

/**
 * Формирует данные в нужном формате
 * Сохраняет эти данные в файле нужного расширения
 */
abstract class Loader
{

    /**
     * Данные о погоде
     * @var mixed $data
     */
    protected $data;

    /**
     * В каком формате данные будут сохраняться
     * @var string $format
     */
    protected $format;

    /**
     * Скачивает данные в файл
     * @param mixed $data
     */
    public function saveData($data)
    {
        $this->setData($data);
        $result = $this->generateData();
        $fname = $this->writeToFile($result);

        $this->fileDownload($fname);
    }

    /**
     * Указать данные, по которым будет формироваться файл
     * @param stdClass $data
     */
    private function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Возвращает массив с нужными данными
     * @return mixed
     */
    abstract protected function generateData();

    /**
     * Записывает данные в файл
     * @param mixed $data
     * @return string
     */
    private function writeToFile($data)
    {
        $fname = $_SERVER['DOCUMENT_ROOT'] . "data/" . uniqid() . ".{$this->format}";
        $file = fopen($fname, 'w+');
        fwrite($file, $data);
        fclose($file);

        return $fname;
    }

    /**
     * Функция скачивания файла
     * @param string $filename
     */
    private function fileDownload($filename)
    {
        header("Content-Type: " . filetype($filename));
        header("Content-Length: " . filesize($filename));
        header("Content-Disposition: attachment; filename=" . basename($filename));
        header("Content-type: application/force-download");
        header("Content-type: application/octet-stream");
        echo file_get_contents($filename);
    }

}