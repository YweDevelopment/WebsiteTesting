<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include("../inc/config.php");
$msg = "";
$sessionname = session_name("auth");
session_set_cookie_params(0, '/', '');
session_start();
if(isset($_GET['error'])){
$error = mysqli_real_escape_string($conn, strip_tags($_GET['error']));
if($error == 1001) {
$msg = "<br><p style='color:#fff'>❌ Ocorreu um erro ao efetuar a autenticação via Discord, certifique-se que associou a sua conta de Discord ao nosso Website.</p>";
} else if($error == 1002) {
$msg = "<br><p style='color:#fff'>❌ Esse pedido de recuperação de Password já expirou ou encontra-se invalido.</p>";
}
}
if(isset($_POST['submit_login'])){
 function post_captcha($user_response) {
$fields_string = '';
$fields = array(
'secret' => '6LfwzG4iAAAAADoXhz6qQoPdjQb1gO7mhPaz-7Ap',
'response' => $user_response
);
foreach($fields as $key=>$value)
$fields_string .= $key . '=' . $value . '&';
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
$result = curl_exec($ch);
curl_close($ch);
return json_decode($result, true);
}
{
			// Se o captcha for bem sucedido

$username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
$password = mysqli_real_escape_string($conn, strip_tags($_POST['password'])); 
$password_converter = hash("sha512", $password);
$sql = "SELECT * from users WHERE username = '".$username."' AND password ='".$password_converter."' limit 1";    
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
$_SESSION["username"] = $username;
$_SESSION['loginvia'] = "Email";
$msg = "<br><p style='color:#fff'>✅ You logged in, redirecting 🌀</p>";
sleep(5);
echo "<script>window.location.href = '../dash/index.php';</script>";
} else {
$msg = "<br><p style='color:#fff'>❌ The data entered is wrong.</p>";
}}}
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../images/logo.jpg" rel="icon">
<link href="../images/logo.jpg" rel="shortcut icon">

<title>globalSkids - Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./assets/css2" rel="stylesheet">
<link rel="stylesheet" href="./assets/bootstrap.css">
<link rel="stylesheet" href="./assets/layout.css">
<link rel="icon" type="image/x-icon" href="/assets/worelit.ico">

<script>
function onSubmit(token) {
document.getElementById("login-form").submit();
}
</script>
</head>
<body>

<div class="row h-100 mx-0">
<div class="container login-container border my-auto">
<form id='login-form' method="POST" action="">
<div class="form-group row auth-item">
<label for="username">Login</label>
<input type="text" class="form-control" name="username" id="username" placeholder="" data-val="true" data-val-required="The Login field is required." value="">
</div>
<div class="form-group row auth-item">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" id="password" placeholder="" data-val="true" data-val-required="The Password field is required.">
</div>

<div class="form-group row auth-item">
<input type="hidden" name="submit_login" id="submit_login" value="submit_login"></div>
<div class="form-group row auth-item">
<div class="btn-group" role="group">
<button data-sitekey="6LfwzG4iAAAAAI8zFD6H7IwbDB8ov6_PRB_qDFvQ" data-callback="onSubmit" data-action='submit' name="submit_login" class="btn btn-primary g-recaptcha" style="margin-top: 10px">Login</button>
</div>
<small id="loginHelp" class="form-text text-muted">Don't have an account? <a href="./register.php" class="text-muted link-secondary">Sign up.</a></small>
</div>
</form>
<?php echo $msg; ?>
</div>
</div>


<script src="./assets/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script src="./assets/site.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<div aria-hidden="true" style="background-color: rgb(255, 255, 255); border: 1px solid rgb(215, 215, 215); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 4px; border-radius: 4px; left: -10000px; top: -10000px; z-index: -2147483648; position: absolute; transition: opacity 0.15s ease-out 0s; opacity: 0; visibility: hidden;"><div style="position: relative; z-index: 1;"><iframe src="./assets/hcaptcha(1).html" title="Main content of the hCaptcha challenge" frameborder="0" scrolling="no" style="border: 0px; z-index: 2000000000; position: relative;"></iframe></div><div style="width: 100%; height: 100%; position: fixed; pointer-events: none; top: 0px; left: 0px; z-index: 0; background-color: rgb(255, 255, 255); opacity: 0.05;"></div><div style="border-width: 11px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 1; right: 100%;"><div style="border-width: 10px; border-style: solid; border-color: transparent rgb(255, 255, 255) transparent transparent; position: relative; top: 10px; z-index: 1;"></div><div style="border-width: 11px; border-style: solid; border-color: transparent rgb(215, 215, 215) transparent transparent; position: relative; top: -11px; z-index: 0;"></div></div></div></body></html>