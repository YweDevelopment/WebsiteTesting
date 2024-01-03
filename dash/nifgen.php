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
<title>globalSkids - nif gen</title>
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
<li><a style=color:#420000 href="./nifgen.php" class="db-ico-dashboard">NIF Gen</a></li>
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

<! --- Credit Card Generator System --->

<body style="background-color:rgb(6,6,6)">
	<br><br><br><br><br><br><br><br>



<center><div class="card" style="width:100rem;">
<center><h5 style=color:#420000 class="card-header"></h5></center><br>

<div class="card-body" >
<center><h5 style=color:white class="card-title">NIF GEN - CHOOSE THE TYPE YOU WANT!</h5></center><br>
<br>

<!DOCTYPE html>
    <html>
    <head>
    <title>Gerador de NIF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <body>
		<script language="javascript">
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function getNIF(prefix) {

            var min = 10000000;
            var max = 99999999;

			var random = getRandomInt(min, max);

            var nif = prefix.toString() + random.toString();

            document.getElementById("nif").value = nif;

            return;
        }

        function genNIF() {
            var e = document.getElementById("niftype");

            getNIF(e.options[e.selectedIndex].value);
        }
		
		genNIF(); 
	</script>
        <br><center><div class="card" style="width:100rem;">
            <div class="card-body" >
              <input type="text" class="form-control" id="nif" style="width:50rem;" placeholder="The generated NIF will appear here..." readonly>
			  <br>
			  <select class="form-control" style="width: 25%;" id="niftype" onchange="genNIF()">
				<option value="1">Pessoa Singular (1)</option>
				<option value="2" selected>Pessoa Singular (2)</option>
				<option value="3">Pessoa Singular (3)</option>
				<option value="5">Pessoa Coletiva (5)</option>
				<option value="6">Pessoa Coletiva Publica (6)</option>
				<option value="8">Empresário em nome individual (8)</option>
				<option value="9">Pessoa Coletiva irregular ou numero provisório (9)</option>
			</select>
			<br>
              <br><center><button type="button" class="btn btn-warning" onclick="genNIF()">GEN NIF</button></center>
            </div> 
          </div></center>
    </body>
    </html>


</body>
</html>