<?php
error_reporting(0);
  session_start();

  require 'connection.php';

  $article = "SELECT * FROM article";
  $result_article = mysqli_query($conn, $article);

  // ARTICLE DELETED SUCCESSFULLY
  if($_SESSION['article_deleted']){
    $article_deleted = $_SESSION['article_deleted'];
    echo "<script type='text/javascript'>
        alert('$article_deleted');
    </script>";
}
unset($_SESSION['article_deleted']);
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
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Articles</li></a>
            <a href="event.php"><li><i class="fa fa-circle-o fa-fw"></i>Events</li></a>
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
          <span style="font-size: 16pt;color: #333333;">Articles</span>
        </div>
        <div class="admin-article-container">

        <?php while($article = $result_article ->fetch_assoc())
            {

                ?>
          <div class="admin-article">
            <img src="<?php echo "{$article['image']}" ?>" alt="">
            <h3 class="admin-article-header"><?php echo "{$article['title']}" ?></h3>
            <p class="article-content"><?php echo "{$article['content']}" ?></p>
            <!-- <a href="edit_article.php" class="edit">Edit </a> -->
            <?php echo "<a  class='edit' href='edit_article.php?article_id={$article['article_id']}'>Edit </a>" ?>
            <?php echo "<a onClick=\" javascript:return confirm('You are about to delete this article!');\" class='del' href='delete_article.php?article_id={$article['article_id']}'>Delete</a>" ?>

          </div>
         
        <?php } ?>


        </div>
        
    
      </div>
    </div>
    

    
    </body>
</html>