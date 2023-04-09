
<?php
//date_default_timezone_set('Asia/Jakarta');

//session_start(); #list: key, msisdn, otp, secret_token

require_once('config.php');
require('cip.php');
//require_once('data.php');

require 'MultiCurl/autoload.php';
use CepzDecoded\PhpMultiCurl\MultiCurl;

/*
 *
 * MYTelkomsel DarkVersion classes
 * @author CepzDecoded
 * @recoded by Insider
 * @copyright 2018 {author}
 * @description Made it simple for newboy, even though the code is complicated like your love with him.
 * @version @BUILD@
 * 
*/

class MyTsel{
    
    //4p6TEhBC3zsljISp1sqKbj80ZMEWoY44 //APK
    //Xlj9pkfK6yYumf6G8KE2S5TDWgTtczb0 //WEB
    const clientid = '00d6cae4c62614b4ec0ff8d4f054d9f2';
    const dsc = '71f5b6b6e46fc7559c9911e434032286|bb082213-6321-49c6-b8e3-2af7c500ea2f';
    const transactionid = 'A901190719192442969383440'; #old one: A301180820190025065878810 (random from apk android)
    
    public function __construct(){
        
    }
    
    public function get_otp($msisdn, $tipe) {
        $body = 'clientId='.self::clientid.'&phoneNumber=%2B' . $msisdn;
        $dc = base64_encode(self::dsc);
        $ctl = strlen($body);
        $header = array(
            "accept:application/json" ,
            "cache-control:no-cache" ,
            "channelid:VMP" ,
            "x-data-centre:$dc" ,
            "Content-Type:application/x-www-form-urlencoded" ,
            "Content-Length:$ctl" ,
            "Host:vmp.telkomsel.com" ,
            "Connection:Keep-Alive" ,
            "Accept-Encoding:gzip" ,
            "User-Agent:okhttp/3.12.1" ,
            "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ=="
        );

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://vmp-preprod.telkomsel.com/api/v2/auth/otp/request");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		$hasil = curl_exec($ch);
        $json = json_decode($hasil, true);
        $authid = $json['authId'];
        if(strlen($hasil) > 0)
            return compact('authid','dc');
        else
            return NULL;
    }
    
    public function login($msisdn, $otp, $tipe, $authid, $dc) {
        $body = 'clientId='.self::clientid.'&code=' . $otp;
        $ctl = strlen($body);

        $ch = curl_init();
        $header = array(
            "Accept:Application/json" ,
            "cache-control:no-cache" ,
            "authid:$authid" ,
            "channelid:VMP" ,
            "x-data-centre:$dc" ,
            "Content-Type:application/x-www-form-urlencoded" ,
            "Content-Length:$ctl" ,
            "Host:vmp.telkomsel.com" ,
            "Connection:Keep-Alive" ,
            "Accept-Encoding:gzip" ,
            "User-Agent:okhttp/3.12.1" ,
            "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ=="
        );

        curl_setopt($ch, CURLOPT_URL, "https://vmp-preprod.telkomsel.com/api/v2/auth/otp/send");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $hasil = curl_exec($ch);
        $json = json_decode($hasil, true);
	    $gagal = $json->message;
        echo "<script>window.location.replace('index.php'); </script>";
        switch(true){
            
            #otp kosong
            case($hasil == '{"error":"invalid_request","error_description":"missing password parameter"}'):{
                return("Error: OTP Kosong");
            }
            break;
            
            #otp salah
            case($hasil == '{"error":"invalid_user_password","error_description":"Wrong phone number or verification code."}'):{
                return("Error: OTP salah");
            }
            break;
            
            #sukses
            case(!empty($json['idToken'])):{
                $bearer = $json['accessToken'];
		        $idtoken = $json['idToken'];
                $dc = base64_decode($msisdn . '|' . self::dsc);
                
                return compact('bearer', 'dc', 'idtoken');
            }
            break;
            
            default: "something wrong call Dokter as the developer to fix it."; die(); break;
        }
    
            
    }
    
    public function logout($Bearer, $idtoken, $dc, $tipe) {
        $payload4 = '{"refreshToken":"pt7paNO-zsALy9mpoWHAMOQl1uxzWyISrcxYVUzxFL5oh"}';
        $mc = MultiCurl::getInstance();
    
        // Set up your cURL handle(s).
        $ch = curl_init("https://vmp.telkomsel.com/api/user/logout");
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $payload4);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Length: ".strlen($payload4)."",
                "Authorization: Bearer ".$Bearer."",
                "TRANSACTIONID: ".self::transactionid."",
                'channelid: VMP',
                'Content-Type: application/json;charset=utf-8',
                'Connection: Keep-Alive',
                'Accept-Encoding: gzip',
                'User-Agent: Mozilla/5.0 (Linux; U; Android 4.4; xx-xx; SM-J110F Build/KTU84P) AppleWebKit/537.16 (KHTML, like Gecko) Version/4.0 Mobile Safari/537.16 Chrome/33.0.0.0',
                'X-NewRelic-ID: VQ8GVFVVChAEUlJRBAcOUQ=='
              ));
              curl_setopt($ch, CURLOPT_ENCODING, "gzip");

        // Add your cURL calls and begin non-blocking execution.
        $call = $mc->addCurl($ch);
        $call->code;
        $response = $call->response;
    }

    public function cek($Bearer, $idtoken, $dc, $tipe) {
        $mc = MultiCurl::getInstance();
    
        // Set up your cURL handle(s).
        $ch = curl_init("https://vmp.telkomsel.com/api/v2/packages/all?packageFamilyID=ML1_FAM_5");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "accept:application/json" ,
                "channelid:VMP" ,
                "authorization:Bearer $Bearer" ,
                "idtoken:$idtoken" ,
                "transactionid:$transactionid" ,
                "x-data-centre:$dc" ,
                "Content-Type:application/json;charset=utf-8" ,
                "Content-Length:$ctl" ,
                "Host:vmp.telkomsel.com" ,
                "Connection:Keep-Alive" ,
                "Accept-Encoding:gzip" ,
                "User-Agent:okhttp/3.12.1" ,
                "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ=="
              ));

        // Add your cURL calls and begin non-blocking execution.
        $call = $mc->addCurl($ch);
        $call->code;
        $response = $call->response;
        $json_a = json_decode($response, true);     
    $id = $json_a['id'];
	return $response;
    }
    
    public function buy_pkg($Bearer, $idtoken, $dc, $pkgid, $transactionid, $tipe) {
        
        $mc = MultiCurl::getInstance();
        $body = '{"toBeSubscribedTo":false}';
        $ctl = strlen($body);
        
        // Set up your cURL handle(s).
        $ch = curl_init("https://vmp.telkomsel.com/api/v2/packages/".$pkgid);
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
              curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "accept:application/json" ,
                "channelid:VMP" ,
                "authorization:Bearer $Bearer" ,
                "idtoken:$idtoken" ,
                "transactionid:$transactionid" ,
                "x-data-centre:$dc" ,
                "Content-Type:application/json;charset=utf-8" ,
                "Content-Length:$ctl" ,
                "Host:vmp.telkomsel.com" ,
                "Connection:Keep-Alive" ,
                "Accept-Encoding:gzip" ,
                "User-Agent:okhttp/3.12.1" ,
                "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ=="
              ));

        // Add your cURL calls and begin non-blocking execution.
        $call = $mc->addCurl($ch);
        $call->code;
        $response = $call->response;
        $json = json_decode($response);
        
        //return("PKGID: ".$pkgid."<br>");
        if (!empty($json->message))
		{
			$meseg = $json->message;
			if ($meseg == "BIZ-UXP-0001") { return "\nPaket tidak tersedia saat ini. Silakan coba beberapa saat lagi.)"; ; }
			else if ($meseg == "BIZ-UXP-0002") { return "Maaf,anda tidak memiliki cukup pulsa untuk membeli paket ini. Silakan isi ulang pulsa untuk melanjutkan."; ; }
			else if ($meseg == "BIZ-UXP-0003") { return "\nKami tidak dapat menemukan paket yang cocok berdasarkan lokasi Anda saat ini."; ; }
			else if ($meseg == "BIZ-UXP-0006") { return "\nPaket tidak tersedia untuk hari ini. Silakan coba kembali."; ;}
			else if ($meseg == "BIZ-UXP-0007") { return "\nPaket tidak tersedia saat ini. Silakan coba kembali."; ;}
			else if ($meseg == "BIZ-UXP-0008") { return "\nMaaf, kuota paket ini sudah habis untuk hari ini. ";  ; }
			else if ($meseg == "BIZ-UXP-0009") { return "\nAnda telah melebihi jumlah kuota Anda untuk dapat membeli paket ini. Silakan pilih paket lainnya."; ;}
			else if ($meseg == "BIZ-UXP-0010") { return "\nNomor ponsel Anda tidak cocok dengan skema tarif untuk paket ini. Silakan pilih paket lainnya."; ;}
			else if ($meseg == "BIZ-UXP-0011") { return "\nNomor ponsel Anda tidak memenuhi syarat untuk paket ini. Silakan pilih paket lainnya."; ;}
			else if ($meseg == "BIZ-UXP-0013") { return "\nMaaf,saat ini kami tidak dapat menemukan rincian info akun Anda. Silakan coba beberapa saat lagi."; ;}
			else if ($meseg == "BIZ-UXP-0014") { return "\nMaaf! Kami tidak dapat menemukan rincian dari akun Anda. Silakan coba beberapa saat lagi."; ;}
			else if ($meseg == "BIZ-UXP-0015") { return "\nMaaf, paket ini tidak tersedia untuk nomor ponsel Anda. Silakan pilih paket lainnya."; ;}
			else if ($meseg == "BIZ-UXP-0016") { return "\nMaaf, nomor ponsel Anda dalam masa tenggang. Silakan isi ulang pulsa untuk melanjutkan."; ;}
			else if ($meseg == "BIZ-UXP-0017") { return "\nMaaf, kuota untuk paket ini sudah habis. Silakan pilih paket lainnya."; ;}
			else if ($meseg == "BIZ-UXP-1101") { return "\nTransaksi Anda sebelumnya masih dalam proses. Silakan tunggu beberapa saat lagi."; ;}
			else if ($meseg == "BIZ-UXP-1102") { return "\nMaaf,saat ini paket tidak tersedia."; ;}
			else { return "\nID Paket tidak ditemukan"; ;}
		}
		else if (!empty($json->notification))
		{ 
			$ddd = $json->notification;
			$fil = fopen('count_file.txt', "r");
		        $dat = fread($fil, filesize('count_file.txt')); 
		        $dat+1;
		        fclose($fil);
		        $fil = fopen('count_file.txt', "w");
		        fwrite($fil, $dat+1);
		        fclose($fil);
			return "\n$ddd";
		}
		else
		{
			return "\n$json Javascrip eror";
		}
        
        switch(true){
            
            case(isset($json->transactionstatus) and $json->transactionstatus == "Success" and isset($json->transactiondesc) and $json->transactiondesc == "TDW-OK00-01"):{
                return("SUKSES");
            } 
            break;
            
            case(isset($json->statusCode) and $json->statusCode == 404 and isset($json->error) and $json->error == "Not Found"):{
                return("PKGID or TRANSACTIONID Can't Empty.");
            }
            break;
            
            
            default: return $response; break;
            
        }
        
        
        
        
    }
    
}