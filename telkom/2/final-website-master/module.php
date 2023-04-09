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

function otp($msisdn)
{
    $dsc = '71f5b6b6e46fc7559c9911e434032286|bb082213-6321-49c6-b8e3-2af7c500ea2f';
    $dc = base64_encode($dsc);
    $body = 'clientId=00d6cae4c62614b4ec0ff8d4f054d9f2&phoneNumber=%2B' . $msisdn;
    $ctl = strlen($body);
    $header = array(
        "accept: application/json",
        "cache-control: no-cache",
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
    curl_setopt($ch, CURLOPT_URL, "https://vmp.telkomsel.com/api/v2/auth/otp/request");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    $hasil = curl_exec($ch);
    $json = json_decode($hasil, true);
    $authid = $json['authId'];
    return $authid;
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


