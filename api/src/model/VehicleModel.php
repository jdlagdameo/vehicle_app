<?php 
/**
 * Vehicle Model 
 * 
 * @author: John Dave D. Lagdameo <jdlagdameo@gmail.com>
 * @since: 2021/01/23
 * @internal revisions: 
 * 
 * 
 */
namespace Src\model;

use Src\Database\DBConnection;
use PDO;

class VehicleModel {

    protected $table_name = 'vehicles';
    
    /**
     * List all vehicles
     * 
     * @return array
     */
    public function list_vehicle(){

        $oDBConnection = new DBConnection();
        $sql = "SELECT * FROM `$this->table_name`";
        $result = $oDBConnection->getConnection()->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
  
    }

    /**
     * Create New vehicle
     * 
     * @params string $name 
     * @params string $engine_displacement
     * @params string $price
     * @params string $location 
     * 
     * @return 
     */
    public function insert_vehicle($name, $engine_displacement, $price, $location){
        
        $data = compact("name", "engine_displacement", "price", "location");

        $sql = "INSERT INTO vehicles(name, engine_displacement, price, location) 
                VALUES (:name, :engine_displacement, :price, :location)";
        
        $oDBConnection = new DBConnection();
        $result = $oDBConnection->getConnection()->prepare($sql);
        $execute = $result->execute($data);
        
        $data = [];
        
        if($result){
            $id = $oDBConnection->getConnection()->lastInsertId();
            $data = compact("id","name", "engine_displacement","price", "location");
        }

        return compact("result", "data");
    }

}