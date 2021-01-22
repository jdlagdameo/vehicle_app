<?php
namespace Src\Database;
use PDO;

class DBConnection {

    public $conn; 

    public function __construct(){
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "vehicle_app";

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