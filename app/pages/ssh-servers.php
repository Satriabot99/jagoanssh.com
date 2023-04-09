<?php
if(isset($_GET['filter'])): 
switch($_GET['filter']) {
  case 'one-month':
    $filter = '30 DAYS VIP';
    $dimas = "`type`='one-month'";
  break;
  case 'extra':
    $filter = '7 DAYS';
    $dimas = "`type`='extra'";
  break;
  default:
    $filter = '3 DAYS';
    $dimas = "`type`='ssh'";
  break;
}
else:
  $filter = '3 DAYS';
  $dimas = "`type`='ssh'";
endif;
?>
<div id="where" style="display:none;">ssh-servers</div>
<div id="ndexi" style="display:none;">ssh-servers</div>
<!-- Main component for a primary marketing message or call to action -->

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
        <h1>FREE SSH TUNNEL <?php echo "$filter"; ?></h1>
        <h2>FREE SSH TUNNEL SERVERS</h2>
        <h4>El mejor túnel SSH a toda velocidad</h4>
        <h4>Conexión de túnel SSH más rápida</h4>
          <p class="lead">Seleccione la ubicación del servidor del túnel SSH según sus necesidades</p>
          <p class="lead">Túnel SSH Tenemos diferentes Velocidades para cada país</p>
          <p class="lead">Asegúrate de elegir un servidor con una ubicación rápida de tu país</p>
        </div>
      </div>
<p>
<?php
include('app/ads/ads.php');
?>
</p>
  <p class="text-center">
    <span class="badge badge-success mb-3 p-3">Cuentas SSH gratuitas</span>
    <span class="badge badge-warning mb-3 p-3">VPS de ancho de banda ilimitado</span>
    <span class="badge badge-primary mb-3 p-3">SSH de velocidad completa</span>
    <span class="badge badge-success mb-3 p-3">Cuenta privada</span>
    <span class="badge badge-info mb-3 p-3">Oculte su dirección IP</span>
    <span class="badge badge-primary mb-3 p-3">Servidores SSH rápidos</span>
  </p> 
  <p class="text-center">
    <span class="label label-danger">No DDOS</span>
    <span class="label label-danger">No Fraud</span>
    <span class="label label-danger">No Hacking</span>
    <span class="label label-danger">No Spam</span>
  </p> 
</div>
</section>
<?php
include('app/ads/link.php');
?>
 <section id="services" class="probootstrap-section">
    <div class="container">
      <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #ff689b;"><i class="icon-check" style="color: #fceef3;"></i></div>
              <h3 class="title">Soporta SSH Stunnel</h3>
              <p class="description">Nuestro túnel SSH admite conexiones Stunnel SSL/TLS.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #7B68EE;"><i class="icon-check" style="color: #e6fdfc;"></i></div>
              <h3 class="title">Soporta SSH Dropbear</h3>
              <p class="description">Nuestro túnel SSH ya admite conexiones dropbear.</p>
            </div>
          </div>
           <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #3fcdc7;"><i class="icon-check" style="color: #e6fdfc;"></i></div>
              <h3 class="title">Soporta SSH Openssh</h3>
              <p class="description">Nuestro Túnel SSH ya admite conexiones openssh.</p>
</section>
<?php
include('app/ads/link.php');
?>

<!-- Start Pagination -->

<div id="ssh"></div>
<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limitData = 4;
$offset = ($page - 1)*$limitData ;

$sql = "SELECT * FROM `servers` WHERE $dimas LIMIT $offset, $limitData";
$q = mysqli_query($conn, $sql);
$i = 0;

while($row = mysqli_fetch_object($q)) { $i++;
$ports = json_decode($row->openvpn_port);
$ss = 'TCP & UDP';
$s = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `accounts` WHERE `in_server`='$row->id' AND `date_created`>='$currentReset'"));
$colors = array("success", "primary", "danger", "info", "warning");
$s2 = array_rand($colors, 2);
?>

<!-- Server -->
        <div class="container col-md-3 col-md-offset-1 probootstrap-section">
          <div class="probootstrap-pricing popular">
            <h1><?php echo $row->description ?></h1>
             <img src="<?php echo location($row->location)['flag'] ?>" height="48" width="48"/>
             <h4 class="title"><?php echo location($row->location)['name'] ?></h4>
            <ul>
              <li><?php echo $row->host ?></li>
              <li>Active: <?php echo $row->active_for ?> Days</li>
              <li>Max Login: <?php echo $row->max_login ?> Device</li>
              <li>Limit: <?php echo $row->accounts_limit ?> /Days</li>
              <li>Status: <?php if($s>=$row->accounts_limit): ?><span class='label label-danger'>Server Full!</span><?php else: ?><span class='label label-success'><?php echo $row->accounts_limit-$s ?> Available</span><?php endif; ?></li>
              
            </ul>
      <?php if($s>=$row->accounts_limit): ?>
      <p align="center"><a class="btn btn-danger" href="<?php urlPrefix('create-account/'.$row->id) ?>"><i class="fa fa-times" aria-hidden="true"></i> Create SSH</a></p>
      <?php else: ?>
      <p align="center"><a class="btn btn-primary" href="<?php urlPrefix('create-account/'.$row->id) ?>"><i class="fa fa-check" aria-hidden="true"></i> Create SSH</a></p>
      <?php endif; ?>
    </div>
    </div>
  <!-- End Server -->
  
<?php }
$totalData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `servers` WHERE $dimas"));
$totalPage = ceil($totalData/$limitData) ;
$currentParam = "do=".@$_GET['do']."&filter=".@$_GET['filter'];
?>
<!-- Start pagintaion controls -->
<div class="col-md-12 no-padding">
    
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item <?php echo ($page == 1) ? 'disabled' : '';?>">
          <a class="page-link" href="<?php echo '?'.$currentParam.'&page='.($page-1).'';?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Anterior</span>
          </a>
        </li>
        <?php
            for($p=1 ; $p<=$totalPage ; $p++) {
                $statusPage = ($p == $page) ? 'active' : '';
                echo '<li class="page-item '.$statusPage.'"><a class="page-link" href="?'.$currentParam.'&page='.$p.'">'.$p.'</a></li>';
            }
        ?>
        <li class="page-item <?php echo ($page == $totalPage) ? 'disabled' : '';?>">
          <a class="page-link" href="<?php echo '?'.$currentParam.'&page='.($page+1).'';?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Siguiente</span>
          </a>
        </li>
      </ul>
    </nav>
</div>
<!-- End pagintaion controls -->
<?php  if(!$i) : ?>
<div align="center" style="padding:100px;padding-left:50px;padding-right:50px;"><h4>Lo sentimos, actualmente no hay servidores agregados.</h4></div>
<?php endif; ?>

</div>
<!-- END page -->