<?php
    session_start();
    if(isset($_SESSION['user'])){
    include('includes/db.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    $username = $_SESSION['user'];
    $q = "SELECT * FROM users WHERE email='$username' ";
    $sq = mysqli_query($conn, $q);
    $data = mysqli_fetch_array($sq)
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLUOKUN TO DO :: DASHBOARD (<?php echo $data['name'];?>)</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="content" class="p-4 p-md-5 pt-5">
        <!-- Number Base conversion -->
        <div class="container " id="container" style="margin-top: 20px;">
        (<?php echo $data['name'];?>)
        <div class="container">
  <h2>Manage To Dol List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>S/N</th>
        <th>ID</th>
        <th>Title</th>
        <th>Task</th>
        <th>Priority</th>
        <th>Date and Time</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr>
    </thead>
    
    <tbody>
        <?php
            $q = "SELECT * FROM tasks WHERE user='$username' ";
            $sq = mysqli_query($conn, $q);
            $no =1;
            while($dat = mysqli_fetch_array($sq)){
        ?>
      <tr>
        <td><?php echo $no?></td>
        <td><?php echo $dat['id']?></td>
        <td><?php echo $dat['title']?></td>
        <td><?php echo $dat['task']?></td>
        <td><?php echo $dat['priority']?></td>
        <td><?php echo $dat['date']?></td>
        <td><?php echo $dat['reg_date']?></td>
        <td><a href="details.php?id=<?php echo $dat['id']?>" >View Details</a> | <a href="updat.php?id=<?php echo $dat['id']?>" >Update</a> | <a href="delete.php?id=<?php echo $dat['id']?> ">Delete</a></td>        
    </tr>
    <?php
  $no++;
    }
  ?>
    </tbody>
    
  </table>
  
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