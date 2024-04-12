<?php
error_reporting(0);
session_start();

require 'connection.php';
if(isset($_POST['add_event'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $photo = $_FILES['photo']['name'];
    $dst = "./event-images/".$photo;
    $dst_db = "event-images/".$photo;

    move_uploaded_file($_FILES['photo']['tmp_name'], $dst);

    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO events(title, content, image, venue, date, time) VALUES('$title', '$content', '$dst_db', '$venue', '$date', '$time')";
    $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['event'] = "Event Has Been Posted Successfully";
        header('location:new_event.php');
    }
    else{
        echo "Registration Failed";

    }

}

?>