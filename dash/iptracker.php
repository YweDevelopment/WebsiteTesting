<! --- PHP Buscar o nickname & a foto de perfil --->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include("../inc/config.php");
$msg = "";
$sessionname = session_name("auth");
session_set_cookie_params(0, '/', '.worelit.fun');
session_start();
if(!isset($_SESSION['username'])){
header("Location: https://auth.worelit.fun/");
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
<title>globalSkids - IP TRACKER</title>
<link rel="stylesheet" type="text/css" href="./assets/stylesheets/style.css">
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
<li><a style=color:white href="./index.php" class="db-ico-dashboard">Bins Checker</a></li>
<li><a style=color:white href="./ibangen.php" class="db-ico-dashboard">IBAN Gen</a></li>
<li><a style=color:white href="./nifgen.php" class="db-ico-dashboard">NIF Gen</a></li>
<li><a style=color:white href="./ccgen.php" class="db-ico-course">Card GEN</a></li>
<li><a style=color:white href="./ccheck.php" class="db-ico-course">Card Checker</a></li>
<li><a style=color:white href="./SteamGen.php" class="db-ico-course">Steam Gen</a></li>
<li><a style=color:white href="./phonelookup" class="db-ico-exam">Phone Lookup</a></li>
<li><a style=color:white href="./personlookup" class="db-ico-qa">Person Lookup</a></li>
<li><a style=color:white href="./dclookup" class="db-ico-qa">DC Lookup</a></li>
<li><a style=color:white href="./emailookup" class="db-ico-qa">Email Lookup</a></li>
<li><a style=color:#420000 href="./iptracker.php" class="db-ico-news">IP Tracker</a></li>
</center>
</ul>
</nav>
</aside>

<! --- IP Tracker HTML & System --->

<body style="background-color:rgb(6,6,6)">


<center><div class="card" style="width:100rem;">
<br><br><br><br><br><br><br><br><br><br>
<center><h5 style=color:#420000 class="card-header"></h5></center><br>

<div class="card-body" >
<center><h5 style=color:white class="card-title">IP TRACKER - PUT IP ADRESS IN THE BOX</h5></center><br>
<br>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->

    <link href="IpTrackerAssets/css/style.css" rel="stylesheet" />

</head>
<body>
<div class="container">
<div class="form">
<input
type="text"
placeholder="Seach for any IP address or domain"
id="input"/>
<button type="submit" id="submit">
<img src="images/icon-arrow.svg" alt="" srcset="" />
</button>
</div>
<div id="info">
<div class="one">
<p style=color:#420000>IP ADDRESS</p>
<h4 style=color:white class="ip" name="ip">Loading...</h4>
</div>
<div class="two">
<p style=color:#420000>LOCATION</p>
<h4 style=color:white class="location" name="location">Loading...</h4>
</div>
<div class="three">
<p style=color:#420000>TIMEZONE</p>
<h4 style=color:white class="time">Loading...</h4>
</div>
<div class="four">
<p style=color:#420000>ISP</p>
<h4 style=color:white class="isp">Loading...</h4>
</div></div></div>
  
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="map"></div>
<script defer src="IpTrackerAssets/app.js"></script>
<script
src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin="">
</script>
</body>
</html>




</body>
</html>