<?php
/*
function otp($msisdn)
{
    $dsc = '71f5b6b6e46fc7559c9911e434032286|bb082213-6321-49c6-b8e3-2af7c500ea2f';
    $dc = base64_encode($dsc);
    $body = 'clientId=00d6cae4c62614b4ec0ff8d4f054d9f2&phoneNumber=%2B' . $msisdn;
    $ctl = strlen($body);
    $header = array("accept:application/json",
        "cache-control:no-cache",
        "channelid:vmp",
        "x-data-centre:$dc",
        "Content-Type:application/x-www-form-urlencoded",
        "Content-Length:$ctl",
        "Host:vmp.telkomsel.com",
        "Connection:Keep-Alive",
        "Accept-Encoding:gzip",
        "User-Agent:okhttp/3.12.1",
        "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ==");

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

function login($authid, $otp, $id, $key)
{
    if ($key == '150301') {
        $dsc = '71f5b6b6e46fc7559c9911e434032286|bb082213-6321-49c6-b8e3-2af7c500ea2f';
        $dc = base64_encode($dsc);

        $body = 'clientId=00d6cae4c62614b4ec0ff8d4f054d9f2&code=' . $otp;
        $ctl = strlen($body);
        $header = array("Accept:Application/json",
            "cache-control:no-cache",
            "authid:$authid",
            "channelid:vmp",
            "x-data-centre:$dc",
            "Content-Type:application/x-www-form-urlencoded",
            "Content-Length:$ctl",
            "Host:vmp.telkomsel.com",
            "Connection:Keep-Alive",
            "Accept-Encoding:gzip",
            "User-Agent:okhttp/3.12.1",
            "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ==");

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
        $json = json_decode($hasil, true);

        date_default_timezone_set('Asia/Jakarta');
        $tsc = "A901" . date('ymdHisss') . (microtime() * 100000);
        //$anu = str_replace('.', '',$tsc);
        $anu = explode('.', $tsc);
        $tsc = $anu[0];

        $bearer = $json['accessToken'];
        $idtoken = $json['idToken'];
        $dc = base64_decode($msisdn . '|' . $dsc);

        $body = '{"toBeSubscribedTo":false}';
        $ctl = strlen($body);

        $header = array("accept:application/json",
            "channelid:VMP",
            "authorization:Bearer $bearer",
            "idtoken:$idtoken",
            "transactionid:$tsc",
            "x-data-centre:$dc",
            "Content-Type:application/json;charset=utf-8",
            "Content-Length:$ctl",
            "Host:vmp.telkomsel.com",
            "Connection:Keep-Alive",
            "Accept-Encoding:gzip",
            "User-Agent:okhttp/3.12.1",
            "X-NewRelic-ID:VQ8GVFVVChAEUlJRBAcOUQ==");
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
        $json = json_decode($hasil, true);
        return $hasil;
    } else {
        $gagal = "Key yang anda Masukkan Salah";
        return $gagal;
    }
}
*/

