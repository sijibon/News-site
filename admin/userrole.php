<?php
if($_SESSION['user_role'] == 0){

header("location: http://localhost/RL-News-project/admin/post.php");
}

?>