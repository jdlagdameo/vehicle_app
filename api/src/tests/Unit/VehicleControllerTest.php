<?php 

require_once ('PHPUnit/Framework/TestCase.php');

class VehicleControllerTest extends \PHPUnit\Framework\Testcase{

    /**
     * @test
     */
    public function testTrueIsEqualTrue(){
        $this->assertEquals(true, true);
    }

}