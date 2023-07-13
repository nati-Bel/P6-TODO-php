<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;

class TaskController{

public function create($data){
    $server= "127.0.0.1";
    $username= "root";
    $password = "";
    $database= "p6_todo_list";

    $db= new DatabaseConnection($server, $username, $password, $database);

    $db-> connect();

    $query= "INSERT INTO tasks(name, description)
                VALUES (?,?)";

    $results= $db-> executeQuery($query, [$data["name"],
                                        $data["description"]
                                ]);
    //print_r($results);

    if (!empty($results)){
        echo "Task added successfully!";
    }else{
        echo "Ooops something went wrong :/";
    };
}
}


?>