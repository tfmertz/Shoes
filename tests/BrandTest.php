<?php

    /**
        @backupGlobals disabled
        @backupStaticAttributes disabled
    */

    require_once 'src/Brand.php';
    require 'setup.config';

    # If connection is being refused and you are using Postgres.app without a specific
    # try removing the $DB_USER, $DB_PASS arguments.
    $DB = new PDO("pgsql:host=localhost;dbname=shoe_test;", $DB_USER, $DB_PASS);


    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
        }

        function test_findByName()
        {
            //arrange
            $test_brand = new Brand("Good Runs Shoeing Wares");
            $test_brand->save();
            //act
            $result = Brand::findByName("Good");

            //assert
            $this->assertEquals([$test_brand], $result);
        }

        function test_findById()
        {
            //arrange
            $test_brand = new Brand("Sketchers");
            $test_brand->save();
            //act
            $result = Brand::findById($test_brand->getId());

            //assert
            $this->assertEquals($test_brand, $result);
        }

        function test_deleteAll()
        {
            //arrange
            $test_brand = new Brand("Reebok");
            $test_brand2 = new Brand("Nike");

            //act
            $test_brand->save();
            $test_brand2->save();
            Brand::deleteAll();
            $result = Brand::getAll();

            //assert
            $this->assertEquals([], $result);
        }

        function test_save()
        {
            //arrange
            $test_brand = new Brand("Reebok");

            //act
            $test_brand->save();
            $result = Brand::getAll();

            //assert
            $this->assertEquals([$test_brand], $result);
        }

        //NON DATABASE TESTS
        function test_getName()
        {
            //arrange
            $test_brand = new Brand("Nike");

            //act
            $result = $test_brand->getName();

            //assert
            $this->assertEquals("Nike", $result);
        }

        function test_setName()
        {
            //arrange
            $test_brand = new Brand("Nke");

            //act
            $test_brand->setName("Nike");
            $result = $test_brand->getName();

            //assert
            $this->assertEquals("Nike", $result);
        }

        function test_getId()
        {
            //arrange
            $test_brand = new Brand("Nike", 1);

            //act
            $result = $test_brand->getId();

            //assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            //arrange
            $test_brand = new Brand("Nike", 1);

            //act
            $test_brand->setId(15);
            $result = $test_brand->getId();

            //assert
            $this->assertEquals(15, $result);
        }
    }



 ?>
