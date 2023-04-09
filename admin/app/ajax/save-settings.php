<?php
if (isset($_POST['company_name'])){
foreach($_POST as $key => $val) {
  $_POST[$key] = chkString($val);
}
$company_name = $_POST['company_name'];
$maintance_mode = $_POST['maintance_mode'];
$toggle_automation = $_POST['toggle_automation'];
$block_new_account = $_POST['block_new_account'];
$a = $_POST['centosaddcommand'];
$b = $_POST['centosdeleteaccount'];
$c = $_POST['debianaddcommand'];
$d = $_POST['debiandeleteaccount'];

settings('set', $company_name, 'company_name');
settings('set', $maintance_mode, 'maintance_mode');
settings('set', $toggle_automation, 'toggle_automation');
settings('set', $block_new_account, 'block_new_account');
settings('set', $a, 'add_command_centos');
settings('set', $b, 'delete_command_centos');
settings('set', $c, 'add_command_debian');
settings('set', $d, 'delete_command_debian');

echo "<script>$('#save_button').html('Submit');$('#save_button').attr('disabled', false);</script> <div id='settings-form-notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Exito!</h4>
                   Configuracion guardada con exito.
                  </div></div>";	  
} else {
echo "<script>$('#save_button').html('Submit');$('#save_button').attr('disabled', false);</script> <div id='settings-form-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al guardar!</h4>
                    Por favor ingrese el formulario correctamente.
                  </div></div>";
}



?>