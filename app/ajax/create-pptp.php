<?php
$vpn = 0;
$errorText = '';
$errorMsg = "<script>$('#createnow').html('Create Now');$('#createnow').attr('disabled', false);document.getElementById( 'dimspanel' ).style.height = '500px';grecaptcha.reset();</script> <div id='notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Error!</h4>
                    ~ALERT_TEXT~
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
if(trim($_POST['username'])=='stunnel4') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='backup') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='backup') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='proxy') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='irc') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='list') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='man') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='_apt') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='syslog') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='lxd') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='messagebus') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='uuidd') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='news') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='systemd-bus-proxy') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='systemd-timesync') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='systemd-resolve') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='gnats') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
if(trim($_POST['username'])=='dnsmasq') {
  $errorText = 'User name registration disabled by Admin.';
  die(showAlert($errorMsg, $errorText));
}
//if(settings('get', 'block_kontol_username')=="y") {
if(trim($_POST['username'])=='kontol') {
  $errorText = 'User Name "kontol" Di Larang By Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_memek_username')=="y") {
if(trim($_POST['username'])=='memek') {
  $errorText = 'User Name "memek" Di Larang By Admin.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_bin_username')=="y") {
if(trim($_POST['username'])=='bin') {
  $errorText = 'User Name "bin" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_daemonn_username')=="y") {
if(trim($_POST['username'])=='daemon') {
  $errorText = 'User Name "daemon" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_adm_username')=="y") {
if(trim($_POST['username'])=='adm') {
  $errorText = 'User Name "adm" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_lp_username')=="y") {
if(trim($_POST['username'])=='lp') {
  $errorText = 'User Name "lp" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_sync_username')=="y") {
if(trim($_POST['username'])=='sync') {
  $errorText = 'User Name "sync" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_shutdown_username')=="y") {
if(trim($_POST['username'])=='shutdown') {
  $errorText = 'User Name "shutdown" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_halt_username')=="y") {
if(trim($_POST['username'])=='halt') {
  $errorText = 'User Name "halt" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_mail_username')=="y") {
if(trim($_POST['username'])=='mail') {
  $errorText = 'User Name "mail" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_uucp_username')=="y") {
if(trim($_POST['username'])=='uucp') {
  $errorText = 'User Name "uucp" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_operator_username')=="y") {
if(trim($_POST['username'])=='operator') {
  $errorText = 'User Name "operator" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_games_username')=="y") {
if(trim($_POST['username'])=='games') {
  $errorText = 'User Name "games" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_gopher_username')=="y") {
if(trim($_POST['username'])=='gopher') {
  $errorText = 'User Name "gopher" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_ftp_username')=="y") {
if(trim($_POST['username'])=='ftp') {
  $errorText = 'User Name "ftp" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nobody_username')=="y") {
if(trim($_POST['username'])=='nobody') {
  $errorText = 'User Name "nobody" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nobody_username')=="y") {
if(trim($_POST['username'])=='systemd-network') {
  $errorText = 'User Name "systemd-network" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nobody_username')=="y") {
if(trim($_POST['username'])=='dbus') {
  $errorText = 'User Name "dbus" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nobody_username')=="y") {
if(trim($_POST['username'])=='polkitd') {
  $errorText = 'User Name "polkitd" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nobody_username')=="y") {
if(trim($_POST['username'])=='chrony') {
  $errorText = 'User Name "chrony" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nobody_username')=="y") {
if(trim($_POST['username'])=='tss') {
  $errorText = 'User Name "tss" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_vcsa_username')=="y") {
if(trim($_POST['username'])=='vcsa') {
  $errorText = 'User Name "vcsa" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_saslauth_username')=="y") {
if(trim($_POST['username'])=='saslauth') {
  $errorText = 'User Name "saslauth" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_postfix_username')=="y") {
if(trim($_POST['username'])=='postfix') {
  $errorText = 'User Name "postfix" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_sshd_username')=="y") {
if(trim($_POST['username'])=='sshd') {
  $errorText = 'User Name "sshd" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_nginx_username')=="y") {
if(trim($_POST['username'])=='nginx') {
  $errorText = 'User Name "nginx" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_apache_username')=="y") {
if(trim($_POST['username'])=='apache') {
  $errorText = 'User Name "apache" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_openvpn_username')=="y") {
if(trim($_POST['username'])=='openvpn') {
  $errorText = 'User Name "openvpn" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_vnstat_username')=="y") {
if(trim($_POST['username'])=='vnstat') {
  $errorText = 'User Name "vnstat" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_sslh_username')=="y") {
if(trim($_POST['username'])=='sslh') {
  $errorText = 'User Name "sslh" Blocked.';
  die(showAlert($errorMsg, $errorText));
}

//if(settings('get', 'block_squid_username')=="y") {
if(trim($_POST['username'])=='squid') {
  $errorText = 'User Name "squid" Blocked.';
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

if(!isset($_POST["g-recaptcha-response"])||!isset($_POST['username'])||!isset($_POST['password'])||!isset($_POST['id'])) {
  $errorText = 'Please complete all the form.';
  die(showAlert($errorMsg, $errorText));
}elseif(empty($_POST["g-recaptcha-response"])) {
  $errorText = 'Please fill the captcha form.';
  die(showAlert($errorMsg, $errorText));
} elseif(empty($_POST["username"])||empty($_POST["password"])||empty($_POST['id'])) {
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
  $errorText = 'Server full, please wait for reset time on 22:00 & 10:00 (GMT +7).';
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
  if($vpn):
    $successText ="
    Host : ".$serverData->host."<br/>
    User : ".$username."<br/>
    Pass : ".$password."<br/>
    IPsec PSK : jagoanssh.com<br/>
    Exp  : ".$exp."<br/>";
  else:
    $successText ="
    Host : ".$serverData->host."<br/>
    User : ".$username."<br/>
    Pass : ".$password."<br/>
    IPsec PSK : jagoanssh.com<br/>
    Exp  : ".$exp."<br/>";
  endif;
  die(showAlert($successMsg, $successText));
  else:
    $errorText = 'Server Offline.';
    die(showAlert($errorMsg, $errorText));
  endif;
endif;
?>