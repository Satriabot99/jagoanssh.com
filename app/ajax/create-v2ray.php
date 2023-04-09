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
                    ~ALERT_TEXT~
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

//if(settings('get', 'block_jucky_username')=="y") {
if(trim($_POST['username'])=='jucky') {
  $errorText = 'Username "jucky" Dilarang Oleh Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_memek_username')=="y") {
if(trim($_POST['username'])=='memek') {
  $errorText = 'Username Dilarang Oleh Admin.';
  die(showAlert($errorMsg, $errorText));
}


elseif(empty($_POST["g-recaptcha-response"])) {
  $errorText = 'Please fill the captcha form.';
  die(showAlert($errorMsg, $errorText));
}

if(!showCaptcha('secret', $_POST)):
  $errorText = 'Wrong Captcha. Please try again.';
  die(showAlert($errorMsg, $errorText));
endif;

$username = $usernamePrefix . chkString($_POST['username'], 1);
$password = $_POST['password'];
$sni = $_POST['sni'];
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
  $errorText = 'Server is full, please choose another server or wait until reset time.';
  die(showAlert($errorMsg, $errorText));
endif;

$type = $serverData->type;
if($type=='vpnssh'||$type=='vpn'): $vpn = 1; else: $vpn = 0; endif;
$datenow = date('Y-m-d');
if($vpn):
  $s = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `accounts` WHERE AND `in_server`='$server'"));  
else:
  $s = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `accounts` WHERE AND `in_server`='$server'"));  
endif;

if($s):
  $errorText = 'Username "root" not available / already used.';
  die(showAlert($errorMsg, $errorText));
else: 
  $s = add_account($username, $password, $server);
  if($s):
  $accountId = $s;
  $ss = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `accounts` WHERE `id`='$accountId'")); 
  $json = json_decode($serverData->openvpn_config);
  $uncode ='{"add": "'.$serverData->host.'", "host": "'.$sni.'", "aid": 0, "type": "", "path": "/JAGOANSSH/", "net": "ws", "ps": "'.$username.'-JAGOANSSH", "tls": "tls", "port": 443, "v": "2", "id": "'.$json->tcp.'"}';
  $nonetls = '{"tls": "none", "v": "2", "host": "'.$serverData->host.'", "type": "", "ps": "'.$username.'-JAGOANSSH", "port": 80, "net": "ws", "id": "'.$json->tcp.'", "path": "/JAGOANSSH/", "add": "'.$sni.'", "aid": 0}';
  $basekode = base64_encode($uncode);
  $basenon = base64_encode($nonetls);
  $t ="text";
  $qrcode = ("https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=vmess://".$basekode."");
  $imageData = base64_encode(file_get_contents($qrcode));
  $imgbase = "data:image/jpeg;base64,$imageData";
  $pilih ="pilih";
  $pilihh ="pilihh";
  $op ="opacity:0";
  $ob ="btn-primary";
  $oc ="copy_text()";
  $copyy ="copyy_text()";
  $exp = date('d-m-Y',strtotime($ss->date_expired));
  if($vpn):
    $successText ="
   Host : ".$serverData->host."<br/>
   User : ".$username."<br/>
   SNI Host: ".$sni."<br/>
    Type : Websocket<br/>
    TLS  : 443<br/>
    None TLS : 80<br/>
    Resset Every  : 7 Days<br/>
    <input type= ".$t."  value= vmess://".$basekode." id= ".$pilih." style= ".$op.">
    <center><button class=".$ob." onclick=".$oc.">Copy Account</button></center>
    <input type= ".$t."  value= vmess://".$basenon." id= ".$pilihh." style= ".$op.">
    <center><button class=".$ob." onclick=".$copyy.">Copy Account Non TLS</button></center></br>
    <center><img src=".$imgbase."></center>";
  else:
    $successText ="
    Host : ".$serverData->host."<br/>
    User : ".$username."<br/>
    SNI Host: ".$sni."<br/>
    Type : Websocket<br/>
    TLS  : 443<br/>
    None TLS : 80<br/>
    Resset Every  : 7 Days<br/>
    <input type= ".$t."  value= vmess://".$basekode." id= ".$pilih." style= ".$op.">
    <center><button class=".$ob." onclick=".$oc.">Copy Account TLS</button></center>
    <input type= ".$t."  value= vmess://".$basenon." id= ".$pilihh." style= ".$op.">
    <center><button class=".$ob." onclick=".$copyy.">Copy Account Non TLS</button></center></br>
    <center><img src=".$imgbase."></center>";
  endif;
  die(showAlert($successMsg, $successText));
  else:
    $errorText = 'An error occured when creating account, please contact support';
    die(showAlert($errorMsg, $errorText));
  endif;
endif;
?>