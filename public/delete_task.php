<?php
use App\Controllers\TaskController;
require "../vendor/autoload.php";


$delete_controller = new TaskController; 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}    
$delete_controller-> delete_task($id);
header("Location: todo.php");

?>

