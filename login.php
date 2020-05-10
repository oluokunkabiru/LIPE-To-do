<?php
session_start();
function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  //window.location.assign
// connect to database
  include('includes/db.php');

  
//   $existEmail = $internalData['email'];
//   $existPassword = $internalData['password'];

$error =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(empty($_POST['email'])){
            array_push($error, "Please Enter your Email");
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($error, "Invalid email format");
        }
       
        if(empty($_POST['password'])){
            array_push($error, "Please choose Password required ");
        }
        
        
        // if($_POST['password'] != $_POST['repassword']){
        //     array_push($error, "Incorrect Password Or email or phone number");
        // }
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $phone = testinput($_POST['email']);
             $password = testinput($_POST['password']);
             $mydata = "SELECT *FROM USERS WHERE email ='$phone' AND password ='$password' ";
             $query = mysqli_query($conn, $mydata);
             $dat = mysqli_fetch_array($query);
             if($dat['password']==$password){
                 $_SESSION['user'] = $phone;
                echo "login successfully";
                 
             }else{
                 echo "Invalid username or password";
             }

         }
    }
?>