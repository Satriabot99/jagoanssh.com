<?php
if (isset($_POST['id'])){
foreach($_POST as $key => $val) {
  $_POST[$key] = chkString($val);
}
$id = $_POST['id'];
$action = $_POST['action'];
$location = $_POST['location'];
$description = $_POST['description'];
$os = $_POST['os'];
$username= $_POST['username'];
$password = $_POST['password'];
$host = $_POST['host'];
$limit = $_POST['limit'];
$max_login = $_POST['max_login'];
$dropbear = $_POST['dropbear'];
$openssh = $_POST['openssh'];
$ssl = $_POST['ssl'];
$squid = $_POST['squid'];
$activefor = $_POST['activefor'];
$type= $_POST['type'];
$port = $_POST['port'];

if ((empty($location))||(empty($username))||(empty($type))||(empty($host))||(empty($limit))||(empty($dropbear))||(empty($openssh))||(empty($port))||(empty($os))||(empty($max_login))||(empty($activefor)))
{
echo "<script>$('#edit-server-final-button').html('Submit');$('#edit-server-final-button').attr('disabled', false);</script> <div id='edit-server-final-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al guardar!</h4>
                    Por favor ingrese el formulario correctamente.
                  </div></div>";
          } else {
    if(!empty($password)) {
$hashed_password = crypt_password('crypt', $password);
mysqli_query($conn, "UPDATE `servers` SET location='$location', os='$os', root_username='$username', root_password='$hashed_password', host='$host', accounts_limit='$limit', max_login='$max_login', active_for = '$activefor', dropbear_port='$dropbear', ssl_port='$ssl', openssh_port='$openssh', squid_port='$squid', type='$type',description='$description', default_connection='$port' WHERE id='$id'");
} else {
$fetch_s= mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$id'"));
$pass = $fetch_s['root_password'];
mysqli_query($conn, "UPDATE `servers` SET location='$location', os='$os', root_username='$username', host='$host', accounts_limit='$limit', max_login='$max_login', active_for = '$activefor', dropbear_port='$dropbear', openssh_port='$openssh', squid_port='$squid', type='$type',description='$description', default_connection='$port' WHERE id='$id'");
}

echo "<script>$('#edit-server-final-button').html('Submit');$('#edit-server-final-button').attr('disabled', false);</script> <div id='edit-server-final-form-notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Exito!</h4>
                   Detalles del servidor cambiados con éxito.
                  </div></div>";
    }     
} else {
echo "<script>$('#edit-server-final-button').html('Submit');$('#edit-server-final-button').attr('disabled', false);</script> <div id='edit-server-final-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al guardar!</h4>
                    Por favor ingrese el formulario correctamente.
                  </div></div>";
}



?>