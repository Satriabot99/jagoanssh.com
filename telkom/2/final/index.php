<?php

//LAST SCAN: 00022754
include "module.php";

//set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days)
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
// ini_set('session.save_path', '/home/yoursite/sessions'); //maybe you want to precise the save path as well

date_default_timezone_set('Asia/Jakarta');
if (phpversion() >= "5.4.0") {
    // =PHP7
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
} else {
    if (session_id() == '') {
        session_start();
    }
}

function _log($str){
    $file = "absurd98928982.txt"; 
    $str = '['.date("d.m.Y - H:i:s"). ']' . $str;
    
    if (file_exists($file)) {
        $fh = fopen($file, 'a');
        fwrite($fh, $str."\n");
    } else {
        $fh = fopen($file, 'w');
        fwrite($fh, $str."\n");
    }
    fclose($fh);
    // print("$str\n");
}

if (!isset($_SESSION['tsc'])) {
    @$tsc = "A901" . date('ymdHisss') . (microtime() * 100000);
    //$anu = str_replace('.', '',$tsc);
    $anu = explode('.', $tsc);
    $_SESSION['tsc'] = $anu[0];
}
//echo 'Time Stamp: ' . $_SESSION['tsc'];//

//style changer
if(!isset($_SESSION['style']))
{
    $_SESSION['style'] = 0;
}

if (isset($_POST['clear']))
{
    session_destroy();
    // header("Location: https://teampencari.herokuapp.com/");
    header('Location: '.$_SERVER['PHP_SELF']);
}
else if (isset($_POST['changestyle']))
{
    if ($_SESSION['style'] == 0)
        $_SESSION['style'] = 1;
    else
        $_SESSION['style'] = 0;

    header('Location: '.$_SERVER['PHP_SELF']);
}
else if (isset($_POST['submit-auth']))
{
    $auth = $_POST['auth'];

    $_SESSION['auth'] = $auth;
    $_SESSION['send'] = otp($auth);
    // include "view.php";
}
else if (isset($_POST['submit-auth2']))
{
    $auth = $_POST['auth'];

    $_SESSION['auth'] = $auth;
    $_SESSION['send'] = otp2($auth);
    // include "view.php";
}
else if (isset($_POST['login']))
{
    // $content = @file_get_contents("database.txt");

    $otp = trim(@$_POST['otp']);

    $_SESSION['hasill'] = login($_SESSION['send'], $otp, /*$_POST['key'],*/ $_SESSION['tsc']);
    $json = json_decode($_SESSION['hasill'], true);
    $dsc = '71f5b6b6e46fc7559c9911e434032286|bb082213-6321-49c6-b8e3-2af7c500ea2f';
    $dc = base64_encode($dsc);

    if ( isset($json['accessToken']) && !empty($json['accessToken']) ){
        $_SESSION['bearer'] = $json['accessToken'];
        $_SESSION['idtoken'] = $json['idToken'];
        $_SESSION['dc'] = base64_decode($_SESSION['msisdn'] . '|' . $dsc);
        $_SESSION['dor'] = infoget();

        $json = json_decode($_SESSION['dor'], true);
    }
    if (isset($json['profiles']['balance'])) {
        // include "view-pulsa.php";
        $_SESSION['state'] = 'loggedin';
    } else {
        // include "view.php";
    }
    /*$content+=1;
    $file = fopen("database.txt", 'w');
    $hasil_a=json_decode($hasil, true);
    $hasil_a=$json_a['message'];
    $write = fputs($file,$content);*/
}
else if (isset($_POST['tembak']))
{
    $finalid = null;
    $id = trim(@$_POST['id']);
    $manualid = trim(@$_POST['manualid']);

    switch($id)
    {
        case "0x1": $finalid = "00023837"; break; //1 GB 3 DAY
        case "0x2": $finalid = "00022348"; break; //2 GB 3 DAY
        case "0x3": $finalid = "00022350"; break; //3 GB 3 DAY
        case "0x4": $finalid = "00022351"; break; //5 GB 3 DAY
        case "0x5": $finalid = "00022352"; break; //5 GB 2 DAY
        case "0x6": $finalid = "00022356"; break; //10gb 2 DAY
        default:break;
    }

    if (isset($_SESSION['last_manualid']) && empty($manualid))
    {
        unset($_SESSION['last_manualid']);
    }

    if ( /*(isset($_SESSION['key']) && ($_SESSION['key'] == "debug@cepzdecoded" || $_SESSION['key'] == "ts31W3B") ) &&*/
         (isset($manualid) && !empty($manualid))
       )
    {
        $finalid = $manualid;
        $_SESSION['last_manualid'] = $manualid;        
    }

    _log("msisdn: ".$_SESSION['msisdn']." || id: $finalid");
    $beli = buy($_SESSION['tsc'], $_SESSION['bearer'], $_SESSION['idtoken'], $_SESSION['dc'], $finalid);

    // include "view-pulsa.php";
}
// else
// {
//     include "view.php";
// }

if ( !isset($_SESSION['state']) || $_SESSION['state'] != 'loggedin' )
{
    // echo "not logged in";
    if ($_SESSION['style'] == 0)
        include "viewsimple.php";
    else
        include "view.php";
} else {
    // echo "logged in";
    if ($_SESSION['style'] == 0)
        include "view-pulsasimple.php";
    else
        include "view-pulsa.php";   
}
