<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8 />
  <title>webmap</title>
  <!--mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  <!-- <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' /> -->

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




<style>

body {
	background-image: url(coffee2.jpg);
}


  #map{
width: 600px;
height: 500px;
bottom: 1;
left: 35%;}


.bottomright {
  background-color: #1F1F11;
    color: white;
    position: absolute;
    bottom: 50px;
    right: 16px;
    font-size: 18px;
}


a {
  text-decoration: none;
  display: inline-block;
  padding: 10px 10px;
}

  </style>
</head>


<body>
<div id="map"></div>


<form action="loginformtest.php" method="post">
  <button type="submit" name="complete" onclick="complete();" class="bottomright">Ολοκλήρωση Παραγγελίας!</button>
</form>

<!--<a href=loginformtest.php class="bottomright">Ολοκλήρωση Παραγγελίας! &raquo;</a> -->


<script>




  var map = L.map('map').setView([38.245248, 21.736726], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);



  var searchControl = L.esri.Geocoding.geosearch().addTo(map);

  var results = L.layerGroup().addTo(map);



  searchControl.on('results', function(data){
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
	   var lat = data.latlng.lat; // lat of clicked point
        var lng = data.latlng.lng; // lng of clicked point


   $.ajax({
	url:"latlng.php",
	method:"POST",
	data: {lat:lat,lng:lng},
	success: function(data){alert('Sent');
	},
	error:function(data){
		alert('error');
	}

    });


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

</body>
</html>
