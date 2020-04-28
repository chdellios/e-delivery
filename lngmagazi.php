<?php


$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}


$sql = "SELECT `lng` FROM `katastimata` WHERE name = 'gounari'";
$result=mysqli_query($con,$sql);

while ($data =mysqli_fetch_array($result)){

$lng=$data['lng'];

}

echo "$lng";

	mysqli_close($con);
	?>
