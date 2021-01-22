<?php 
namespace Src\model;

use Src\Database\DBConnection;

class VehicleModel {

    public function list_vehicle(){
        $oDBConnection = new DBConnection();
        var_dump($oDBConnection->getConnection(), "Ad");
  
    }
    public function insert_vehicle(){
        echo "asd";
    }

}