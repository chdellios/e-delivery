<?php
session_start();
$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}
 mysqli_set_charset($con,'utf8');



if(isset($_POST['submit'])){

$name=$_POST['name'];
$turopita=$_POST['turopita'];
$xortopita=$_POST['xortopita'];
$koulouri=$_POST['koulouri'];
$tost=$_POST['tost'];
$keik=$_POST['keik'];




$qu="UPDATE `katastimata` SET `name`='$_POST[name]',`turopita`='$_POST[turopita]',`xortopita`='$_POST[xortopita]',`koulouri`='$_POST[koulouri]',`tost`='$_POST[tost]',`keik`='$_POST[keik]' WHERE `name`='gounari'";
$q1="UPDATE `katastimata` SET `name`='$_POST[name]',`turopita`='$_POST[turopita]',`xortopita`='$_POST[xortopita]',`koulouri`='$_POST[koulouri]',`tost`='$_POST[tost]',`keik`='$_POST[keik]' WHERE `name`='maizwnos'";
$q2="UPDATE `katastimata` SET `name`='$_POST[name]',`turopita`='$_POST[turopita]',`xortopita`='$_POST[xortopita]',`koulouri`='$_POST[koulouri]',`tost`='$_POST[tost]',`keik`='$_POST[keik]' WHERE `name`='agiouandreou'";
$q3="UPDATE `katastimata` SET `name`='$_POST[name]',`turopita`='$_POST[turopita]',`xortopita`='$_POST[xortopita]',`koulouri`='$_POST[koulouri]',`tost`='$_POST[tost]',`keik`='$_POST[keik]' WHERE `name`='psilalwnia'";

if(mysqli_query($con,$qu)){
	 header("Location: ./manager.php");
 }

 if(mysqli_query($con,$q1)){

 	 header("Location: ./manager.php");

  }

	if(mysqli_query($con,$q2)){

		 header("Location: ./manager.php");

	 }

	 if(mysqli_query($con,$q3)){

	 	 header("Location: ./manager.php");

	  }



}


$qa="SELECT * FROM `orders` WHERE `status` = 'done' ";

$result=mysqli_query($con,$qa);
while ($data =mysqli_fetch_array($result)){

	$ID=$data['orderID'];
	$ellinikos=$data['greek'];
	$frappe=$data['frape'];
	$espresso=$data['espresso'];
	$cappuccino=$data['capoutsino'];
	$filtrou=$data['filtrou'];
	$turopita=$data['tyropita'];
	$xortopita=$data['xortopita'];
	$koulouri=$data['koulouri'];
	$tost=$data['tost'];
	$keik=$data['cake'];

}


mysqli_close($con);

?>
