<?php
$vpn = 0;
$errorText = '';
$errorMsg = "<script>$('#createnow').html('Create Now');$('#createnow').attr('disabled', false);document.getElementById( 'dimspanel' ).style.height = '500px';grecaptcha.reset();</script> <div id='notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Error!</h4>
                    ~ALERT_TEXT~.
                  </div></div><script>window.location.hash = '#notif';</script>";
$successMsg = "<script>$('#createnow').html('Create Now');$('#createnow').attr('disabled', false);$('#dimaspanel').hide();document.getElementById( 'dimspanel' ).style.height = '320px';</script> <div id='notif'><div class='alert alert-success alert-dismissable'>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    ~ALERT_TEXT~.
                  </div></div><script>window.location.hash = '#notif';</script>";
$last_submit = isset($_SESSION['last_submit']) ? $_SESSION['last_submit'] : $_POST['last_submit'];

if (isset($last_submit) && time()-$last_submit < 300){
  $errorText = 'Please wait 5 minutes, to create new account again';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_root_username')=="y") {
if(trim($_POST['username'])=='root') {
  $errorText = 'User "root" registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_kontol_username')=="y") {
if(trim($_POST['username'])=='kontol') {
  $errorText = 'User Name "kontol" Di Larang By Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_memek_username')=="y") {
if(trim($_POST['username'])=='memek') {
  $errorText = 'User Name Di Larang By Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_tai_username')=="y") {
if(trim($_POST['username'])=='tai') {
  $errorText = 'User Name "tai" Di Larang By Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_jucky_username')=="y") {
if(trim($_POST['username'])=='jucky') {
  $errorText = 'Dilarang Menggunakan Nama "jucky" Mbah.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_jagoanssh_username')=="y") {
if(trim($_POST['username'])=='jagoanssh') {
  $errorText = 'Dilarang Menggunakan Nama "jagoanssh" Mbah.';
  die(showAlert($errorMsg, $errorText));
}

if(!isset($_POST["g-recaptcha-response"])||!isset($_POST['username'])||!isset($_POST['id'])) {
  $errorText = 'Please complete all the form.';
  die(showAlert($errorMsg, $errorText));
}elseif(empty($_POST["g-recaptcha-response"])) {
  $errorText = 'Please fill the captcha form.';
  die(showAlert($errorMsg, $errorText));
} elseif(empty($_POST["username"])||empty($_POST['id'])) {
  $errorText = 'Please complete all the form';
  die(showAlert($errorMsg, $errorText));
}

if(!showCaptcha('secret', $_POST)):
  $errorText = 'Wrong Captcha. Please try again.';
  die(showAlert($errorMsg, $errorText));
endif;

$username = $usernamePrefix . chkString($_POST['username'], 1);
$password = str_replace("'", '"', $_POST['password']);
$server = chkString($_POST['id'], 1);
if($vpn):
  $serverData = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `servers` WHERE `id`='$server'"));
else:
  $serverData = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `servers` WHERE `id`='$server'"));
endif;
if(!$serverData): 
  $errorText = 'Please choose a valid server to continue.';
  die(showAlert($errorMsg, $errorText));
endif;

$s = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `accounts` WHERE `in_server`='$serverData->id' AND `date_created`>='$currentReset'"));
if($s>=$serverData->accounts_limit):
  $errorText = 'Server full, reset time on 22:00 GMT +7.';
  die(showAlert($errorMsg, $errorText));
endif;

$type = $serverData->type;
if($type=='vpnssh'||$type=='vpn'): $vpn = 1; else: $vpn = 0; endif;
$datenow = date('Y-m-d');
if($vpn):
  $s = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `accounts` WHERE `username`='$username' AND DATE(`date_created`)='$datenow'"));  
else:
  $s = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `accounts` WHERE `username`='$username' AND DATE(`date_created`)='$datenow'"));  
endif;

if($s):
  $errorText = 'Username already used / Username Sudah Di Pakai Silahkan Gunakan Username Yang Lain Dan Unik.';
  die(showAlert($errorMsg, $errorText));
else: 
  $s = add_account($username, $password, $server);
  if($s):
  $accountId = $s;
  $ss = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `accounts` WHERE `id`='$accountId'")); 
  $exp = date('d-m-Y',strtotime($ss->date_expired));
  $qrcode = ("http://".$serverData->host."/".$username."/".$username.".png");
  $img = "150";
  $hig= "30";
  $link = ("http:///".$serverData->host."/".$username."/".$username.".conf");
  $save =("https://jagoanssh.com/negara/saveaccount.png");
  $imageData = base64_encode(file_get_contents($qrcode));
  $imgbase = "data:image/jpeg;base64,$imageData";
  $bb ="btn-block";
  $bs="btn-primary";
  $bt ="btn";
  $bl="_blank";
  if($vpn):
    $successText ="
    Host : ".$serverData->host."<br/>
    User : ".$username."<br/>
    Exp  : 7 Days<br/>
    <b>Wildcard Domain</b><p>
    <b>Example: bug.com.".$serverData->host."</b><br/>
    <center><img src=".$qrcode." width=".$img." height=".$img."></center><br/>
    <center><a href=".$link."><img src=".$save." height=".$hig." weight=".$hig." ></a></center>";
  else:
    $successText ="
    Host : ".$serverData->host."<br/>
    User : ".$username."<br/>
    Exp  : 7 Days <br/>
    <b>Wildcard Domain</b><p>
    <b>Example: bug.com.".$serverData->host."</b><br/>
    <center><img src=".$imgbase." width=".$img." height=".$img."></center><br/>
    <center><a href=golink.php?id=".base64_encode($link)."><img src=".$save." height=".$hig." weight=".$hig." ></a></center>";
  endif;
  die(showAlert($successMsg, $successText));
  else:
    $errorText = 'Server Offline.';
    die(showAlert($errorMsg, $errorText));
  endif;
endif;
?>