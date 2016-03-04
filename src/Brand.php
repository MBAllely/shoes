<?php

class Brand
{
    private $brand_name;
    private $id;

    function __construct($brand_name, $id = null)
    {
        $this->brand_name = $brand_name;
        $this->id = $id;
    }

    function getBrandName()
    {
        return $this->brand_name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO brands (brand_name) VALUES ('{$this->getBrandName()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
        $brands = [];

        foreach($returned_brands as $brand)
        {
            $brand_name = $brand['brand_name'];
            $id = $brand['id'];
            $new_brand = new Brand($brand_name, $id);
            array_push($brands, $new_brand);
        }
        return $brands;
    }

    function addStore($store)
    {
        $GLOBALS['DB']->exec("INSERT INTO store_brand (store_id, brand_id) VALUES ({$store->getId()}, {$this->getId()});");
    }

    function getStores()
    {
        $returned_stores = $GLOBALS['DB']->query("SELECT stores.* from brands
            JOIN store_brand ON (brands.id = store_brand.brand_id)
            JOIN stores ON (store_brand.store_id = stores.id)
            WHERE brands.id = {$this->getId()};");
        $stores = [];

        foreach ($returned_stores as $store)
        {
            $store_name = $store['store_name'];
            $phone = $store['phone'];
            $id = $store['id'];
            $new_store = new Store($store_name, $phone, $id);
            array_push($stores, $new_store);
        }
        return $stores;
    }

    static function find($search_id)
    {
        $brands = Brand::getAll();
        $found_brand = null;

        foreach($brands as $brand)
        {
            if (($brand->getId()) == $search_id)
            {
                $found_brand = $brand;
            }
        }
        return $found_brand;
    }

    function deleteOneBrand()
    {
        $GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()}");
        $GLOBALS['DB']->exec("DELETE FROM store_brand WHERE id = {$this->getId()}");
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM brands;");
    }
}

?>
