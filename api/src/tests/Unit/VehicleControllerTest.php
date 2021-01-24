<?php 

use PHPUnit\Framework\TestCase;

class VehicleControllerTest extends TestCase{

    /** 
     * 
     * @test
     */
    public function sucess_list_vehicles(){
        // $this->assertEquals(true, true);
        $stub = $this->getMockBuilder('Src\controller\VehicleController')
        // ->setConstructorArgs(array($param))
        ->setMethodsExcept(['list'])
        ->getMock();
 
        
        $response = $stub->list();
    }

    /** 
     * 
     * test
     */
    public function sucesss_list_vehicles(){
        // $this->assertEquals(true, true);
        $stub = $this->getMockBuilder('Src\controller\VehicleController')
        // ->setConstructorArgs(array($param))
        ->setMethodsExcept(['add_vechicle'])
        ->getMock();

        $_POST["name"] = 'test';
        $_POST["engine_displacement"] = 'test';
        $_POST["price"] = 'test';
        $_POST["location"] = 'test';
 
        
        $response = $stub->add_vechicle($_POST);
    }

}