<?php

class lifeform
{
    private $name;
    private $prename;
    private $age;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrename()
    {
        return $this->prename;
    }

    /**
     * @param mixed $prename
     */
    public function setPrename($prename): void
    {
        $this->prename = $prename;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }


}