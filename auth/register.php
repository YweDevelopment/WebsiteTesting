<!--- Create Account PHP System --->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include("../inc/config.php");
$msg = "";
$sessionname = session_name("globalSkids");
session_set_cookie_params(0, '/', '');
session_start();
if(isset($_POST['submit_register'])){
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
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
$result = curl_exec($ch);
curl_close($ch);
return json_decode($result, true);
}{
$user_ip = $_SERVER['REMOTE_ADDR'];
$username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
$email = mysqli_real_escape_string($conn, strip_tags($_POST['email'])); 
$password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
$password1 = mysqli_real_escape_string($conn, strip_tags($_POST['confirmpassword']));
$invite_used = mysqli_real_escape_string($conn, strip_tags($_POST['invitecode']));
$password_converter = hash("sha512", $password);
$sql1 = "SELECT * FROM invites WHERE code = '".$invite_used."'";
$result1 = mysqli_query($conn, $sql1);
$inviteexists = mysqli_num_rows($result1);
if ($inviteexists >= 1) {
if ($password == $password1) {
$sql = "INSERT INTO `users` (username, email, password, avatar, ip, invite_used) VALUES ('$username', '$email', '$password_converter', 'https://avatar.oxro.io/avatar.svg?name=".$username."&length=1', '$user_ip', '$invite_used')";    
$result = mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM users WHERE username = '".$username."'";
$result2 = mysqli_query($conn, $sql2);
while($row = $result2->fetch_assoc()) {
$userid = $row["id"];
}
$sqlinvites = "UPDATE invites SET usedby = ".$userid.", used = 1 WHERE code = '".$invite_used."'";
$resultinvites = mysqli_query($conn, $sqlinvites);
if($result){
$_SESSION["username"] = $username;
$msg = "<br><p style='color:#fff'>✅ You're sucessfully registered... Redirecting... 🌀</p>";
sleep(2);
echo "<script>window.location.href = './login.php';</script>";
} else { 
$msg = "<br><p style='color:#fff'>❌ Username or email already registered.</p>";
}
} else {
$msg = "<br><p style='color:#fff'>❌ Passwords does not match.</p>";
}}}} 
?>

<!--- Page HTML --->

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../images/logo.jpg" rel="icon">
<link href="../images/logo.jpg" rel="shortcut icon">
<title>globalSkids - Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./assets/css2" rel="stylesheet">
<link rel="stylesheet" href="./assets/bootstrap.css">
<link rel="stylesheet" href="./assets/layout.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
function onSubmit(token) {
document.getElementById("register-form").submit();
}
</script></head><body>

<div class="row h-100 mx-0">
<div class="container reg-container border my-auto">
<form id='register-form' method="POST" action="">
<div class="form-group row auth-item">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
</div>
<div class="form-group row auth-item">
<label for="username">Login *</label>
<input type="text" class="form-control" id="username" placeholder="Username" data-val="true" data-val-required="The Login field is required." name="username" required>
</div>
<div class="form-group row auth-item">
<label for="password">Password *</label>
<input type="password" class="form-control" id="password" placeholder="Password" data-val="true" data-val-required="The Password field is required." name="password" required>
</div>
<div class="form-group row auth-item">
<label for="confirmpassword">Confirm Password *</label>
<input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" data-val="true" data-val-required="The Password Confirmation field is required." name="confirmpassword" required>
</div>
<div class="form-group row auth-item">
<label for="invitecode">Invite Code *</label>
<input type="text" class="form-control" id="invitecode" placeholder="Invite Code" data-val="true" data-val-required="The Invite Code field is required." name="invitecode" required>
</div>
<div class="form-group row auth-item">
<div class="btn-group" role="group">
<input type="hidden" name="submit_register" id="submit_register" value="submit_register">
<button data-sitekey="6LfwzG4iAAAAAI8zFD6H7IwbDB8ov6_PRB_qDFvQ" data-callback="onSubmit" data-action='submit' name="submit_register" class="btn btn-primary" style="margin-top: 10px" data-original-title="By clicking register, you agree to our terms of service">Register</button>
</div>
<small id="loginHelp" class="form-text text-muted mx-auto">Already registered? <a href="./login.php" class="text-muted link-secondary">Sign in.</a></small>
</div>
</form>
<?php echo $msg; ?>
</div></div>

<!--- Scripts --->

<script src="./assets/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script src="./assets/site.js"></script>

<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();});
</script>

<div aria-hidden="true" style="background-color: rgb(255, 255, 255); border: 1px solid rgb(215, 215, 215); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 4px; border-radius: 4px; left: -10000px; top: -10000px; z-index: -2147483648; position: absolute; transition: opacity 0.15s ease-out 0s; opacity: 0; visibility: hidden;"><div style="position: relative; z-index: 1;"><iframe src="./assets/hcaptcha(1).html" title="Main content of the hCaptcha challenge" frameborder="0" scrolling="no" style="border: 0px; z-index: 2000000000; position: relative;"></iframe></div><div style="width: 100%; height: 100%; position: fixed; pointer-events: none; top: 0px; left: 0px; z-index: 0; background-color: rgb(255, 255, 255); opacity: 0.05;"></div><div style="border-width: 11px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 1; right: 100%;"><div style="border-width: 10px; border-style: solid; border-color: transparent rgb(255, 255, 255) transparent transparent; position: relative; top: 10px; z-index: 1;"></div><div style="border-width: 11px; border-style: solid; border-color: transparent rgb(215, 215, 215) transparent transparent; position: relative; top: -11px; z-index: 0;"></div></div></div></body></html>