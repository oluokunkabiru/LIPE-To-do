<?php
    $server ="localhost";
    $user = "root";
    $password ="";
    $db ="todo";
    $conn = mysqli_connect($server, $user, $password,$db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
   $myuser = "CREATE TABLE IF NOT EXISTS USERS (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        Phone_Number VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP
   )";
   if (mysqli_query($conn, $myuser)) {
    echo "";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$myuser = "CREATE TABLE IF NOT EXISTS tasks (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    priority VARCHAR(30) NOT NULL,
    task VARCHAR(50) NOT NULL,
    date VARCHAR(50) NOT NULL,
    user VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
)";
if (mysqli_query($conn, $myuser)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

    

?>