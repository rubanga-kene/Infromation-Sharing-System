<?php
error_reporting(0);
session_start();

require 'connection.php';

if(isset($_POST['student_reg'])){
    
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $campus = $_POST['campus'];
    $programme = $_POST['programme'];
    $password = $_POST['password'];

    $sql = "INSERT INTO student(full_name, username, email, campus, programme, password) VALUES('$name', '$username', '$email', '$campus', '$programme', '$password')";
    $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['adminloginMessage'] = "Your Registration was Successfull";
        header('location:index.php');
    
    }
    else{
        echo "Registration Failed!";

    }

}


?>