<?php

require 'xlrequestvip.php';

function service($str) {
	
	switch ((int) $str) {
		
case 1: return 8211472;
        break;
        
        case 2: return 8211183;
        break;
                        
        case 3: return 8211285;
        break;

        case 4: return 8211286;
        break;
        
        case 5: return 8211287;
        break;
        
        case 6: return 3212148;
        break;
        
        case 7: return 3212149;
        break;
        
        case 40: return 8110912;
        break;
        
        case 41: return 8110919;
        break;
        
        case 42: return 8110923;
        break;
        
        case 43: return 8110926;
        break;
        
        case 44: return 8110913;
        break;
        
        case 45: return 8110935;
        break;
        
        case 46: return 8110936;
        break;
        
        case 47: return 8110916;
        break;
        
        case 48: return 8111049;
        break;
		
		default:
		
	}
}
if (isset($_SESSION['simpan_nomor']) && isset($_POST['reg']))
{
	$msisdn = $_SESSION['simpan_nomor'];

	$idService = service($_POST['reg']);

	if( !empty($_POST['manual']) )
	{
		$idService = $_POST['manual'];
	}
	try
	{
		$request = new XlRequest();
			$fil = fopen('count_file.txt', 'r');
		    $dat = fread($fil, filesize('count_file.txt')); 
		    $dat+1;
		    fclose($fil);
		    $fil = fopen('count_file.txt', 'w');
		    fwrite($fil, $dat+1);
		    fclose($fil);
		    $register = $request->register($msisdn,$idService,$_SESSION['session']);
		    $hasil = json_decode($register, TRUE);
        	$index  = sizeof($hasil, 1);

		    if ($index == "14") {
        		echo "Terima Kasih, sudah berkunjung ke JAGOANSSH<br>Transaksi anda sedang di proses.";
                }else if ($index == "2"){

                    if ($hasil['message'] == 'Invalid Session'){
                        echo '<script>confirm("Sesi Kamu telah berakhir, Silakan Login Kembali!");</script>';
                        $session = session_destroy();
                        echo "<script type=\"text/javascript\" language=\"javascript\">
                     window.location.replace(\"login.php\");
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
