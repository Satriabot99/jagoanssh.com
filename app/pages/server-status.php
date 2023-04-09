<div id="ndexi" style="display:none;">status</div>
<div id="where" style="display:none;">status</div>
<!-- Main component for a primary marketing message or call to action -->
<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h1>SERVERS STATUS SSH VPN</h1>
          <h2>Monitor SSH VPN server uptime</h2>
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
<!-- END: section -->
<?php
include('app/ads/link.php');
?>
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center section-heading probootstrap-animate">
          <h2>Our Server list & status</h2>
          <p class="lead">If you want to check our server availablity.</p>
        </div>
      </div>
     <div class="row">
    <table class="table table-bordered probootstrap-animate">
    <thead>
       <tr>
        <th>Host / IP</th>
        <th>Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
$no = 0;$ss = '';
$q = mysqli_query($conn, "SELECT * FROM `servers`");
while($row = mysqli_fetch_object($q)) {
$ss .= $row->id.':1,'; $no++;
$sss = $row->host;

$data = "";
$timeout = "1";
$services = array();
$services[] = array("port" => "22", "service" => "", "ip" => "") ;
//begin table for status
foreach ($services  as $service) {
	if($service['ip']==""){
	   $service['ip'] = "$sss";
	}
	$data .= $service['service'];
	$fp = @fsockopen($service['ip'], $service['port'], $errno, $errstr, $timeout);
	if (!$fp) {
		$data .= "<span class='label label-danger'>Offline </span>";
	  //fclose($fp);
	} else {
		$data .= "<span class='label label-primary'>Online </span>";
		fclose($fp);
	}
}  
?>
<tr>
<td><?php echo $row->host ?></td>
<td><?php echo $row->description ?></td>
<td><?php echo $data ?></td>
</tr>   
<?php
}
 ?>
</tbody>
</table>
</div>
</div>
</section>
<!--[if lt IE 9]>
<script type="text/javascript">

            function dimas(host) {
                var s;

                s = $.ajax({
                    url: "<?php echo urlPrefix('chkServer'); ?>",
                    type: "post",
                    data: {
                        host: host
                    },
                    beforeSend: function () {
                        $('.dimas' + host).html('Checking...');
                        $('#dimas' + host).html('Checking...');
                        $('.dimas' + host).removeClass('successclass dangercls warningcls').addClass('warningcls');
                        $('#dimas' + host).removeClass('successclass dangercls warwarningclsning').addClass('warningcls');
                    }
                });
                s.done(function (response, textStatus, jqXHR) {
                    response = JSON.parse(response);
                    var status = response.ssh;
                    console.log(response.ssh);
                    var dimass;
                    var textstatus;
                    if (status) {
                        dimass = 'successclass';
                        textstatus = '<strong>ONLINE</strong>';
                    } else {
                        dimass = 'dangercls';
                        textstatus = '<strong>OFFLINE</strong>';
                    }
                    $('.dimas' + host).html(textstatus);
                    $('.dimas' + host).removeClass('successclass dangercls warningcls').addClass(dimass);
                    var status = response.vpn;
                    var dimass;
                    if (status) {
                        dimass = 'successclass';
                        textstatus = '<strong>ONLINE</strong>';
                    } else {
                        dimass = 'dangercls';
                        textstatus = '<strong>OFFLINE</strong>';
                    }
                    $('#dimas' + host).html(textstatus);
                    $('#dimas' + host).removeClass('successclass dangercls warningcls').addClass(dimass);
                });

                s.fail(function (jqXHR, textStatus, errorThrown) {
                    console.error(
                        "The following error occured: " +
                            textStatus, errorThrown
                    );
                });

            }

            $(document).ready(function () {

                var servers = {<?php echo $ss ?>};
                var server;

                for (var key in servers) {
                    server = key;

                    dimas(server);
                    (function loop(server) {
                        setTimeout(function () {
                            dimas(server);
                            loop(server);
                        }, 8000);
                    })(server);
                }

            });
</script>
<![endif]-->