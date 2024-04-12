<?php 
error_reporting(0);
  session_start();

  require 'connection.php';

  if($_GET['event_id']){
    $event_id = $_GET['event_id'];
    $sql_del_event = "DELETE  FROM events WHERE event_id = '$event_id' ";

    $result_del_event = mysqli_query($conn, $sql_del_event);

    if($result_del_event){
        $_SESSION['event_deleted'] = "Event Deleted Successfully";
        header("location:event.php");
    }
  }


?>