<?php

session_start();

require 'XlRequest.php';
function service($str) {
	
	switch ((int) $str) {
		
		case 1: return 8110671;
        break;
        
        case 2: return 8211010;
        break;
        
        case 3: return 8211011;
        break;

        case 4: return 8211012;
        break;
        
        case 5: return 8211013;
        break;

        case 6: return 8211014;
        break;

        case 7: return 8211170;
        break;
        
        case 8: return 8211171;
        break;
        
        case 9: return 8211172;
        break;
        
        case 10: return 8211173;
        break;
        
        case 11: return 8211116;
        break;

         case 12: return 8211365;
        break;

        case 13: return 8211366;
        break;
        
        case 14: return 8211367;
        break;
        
        case 15: return 8211368;
        break;
        
        case 16: return 8211369;
        break;
        
        case 17: return 8211370;
        break;
        
        case 18: return 8211371;
        break;
        
        case 19: return 8211372;
        break;

        case 20: return 8211373;
        break;

        case 21: return 8211374;
        break;

        case 22: return 8211375;
        break;
        
        case 23: return 8211376;
        break;
   
        case 24: return 8211377;
        break;
        
        case 25: return 8211378;
        break;

        case 26: return 8211379;
        break;

        case 27: return 8211380;
        break;

        case 28: return 8211381;
        break;

        case 29: return 8211382;
        break;

        case 30: return 8211383;
        break;

        case 31: return 8211384;
        break;

        case 32: return 8211345;
        break;

        case 33: return 8211386;
        break;

        case 34: return 8211387;
        break;

        case 35: return 8211388;
        break;

        case 36: return 8211389;
        break;

        case 37: return 8211472;
        break;

        case 38: return 8211473;
        break;

        case 39: return 8211474;
        break;

        case 40: return 8211475;
        break;
        
        case 41: return 8210882;
        break;

        case 42: return 8210883;
        break;
        
        case 43: return 8210884;
        break;

        case 44: return 8210885;
        break;
        
        case 45: return 8210886;
        break;

                       
        default;
		
	}
}


if (isset($_POST['reg']))
{
	$msisdn = $_SESSION['no'];
	$session = $_SESSION['dor'];
    $serviceID = service($_POST['reg']);
	try
	{
		$request = new XlRequest();
		$register = $request->register($msisdn, $serviceID, $session);
		if (!isset($register->responseCode)) {
				echo "<script>
						alert('Paket Berhasil Dibeli (Jangan Lupa Dukung Semut!)');
					</script>";
		    }else{
		        $request2 = new XlRequest();
                $register2 = $request2->register2($msisdn, $serviceID, $session);
                    if (!isset($register2->responseCode)) {
                        echo "<script>
                                alert('Paket Berhasil Dibeli (Jangan Lupa Dukung Semut!)');
                            </script>";
                    }else{
                        $print_r ($register2->message);
                       
                    }
                }
			
		}catch(Exception $e) {}
		
} else {
	   header("Location:/masuk.php");
}
?>
