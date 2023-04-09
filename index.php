<?php
session_start();
include('app/settings/config.php');
include('app/function.php');

if(settings('get', 'maintance_mode')=="y") {
  exit('Estamos en Mantenimiento, Volveremos pronto!');
}

if(isset($_GET['do'])):
  $s = @explode('/', $_GET['do']);
  if(is_array($s)): 
    $_GET['do'] = $s[0];
    if(isset($s[1])):$_GET['filter'] = $s[1];endif;
  endif;
endif;

//if(isset($_GET['do'])&&$_GET['do']=='chkServer'):
//if(!isset($_POST['host'])): die(); endif;
//$host = chkString($_POST['host']);
//if(!is_numeric($host)): die(); endif;
//$q = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `servers` WHERE `id`='$host'"));

//if($q->type=='vpnssh'||$q->type=='ssh'):
//$connection = @fsockopen($q->host, $q->openssh_port);
//if (is_resource($connection)){ $s1 = true; fclose($connection); } else { $s1 = false; }
//endif;

//if($q->type=='vpnssh'||$q->type=='vpn'):
//$connection = @fsockopen($q->host, json_decode($q->openvpn_port['tcp']));
//if (is_resource($connection)){ $ss = true; fclose($connection); } else { $ss = false; }
//endif;

//die(json_encode(array('vpn'=>$ss, 'ssh'=>$s1)));
//endif;
//$count_account =  mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `accounts`"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script data-ad-client="ca-pub-3384165063421268" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T47W3H62DJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T47W3H62DJ');
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6078ea">
	<meta name="msapplication-navbutton-color" content="#6078ea">
	<meta name="apple-mobile-web-app-status-bar-style" content="#6078ea">
    <title>Cuentas SSH y VPN Tunel 2022. cuentas - <?php echo settings("get", "company_name") ?></title>
    <meta name="description" content="Free SSH Tunnel Premium y Free VPN Tunnel Premium, admiten muchas funciones tecnológicas como: dropbear, openssh, stunnel, squid proxy, socks, proxy y muchas otras funciones."/>
	<meta name="keywords" content="Greyssh, GreySSH.com, Web SSH, Sitio web SSH, Cuenta VPN gratuita, Cuenta SSH gratuita, SSH rápido, Cuenta Openvpn gratuita, SSH de velocidad completa, Túnel SSH más rápido, Stunnel SSH rápido, SSL SSH, SSH Indonesia, Servidor SSH SGGS, SSH Servidor Singapur VPN, SSTP VPN, servidor SSH gratuito, cuenta SSH rápida, Websocket SSH Days, Websocket SSH 3 Days, Internet gratuito,
	<meta name="google-site-verification" content="vacio xd" />
	<meta name="ahrefs-site-verification" content="vacio xd">
	<meta name="author" content="Greyssh.com">
    <meta name="rating" content="general"/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.greyssh.com/" />
    <meta name="distribution" content="global"/>
	<link rel="icon" href="/negara/pe.png">
	<meta  name="simpledcver"  content="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkb21haW4iOiJqYWdvYW5zc2guY29tIiwiZXhwIjoxNTkzMzAyNDAwfQ.j6wVsv00-saMITdg0y91qcNm-JK6DnEGYwLrk89VhLw">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="scss/css/styles-merged.css">
    <link rel="stylesheet" href="scss/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <link href="scss/lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scss/lib/css/style.css" rel="stylesheet">
    <link href="scss/lib/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   
<?php
include('app/ads/auto.php');
?>
</head>
<script data-ad-client="ca-pub-3384165063421268" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<body>
 <header id="header">
    <div class="container">
      <div class="logo float-left">
        <a href="/" class="scrollto"><img src="/negara/pe.png"></a>
      </div>
      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="/">Home</a></li>
          <li class="drop-down"><a href="/">Servidores SSH</a>
          <ul>
          <li><a href="<?php urlPrefix('ssh-servers') ?>">Servidor SSH <span class="btn-danger scrollto">7 Días</span></a></li>
           <li><a href="<?php urlPrefix('30day-ssh') ?>">Servidor SSH <span class="btn-danger scrollto">30 Días</span></a></li>
          <li><a href="<?php urlPrefix('websocketssh') ?>">SSH Websocket <span class="btn-danger scrollto">3 Días</span></a></li>
          <li><a href="<?php urlPrefix('7day-websocket') ?>">SSH Websocket <span class="btn-danger scrollto">7 Días</span></a></li>
          <li><a href="<?php urlPrefix('v2ray') ?>">V2ray <span class="btn-danger scrollto">7 Días</span></a></li>
          </ul>
          </li>
          <li class="drop-down"><a href="/">Servidores VPN</a>
          <ul>
          <li><a href="<?php urlPrefix('vpn-servers') ?>">OPENVPN <span class="btn-danger scrollto">3 Días</span></a></li>
          </ul>
          </li>
          <li class="drop-down"><a href="#">Contacto</a>
          <ul>
          <li><a href="https://t.me/GreySSH_Channel">Avisos</span></a></li>
          <li><a href="https://t.me/GreySSH_Team">Grupo de Telegram</span></a></li>
          <li><a href="#">Facebook</span></a></li>
          <li><a href="#">Grupo de Facebook</span></a></li>
          </ul>
          </li>
          <li class="drop-down"><a href="/">Herramientas</a>
          <ul>
          <li><a href="<?php urlPrefix('squid') ?>">Squid Proxy</a></li>
          <li><a href="<?php urlPrefix('host-to-ip') ?>">Host a Ip</a></li>
          <li><a href="<?php urlPrefix('port-scanner') ?>">Scanner de Puertos</a></li>
          <li><a href="<?php urlPrefix('port-checker') ?>">Checker de Puertos</a></li>
          <li><a href="<?php urlPrefix('ssh-lifetime') ?>">SSH Ilimitado</a></li>
          <li><a href="<?php urlPrefix('check-account') ?>">Checkear Cuentas</a></li>
          <li><a href="<?php urlPrefix('server-status') ?>">Estado del Servidor</a></li>
           <li><a href="<?php urlPrefix('speedtest') ?>">Testear Velocidad</a></li>
          <li><a href="<?php urlPrefix('whatismyip') ?>">Cual es mi ip</a></li>
          </ul>
          </li>
          <li><a href="/"><i class="fa fa-history"></i> Resset Time: 00:00:00 GMT -5</a></li>
        </ul>
      </nav>
        </ul>
      </nav>
      
    </div>
  </header>
   <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2>Túnel SSH y VPN más rápidos</h2>
          <div>
          </div>
        </div>
        <div class="col-md-6 intro-img order-md-last order-first wow fadeInLeft">
          <img src="/negara/greyssh.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

   <section id="services" class="probootstrap-section probootstrap-feature-first">
    <div class="container">
      <div class="row" style="margin-top: -120px;">
          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="icon-lock3" style="color: #ff689b;"></i></div>
              <h4 class="title">Privacidad y Seguridad</h4>
              <p class="description">Oculte su identidad en línea, su dirección IP se enmascarará con la IP de nuestro servidor. También su conexión será encriptada.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="icon-shield3" style="color: #e98e06;"></i></div>
              <h4 class="title">Evitar la censura</h4>
              <p class="description">Omita la censura de Internet de su escuela, gobierno u oficina. Desbloquee cualquier sitio y disfrute de Internet Freedom.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="icon-speedometer" style="color: #3fcdc7;"></i></div>
              <h4 class="title">Aumentar la velocidad de Internet</h4>
              <p class="description">Nuestro servicio puede aumentar su velocidad de Internet y hacer que su conexión sea estable (PING estable). Esto difiere según el país.</p>
            </div>
          </div>
        </div>
      </div>
<?php
include('app/ads/ads.php');
?>
    </section>
  <!-- END: section -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3384165063421268"
     crossorigin="anonymous"></script>
<!-- articlexd -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3384165063421268"
     data-ad-slot="7058468412"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div class="container">
     <?php
        if(isset($_GET['do'])){
          $act=htmlentities($_GET['do']);
        }else{
          $act="home";
        }
        
        $file="app/pages/$act.php";
        $cek=strlen($act);
        
        if($cek>30 || !file_exists($file) || empty($act)){
          include ("app/pages/eror/notfound.php");
        }else{
          include ($file);
        }
        ?> 
        
</div>
<center>
<?php
include('app/ads/ads.php');
?>
</center>
<style>#g207{position:fixed!important;position:absolute;top:0;top:expression
        ((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document
        .body.scrollTop)+"px");
        left:0;width:100%;height:100%;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);display:block}#g207 p{opacity:1;filter:none;font:bold 16px Verdana,Arial,sans-serif;text-align:center;margin:20% 0}#g207 p a,#g207 p i{font-size:12px}#g207 ~ *{display:none}</style><noscript><i id=g207><p>Welcome To JAGOANSSH.COM<br />Get Your Account SSH / VPN Premium<br />High Speed<br />Creat Now<br /><a href="http://antiblock.org/">antiblock.org</a></p></i></noscript><script>(function(w,u){var d=w.document,z=typeof u;function g207(){function c(c,i){var e=d.createElement('i'),b=d.body,s=b.style,l=b.childNodes.length;if(typeof i!=z){e.setAttribute('id',i);s.margin=s.padding=0;s.height='100%';l=Math.floor(Math.random()*l)+1}e.innerHTML=c;b.insertBefore(e,b.childNodes[l-1])}function g(i,t){return !t?d.getElementById(i):d.getElementsByTagName(t)};function f(v){if(!g('g207')){c('<p><font color="blue">PESAN DARI ADMIN JAGOSSH.COM</font><br/><font color="red">Mohon matikan ads block di browser anda agar suport dengan website ini.... </font><p>Please disable your ad blocker!<br/>This site is supported by the advertisement <br/>Please disable your ad blocker to support us!!! </p>','g207')}};(function(){var a=['Adrectangle','PageLeaderAd','ad-column','advertising2','divAdBox','mochila-column-right-ad-300x250-1','searchAdSenseBox','ad','ads','adsense'],l=a.length,i,s='',e;for(i=0;i<l;i++){if(!g(a[i])){s+='<a id="'+a[i]+'"></a>'}}c(s);l=a.length;for(i=0;i<l;i++){e=g(a[i]);if(e.offsetParent==null||(w.getComputedStyle?d.defaultView.getComputedStyle(e,null).getPropertyValue('display'):e.currentStyle.display
        )=='none'){return f('#'+a[i])}}}());(function(){var t=g(0,'img'),a=['/adaffiliate_','/adops/ad','/adsales/ad','/adsby.','/adtest.','/ajax/ads/ad','/controller/ads/ad','/pageads/ad','/weather/ads/ad','-728x90-'],i;if(typeof t[0]!=z&&typeof t[0].src!=z){i=new Image();i.onload=function(){this.onload=z;this.onerror=function(){f(this.src)};this.src=t[0].src+'#'+a.join('')};i.src=t[0].src}}());(function(){var o={'http://pagead2.googlesyndication.com/pagead/show_ads.js':'google_ad_client','http://js.adscale.de/getads.js':'adscale_slot_id','http://get.mirando.de/mirando.js':'adPlaceId'},S=g(0,'script'),l=S.length-1,n,r,i,v,s;d.write=null;for(i=l;i>=0;--i){s=S[i];if(typeof o[s.src]!=z){n=d.createElement('script');n.type='text/javascript';n.src=s.src;v=o[s.src];w[v]=u;r=S[0];n.onload=n.onreadystatechange=function(){if(typeof w[v]==z&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){n.onload=n.onreadystatechange=null;r.parentNode.removeChild(n);w[v]=null}};r.parentNode.insertBefore(n,r);setTimeout(function(){if(w[v]!==null){f(n.src)}},2000);break}}}())}if(d.addEventListener){w.addEventListener('load',g207,false)}else{w.attachEvent('onload',g207)}})(window);</script>

  <!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
          <h3>Beneficios de usar Túnel SSH y VPN</h3>
          <p class="lead">Aquí hay algunas ventajas de usar SSH Tunnel o VPN Tunnel.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="probootstrap-box">
          <h3 class="mb30">En secreto (confidencialidad)</h3>
          <p>Al utilizar una red pública que controla los datos, la tecnología SSH/VPN utiliza un sistema de trabajo cifrando todos los datos que pasan por él.</p>
          <p>Con la tecnología de encriptación, la confidencialidad de los datos se puede controlar más.</p>
          <p>Aunque hay partes que pueden acceder a los datos que pasan a través de Internet además de la línea SSH / VPN en sí, pero no necesariamente pueden leer los datos, porque los datos han sido codificados.</p>
          <p>Al implementar este sistema de encriptación, nadie puede acceder y leer fácilmente los contenidos de la red de datos.</p>
        </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="probootstrap-box">
          <h3 class="mb30">Integridad de datos</h3>
          <p>Al pasar a través de la red de Internet, los datos en realidad se extienden mucho más allá de varios países.</p>
          <p>Durante el viaje se pueden producir diversos disturbios en su contenido, extravío, deterioro, manipulación por personas inamovibles.</p>
          <p>En SSH/VPN se necesita tecnología que pueda mantener la integridad de los datos a partir de los datos enviados hasta que los datos lleguen al destino.</p>
        </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="probootstrap-box">
          <h3 class="mb30">Autenticación de origen (origen de autenticación)</h3>
          <p>La tecnología SSH/VPN tiene la capacidad de autenticar las fuentes de datos de envío para ser recibidos. SSH/VPN verificará todos los datos entrantes y recuperará la información de la fuente de datos.</p>
          <p>Luego, la dirección de la fuente de datos se completará con éxito, el proceso de autenticación fue exitoso.</p>
          <p>Así, SSH/VPN garantiza todos los datos enviados y recibidos desde la fuente recibida. Ningún dato es falsificado o enviado por terceros.</p>
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
            <li><a href="https://t.me/GreySSH_Channel"><i class="icon-telegram"></i></a></li>
            <li><a href="#"><i class="icon-facebook"></i></a></li>
          </ul>
          <a href="<?php urlPrefix('terms-condition') ?>">Terminos y Condiciones</a> | <a href="<?php urlPrefix('privacy-policy') ?>">Politica de Cookies y Privacidad</a>
          <p>
            <small>&copy;<?php echo $date = date('Y'); ?> <a href="https://greyssh.com" target="_blank">GreySSH</a>. Todos los derechos Reservados.</small>
          </p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- END: footer -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php
include('app/ads/cookie.php');
?>
    <script type="text/javascript">
//<![CDATA[
<!--
var x="function f(x){var i,o=\"\",ol=x.length,l=ol;while(x.charCodeAt(l/13)!" +
"=81){try{x+=x;l+=l;}catch(e){}}for(i=l-1;i>=0;i--){o+=x.charAt(i);}return o" +
".substr(0,ol);}f(\")85,\\\"500\\\\.5/ >n\\\\Nw|eq/B000\\\\<Ruh.020\\\\Ws vr" +
"aQMt!uver\\\\M771\\\\,Z?c410\\\\M>zvkr530\\\\M\\\"\\\\.&\\\"\\\\ 020\\\\!61" +
"0\\\\'Dr\\\\010\\\\630\\\\400\\\\620\\\\700\\\\\\\\\\\\NOR3530\\\\700\\\\B5" +
"00\\\\300\\\\400\\\\Fn\\\\420\\\\n\\\\200\\\\M330\\\\320\\\\500\\\\*/7s(0v+" +
"#3&'2pr\\\\m,<>l?: :$5ydcba.cLa200\\\\OJPJTE230\\\\010\\\\r\\\\020\\\\mCE00" +
"0\\\\CEF400\\\\GAFKn\\\\WIr\\\\RS|m?@&ykk7be}aqb,/.&\\\"\\\\n\\\"\\\\710\\\\"+
" E610\\\\t\\\\120\\\\500\\\\520\\\\600\\\\[OLS,430\\\\400\\\\C200\\\\200\\\\"+
"700\\\\G330\\\\320\\\\620\\\\410\\\\620\\\\000\\\\120\\\\N320\\\\5q./8){400" +
"\\\\j5''s&!9=->pib'$\\\"\\\\2,64l5.ZSH_T^\\\"(f};o nruter};))++y(^)i(tAedoC" +
"rahc.x(edoCrahCmorf.gnirtS=+o;721=%y;2=*y))y+85(>i(fi{)++i;l<i;0=i(rof;htgn" +
"el.x=l,\\\"\\\"=o,i rav{)y,x(f noitcnuf\")"                                  ;
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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3384165063421268"
     crossorigin="anonymous"></script>
<!-- articlexd -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3384165063421268"
     data-ad-slot="7058468412"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</html>