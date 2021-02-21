<?php 

include "config.php";

if(isset($_FILES['fileToUpload'])){
    $errrors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_temp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));
    $file_extension = array("jpeg", "jpg", "png");

    if(in_array($file_ext, $file_extension) === false){
        $errrors[] = "This file extension is not allowed. Please choose a PNG, JPEG OR JPG";
    }

    if($file_size > 2097152){
        $errrors[] = "File is too long. Please try to less then 2 MB file";
    }

    if(empty($errrors == true)){
        move_uploaded_file($file_temp, "upload/".$file_name);
    }else{
        print_r($errrors);
        die();
    }
}

$title = $_POST['post_title'];
$postdesc = $_POST['postdesc'];
$category = $_POST['category'];
$date  = date('d M, Y');
session_start();
$author  = $_SESSION['user_id'];

$sql = "INSERT INTO post(title, description, category, post_date, author,post_img)
VALUES ('{$title}', '{$postdesc}','{$category}','{$date}',{$author},'{$file_name}');";

$sql .= "UPDATE category SET post = post + 1 where category_id = {$category}";

if(mysqli_multi_query($conn, $sql)){
    header("location: http://localhost/RL-News-project/admin/post.php");
}else{
    echo "<p class='alert alert-danger'>Query failed.</p>";
}


?>