<?php

//set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days)
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);
// ini_set('session.save_path', '/home/yoursite/sessions'); //maybe you want to precise the save path as well

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

$keys = array(
    "@ruj1H3rM4ty@r",
    "debug@cepzdecoded",
    "ts31W3B"
);

function check_key($input)
{
    global $keys;
    $input = trim($input);
    if (in_array($input, $keys))
        return true;
    else
        return false;
}
///anyversery//
function otp($auth)
{
    $reqpay = 'content=eyJyZXB1cmNoYXNlIjpmYWxzZSwic2VydmljZV90eXBlIjoiQU5OSVZFUlNBUlkiLCJzb2NjZCI6Ik1hc3RlciIsInNlcnZpY2VfaWQiOiIzMjEzODg1In0%3D';
    	$body = array(
        'offer_id' => '22537',
//     'repurchase' => 'false',
//     'service_type' => 'EMERGENCY',
 //    'soccd" => 'Master',
       'offer_type' => 'NBO_AXISNET'
      // 'offer_type' => 'Service_id'
     ///   'soccd' => 'Master'
     ///   'offer_type' => 'PACKAGE'
      ///  'offer_type' => 'SACHET'
      
    );
    
    $body2 = base64_encode(json_encode($body));
    $body3 = "content=$body2";
    $headers = array(
        "x-app-version: 7.1.1",
        "Authorization: $auth",
        "Content-Type: application/x-www-form-urlencoded",
        //"Content-Length: 130",//
        "Host: trxpackages.api.axis.co.id",
        "Connection: close",
        "Accept-Encoding: gzip, deflate",
        "User-Agent: okhttp/3.14.4"
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://trxpackages.api.axis.co.id/claimmccm/v3");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body3);
    $hasil = curl_exec($ch);
    $json = json_decode($hasil, TRUE);
    $code = $json['status_code'];
    $index  = sizeof($code, 1);
    $success ="btn-success";
    $warning ="alert-danger";

	if ($code == "200") {
        		echo "<center><div class=".$success.">Terima kasih sudah berkunjung ke JAGOANSSH<p>Transaksi anda sedang di proses.</div></center>";
                }
                 else{
            		echo "<center><div class=".$warning.">
            		Status Code: ".$code."
            		<p>Paket tidak dapat di beli saat ini
            		<p>Atau auth code anda salah.</div></center>";
        		}
    
}
///masa aktif/
function otp2($auth)
{
    $reqpay = 'content=eyJyZXB1cmNoYXNlIjpmYWxzZSwic2VydmljZV90eXBlIjoiQ0FSRCIsInNvY2NkIjoiTWFzdGVyIiwic2VydmljZV9pZCI6IjkxMjA2NTAifQ%3D%3D';
    $headers = array(
        "x-app-version: 7.1.1",
        "Authorization: $auth",
        "Content-Type: application/x-www-form-urlencoded",
        //"Content-Length: 130",//
        "Host: trxpackages.api.axis.co.id",
        "Connection: close",
        "Accept-Encoding: gzip, deflate",
        "User-Agent: okhttp/3.14.4"
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://trxpackages.api.axis.co.id/package/user/claim");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $reqpay);
    $hasil = curl_exec($ch);
    $json = json_decode($hasil, true);
}

function login($authid, $otp, /*$key,*/ $tsc)
{
    //if (check_key($key)) {
        $dsc = '71f5b6b6e46fc7559c9911e434032286|bb082213-6321-49c6-b8e3-2af7c500ea2f';
        $dc = base64_encode($dsc);

        $body = 'clientId=00d6cae4c62614b4ec0ff8d4f054d9f2&code=' . $otp;
        $ctl = strlen($body);
        $header = array(
            "Accept: Application/json",
            "cache-control: no-cache",
            "authid: $authid",
            "channelid: vmp",
            "x-data-centre: $dc",
            "Content-Type: application/x-www-form-urlencoded",
            "Content-Length: $ctl",
            "Host: vmp.telkomsel.com",
            "Connection: Keep-Alive",
            "Accept-Encoding: gzip",
            "User-Agent: okhttp/3.12.1",
            "X-NewRelic-ID: VQ8GVFVVChAEUlJRBAcOUQ=="
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://vmp.telkomsel.com/api/v2/auth/otp/send");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        $hasil = curl_exec($ch);
        // $_SESSION['key'] = trim($key);
        return $hasil;
    //} else {
        //$gagal = "Password yang anda Masukkan Salah Silahkan Contact Dev: <a href='//fb.me/bantalku567' target='_blank'>Aruji</a>";
        //return $gagal;
    //}
}

function infoget()
{
    $header = array(
        "accept: application/json",
        "channelid: VMP",
        "authorization: Bearer " . $_SESSION['bearer'],
        "idtoken: " . $_SESSION['idtoken'],
        "transactionid: " . $_SESSION['tsc'], //$tsc
        "x-data-centre: " . $_SESSION['dc'],
        "Host: vmp.telkomsel.com",
        "Connection: Keep-Alive",
        "Accept-Encoding: gzip",
        "User-Agent: okhttp/3.12.1",
        "If-Modified-Since: Tue, 28 Jan 2020 05:21:04 GMT",
        "X-NewRelic-ID: VQ8GVFVVChAEUlJRBAcOUQ=="
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://vmp.telkomsel.com/api/v2/subscriber/profile?msisdn=" . $_SESSION['msisdn']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    $hasil = curl_exec($ch);
    return $hasil;

}

function buy($tsc, $bearer, $idtoken, $dc, $id)
{
    $body = '{"toBeSubscribedTo":false}';
    $ctl = strlen($body);

    $header = array(
        "accept: application/json",
        "channelid: VMP",
        "authorization: Bearer $bearer",
        "idtoken: $idtoken",
        "transactionid: $tsc",
        "x-data-centre: $dc",
        "Content-Type: application/json;charset=utf-8",
        "Content-Length: $ctl",
        "Host: vmp.telkomsel.com",
        "Connection: Keep-Alive",
        "Accept-Encoding: gzip",
        "User-Agent: okhttp/3.12.1",
        "X-NewRelic-ID: VQ8GVFVVChAEUlJRBAcOUQ=="
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://vmp.telkomsel.com/api/v2/packages/$id");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    $hasil = curl_exec($ch);
    //$json = json_decode($hasil, true);
    curl_close($ch);
    return $hasil;
/*}
else
{
$gagal = "Key yang anda Masukkan Salah";
return $gagal;
}*/
}


