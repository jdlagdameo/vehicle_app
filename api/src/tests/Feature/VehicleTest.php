<?php 

use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase{

    /**
     * @test
     */
    public function testTrueIsEqualTrue(){
        $this->assertEquals(true, true);
    }

}