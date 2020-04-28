<?php
session_start();

$conn = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$onoma=@$_POST['onomaxrhsth'];
$kwdikos=@$_POST['kwdikos'];
$kinhto=@$_POST['kinhto'];

if(isset($_POST['Register'])){
$sql = mysqli_query($conn, "INSERT INTO user (username, password, phone) VALUES ('$onoma', '$kwdikos', '$kinhto')");
}

?>

<?php
//if (mysqli_query($conn, $sql)) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}

$conn = mysqli_connect("localhost","root","","alysida_katasthmatwn");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['Login'])){
	if (isset($_POST['username'],$_POST['password'])){

		$username=@$_POST['username'];
		$password=@$_POST['password'];

		$_SESSION['kouosta'] = $username;

		$sql = mysqli_query($conn, "INSERT INTO `orders` (`username`, `active`) VALUES ('" . $_SESSION['kouosta'] . "' , (1) )");


	if (!empty($username) and !empty($password)){

		$sql = "SELECT * FROM `user` WHERE username='".$username."' and password='".$password."'";
		$result=mysqli_query($conn,$sql);

		$count=mysqli_num_rows($result);

		if($count==1){

 		$row = mysqli_fetch_array($result);
		?>



		<script type="text/javascript">
		window.location.href = "web1.php";
		</script>




		<?php
		}


	elseif($count!=1){
	    $sql = "SELECT * FROM `delivery` WHERE username='".$username."' and password='".$password."'";
		$result=mysqli_query($conn,$sql);

		$count=mysqli_num_rows($result);

		if($count==1){

		    $row = mysqli_fetch_array($result);
				?>

				<script type="text/javascript">
				window.location.href = "delivery.php";
			</script>;






			<?php
		}elseif($count!=1){
			$sql="SELECT * FROM `manager` WHERE username='".$username."' and password='".$password."'";
			$result=mysqli_query($conn,$sql);

		$count=mysqli_num_rows($result);

		if($count==1){

		    $row = mysqli_fetch_array($result);
				?>
				<script type="text/javascript">
				window.location.href = "manager.php";
			</script>;



<?php
		}
	mysqli_close($conn);

		}
	}
}
}
}
?>





<!DOCTYPE html>
<head>
<title>Login Form </title>

<!--mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<link href="style.css" rel="stylesheet" type="text/css">
<style>
body {
	margin: 0;
	padding: 0;
	background-image: url(coffee10.jpg);
	backround-size: cover;
	baground-position: center;
	font-family: Tahoma, Geneva, sans-serif;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body>
<div class="loginbox">
 <img src="avatar.png" class="avatar">
 <h1>Login Here</h1>

</tr>

 <form method="POST">

 <p>Username</p>
 <input type="text" name="username" placeholder="Enter Username" required>

 <p>Password</p>
 <p>
   <input type="password" name="password" placeholder="Enter password" required>
	 <input type="submit"  name="Login" value="Login">

   </form>



   <a href="#modal" class="registerLink">Δημιουργία Λογιαριασμού</a>
</div>

 <div class="modal_container" id="modal">
   <div class="modal">
     <a href="#" class="close">X</a>
       <span class="modal_heading">
         Εισάγετε τα στοιχεία σας:
         </span>
         <form action="loginformtest.php" method="post">
            <input type="email" name="onomaxrhsth" placeholder="Email" required><br>
            <input type="text" name="kwdikos" placeholder="Password" required><br>
            <input type="text" name ="kinhto" placeholder="Mobile-Phone" required><br>
            <input type="submit" name="Register"  value="REGISTER">
          </form>


</body>

</html>
