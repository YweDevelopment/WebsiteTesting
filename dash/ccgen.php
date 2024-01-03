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
<title>globalSkids - card gen</title>
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
<li><a style=color:#420000 href="./ccgen.php" class="db-ico-course">Card GEN</a></li>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>xM4hmoud | CC Gen</title>
    <meta name="description" content="Reboot">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="https://cdn.sessionstack.com/sessionstack.js"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="xM4hmoud | CC Gen">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000">
    <meta name="application-name" content="xM4hmoud | CC Gen">
    <link rel="stylesheet" href="assets/css/WOP.css">
 
  <!-- Don't Touch -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178193698-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-178193698-1');
</script>
</head>
<body>
    <div id="app">
        <nav class="navigations">
</nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form-generator></form-generator>
                </div>
                <div class="col-md-6">
                    <generated-credit-cards></generated-credit-cards>
                    <button type="submit" class="btn btn-primary btn-block" onclick="copy()">Copy Cards</button>
                </div>
            </div>
            <input type="hidden" name="IL_IN_ARTICLE">
            <input type="hidden" name="IL_IN_TAG" value="2">

        </div>
<script src="assets/js/main.js"></script>
<script>
function copy(){
    document.querySelector("textarea").select();
    document.execCommand('copy');
}
</script>
</body>
</html>



</body>
</html>