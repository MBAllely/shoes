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
            // Brand::deleteAll();
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



    }

?>