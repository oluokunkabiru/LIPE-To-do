<?php
session_start();
function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  include('includes/db.php');
  $mydata = "SELECT* FROM USERS";
  $query = mysqli_query($conn, $mydata);
  $internalData = mysqli_fetch_array($query);
  $existEmail = $internalData['email'];
  $existPhone = $internalData['Phone_Number'];

$error =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['title'])){
            array_push($error,'Please enter title for this to do');
        }
        
        if(empty($_POST['priority'])){
            array_push($error, "Please Select the priority");
        }
       
        if(empty($_POST['task'])){
            array_push($error, "Please enter your task for this to do");
        }
        if(empty($_POST['date'])){
            array_push($error, "Please enter Date for this to do");
        }
       
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $title = testinput($_POST['title']);
             $priority = testinput($_POST['priority']);
             $task = testinput($_POST['task']);
             $date = testinput($_POST['date']);
             $users = $_SESSION['user'];
             $id = $_SESSION['id'];
             $currentDate = Date('Y-m-d-h-m-s');
             $update = "UPDATE tasks SET title = '$title', priority = '$priority', 
             task = '$task', date ='$date', Last_update = '$currentDate' WHERE id = '$id' ";
             
             $q = mysqli_query($conn, $update);
             if($q){
                 echo "<h5 style='color:green;'>Your To do successfully Updated <h5>";
             }else{
                 echo "Fail to create Your to do".mysqli_error($conn);;
             }

         }
    }
?>

