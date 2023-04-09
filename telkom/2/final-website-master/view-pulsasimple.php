<?php
// var_dump($_SESSION);

if (!isset($_SESSION['state']) ||  $_SESSION['state'] != 'loggedin')
    exit; //direct access script protect
    
if (isset($_SESSION['dor'])) {$_SESSION['dor'] = infoget();}
$json = json_decode($_SESSION['dor'], true);

function rupiah($input){
    $ret = "Rp " . number_format($input,0,',','.');
    return $ret;				 
}

?>
<style type="text/css">
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">

<form method="post" action="">
  <h1>© TEAM PENCARI PROXY <input type="submit" name="changestyle" value="Change Style"></h1>
  <div class="card">
  <!-- <img src="img_avatar2.png" alt="Avatar" style="width:100%"> -->
  <div class="container">
    <h4><b>Informasi Perdana</b></h4> 

    <p>msisdn: <?=$_SESSION['msisdn']?></p>
    <p>brand: <?=$json['profiles']['brand']?></p>
    <p>Price Plan: <?=$json['profiles']['priceplan']?></p>
    <p>Bonus Data: <?=$json['profiles']['bonus_data']?></p>
    <!-- <p>&nbsp;</p> -->
    <p><b>Sisa Pulsa: <?=rupiah($json['profiles']['balance'])?></b></p>
  </div>
</div>

  <br>

    <label for="id">Package ID</label>
    <select name="id">
        <option value="0x1">20K nelp Unli 30 Day</option>
        <option value="0x2">2 GB 3 DAY</option>
        <option value="0x3">3 GB 3 DAY</option>
        <option value="0x4">5 GB 3 DAY</option>
        <option value="0x5">5 GB 2 DAY</option>
        <option value="0x6">10gb 2 DAY</option>
    </select>

    <br>

<?php if ( (isset($_SESSION['key']) && ($_SESSION['key'] == "debug@cepzdecoded" || $_SESSION['key'] == "ts31W3B") )) { ?>
<?php } ?>
<label for="manualid">Manual ID&nbsp;</label>
<input name="manualid" id="manualid" placeholder="Manual ID (kosongkan jika tidak menggunakan.)" <?php if(isset($_SESSION['last_manualid']) && !empty($_SESSION['last_manualid'])) echo'value="'.$_SESSION['last_manualid'].'"';?>></input>
<!-- <button id="plus" onclick="incrementValue()">+</button> -->
<input type="button" onclick="incrementValue()" value="+++" />
<input type="button" onclick="decrementValue()" value="---" />

<br>

<input type="submit" name="clear" value="Logout">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="tembak" value="Tembak-Paket">


</form>

<script type="text/javascript">

var plus, minus;

function incrementValue()
{
    // var value = parseInt(document.getElementById('manualid').value, 10);
    // value = isNaN(value) ? 0 : value;
    // value += 1;
    // document.getElementById('manualid').value = value;

    var value =  document.getElementById('manualid').value;
    var incrementvalue = (+value) + 1;
    incrementvalue = ("00000000" + incrementvalue).slice(-8); // -> result: "0126"
    document.getElementById('manualid').value = incrementvalue;
}

function decrementValue()
{
    var value =  document.getElementById('manualid').value;
    var decrementvalue = (--value) - 0;
    decrementvalue = ("00000000" + decrementvalue).slice(-8); // -> result: "0126"
    document.getElementById('manualid').value = decrementvalue;
}
</script>

<?php
if (isset($beli)) {
	if(isset($_SESSION['last_manualid']) && !empty($_SESSION['last_manualid']))
	{
		echo 'manualid mode: '. $_SESSION['last_manualid']."<br>$beli";
	} else {
		echo $beli;
	}
}
?>
