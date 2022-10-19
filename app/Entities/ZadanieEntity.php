<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ZadanieEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    
    public function getName(){
        return $this->attributes["name"];
    }
    
      public function SetName($name){
         $this->attributes["name"]=$name;
    }
    
     public function getCurrencyCode(){
        return $this->attributes["currency_code"];
    }
    
    public function setCurrencyCode($code){
        return $this->attributes["currency_code"]=$code;
    }
    
    public function getCurrencyExchange(){
        return $this->attributes["exchange_rate"];
    }
    
     public function setCurrencyExchange($currency){
        return $this->attributes["exchange_rate"]=$currency;
    }
    
}
