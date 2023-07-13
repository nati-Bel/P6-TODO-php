<html>
<?php
use App\Controllers\TaskController;
require "../vendor/autoload.php";
?>
<head>
    <title>TODO_list</title>
</head>
<body>
    <fieldset>
        <h3>What do you have to do?</h3>
        <br>
        <form action="./todo.php" method="post">
            
            Task name: <input type="text" name="name" id="task_name" required>
            <br><br>
            Describe your task: <input type="text" name="description" id="task_description">
            <br><br>
            <input type= "submit" name="submit" value="Add task">
            <br>
        </form>
    </fieldset>
    <div>
        <h3>Next on my list : </h3>
  
        <?php
            $task_controller = new TaskController;     
            $task_list = $task_controller-> get_tasks();
            
            echo "<table>";
            echo "<tr><th>Task</th><th>Description</th><th>Start Date</th><th>Deadline</th>";
            foreach ($task_list as $row) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "<td>" . $row["expiry_date"] . "</td>";
            echo "<td>" . $row["completed"] . "</td>";
            echo '<td><button onclick="handleButtonClick(' . $row["id"] . ')">Edit</button></td>';
            
            

            echo "</tr>";
            }
            echo "</table>";
        
        ?> 
        

    </div>

<html>

<?php

// print_r($_POST);
// print_r($_SERVER);
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
  $new_task = new TaskController;     
  $new_task-> create([
                "name"=>$_POST["name"],
                "description"=>$_POST["description"]
                ]);
}

?>
