<?php 
include_once 'tembak.php';

if (empty($_SESSION['session'])){
    Header("Location:Login.php");
    session_destroy();
}
if ($_SESSION['indexx'] != 00){
    Header("Location:Login.php");
    $_SESSION['session'] = '';
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>XL TEMBAK</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></script> 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://my.xl.co.id/pre/assets/js/lib/aes.js"></script>
<script>
$(document).ready(function(){

        $("#beli").click(function(event){
            event.preventDefault();
            var reg =jQuery('select[name="reg"]').val(),
                manual=jQuery('input[name="manual"]').val();
            $.ajax({
                type:'POST',
                url:'tembak.php',
                data:{
                    reg:reg,manual:manual
                },
                error:function(xhr,ajaxOptions,thrownError){
                    $('#response').html(xhr);
                },
                cache:false,
                beforeSend:function(){
                    $(".form-control").attr("disabled", true);
                    $('#response').html('Meminta Request ....');

                },
                success:function(s){
                    $(".form-control").attr("disabled", false);
                    $('#response').html(s);
                }
            });
            return false;
        });
        $.get('count.php').done(function(data){
            $('#count').html('Count: '+data);
        });
    });
</script>
<style type="text/css">
    #wrapshopcart{
        width:250px;
        margin:auto;
        padding:20px;
        background:#00CED1;
        box-shadow:0 0 5px #c1c1c1;
        border-radius:5px;
    }
    #count{
        text-align: right;
    }
</style>
</head>
<body>
	<br>
		<div id="wrapshopcart">
			    <h3>TEMBAK XL</h3>
                <hr>
        <form>
        <div class="form-group">
            <label>Service ID (jika tdk punya biarkan kosong)</label>
            <input type="number" class="form-control" id="inputmanual" name="manual" placeholder=" ex:8210012">
        </div>
        <?php

        (isset($_POST["anuID"])) ? $anuID = $_POST["anuID"] : $anuID=1;

        ?>
        <div class="form-group">
			<label>Pilih paket default</label><br>
			<select class="form-control" name="reg">
				<option <?php if ($anuID == 1 ) echo 'selected' ; ?> value="1">XTRA Kuota 30GB, 30hr, Rp12rb</option>
                <option <?php if ($anuID == 2 ) echo 'selected' ; ?> value="2">Pkt XTRA Combo 5GB + 5GB, 30hr, Rp59rb</option>
                <option <?php if ($anuID == 3 ) echo 'selected' ; ?> value="3">Nelp ke Semua Operator 300Mnt, 90hr, Rp100rb</option>
                <option <?php if ($anuID == 4 ) echo 'selected' ; ?> value="4">Nelp ke Semua Operator 500Mnt, 30hr, Rp140rb</option>
                <option <?php if ($anuID == 5 ) echo 'selected' ; ?> value="5">Nelp ke Semua Operator 500Mnt, 90hr, Rp150rb</option>
                <option <?php if ($anuID == 6 ) echo 'selected' ; ?> value="6">XTRA Bicara Harian, 1hr, Rp5rb</option>
                <option <?php if ($anuID == 7 ) echo 'selected' ; ?> value="7">XTRA Bicara Mingguan, 7hr, Rp15rb</option>
                <option <?php if ($anuID == 8 ) echo 'selected' ; ?> value="8">XTRA Bicara Bulanan, 30hr, Rp30rb</option>
                <option <?php if ($anuID == 9 ) echo 'selected' ; ?> value="9">HotRod PRIMA 1.2GB, 30hr, Rp50rb</option>
                <option <?php if ($anuID == 10 ) echo 'selected' ; ?> value="10">HotRod PRIMA 4GB, 30hr, Rp100rb</option>
                <option <?php if ($anuID == 11 ) echo 'selected' ; ?> value="11">HotRod PRIMA 10GB, 30hr, Rp200rb</option>
                <option <?php if ($anuID == 12 ) echo 'selected' ; ?> value="12">HotRod 30 Hari 1.5GB, 30hr, Rp25rb</option>
                <option <?php if ($anuID == 13 ) echo 'selected' ; ?> value="13">HotRod 30 Hari 3GB, 30hr, Rp30rb</option>
                <option <?php if ($anuID == 14 ) echo 'selected' ; ?> value="14">HotRod 30 Hari 6GB, 30hr, Rp50rb</option>
                
                <option <?php if ($anuID == 15 ) echo 'selected' ; ?> value="15">Xtra Combo Lite 3GB, 30hr, Rp22.900</option>
                <option <?php if ($anuID == 16 ) echo 'selected' ; ?> value="16">Xtra Combo Lite 5GB, 30hr, Rp32.900</option>
                <option<?php if ($anuID == 17 ) echo 'selected' ; ?> value="17">Xtra Combo Lite 9GB, 30hr, Rp52.900</option>
                <option <?php if ($anuID == 18 ) echo 'selected' ; ?> value="18">Xtra Combo Lite 17GB, 30hr, Rp82.900</option>
                <option <?php if ($anuID == 19 ) echo 'selected' ; ?> value="19">Xtra Combo Lite 25GB, 30hr, Rp102.900</option>
                <option <?php if ($anuID == 20 ) echo 'selected' ; ?> value="20">Super Seru, 30hr, Rp15rb</option>
                <option <?php if ($anuID == 22 ) echo 'selected' ; ?> value="22">Waze&Chat 1hr, Rp500</option>
                <option <?php if ($anuID == 23 ) echo 'selected' ; ?> value="23">Waze&Chat 3 hr, Rp.1000</option>
             <option <?php if ($anuID == 24 ) echo 'selected' ; ?> value="24">Waze&Chat 7hr, Rp2500</option>
			</select>
		</div>
		
        <input type="submit" class="btn btn-outline-dark" id="beli" name="beli" value="Tembak">
        <input type="button" class="btn btn-outline-dark" value="Keluar" onclick="window.location = 'clear.php';" style="float: right;" />
    </form>
            <div id="response"></div>
            <p id="count"></p>
            <center>
                &copy; 2018 <i>JagoanSSH.com</i>
            </center>
        </div>
</body>
</html>                            
