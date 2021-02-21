<?php
include "config.php";
include "userrole.php";


$cat_id = $_GET['id'];
$sql = "DELETE FROM category WHERE category_id = {$cat_id}";
if(mysqli_query($conn, $sql)){
    header("location: http://localhost/RL-News-project/admin/category.php");
}else{
    echo "Can't delete"; 
}


mysqli_close($conn);
?>