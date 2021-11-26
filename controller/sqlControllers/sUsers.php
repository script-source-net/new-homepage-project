<?php


class sUsers
{
    protected $users_lastname;
    protected $users_firstname;
    protected $users_email;
    protected $users_phone;
    protected $users_addresse;
    protected $users_addresse_nr;
    protected $login_username;
    protected $login_password;

    public function getLastname(){
        return $this->users_lastname;
    }

    public function getFirstname() {
        return $this->users_firstname;
    }

    public function getUsrMail() {
        return $this->users_email;
    }

    public function getUsrPhone(){
        return $this->users_phone;
    }

    public function getUsrAddresse(){
        return $this->users_addresse;
    }

    public function getUsrAddresseNr(){
        return $this->users_addresse_nr;
    }

    public function getUsrLogin(){
        return $this->login_username;
    }

    public function getUsrPw(){
        return $this->login_password;
    }
}