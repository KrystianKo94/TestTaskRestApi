<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ZadanieModel;
use Config\Services;


class Zadanie extends BaseController
{
    public function index()
    {
        //
    }
    
    public function currencyExchange(){
        echo "test";
        echo var_dump(Services::CurrencyService());
        log_message('debug','Zadanie::currencyExchange');
    }
}
