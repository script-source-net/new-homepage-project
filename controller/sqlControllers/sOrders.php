<?php


class sOrders
{
    protected $maintension;
    protected $crosstension;
    protected $customers_lastname;
    protected $customers_firstname;
    protected $orders_date;
    protected $mainstring;
    protected $crossstring;
    protected $racket_name;
    protected $racketbrand;

    public function getCustomerLastname(){
        return $this->customers_lastname;
    }
    public function getCustomerFirstname(){
        return $this->customers_firstname;
    }
    public function getOrdersMainString(){
        return $this->mainstring;
    }
    public function getOrdersCrossString(){
        return $this->crossstring;
    }
    public function getOrdersMainTension(){
        return $this->maintension;
    }
    public function getOrdersCrossTension(){
        return $this->crosstension;
    }
    public function getOrdersDate(){
        return $this->orders_date;
    }
    public function getRacketName(){
        return $this->racket_name;
    }
    public function getRacketBrand(){
        return $this->racketbrand;
    }
}