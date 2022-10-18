<?php

namespace App\Libraries;

class CurrencyService {
    
    private static $client;
    private static $configQuery;
    private static $url;
    
    public static function init()
    {
        static::$client  = \Config\Services::curlrequest();
        static::$configQuery =
            ['query' => [
                'format' => 'json',
                'limit' => '1' ],
                'user_agent' => 'Mozilla/5.0 (X11; Linux i686; rv:99.0) Gecko/20100101 Firefox/99.0'
            ];
        static::$client  = \Config\Services::curlrequest(static::$configQuery);
        static::$url= 'https://api.nbp.pl/api/exchangerates/tables/A/?format=json';
    }

}
