<?php

class Store
{
    private $store_name;
    private $phone;
    private $id;

    function __construct($store_name, $phone, $id = null)
    {
        $this->store_name = $store_name;
        $this->phone = $phone;
        $this->id = $id;
    }

    function getStoreName()
    {
        return $this->store_name;
    }

    function setStoreName($new_store_name)
    {
        $this->store_name = $new_store_name;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function setPhone($new_phone)
    {
        $this->phone = $new_phone;
    }

    function getId()
    {
        return $this->id;
    }

}
 ?>
