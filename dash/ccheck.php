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
<title>globalSkids - card checker</title>
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
<li><a style=color:white href="./index.php" class="db-ico-dashboard">Bins Checker</a></li>
<li><a style=color:white href="./ibangen.php" class="db-ico-dashboard">IBAN Gen</a></li>
<li><a style=color:white href="./nifgen.php" class="db-ico-dashboard">NIF Gen</a></li>
<li><a style=color:white href="./ccgen.php" class="db-ico-course">Card GEN</a></li>
<li><a style=color:#420000 href="./ccheck.php" class="db-ico-course">Card Checker</a></li>
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

<! --- Credit Card Generator System --->

<body style="background-color:rgb(6,6,6)">
	<br><br><br><br><br><br><br><br>



<center><div class="card" style="width:100rem;">
<center><h5 style=color:#420000 class="card-header"></h5></center><br>

<div class="card-body" >
<center><h5 style=color:white class="card-title">CARD GENERATOR - PUT THE INFOS IN THE BOXES</h5></center><br>
<br>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./assets/stylesheets/index.css" />
    <script
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div id="root">
      <div id="checker">

        <textarea
          id="card-credit-list"
          placeholder="Paste your credit card list here"
        ></textarea>
        <button id="start-button">Start</button>
        <br />
        <div id="results" style="display: none"></div>
      </div>
    </div>
    <script src="./assets/scripts/check.bundle.js"></script>
  </body>
</html>


</body>
</html>