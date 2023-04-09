<?php
if(isset($_GET['filter'])): 
switch($_GET['filter']) {
  case 'one-month':
    $filter = ' AND `active_for`=30 ';
    $dimas = "`type`='vpnssh' $filter OR `type`='openvpn' $filter";
  break;
  case 'extra':
    $dimas = "`type`='extra'";
  break;
  default:
    $filter = '';
    $dimas = "`type`='vpnssh' $filter OR `type`='openvpn' $filter";
  break;
}
else:
  $filter = '';
  $dimas = "`type`='vpnssh' $filter OR `type`='openvpn' $filter";
endif;
?>
<div id="where" style="display:none;">vpn-servers</div>
<div id="ndexi" style="display:none;">vpn-servers</div>
<!-- Main component for a primary marketing message or call to action -->
<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
          <h1>FREE OPENVPN SERVERS</h1>
          <h2>Free Openvpn Accounts</h2>
          <p class="lead">Select Openvpn Server Location According to Your Needs</p>
          <p class="lead">Openvpn We have different Speeds for each country</p>
          <p class="lead">Make sure you choose a server with a fast location from your country</p>
        </div>
      </div>
<p>
<?php
include('app/ads/ads.php');
?>
</p>
    <p class="text-center">
    <span class="badge badge-success mb-3 p-3">Free VPN Accounts</span>
    <span class="badge badge-warning mb-3 p-3">Unlimited Bandwidth VPS</span>
    <span class="badge badge-primary mb-3 p-3">Full Speed VPN</span>
    <span class="badge badge-success mb-3 p-3">Private Account</span>
    <span class="badge badge-info mb-3 p-3">Hide Your IP Adrres</span>
    <span class="badge badge-primary mb-3 p-3">Fast VPN Servers</span>
  </p> 
  <p class="text-center">
    <span class="label label-danger">No DDOS</span>
    <span class="label label-danger">No Fraud</span>
    <span class="label label-danger">No Hacking</span>
    <span class="label label-danger">No Spam</span>
  </p> 
</div>  
</section>
<!-- END: section -->

<?php
include('app/ads/link.php');
?>
<div id="vpn"></div>
<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limitData = 4;
$offset = ($page - 1)*$limitData ;

$sql = "SELECT * FROM `servers` WHERE $dimas LIMIT $offset, $limitData";
$q = mysqli_query($conn, $sql);
$i = 0;
while($row = mysqli_fetch_object($q)) { $i++;
  $ports = json_decode($row->openvpn_port);
  $tcp = (!empty($ports->tcp))? true : false;
  $udp = (!empty($ports->udp))? true : false;
  if($tcp&&$udp): $ss = 'TCP & UDP'; elseif($tcp): $ss = 'TCP'; elseif($udp): $ss = 'UDP'; else: $ss = '-'; endif;
  $s = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `accounts` WHERE `in_server`='$row->id' AND `date_created`>='$currentReset'"));
  $colors = array("success", "primary", "danger", "info", "warning");
  $s2 = array_rand($colors, 2);
?>

<!-- Server -->
        <div class="container col-md-3 col-md-offset-1 probootstrap-section probootstrap-animate" data-animate-effect="fadeInRight">
          <div class="probootstrap-pricing popular">
            <h2><?php echo $row->description ?></h2>
             <img src="<?php echo location($row->location)['flag'] ?>" height="48" width="48"/>
            <h4 class="title"><?php echo location($row->location)['name'] ?></h4>
            <ul>
              <li><?php echo $row->host ?></li>
              <li>TLS: <?php echo $row->ssl_tls ?></li>
              <li>TCP: <?php echo ($tcp)? $ports->tcp : '-'; ?></li>
              <li>UDP: <?php echo ($udp)? $ports->udp : '-'; ?></li>
              <li>Active: <?php echo $row->active_for ?> Days</li>
              <li>Max Login: <?php echo $row->max_login ?> Device</li>
              <li>Limit: <?php echo $row->accounts_limit ?> /Days</li>
              <li>Status: <?php if($s>=$row->accounts_limit): ?><span class='label label-danger'>Server Full!</span><?php else: ?><span class='label label-success'><?php echo $row->accounts_limit-$s ?> Available</span><?php endif; ?></li>
              
            </ul>
      <?php if($s>=$row->accounts_limit): ?>
      <p align="center"><a class="btn btn-danger" href="<?php urlPrefix('create-vpn/'.$row->id) ?>"><i class="fa fa-times" aria-hidden="true"></i> Create VPN</a></p>
      <?php else: ?>
      <p align="center"><a class="btn btn-primary" href="<?php urlPrefix('create-vpn/'.$row->id) ?>"><i class="fa fa-check" aria-hidden="true"></i> Create VPN</a></p>
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
            <span class="sr-only">Previous</span>
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
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
</div>
<!-- End pagintaion controls -->
<?php  if(!$i) : ?>
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center section-heading probootstrap-animate">
          <div class="col-lg-6 col-lg-offset-3 probootstrap-animate">
          <div class="probootstrap-box">
              <div class="icon"><i class="icon-zoom-in"></i></div>
              <h2>Not server found</h2>
              <p>Sorry there is no server added at this time</p>
              <p class="lead">Thank you for your understanding.</p>
              <a class="btn btn-primary" href="/">Home Page</a>
          </div>
        </div>
    </div>
</section>
<?php endif; ?>



    </div> <!-- END page -->