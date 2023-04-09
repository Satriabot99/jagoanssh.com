<?php
if(isset($_GET['filter'])): 
switch($_GET['filter']) {
  case 'one-month':
    $filter = ' AND `active_for`=30 ';
    $dimas = "`type`='one-month' $filter OR `type`='vpn' $filter";
  break;
  case 'extra':
    $dimas = "`type`='extra'";
  break;
  default:
    $filter = '';
    $dimas = "`type`='vpnssh' $filter OR `type`='vpn' $filter";
  break;
}
else:
  $filter = '';
  $dimas = "`type`='vpnssh' $filter OR `type`='vpn' $filter";
endif;
?>
<div id="where" style="display:none;">shadowsocks</div>
<div id="ndexi" style="display:none;">shadowsocks</div>
<!-- Main component for a primary marketing message or call to action -->

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h1>FREE SHADOWSOCKS VPN SERVERS</h1>
          <h2>A secure socks5 proxy, designed to protect your Internet traffic</h2>
          <h2>Free shadowsocks SSR & shadowsocks-libev servers</h2>
          <h3>Free shadowsocks ssr and shadowsocks-libev 7 days</h3>
          <p class="lead">Just select the location of the server you want to make</p>
          <p class="lead">So you can choose now</p>
        </div>
      </div>
<p>
<?php
include('app/ads/ads.php');
?>
</p>
    <p class="text-center probootstrap-animate">
    <span class="badge badge-success mb-3 p-3">Free Shadowsocks VPN</span>
    <span class="badge badge-warning mb-3 p-3">Free Shadowsocks SSR VPN</span>
    <span class="badge badge-primary mb-3 p-3">Full Speed Servers</span>
    <span class="badge badge-success mb-3 p-3">Private Account</span>
    <span class="badge badge-info mb-3 p-3">Hide Your IP Adrres</span>
    <span class="badge badge-primary mb-3 p-3">Fast Shadowsocks Servers</span>
  </p> 
  <p class="text-center probootstrap-animate">
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

<?php $q = mysqli_query($conn, "SELECT * FROM `servers` WHERE $dimas"); $i = 0;
while($row = mysqli_fetch_object($q)) { $i++;
  $ports = json_decode($row->openvpn_port);
  $ss = 'TCP & UDP';
  $s = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `accounts` WHERE `in_server`='$row->id' AND `date_created`>='$currentReset'"));
  $colors = array("success", "primary", "danger", "info", "warning");
  $s2 = array_rand($colors, 2);
?>
<!-- Server -->
        <div class="container col-md-3 col-md-offset-1 probootstrap-section probootstrap-animate">
          <div class="probootstrap-pricing popular">
            <h1><?php echo $row->description ?></h1>
             <img src="<?php echo location($row->location)['flag'] ?>" height="48" width="48"/>
             <h3><?php echo location($row->location)['name'] ?></h3>
            <ul>
              <li><?php echo $row->host ?></li>
              <li>OBFS TLS: 1443</li>
              <li>SSR: 8388</li>
              <li>Resset: <?php echo $row->active_for ?> Days</li>
              <li>Limit: <?php echo $row->accounts_limit ?> Days</li>
              <li>Status: <?php if($s>=$row->accounts_limit): ?><span class='label label-danger'>Server Full!</span><?php else: ?><span class='label label-success'><?php echo $row->accounts_limit-$s ?> Available</span><?php endif; ?></li>
              
            </ul>
      <?php if($s>=$row->accounts_limit): ?>
      <p align="center"><a class="btn btn-danger" href="<?php urlPrefix('generate/'.$row->id) ?>"><i class="fa fa-times" aria-hidden="true"></i> Create SSH</a></p>
      <?php else: ?>
      <p align="center"><a class="btn btn-primary" href="<?php urlPrefix('generate/'.$row->id) ?>"><i class="fa fa-check" aria-hidden="true"></i>Generate Now</a></p>
      <?php endif; ?>
    </div>
    </div>
  <!-- End Server -->
  
<?php } if(!$i): ?>
<div align="center" style="padding:100px;padding-left:50px;padding-right:50px;"><h4>Maaf saat ini belum ada server ditambahkan.</h4></div>
<?php endif; ?>
      
</div>
<!-- END page -->