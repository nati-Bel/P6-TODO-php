<?php 
namespace Database\PDO;

use PDOException;

class DatabaseConnection{
    
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($server, $username, $password, $database){

        $this -> server = $server;
        $this -> username = $username;
        $this -> password = $password;
        $this -> database = $database;
   
    }

    public function connect(){
        try{
            $this-> connection = new \PDO("mysql:host=$this->server; dbname=$this->database", $this->username, $this-> password);
            $this -> connection -> setAttribute(\PDO::ATTR_ERRMODE,
                                                \PDO:: ERRMODE_EXCEPTION);
            $this -> connection ->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

            $set_names= $this-> connection ->prepare("SET NAMES 'utf8'");
            $set_names-> execute();
        }catch(PDOException $e){
            echo "Problemas con la conexion" .$e -> getMessage();
        }
    }
    public function get_connection() {
        return $this-> connection;
    }
}

?>