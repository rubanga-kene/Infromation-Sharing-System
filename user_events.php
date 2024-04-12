
<?php 
error_reporting(0);
  session_start();

  require 'connection.php';

  $event = "SELECT * FROM events";
  $result_event = mysqli_query($conn, $event);

     // EVENT BOOKED SUCCESSFULLY
     if($_SESSION['event_booked_message']){
        $event_booked_message = $_SESSION['event_booked_message'];
        echo "<script type='text/javascript'>
            alert('$event_booked_message');
        </script>";
    }
    unset($_SESSION['event_booked_message']);


  // CAPTURING THE USER INFO OF LOGGED student
  if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM student WHERE username = '$name' ";
    $result = mysqli_query($conn, $sql);
    if($result-> num_rows > 0){
      $student = $result->fetch_assoc();
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
</head>
<body>
    <div class="dashboard" style="position: fixed;width: 18%;height: 100%;background:#222D32">
      <div style="background:#222D32;padding: 1px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
        <div><img src="img/ieee-bus.png" style='width: 150px;height: 66px'></div>
      </div>

      <div style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
      <div>
        <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #ff6e14;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            <a href="user-dashboard.php"><li><i class="fa fa-circle-o fa-fw"></i>Articles</li></a>
            <a href="user_events.php"><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Events</li></a>
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #ff6e14;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
           <a href=""><li><i class="fa fa-circle-o fa-fw"></i>  Contact</li></a>
            <a href=""><li><i class="fa fa-circle-o fa-fw"></i> Membership</li></a>
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
          </ul>
        </div>
    </div>

    <div class="marginLeft" >
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
            <span class="article-header">Upcoming Events</span>

            <div class="user-events-container">

            <?php
                    while($event = $result_event ->fetch_assoc())
            {

                ?>
                <div class="user-event">
                    <div class="user-event-img-container">
                        <img style="width: 350px; height:300px;" src="<?php echo "{$event['image']}" ?>" alt="">
                    </div>
                    <div class="user-event-content-container">
                        <h3 class="user-event-header"><?php echo "{$event['title']}" ?></h3>
                        <p style="width:;" class="user-event-text"><?php echo "{$event['content']}" ?></p>
                        <p  class="user-event-venue"><b>Venue:</b> <?php echo "{$event['venue']}" ?></p>
                        <p class="user-event-date"><b>Date and Time:</b> <?php echo "{$event['date']}" ?> <?php echo "{$event['time']}" ?></p>
                        <?php echo "<a onClick=\" javascript:return confirm('Do you want to book reservation this Event?');\" class='register-btn' style='padding: 5px 20px;' href='book.php?event_id={$event['event_id']}'>Register</a>"; ?>
                        <!-- <a style="width:8rem;" class="register-btn" href="">Register</a> -->
                    </div>
                </div>
            <?php } ?>
        

            </div>
    
      </div>
    </div>
    

    
    </body>
</html>