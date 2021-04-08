<?php
require_once('config.php');
$id = $_GET['id'];   
$sql ="DELETE FROM shayari_viwe WHERE id='$id'";
mysqli_query($con,$sql);
header('location:read.php');
sleep(3);
exit();
?>