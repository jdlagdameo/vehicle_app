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

    private $dbConnection;

    public function __construct(){
        $this->dbConnection = new DBConnection();
    }
    /**
     * List all vehicles
     * 
     * @return array
     */
    public function list_vehicle(){

        $sql = "SELECT * FROM `$this->table_name`";
        $result = $this->dbConnection->getConnection()->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
    
        return $data;
  
    }

    /**
     * Create New vehicle
     * 
     * @params array $data
     * 
     * @return array
     */
    public function insert_vehicle($data){
    
        $sql = "INSERT INTO vehicles(
                    name, price, location, engine_power, 
                    engine_displacement_cubic_inches, 
                    engine_displacement_cubic_centimeters, 
                    engine_displacement_liters
                ) 
                VALUES ( 
                    :name, :price, :location, :engine_power, 
                    :engine_displacement_cubic_inches, 
                    :engine_displacement_cubic_centimeters, 
                    :engine_displacement_liters
        )";
        
        $oDBConnection = new DBConnection();
        $result = $oDBConnection->getConnection()->prepare($sql);
        $execute = $result->execute($data);
                
        if($result){
            $id = $oDBConnection->getConnection()->lastInsertId();
            $data['id'] = $id;
        }

        return compact("result", "data");

    }

}