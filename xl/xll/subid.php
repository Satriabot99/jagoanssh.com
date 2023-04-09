<?php

require 'XlRequest.php';

if (isset($_SESSION['simpan_nomor']) && isset($_SESSION['session']))
{
	$msisdn = $_SESSION['simpan_nomor'];

	$session = $_SESSION['session'];
	try
	{
		$request = new XlRequest();
		    $register2 = $request2->subid($msisdn,$session);
		    $hasil = json_decode($register2, TRUE);
        	$index  = sizeof($hasil, 1);

		    if ($index == "14") {
        		echo "Berhasil mendapat sub ID";
                }else if ($index == "2"){

                    if ($hasil['message'] == 'Invalid Session'){
                        echo '<script>confirm("Sesi Kamu telah berakhir, Silakan Login Kembali!");</script>';
                        $session = session_destroy();
                        echo "<script type=\"text/javascript\" language=\"javascript\">
                     window.location.replace(\"Login.php\");
                 </script>";
                 }
                 else{
            		echo "Paket Tidak Ditemukan";
        		}
		}
			
	}
	catch(Exception $e) {}
 }
?>