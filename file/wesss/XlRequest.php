<?php

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
		
		$this->imei = '3606249865';
		
// 3606249865
// a26f8bbe24104a6d
		
		$this->date = date('Ymdhis');
		
		$this->header=array (
			'Host' => 'my.xl.co.id',
			'Accept'=> 'application/json, text/plain, */*',
			'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0',
			'Accept-Language'=> 'en-US,en;q=0.5',
			'Accept-Encoding'=> 'gzip, deflate, br',
			'Content-Type'=> 'application/json'
		);
		$this->subscriber1 = '2099690413';

		$this->subscriber2 = '2058493708';
	}
	
	public function login($msisdn, $otpCode) {
	    $payload = array (
            "Header"=>null,
            "Body"=>array (
                "Header" => array(
                    "ReqID"=> substr($this->date, 10),
                    "IMEI"=> $this->imei
                    ),
                    "LoginValidateOTPRq"=> array(
                        "headerRq"=>array(
                            "requestDate"=> substr($this->date, 8),
                            "requestId" =>substr($this->date, 10),
							"channel" => "MYXLPRELOGIN"
						),
                            "msisdn" => $msisdn,
                            "otp" => $otpCode
                            )
	                            ),
	                            "sessionId"=>null,
	                            "platform"=>"04",
	                            "msisdn_Type"=>"P",
	                            "serviceId"=>"",
	                            "packageAmt"=>"",
	                            "reloadType"=>"",
	                            "reloadAmt"=>"",
	                            "packageRegUnreg"=>"",
	                            "appVersion"=>"3.8.1",
	                            "sourceName"=>"Firefox",
	                            "sourceVersion"=>"",
	                            "screenName"=>"login.enterLoginOTP",
	                            "mbb_category"=>""
	                            );
	   try {
            $response = $this->client->post('pre/LoginValidateOTPRq',
				[
					'debug' => FALSE,
					'json' => $payload,
					'headers' =>$this->header
				]);
				$body = json_decode((string)$response->getBody());
				return $body;
				// if ($body->responseCode === '00') {
				// 		$this->session == $body->sessionId;
				// 	}else{
				// 		return false;
				// 	}
			}catch (Exception $e) {
				return $e; 
			}
	}
	
	public function getPass($msisdn) {
		
		$payload = array (
					'header'=> null,
						'Body'=> array (
							'Header'=> array (
								'ReqID'=>substr($this->date, 10),
								'IMEI'=>$this->imei
								),
							'LoginSendOTPRq'=> array (
								'msisdn'=>$msisdn
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
	public function register($msisdn, $serviceID, $session) {

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
						   "Subscriber_Number"=>$this->subscriber1,
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
