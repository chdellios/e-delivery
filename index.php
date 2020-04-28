<?php
session_start();
$con = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($con,'utf8');

$greek = @$_GET['greek'];
$frape = @$_GET['frape'];
$espresso = @$_GET['espresso'];
$capoutsino = @$_GET['capoutsino'];
$filtrou = @$_GET['filtrou'];
$tyropita = @$_GET['tyropita'];
$xortopita = @$_GET['xortopita'];
$koulouri = @$_GET['koulouri'];
$tost = @$_GET['tost'];
$cake = @$_GET['cake'];


if(isset($_GET['SUBM1'])){
  $sql =mysqli_query($con, "UPDATE orders SET greek = $greek WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1 ");
}

if(isset($_GET['SUBM2'])){
$sql =mysqli_query($con, "UPDATE orders SET frape = $frape WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1 ");
}

if(isset($_GET['SUBM3'])){
$sql =mysqli_query($con, "UPDATE orders SET espresso = $espresso WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1 ");
}

if(isset($_GET['SUBM4'])){
$sql =mysqli_query($con, "UPDATE orders SET capoutsino  = $capoutsino WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1 ");
}

if(isset($_GET['SUBM5'])){
$sql =mysqli_query($con, "UPDATE orders SET filtrou = $filtrou WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1 ");
}

if(isset($_GET['SUBM6'])){
$sql =mysqli_query($con, "UPDATE orders SET tyropita = $tyropita WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1  ");
}

if(isset($_GET['SUBM7'])){
$sql =mysqli_query($con, "UPDATE orders SET xortopita = $xortopita WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1  ");
}

if(isset($_GET['SUBM8'])){
$sql =mysqli_query($con, "UPDATE orders SET koulouri = $koulouri WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1  ");
}

if(isset($_GET['SUBM9'])){
$sql =mysqli_query($con, "UPDATE orders SET tost = $tost WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1  ");
}

if(isset($_GET['SUBM10'])){
$sql =mysqli_query($con, "UPDATE orders SET cake = $cake WHERE username = ('" . $_SESSION['kouosta'] . "') AND active=1  ");
}


if (mysqli_multi_query($con, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html>


<head>
<!--mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link rel="stylesheet" type="text/css" href="web2.css">
</head>


<body>

<div class="split left">
  <div class="centered">

  <img src="coffee.jpg" alt="Avatar woman">
    <h2>Ροφήματα:</h2>
    <ul>
  <li> <button id="btn1" class="btn default1">Ελληνικός </button> </li>
  <li> <button id="btn2"class="btn default1">Φραπέ </button> </li>
  <li> <button id="btn3"class="btn default1">Εσπρέσσο </button> </li>
  <li> <button id="btn4"class="btn default1">Καπουτσίνο </button> </li>
  <li> <button id="btn5"class="btn default1">Φίλτρου </button> </li>
   </ul>
  </div>
</div>


<div class="split right">
  <div class="centered">
    <img src="snacks.jpg" alt="Avatar man">
    <h2>Snacks:</h2>
    <ul>
  <li><button id="btn6"class="btn default2">Τυρόπιτα</button></li>
  <li><button id="btn7"class="btn default2">Χορτόπιτα</button></li>
  <li><button id="btn8"class="btn default2">Κουλούρι</button></li>
  <li><button id="btn9"class="btn default2">Τοστ</button></li>
  <li><button id="btn10"class="btn default2">Κέικ</button></li>
   </ul>
  </div>
  <a href="webmap.php" class="bottomright">Συνέχεια &raquo;</a>
</div>



<!-- The Modal1 -->
<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Ελληνικός</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
      Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="greek"><br>
      <button type="submit" name="SUBM1">Done! </button>
    </form>
  </div>

  </div>
</div>



<!-- The Modal2 -->
<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Φραπέ</h2>
    </div>

  <div class="modal-body">
      <form action="web1.php" method="get">
      Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="frape"><br>
      <button type="submit" name="SUBM2">Done! </button>
    </form>
    </div>

  </div>
</div>




<div id="myModal3" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span3 class="close">&times;</span3>
      <h2>Εσπρέσσο</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="espresso"><br>
    <button type="submit" name="SUBM3">Done! </button>
    </div>

  </div>
</div>





<div id="myModal4" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Καπουτσίνο</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="capoutsino"><br>
    <button type="submit" name="SUBM4">Done! </button>
    </div>

  </div>
</div>






<div id="myModal5" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Φίλτρου</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="filtrou"><br>
    <button type="submit" name="SUBM5">Done! </button>
    </div>

  </div>
</div>


<div id="myModal6" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Τυρόπιτα</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="tyropita"><br>
    <button type="submit" name="SUBM6">Done! </button>
    </div>

  </div>
</div>

<div id="myModal7" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Χορτόπιτα</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="xortopita"><br>
    <button type="submit" name="SUBM7">Done! </button>
    </div>

  </div>
</div>


<div id="myModal8" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Κουλούρι</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="koulouri"><br>
    <button type="submit" name="SUBM8">Done! </button>
    </div>

  </div>
</div>


<div id="myModal9" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Τοστ</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="tost"><br>
    <button type="submit" name="SUBM9">Done! </button>
    </div>

  </div>
</div>

<div id="myModal10" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Κέικ</h2>
    </div>

  <div class="modal-body">
    <form action="web1.php" method="get">
    Εισάγετε ποσότητα: <input type="number" min="0" max="" onkeypress="return event.charCode >= 48" class="form-control" name="cake"><br>
    <button type="submit" name="SUBM10">Done! </button>
    </div>

  </div>
</div>

<script>
// Get the modal
var modal1 = document.getElementById('myModal1');
var modal2 = document.getElementById('myModal2');
var modal3 = document.getElementById('myModal3');
var modal4 = document.getElementById('myModal4');
var modal5 = document.getElementById('myModal5');
var modal6 = document.getElementById('myModal6');
var modal7 = document.getElementById('myModal7');
var modal8 = document.getElementById('myModal8');
var modal9 = document.getElementById('myModal9');
var modal10 = document.getElementById('myModal10');

// Get the button that opens the modal
var btn1 = document.getElementById("btn1");
var btn2 = document.getElementById("btn2");
var btn3 = document.getElementById("btn3");
var btn4 = document.getElementById("btn4");
var btn5 = document.getElementById("btn5");
var btn6 = document.getElementById("btn6");
var btn7 = document.getElementById("btn7");
var btn8 = document.getElementById("btn8");
var btn9 = document.getElementById("btn9");
var btn10 = document.getElementById("btn10");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];
var span4 = document.getElementsByClassName("close")[3];
var span5 = document.getElementsByClassName("close")[4];
var span6 = document.getElementsByClassName("close")[5];
var span7 = document.getElementsByClassName("close")[6];
var span8 = document.getElementsByClassName("close")[7];
var span9 = document.getElementsByClassName("close")[8];
var span10 = document.getElementsByClassName("close")[9];

// When the user clicks the button, open the modal
btn1.onclick = function() {
    modal1.style.display = "block";
}
btn2.onclick = function() {
    modal2.style.display = "block";
}
btn3.onclick = function() {
    modal3.style.display = "block";
}
btn4.onclick = function() {
    modal4.style.display = "block";
}
btn5.onclick = function() {
    modal5.style.display = "block";
}
btn6.onclick = function() {
    modal6.style.display = "block";
}
btn7.onclick = function() {
    modal7.style.display = "block";
}
btn8.onclick = function() {
    modal8.style.display = "block";
}
btn9.onclick = function() {
    modal9.style.display = "block";
}
btn10.onclick = function() {
    modal10.style.display = "block";
}



// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
span3.onclick = function() {
    modal3.style.display = "none";
}
span4.onclick = function() {
    modal4.style.display = "none";
}
span5.onclick = function() {
    modal5.style.display = "none";
}
span6.onclick = function() {
    modal6.style.display = "none";
}
span7.onclick = function() {
    modal7.style.display = "none";
}
span8.onclick = function() {
    modal8.style.display = "none";
}
span9.onclick = function() {
    modal9.style.display = "none";
}
span10.onclick = function() {
    modal10.style.display = "none";
}




// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
   if (event.target == modal1) {
        modal1.style.display = "none";
      }
      if (event.target == modal2) {
            modal2.style.display = "none";
          }
        if (event.target == modal3) {
            modal3.style.display = "none";
            }
        if (event.target == modal4) {
            modal4.style.display = "none";
            }
        if (event.target == modal5) {
            modal5.style.display = "none";
            }
        if (event.target == modal6) {
            modal6.style.display = "none";
            }
        if (event.target == modal7) {
            modal7.style.display = "none";
            }
        if (event.target == modal8) {
            modal8.style.display = "none";
            }
        if (event.target == modal9) {
            modal9.style.display = "none";
            }
        if (event.target == modal10) {
            modal10.style.display = "none";
            }

}*/
</script>





</body>
</html>
