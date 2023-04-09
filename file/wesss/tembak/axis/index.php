<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: /../../index.php");
    exit;
}
?>
<?php

function RequestLogin($nomor, $pass, $wait){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://gretonger.herokuapp.com/api/axisnet/login");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"msisdn=".$nomor."&password=".$pass."&_aptget_id=&anuID=1&submit=");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_REFERER, 'http://satriawibawa.jagoanssh.com/index.php');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        return $server_output;
        sleep($wait);
        flush();
    };
function BeliLangsung($nomor2, $wait, $id, $token){
    $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://gretonger.herokuapp.com/api/axisnet/buy");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "msisdn=".$nomor2."&token=".$token."&pkgid=".$id."");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_REFERER, 'http://satriawibawa.jagoanssh.com/index.php');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        return $server_output;
        sleep($wait);
        flush();
    }
    function service($str) {
    switch ((int) $str) {
        case 1: return 3212196;
        break;

        default;
    }
    }
       $token = '';
       $respon = '';
       $nomor2 ='';
      if (isset($_POST["login"])) {
            $nomor = $_POST['nomor'];
            $pass = $_POST['pass'];
            $jeda = "1";
            $id = service($_POST['anuID']);
            if( !empty($_POST['idm']) )
    {
        $id = $_POST['idm'];
    }
            $execute = RequestLogin($nomor, $pass, $jeda);
            $json = json_decode($execute,1);
            $cek = $json ['code'];

// Array ( [msisdn] => Xc05NWYIgFUJMccICo7cUQ== [token] => 2887709204_4bde3508317-7 [code] => 200 [message] => Success )    //     $data 
            if ($cek == '200') {
                $token = $json['token'];
                $nomor2 = $json ['msisdn'];
                $dor = BeliLangsung($nomor2, $jeda, $id, $token);
                $respon = $dor;
            }
        //         $sessionId = $data ['sessionId'];
        //         $dor = BeliLangsung($nomor, $jeda, $id, $sessionId);
        //         $data2 = json_decode($dor, 1);
        //         if (!isset($data2->responseCode)) {
        //                 $respon = 'Berhasil';
        //         }
        //         else {
        //             foreach($data2 as $key=>$value) {
        //                 echo $key . ' : ' . $value . "<br>";
        //             }

                
        //     }

        // }
    }

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tembak Axis</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style type="text/css">
.container{

        margin:60px auto;

        max-width:400px;

        

    }

    #EE{

        width: 50%;

    }

    textarea { resize:none; }

    #response{
        text-align: center;
    }
    #EE{
        width: 50%;
    }
    textarea { resize:none; }
    #count{
        text-align: right;
    }
</style>
</head>
<body>
<br>
<div id="container">
    <h3>Tembak Axis</h3>
    <hr/>
    <div class="form-group">
        <?php

        (isset($_POST["anuID"])) ? $anuID = $_POST["anuID"] : $anuID=1;

        ?>
            <form action="" method='post'>
                <div class="Login" style="display: block;">
                <label>Nomor : </label>
                <!-- <div class="input-group mb-3"> -->
                <input class="form-control" type="text" name="nomor" value="<?php echo isset($_POST['nomor']) ? $_POST['nomor'] : ''; ?>" placeholder="08xx " required> <!-- <br><div class="input-group-append">
                <button type="submit" class="btn btn-info" name="OTP">Minta OTP</button></div></div> -->
                <label>password : </label>
                <input class="form-control" type="text" name="pass" value="<?php echo isset($_POST['_otp']) ? $_POST['pass'] : ''; ?>" placeholder="cmngH">
                <label>Manual Id : </label>
                <input class="form-control" type="text" name="idm" value="<?php echo isset($_POST['_otp']) ? $_POST['idm'] : ''; ?>" placeholder="3212290">
                <div class="form-group">
                    <label>Pilih paket default</label><br>
                    <select class="form-control" id="anuID" name="anuID">
                    <option <?php if ($anuID == 1 ) echo 'selected' ; ?> value="1">1GB 19k</option>
    
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="login">Beli Paket</button><br><br>
                </div>
            </form>
             <textarea class="form-control input-sm" type="textarea" placeholder="Log Respon" maxlength="150" rows="2" style="text-align: center;" readonly><?php echo $respon; ?></textarea>
<center>
    <p> &copy; 2018 Kumpul4semut</p>
<center>
    </div>
</body>
</html>
