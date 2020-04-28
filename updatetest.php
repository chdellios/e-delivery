<?php
session_start();
$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}


$qu="SELECT `username` FROM `delivery`";
$result=mysqli_query($con,$qu);
$qlat="SELECT `lng` , `lat` FROM `orders`";
$result1=mysqli_query($con,$qlat);


while($row=mysqli_fetch_array($result)){
$username=$row['username'];
 while($row1=mysqli_fetch_array($result1)){
	 $lato=$row1['lat'];
	 $lngo=$row1['lng'];

if(isset($_POST['avail'])){
$sql=mysqli_query($con,"UPDATE `delivery` SET `status`='ready'  WHERE `username`=('" . $_SESSION['kouosta'] . "')");
}

if(isset($_POST['deac'])){
	$sql=mysqli_query($con,"UPDATE `delivery` SET `status`='not_ready' WHERE `username`=('" . $_SESSION['kouosta'] . "')");
	header("Location: ./delivery.php");
}



if(isset($_POST['done'])){
	$sql=mysqli_query($con,
	"UPDATE `delivery` SET `lng`='".$lngo."' , `lat`='".$lato."' WHERE `username`='" . $_SESSION['kouosta'] . "'");
	$sql=mysqli_query($con,"UPDATE `orders` SET `status`='done' WHERE `ID`=1");
}
 }

 }


mysqli_close($con);

?>







<html>
<head>
  <meta charset=utf-8 />
  <title>ypdate test</title>
	<!--mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<!--<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' /> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/js/my.js"></script>
 <script src="jquery-2.1.1.min.js"></script>

    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>


    <script type='text/javascript' src='jquery.js'></script>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin=""></script>


    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.css"
    integrity="sha512-v5YmWLm8KqAAmg5808pETiccEohtt8rPVMGQ1jA6jqkWVydV5Cuz3nJ9fQ7ittSxvuqsvI9RSGfVoKPaAJZ/AQ=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.js"
    integrity="sha512-zdT4Pc2tIrc6uoYly2Wp8jh6EPEWaveqqD3sT0lf5yei19BC1WulGuh5CesB0ldBKZieKGD7Qyf/G0jdSe016A=="
    crossorigin=""></script>

<link href="styledel.css" rel="stylesheet" type="text/css">

<style type="text/css">
body {
	background-image: url(Good-morning-coffee-with-breakfast-nice-day.jpg);
}
</style>

  <style>
  #map{
width: 600px;
height: 500px;
bottom: 60;
left: 35%;}
  </style>



  <style type="text/css">
  table{
	 border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 20%;
  text-align: left;
  border-collapse: collapse;

  }
  </style>

</head>
<body>



<form action="update.php" method="post">
 <button type="submit" name="deac" id= "deac"  class="btnActivate">Deactivate </button>
</form>




<form  method="post">
 <button type= "button" name="done" id= "done" onClick="return setmarker()"  class="btnActivate">Done </button>
</form>

<form action="loginformtest.php" method="post">
  <button type="submit" name="complete" onclick="complete();" class="btnActivate">Logout!</button>
</form>


<div id="map"></div>

<script>




  var map = L.map('map').setView([38.245248, 21.736726], 13);

   var returnd=function(){

	var tmp=null;
	   $.ajax({
	   'async' :false,
	url:"latphp.php",
	method:"POST",
	'global':false,
	'data':{'lat':'lat'},
	'success': function(data){ tmp=data;
	}

    });
	return tmp;
	}();







		var returnd1=function(){

	var tmp=null;
	   $.ajax({
	   'async' :false,
	url:"lngphp.php",
	method:"POST",
	'global':false,
	'data':{'lng':'lng'},
	'success': function(data){ tmp1=data;
	}

    });
	return tmp1;
	}();










 function setmarker(){
	results.clearLayers();
	 L.marker([returnd,returnd1]).addTo(marktest);


 $.ajax({
	url:"marker.php",
	method:"POST",

	success: function(data){alert('ola kala');
	},
	error:function(data){
		alert('error');
	}

    });

	return false;

	}





  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);



  var searchControl = L.esri.Geocoding.geosearch().addTo(map);
var marktest=L.layerGroup().addTo(map);
  var results = L.layerGroup().addTo(map);


  searchControl.on('results',

   function(data){
	   marktest.clearLayers();
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
	   var lat = data.latlng.lat; // lat of clicked point
        var lng = data.latlng.lng; // lng of clicked point






   $.ajax({
	url:"latlngdel.php",
	method:"POST",
	data: {lat:lat,lng:lng},
	success: function(data){alert('ola kala');
	},
	error:function(data){
		alert('error');
	}

    });


	//lat long paraggelias


	var return_first=function(){

	var tmp=null;
	   $.ajax({
	   'async' :false,
	url:"latphp.php",
	method:"POST",
	'global':false,
	'data':{'lat':'lat'},
	'success': function(data){ tmp=data;
	}

    });
	return tmp;
	}();







		var return_first1=function(){

	var tmp=null;
	   $.ajax({
	   'async' :false,
	url:"lngphp.php",
	method:"POST",
	'global':false,
	'data':{'lng':'lng'},
	'success': function(data){ tmp1=data;
	}

    });
	return tmp1;
	}();


 //lat long magaziou
 var return_magazi=function(){

	var tmp=null;
	   $.ajax({
	   'async' :false,
	url:"latmagazi.php",
	method:"POST",
	'global':false,
	'data':{'lat':'lat'},
	'success': function(data){ tmp=data;
	}

    });
	return tmp;
	}();







		var return_magazi1=function(){

	var tmp=null;
	   $.ajax({
	   'async' :false,
	url:"lngmagazi.php",
	method:"POST",
	'global':false,
	'data':{'lng':'lng'},
	'success': function(data){ tmp1=data;
	}

    });
	return tmp1;
	}();










  L.marker([return_first,return_first1]).addTo(results);
  L.marker([return_magazi,return_magazi1]).addTo(results);




	}





  });
</script>

<script>

$(document).ready(function(){
    $("button").click(function(){
        $.ajax({url: "complete", success: function(result){
            $("#complete").html(result);
        }});
    });
});
</script>



<table>


<?php

$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");
if($con==false){
	die("ERROR: Could not connect.".mysqli_connect_error());
}
 mysqli_set_charset($con,'utf8');
$qa="SELECT * FROM `orders` WHERE `status`='not_done' AND `active`=0 ";



$result=mysqli_query($con,$qa);


while($row=mysqli_fetch_array($result)){

	echo "<tr><td> id: ".$row["orderID"]."</td><td> ελληνικός ".$row["greek"]."</td><td> φραπέ ".$row["frape"]."</td><td>  εσπρέσο ".$row["espresso"]."</td><td>  καπουτσίνο ".$row["capoutsino"]."</td><td>  φίλτρου ".$row["filtrou"]."</td><td>  τυρόπιτα ".$row["tyropita"]."</td><td>  χορτόπιτα ".$row["xortopita"]."</td><td>  κουλούρι ".$row["koulouri"]."</td><td> τόστ ".$row["tost"]."</td><td>  κέικ ".$row["cake"]."</td>";
}

mysqli_close($con);

?>

</table>





</body>
</html>
