<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
}elseif (!isset($_SESSION["dor"])) {
  header("Location: masuk.php");
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    color: red;
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
            <a class="nav-link disabled" href="#">Update</a>
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
    <h3>Tembak Luna</h3>
    <div class="login">
       	   
        <form method="post" action="">
            
            <div class="form-group">
                <label for="reg">List Paket</label>
                <select class="form-control" name="reg">
                    <option value="1">30GB 11.900 30day (15GB malam 1GB yt,wa,fb 14GB Iflix)</option>
                    <!--<option value="2">3GB 22.900 30day(1GB 4G, 1GB all, 1GB yt)</option>-->
                    <!--<option value="3">5GB 32.900 30day(2GB 4G, 2GB all, 1GB yt)</option>-->
                    <!--<option value="4">9GB 52.900 30day(4GB 4G, 4GB all, 1GB yt)</option>-->
                    <!--<option value="5">17GB 82.900 30day(8GB 4G, 8GB all, 1GB yt)</option>-->
                    <!--<option value="6">25GB 102.900 30day(12GB 4G, 12GB all, 1GB yt)</option>-->

                    <!--<option value="7">700mb 10k (Nusantara1)</option>-->
                    <!--<option value="8">1.2GB 20k (Nusantara2)</option>-->
                    <!--<option value="9">35k (Nusantara3)</option>-->
                    <!--<option value="10">60k (Nusantara4)</option>-->

                    <!--<option value="11">XTRA Nelp&sms/ 30hari 39k</option>-->

                    <!--<option value="12">15GB 67,5rb 30day (Broadband/Mifi)</option>-->
                    <!--<option value="13">40GB 112,5rb 30day (Broadband/Mifi)</option>-->
                    <!--<option value="14">80GB 180rb 30day (Broadband/Mifi)</option>-->
                    <!--<option value="15">130GB 270rb 30day (Broadband/Mifi)</option>-->
                
                    <option value="16">Xtra Waze&Chat Rp.500 1day</option>
                    <option value="17">Xtra Waze&Chat Rp.1000 3day</option>
                    <option value="18">Xtra Waze&Chat Rp.2500 7day</option>
                    <option value="19">Xtra Sahur Chat&IG Rp.500 (00-07) 1day</option>
                    <option value="20">Xtra Sahur Chat&IG Rp.1000 (00-07) 3day</option>
                    <option value="21">Xtra Sahur Chat&IG Rp.2500 (00-07) 7day</option>
                
                    <option value="22">Xtra Ngabuburit Chat&IG Rp.500  1day</option>
                    <option value="23">Xtra Ngabuburit Chat&IG Rp.1000 3day</option>
                    <option value="24">Xtra Ngabuburit Chat&IG Rp.2500 7day</option>
        
                    <option value="25">Xtra Sahur Chat&FB Rp.500 (00-07) 1day</option>
                    <option value="26">Xtra Sahur Chat&FB Rp.1000 (00-07) 3day</option>
                    <option value="27">Xtra Sahur Chat&FB Rp.2500 (00-07) 7day</option>

                    <option value="28">Xtra Ngabuburit Chat&FB Rp.500  1day</option>
                    <option value="29">Xtra Ngabuburit Chat&FB Rp.1000 3day</option>
                    <option value="30">Xtra Ngabuburit Chat&FB Rp.2500 7day</option>
                    
                    <option value="31">Xtra Sahur Chat&Streaming Rp.500 (00-07) 1day</option>
                    <option value="32">Xtra Sahur Chat&Streaming Rp.1000(00-07) 3day</option>
                    <option value="33">Xtra Sahur Chat&Streaming Rp.2500(00-07) 7day</option>
                      
                    <option value="34">Xtra Ngabuburit Chat&Streaming Rp.500  1day</option>
                    <option value="35">Xtra Ngabuburit Chat&Streaming Rp.1000 3day</option>
                    <option value="36">Xtra Ngabuburit Chat&Streaming Rp.2500 7day</option>
                     
                    <option value="37">6GB 27k 30day ( 3GB yt 3GB Data)</option>
                    <option value="38">10GB 41k 30day ( 5GB yt 5GB Data)</option>
                    <option value="39">20GB 62k 30day ( 10GB yt 10GB Data) </option>
                    <option value="40">30GB 90k 30day ( 15GB yt 15GB Data)</option>

                    <!--<option value="41">3GB 19.900 30day</option>-->
                    <!--<option value="42">5GB 29.900 30day</option>-->
                    <!--<option value="43">9GB 49.900 30day</option>-->
                    <!--<option value="44">17GB 79.900 30day</option>-->
                    <!--<option value="45">25GB 99.900 30day</option>-->
                </select>
            </div>
            <button type="submit" name="dor" class="btn btn-success" >BeliPaket</button>
            <a class="btn btn-danger" href="logout.php">keluar</a>
            
        </form>
    </div>          
       
<div class="row">
    <div class="col mt-3">
        <p> &copy; 2018 By kumpul4semut</p>
    </div>
</div>


       
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
<?php 
$reg = @$_POST['reg'];

if(isset($_POST['dor'])){
        if($reg == ""){
            echo "<script>
                        alert('paket tidak diplih!');
                    </script>";
        }else{
            require_once("dor.php");
        }
}

?>


