<?php
/**
 * Database Connection Class 
 * 
 * @author: John Dave Lagdameo 
 * @since: 01/22/2020
 * 
 */
namespace Src\Database;
use PDO;

class DBConnection {

    public $conn; 

    public function __construct(){
        $servername = $_ENV['DB_HOST'];
        $username   = $_ENV['DB_USERNAME'];
        $password   = $_ENV['DB_PASSWORD'];
        $dbname     = $_ENV['DB_DATABASE'];
        // $dbname = "vehicle_app";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn = $conn;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }

}