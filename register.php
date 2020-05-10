<?php
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
        if(empty($_POST['name'])){
            array_push($error,'Enter your full name');
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['email'])){
            array_push($error, "Please Enter your Email");
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($error, "Invalid email format");
        }
        if($_POST['email'] == $existEmail){
            
            array_push($error, "User with this mail :".$_POST['email']. " Already Exist, Will you like to <a href='#login'>Login</a>");
        }
        if($_POST['phone'] == $existPhone){
            
            array_push($error, "User with this Phone Number :".$_POST['phone']. " Already Exist, Will you like to <a href='#login'>Login</a>");
        }
        if(empty($_POST['phone'])){
            array_push($error, "Please enter Your Phone number");
        }
        if(empty($_POST['password'])){
            array_push($error, "Please choose Password required ");
        }
        if(strlen($_POST['password'])<5){
            array_push($error, "Password must greater than 5 characters");
        }
        if(empty($_POST['repassword'])){
            array_push($error, "Please Confirm your Password required ");
        }
        if($_POST['password'] != $_POST['repassword']){
            array_push($error, "Password miss matched");
        }
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $name = testinput($_POST['name']);
             $email = testinput($_POST['email']);
             $phone = testinput($_POST['phone']);
             $password = testinput($_POST['password']);

             $data = "INSERT INTO USERS (id, name, email,Phone_Number, password) VALUES ('','$name','$email','$phone','$password')";
             $q = mysqli_query($conn, $data);
             if($q){
                 echo "Register Successfull";
             }else{
                 echo "Fail to register";
             }

         }
    }
?>