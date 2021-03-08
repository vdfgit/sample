<?php
namespace sample;

class Entry {
    public $firstName = null;
    public $lastName = null;
    public $fullName = null;
    public $chartId = null;
    public $mobile = null;
    public $address = [];

    public function __construct() {
        
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName(string $name)
    {
        $this->firstName = trim($name);
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName(string $name)
    {
        $this->lastName = trim($name);
        return $this;
    }

    public function setFullName() 
    {
        $this->fullName = $this->getFirstName() . ' ' . $this->getLastName();
        return $this;
    }

    public function getChartId()
    {
        return $this->chartId;
    }

    public function setChartId(string $bioguideId)
    {
        $this->chartId = ":Contents of $bioguideId:";
        return $this;
    }
    
    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile(string $phone)
    {
        $this->mobile = trim($phone);
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(array $address)
    {
        $this->address[] = $address;
        return $this;
    }

    public function toJSON()
    {
        $this->setFullName();
        return json_encode($this);
    }
}
