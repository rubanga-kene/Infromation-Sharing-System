<?php 
error_reporting(0);
  session_start();

  require 'connection.php';

  $article = "SELECT * FROM article";
  $result_article = mysqli_query($conn, $article);

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
            <a href=""><li style="color: white" ><i class="fa fa-circle-o fa-fw"></i>Articles</li></a>
            <a href="user_events.php"><li ><i class="fa fa-circle-o fa-fw"></i>Events</li></a>
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
            <span class="article-header">Top Topics for you to explore...</span>
            <div class="articles-container">

            <?php
                    while($article = $result_article ->fetch_assoc())
            {

                ?>
              <div class="article">
                <img src="<?php echo "{$article['image']}" ?>" alt="Article Image">
                <h3 class="article-title"><?php echo "{$article['title']}" ?></h3>
                <p style="height: 6rem; overflow:hidden;" class="article-text"><?php echo "{$article['content']}" ?></p>
                <!-- <a href="" class="article-link">Read More...</a> -->
                <?php echo "<a class='article-link' href='read_more.php?article_id={$article['article_id']}'>Read More...</a>" ?>

              </div>

              <?php } ?>
  
            </div>
    
      </div>
    </div>
    

    
    </body>
</html>