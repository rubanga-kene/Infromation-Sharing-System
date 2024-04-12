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
  }

  // NEW  VALUES
  $title = $article['title'];
  $content = $article['content'];
  $image = $article['image'];
  


  if(isset($_POST['update_article'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $photo = $_FILES['photo']['name'];
    $dst = "./event-images/".$photo;
    $dst_db = "event-images/".$photo;
  
    move_uploaded_file($_FILES['photo']['tmp_name'], $dst);
  
  
    $sql = "UPDATE article SET title = '$title', content = '$content', image = '$dst_db'WHERE article_id =$article_id"  ;
    $result = mysqli_query($conn, $sql);
  
    if($result){
        $_SESSION['article_deleted'] = "Article Updated Successfully";
        header('location:dashboard.php');
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
            <a href="dashboard.php"><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Back</li></a>
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
          <span style="font-size: 16pt;color: #333333;">Edit Article Information</span>
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
                <input class="add-article-btn" type="submit" name="update_article" value="Update Article">
              </div>
            </form>
        </div>
        
    
      </div>
    </div>
    

    
    </body>
</html>