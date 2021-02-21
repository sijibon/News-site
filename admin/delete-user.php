<?php
include "config.php";
include "userrole.php";

$delete_id = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = {$delete_id}";
if( mysqli_query($conn, $sql)){
    header("location: http://localhost/RL-News-project/admin/users.php");
}else{
    echo "<p style='color:red'>Can't Delete</p>";
}

mysqli_close($conn);

?>