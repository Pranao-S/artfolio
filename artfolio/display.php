<!DOCTYPE html>
<!-- related to image upload only-->
<html>
    <head>
        <title>Posts display page</title>
		<link rel="stylesheet" type="text/css" href="img css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<style>
    th {
        font-family: 'Trebuchet MS', sans-serif;
    }
    </style>
	<div class="topbar">
        <img style="height: 40px; margin-left: 10px ;margin-top: 10px" src="Header-Name1.jpg">
        <a href="menu.php" class="link"><button class="spcbutton"><b>Back</b></button></a>
    </div>
<body>
	<br><br><br>
    <table border="1">
        <thead>
        <tr><th>Text about the pic</th>
            <th>Image from db</th>
        </tr>
        </thead>
        <tbody>
        <?php

            $server = "localhost";
            $user = "root";
            $password = "";
            $db="img_upload";

            $con = mysqli_connect($server,$user,$password,$db);

            if($con){
				?>
				<script>
					alert("Connection established");
					//location.replace("upload.php"); 
				</script>
				 <?
                    
           }else{?>
					<script>
						//alert("Connection unsuccessful");
					</script>
					<?php
                    //echo 'Unsuccessful';
                    }
            $selectquery = "select text, img from img_info " ;
            $query = mysqli_query($con, $selectquery);
            //$result = mysqli_fetch_array($query);
            while($result = mysqli_fetch_array($query)){
            ?>

<tr>
    <td> <?php echo  $result['text'];  ?> </td>
    <td> <img src="<?php echo  $result['img'];  ?>" width="100" height="50" >  </td>
</tr>

            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>