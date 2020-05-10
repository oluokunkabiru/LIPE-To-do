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
        (<?php echo $data['name'];?>)
            <p class="error"></p>
 

                    <form action="" id="UpdatetodoForm">
                        <?php
                        $id = $_GET['id'];
                        $_SESSION['id'] = $id;
                        $q = "SELECT * FROM tasks WHERE id='$id' ";
                        $sq = mysqli_query($conn, $q);
                        $mydata = mysqli_fetch_array($sq);
                        ?>
                        
                        <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="<?php echo $mydata['title']?>" >
                        </div>
            
                        <div class="form-group">
                          <label for="Priority">Priority:</label>
                          <select class="form-control" id="priority" name="priority">
                              <option value="<?php echo $mydata['priority']?>"><?php echo $mydata['priority']?></option>
                            <option value="Very Important">Very Important</option>
                            <option value="Important">Important</option>
                            <option value="Not Much Important">Not Much Important</option>
                          </select>
                        </div> 
                        <div class="form-group">
                          <label for="task">Task:</label>
                          <textarea class="form-control" rows="5" id="task" name="task"><?php echo $mydata['task'];?></textarea>
                        </div> 
                        <div class="form-group">
                          <label for="date">Date</label>
                          <input type="datetime-local" class="form-control" id="date" name="date" value="<?php echo $mydata['date']?>" >
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
                      </form> 
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

<script>
    $('#update').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'update.php',
        data: $('#UpdatetodoForm').serialize(),
        success: function (data) {
        var result=data;
        $(".error").html(result);
        if(result=="Your To do successfully Updated"){
        window.alert('Your To do successfully');
        }
        }
    });

    })
</script>
    <?php
}else{
    header("location:index.php");
}
?>