<?php
if (isset($_POST['id'])){
$id = $_POST['id'];

$query = mysqli_query($conn, "SELECT * FROM accounts WHERE id='$id'");
$fetch = mysqli_fetch_array($query);

$isexist = mysqli_num_rows($query);
if($isexist==1) {
$username = $fetch['username'];
$in_server = $fetch['in_server'];
delete_account($username, $in_server);
echo "<script>$('#delete-account-button').html('Borrar cuenta'');$('#delete-account-button').attr('disabled', false);</script> <div id='delete-account-notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Exito!</h4>
                    cuenta eliminada con éxito.
                  </div></div>";
} else {
echo "<script>$('#delete-account-button').html('Borrar cuenta'');$('#delete-account-button').attr('disabled', false);</script> <div id='delete-account-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al eliminar la cuenta!</h4>
                    Esta cuenta no existe en la base de datos.
                  </div></div>";
} 
} else {
echo "<script>$('#delete-account-button').html('Cambia la contraseña');$('#delete-account-button').attr('disabled', false);</script> <div id='delete-account-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al eliminar la cuenta!</h4>
                    Introduzca el ID de la cuenta que desea eliminar.
                  </div></div>";
}

?>