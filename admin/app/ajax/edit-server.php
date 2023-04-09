<?php
if(isset($_POST['server'])) {
$server = chkString($_POST['server']);
$query = mysqli_query($conn, "SELECT * FROM servers WHERE id='$server'");
$fetch = mysqli_fetch_array($query);
?>
<div id="edit-server-final-form-notif"></div>
<form role="form" id="form-edit-server-final" method="post" action="ajax.proc.php?do=edit-server-final">
 <input name="id" type="hidden" id="idies" value="<?php echo $fetch['id'] ?>" />
  <input name="action" id="action" type="hidden" value="edit" />
  <script>$('#select-server').html('');$('#edit-server-footer').html('<button type="button" id="edit-server-final-button" class="btn btn-primary">Submit</button><button type="button" id="delete-server-button" class="btn btn-danger pull-right">Hapus Server</button>');document.getElementById("edit-server-final-button").onclick = function() {
$("#edit-server-final-button").html('<i class="fa fa-refresh fa-spin"></i> &nbsp;Submit');
 $('#edit-server-final-button').attr('disabled', true); 
$('#form-edit-server-final').ajaxForm({
target: '#edit-server-final-form-notif'
}).submit();
};        document.getElementById("delete-server-button").onclick = function() {
          var idies = $("#idies").val();
          $.ajax({
   url: 'ajax.proc.php?do=delete-server',
   type: 'POST',
    data: {'id': idies},
   success: function(data) {
  $("#edit-server-final-form-notif").html(data);
   },
});
};</script> 
                       <div class="form-group">
                      <label>Ubicación</label>
                      <input name="location" type="text" class="form-control" placeholder="Lokasi Geologis Server (Contoh: Jakarta, Indonesia.)" value="<?php echo $fetch['location'] ?>">
                    </div>

     <div class="form-group">
                      <label>Sistema Operativo</label>
                               <select class="form-control" name="os" value="<?php echo $fetch['os'] ?>">
                       <option value="centos">CentOS</option>
                        <option value="debian">Debian</option>
                      </select>
                    </div>


     <div class="form-group">
                      <label>Tipo de servidor</label>
                               <select class="form-control" name="type" value="<?php echo $fetch['type'] ?>">
                       <option value="websocket3">Websocket 3 Days</option>
                          <option value="websocket7">Websocket 7 Days</option>
                          <option value="ssh">SSH Server 3 Days </option>
                          <option value="ssh">SSH Server 7 Days</option>
                          <option value="ssh">SSH Server 30 Days</option>
                          <option value="vpn">VPN Server 3 Days</option>
                          <option value="vpn">VPN Server 7 Days</option>
                      </select>
                    </div>

                           <div class="form-group">
                      <label>Descripcion</label>
                      <input name="description" type="text" class="form-control" placeholder="Descripcion del Servidor" value="<?php echo $fetch['description'] ?>">
                    </div>
            <div class="form-group">
                      <label>Límites de cuenta</label>
                      <input name="limit" type="text" class="form-control" placeholder="Numero limite de cuentas" value="<?php echo $fetch['accounts_limit'] ?>">
                    </div>
            <div class="form-group">
                      <label>Limite de conexion</label>
                      <input name="max_login" type="text" class="form-control" placeholder="Dispositivos maximo de conexion" value="<?php echo $fetch['max_login'] ?>">
                    </div>
            <div class="form-group">
                      <label>Tiempo de duracion</label>
                      <input name="activefor" type="text" class="form-control" placeholder="Período activo de la cuenta" value="<?php echo $fetch['active_for'] ?>">
                    </div>
                    <hr>
            <div class="form-group">
                      <label>Usuario Root</label>
                      <input name="username" type="text" class="form-control" placeholder="Usuario de acceso root" value="<?php echo $fetch['root_username'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Contraseña root</label>
                      <input name="password" type="password" class="form-control" placeholder="Contraseña de acceso Root" placeholder="Ketik untuk mengubah...">
                    </div>
            <div class="form-group">
                      <label>Direccion del Servidor</label>
                      <input name="host" type="text" class="form-control" placeholder="Host o servidor IP" value="<?php echo $fetch['host'] ?>">
                    </div>

            <div class="form-group">
                      <label>Puerto de conexión predeterminado</label>
                      <input name="port" type="text" class="form-control" placeholder="Puerto predeterminado para ejecución (puerto SSH que puede iniciar sesión como root)" value="<?php echo $fetch['default_connection'] ?>">
                    </div>
                    <hr>
            <div class="form-group">
                      <label>Puerto Dropbear</label>
                      <input name="dropbear" type="text" class="form-control" placeholder="Puerto para Dropbear" value="<?php echo $fetch['dropbear_port'] ?>">
                    </div>
            <div class="form-group">
                      <label>Puerto OpenSSH</label>
                      <input name="openssh" type="text" class="form-control" placeholder="Puerto para OpenSSH" value="<?php echo $fetch['openssh_port'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Puerto SSL/TLS</label>
                      <input name="ssl" type="text" class="form-control" placeholder="Puerto para SSL/TLS" value="<?php echo $fetch['ssl_port'] ?>">
                    </div>
                      <div class="form-group">
                      <label>Puerto Squid/Proxy</label>
                      <input name="squid" type="text" class="form-control" placeholder="Llene el puerto de Squid para activar Squid Proxy" value="<?php echo $fetch['squid_port'] ?>">
                    </div>
                  </div><!-- /.tab-pane -->
          </form>
<?php
}
?>