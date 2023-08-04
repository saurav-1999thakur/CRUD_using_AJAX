<?php 
include('../../database/db_conn.php');
$id = $_POST['edit_id'];

$target_folder = ("../assets/images/test/");
$target_file = $target_folder.$_FILES['profile']['name'];
move_uploaded_file($_FILES['profile']['tmp_name'],$target_folder);
$query = "SELECT `profile` FROM `revise_2` where id = '".$id."'";
$select = mysqli_query($connect,$query);
$result = mysqli_fetch_row($select);

$old_link = $target_folder.$result[0];
unlink($old_link);

$name = $_POST['name'];
$profile = $_FILES['profile']['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$company = $_POST['company'];
$address = $_POST['address'];

$query = "UPDATE `revise_2` SET `name` = '".$name."', `profile` = '".$profile."', `contact` = '".$contact."',`email` = '".$email."',`company` = '".$company."',`address` = '".$address."' where id = '".$id."' ";

if(mysqli_query($connect,$query)){
    header("location:list.php");
}else{
    echo "oops";
}

?>