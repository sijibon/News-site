<?php
include "config.php";
if(empty($_FILES['new_image']['name'])){
    $file_name = $_POST['old_image'];

}else{
    $errrors = array();
    $file_name = $_FILES['new_image']['name'];
    $file_size = $_FILES['new_image']['size'];
    $file_temp = $_FILES['new_image']['tmp_name'];
    $file_type = $_FILES['new_image']['type'];
    $file_ext = end(explode('.',$file_name));
    $file_extension = array("jpeg","jpg","png");

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
    $post_id = $_POST['post_id'];

     $sql = "UPDATE post SET title = '{$title}', description ='{$postdesc}', category = {$category}, post_img = '{$file_name}' WHERE post_id ={$post_id}";
     $result = mysqli_query($conn, $sql) or die("Query failed."); 
        if($result){
            header("location: http://localhost/RL-News-project/admin/post.php");
        }else{
            echo "Update query failed.";
        }
?>