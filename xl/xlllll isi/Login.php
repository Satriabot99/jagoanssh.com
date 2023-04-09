<?php

include("tembak.php");

if (!empty($_SESSION['session'])){
    Header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>XL TEMBAK</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script>
    $(document).ready(function(){
            $("#otp").click(function(event){
                event.preventDefault();
                var msisdn=jQuery('input[name="msisdn"]').val();

                $.ajax({
                    type:'POST',
                    url:'getOtp.php',
                    data:{msisdn:msisdn},
                    error:function(xhr,ajaxOptions,thrownError){$('#response').html(xhr);},
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
            $("#login").click(function(event){
                event.preventDefault();
                var msisdn=jQuery('input[name="msisdn"]').val(),
                    passwd=jQuery('input[name="passwd"]').val();
                $.ajax({
                    type:'POST',
                    url:'getLogin.php',
                    data:{msisdn:msisdn,passwd:passwd},
                    error:function(xhr,ajaxOptions,thrownError){$('#response').html(xhr);},
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
    });
</script>
<style type="text/css">
    #wrapshopcart{width:250px;margin:auto;padding:20px;background:#00CED1;box-shadow:0 0 5px #c1c1c1;border-radius:5px;}
</style>
        

</head>


<body>
<br>
<div id="wrapshopcart">
<form>
    <H1>Login XL</H1>
    <hr>
        <div class="form-group">
            <label>No TELP: (wajib awalan 6287xx)</label>
            <input type="number" class="form-control" name="msisdn" value="<?=$nomor;?>" placeholder="ex:628782xx" required>
        </div>


        <div class="form-group">
            <label>Passwd: </label>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="passwd" value="<?=$otp;?>" placeholder="">
            <div class="input-group-append">
                        <input type="submit" class="btn btn-outline-dark" id="otp" name="reqOTP" value="Minta Passwd">
                    </div>
        </div>
        </div>
        <input type="submit" class="btn btn-outline-dark" id="login" name="login" value="LOGIN">
        <br>
        <div id="response"></div>
    </form>
    <br>
    <br>
    <center>
        &copy; 2018 <i>JagoanSSH.com</i>
    <br>
    </center>
</body>
</html>                       
