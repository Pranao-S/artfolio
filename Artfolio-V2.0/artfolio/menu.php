<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>
<!DOCTYPE html>
<head>
    <title>Menu page</title>
</head>
<body>
    <center>

        <h1>Welcome<br>
		<?php echo $_SESSION['username']; ?>
		<br>to <br>Artfolio</h1>
        <form>
            <button><a href="logout.php">Log Out</a></button>
            <br><br>
            <button><a href="display.php">VIEW POSTS</a></button><!--index.php-->
            <br><br>
            <button><a href="index.php">PROFILE PAGE</a></button><!-- display.php-->
            <br><br>
            <button><a href="ABOUTpage.html">DISCOVER PAGE</a></button><!--Aarohan-->
        </form>
    </center>
</body>
</html>