<! --- PHP Buscar o nickname & a foto de perfil --->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include("../inc/config.php");
$msg = "";
$sessionname = session_name("auth");
session_set_cookie_params(0, '/', '');
session_start();
if(!isset($_SESSION['username'])){
header("Location: ");
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '". $username ."'"; 
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()) {
$avatar = $row['avatar'];
$email = $row['email'];
$uid = $row['id'];
}
?>

<! --- HTML Para a NAVBAR --->

<!DOCTYPE html>
<html lang="en">
<link href="../images/logo.jpg" rel="icon">
<link href="../images/logo.jpg" rel="shortcut icon">
<head>
<title>globalSkids - bin checker</title>
<link rel="stylesheet" type="text/css" href="assets/stylesheets/style.css">
</head>

<body style="background-color:rgb(6,6,6)">
<aside class="db-sidebar">
<span class="db-avatar" width="50" height="50" ><img src="<?php echo $avatar;?>" alt="avatar" class="avatarimg"><?php echo $username;?>  / UID: <?php echo $uid;?></span>
<style>       
    hr{
        height: 1px;
        background-color: #420000;
        border: none;
    }
</style>
<hr>
<nav class="db-menu">

<ul>
<center>
<li><a style=color:#420000 href="./index.php" class="db-ico-dashboard">Bins Checker</a></li>
<li><a style=color:white href="./ibangen.php" class="db-ico-dashboard">IBAN Gen</a></li>
<li><a style=color:white href="./nifgen.php" class="db-ico-dashboard">NIF Gen</a></li>
<li><a style=color:white href="./ccgen.php" class="db-ico-course">Card GEN</a></li>
<li><a style=color:white href="./ccheck.php" class="db-ico-course">Card Checker</a></li>
<li><a style=color:white href="./SteamGen.php" class="db-ico-course">Steam Gen</a></li>
<li><a style=color:white href="./phonelookup" class="db-ico-exam">Phone Lookup</a></li>
<li><a style=color:white href="./personlookup" class="db-ico-qa">Person Lookup</a></li>
<li><a style=color:white href="./dclookup" class="db-ico-qa">DC Lookup</a></li>
<li><a style=color:white href="./emailookup" class="db-ico-qa">Email Lookup</a></li>
<li><a style=color:white href="./iptracker.php" class="db-ico-news">IP Tracker</a></li>
</center>
</ul>
</nav>
</aside>

<! --- BIN CHECKER SYSTEM // Sucessful--->

<body style="background-color:rgb(6,6,6)"><br><br><br><br><br><br><br><br>

<center><div class="card" style="width:100rem;">
<center><h5 style=color:#420000 class="card-header"></h5></center><br>

<div class="card-body" >
<center><h5 style=color:white class="card-title">BIN CHECKER - PUT THE BIN IN THE BOX</h5></center><br>
<br>

<?php
if(isset($_POST['checkBIN'])){
$bin = strip_tags($_POST['bin']);
$Api_url = "https://lookup.binlist.net/$bin";
$ch = curl_init();
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $Api_url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       	
$data = curl_exec($ch);
$responsecode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);    
$json = json_decode($data, true);
if($responsecode != 400) {
$type = ucfirst($json["type"]);
if($type != null) {
$brand = ucfirst($json["scheme"]);
$brandemoji = "<i class='fa-brands fa-cc-" . $json["scheme"] . "'></i>";
$level = $json["brand"];
$country = $json["country"]["name"];
$country_alpha = $json["country"]["alpha2"];
$countrycurrency = $json["country"]["currency"];
$bank = $json["bank"]["name"];
?>

<center><div style=color:white class="alert alert-success" style="width:80rem;" role="alert">got'em

<br>🔢 BIN: <?php echo $bin; ?>
<br>💳 BRAND: <?php echo $brandemoji . " " . $brand; ?>
<br>🧔🏿 TYPE: <?php echo $type; ?>
<br>👛 LEVEL: <?php echo $level; ?>
<br>🏦 BANK: <?php echo $bank; ?>
<br>💱 CURRENCY: <?php echo $countrycurrency; ?> 
<br>🏳️ COUNTRY: <?php echo $country; ?> (<?php echo $country_alpha; ?>)  
<br></center>
</div>

<! --- BIN CHECKER SYSTEM  // ERROR --->

<?php
} else {
?>
<div style=color:white class="alert alert-danger" style="width:80rem;" role="alert">
The BIN is invalid!
</div>
<?php
}} else {
?>
<div style=color:#060606 class="alert alert-danger" style="width:80rem;" role="alert">
The BIN is invalid!
</div>
<?php 
}}
?>
<form action="" method="POST">
<br><input type="text" class="form-control" id="bin" name="bin" style="width:50rem;" placeholder="PUT BIN HERE">
<br><br><center><button type="submit" name="checkBIN" class="btn btn-warning">CHECK BIN</button></form></center>
</div> 
</div></center>

</section>

</body>
</html>