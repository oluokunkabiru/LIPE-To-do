<?php
//session_start();

?>

<nav class="navbar navbar-expand-sm  navbarcolor">
    <!-- Brand -->
    <a class="navbar-brand" href="../index.php">Oluokun</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-ico">Menu</span>
      </button>
    
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
  
    <!-- Links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
        </li>
        <?php
          if(!isset($_SESSION['user'])){

        ?>
        <li class="nav-item">
            <a class="nav-link" href="#logIn"  data-toggle="modal"> <?php echo "Login" ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#signUp"  data-toggle="modal"><?php echo "Sign Up" ?></a>
        </li>
          <?php } 
          
          else{ 
            include('db.php');
            $user = $_SESSION['user'];
            $q = "SELECT *FROM USERS WHERE email = '$user' ";
            $s = mysqli_query($conn, $q);
            $data = mysqli_fetch_array($s);
            ?>
            
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Welcome :<?php echo $data['name'];?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#"><?php echo "Profile" ;?></a>
          <a class="dropdown-item" href="#"><?php echo "Update" ;?></a>
          <a class="dropdown-item" href="logout.php"  onclick="confirm('Are you sure you want logout?')"><?php echo "Logout" ;?></a>
        </div>
      </li>
          <?php
        
        };?>
      
    </ul>
      </div>
  </nav> 



