<?php
$ip = htmlentities($_POST["ip"]);
$hostname = gethostbyaddr($_POST['ip']);
$location = json_decode(file_get_contents('http://api.ipstack.com/'.$ip.'?access_key=0736547da333c0c5d26f12241ffbdb13&output=json&legacy=1'));   // with API :) yeah!
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json/"));

if(isset($_GET['ip']))
{
echo "<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i>Check Success!</h4>
                   <b>IP Adrres:</b> ".$location->ip."
                   <br><b>Country name: </b>".$location->country_name."
                   <br><b>Country code: </b>".$location->country_code."
                   <br><b>City: </b>" .$location->city."
                   <br><b>Organization: </b>" .$details->org."
                   <br><b>Hostname: </b>" .$details->hostname."
                  </div></div>
                  <script>window.location.hash = '#notif';</script>";

}
else {

echo "<script>$('#check').html('Check Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i>Check Success!</h4>
                   <b>IP Adrres:</b> ".$location->ip."
                   <br><b>Country name: </b>".$location->country_name."
                   <br><b>Country code: </b>".$location->country_code."
                   <br><b>City: </b>" .$location->city."
                   <br><b>Organization: </b>" .$details->org."
                   <br><b>Hostname: </b>" .$details->hostname."
                  </div></div>
                  <script>window.location.hash = '#notif';</script>";

}
?>