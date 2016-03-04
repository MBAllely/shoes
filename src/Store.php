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

    static function find($search_id)
    {
        $stores = Store::getAll();
        $found_store = null;

        foreach ($stores as $store)
        {
            if (($store->getId()) == $search_id)
            {
                $found_store = $store;
            }
        }
        return $store;
    }

    function addBrand($brand)
    {
        $GLOBALS['DB']->exec("INSERT INTO store_brand (store_id, brand_id) VALUES ({$this->getId()}, {$brand->getId()});");
    }

    function getBrands()
    {
        $returned_brands = $GLOBALS['DB']->query("SELECT brands.* from stores
            JOIN store_brand ON (stores.id = store_brand.store_id)
            JOIN brands ON (store_brand.brand_id = brands.id)
            WHERE stores.id = {$this->getId()};");
        $brands = [];

        foreach ($returned_brands as $brand)
        {
            $brand_name = $brand['brand_name'];
            $id = $brand['id'];
            $new_brand = new Brand($brand_name, $id);
            array_push($brands, $new_brand);
        }
        return $brands;
    }

    // function getCourses()
    // {
    //     $returned_courses = $GLOBALS['DB']->query("SELECT courses.* FROM students
    //         JOIN enrollment ON (students.id = enrollment.student_id)
    //         JOIN courses ON (enrollment.course_id = courses.id)
    //         WHERE students.id = {$this->getId()};");
    //     $courses = [];
    //     foreach($returned_courses as $course) {
    //         $course_name = $course['course_name'];
    //         $course_num = $course['course_num'];
    //         $id = $course['id'];
    //         $new_course = new Course($course_name, $course_num, $id);
    //         array_push($courses, $new_course);
    //     }
    //     return $courses;
    // }

    function deleteOneStore()
    {
        $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
        $GLOBALS['DB']->exec("DELETE FROM store_brand WHERE id = {$this->getId()};");
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stores;");
    }

}
 ?>
