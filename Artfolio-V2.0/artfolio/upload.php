<?php
// related to image upload only
$server = "localhost";
$user = "root";
$password = "";
$db="img_upload";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
    echo 'Connection successful' ;
}else{
    echo 'Unsuccessful';
}


if(isset($_POST['submit'])){

    $text = $_POST['posts'];
    $file = $_FILES['photo'];


    //print_r($file);
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $filerror = $file['error'];

    if($filerror==0){
        $destfile = 'upload/'.$filename;
        move_uploaded_file($filepath, $destfile);

        $insertquery = "insert into img_info(text,img) values('$text','$destfile') " ;

        $query = mysqli_query($con,$insertquery);

        header('location:index.php');
    }
}else{
    echo "Image not uploaded" ;
}
?>