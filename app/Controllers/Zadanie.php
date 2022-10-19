<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ZadanieModel;
use Config\Services;
use App\Entities\ZadanieEntity;


class Zadanie extends BaseController
{
    public function index()
    {
        //
    }
    
    public function currencyExchange(){
        $zadanieModel=new ZadanieModel();
        $zadanieEntity= new ZadanieEntity();
        echo "test";
        //echo var_dump(Services::CurrencyService()[0]->rates[0]->code);
        $arraycurrency=Services::CurrencyService()[0]->rates;
        log_message('debug','Zadanie::currencyExchange');
        foreach($arraycurrency as $currency){
         //echo var_dump($currency); //$currency->code."\n";
            echo $currency->code;
            echo "\n";
            $zadanieEntity->setName($currency->currency);
            $zadanieEntity->setCurrencyCode($currency->code);
            $zadanieEntity->setCurrencyExchange($currency->mid);
            $zadanieModel->save($zadanieEntity);
            $zadanie=new ZadanieEntity();
        }
        
    }
}
