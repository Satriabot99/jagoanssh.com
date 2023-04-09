<?php
if(isset($_GET['filter'])) {
  $serverid = chkString($_GET['filter']);
  $q = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$serverid'"));
  if(!$q):
    $noserver = 1;
  endif;
} else {
  $noserver = 1;
}

if(!isset($noserver)):
?>
<div id="ndexi" style="display:none;">create-account</div>
<div id="where" style="display:none;">vpn</div>

<div class="container">
  <div class="row"><br/><br/>
    <div class="col-lg-12" align="center" text-align="center"><h4>Crear una nueva cuenta</h4>Lea nuestros términos de servicio antes de crear una cuenta. Cada cuenta es válida para <?php echo $q['active_for'] ?> dias.</div>
<div><p>&nbsp;</p></div>
<?php if(isset($_GET['filter'])) {
if(!$q) {
  exit('Please choose a server before creating account');
}
} else {
   exit('Please choose a server before creating account');
}
?>
          <div class="col-lg-12"></div>
                <div class="col-lg-8 col-lg-offset-2">

                <div class="<?php echo ($q['type']=='vpnssh'||$q['type']=='vpn')? 'col-lg-6' : 'col-lg-8 col-lg-offset-2'; ?>">
                <div class="well" style="height:400px;" id="dimspanel">
     <form action="<?php echo $siteUrl ?>/ajax.proc.php?do=create-account" id="form-create" method="post">
      <div id="notif"></div>
      <div id="dimaspanel">
<input type="hidden" name="id" value="<?php echo $q['id'] ?>" />

        <div class="form-group">
           <label>Usuario:</label>
          <div class="input-group">
  <span class="input-group-addon"><?php echo $usernamePrefix ?></span>
  <input type="text" class="form-control" name="username" required>
</div>
         </div>

        <div class="form-group">
           <label>Contraseña:</label>
          <input type="text" class="form-control" name="password" id="password" required>
         </div>


<div align="center">
<?php showCaptcha('site'); ?><br/>
</div>


<div class="col-lg-12" align="center" style="line-height:1.2em;margin-top:-10px;"><span style="color:grey;font-size:0.8em;">Al hacer clic en el botón Crear ahora, aceptas nuestros <a href="?do=terms">Términos de servicio.</a></span></div>
<div class="col-lg-12" style="margin-top:15px;">
        <p align="center"><button type="button" class="btn btn-lg btn-success" id="createnow" role="button">Crea ahora</button></p>
</div>
</div>
    </form>
</div>
</div>
<?php if($q['type']=='vpnssh'||$q['type']=='vpn'): ?>
<div class="col-md-6">
<p class="lead">Encriptado <span class="text-success">1024 - 2048 bits</span> VPN</p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Protege tu privacidad</li>
                          <li><span class="fa fa-check text-success"></span> Servidor Premium</li>
                          <li><span class="fa fa-check text-success"></span> Alta Performance</li>
                          <li><span class="fa fa-check text-success"></span> Alto tiempo de actividad</li>
                          <li><span class="fa fa-check text-success"></span> Oculta tu IP </li>
                      </ul>
                      <p><a href="<?php $ss = json_decode($q['openvpn_config']); echo $ss->tcp ?>" target="_blank" class="btn btn-primary btn-block">Descargar Configuración (TCP)</a></p>
                      <p><a href="<?php echo $ss->udp ?>" target="_blank" class="btn btn-warning btn-block">Descargar Configuración (UDP)</a></p>
                       <p><a href="<?php $ss = json_decode($q['openvpn_config']); echo $ss->ssl ?>" target="_blank" class="btn btn-primary btn-block">Descargar Configuración (SSL)</a></p>

</div>
<?php endif; ?>
</div>
    <div class="col-lg-12"></div>
      </div>
	  </div> <br/><br/><br/>
<?php
else:
  include('app/pages/404.php');
endif;
?>