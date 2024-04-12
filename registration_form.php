<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEEE Busitema</title>
    <!-- <style>body{padding-top: 60px;}</style> -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

	<link href="assets/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/login-register.js" type="text/javascript"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="styles.css"/>
    <style>
        .form-container{
            width:50%;
            margin:0 auto;
            background-color: rgba(0, 0, 0, 0.354);
            padding:3rem 0

        }

        .form-container .content{
            width:70%;
            margin:0 auto;

        }

        input{
            margin-bottom: 3rem;
        }

        .reg{
            width: 100%;
            margin: 0 auto;
            display: block;
            background-color: aqua;
            /* margin-right: 3rem; */
        }
    </style>
</head>
<body>
    <header class="main-header">
        <nav>
            <img class="logo" src="img/ieee-bus.png" alt="ieee busitema logo"/>
            <div class="nav-links">
                 <a href="index.php" class="nav-link">Back to Login</a> 
                
            </div>
            
        </nav>
    </header>
    
    <!-- BOOTSTRAP FORMS -->
    
                        <!-- REGISTRATION BOX -->
    <div class="form-container">
        <div class="box">
            <div class="content ">
                <div class="form">
                    <form method="POST" action="student_registration.php">
                        <input  class="form-control" type="text" placeholder="Full Name" name="name" required>
                        <input  class="form-control" type="text" placeholder="Username" name="username" required>
                        <input  class="form-control" type="email" placeholder="Email" name="email" required>
                        <input  class="form-control" type="text" placeholder="Campus" name="campus" required>
                        <input  class="form-control" type="text" placeholder="Programme" name="programme" required>
                        <input  class="form-control" type="password" placeholder="Password" name="password" required>
                        <input class="btn btn-default btn-login reg" type="submit" value="Log In" name="student_reg">
                    </form>
                </div>
            </div>
                
        </div>

    </div>
                
          

</body>
</html>