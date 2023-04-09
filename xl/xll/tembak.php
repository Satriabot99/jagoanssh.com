<?php

require 'XlRequest.php';

function service($str) {
	
	switch ((int) $str) {
		
case 1: return 8110671;
        break;
        
        case 2: return 8211183;
        break;
                        
        case 3: return 1210958;
        break;

        case 4: return 1210942;
        break;

        case 5: return 1210959;
        break;
        
        case 6: return 8210683;
        break;
                        
        case 7: return 8210684;
        break;
                        
        case 8: return 8210685;
        break;
                        
        case 9: return 8210066;
        break;
                        
        case 10: return 8210067;
        break;
                        
        case 11: return 8210068;
        break;
                        
        case 12: return 8211107;
        break;
                        
        case 13: return 8211108;
        break;
                        
        case 14: return 8211109;
        break;

        case 15: return 8210882;
        break;

        case 16: return 8210883;
        break;

        case 17: return 8210884;
        break;

        case 18: return 8210885;
        break;

        case 19: return 8210886;
        break;

        case 20: return 8210965;
        break;

        case 21: return 8211231;
        break;
        
        case 22: return 8110801;
        break;
        
        case 23: return 8211370;
        break;
        
        case 24: return 8211371;
        break;
        
        case 25: return 8110803;
        break;
        
        case 26: return 8110800;
        break;
        
        case 27: return 8110799;
        break;
        
        case 28: return 8110812;
        break;
        
        case 29: return 8110813;
        break;
        
        case 30: return 8211369;
        break;
        
        case 31: return 8211928;
        break;
        
        case 32: return 8211929;
        break;
        
        case 33: return 8211849;
        break;
        
        case 34: return 8211378;
        break;
        
        case 35: return 8211379;
        break;
        
        case 36: return 8211380;
        break;
        
        case 37: return 8211381;
        break;
        
        case 38: return 8211382;
        break;
        
        case 39: return 8211383;
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
        
        case 48: return 8110970;
        break;
        
        case 49: return 8110968;
        break;
        
        case 50: return 8110969;
        break;
        
        case 51: return 8110973;
        break;
        
        case 52: return 8110960;
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
		$request2 = new XlRequest();
			$fil = fopen('count_file.txt', 'r');
		    $dat = fread($fil, filesize('count_file.txt')); 
		    $dat+1;
		    fclose($fil);
		    $fil = fopen('count_file.txt', 'w');
		    fwrite($fil, $dat+1);
		    fclose($fil);
		    $register2 = $request2->register($msisdn,$idService,$_SESSION['session']);
		    $hasil = json_decode($register2, TRUE);
        	$index  = sizeof($hasil, 1);

		    if ($index == "14") {
        		echo "Terima Kasih, sudah berkunjung ke JAGOANSSH<br>Transaksi anda sedang di proses.";
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
