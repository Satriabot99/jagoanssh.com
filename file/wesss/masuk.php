<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
}elseif (isset($_SESSION["dor"])) {
  header("Location: belipaket.php");
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">

body{
    background:black;
}
.container{
    max-width:400px;
    margin:60px auto;
}
.login{
    margin:20px auto;
    color:#fff;
    text-align:center;
}
.form-control{
    background:#000;
    width:300px;
    margin:auto;
    color:#fff;
}
p{
    text-align:center;
    margin-top:4px;
    color:white;
}
h3{
    text-align:center;
    font-family:sant-serif;
    font-style:bold;
    color:white;
}
.alert{
    color:red;
    position:fixed;
    margin:0;

}
   
</style>

</head>
<body>

     <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <a class="navbar-brand" href="http://panelsemut.xyz">Panelsemut</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://panelsemut.xyz">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="http://Premiumssh.xyz">SSH PREMIUM</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="https://www.kumpul4semut.com">Blog</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="logout.php">keluar</a>
          </li>
        </ul>
      </div>
    </nav>
    
    
    <div class="container">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- iklanhead -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-3348382600468278"
         data-ad-slot="1683823743"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
    
  <div class="container">
    <div class="alert">
    <?php
            $msisdn = @$_POST['msisdn'];
            $otpCode = @$_POST['otpCode'];


                if(isset($_POST['otp'])){
                if($msisdn == ""){
                        echo "<script>
                                alert('nomor kosong!');
                            </script>";
                }else{
                    require_once("getpassword.php");
                }
                }


                if(isset($_POST['dor'])){
                if($msisdn == ""){
                    echo "<script>
                                alert('nomor & otp kosong!');
                            </script>";
                }else{
                    require_once("login.php");
                }
                }
            ?>

    </div>
</div>
<div class="container">
    <h3>Login Luna</h3>
    <div class="login">
       	   
        <form method="post" action="">
            <div class="form-group">
                <label for="msisdn">Nomor:</label>
                <input  class="form-control" type="text" name="msisdn" placeholder="" value="<?=$msisdn;?>" id="msisdn">
            </div>
            <div class="form-group">
                <label for="otp">Otpcode:</label>
                <input class="form-control" type="text" name="otpCode" placeholder="" value="<?=$otpCode;?>" id="otp">
            </div>
            <button type="submit"name="dor" class="btn btn-primary">login</button>
            <button type="submit"name="otp" class="btn btn-danger">ReqOtp</button>
            
        </form>
    </div>          
       
<div class="row">
    <div class="col mt-3">
        <p> &copy; 2018 By kumpul4semut</p>
    </div>
</div>


       
</div>

<script >
$(function () {
  $
})

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>


