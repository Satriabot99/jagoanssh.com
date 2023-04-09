<?php
session_start();
/**
 * Name:    XlRequest
 * Author:  Adipati arya
 *           aryaadipati2@gmail.com
 * @adipati
 *
 * Added Awesomeness: Adipati arya
 *
 * Created:  11.10.2017
 *
 * Description:  Modified auth system based on Guzzle with extensive customization. This is basically what guzzle should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 * @package		Xlrequest
 * @author		aryaadipati2@gmail.com
 * @link		http://sshcepat.com/xl
 * @filesource	https://github.com/adipatiarya/XLRequest
 */
require 'vendor/autoload.php';
use GuzzleHttp\Client;

class XlRequest {
	
	private $imei; 
	
	private $msisdn;
	
	private $client;
	
	private $header;
	
	private $session;
	
	private $date;
	
	private $subscriber1;

	private $subscriber2;
	
	public function __construct() {
		
		$this->client =new Client(['base_uri' => 'https://my.xl.co.id']); 
		
		$this->imei = '1214806799'; 
		
// a26f8bbe24104a6d
// 3606249865

		$this->date = date('Ymdims');
		
		$this->header=array (
			'Host' => 'my.xl.co.id',
			'Accept'=> 'application/json, text/plain, */*',
			'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0',
			'Accept-Language'=>'id,en-US;q=0.7,en;q=0.3',
			'Accept-Encoding'=>'gzip, deflate, br',
			'Content-Type'=> 'application/json',
			'Access-Control-Allow-Origin'=>'True',
			'Content-Length'=>'955',
            'Origin'=>'https://my.xl.co.id',
            'DNT'=>'1',
            'Connection'=>'keep-alive',
            'Referer'=>'https://my.xl.co.id/pre/index1.html',
            'Cookie'=>'TS01e70a0f=017f69ee3c9060bc499c58b05598a2d109acf709bbd60c6c54037b8f1d484cc2e57ae2f64a9d1291cd9653e4060db1764e772ff48eac290ba18da0af944b4c67c64ff5bc88; connect.sid=s%3APdaGgKvaZQsc-PZAGBRfd3zBN0FwnFiR.9fzOcLJBRsV10S%2BGnUBW6GFizM9h3fAwHLLMFVrcJwE',
            'Pragma'=>'no-cache',
            'Cache-Control'=>'no-cache'
		);
		$this->subscriber1 = '1389438918';

		$this->subscriber2 = '1389438918';
	}
	public function login($msisdn, $passwd) {
	    $payload = array (
	    		'Header' => null,
	            'Body' => array (
	                    'Header' => array(
	                            'IMEI' => $this->imei,
	                            'ReqID' => substr($this->date, 11),
	                    ),
	                    'LoginValidateOTPRq' => array(
	                    	'headerRq' => array(
	                    		'requestDate' => substr($this->date, 11),
		                        'requestId' => $this->imei,
		                        'channel' => 'MYXLPRELOGIN'
		                    ),
	                        'msisdn' => $msisdn,
	                        'otp' => $passwd,
	                    )
	             ),
	            'sessionId' => null,
	            'platform' => '04',
	            'msisdn_Type' => 'P',
	            'serviceId' => '',
	            'packageAmt' => '',
	            'reloadType' => '',
	            'reloadAmt' => '',
	            'packageRegUnreg' => '',
	            'appVersion' => '3.7.0',
	            'sourceName' => 'Chrome',
	            'sourceVersion' => '',
	            'screenName' => 'login.enterLoginOTP',
	            'mbb_category' => ''
	   );
	   try {

			$response = $this->client->post('/pre/LoginValidateOTPRq',
				[
					'debug' => FALSE,
					'json' => $payload,
					'headers' => $this->header
				]
			);
			$body = json_decode($response->getBody());
			$hasil = json_decode($response->getBody(), TRUE);
 			$index  = sizeof($hasil, 1);

 			if($index == 8){
			if($body->LoginValidateOTPRs->responseCode == '00'){
			echo '<script>confirm("Login Berhasil");</script>';
			$_SESSION['simpan_nomor'] = $msisdn;
          		$_SESSION['indexx'] = $body->LoginValidateOTPRs->responseCode;
			$_SESSION['session'] = $body->sessionId;
			        echo "<script type=\"text/javascript\" language=\"javascript\">
			         window.location.replace(\"index.php\");
			     </script>";
			 }
			}
            		//return;
		}
		catch (Exception $e) {
			return $e;
		}
	}
	
	public function getPass($msisdn) {
		
		$payload = array (
					'Header' => null,
						'Body'=> array (
							'Header'=> array (
								'ReqID'=>substr($this->date, 10),
								'IMEI'=>$this->imei
								),
							'LoginSendOTPRq'=> array (
								'msisdn'=>$msisdn,
							)
						),
						'sessionId'=>null,
						'onNet' => 'False',
			            'platform' => '04',
			            'serviceId' => '',
			            'packageAmt' => '',
			            'reloadType' => '',
			            'reloadAmt' => '',
			            'packageRegUnreg' => '',
			            'appVersion' => '3.7.0',
			            'sourceName' => 'Chrome',
			            'sourceVersion' => '',
			            'screenName' => 'login.enterLoginNumber'
				);
				
				try {
					$response = $this->client->post('pre/LoginSendOTPRq',[
						'debug' => FALSE,
						'json' => $payload,
						'headers' => $this->header
				  ]);
				  $body = json_decode($response->getBody());
 
				  return $body;
				}
				catch(Exception $e) {}
				
	}
	public function subid($msisdn, $session) {
	 
	  $payload = array (
	    		'Header' => null,
	            'Body' => array (
	                    'Header' => array(
	                            'ReqID' => substr($this->date, 11),
	                            'IMEI' => $this->imei,
	                    ),
	                    'PayloadQueryBalanceReq' => array(
	                    		'msisdn' => $msisdn,
		                        'type' => 'ALL',
		                    )
	             ),
	            'sessionId' => $session,
	            'serviceId' => '',
	            'platform' => '02',
	            'msisdn_Type' => 'P',
	            'packageAmt' => '',
	            'reloadType' => '',
	            'reloadAmt' => '',
	            'packageRegUnreg' => '',
	            'appVersion' => '3.8.2',
	            'sourceName' => 'Other',
	            'sourceVersion' => '',
	            'screenName' => 'home.dashboard',
	            'mbb_category' => ''
	   );
		try {
			$response = $this->client->post('/pre/PayloadQueryBalanceReq',[
					'debug' => FALSE,
					'json' => $payload,
					'headers' => $this->header
			]);
			$status = json_decode((string) $response->getBody());
			
			// if (isset($status->responseCode)) { return $status; }
			
			// else {
			//     return true;
			// }
			 return $response->getBody();
		}
		catch(Exception $e) {
			return $e;
		}
	}
	
	public function register2($msisdn, $serviceID, $session) {

		$payload = array(
			"Header"=>null,
			"Body"=> array(
				"HeaderRequest"=>array(
					"applicationID"=>"3",
					"applicationSubID"=>"1",
					"touchpoint"=>"MYXL",
					"requestID"=>substr($this->date, 10),
					"msisdn"=>$msisdn,
					"serviceID"=>$serviceID
					),
					  "opPurchase"=> array(
						"msisdn"=>$msisdn,
						 "serviceid"=>$serviceID
						 ),
						"XBOXRequest"=>array(
							"requestName"=>"GetSubscriberMenuId",
							"Subscriber_Number"=>$this->subscriber2,
							"Source"=>"mapps",
							"PayCat"=>"PRE-PAID",
							"Rembal"=>"0",
							"Shortcode"=>"mapps"
						 ),
						  "Header"=>array(
							  "IMEI"=> $this->imei,
							  "ReqID"=>substr($this->date, 10)
						 )
						 ),
						 "sessionId" => $session,
						 "serviceId"=> $serviceID,
						 "packageRegUnreg"=>"Reg",
						 "reloadType"=>"",
						 "reloadAmt"=>"",
						 "platform"=>"04",
						 "appVersion"=>"3.8.1",
						 "sourceName"=>"Firefox",
						 "sourceVersion"=>"",
						 "msisdn_Type"=>"P",
						 "screenName"=>"home.storeFrontReviewConfirm",
						 "mbb_category"=>""
						 );
		 try {
			 $response = $this->client->post('/pre/opPurchase',[
					 'debug' => FALSE,
					 'json' => $payload,
					 'headers' => $this->header
			 ]);
			 $status = json_decode((string) $response->getBody());
			 return $status;
		 }
		 catch(Exception $e) {
			 return $e;
		 }
	 }
	
}
?>
