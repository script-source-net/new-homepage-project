<?php


class sStrings
{
    protected $brand_name;
    protected $strings_name;
    protected $strings_color;
    protected $strings_thickness;
    protected $strings_type;

    public function getBrandName(){
        return $this->brand_name;
    }
    public function getStringsName(){
        return $this->strings_name;
    }
    public function getStringsColor(){
        return $this->strings_color;
    }
    public function getStringsThickness(){
        return $this->strings_thickness;
    }
    public function getStringsType(){
        return $this->strings_type;
    }



}