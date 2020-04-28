<?php
session_start();
$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}


$sql = "SELECT `lng` FROM `orders` WHERE username = ('" . $_SESSION['kouosta'] . "')";
$result=mysqli_query($con,$sql);

while ($data =mysqli_fetch_array($result)){

$lng=$data['lng'];

}

echo "$lng";

	mysqli_close($con);
	?>
