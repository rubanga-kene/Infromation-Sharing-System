<?php 
error_reporting(0);
  session_start();

  require 'connection.php';

    // CAPTURING THE INFORMATION OF CLICKED ARTICLE
    if(isset($_GET['article_id'])){
        $article_id = $_GET['article_id'];
        $sql_get_article = "SELECT * FROM article WHERE article_id = '$article_id' ";
        $result_article = mysqli_query($conn, $sql_get_article);

        if($result_article-> num_rows > 0){
          $article = $result_article->fetch_assoc();
        }
        else{
            echo"Nothing to show here";
        }
      }

       // NEW  VALUES
  $title = $article['title'];
  $content = $article['content'];
  $image = $article['image'];

    // echo "$image";
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEEE Busitema</title>
    <link rel="stylesheet" href="css/customStyle.css"/>
    <style>

        .article{
            width: 70%;
            margin: 1rem auto;
            padding-bottom: 2rem;
        }
        .image{
            width: 100%;
        }

        .content{
            margin: 1rem 1rem;
            line-height: 1.5;
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
            <a href="user-dashboard.php"><li style="color: white" ><i class="fa fa-circle-o fa-fw"></i>Back</li></a>
            <!-- <a href="user_events.php"><li ><i class="fa fa-circle-o fa-fw"></i>Events</li></a> -->
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <!-- <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #ff6e14;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div> -->
      <div class="item">
          <!-- <ul class="nostyle zero" style="line-height: 2;">
           <a href=""><li><i class="fa fa-circle-o fa-fw"></i>  Contact</li></a>
            <a href=""><li><i class="fa fa-circle-o fa-fw"></i> Membership</li></a>
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
          </ul> -->
        </div>
    </div>

    <div class="marginLeft" >
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
            <span class="article-header"><?php echo"$title" ?></span>
            <div class="article" >
                <div class="image">
                <img src="<?php echo $image ?>" alt=""/>
                </div>
                <!-- <div class="title">
                <?php echo"$title" ?>
                </div> -->
                <div class="content">
                <?php echo"$content" ?>
                </div>


            </div>
    
      </div>
    </div>
    

    
    </body>
</html>