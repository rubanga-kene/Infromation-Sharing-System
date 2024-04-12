<?php 
error_reporting(0);
  session_start();

  require 'connection.php';

  if($_GET['article_id']){
    $article_id = $_GET['article_id'];
    $sql_del_article = "DELETE  FROM article WHERE article_id = '$article_id' ";

    $result_del_article = mysqli_query($conn, $sql_del_article);

    if($result_del_article){
        $_SESSION['article_deleted'] = "Article Deleted Successfully";
        header("location:dashboard.php");
    }
  }


?>