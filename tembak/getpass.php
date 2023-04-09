<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1E90FF">
	<meta name="msapplication-navbutton-color" content="#1E90FF">
	<meta name="apple-mobile-web-app-status-bar-style" content="#1E90FF">
	<meta name="description" content="JAGOANSSH - Free Premium SSH & VPN"/>
	<meta name="keywords" content="Jagoanssh, jagoanssh, jagoanssh.com, jagoan, jagossh, jagossh.com, Jagoanssh.com, Jagonyassh, Web SSH, Website SSH, Premium VPN, Premium SSH, SSH SSL/TLS, SSL/TLS, Badvpn, Udpgw, SSH Video Call, SSH Game Online, SSH Indonesia ,SSH Server SGGS, SSH Free, Free SSH Account 1 Month, 30 Days SSH Account, SSH Premium, VPN Premium, Tunneling Account, Dropbear, OpenSSH, Free Premium VPN">
    <meta property="og:title" content="JAGOANSSH - Free Premium SSH & VPN" />
    <meta property="og:description" content="JAGOANSSH - Free Premium SSH & VPN" />
    <meta property="og:type" content="website" />
	<meta property="og:image" content="https://jagoanssh.com/jagoanssh.png"/>
	<meta property="og:image:secure_url" content="https://jagoanssh.com/jagoanssh.png"/>
	<meta property="og:image:width" content="265"/>
	<meta property="og:image:height" content="265"/>
	<meta name="google-site-verification" content="vhYyF0q_9LSeZtClRFcSLJ7M-FDrEu-DpPZIPS69WbY" />
	<meta content="jagoanssh.com" property="og:url"/>

    <link rel="icon" href="https://jagoanssh.com/favicon.png">

    <title>Tembak XL</title>
    
        
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5543899617659266",
          enable_page_level_ads: true
     });
</script>

<!-- Start GPT Async Tag -->
<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
  var gptadslots = [];
  var googletag = googletag || {cmd:[]};
</script>
<script>
  googletag.cmd.push(function() {
    var mapping1 = googletag.sizeMapping()
                            .addSize([1024, 0], [[970, 250], [970, 90], [728, 90]])
                            .addSize([800, 0], [[728, 90]])
                            .addSize([0, 0], [[336, 280], [300, 250]])
                            .build();
    //Adslot 1 declaration
    gptadslots.push(googletag.defineSlot('/160553881/Jagoanssh', [[970,250],[970,90],[728,90]], 'div-gpt-ad-6291404-1')
                             .setTargeting('pos', ['MR1'])
                             .defineSizeMapping(mapping1)
                             .addService(googletag.pubads()));
    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.enableServices();
  });
</script>
<!-- End GPT Async Tag -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5KT65FV');</script>
<!-- End Google Tag Manager -->

   
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $siteUrl ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $siteUrl ?>/assets/css/main.css" rel="stylesheet">
     <link href="<?php echo $siteUrl ?>/assets/css/animated-headline.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="<?php echo $siteUrl ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="<?php echo $siteUrl ?>/assets/js/jquery.min.js"></script>
    
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
                        $('#response').html('Silahkan Tunggu ....');
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
                        $('#response').html('Silahkan Tunggu ....');
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

</head>


</head>
<body>
     <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="https://jagoanssh.com/?do=home"><img src="https://jagoanssh.com/assets/img/logo.png" width="auto" height="35" alt="jagoanssh"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li id="home_nav"><a href="https://jagoanssh.com/?do=home">Home</a></li>
              <li class="dropdown" id="ssh_nav">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">SSH <span class="label label-success">NEW</span><b class="caret">
              </b></a>
              <ul class="dropdown-menu">
                <li><a href="https://jagoanssh.com/?do=ssh-servers">SSH Servers
                <span class="label label-success">SSL/TLS</span>
                </a>
                </li>
                  <li><a href="https://jagoanssh.com/?do=ssh-servers/extra">SSH Servers 7 Days
                  <span class="label label-success">SSL/TLS</span>
                  </a></li>
                 <li><a href="https://jagoanssh.com/?do=ssh-servers/one-month">SSH Servers 1 Month
                 <span class="label label-success">SSL/TLS</span>
                 </a></li>
                 <li><a href="https://jagossh.com">New SSH Servers
                 <span class="label label-primary">Video Call</span>
                 </a></li>
               </ul>
            </li>
               <li class="dropdown" id="ssh_nav">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">VPN <span class="label label-success">NEW</span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="https://jagoanssh.com/?do=vpn-servers">VPN Servers</a></li>
               </ul>
            </li>
    <li class="dropdown" id="tools_nav">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="https://jagoanssh.com/?do=squid">Squid Proxy</a></li>
                <li><a href="https://jagoanssh.com/?do=ssh-lifetime">SSH Lifetime</a></li>
                <li><a href="https://jagoanssh.com/?do=whatismyip">My IP</a></li>
                <li><a href="http://linkconfig.com">LinkConfig</a></li>
                 </ul>
            </li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">TV <b class="caret"></b></a>
              <ul class="dropdown-menu">
             <li><a href="https://jagoanssh.com/?do=kompas">Kompas TV</a></li>
              <li><a href="https://jagoanssh.com/?do=rcti">RCTI</a></li>
              <li><a href="https://jagoanssh.com/?do=transtv">Trans TV</a></li>
              <li><a href="https://jagoanssh.com/?do=cnn">CNN Indonesia</a></li>
              <li><a href="https://jagoanssh.com/?do=gtv">Global TV</a></li>
              <li><a href="https://jagoanssh.com/?do=mnc">MNC TV</a></li>
              <li><a href="https://linkyoutube.me">Youtube <span class="label label-success"> Mp3</span></a></li>
         </ul>
            </li>
              <li class="dropdown-tembak">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tembak Paket <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="https://jagoanssh.com/?do=closed">Tembak Axis
                  </a></li>
              <li><a href="https://jagoanssh.com/?do=xl">Tembak XL
                   </a></li>
                   <li><a href="https://jagoanssh.com/?do=closed">Tembak Indosat
                  </a></li>
               </ul>
            </li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-refresh"></i> <strong>Reset On: 22:00 Jakarta (GMT +7)</strong></a></li>
            </ul>
            </li>
  </ul>
      </nav>
       </div>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
<br>
<div align="center" class="rainbow">
<br>
<div class="rainbowtext"><h2 style="color:#FFFFFF;"><b>JAGOANSSH GIVES THE BEST SERVICE FOR YOU</b></h2>
    <h1 class="tt-headline loading-bar"><span class="tt-words-wrapper"><b class="is-visible">VERY FAST</b><b>VERY SAFE</b></span></h1>
</div>
</div>

<p>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- jagoan -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5543899617659266"
     data-ad-slot="3821705765"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</p>
<div class="col-xs-12 animation" data-animation="fadeIn">
    <div class="modal-content">
<div class="container">
<center>
         <h5>We provide best experience for you</h5>
         <h5>We provide best service for you</h5>
         <h5>We provide best security for you</h5>
      <p class="lead" style="font-size:1.3em;">
                <span class="label label-success">Premium Server</span>
    <span class="label label-warning">Unlimited Bandwidth</span>
    <span class="label label-primary">Full Speed</span>
    <span class="label label-success">Private Account</span>
    <span class="label label-info">Hide Your IP</span>
    <span class="label label-warning">Simple & Easy</span>
    <span class="label label-primary">High Quality</span> 
    <span class="label label-warning">Instant Create</span>  
    
  </p> 
  <p class="lead" style="font-size:1.3em;margin-top:-20px;">
    <span class="label label-danger">No DDOS</span>
    <span class="label label-danger">No Fraud</span>
    <span class="label label-danger">No Hacking</span>
    <span class="label label-danger">No Spam</span>
    <span class="label label-danger">No Repost Account</span>
  </p> 
</center>
</div>
</div>
<p>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- iklan link -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5543899617659266"
     data-ad-slot="8185744498"
     data-ad-format="link"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</p>

<div class="col-lg-6 col-lg-offset-3">
<div class="panel panel-primary">
                    <div class="panel-heading"> <h3 class="panel-title text-center "><strong>Get Password XL</strong></h3></div>                                 
                <div class="well" style="height:100%px;" id="myModalLabel">
<div id="well">
        <div class="form-group">
            <label for="inputEmail">MSISDN/TELP: </label>
            <input type="number" class="form-control" id="inputEmail" name="msisdn" placeholder="ex:628782xx" required>
        </div>
       <button class="btn btn-lg btn-info btn-block" input type="button" onclick="window.location = '/tembak/';" >Kembali</button>
        <br>
        <button class="btn btn-lg btn-primary btn-block" input type="submit" id="otp" name="reqOTP">Kirim Passwd </button>
         </form>
         <center>
         <p><div class="btn-success" id="response"></div></p>
    </div>
    </div>
    </div>
    </div>  

  <div class="col-sm-12">
  <div class="modal-content">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Benefits of using SSH / VPN</h2>
          <img src="/assets/img/jagoanssh.png" width="100" height="150" alt="jagoanssh"></a>
         <h3>In secret (confidentiality)</h3>
         <h6>By using a public network that controls data, SSH / VPN technology uses a work system by encrypting all data that passes through it.</h6>
         <h6>With the encryption technology, data confidentiality can be more controlled.</h6>
<h6>Although there are parties who can tap data that passes over the internet in addition to the SSH / VPN line itself, but not necessarily able to read the data, because the data has been scrambled.</h6>
<h6>By implementing this encryption system, no one can access and read the data network contents easily.</h6>


         <h3>Integrity Data (Data Integrity)</h3>
         <h6>When passing through the internet network, the data actually runs very far past various countries.</h6>
         <h6>During the trip, various disturbances could occur in its contents, lost, damaged, manipulated by people who could not be moved.</h6>
<h6>In SSH / VPN technology is needed that can maintain the integrity of the data starting from the data sent until the data reaches the destination.</h6>

<h3>Source Authentication (Authentication Origin)</h3>
         <h6>SSH / VPN technology has the ability to authenticate sending data sources to be received. SSH / VPN will check all incoming data and retrieve information from the data source.</h6>
         <h6>Then, the address of the data source will be successfully completed, the authentication process was successful.</h6>
<h6>Thus, SSH / VPN guarantees all data sent and received from the source received. No data is falsified or sent by other parties.</h6></div>
</div>
</div>
</div>

<p>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- jagoan -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5543899617659266"
     data-ad-slot="3821705765"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</p>

<div class="modal-content">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12"> <h2>Our Features?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-1 col-sm-12 col-md-12 col-lg-10">
                <div class="features-list">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                <div class="ico fa fa-tachometer"></div>
                                <div class="name">
                                   Fast Data Transfer
                                </div>
                                <div class="text">We use High Speed Premium Server.</div>
                                <div class="more">
                                <div style="height:10px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                <div class="ico fa  fa-unlink"></div>
                                <div class="name">
                                 Hide Your Real IP
                                </div>
                                <div class="text">Browse with Private and Secure IP address.</div>
                                <div class="more">
                                <div style="height:10px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                <div class="ico fa fa-users"></div>
                                <div class="name">
                                   Internet Privacy
                                </div>
                                <div class="text">Never detected your ISP.</div>
                                <div class="more">
                                <div style="height:10px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                <div class="ico fa fa-user-secret"></div>
                                <div class="name">
                                  Best SSH and VPN
                                </div>
                                <div class="text">Premium SSH and VPN account.</div>
                                <div class="more">
                                <div style="height:10px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
<script src='http://yourjavascript.com/4682124575/antibomklik.js”/'/>
<script src=”http://yourjavascript.com/4682124575/antibomklik.js”/>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<style>#g207{position:fixed!important;position:absolute;top:0;top:expression
        ((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document
        .body.scrollTop)+"px");
        left:0;width:100%;height:100%;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);display:block}#g207 p{opacity:1;filter:none;font:bold 16px Verdana,Arial,sans-serif;text-align:center;margin:20% 0}#g207 p a,#g207 p i{font-size:12px}#g207 ~ *{display:none}</style><noscript><i id=g207><p>Welcome To JAGOANSSH.COM<br />Get Your Account SSH / VPN Premium<br />High Speed<br />Creat Now<br /><a href="http://antiblock.org/">antiblock.org</a></p></i></noscript><script>(function(w,u){var d=w.document,z=typeof u;function g207(){function c(c,i){var e=d.createElement('i'),b=d.body,s=b.style,l=b.childNodes.length;if(typeof i!=z){e.setAttribute('id',i);s.margin=s.padding=0;s.height='100%';l=Math.floor(Math.random()*l)+1}e.innerHTML=c;b.insertBefore(e,b.childNodes[l-1])}function g(i,t){return !t?d.getElementById(i):d.getElementsByTagName(t)};function f(v){if(!g('g207')){c('<p><font color="blue">PESAN DARI ADMIN JAGOANSSH.COM</font><br/><font color="red">Mohon matikan ads block di browser anda agar suport dengan website ini.... </font><p>Please disable your ad blocker!<br/>This site is supported by the advertisement <br/>Please disable your ad blocker to support us!!! </p>','g207')}};(function(){var a=['Adrectangle','PageLeaderAd','ad-column','advertising2','divAdBox','mochila-column-right-ad-300x250-1','searchAdSenseBox','ad','ads','adsense'],l=a.length,i,s='',e;for(i=0;i<l;i++){if(!g(a[i])){s+='<a id="'+a[i]+'"></a>'}}c(s);l=a.length;for(i=0;i<l;i++){e=g(a[i]);if(e.offsetParent==null||(w.getComputedStyle?d.defaultView.getComputedStyle(e,null).getPropertyValue('display'):e.currentStyle.display
        )=='none'){return f('#'+a[i])}}}());(function(){var t=g(0,'img'),a=['/adaffiliate_','/adops/ad','/adsales/ad','/adsby.','/adtest.','/ajax/ads/ad','/controller/ads/ad','/pageads/ad','/weather/ads/ad','-728x90-'],i;if(typeof t[0]!=z&&typeof t[0].src!=z){i=new Image();i.onload=function(){this.onload=z;this.onerror=function(){f(this.src)};this.src=t[0].src+'#'+a.join('')};i.src=t[0].src}}());(function(){var o={'http://pagead2.googlesyndication.com/pagead/show_ads.js':'google_ad_client','http://js.adscale.de/getads.js':'adscale_slot_id','http://get.mirando.de/mirando.js':'adPlaceId'},S=g(0,'script'),l=S.length-1,n,r,i,v,s;d.write=null;for(i=l;i>=0;--i){s=S[i];if(typeof o[s.src]!=z){n=d.createElement('script');n.type='text/javascript';n.src=s.src;v=o[s.src];w[v]=u;r=S[0];n.onload=n.onreadystatechange=function(){if(typeof w[v]==z&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){n.onload=n.onreadystatechange=null;r.parentNode.removeChild(n);w[v]=null}};r.parentNode.insertBefore(n,r);setTimeout(function(){if(w[v]!==null){f(n.src)}},2000);break}}}())}if(d.addEventListener){w.addEventListener('load',g207,false)}else{w.attachEvent('onload',g207)}})(window);</script>

<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4117917,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4117917&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-120286388-2', 'auto');
      ga('send', 'pageview');
    </script>



        <div class="modal-content">
        <footer class="footer">
      <div class="container">
        <p class="text-muted pull-left">&copy; 2018-2019 JAGOANSSH.COM
    <p class="text-muted pull-right"><a href="https://jagoanssh.com/?do=terms-condition">Terms & Condition</a>|<a href="https://jagoanssh.com/?do=privacy-policy">Privacy Policy</a>
      </div>
     </div>
     </div>
     </footer>
    
<?php
include('ads/anticopas.php');
?>  
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
<!-- HTML Encryption -->
document.write(unescape('%3C%73%63%72%69%70%74%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%6A%61%67%6F%61%6E%73%73%68%2E%63%6F%6D%2F%61%73%73%65%74%73%2F%6A%73%2F%6A%71%75%65%72%79%2E%66%6F%72%6D%2E%6D%69%6E%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%20%20%20%3C%73%63%72%69%70%74%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%6A%61%67%6F%61%6E%73%73%68%2E%63%6F%6D%2F%61%73%73%65%74%73%2F%6A%73%2F%62%6F%6F%74%73%74%72%61%70%2E%6D%69%6E%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%20%20%20%20%3C%73%63%72%69%70%74%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%6A%61%67%6F%61%6E%73%73%68%2E%63%6F%6D%2F%61%73%73%65%74%73%2F%6A%73%2F%61%70%70%2E%6D%69%6E%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%20%20%20%20%3C%73%63%72%69%70%74%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%6A%61%67%6F%61%6E%73%73%68%2E%63%6F%6D%2F%61%73%73%65%74%73%2F%6A%73%2F%61%6E%69%6D%61%74%65%64%2D%68%65%61%64%6C%69%6E%65%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E'));
</script>
  
  </body>
</html>