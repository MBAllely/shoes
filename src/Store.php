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

    

}
 ?>