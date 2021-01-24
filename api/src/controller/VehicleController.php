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

        // sanitize post request
        $name = $this->sanitize($request['name']);
        $engine_displacement = $this->sanitize($request['engine_displacement']);
        $price = $this->sanitize($request['price']);
        $location = $this->sanitize($request['location']);
        $unit_measure = $this->sanitize($request['unit_measure']);
        $engine_power = $this->sanitize($request['engine_power']);
        
        // retrieve engine displacement conversion
        $convertion_arr = $this->convert_engine_displacement($unit_measure, $engine_displacement);
        $engine_displacement_cubic_inches = $convertion_arr['cubic_in'];
        $engine_displacement_cubic_centimeters = $convertion_arr['cubic_cm'];
        $engine_displacement_liters = $convertion_arr['liter'];
    
        // insert record
        $data = compact(
            "name", "price", "location", 
            "engine_power","engine_displacement_cubic_inches", 
            "engine_displacement_cubic_centimeters",
            "engine_displacement_liters");
        
        $oVehicleModel = new VehicleModel();
        $add_vehicle = $oVehicleModel->insert_vehicle($data);
        
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
        if(!isset($request['name']) || $request['name'] == ''){
            $validation_errors['name'] = 'Name is required.';
        }else if(strlen(trim($request['name'])) > 120){
            $validation_errors['name'] = 'Name must be less than or equal to 120 chars.';
        }


        // Engine Displacement
        if(!isset($request['engine_displacement']) || $request['engine_displacement'] == ''){
            $validation_errors['engine_displacement'] = 'Engine Displacement is required.';
        }else if(strlen(trim($request['engine_displacement'])) > 10){
            $validation_errors['engine_displacement'] = 'Engine Displacement must be less thant or equal to 10 chars.';
        }
        
        // Price
        if(!isset($request['price']) || $request['price'] == ''){
            $validation_errors['price'] = 'Price is required.';
        }else if(strlen(trim($request['price'])) > 10){
            $validation_errors['price'] = 'Price must be less than or equal to 10 chars.';
        }else if(!is_numeric($request['price'])){
            $validation_errors['price'] = 'Price format is invalid.';
        }
        
        // Location
        if(!isset($request['location']) || $request['location'] == ''){
            $validation_errors['location'] = 'Location is required.';
        }else if(strlen(trim($request['location'])) > 100){
            $validation_errors['location'] = 'Location must be less than or equal to 100 chars.';
        }
     
        // Unit Measre
        if(!isset($request['unit_measure']) || $request['unit_measure'] == ''){
            $validation_errors['unit_measure'] = 'Unit Measure is required.';
        }

        // Location
        if(!isset($request['engine_power']) || $request['engine_power'] == ''){
            $validation_errors['engine_power'] = 'Engine Power is required.';
        }
        // else if(strlen(trim($request['location'])) > 100){
        //     $validation_errors['engine_power'] = 'Location must be less than or equal to 100 chars.';
        // }
     

        $success = count($validation_errors) == 0;
        
        return compact("success", "message", "validation_errors");


    }

}