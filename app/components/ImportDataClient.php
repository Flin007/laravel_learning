<?php

namespace App\components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    /**
     * @param $client
     */
    public function __construct()
    {

        $this->client = new Client([
            // URL адрес на который идет запрос
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            // Время, которое клиент будет пытаться получить данные
            'timeout'  => 2.0,
            'verify' => false
        ]);
    }

}
