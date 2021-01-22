<?php
namespace Src\controller;

use Src\model\VehicleModel;

class VehicleController {

     /**
     * Create New Vehicle
     * 
     */
    public function list(){
        $oVehicleModel = new VehicleModel();
        var_dump($oVehicleModel->list_vehicle());
    }

    /**
     * Create New Vehicle
     * 
     */
    public function add_vechicle(){
        die("add");
    }

}