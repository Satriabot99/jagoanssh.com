<?php
// var_dump($_SESSION);

if (!isset($_SESSION['state']) ||  $_SESSION['state'] != 'loggedin')
	exit; //direct access script protect
?>

<meta name="viewport" content="width=device-width,initial-scale=1.0">


<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<div class="container">
	<h1> © TEAM PENCARI PROXY</h1>
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>Informasi Kartu</b>
		</div>

		<div class="panel-body">
		<?php
			if (isset($_SESSION['dor'])) {$_SESSION['dor'] = infoget();}
			$json = json_decode($_SESSION['dor'], true);

			echo '<p>msisdn     : ' . $_SESSION['msisdn'] . '</p>';
			echo '<p>brand      : ' . $json['profiles']['brand'] . '</p>';
			echo '<p>Price Plan : ' . $json['profiles']['priceplan'] . '</p>';
			echo '<p>Bonus Data : ' . $json['profiles']['bonus_data'] . '</p>';
		?>
		</div>
			<div class="panel-footer">
				<b><?php
					function rupiah($input){
						$ret = "Rp " . number_format($input,0,',','.');
						return $ret;				 
					}
					echo 'Sisa Pulsa : ' . rupiah($json['profiles']['balance']);
				?></b>
			</div>
		</div>

 <form method="post" action="">
	<div class="form-group">
		<label for="id">Package ID</label>
		<select class="form-control" name="id">
			<option value="0x1">20K Nelp 30 Day</option>
			<option value="0x2">2 GB 3 DAY</option>
			<option value="0x3">3 GB 3 DAY</option>
			<option value="0x4">5 GB 3 DAY</option>
			<option value="0x5">5 GB 2 DAY</option>
			<option value="0x6">10gb 2 DAY</option>
		</select>
	</div>

<?php if ( (isset($_SESSION['key']) && ($_SESSION['key'] == "debug@cepzdecoded" || $_SESSION['key'] == "ts31W3B") )) { ?>
<?php } ?>

<div class="form-group">
		<label for="manualid">Manual ID</label>
		<input class="form-control" name="manualid" placeholder="Manual ID (kosongkan jika tidak menggunakan.)" <?php if(isset($_SESSION['last_manualid']) && !empty($_SESSION['last_manualid'])) echo'value="'.$_SESSION['last_manualid'].'"';?>></input>
</div>

<div class="form-group">
    	<input type="submit" name="tembak" class="btn btn-danger" value="Tembak-Paket">
		<input type="submit" name="clear" class="btn btn-danger" value="Logout">
		<input type="submit" name="changestyle" class="btn btn-success pull-right" value="Change Style">
	</div>
</form>

	</div>
<?php
if (isset($beli)) {
	if(isset($_SESSION['last_manualid']) && !empty($_SESSION['last_manualid']))
	{
		echo '<center><div class="alert alert-success" col-md-4>';
		echo 'manualid mode: '. $_SESSION['last_manualid']."<br>$beli";
		echo '</div></center>';
	} else {
		echo '<center><div class="alert alert-success" col-md-4>' . $beli . '</div></center>';
	}
}
?>
