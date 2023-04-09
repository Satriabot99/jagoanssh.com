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

        case 15: return 8211010;
        break;

        case 16: return 8211011;
        break;

        case 17: return 8211012;
        break;

        case 18: return 8211013;
        break;

        case 19: return 8211014;
        break;

        case 20: return 8210965;
        break;

        case 21: return 8211231;
        break;
        
        case 22: return 8211369;
        break;
        
        case 23: return 8211370;
        break;
        
        case 24: return 8211371;
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
        		echo "Terima Kasih, transaksi anda sedang di proses. Jangan lupa untuk suport jagoanssh";
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
