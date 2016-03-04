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

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
        }

        function test_getInfo()
        {
            //Arrange
            $brand_name = "Fluevogs";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);

            //Act
            $result1 = $test_brand->getBrandName();
            $result2 = $test_brand->getId();

            //Assert
            $this->assertEquals($brand_name, $result1);
            $this->assertEquals($id, $result2);
        }

        function test_save()
        {
            //Arrange
            $brand_name = "Fluevogs";
            $id = 1;
            $test_brand = new Brand($brand_name, $id);
            $test_brand->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand], $result);
        }

        function test_getAll()
        {
            //Arrange
            $brand_name = "Fluevogs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "XtraTufs";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_deleteOneBrand()
        {
            //Arrange
            $brand_name = "Fluevogs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "XtraTufs";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            //Act
            $test_brand->deleteOneBrand();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand2], $result);
        }

        function test_find()
        {
            //Arrange
            $brand_name = "Fluevogs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $brand_name2 = "XtraTufs";
            $test_brand2 = new Brand($brand_name2);
            $test_brand2->save();

            //Act
            $result = Brand::find($test_brand2->getId());

            //Assert
            $this->assertEquals($test_brand2, $result);
        }

        function test_addStore()
        {
            //Arrange
            $brand_name = "XtraTufs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $store_name = "STOMPERS";
            $phone = "907-999-5555";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            //Act
            $test_brand->addStore($test_store);

            //Assert
            $this->assertEquals([$test_store], $test_brand->getStores());
        }

        function test_getStores()
        {
            //Arrange
            $brand_name = "XtraTufs";
            $test_brand = new Brand($brand_name);
            $test_brand->save();

            $store_name = "STOMPERS";
            $phone = "907-999-5555";
            $test_store = new Store($store_name, $phone);
            $test_store->save();

            $store_name2 = "Galoshes Galore";
            $phone2 = "907-555-2222";
            $test_store2 = new Store($store_name2, $phone2);
            $test_store2->save();

            //Act
            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            //Assert
            $this->assertEquals([$test_store, $test_store2], $test_brand->getStores());
        }

    }

?>
