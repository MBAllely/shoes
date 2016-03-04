<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Store.php';
    require_once __DIR__ . '/../src/Brand.php';

    $server = 'mysql:host=localhost;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);

            //Act
            $test_store->save();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store], $result);
        }

        function test_getAll()
        {
            //Arrange
            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            $store_name2 = "STOMPERS";
            $phone2 = "907-999-5555";
            $test_store2 = new Store($store_name2, $phone2);
            $test_store2->save();

            //Act
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_update()
        {
            //Arrange
            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            $new_store_name = "Orso";
            $new_phone = "907-888-2222";

            //Act
            $test_store->update($new_store_name, $new_phone);
            $result1 = $test_store->getStoreName();
            $result2 = $test_store->getPhone();

            //Assert
            $this->assertEquals($new_store_name, $result1);
            $this->assertEquals($new_phone, $result2);
        }

        function test_find()
        {
            //Arrange
            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            $store_name2 = "STOMPERS";
            $phone2 = "907-999-5555";
            $test_store2 = new Store($store_name2, $phone2);
            $test_store2->save();

            //Act
            $result = Store::find($test_store2->getId());

            //Assert
            $this->assertEquals($test_store2, $result);
        }

        function test_deleteOneStore()
        {
            //Arrange
            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            $store_name2 = "STOMPERS";
            $phone2 = "907-999-5555";
            $test_store2 = new Store($store_name2, $phone2);
            $test_store2->save();

            //Act
            $test_store->deleteOneStore();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$test_store2], $result);
        }

        function test_addBrand()
        {
            $brand_name = "XtraTufs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            //Act
            $test_store->addBrand($test_brand);

            //Assert
            $this->assertEquals([$test_brand], $test_store->getBrands());
        }

        function test_getBrands()
        {
            $brand_name = "XtraTufs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "Chacos";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            $store_name = "Shuzy Q";
            $phone = "907-777-44444";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            //Act
            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $test_store->getBrands());
        }
    }
 ?>
