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
    
}

public function get_tasks(){
    
    $query= "SELECT * FROM tasks";

    $results= $this-> executeQuery($query)-> fetchAll(\PDO::FETCH_ASSOC);
    
    return $results;
}

public function delete_task($id) {

    $query = "DELETE FROM tasks WHERE id = '$id'";
    $statement= $this-> executeQuery($query);
    
}

public function get_one_task($id){
    
    $query= "SELECT * FROM tasks WHERE id = '$id'";

    $results= $this-> executeQuery($query)-> fetch(\PDO::FETCH_ASSOC);
    
    return $results;
}

public function edit_task($data, $id) {
    $query= "UPDATE tasks SET name=?, description=? WHERE id=?";
    $statement= $this-> executeQuery($query, [$data["name"],
                                        $data["description"],
                                        $id
                                ]);
}

}

?>