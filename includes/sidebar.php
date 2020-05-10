<?php
  include('db.php');
  $username = $_SESSION['user'];
    $q = "SELECT * FROM USERS WHERE email='$username'";
    $sq = mysqli_query($conn, $q);
    $data = mysqli_fetch_array($sq);
?>
<div class="wrapper d-flex align-items-stretch"st>
    <nav id="sidebar"style="margin-top:40px">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary" value="Menu">
           <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <button class="navbar-toggler" type="button" data-toggl="collapse" data-targe="#collapsibleNavbar" id="">
          <span class="navbar-toggler-icon text-dark">menu</span>
        </button> -->
      </div>
      <link rel="stylesheet" href="../images/bg.jpg">
      <div class="sidebarimage bg-wrap text-center py-4" style="background-image: url('./images/bg.jpg');">
        <div class="user-logo">
          <div class="sidebarimage" style="background-image: url('./images/profile.jpg');"></div>
          <h3><?php echo $data['name']?></h3>
        </div>
      </div>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="./dashboard.php"><span class="fa fa-home mr-3"></span> Dashboard</a>
        </li>
        
        <li>
          <a href="#createToDo"data-toggle="modal" ><span class="fa fa-gift mr-3"></span>Create To Do</a>
        </li>
        <li>
          <a href="manage_todo.php"><span class="fa fa-trophy mr-3"></span>Managed To Do list</a>
        </li>
       
        
        <li>
          <a href="./logout.php" onclick="confirm('Are you sure you want logout?')"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
        </li>
        <li>
          <a href="#"><span class="fa fa-sign-out mr-3"></span> Feedback</a>
        </li>
      </ul>

    </nav>
