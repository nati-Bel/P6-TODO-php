<?php
use App\Controllers\TaskController;
require "../vendor/autoload.php";
?>
<html>
<head>
    <title>TODO_list</title>
</head>
<body>
    <fieldset>
        <h3>What do you have to do?</h3>
        <br>
        <form action="./create_task.php" method="post">
            
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
            foreach ($task_list as $row) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td><a href='delete_task.php?id=" .$row["id"] . "' method='GET'><button>Delete</button></td>";
            echo "<td><a href='edit_task.php?id=" .$row["id"] . "' method='GET'><button>Edit</button></td>";
            
            echo "</tr>";
            }
            echo "</table>";
        
        ?> 
        
    </div>
</html>



