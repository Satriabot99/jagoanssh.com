<?php
$nomor = @$_POST['nomor'];
$jumlah = @$_POST['jumlah'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Whatsapp Prank</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
	    .container{
	    	max-width: 400px;
	    	margin: auto
	    }
	    #response{
	        text-align: center;
	    }
	    #EE{
	        width: 50%;
	    }
	    .textarea { resize:none; }
	    #count{
	        text-align: right;
	    }
	</style>
</head>
<body>
<div class="container">

		<h1>Whatsapp Prank</h1>
		<form method="post" action="">
		<div class="form-group">
			<label for="no">Nomor</label>
			<input class="form-control" type="number" name="nomor" placeholder="08xx" value="<?=$nomor;?>" id="no">
		</div>
		<div class="form-group">
			<label for="jml">Jumlah</label>
			<input class="form-control" type="number" name="jumlah" placeholder="9999" value="<?=$jumlah;?>" id="jml">
		</div>
			<button type="submit" class="btn btn-success"  name="submit">Prank</button>
		</form>

	
<?php
if(isset($_POST['submit'])){
   if($nomor == "" ){
      echo "Nomor hp dan jumlah kosong!";
   }else{
      require_once("wa.php");
   }
}
?>

</div>
</body>
</html>