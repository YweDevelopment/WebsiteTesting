<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include("./assets/config.php");
$msg = "";

$sessionname = session_name("auth");
session_set_cookie_params(0, '/', '.localhost');
session_start();

if(!isset($_SESSION['username'])){
  header("Location: https://localhost/");
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '". $username ."'"; 
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()) {
    $avatar = $row['avatar'];
	$email = $row['email'];
	$hasperms = $row['hasperms'];
	$userid = $row['id'];
}

if($hasperms == 0) {
	header("Location: https://localhost/");
}

$invcode = "";

## Invites

if(isset($_POST['geninv'])) {
	function generateRandomString($length = 27) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	$invcode = generateRandomString();

	$sql = "INSERT INTO `invites` (code, createdby) VALUES ('$invcode', $userid)";    
	$result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="./img/lock.ico" rel="icon">
<link href="./img/lock.ico" rel="shortcut icon">
<link href="./assets/css" rel="stylesheet" type="text/css">
<link href="./assets/style.css" rel="stylesheet" type="text/css">
<link href="./assets/bootstrap.min.css" rel="stylesheet" type="text/css">
<body style=background-color:rgb(6,6,6)>

<title>globalSkids - Home</title>

<div class="divide"></div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="container" id="jumbo-container">
<div class="jumbotron" id="jumbo">
<div id="header" data-sr="enter bottom and scale up 50% over 1s no reset" data-sr-id="1"; visibility: visible;  -webkit-transform: translateY(0) scale(1); opacity: 1;transform: translateY(0) scale(1); opacity: 1;-webkit-transition: -webkit-transform 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 1s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; ">
<div id="title">

<center><h1 style=color:white></h1></center>
<center><h3 style=color:white >who are you nn?</h3></center></div></div><br>
<center><div style=color:white id="globalSkids-buttons"><p>

</ul>
<?php echo "Invite Code: <b>" . $invcode . "</b>"; ?>
<form action="" method="POST">
<button type="submit" class="btn btn-lg btn-block btn-primary" name="geninv" style=color:white >GENERATE</button></p></center></div></div></div>

<script>
window.sr = ScrollReveal();
sr.reveal('#header', {
duration: 1000,
delay: 0,
scale: 0.5});
</script>

</body></html>