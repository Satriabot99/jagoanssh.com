<?php

include("tembak.php");

if (!empty($_SESSION['session'])){
    Header("Location:index.php");
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
    <meta name="description" content="Jagoanssh - Tembak Masa Aktif Axis"/>
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
    <link href="/scss/lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/scss/lib/css/style.css" rel="stylesheet">
    <link href="/scss/lib/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <script type="text/javascript">document.write('\u0020\u003C\u0073\u0063\u0072\u0069\u0070\u0074\u003E\u000A\u0020\u0020\u0020\u0020\u0024\u0028\u0064\u006F\u0063\u0075\u006D\u0065\u006E\u0074\u0029\u002E\u0072\u0065\u0061\u0064\u0079\u0028\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0022\u0023\u006F\u0074\u0070\u0022\u0029\u002E\u0063\u006C\u0069\u0063\u006B\u0028\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0065\u0076\u0065\u006E\u0074\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0065\u0076\u0065\u006E\u0074\u002E\u0070\u0072\u0065\u0076\u0065\u006E\u0074\u0044\u0065\u0066\u0061\u0075\u006C\u0074\u0028\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0076\u0061\u0072\u0020\u006D\u0073\u0069\u0073\u0064\u006E\u003D\u006A\u0051\u0075\u0065\u0072\u0079\u0028\u0027\u0069\u006E\u0070\u0075\u0074\u005B\u006E\u0061\u006D\u0065\u003D\u0022\u006D\u0073\u0069\u0073\u0064\u006E\u0022\u005D\u0027\u0029\u002E\u0076\u0061\u006C\u0028\u0029\u003B\u000A\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u002E\u0061\u006A\u0061\u0078\u0028\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0074\u0079\u0070\u0065\u003A\u0027\u0050\u004F\u0053\u0054\u0027\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0075\u0072\u006C\u003A\u0027\u006D\u0069\u006E\u0074\u0061\u006F\u0074\u0070\u002E\u0070\u0068\u0070\u0027\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0064\u0061\u0074\u0061\u003A\u007B\u006D\u0073\u0069\u0073\u0064\u006E\u003A\u006D\u0073\u0069\u0073\u0064\u006E\u007D\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0065\u0072\u0072\u006F\u0072\u003A\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0078\u0068\u0072\u002C\u0061\u006A\u0061\u0078\u004F\u0070\u0074\u0069\u006F\u006E\u0073\u002C\u0074\u0068\u0072\u006F\u0077\u006E\u0045\u0072\u0072\u006F\u0072\u0029\u007B\u0024\u0028\u0027\u0023\u0072\u0065\u0073\u0070\u006F\u006E\u0073\u0065\u0027\u0029\u002E\u0068\u0074\u006D\u006C\u0028\u0078\u0068\u0072\u0029\u003B\u007D\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0063\u0061\u0063\u0068\u0065\u003A\u0066\u0061\u006C\u0073\u0065\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0062\u0065\u0066\u006F\u0072\u0065\u0053\u0065\u006E\u0064\u003A\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0022\u002E\u0066\u006F\u0072\u006D\u002D\u0063\u006F\u006E\u0074\u0072\u006F\u006C\u0022\u0029\u002E\u0061\u0074\u0074\u0072\u0028\u0022\u0064\u0069\u0073\u0061\u0062\u006C\u0065\u0064\u0022\u002C\u0020\u0074\u0072\u0075\u0065\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0027\u0023\u0072\u0065\u0073\u0070\u006F\u006E\u0073\u0065\u0027\u0029\u002E\u0068\u0074\u006D\u006C\u0028\u0022\u003C\u0069\u006D\u0067\u0020\u0073\u0072\u0063\u003D\u0027\u002F\u0061\u0073\u0073\u0065\u0074\u0073\u002F\u0069\u006D\u0067\u002F\u0061\u006A\u0061\u0078\u002D\u006C\u006F\u0061\u0064\u0065\u0072\u002E\u0067\u0069\u0066\u0027\u0020\u002F\u003E\u0022\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0073\u0075\u0063\u0063\u0065\u0073\u0073\u003A\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0073\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0022\u002E\u0066\u006F\u0072\u006D\u002D\u0063\u006F\u006E\u0074\u0072\u006F\u006C\u0022\u0029\u002E\u0061\u0074\u0074\u0072\u0028\u0022\u0064\u0069\u0073\u0061\u0062\u006C\u0065\u0064\u0022\u002C\u0020\u0066\u0061\u006C\u0073\u0065\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0027\u0023\u0072\u0065\u0073\u0070\u006F\u006E\u0073\u0065\u0027\u0029\u002E\u0068\u0074\u006D\u006C\u0028\u0073\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0072\u0065\u0074\u0075\u0072\u006E\u0020\u0066\u0061\u006C\u0073\u0065\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0022\u0023\u006C\u006F\u0067\u0069\u006E\u0022\u0029\u002E\u0063\u006C\u0069\u0063\u006B\u0028\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0065\u0076\u0065\u006E\u0074\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0065\u0076\u0065\u006E\u0074\u002E\u0070\u0072\u0065\u0076\u0065\u006E\u0074\u0044\u0065\u0066\u0061\u0075\u006C\u0074\u0028\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0076\u0061\u0072\u0020\u006D\u0073\u0069\u0073\u0064\u006E\u003D\u006A\u0051\u0075\u0065\u0072\u0079\u0028\u0027\u0069\u006E\u0070\u0075\u0074\u005B\u006E\u0061\u006D\u0065\u003D\u0022\u006D\u0073\u0069\u0073\u0064\u006E\u0022\u005D\u0027\u0029\u002E\u0076\u0061\u006C\u0028\u0029\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0070\u0061\u0073\u0073\u0077\u0064\u003D\u006A\u0051\u0075\u0065\u0072\u0079\u0028\u0027\u0069\u006E\u0070\u0075\u0074\u005B\u006E\u0061\u006D\u0065\u003D\u0022\u0070\u0061\u0073\u0073\u0077\u0064\u0022\u005D\u0027\u0029\u002E\u0076\u0061\u006C\u0028\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u002E\u0061\u006A\u0061\u0078\u0028\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0074\u0079\u0070\u0065\u003A\u0027\u0050\u004F\u0053\u0054\u0027\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0075\u0072\u006C\u003A\u0027\u0067\u0065\u0074\u006C\u006F\u0067\u0069\u006E\u002E\u0070\u0068\u0070\u0027\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0064\u0061\u0074\u0061\u003A\u007B\u006D\u0073\u0069\u0073\u0064\u006E\u003A\u006D\u0073\u0069\u0073\u0064\u006E\u002C\u0070\u0061\u0073\u0073\u0077\u0064\u003A\u0070\u0061\u0073\u0073\u0077\u0064\u007D\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0065\u0072\u0072\u006F\u0072\u003A\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0078\u0068\u0072\u002C\u0061\u006A\u0061\u0078\u004F\u0070\u0074\u0069\u006F\u006E\u0073\u002C\u0074\u0068\u0072\u006F\u0077\u006E\u0045\u0072\u0072\u006F\u0072\u0029\u007B\u0024\u0028\u0027\u0023\u0072\u0065\u0073\u0070\u006F\u006E\u0073\u0065\u0027\u0029\u002E\u0068\u0074\u006D\u006C\u0028\u0078\u0068\u0072\u0029\u003B\u007D\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0063\u0061\u0063\u0068\u0065\u003A\u0066\u0061\u006C\u0073\u0065\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0062\u0065\u0066\u006F\u0072\u0065\u0053\u0065\u006E\u0064\u003A\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0022\u002E\u0066\u006F\u0072\u006D\u002D\u0063\u006F\u006E\u0074\u0072\u006F\u006C\u0022\u0029\u002E\u0061\u0074\u0074\u0072\u0028\u0022\u0064\u0069\u0073\u0061\u0062\u006C\u0065\u0064\u0022\u002C\u0020\u0074\u0072\u0075\u0065\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0027\u0023\u0072\u0065\u0073\u0070\u006F\u006E\u0073\u0065\u0027\u0029\u002E\u0068\u0074\u006D\u006C\u0028\u0022\u003C\u0069\u006D\u0067\u0020\u0073\u0072\u0063\u003D\u0027\u002F\u0061\u0073\u0073\u0065\u0074\u0073\u002F\u0069\u006D\u0067\u002F\u0061\u006A\u0061\u0078\u002D\u006C\u006F\u0061\u0064\u0065\u0072\u002E\u0067\u0069\u0066\u0027\u0020\u002F\u003E\u0022\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u002C\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0073\u0075\u0063\u0063\u0065\u0073\u0073\u003A\u0066\u0075\u006E\u0063\u0074\u0069\u006F\u006E\u0028\u0073\u0029\u007B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0022\u002E\u0066\u006F\u0072\u006D\u002D\u0063\u006F\u006E\u0074\u0072\u006F\u006C\u0022\u0029\u002E\u0061\u0074\u0074\u0072\u0028\u0022\u0064\u0069\u0073\u0061\u0062\u006C\u0065\u0064\u0022\u002C\u0020\u0066\u0061\u006C\u0073\u0065\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0024\u0028\u0027\u0023\u0072\u0065\u0073\u0070\u006F\u006E\u0073\u0065\u0027\u0029\u002E\u0068\u0074\u006D\u006C\u0028\u0073\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0072\u0065\u0074\u0075\u0072\u006E\u0020\u0066\u0061\u006C\u0073\u0065\u003B\u000A\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u007D\u0029\u003B\u000A\u0020\u0020\u0020\u0020\u007D\u0029\u003B\u000A\u003C\u002F\u0073\u0063\u0072\u0069\u0070\u0074\u003E');</script>    
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    
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
        <div class="col-md-8 col-md-offset-2 section-heading mb50 text-center">
          <h2 class="title">Tembak Masa Aktif Axis</h2>
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
    <span class="btn btn-outline-primary">Free SSH Accounts</span>
    <span class="btn btn-outline-success">Free VPN Accounts</span>
    <span class="btn btn-outline-danger">Unlimited Bandwidth</span>
    <span class="btn btn-outline-warning">Full Speed SSH</span>
    <span class="btn btn-outline-info">SSH SSL Accounts</span>
    <span class="btn btn-outline-success">Fast SSH Servers</span>
    <span class="btn btn-outline-dark">Fast VPN Servers</span>
    </p>
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
<h1>Masa Aktif Axis</h1></center>
    <div class="form-group">Key Auth:
    <input type="text" class="form-control" name="msisdn" placeholder="auth code" required></div>
   <div class="form-group">ID:
     <div class="form-group">Password:        
    <input type="text" class="form-control" name="passwd" placeholder="password"></div> 
    <div align="center">
    <button class="btn btn-success" input type="submit" id="otp" name="reqOTP">Lanjutkan</button>
    <p><div id="response"></div></p>
<?php
include('ads/ads.php');
?>
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
  
<?php
include('ads/ads.php');
?>
  
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
            <small>&copy; 2020 <a href="https://jagoanssh.com/" target="_blank">Jagoanssh.com</a>. All Rights Reserved.</small>
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