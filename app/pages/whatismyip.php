<div id="where" style="display:none;">status</div>
 <!-- Main component for a primary marketing message or call to action -->
    
<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h1>CUAL ES MI DIRECCION IP?</h1>
          <h2>Verifique los detalles de su direccion IP</h2>
        </div>
      </div>
    <p class="text-center probootstrap-animate">
    <span class="badge badge-success mb-3 p-3">Cuentas VPN SSH gratuitas</span>
    <span class="badge badge-warning mb-3 p-3">VPS de ancho de banda ilimitado</span>
    <span class="badge badge-primary mb-3 p-3">Servidores de velocidad completa</span>
    <span class="badge badge-success mb-3 p-3">Cuenta privada</span>
    <span class="badge badge-info mb-3 p-3">Oculte su direccion IP</span>
    <span class="badge badge-primary mb-3 p-3">Servidores VPN SSH rapidos</span> 
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
<div class="col-lg-8 col-lg-offset-2 probootstrap-section probootstrap-animate" data-animate-effect="fadeInRight">
        <div class="probootstrap-pricing popular">
          <h3>Your IP ADRRES <?php $ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
echo $ip;?></h3>
          <ul>
             <?php 
$ipdat = @json_decode(file_get_contents( 
    "http://www.geoplugin.net/json.gp?ip=" .$ip)); 
   
echo '<li>Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
echo '<li>City Name: ' . $ipdat->geoplugin_city . "\n"; 
echo '<li>Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
echo '<li>Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
echo '<li>Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
echo '<li>Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
echo '<li>Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
echo '<li>Timezone: ' . $ipdat->geoplugin_timezone; 
?> 
            </ul>
           <h2>Gracias por usar los servicios de GreySSH</h2>
</div>
</div>

    <?php
    $servers = array();
    $q = mysqli_query($conn, "SELECT `host` FROM `servers`");
    while($row = mysqli_fetch_object($q)) {
    	$servers[] = $row->host;
    }
    if (in_array($ip, $servers)) {
    	echo "<p>Congratulations! You're connected to our network!</p><br/>Your internet experience now powered by:<br/>".settings("get", "company_name")."
    	<br/>Use it at your own risk!";
	} else {
		echo "";
	}
?>

<!-- END: page -->