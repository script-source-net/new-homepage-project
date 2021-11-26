<?php


class sCustomers
{
    protected $customers_lastname;
    protected $customers_firstname;
    protected $customers_phone;
    protected $customers_mail;
    protected $customers_adresse;
    protected $customers_adresse_nr;
    protected $city_plz;
    protected $city_name;

    public function getCustomerLastname(){
        return $this->customers_lastname;
    }
    public function getCustomerFirstname(){
        return $this->customers_firstname;
    }
    public function getCustomerPhone(){
        return $this->customers_phone;
    }
    public function getCustomerMail(){
        return $this->customers_mail;
    }
    public function getCustomerAdresse(){
        return $this->customers_adresse;
    }
    public function getCustomerAdresseNr(){
        return $this->customers_adresse_nr;
    }
    public function getCustomerPostalcode(){
        return $this->city_plz;
    }
    public function getCustomerCity(){
        return $this->city_name;
    }

}