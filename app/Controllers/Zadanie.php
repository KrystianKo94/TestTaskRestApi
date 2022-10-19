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
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $zadanieModel=new ZadanieModel();
        $zadanieEntity= new ZadanieEntity();
        $arraycurrency=Services::CurrencyService()[0]->rates;
        log_message('debug','[Zadanie::currencyExchange]::Wykonanie petli oraz warunku sprawdzajacego czy dane znajduja sie w bazie, czy tez nie');
        foreach($arraycurrency as $currency){
            echo $currency->code;
            echo "\n";
            $zadanieEntity=$zadanieModel->findIdByCurrencyCode($currency->code);
            if(is_null($zadanieEntity)){
            $zadanieEntity= new ZadanieEntity();
            $zadanieEntity->setName($currency->currency);
            $zadanieEntity->setCurrencyCode($currency->code);
            $zadanieEntity->setCurrencyExchange($currency->mid);
            $zadanieEntity->setId($uuid->uuid4()->toString());
            $zadanieModel->insert($zadanieEntity);
            }
            else{
            $zadanieEntity->setCurrencyExchange($currency->mid);
            $zadanieModel->save($zadanieEntity);
            }
            
        }
        
    }
}
