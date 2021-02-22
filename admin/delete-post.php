<?php 
include "config.php";
$post_id = $_GET['id'];
$cat_id = $_GET['cat_id'];

$sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);

unlink("upload/".$row['post_img']);

echo "<pre>";
print_r($row);
echo "<pre>";

$sql = "DELETE FROM post WHERE post_id = {$post_id};";
$sql .= "UPDATE category SET post = post -1 WHERE category_id = {$cat_id}";
if(mysqli_multi_query($conn, $sql)){
    header("location: http://localhost/RL-News-project/admin/post.php");
}else{
    echo "Query failed.";
}


?>