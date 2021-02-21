<?php

 include "header.php"; 
 include "userrole.php";

?>

<?php 

if(isset($_POST['submit'])){ 
    include "config.php";
    
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['l_name']);
    $user = mysqli_real_escape_string ($conn, $_POST['username']);
    $role = mysqli_real_escape_string ($conn, $_POST['role']);

    $sql = "SELECT username FROM user WHERE username = '{$user}'";
    $result = mysqli_query($conn, $sql) or die("Query faild");

    if(mysqli_num_rows($result) > 0){
        echo "<p style='color:red'> Username already exist</p>";
    }else{
    $sql1 = "UPDATE user SET first_name ='{$fname}', last_name = '{$lname}', username = '{$user}', role = '{$role}' WHERE user_id = {$user_id}";
        if(mysqli_query($conn, $sql1)){
            echo "<p style='color:green'> Data inserted!..</p>";

        }else{
            echo "<p style='color:red'> Data not inserted!..</p>";

        }
    }  
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">

              <?php 
              include "config.php";
              $admin_id = $_GET['id'];
              $sql = "SELECT * FROM user WHERE user_id = {$admin_id}";
              $result = mysqli_query($conn, $sql) or die("Query failed");
              
              if(mysqli_num_rows( $result)>0){
              while($row = mysqli_fetch_assoc($result)){

              ?>
        
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'] ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                          <?php
                          if($row['role']==1){
                             echo '<option value="0">normal User</option>
                              <option value="1" selected>Admin</option>';
                          }else{
                           echo '<option value="0" selected>normal User</option>
                            <option value="1">Admin</option>';
                          }                        
                          ?>    
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>

                  <?php 
                    }
                  }
                   ?>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
