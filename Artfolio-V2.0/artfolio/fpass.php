<?php

$server = "localhost";
$user = "root";
$password = "";
$db="iwp_project";

$con = mysqli_connect($server,$user,$password,$db);

if(isset($_POST['fpass'])){

    $email = $_POST['email'];
    $secq = $_POST['secq'];
    $seca = $_POST['seca'];

    $email_search = "select * from create_acc where email = '$email' " ;
    $query = mysqli_query($con,$email_search);

    $secq_search = "select * from create_acc where sec_q = '$secq' " ;
    $query1 = mysqli_query($con,$secq_search);

    $seca_search = "select * from create_acc where sec_a = '$seca' " ;
    $query2 = mysqli_query($con,$seca_search);

    $email_count = mysqli_num_rows($query); //checks if email exists in db
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query); //value stored in email_pass
        $db_pass = $email_pass['sec_q'];
        $pass_decode = password_verify($secq,$db_pass);
        if($pass_decode){
            // echo "login successful" ;
             ?>
             <script>
                     alert("Login successful");
                     location.replace("menu.php"); 
             </script>
             <?php
    }else{
        ?>
		<script>
                     alert("Login successful");
                     location.replace("menu.php"); 
             </script>
		<?php
    }
    }else{
        ?>
		<script>
                     alert("Login successful");
                     location.replace("menu.php"); 
             </script>
		<?php
    }
}
?>