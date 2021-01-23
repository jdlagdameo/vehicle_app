<?php
namespace Src\controller;

use Src\model\VehicleModel;
use Src\Controller\Controller;

class VehicleController extends Controller{

     /**
     * Create New Vehicle
     * 
     */
    public function list(){
        $oVehicleModel = new VehicleModel();
        $data = $oVehicleModel->list_vehicle();

        return $data;
        
    }

    /**
     * Create New Vehicle
     * 
     */
    public function add_vechicle($request){
        
        $validation = $this->validation($request);

        if(!$validation['success']){
            return $validation;
        }

        $name = $this->sanitize($request['name']);
        $engine_displacement = $this->sanitize($request['engine_displacement']);
        $price = $this->sanitize($request['price']);
        $location = $this->sanitize($request['location']);
        
        $oVehicleModel = new VehicleModel();
        $add_vehicle = $oVehicleModel->insert_vehicle($name, $engine_displacement, $price, $location);
        
        $success = $add_vehicle['result'] ? true : false;
        $message = $success ? "Vehicle succssfully registed" : "Errorr occured while trying to register vehicle. Please try again";
        $data = $success ? $add_vehicle['data'] : [];
        return compact("success", "message", "data");

    }

    /**
     * Form Validators 
     * 
     */
    public function validation($request){
        $message = '';
        $validation_errors = [];

        // Name
        if(!isset($request['name'])){
            $validation_errors['name'] = 'Name is required.';
        }

        // Engine Displacement
        if(!isset($request['engine_displacement'])){
            $validation_errors['engine_displacement'] = 'Engine Displacement is required.';
        }
        
        // Price
        if(!isset($request['price'])){
            $validation_errors['price'] = 'Price is required.';
        }
        
        // Location
        if(!isset($request['location'])){
            $validation_errors['location'] = 'Location is required.';
        }

        $success = count($validation_errors) == 0;
        return compact("success", "message", "validation_errors");


    }

}