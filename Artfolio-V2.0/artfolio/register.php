<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="signin/signin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
    <div class="topbar">
        <img style="height: 40px; margin-left: 10px ;margin-top: 10px" src="Header-Name1.jpg">
        <a href="login.php" class="link"><button class="spcbutton"><b>Sign in</b></button></a>
    </div>
    <body>
                    <!--PHP START-->
    <?php

$con = mysqli_connect('localhost','root','','iwp_project');

if(isset($_POST['register']))
{      
    $user = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $fname = mysqli_real_escape_string($con,$_POST['first']);
    $lname = mysqli_real_escape_string($con,$_POST['last']);
    $con_pass = mysqli_real_escape_string($con,$_POST['confpwd']);
    $secq = mysqli_real_escape_string($con,$_POST['secq']);
    $seca = mysqli_real_escape_string($con,$_POST['seca']);

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $emailquery = " select * from create_acc where email='$email' " ;
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
				<script>
						alert("Email Already Exists");
				</script>
				<?php
        //echo "email already exists ";
    }else{ 
        if($password === $con_pass){

            $insertquery = " insert into create_acc(f_name,l_name,email,username,password, sec_q,sec_a) 
            values('$fname','$lname','$email','$user','$pass','$secq','$seca')" ;

            $iquery = mysqli_query($con,$insertquery); //execution of the query
            ?>
            <script>
					alert("Account Created Successfully");
			</script>
        <?php
            
        }else{ ?>
            <script>
					alert("Both Passwords don't match !!");
			</script>
        <?php   }
    }
}
?>          <!--PHP END-->
        
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form">
        <h2 class="heading">SIGNUP PAGE</h2>
        <br>
        <div class="textbox">
            <input type="text" name="first" placeholder="First Name" autocomplete="off" required>   
            <i class="fa fa-id-badge" aria-hidden="true"></i> 
            
            <br>
        </div>
        <div class="textbox">
            <input type="text" name="last" placeholder="Last Name" autocomplete="off" required>
            <i class="fa fa-id-badge" aria-hidden="true"></i>
            <br>
            
        </div>
        <div class="textbox">
            <input type="email" name="email" placeholder="Email" autocomplete="off" required>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            
            <br>
        </div>
        <div class="textbox">    
            <input type="text" name="username" placeholder="Username" autocomplete="off" required> 
            <i class="fa fa-user" aria-hidden="true"></i>
            
            <br>
        </div>
        <div class="textbox">
            <input type="password" name="password" placeholder="Password" autocomplete="off" required>
            <i class="fa fa-key" aria-hidden="true"></i>
            
            <br>
        </div>
        <div class="textbox">
            <input type="password" name="confpwd" placeholder="Confirm Password" autocomplete="off" required>
            <i class="fa fa-key" aria-hidden="true"></i>
            <br>  
        </div>
        
        <div class="textbox">
            <input type="text" name="secq" placeholder="Security Question" autocomplete="off" required>
            <i class="fa fa-key" aria-hidden="true"></i>
            <br>  
        </div>
        <div class="textbox">
            <input type="text" name="seca" placeholder="Security Answer" autocomplete="off" required>
            <i class="fa fa-key" aria-hidden="true"></i>
            <br>  
        </div>
    
        <button type="submit" class="normbutton" name="register"><b>Sign up</b></button>
        
    </form>
</body>
</html>