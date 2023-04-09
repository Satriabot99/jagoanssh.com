<?php
if (isset($_POST['username'])){
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$server = mysqli_real_escape_string($conn, $_POST['server']);

$f = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM servers WHERE id='$server'"));

if($f['type']==3) {
$query = mysqli_query($conn, "SELECT * FROM accounts WHERE username='$username' AND in_server='$server' AND isvpn='y'");
} else {
$query = mysqli_query($conn, "SELECT * FROM accounts WHERE username='$username' AND in_server='$server' AND isvpn='n'");
}
$isexist = mysqli_num_rows($query);

if($isexist==1) {
echo "<script>$('#add-account-button').html('Submit');$('#add-account-button').attr('disabled', false);</script> <div id='add-account-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Ada Masalah!</h4>
                   Akun ini sudah ada dalam database.
                  </div></div>";
} else {
  if(empty($id)) {
  $id = 1;
  }
if ((empty($username)))
{
echo "<script>$('#add-account-button').html('Submit');$('#add-account-button').attr('disabled', false);</script> <div id='add-account-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Ada Masalah!</h4>
                    Tolong masukkan form dengan benar.
                  </div></div>";
				  } else {
            if($username=='root') {
              echo "Username Denied!";
            }
       add_account($username, $password, $server);
echo "<script>$('#add-account-button').html('Submit');$('#add-account-button').attr('disabled', false);</script> <div id='add-account-form-notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Berhasil!</h4>
                   Berhasil menambah akun baru.
                  </div></div>";

		}		  
} 
} else {
echo "<script>$('#add-account-button').html('Submit');$('#add-account-button').attr('disabled', false);</script> <div id='add-account-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Ada Masalah!</h4>
                    Tolong masukkan form dengan benar.
                  </div></div>";
}

?>