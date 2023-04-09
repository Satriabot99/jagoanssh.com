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
    "2020",
    "avkFqU3D",
    "k4Heen0E",
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

function login($authid, $otp, $key, $tsc)
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
        $_SESSION['key'] = trim($key);
        return $hasil;
        //} else {
        // $gagal = "<div class='alert alert-warning'>Key yang kamu masukan salah silahkan cek group FB jagoanssh untuk info key terbaru</div>";
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
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    $hasil = curl_exec($ch);
    //$json = json_decode($hasil, true);
    curl_close($ch);
      $json_a = json_decode($hasil, true);
    	$meseg = $json_a['message'];
			if ($meseg == "BIZ-UXP-0001") { return "Paket tidak tersedia saat ini. Silakan coba beberapa saat lagi."; }
			else if ($meseg == "BIZ-UXP-0002") { return "Maaf,anda tidak memiliki cukup pulsa untuk membeli paket ini. Silakan isi ulang pulsa untuk melanjutkan.";}
			else if ($meseg == "BIZ-UXP-0003") { return "Kami tidak dapat menemukan paket yang cocok berdasarkan lokasi Anda saat ini."; }
			else if ($meseg == "BIZ-UXP-0006") { return "Paket tidak tersedia untuk hari ini. Silakan coba kembali."; }
			else if ($meseg == "BIZ-UXP-0007") { return "Paket tidak tersedia saat ini. Silakan coba kembali."; }
			else if ($meseg == "BIZ-UXP-0008") { return "Maaf, kuota paket ini sudah habis untuk hari ini."; }
			else if ($meseg == "BIZ-UXP-0009") { return "Anda telah melebihi jumlah kuota Anda untuk dapat membeli paket ini. Silakan pilih paket lainnya."; }
			else if ($meseg == "BIZ-UXP-0010") { return "Nomor ponsel Anda tidak cocok dengan skema tarif untuk paket ini. Silakan pilih paket lainnya."; }
			else if ($meseg == "BIZ-UXP-0011") { return "Nomor ponsel Anda tidak memenuhi syarat untuk paket ini. Silakan pilih paket lainnya."; }
			else if ($meseg == "BIZ-UXP-0013") { return "Maaf,saat ini kami tidak dapat menemukan rincian info akun Anda. Silakan coba beberapa saat lagi."; }
			else if ($meseg == "BIZ-UXP-0014") { return "Maaf! Kami tidak dapat menemukan rincian dari akun Anda. Silakan coba beberapa saat lagi."; }
			else if ($meseg == "BIZ-UXP-0015") { return "Maaf, paket ini tidak tersedia untuk nomor ponsel Anda. Silakan pilih paket lainnya."; }
			else if ($meseg == "BIZ-UXP-0016") { return "Maaf, nomor ponsel Anda dalam masa tenggang. Silakan isi ulang pulsa untuk melanjutkan."; }
			else if ($meseg == "BIZ-UXP-0017") { return "Maaf, kuota untuk paket ini sudah habis. Silakan pilih paket lainnya.";}
			else if ($meseg == "BIZ-UXP-1101") { return "Transaksi Anda sebelumnya masih dalam proses. Silakan tunggu beberapa saat lagi"; }
			else if ($meseg == "BIZ-UXP-1102") { return "Maaf,saat ini paket tidak tersedia."; }
			else { return " $hasil."; }
/*}
else
{
$gagal = "Key yang anda Masukkan Salah";
return $gagal;
}*/
}


