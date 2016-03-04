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

    }

?>
