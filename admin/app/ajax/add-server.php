<?php
if (isset($_POST['location'])){
foreach($_POST as $key => $val) {
  if(is_array($_POST[$key])): continue; endif;
  $_POST[$key] = chkString($val);
}
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
$vpnport = $_POST['vpnport'];
$config = $_POST['config'];
$squid = $_POST['squid'];
$activefor = $_POST['activefor'];
$type= $_POST['type'];
$port = $_POST['port'];

$query = mysqli_query($conn, "SELECT * FROM `servers` WHERE `description`='$description'");
$isexist = mysqli_num_rows($query);
if($isexist==1) {
echo "<script>$('#add-server-button').html('Submit');$('#add-server-button').attr('disabled', false);</script> <div id='add-server-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al añadir esta cuenta!</h4>
                    Ya existe un servidor con la misma descripción en la base de datos..
                  </div></div>";
} else {
if ((empty($location))||(empty($username))||(empty($password))||(empty($type))||(empty($host))||(empty($limit))||(empty($dropbear))||(empty($openssh))||(empty($port))||(empty($os))||(empty($max_login))||(empty($activefor)))
{
echo "<script>$('#add-server-button').html('Submit');$('#add-server-button').attr('disabled', false);</script> <div id='add-server-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al guardar!</h4>
                    Por favor ingrese el formulario correctamente.
                  </div></div>";
          } else {
$vpnport = chkString(json_encode($vpnport));
$config = chkString(json_encode($config));
if(empty($squid)): $squid = ''; endif;
$hashed_password = crypt_password('crypt', $password);
mysqli_query($conn, "INSERT INTO servers VALUES (DEFAULT, '$os', '$location', '$description', '$username', '$hashed_password', '$host', '$activefor', '$limit', '$max_login', '$dropbear' ,'$openssh','$ssl','$squid','$type','$port','$config','$vpnport')");

echo "<script>$('#add-server-button').html('Submit');$('#add-server-button').attr('disabled', false);</script> <div id='add-server-form-notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Exito!</h4>
                   Servidor nuevo agregado con exito.
                  </div></div>";
    }     
} 
} else {
echo "<script>$('#add-server-button').html('Submit');$('#add-server-button').attr('disabled', false);</script> <div id='add-server-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al guardar!</h4>
                    Por favor ingrese el formulario correctamente.
                  </div></div>";
}

?>