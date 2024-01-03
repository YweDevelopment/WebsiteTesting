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
<title>globalSkids - iban gen</title>
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
<li><a style=color:#420000 href="./ibangen.php" class="db-ico-dashboard">IBAN Gen</a></li>
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

<! --- Credit Card Generator System --->

<body style="background-color:rgb(6,6,6)">
	<br><br><br><br><br><br><br><br>



<center><div class="card" style="width:100rem;">
<center><h5 style=color:#420000 class="card-header"></h5></center><br>

<div class="card-body" >
<center><h5 style=color:white class="card-title">IBAN GEN - CHOOSE THE TYPE YOU WANT!</h5></center><br>
    <head>
    <title>Gerar IBAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">

	<script language="javascript">
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

		function padNumber(n){
			return n > 9 ? "" + n: "0" + n;
		}

        function getCheckDigit(value) {

            const nib = value.toString();

            var result = 0;

            for (var nibIndex = 0; nibIndex < 19; nibIndex++) {

                var digit = parseInt(nib[nibIndex]);

                result = (result + digit) * 10 % 97;
            }

            result = 98 - ((result * 10) % 97);

            return padNumber(result);

        }

        function getIban(prefix) {

            var min = 100000000000000;
            var max = 999999999999999;

			var random = prefix + getRandomInt(min, max).toString();

            var checkDigit = getCheckDigit(random.toString());

            var nib = random.toString() + checkDigit.toString();

            document.getElementById("iban").value = "PT50" + nib;

            return;
        }

        function genIBAN() {
            var e = document.getElementById("bank");

            getIban(e.options[e.selectedIndex].value);
        }
		
		genIBAN(); 
	</script>
    </head>
    <body> 
        <br><center><div class="card" style="width:100rem;">
            <div class="card-body" >
              <input type="text" class="form-control" id="iban" name="iban" style="width:50rem;" placeholder="The generated IBAN will appear here..." readonly>
			  <br>
			  <select class="form-control" style="width: 25%;" id="bank" onchange="genIBAN()">
				<option value="0007">0007 - Novo Banco</option>
				<option value="0010">0010 - BPI</option>
				<option value="0018">0018 - Santander Totta</option>
				<option value="0019">0019 - BBVA</option>
				<option value="0023">0023 - Activo Bank</option>
				<option value="0025">0025 - Caixa BI</option>
				<option value="0032">0032 - Barclays</option>
				<option value="0033">0033 - Millennium BCP</option>
				<option value="0034">0034 - BNP Paribas</option>
				<option value="0035">0035 - Caixa Geral de Depósitos</option>
				<option value="0036">0036 - Montepio Geral</option>
				<option value="0038">0038 - Banif</option>
				<option value="0043">0043 - Deutsche Bank</option>
				<option value="0045" selected>0045 - Crédito Agrícola (moey!)</option>
				<option value="0046">0046 - Banco Popular</option>
				<option value="0059">0059 - Caixa Económica da Misericórdia de Angra do Heroísmo</option>
				<option value="0061">0061 - Banco BIG</option>
				<option value="0065">0065 - Banco Best</option>
				<option value="0079">0079 - BIC</option>
				<option value="0193">0193 - Banco CTT</option>
				<option value="0235">0235 - Banco Carregosa</option>
				<option value="0269">0269 - Bankinter</option>
				<option value="0781">0781 - Direcção Geral do Tesouro</option>
				<option value="5180">5180 - Caixa Central de Crédito Agrícola Mútuo</option>
			</select>
			<br>
              <br><center><button type="button" class="btn btn-warning" onclick="genIBAN()">Gen IBAN</button></center>
            </div> 
          </div></center>
    </body>


</body>
</html>