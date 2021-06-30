<?php
session_start();
?>
<!DOCTYPE html>
<!-- related to image upload only-->
<html>
    <head>
        <title>Posts upload page</title>
		<link rel="stylesheet" type="text/css" href="img css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <style>
            a {
                font-family: 'Trebuchet MS', sans-serif;
            }
            label { 
                text-align: right;
                width:500px;
                height: 19px;
                font-family: 'Trebuchet MS', sans-serif;
            }
            .btn{
                border-radius: 12px;
                height: 50px;
                width: 100px;
            }
            </style>
</head>
<div class="topbar">
        <img style="height: 40px; margin-left: 10px ;margin-top: 10px" src="Header-Name1.jpg">
        <a href="menu.php" class="link"><button class="spcbutton"><b>Back</b></button></a>
    </div>
<body>
<br><br><br>
        <button><a href="logout.php">Log Out</a></button>
    <h1><?php echo $_SESSION['username']; ?>'s profile page</h1>
    <p>Here <?php echo $_SESSION['username']; ?>,<br>
				you can upload new images	</p>
    <!--This page is to accept upload file from user only-->
    <br><br>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>
            <input type="text" name="posts" placeholder="Enter some text" autocomplete="off">
            </label>
        </div>
        <br><br>
        <div>
            <input type="file" name="photo">
        </div>
        <br><br>
        <div>
            <input type="submit" class="btn" name="submit" value="UPLOAD"> 
        </div>
    </form>
    <br><br>
    <form action="display.php">
        <div>
            <button>DISPLAY</button>
        </div>
        </form>
</body>
</html>
