<?php
error_reporting(0);
session_start();

require 'connection.php';
if(isset($_POST['add_article'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $photo = $_FILES['photo']['name'];
    $dst = "./article-images/".$photo;
    $dst_db = "article-images/".$photo;

    move_uploaded_file($_FILES['photo']['tmp_name'], $dst);

    $sql = "INSERT INTO article(title, content, image) VALUES('$title', '$content', '$dst_db')";
    $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['article'] = "Article Has Been Posted Successfully";
        header('location:new_article.php');
    }
    else{
        echo "Registration Failed";

    }

}

?>