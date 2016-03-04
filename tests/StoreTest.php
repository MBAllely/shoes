<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Store.php';

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClassTest extends PHPUnit_Framework_TestCase
    {
        function test_getInfo()
        {
            // Arrange
            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $id = 1;
            $test_store = new Store($store_name, $phone, $id);

            // Act
            $result1 = $test_store->getStoreName();
            $result2 = $test_store->getPhone();
            $result3 = $test_store->getId();

            // Assert
            $this->assertEquals($store_name, $result1);
            $this->assertEquals($phone, $result2);
            $this->assertEquals($id, $result3);
        }
        // 
        // function test_save()
        // {
        //     //Arrange
        //     $store_name = "Shuzy Q";
        //     $phone = "907-777-44444";
        //     $test_store = new Store($store_name, $phone);
        //
        //     //Act
        //     $test_store->save();
        //     $result = Store::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_store], $result);
        // }
        //
        // function test_getAll()
        // {
        //     //Arrange
        //     $store_name = "Shuzy Q";
        //     $phone = "907-777-44444";
        //     $test_store = new Store($store_name, $phone);
        //     $test_store->save();
        //
        //     $store_name2 = "STOMPERS";
        //     $phone2 = "907-999-5555";
        //     $test_store2 = new Store($store_name2, $phone2);
        //     $test_store2->save();
        //
        //     //Act
        //     $result = Store::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_store, $test_store2], $result);
        // }
        //
        // function test_update()
        // {
        //     //Arrange
        //     $store_name = "Shuzy Q";
        //     $phone = "907-777-44444";
        //     $test_store = new Store($store_name, $phone);
        //     $test_store->save();
        //
        //     $new_store_name = "Orso";
        //
        //     //Act
        //     $test_store->update($new_store_name);
        //     $result = $test_store->getStoreName();
        //
        //     //Assert
        //     $this->assertEquals($new_store_name, $result);
        // }
    }
 ?>
