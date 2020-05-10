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
    <title>OLUOKUN TO DO :: DASHBOARD (<?php echo $data['name'];?>)</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="content" class="p-4 p-md-5 pt-5">
        <!-- Number Base conversion -->
        <div class="container " id="container" style="margin-top: 20px;">
        (<?php echo $data['name'];?>)
            <p class="error"></p>
 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createToDo">
  Create new To Do
</button>


<!-- The Modal -->
<div class="modal" id="createToDo">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="modal-title">Create New To Do List</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" id="todoForm">
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="Priority">Priority:</label>
    <select class="form-control" id="priority" name="priority">
      <option value="Very Important">Very Important</option>
      <option value="Important">Important</option>
      <option value="Not Much Important">Not Much Important</option>
    </select>
  </div> 
  <div class="form-group">
    <label for="task">Task:</label>
    <textarea class="form-control" rows="5" id="task" name="task"></textarea>
  </div> 
  <div class="form-group">
    <label for="date">Date</label>
    <input type="datetime-local" class="form-control" id="date" name="date">
  </div>
  <button type="submit" class="btn btn-primary" id="todo" name="todo">Create to do</button>
</form> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
  
    </div>
  </div>
</div>


       

        
        </div>
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
                <td><a href="details.php?id=<?php echo $dat['id']?>" >View Details</a> |<a href="updat.php?id=<?php echo $dat['id']?>" >Update</a> | <a href="delete.php?id=<?php echo $dat['id']?> ">Delete</a></td>        
            </tr>
            <?php
          $no++;
            }
          ?>
            </tbody>
            
          </table>  
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
    $('#todo').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'new_todo.php',
        data: $('#todoForm').serialize(),
        success: function (data) {
        var result=data;
        $(".error").html(result);
        if(result=="success"){
        window.alert('Your To do successfully');
        }
        }
    });

    })
</script>


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
    include('includes/footer.php');
?>
    <?php
}else{
    header("location:index.php");
}
?>