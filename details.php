<?php
    session_start();
    if(isset($_SESSION['user'])){
    include('includes/db.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    $username = $_SESSION['user'];
    $q = "SELECT * FROM USERS WHERE email='$username'";
    $sq = mysqli_query($conn, $q);
    $data = mysqli_fetch_array($sq);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLUOKUN TO DO :: UPDATE (<?php echo $data['name'];?>)</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="content" class="p-4 p-md-5 pt-5">
        <!-- Number Base conversion -->
        <div class="container " id="container" style="margin-top: 20px;">
      <h2>  (<?php echo $data['name'];?>)</h2>
            <p class="error"></p>
 

                        <?php
                        $id = $_GET['id'];
                        $_SESSION['id'] = $id;
                        $q = "SELECT * FROM tasks WHERE id='$id' ";
                        $sq = mysqli_query($conn, $q);
                        $mydata = mysqli_fetch_array($sq);
                        ?>   
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                              <h1>Title :<?php echo $mydata['title']?> </h1>
                              <table class="table table-bordered">
                                <tr><td>Priority</td><td><?php echo $mydata['priority']?></td></tr>
                                <tr><td>Task</td><td><?php echo $mydata['task']?></td></tr>
                                <tr><td>Date</td><td><?php echo $mydata['date']?></td></tr>
                                <tr><td>Last Update</td><td><?php echo $mydata['Last_update']?></td></tr>
                                <tr><td>ID</td><td><?php echo $mydata['id']?></td></tr>                              
                              </table>
                            </div>
                          </div>
                         
        </div>
               
    </div>
    




<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="js/validate.js"></script>
<script src="js/side.js"></script>

</body>
</html>

<?php
    include('includes/footer.php');
?>
    <?php
}else{
    header("location:index.php");
}
?>