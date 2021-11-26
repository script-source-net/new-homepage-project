<?php


class sRackets
{
    protected $racket_name;
    protected $racket_size;
    protected $racket_type;
    protected $racket_weight;
    protected $brand_name;

    public function getRacketName(){
        return $this->racket_name;
    }
    public function getRacketSize(){
        return $this->racket_size;
    }
    public function getRacketType(){
        return $this->racket_type;
    }
    public function getRacketWeight(){
        return $this->racket_weight;
    }
    public function getBrandName(){
        return $this->brand_name;
    }

}