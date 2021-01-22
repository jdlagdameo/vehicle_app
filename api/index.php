<?php 
/**
 * Author: John dave Lagdameo
 */
require('src/bootstrap/app.php');

use Src\Controller\VehicleController;

$do = $_GET['do'];

switch($do){

    case 'add': 
            $oVehicleController = new VehicleController();
            $vehicle = $oVehicleController->add_vechicle();
        break;

        case 'list':
            $oVehicleController = new VehicleController();
            $vehicle = $oVehicleController->list();
            break;

        default:
        

        break;
} 

