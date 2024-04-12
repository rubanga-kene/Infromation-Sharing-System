
<?php 
    error_reporting(0);
    session_start();
    include "connection.php";

      // ARTICLE CREATED SUCCESSFULLY MESSAGE
      if($_SESSION['article']){
        $article = $_SESSION['article'];
        echo "<script type='text/javascript'>
            alert('$article');
        </script>";
    }
    unset($_SESSION['article']);
    
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
            <a href="event.php"><li><i class="fa fa-circle-o fa-fw"></i>Events</li></a>
           <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i> New Article</li></a>
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
          <span style="font-size: 16pt;color: #333333">Add Article </span>
          <div class="add-article-form">
            <p class="new-article-header">New Article</p>
            <form method="POST" action="add_article.php" enctype="multipart/form-data">
              <div class="article-particular">
                <label for="">Title</label>
                <input type="text" name="title" required>
              </div>
              <div class="article-particular">
                <label for="">Content</label>
                <textarea name="content"  ></textarea required>
              </div>
              <div class="article-particular">
                <label for="">Thumbnail</label>
                <input type="file" name="photo" required>
              </div>
              <div class="article-particular">
                <input class="add-article-btn" type="submit" name="add_article" value="Add Article">
              </div>
            </form>
          </div>
      </div>
    </div>
    

    
    </body>
</html>