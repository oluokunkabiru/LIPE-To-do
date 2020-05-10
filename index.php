<?php
    include('includes/header.php');
?>
<?php
    include('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLUOKUN KABIRU TO DO LIST</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--my Welcome container-  -->
    <div class="container-fluid myIndex">
        <h3>Welcome </h3>
        <h1>OLUOKUN KABIRU </h1>
        <H4>Todo List</H4>
    </div>

    <!-- Sign Up Section -->
    <section>

        <div class="modal" id="signUp">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title text-center">Sign Up</h1>
                  </div>
          
                <!-- Modal body -->
                <div class="modal-body">
            <div class="container-fluid">
            <p class="error"></p>
            <div class="row">
              <div class="col-md-6 offset-md-3 offset-sm-1">
                <form action='' method="post" id="registerForm">
                    <div class="form-group  mb-2 mr-sm-2">
                        <label for="name">Your Fullname</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Fullname Here">
                    </div>
                    <div class="form-group  mb-2 mr-sm-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email here">
                    </div>
                    <div class="form-group  mb-2 mr-sm-2">
                        <label for="phone">Phone Number</label>
                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number here">
                    </div>
                    <div class="form-group  mb-2 mr-sm-2">
                        <label for="password">Choose Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your password here">
                    </div>
                    <div class="form-group  mb-2 mr-sm-2">
                        <label for="repassword">Confirm Password</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter Your Confirm password here">
                    </div>
                    <button type="submit" name="signup" id="signup" class="btn btn-primary float-right">Register</button>
                    <p>Already have Account <a href="#logIn" data-toggle="modal">Login</a></p>
      
                </form>
              </div>
            </div>
          </div>
        
                </div>
          
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
          
              </div>
            </div>
          </div>

          <!-- end of register form -->
    </section>
<!-- section login -->
<section>

    <div class="modal" id="logIn">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h1 class="modal-title text-center">Login</h1>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
        <div class="container-fluid">
        <p class="erro"></p>
        <div class="row">
          <div class="col-md-6 offset-md-3 offset-sm-1">
            <form action="" method="post" id="loginForm">
                
                <div class="form-group  mb-2 mr-sm-2">
                    <label for="email">Email or Phone Number</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email here">
                </div>
                <div class="form-group  mb-2 mr-sm-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your password here">
                </div>
                <button type="submit" name="submit" id="login" class="btn btn-primary float-right">Login</button>
                <p>Don't have Account <a href="#signUp" data-toggle="modal">Sign Up</a></p>
            </form>
          </div>
        </div>
      </div>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>


    
</section>


 <?php
    include('includes/footer.php');
?>
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="js/validate.js"></script>


<!-- Server side validation -->

<script>
    $('#signup').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'register.php',
        data: $('#registerForm').serialize(),
        success: function (data) {
        var result=data;
        $(".error").html(result);
        if(result=="success"){
        window.alert('register successfully');
        }
        }
    });

    })
</script>

<!-- login script -->
<script>
  $('#login').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'login.php',
      data: $('#loginForm').serialize(),
      success: function (data) {
      var result=data;
      $(".erro").html(result);
      if(result=="login successfully"){
        window.location.assign("dashboard.php");      }
      }
  });

  })
</script>
</body>
</html>