<?php
/*
 * DimasPratama.com Script Web SSH & VPN
 * Copyright, 2017 Widigdo Dimas Pratama | DimasPratama.co
 * @email - halamandigone@gmail.com
 * Date Created: 16 April 2017
 */

/* Get Settings */
function settings( $action, $value, $opt = 'none' ) {
	global $conn;
	if ( $action=="get" ) {
		$s = mysqli_fetch_array(mysqli_query( $conn, "SELECT * FROM `settings` WHERE `name`='$value'" ));
		return $s['value'];
	} elseif ( $action=="set" ) {
		$q = mysqli_query( $conn, "UPDATE `settings` SET `value`='$value' WHERE name='$opt'" );
		return true;
	}
}
/* End Get Settings */

function urlPrefix( $url ) {
	global $siteUrl, $urlPrefix;
	if($urlPrefix!=$siteUrl.'/?do='):
		echo $urlPrefix.$url;
	else:
		$s = explode('/', $url);
		if(isset($s[1])):
			echo $urlPrefix.$s[0].'&filter='.$s[1];
		else:
			echo $urlPrefix.$s[0];
		endif;
	endif;
}

/* Get Product */
function product( $action, $value, $opt = 'none' ) {
	global $conn;
	if ( $action=="get" ) {
		$query_products = mysqli_query( $conn, "SELECT * FROM products WHERE name='$value'" );
		$st_fetch = mysqli_fetch_array( $query_products );
		$result = $st_fetch['price'];
		return $result;
	} else {
		if ( $action=="set" ) {
			$query_settings = mysqli_query( $conn, "UPDATE products SET price='$value' WHERE name='$opt'" );
		}
	}
}
/* End Get Product */

/* Crypt Password */
function crypt_password( $action, $value ) {
	$key = "SID81X2@BWrDx7DCLmNoPqq98je2N@kW";
	$ren = "00100203182015";
	if ( $action=='crypt' ) {
		$data = mcrypt_encrypt( MCRYPT_RIJNDAEL_128, $key, $value , MCRYPT_MODE_ECB, $ren );
		return base64_encode( $data );
	} else {
		if ( $action=='decrypt' ) {
			$variable= base64_decode( $value );
			return mcrypt_decrypt( MCRYPT_RIJNDAEL_128, $key, $variable, MCRYPT_MODE_ECB, $ren );
		}
	}
}
/* End Crypt Password */

/* Hash Password */
function hash_password( $value ) {
	$key = "SID81X2@BWrDx7DCLmNoPqq98je2N@kW";
	$ren = "00100203182015";
	$output = hash( 'sha1', $key.$value.$ren );
	return $output;
}
/* End Hash Password */

/* DimasPratama.com SSH */

/* Add SSH Account */
function add_account( $username, $password, $in_server ) {
	global $conn;
	// Define Account ID
	$rawusername = $username;
	$username = escapeshellcmd($username);
	$password = escapeshellcmd($password);
	$datenow = date( 'Y-m-d H:i:s' );

	// Execute To Server
	$fetch_server = mysqli_fetch_array( mysqli_query( $conn, "SELECT * FROM servers WHERE id='$in_server'" ) );
	$exp_after =  $fetch_server['active_for'];
	$expiry_date = date( 'Y-m-d H:i:s', strtotime( "+".$exp_after." days" ) );
	$expiry = date( 'Y-m-d', strtotime( "+".$exp_after." days" ) );
	$root_username = $fetch_server['root_username'];
	$root_password = crypt_password( 'decrypt', $fetch_server['root_password'] );
	$host = $fetch_server['host'];
	$port = $fetch_server['default_connection'];

	include 'app/lib/SSH2/SSH2.php';

	$ssh = new Net_SSH2( $host, $port );
	if ( !$ssh->login( $root_username, $root_password ) ) {
		return false;
	}

	if ( $fetch_server['type']=='vpnssh'||$fetch_server['type']='vpn' ) {
		$query = mysqli_query( $conn, "INSERT INTO `accounts` VALUES (DEFAULT, '$in_server', '$username', '1', '$datenow', '$expiry_date', 'y')" );
	} else {
		$query = mysqli_query( $conn, "INSERT INTO `accounts` VALUES (DEFAULT, '$in_server', '$username', '1', '$datenow', '$expiry_date', 'n')" );
	}

	$id = mysqli_insert_id($conn);
	$s = settings('get', 'add_command_'.$fetch_server['os']);
	$s = str_replace('DIMAS_SSH', '', $s);
	$s = str_replace('DIMAS_VPN', '', $s);
	$s = str_replace('DIMAS_VAR_USERNAME', $username, $s);
	$s = str_replace('DIMAS_VAR_PASSWORD', $password, $s);
	$s = str_replace('DIMAS_VAR_EXPIRYDATETIME', $expiry, $s);
	$s = explode('COMMAND:', $s);
	if ( $fetch_server['type']=='vpnssh'||$fetch_server['type']='vpn' ) {
		$ssh->exec( $s[1] );
		$ssh->exec( $s[2] );
	} elseif ( $fetch_server['type']='vpn' ) {
		$ssh->exec( $s[2] );
	} elseif ( $fetch_server['type']=='ssh' || $fetch_server['type']=='extra' ) {
		$ssh->exec( $s[1] );
	}
	return $id;
}

/* Add SSH Account */
function add_account_v2ray_address( $username, $sni, $in_server ) {
        global $conn;
        // Define Account ID
        $rawusername = $username;
        $username = escapeshellcmd($username);
        $sni = escapeshellcmd($sni);
        $datenow = date( 'Y-m-d H:i:s' );

        // Execute To Server
        $fetch_server = mysqli_fetch_array( mysqli_query( $conn, "SELECT * FROM servers_v2ray WHERE id='$in_server'" ) );
        $exp_after =  $fetch_server['active_for'];
        $expiry_date = date( 'Y-m-d H:i:s', strtotime( "+".$exp_after." days" ) );
        $expiry = date( 'Y-m-d', strtotime( "+".$exp_after." days" ) );
        $root_username = $fetch_server['root_username'];
        $root_password = crypt_password( 'decrypt', $fetch_server['root_password'] );
        $host = $fetch_server['host'];
        $port = $fetch_server['default_connection'];

        include 'app/lib/SSH2/SSH2.php';

        $ssh = new Net_SSH2( $host, $port );
        if ( !$ssh->login( $root_username, $root_password ) ) {
                return false;
        }

        $query = mysqli_query( $conn, "INSERT INTO `accounts_v2ray` VALUES (DEFAULT, '$in_server', '$username', '1', '$datenow', '$expiry_date')" );

        $id = mysqli_insert_id($conn);
        $s = settings('get', 'add_command_'.$fetch_server['os']);
	$username = str_replace(array('!','"','£','$','%','%','^','&','*','(',')','+','=','\\','/','[',']','{','}',';',':','@','#','~','<',',','>','.','?','|',' '), '', $username);
	$s = str_replace('DIMAS_SSH', '', $s);
        $s = str_replace('DIMAS_VPN', '', $s);
	$s = str_replace('DIMAS_V2RAY_ADDRESS', '', $s);
	$s = str_replace('DIMAS_VAR_USERNAME', $username, $s);
        $s = str_replace('DIMAS_VAR_SNI', $sni, $s);
        $s = str_replace('DIMAS_VAR_EXPIRYDATETIME', $expiry, $s);
        $s = explode('COMMAND:', $s);
	if (strlen($username) < 3)
	{
   	echo "Input is too short, minimum is 3 characters (20 max)."; exit;
	}
	$ssh->exec( $s[3] );
	$out_tls = $ssh->exec("cat /root/v2ray-user/'$username' 2>/dev/null | grep 'link TLS' | cut -d ' ' -f 10");
	$out_none = $ssh->exec("cat /root/v2ray-user/'$username' 2>/dev/null | grep 'link none TLS' | cut -d ' ' -f 6");
	$out_tls = str_replace(array("\n", "\r"), '', $out_tls);
	$out_none = str_replace(array("\n", "\r"), '', $out_none);
	return array ($out_tls, $out_none, $id);
}
/* End Add SSH Account */
/* Add SSH Account */
function add_account_v2ray_rhost( $username, $sni, $in_server ) {
        global $conn;
        // Define Account ID
        $rawusername = $username;
        $username = escapeshellcmd($username);
        $sni = escapeshellcmd($sni);
        $datenow = date( 'Y-m-d H:i:s' );

        // Execute To Server
        $fetch_server = mysqli_fetch_array( mysqli_query( $conn, "SELECT * FROM servers_v2ray WHERE id='$in_server'" ) );
        $exp_after =  $fetch_server['active_for'];
        $expiry_date = date( 'Y-m-d H:i:s', strtotime( "+".$exp_after." days" ) );
        $expiry = date( 'Y-m-d', strtotime( "+".$exp_after." days" ) );
        $root_username = $fetch_server['root_username'];
        $root_password = crypt_password( 'decrypt', $fetch_server['root_password'] );
        $host = $fetch_server['host'];
        $port = $fetch_server['default_connection'];

        include 'app/lib/SSH2/SSH2.php';

        $ssh = new Net_SSH2( $host, $port );
        if ( !$ssh->login( $root_username, $root_password ) ) {
                return false;
        }

        $query = mysqli_query( $conn, "INSERT INTO `accounts_v2ray` VALUES (DEFAULT, '$in_server', '$username', '1', '$datenow', '$expiry_date')" );

        $id = mysqli_insert_id($conn);
        $s = settings('get', 'add_command_'.$fetch_server['os']);
        $username = str_replace(array('!','"','£','$','%','%','^','&','*','(',')','+','=','\\','/','[',']','{','}',';',':','@','#','~','<',',','>','.','?','|',' '), '', $username);
        $s = str_replace('DIMAS_SSH', '', $s);
        $s = str_replace('DIMAS_VPN', '', $s);
        $s = str_replace('DIMAS_V2RAY_RHOST', '', $s);
        $s = str_replace('DIMAS_VAR_USERNAME', $username, $s);
        $s = str_replace('DIMAS_VAR_SNI', $sni, $s);
        $s = str_replace('DIMAS_VAR_EXPIRYDATETIME', $expiry, $s);
        $s = explode('COMMAND:', $s);
        if (strlen($username) < 3)
        {
        echo "Input is too short, minimum is 3 characters (20 max)."; exit;
        }
        $ssh->exec( $s[4] );
        $out_tls = $ssh->exec("cat /root/v2ray-user/'$username' 2>/dev/null | grep 'link TLS' | cut -d ' ' -f 10");
        $out_none = $ssh->exec("cat /root/v2ray-user/'$username' 2>/dev/null | grep 'link none TLS' | cut -d ' ' -f 6");
        $out_tls = str_replace(array("\n", "\r"), '', $out_tls);
        $out_none = str_replace(array("\n", "\r"), '', $out_none);
        return array ($out_tls, $out_none, $id);
}
/* End Add SSH Account */


/* Restart Service Server */
function restart( $serverid, $action = 0) {
	global $conn;
	// Define Account ID
	$fetch_server = mysqli_fetch_array( mysqli_query( $conn, "SELECT * FROM `servers` WHERE id='$serverid'" ) );

	$root_username = $fetch_server['root_username'];
	$root_password = crypt_password( 'decrypt', $fetch_server['root_password'] );
	$host = $fetch_server['host'];
	$port = $fetch_server['default_connection'];

	include 'app/lib/SSH2/SSH2.php';

	$ssh = new Net_SSH2( $host, $port );
	if ( !@$ssh->login( $root_username, $root_password ) ) {
		return false;
	}

	if($action):
	switch($action) {
		case 'openssh': 
			$ssh->exec("service sshd restart");
		break;
		case 'dropbear': 
			$ssh->exec("service dropbear restart");
		break;
		case 'openvpn': 
			$ssh->exec("service openvpn restart");
		break;
		case 'squid': 
			$ssh->exec("service squid restart");
		break;
		default:
			return false;
		break;
	}
	else:
		$ssh->exec("service dropbear restart");
		$ssh->exec("service sshd restart");
		$ssh->exec("service squid restart");
		$ssh->exec("service openvpn restart");
		$ssh->exec("service pptpd restart");
	endif;

	return true;
}
/* End Add SSH Account */

function location( $s ) {
	if(strpos($s, '[DIMAS_FLAG]')!==false):
		$s = explode('[DIMAS_FLAG]', $s);
		return array('name'=>$s[0], 'flag'=>$s[1]);
	else:
		return array('name'=>$s, 'flag'=>false);
	endif;
}

/* Convert To Rupiah Format */
function rupiah( $angka ) {
	$rupiah="";
	$rp=strlen( $angka );
	while ( $rp>3 ) {
		$rupiah = ".". substr( $angka, -3 ). $rupiah;
		$s=strlen( $angka ) - 3;
		$angka=substr( $angka, 0, $s );
		$rp=strlen( $angka );
	}
	$rupiah = "Rp." . $angka . $rupiah ;
	return $rupiah;
}
/* End Convert To Rupiah Format */

/* Check String */
function chkString($val, $strip = 0) {
	global $conn;
	if($strip):
		return mysqli_real_escape_string($conn, strip_tags($val));
	else:
		return mysqli_real_escape_string($conn, $val);
	endif;
}
/* End Check String */

/* Alert Message */
function showAlert($alertMsg, $alertText) {
	return str_replace('~ALERT_TEXT~', $alertText, $alertMsg);
}
/* End Alert Message */

/* Show Captcha */
function showCaptcha( $val, $opt = 0 ) {
	global $siteKey, $privKey, $hashKey;
	switch($val) {
		case 'site':
		echo "<script src='https://www.google.com/recaptcha/api.js'></script>".'<div class="g-recaptcha" data-sitekey="6Lc6QEYeAAAAALT8RalZt4c20PGpqeB3H0jajQWj"></div>';
		break;
		case 'site2':
			echo "<script src='https://www.google.com/recaptcha/api.js'></script>".'<div class="g-recaptcha" data-sitekey="6Lc6QEYeAAAAALT8RalZt4c20PGpqeB3H0jajQWj"></div>';
		break;
		case 'secret':
		
		$data = array(
            'secret' => "6Lc6QEYeAAAAAGZ0vsJTP2kuvwCOs2K4I7MgVpLp",
            'response' => $opt["g-recaptcha-response"]
        );

$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($verify);
$s = json_decode($response);
if($s->success): return true; else: return false; endif;
		break;
	}
}
/* End Show Captcha */

/* Load Composer Package */
function loadPackage($dir)
{
    $composer = json_decode(file_get_contents("$dir/composer.json"), 1);
    $namespaces = $composer['autoload']['psr-4'];

    // Foreach namespace specified in the composer, load the given classes
    foreach ($namespaces as $namespace => $classpath) {
        spl_autoload_register(function ($classname) use ($namespace, $classpath, $dir) {
            // Check if the namespace matches the class we are looking for
            if (preg_match("#^".preg_quote($namespace)."#", $classname)) {
                // Remove the namespace from the file path since it's psr4
                $classname = str_replace($namespace, "", $classname);
                $filename = preg_replace("#\\\\#", "/", $classname).".php";
                include_once $dir."/".$classpath."/$filename";
            }
        });
    }
} 
/* End Load Composer Package */
