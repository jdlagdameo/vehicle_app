<?php 
/**
 * Author: John dave Lagdameo
 */
require('src/bootstrap/app.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use Src\Controller\VehicleController;

$route = $_REQUEST['route'];

if($route == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST'){

    $oVehicleController = new VehicleController();
    $vehicle = $oVehicleController->add_vechicle($_POST);
    echo json_encode($vehicle);

}else if($route == 'list' && $_SERVER['REQUEST_METHOD'] == 'GET'){

    $oVehicleController = new VehicleController();
    $vehicle = $oVehicleController->list();
    echo json_encode($vehicle);

}else{

    echo json_encode([
        "success"  => "false",
        "mesage" => 'No action to perform.'
    ]);
    
}


