<?php
if(!isset($_POST['username'])||!isset($_POST['id'])): die(); endif;
foreach($_POST as $key=>$val) {
  $_POST[$key] = chkString($val, array(''));
}

$username = mysqli_real_escape_string($conn, $usernamePrefix.$_POST['username']);
$server = mysqli_real_escape_string($conn, $_POST['id']);

if ((empty($username))||(empty($server)))
{

  echo "<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Error!</h4>
                    Please complete all the form.
                  </div></div>";

             } else {
$q = mysqli_query($conn, "SELECT * FROM servers WHERE id='$server' AND `type`='ssh' OR `type`='extra' OR `type`='one-month'");
if(!$q) {
    exit("<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Error!</h4>
                    Please choose a valid server to continue.
                  </div></div>");
} else {
  $m = mysqli_query($conn, "SELECT * FROM accounts WHERE in_server='$server' AND username='$username'");
  $p = mysqli_num_rows($m);
  if($p<1) {
     exit("<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Error!</h4>
                    Account not found on selected server.
                  </div></div>");
  }  else { 
  $f = mysqli_fetch_array($m);
  if($f['status']==1) {
echo "<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                   This account is expired on  ".$f['date_expired'].".
                  </div></div>";
                } else {
            echo "<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                   This account was already expired on  ".$f['date_expired'].".
                  </div></div>";
                }
               
               }
                    }
}
?>