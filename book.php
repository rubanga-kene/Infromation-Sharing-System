<?php 
 error_reporting(0);
  session_start();

  require 'connection.php';

  // CAPTURING THE USER INFO OF LOGGED student
  if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM student WHERE username = '$name' ";
    $result = mysqli_query($conn, $sql);
    if($result-> num_rows > 0){
      $student = $result->fetch_assoc();
    } 
  }


  // CAPTURING THE INFORMATION OF CLICKED SHIFT
  if(isset($_GET['event_id'])){
    $event_id = $_GET['event_id'];
    $sql_get_event = "SELECT * FROM events WHERE event_id = '$event_id' ";
    $result_event = mysqli_query($conn, $sql_get_event);
    if($result_event-> num_rows > 0){
      $event = $result_event->fetch_assoc();
    }
  }

   // CHECK IF THE USER HAS ALREADY BOOKED THE EVENT
  $booking_check_sql = "SELECT * FROM bookings WHERE username = '$name' AND event_id = '$event_id' ";
  $result_booking_check = mysqli_query($conn, $booking_check_sql);

  if($result_booking_check->num_rows > 0){
    $_SESSION['event_booked_message'] = "You have already booked this event.";
    header('location:user_events.php');
    exit; // Stop further execution
  }

  // BOOKING ATTRIBUTES
  $title = $event['title'];
  $venue = $event['venue'];
  $date = $event['date'];
  $username = $name;

  // INSERT THE BOOKING
  $booking_sql = "INSERT INTO bookings(event_id, title, venue, date, username)
                  VALUES('$event_id', '$title', '$venue', '$date', '$username')";
  $result_booking = mysqli_query($conn, $booking_sql);

  if($result_booking){
    
      $_SESSION['event_booked_message'] = "Event Booked Successfully";
      header('location:user_events.php');
    } else {
      echo "Failed to book booked event.";
    }

    
?>