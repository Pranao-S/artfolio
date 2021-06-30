<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="homepage/homepage.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
            <!--PHP START-->
            <?php

$server = "localhost";
$user = "root";
$password = "";
$db="iwp_project";

$con = mysqli_connect($server,$user,$password,$db);

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from create_acc where email = '$email' " ;
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
		
        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode){
               // echo "login successful" ;
				?>
				<script>
						alert("Login successful");
                        location.replace("menu.php"); 
				</script>
				<?php
        }else{	?>
		<script>
		alert("Password Incorrect !!");
		//location.replace("menu.php"); 
		</script>
		<?php
                //echo "password incorrect";
			}
    }else{?>
				<script>
						alert("Invalid Email !!");
						//location.replace("menu.php"); 
				</script>
				<?php
        //echo "invalid username";
    }
}
            ?><!--PHP END-->

    <div class="background">    
        <div class="topbar">
            <img style="height: 40px; margin-left: 10px ;margin-top: 10px" src="Header-Name1.jpg">
            <a href="register.php" class="link"><button class="spcbutton"><b>Signup</b></button></a>
        </div>
        <br><br><br><br><br><br><br>
        <div class="form">
            <h2 class="heading">Sign in</h2>
            <br>
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">   
                <div class="textbox">
                    <input type="text" name="email" placeholder="Email" autocomplete="off">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <br>
                <div class="textbox">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <a style="color: #f1f1f1;text-decoration: none;" href="fpass.html" >forgot password ?</a>
                </div>
                
                <br>
                
                <br>
                <br>
                <button type="submit" class="normbutton" name="login"><b>Sign In</b></button>
                
            </form>
          
        </div>
    </div>
</body>
</html>