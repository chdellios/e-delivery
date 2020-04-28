
<?php
session_start();
$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}
 mysqli_set_charset($con,'utf8');




$qa="SELECT * FROM 	`katastimata` ";

$result1=mysqli_query($con,$qa);
$qo="SELECT * FROM `orders` WHERE `status`='done'";
$result=mysqli_query($con,$qo);

?>




<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<link href="styledel.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>



<style type="text/css">
body {
	background-image: url(Good-morning-coffee-with-breakfast-nice-day.jpg);
}
</style>


<style type="text/css">
 table {
  border: 4px solid #555555;
  background-color: #555555;




  text-align: center;
  border-collapse: collapse;
}
  </style>





</head>

<body>

	<form action="loginformtest.php" method="post">
		<button type="submit" name="complete" onclick="complete();" class="btnActivate">Logout!</button>
	</form>


<table>
<tr>
<th>Name</th>
<th>turopita</th>
<th>xortopita</th>
<th>koulouri</th>
<th>tost</th>
<th>keik</th>
</tr>




<?php


while($row1=mysqli_fetch_array($result1)){



echo "<tr><form action='managerup.php' method=post>";

echo "<td><input type=text name=name value='".$row1['name']."'></td>";

echo "<td><input type=text name=turopita value='".$row1['turopita']."'></td>";


echo "<td><input type=text name=xortopita value='".$row1['xortopita']."'></td>";


echo "<td><input type=text name=koulouri value='".$row1['koulouri']."'></td>";

echo "<td><input type=text name=tost value='".$row1['tost']."'></td>";

echo "<td><input type=text name=keik value='".$row1['keik']."'></td>";
echo"<td><input type=submit name=submit>";
echo"</form></tr>";



}


mysqli_close($con);

?>

</table>

<table>
<tr>
<th>ID paraggelias</th>
<th>ellinikos</th>
<th>frappe</th>
<th>cappucino</th>
<th>espresso</th>
<th>nes</th>
<th>filtrou</th>
<th>turopita</th>
<th>xortopita</th>
<th>koulouri</th>
<th>tost</th>
<th>keik</th>
</tr>





<?php

while($row=mysqli_fetch_array($result)){


echo "<tr><form action='managerup.php' method=post>";

echo "<td><input type=text name=id value='".$row['orderID']."'></td>";

echo "<td><input type=text name=turopita value='".$row['tyropita']."'></td>";

echo "<td><input type=text name=xortopita value='".$row['xortopita']."'></td>";


echo "<td><input type=text name=koulouri value='".$row['koulouri']."'></td>";

echo "<td><input type=text name=tost value='".$row['tost']."'></td>";

echo "<td><input type=text name=keik value='".$row['cake']."'></td>";

echo "<td><input type=text name=ellinikos value='".$row['greek']."'></td>";


echo "<td><input type=text name=frappe value='".$row['frape']."'></td>";


echo "<td><input type=text name=cappucino value='".$row['capoutsino']."'></td>";

echo "<td><input type=text name=espreso value='".$row['espresso']."'></td>";

echo "<td><input type=text name=filtrou value='".$row['filtrou']."'></td>";

echo"</form></tr>";

}

?>





<script>

$(document).ready(function(){
    $("button").click(function(){
        $.ajax({url: "complete", success: function(result){
            $("#complete").html(result);
        }});
    });
});
</script>


</body>
</html>
