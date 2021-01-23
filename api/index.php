<?php 
/**
 * Author: John dave Lagdameo
 */
require('src/bootstrap/app.php');

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


