<?php
use App\Controllers\TaskController;
require "../vendor/autoload.php";

$edit_controller = new TaskController;
if(isset($_GET['id'] )){
    $id = $_GET['id'];
    $selected_task = $edit_controller -> get_one_task($id);
}


if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $edit_controller -> edit_task([
                "name"=>$_POST["name"],
                "description"=>$_POST["description"]
                ], $id);
    
    header("Location: todo.php");
    }
    
?>

<html>
    <head>
        <title>Edit task</title>
        <style>
            * {font-family:'Courier New', Courier, monospace;}
            fieldset {width:50%; margin:20px;}
            .h3 {padding:20px;}
         </style>
    </head>
    <body>
        <fieldset>
            <h3>Edit your task</h3>
            <br>
            <form action="<?php echo "edit_task.php?id=". $id?>" method="POST">
                Task name: <input type="text" value=<?php echo $selected_task["name"]?> name="name" id="task_name" required>
                <br><br>
                Describe your task: <input type="text" value=<?php echo $selected_task["description"]; ?> name="description" id="task_description">
                <br><br>
                <input type= "submit" name="submit" value="Edit task">
                <a href="./todo.php">Back to my list</a>
                <br>
            </form>
        </fieldset>
</html>