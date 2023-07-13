<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;

class TaskController{

private function executeQuery($query, $parameters=[]){$server= "127.0.0.1";
    $username= "root";
    $password = "";
    $database= "p6_todo_list";
    $db= new DatabaseConnection($server, $username, $password, $database);

    $db-> connect();
    $statement= $db-> get_connection()-> prepare($query);
    $statement-> execute($parameters);
    
    return $statement;
}

public function create($data){
    
    $query= "INSERT INTO tasks(name, description)
                VALUES (?,?)";

    $statement= $this-> executeQuery($query, [$data["name"],
                                        $data["description"]
                                ]);
    //print_r($results);

    if (empty($statement)){
        echo "Ooops something went wrong :/";
    };
}

public function get_tasks(){
    
    $query= "SELECT * FROM tasks";

    $results= $this-> executeQuery($query)-> fetchAll(\PDO::FETCH_ASSOC);
    if (empty($results)){
        echo "Ooops something went wrong :/";
    };
    return $results;
}

}

?>