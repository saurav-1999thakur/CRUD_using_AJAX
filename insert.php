<?php
include('../../database/db_conn.php');
// echo "<pre>";
// print_r($_POST);print_r($_FILES);die;
$target_folder = ("../assets/images/test/");
$target_file = $target_folder.$_FILES['profile']['name'];
move_uploaded_file($_FILES['profile']['tmp_name'],$target_file);

$name = $_POST['name'];
$profile = $_FILES['profile']['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$company = $_POST['company'];
$address = $_POST['address'];

$query = "INSERT INTO `revise_2`(`name`,`profile`,`contact`,`email`,`company`,`address`)VALUES('".$name."','".$profile."','".$contact."','".$email."','".$company."','".$address."')";

if(mysqli_query($connect,$query)){
    header("location:list.php");
}else{
    echo "oops";
}

?>