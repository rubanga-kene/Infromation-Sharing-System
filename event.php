
<?php 
error_reporting(0);
  session_start();

  require 'connection.php';

  $event = "SELECT * FROM events";
  $result_event = mysqli_query($conn, $event);

    // EVENT DELETED SUCCESSFULLY
    if($_SESSION['event_deleted']){
      $event_deleted = $_SESSION['event_deleted'];
      echo "<script type='text/javascript'>
          alert('$event_deleted');
      </script>";
  }
  unset($_SESSION['event_deleted']);

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
            <a href="dashboard.php"><li ><i class="fa fa-circle-o fa-fw"></i>Articles</li></a>
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Events</li></a>
           <a href="new_article.php"><li><i class="fa fa-circle-o fa-fw"></i> New Article</li></a>
            <a href="new_event.php"><li><i class="fa fa-circle-o fa-fw"></i>New Event</li></a>
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #ff6e14;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
           <a href="event_bookings.php"><li><i class="fa fa-circle-o fa-fw"></i> Event Bookings</li></a>
           <a href="users.php"><li><i class="fa fa-circle-o fa-fw"></i> Users</li></a>
           <a href="contact.php"><li><i class="fa fa-circle-o fa-fw"></i>  Contact</li></a>
            <a href=""><li><i class="fa fa-circle-o fa-fw"></i> Membership</li></a>
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
          </ul>
        </div>
    </div>

    <div class="marginLeft" >
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
          <span style="font-size: 16pt;color: #333333">Events </span>
        </div>

        <div class="admin-article-container">

        <?php
                    while($event = $result_event ->fetch_assoc())
            {

                ?>
          <div class="admin-article" style="padding-top: 1.4rem;">
            <img src="<?php echo "{$event['image']}" ?>" alt="">
            <p class="admin-event-header"><?php echo "{$event['title']}" ?></p>
            <p class="event-date"><?php echo "{$event['date']}" ?></p>
            <p class="event-venue"><?php echo "{$event['venue']}" ?></p>
            <p class="article-content"><?php echo "{$event['content']}" ?></p>
            <!-- <a href="" class="edit">Edit </a> -->
            <!-- <a href="" class="del">Delete</a> -->
            <?php echo "<a class='edit' href='edit_event.php?event_id={$event['event_id']}'>Edit</a>" ?>
            <?php echo "<a onClick=\" javascript:return confirm('You are about to delete this event!');\" class='del' href='delete_event.php?event_id={$event['event_id']}'>Delete</a>" ?>
          </div>

          <?php } ?>

        </div>

      </div>
    </div>
   
    </body>
</html>