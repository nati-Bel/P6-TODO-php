<?php
use App\Controllers\TaskController;
require "../vendor/autoload.php";
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link <link rel="stylesheet" href="styles.css">
  
  <title>TODO_list</title>
  <style>
    * {font-family:'Courier New', Courier, monospace;}
    table {width:100%;}
    .form_container {width: 60%; padding:20px;}
    fieldset {width:50%;}
    .h3 {padding:20px;}
  </style>
</head>
<body>
    <div class = 'form_container'>
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
            <h3 class="h3">Next on my list : </h3>
    
            <?php
                $task_controller = new TaskController;     
                $task_list = $task_controller-> get_tasks();
                
                echo "<table>";
                echo "<th>Task Name</th>";
                echo "<th>Task Description</th>";
                foreach ($task_list as $row) {
                echo "<tr>";
                echo "<td style='padding: 20px;'>" . $row["name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td><a href='delete_task.php?id=" .$row["id"] . "' method='GET'><button>Delete</button></td>";
                echo "<td><a href='edit_task.php?id=" .$row["id"] . "' method='GET'><button>Edit</button></td>";
                
                echo "</tr>";
                }
                echo "</table>";
            
            ?> 
            
        </div>
    </div>
</html>



