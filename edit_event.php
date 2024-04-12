<?php
error_reporting(0);
  session_start();

  require 'connection.php';

  $student = "SELECT * FROM student";
  $result_student = mysqli_query($conn, $student);

  // CAPTURING THE INFORMATION OF CLICKED SHIFT
  if(isset($_GET['event_id'])){
    $event_id = $_GET['event_id'];
    $sql_get_event = "SELECT * FROM events WHERE event_id = '$event_id' ";
    $result_event = mysqli_query($conn, $sql_get_event);
    if($result_event-> num_rows > 0){
      $event = $result_event->fetch_assoc();
    }
  }

  // NEW  VALUES
  $title = $event['title'];
  $content = $event['content'];
  $image = $event['image'];
  $venue = $event['venue'];
  $date = $event['date'];
  $time = $event['time'];


  if(isset($_POST['update_event'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $photo = $_FILES['photo']['name'];
    $dst = "./event-images/".$photo;
    $dst_db = "event-images/".$photo;
  
    move_uploaded_file($_FILES['photo']['tmp_name'], $dst);
  
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];
  
    $sql = "UPDATE events SET title = '$title', content = '$content', image = '$dst_db',venue='$venue', date='$date',time='$time' WHERE event_id =$event_id"  ;
    $result = mysqli_query($conn, $sql);
  
    if($result){
      echo "<script type='text/javascript'>
      alert('Event Updated Successfully');
  </script>";
        // echo "<script>alert('Event Information Has Been Updated Successfully');</script>";
        $_SESSION['event_deleted'] = "Event Updated Successfully";
        header('location:event.php');
        exit();
    }
    else{
        echo "Registration Failed";
  
    }
  
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEEE Busitema</title>
    <link rel="stylesheet" href="css/customStyle.css"/>

    <style>
        table, tr, th, td{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="dashboard" style="position: fixed;width: 18%;height: 100%;background:#222D32">
      <div style="background:#222D32;padding: 1px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
        <div><img src="img/ieee-bus.png" style='width: 150px;height: 66px'></div>
      </div>

      <!-- <div style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div> -->
      <div>
        <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #ff6e14;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
        <div class="item">
        <ul class="nostyle zero " style="line-height: 2;">
            <a href="event.php"><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Back</li></a>
            <!-- <a href="event.php"><li><i class="fa fa-circle-o fa-fw"></i>Events</li></a>
           <a href="new_article.php"><li><i class="fa fa-circle-o fa-fw"></i> New Article</li></a>
            <a href="new_event.php"><li><i class="fa fa-circle-o fa-fw"></i>New Event</li></a> -->
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <!-- <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #ff6e14;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div> -->
      <div class="item">
        </div>
    </div>

    <div class="marginLeft" >
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
          <span style="font-size: 16pt;color: #333333;">Edit Event Information</span>
        </div>
        <div class="admin-article-container" style="width: 80%; margin:2rem auto; border:1px solid #000;">
        <form method="POST" action="#" style="line-height: 4; width: 80%; margin:0 auto;" enctype="multipart/form-data">
              <div class="article-particular">
                <label for="">Title</label>
                <input type="text" name="title" value="<?php echo"$title" ?>" required>
              </div>
              <div class="article-particular">
                <label for="">Content</label>
                <textarea name="content" ><?php echo"$content" ?></textarea required>
              </div>
              <div class="article-particular">
                <label for="">Old Thumbnail</label>
                <img width="100" height="100" src="<?php echo"$image" ?>" alt="">
              </div>
              <div class="article-particular">
                <label for="">New Thumbnail</label>
                <input type="file" name="photo" required>
              </div>
              <div class="article-particular">
                <label for="">Venue</label>
                <input type="text" name="venue" value="<?php echo"$venue" ?>" required>
              </div>
              <div class="article-particular">
                <label for="">Date</label>
                <input type="date" name="date" value="<?php echo"$date" ?>" required>
              </div>
              <div class="article-particular">
                <label for="">Time</label>
                <input type="time" name="time" value="<?php echo"$time" ?>" required>
              </div>
              <div class="article-particular">
                <input class="add-article-btn" type="submit" name="update_event" value="Update Event">
              </div>
            </form>
        </div>
        
    
      </div>
    </div>
    

    
    </body>
</html>