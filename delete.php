<?php 
include('../../database/db_conn.php');
$id = $_GET['del_id'];

$query = "SELECT `profile` FROM `revise_2` where id = '".$id."'";
$select = mysqli_query($connect,$query);
$fetch = mysqli_fetch_assoc($select);
$target_folder=("../assets/images/test/");
$old_image=$target_folder.$result[0];
unlink($old_image);

$query = "DELETE FROM `recive_2` WHERE id = '".$id."' ";
if(mysqli_query($connect,$query)){
    header("location:list.php");
}else{
    echo "oops";
}

?>