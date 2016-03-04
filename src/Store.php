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

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stores (store_name, phone) VALUES ('{$this->getStoreName()}', '{$this->getPhone()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
        $stores = [];

        foreach($returned_stores as $store)
        {
            $store_name = $store['store_name'];
            $phone = $store['phone'];
            $id = $store['id'];
            $new_store = new Store($store_name, $phone, $id);
            array_push($stores, $new_store);
        }
        return $stores;
    }

    function update($new_store_name, $new_phone)
    {
        $GLOBALS['DB']->exec("UPDATE stores SET store_name = '{$new_store_name}' WHERE id = {$this->getId()};");
        $this->setStoreName($new_store_name);
        $GLOBALS['DB']->exec("UPDATE stores SET phone = '{$new_phone}' WHERE id = {$this->getId()};");
        $this->setPhone($new_phone);
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stores;");
    }

}
 ?>
