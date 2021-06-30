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
        echo "email already exists ";
    }else{ 
        if($password === $con_pass){

            $insertquery = " insert into create_acc(f_name,l_name,email,username,password, sec_q,sec_a) 
            values('$fname','$lname','$email','$user','$pass','$secq','$seca')" ;

            $iquery = mysqli_query($con,$insertquery); //execution of the query

            
        }else{
            echo "password not matching ";
        }
    }

   

    if($pass==$con_pass){
   

        echo '<script>alert("Account created successfully !!")</script>';

    header('location:homepage.html');
    }else{
        echo '<script>alert("Passwords dont match !!")</script>';

        header('location:register.html');
    }
}
?>