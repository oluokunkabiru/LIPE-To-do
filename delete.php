<?php
include('includes/db.php');
$id = $_GET['id'];
$stmt = "DELETE FROM TASKS WHERE id = '$id' ";
$query = mysqli_query($conn, $stmt);
if($query){
    echo "Your Task with id = ".$id." have been successfully deleted";
}else{
    echo "Your Task with id = ".$id." failed to deleted";
  
}

?>