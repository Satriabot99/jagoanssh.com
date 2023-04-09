<?php

session_start();

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

			'Connection' => 'keep-alive',

			'Referer' => 'https://my.xl.co.id/pre/index1.html',

			'Accept'=> 'application/json, text/plain, */*',

			'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0',

			'Accept-Language'=> 'en-US,en;q=0.5',

			'Accept-Encoding'=> 'gzip, deflate, br',

			'Content-Type'=> 'application/json'

		);

		$this->subscriber1 = '2031961700';



		$this->subscriber2 = '2031961700';

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

				
			$subscriberId = $this->getSubscriberID($msisdn, $body->sessionId);
			$this->subscriber1 = $subscriberId;
			$_SESSION['subscriberId'] = $subscriberId;

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

	public function register($msisdn, $serviceID, $session) {

	 

	   $payload = array (

	   				'Header' => null,

					'Body'=> array (

								'HeaderRequest' => array (

								    'applicationID'=> '3',

								    'applicationSubID'=> '1',

								    'touchpoint' => 'MYXL',

								    'requestID' => substr($this->date, 11),

								    'msisdn' => $msisdn,

								    'serviceID' => $serviceID

					            ),

					            'opPurchase'=> array (

								    'msisdn' => $msisdn,

								    'serviceid' => $serviceID

					            ),

							    'XBOXRequest' => array(

		                		"requestName"=>"GetSubscriberMenuId",

						   "Subscriber_Number"=> $_SESSION['subscriberId'],

						   "Source"=>"mapps",

						   "Trans_ID"=>"119520832111",

						   "Home_POC"=>"SM2",

						   "PRICE_PLAN"=>"513738114",

						   "PayCat"=>"PRE-PAID",

						   "Active_End"=>"20200521",

						   "Grace_End"=>"20200620",

						   "Rembal"=>"0",

						   "IMSI"=>"510110032177230",

						   "IMEI"=>"3571250436519001",

						   "Shortcode"=>"mapps"

						),

					            'Header' => array (

								    'IMEI'=> $this->imei,

								    'ReqID' => substr($this->date, 10)

					        )

				    ),

				    'sessionId'=> $session,

				    'serviceId' => $serviceID,

		          	'packageRegUnreg' => 'Reg',

		          	'reloadType' => '',

		          	'reloadAmt' => '',

		          	'packageAmt'=>'249.000',

		          	'platform' => '04',

		          	'appVersion' => '3.8.2',

		          	'sourceName' => 'Others',

		          	'sourceVersion' => '',

		          	'msisdn_Type' => 'P',

		          	'screenName' => 'home.storeFrontReviewConfirm',

		          	'mbb_category' => ''

		 );
		try {

			$response = $this->client->post('/pre/opPurchase',[

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
	
	public function getSubscriberID($msisdn, $session) {

	    $payload = array (

	    		'Header' => null,

	            'Body' => array (

	                    'Header' => array(

	                            'IMEI' => $this->imei,

	                            'ReqID' => substr($this->date, 11),

	                    ),

	                    'PayloadQueryBalanceReq' => array(

	                        'msisdn' => $msisdn,

	                        'type' => 'ALL',

	                    )

	             ),

	            'sessionId' => $session,
	            'serviceId'=> '',
				'packageAmt'=> '',
				'reloadType'=> '',
				'reloadAmt'=> '',
				'packageRegUnreg'=> '',
				'platform'=> '04',
				'appVersion'=> '3.8.2',
				'sourceName'=> 'Firefox',
				'sourceVersion'=> '',
				'msisdn_Type'=> 'P',
				'screenName'=> 'home.dashboard',
				'mbb_category'=> ''

	   );
	   
	   try {



			$response = $this->client->post('/pre/PayloadQueryBalanceReq',

				[

					'debug' => FALSE,

					'json' => $payload,

					'headers' => $this->header

				]

			);

			$body = json_decode($response->getBody());

			$hasil = json_decode($response->getBody(), TRUE);

 			$index  = sizeof($hasil, 1);

			$response = array();
			$this->objToArray($body, $response);
			$response = $response['SOAP-ENV:Envelope']['SOAP-ENV:Body'][0];
			$response = $response['BilDiameterMediation:PayloadQueryBalanceResp'][0];
			$response = $response['diabilling:QueryInformation'][0]['diabilling:SubscriberID'][0];
            return $response;

		}

		catch (Exception $e) {

			return $e;

		}

	}
	
	function objToArray($obj, &$arr){

		if(!is_object($obj) && !is_array($obj)){
			$arr = $obj;
			return $arr;
		}

		foreach ($obj as $key => $value)
		{
			if (!empty($value))
			{
				$arr[$key] = array();
				$this->objToArray($value, $arr[$key]);
			}
			else
			{
				$arr[$key] = $value;
			}
		}
		return $arr;
	}
}

?>