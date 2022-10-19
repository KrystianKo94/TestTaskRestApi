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
                'user_agent' => 'Mozilla/5.0 (X11; Linux i686; rv:99.0) Gecko/20100101 Firefox/99.0'
            ],
        ];
        static::$client  = \Config\Services::curlrequest(static::$configQuery);
        static::$url= 'https://api.nbp.pl/api/exchangerates/tables/A/?format=json';
        return self::getCurrenciesFromApi();
        
    }
    
        private static function getCurrenciesFromApi(){
        try {
           
            $response =static::$client->request("GET",static::$url,static::$configQuery);
            if($response ->getStatusCode() == 200){
                return json_decode($response ->getBody());
            }
            else{
                log_message('debug',"[CurrencyService::getCurrienciesFromApi]::Uruchomienie uslugi");
                return null;
            }
        }
        catch(Exception $e) {
            die( 'Message: ' .$e->getMessage());
        }

    }

}
