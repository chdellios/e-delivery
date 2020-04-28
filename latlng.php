<?php
session_start();

$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");
$lat=$_POST['lat'];
$lng=$_POST['lng'];
if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}

$sql=mysqli_query($con,"UPDATE `orders` SET `lng`='".$lng."' , `lat`='".$lat."' WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1 ");

mysqli_close($con);
?>
