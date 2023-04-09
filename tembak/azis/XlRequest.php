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

		

		$this->client =new Client(['base_uri' => 'https://trxpackages.api.axis.co.id']); 

		

		$this->imei = '1214806799'; 

		

// a26f8bbe24104a6d

// 3606249865



		$this->date = date('Ymdims');

		

		$this->header=array (

			'content=eyJyZXB1cmNoYXNlIjpmYWxzZSwic2VydmljZV90eXBlIjoiQU5OSVZFUlNBUlkiLCJzb2NjZCI6Ik1hc3RlciIsInNlcnZpY2VfaWQiOiIzMjEzODg1In0%3D'

		);

		$this->subscriber1 = '2031961700';



		$this->subscriber2 = '2031961700';

	}

	public function getPass($msisdn) {

	$reqpay = 'content=eyJyZXB1cmNoYXNlIjpmYWxzZSwic2VydmljZV90eXBlIjoiQU5OSVZFUlNBUlkiLCJzb2NjZCI6Ik1hc3RlciIsInNlcnZpY2VfaWQiOiIzMjEzODg1In0%3D';
    $ctl = strlen($body);
    $headers = array(
        "x-app-version: 7.1.1",
        "Authorization: $msisdn",
        "Content-Type: application/x-www-form-urlencoded",
        "Host: trxpackages.api.axis.co.id",
        "Connection: close",
        "Accept-Encoding: gzip, deflate",
        "User-Agent: okhttp/3.14.4"
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://trxpackages.api.axis.co.id/package/user/claim");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $reqpay);
    $hasil = curl_exec($ch);
    $json = json_decode($hasil, true);
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