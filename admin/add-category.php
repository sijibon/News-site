<?php 
include "header.php"; 
include "userrole.php";

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <?php
                  include "config.php";
                  if(isset($_POST['save'])){
                  $cat_name = $_POST['cat'];
                  $sql = "SELECT category_name FROM category WHERE category_name = '{$cat_name}'";
                  $result = mysqli_query($conn, $sql) or die("Query failed");
                   if(mysqli_num_rows($result) > 0){
                       echo "<p style='color:red'> The category already exist</p>";
                   }else{
                       $sql1 = "INSERT INTO category (category_name) values ('{$cat_name}')";
                       $result1 = mysqli_query($conn, $sql1) or die("query faild");
                       echo "<p style='color:green'>Category inserted</p>";
                      header("location: http://localhost/RL-News-project/admin/category.php");
                   }
                }
                  ?>
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
