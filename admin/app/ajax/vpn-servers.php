<?php
if(isset($_GET['filter'])): 
switch($_GET['filter']) {
  case 'one-month':
    $filter = ' AND `active_for`=30';
    $dimas = "`type`='vpn' $filter";
  break;
  case 'extra':
    $filter = ' AND `active_for`=3';
    $dimas = "`type`='vpn' $filter";
  break;
  default:
    $filter = '';
    $dimas = "`type`='vpn' $filter";
  break;
}
else:
  $filter = 'AND `active_for`=7';
  $dimas = "`type`='vpn' $filter";
endif;
?>
<div id="where" style="display:none;">vpn-servers</div>
<div id="ndexi" style="display:none;">vpn-servers</div>
<!-- Main component for a primary marketing message or call to action -->
<div class="container">

<div class="page-header" style="font-size:1em;margin-top:-2px;">
    <center>  
                    </br> 
         <h4><small style="color:grey;">Brindamos la mejor experiencia para usted.</small></h4>
     </center>  

    <center>  
      <p class="lead" style="font-size:1.3em;">
                <span class="label label-success">Servidor Premiun</span>
    <span class="label label-warning">Banda ancha ilimitada</span>
    <span class="label label-primary">Full velocidad</span>
    <span class="label label-success">Cuenta Privada</span>
    <span class="label label-info">Oculta tu IP</span>
    <span class="label label-warning">Sencillo y facil</span>
    <span class="label label-primary">Alta calidad</span> 
    <span class="label label-warning">Creación instantánea</span>  
    
  </p> 
  <p class="lead" style="font-size:1.3em;margin-top:-20px;">
    <span class="label label-danger">No DDOS</span>
    <span class="label label-danger">No Fraud</span>
    <span class="label label-danger">No Hacking</span>
    <span class="label label-danger">No Spam</span>
    <span class="label label-danger">No Repost Account</span>
  </p> 
   </center>

     </div>  

  <div class="row">
  <div align="center">
  <h2>Elige tu servidor</h2>
         <h4><small style="color:grey;">Simplemente elija en qué servidor desea crear una cuenta VPN.</small></h4></div>
  <br/>

<?php $q = mysqli_query($conn, "SELECT * FROM `servers` WHERE $dimas"); $i = 0;
while($row = mysqli_fetch_object($q)) { $i++;
  $ports = json_decode($row->openvpn_port);
  $tcp = (!empty($ports->tcp))? true : false;
  $udp = (!empty($ports->udp))? true : false;
  $ssl = (!empty($ports->ssl))? true : false;
  if($tcp&&$udp): $ss = 'TCP & UDP'; elseif($tcp): $ss = 'TCP'; elseif($udp): $ss = 'UDP'; else: $ss = '-'; endif;
  $s = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `accounts` WHERE `in_server`='$row->id' AND `date_created`>='$currentReset'"));
  $colors = array("success", "primary", "danger", "info", "warning");
  $s2 = array_rand($colors, 2);
?>
  <!-- Server -->
<div class="col-sm-3 col-md-3">
   <div class="well">
      <div align="center"><h2 class="text-primary"><?php echo $row->description ?></h2>
      <p><img src="<?php echo location($row->location)['flag'] ?>" height="25" width="25"/> <span class="label label-<?php echo $colors[$s2[0]] ?>"><?php echo location($row->location)['name'] ?></span></p>
     </div> <div class="table-responsive">
         <table class="table table-striped custab">
            <tbody>
               <tr>
                  <td>
                     <b>Server :</b>
                  </td>
                  <td>
                     <small><?php echo $row->host ?></small>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Location :</b>
                  </td>
                  <td>
                     <?php echo location($row->location)['name'] ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Protocol :</b>
                  </td>
                  <td>
                     <?php echo $ss ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>TCP :</b>
                  </td>
                  <td>
                     <?php echo $row->vpnport[tcp] ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>UDP :</b>
                  </td>
                  <td>
                     <?php echo $row->vpnport[udp] ?>
                  </td>
               </tr>
               <tr>
                  <td>
                  	<b>SSL :</b>
                  </td>
                  <td>
                     <?php echo $row->vpnport[ssl] ?>
                     </td>
               </tr>
               <tr>
                  <td>
                     <b>Max Login :</b>
                  </td>
                  <td>
                     <?php echo $row->max_login ?> Device
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Active For:</b>
                  </td>
                  <td>
                     <?php echo $row->active_for ?> Days
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Limit :</b>
                  </td>
                  <td>
                     <?php echo $row->accounts_limit ?> accounts/day 
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Status :</b>
                  </td>
                  <td>
                     <?php if($s>=$row->accounts_limit): ?><span class='label label-danger'>Servidor a Full!</span><?php else: ?><span class='label label-success'><?php echo $row->accounts_limit-$s ?> Available</span><?php endif; ?>                       
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <?php if($s>=$row->accounts_limit): ?>
      <p align="center"><a class="btn btn-danger btn-lg" href="javascript:alert('Server is full, please choose another server or wait until reset time.');"><i class="fa fa-times" aria-hidden="true"></i> Create VPN</a></p>
      <?php else: ?>
      <p align="center"><a class="btn btn-primary btn-lg" href="<?php urlPrefix('create-account/'.$row->id) ?>"><i class="fa fa-check" aria-hidden="true"></i> Create VPN</a></p>
      <?php endif; ?>
   </div>
</div>
  <!-- End Server -->
<?php } if(!$i): ?>
<div align="center" style="padding:100px;padding-left:50px;padding-right:50px;"><h4>Lo sentimos, actualmente no hay servidores agregados.</h4></div>
<?php endif; ?>
      
<br/></br/>


    </div> <!-- /container -->

  </div>
<div class="row" style="margin-top:40px;">
<div align="center">
<h3>Service excellence</h3>
<h4><small style="color:grey;">¿Cuáles son los beneficios de usar los servicios SSH y OpenVPN?</small></h4></div>
<br />
</div>
<div class="col-md-6">
<div class="testimonials">
<div class="col-lg-10 col-lg-offset-1" align="left">
<blockquote>
<li>Podemos acceder al ordenador desde cualquier lugar siempre que esté conectado a internet</li>
<li>con una conexión VPN podemos navegar de forma segura al usar el acceso público a internet</li>
<li>Accede a ciertos recursos fácilmente.</li>
<li>Proteja la privacidad en línea.</li>
<li>Superar el bloqueo geográfico.</li>
</div>
</div>
</div>
<div class="col-md-6">
<div class="testimonials">
<div class="col-lg-10 col-lg-offset-1" align="left">
<blockquote>
<li>Conectado a una determinada red incluso en diferentes lugares.</li>
<li>VPN se puede utilizar como una tecnología alternativa para conectar redes locales</li>
<li>tiene mejores características de seguridad de red privada</li>
<li>Puede acceder a sitios web que están bloqueados por los proveedores.</li>
<li>Medios alternativos para crear redes privadas.</li>
</div>
</div>
</div>
</div>

</div>