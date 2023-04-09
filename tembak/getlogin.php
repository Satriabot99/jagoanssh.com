<?php
require 'XlRequest.php';
$init  = new XlRequest();
if (isset($_POST['msisdn'])) {
	$nomor = $_POST['msisdn'];
	$otp = $_POST['passwd'];
	$request = $init->login($nomor, $otp);
	print_r($request);

	//if (!isset($request->responseCode)) {
	//	echo "Password dikirim ke ". $_POST['msisdn'];
	//}
	//else {
	//	foreach($request as $key=>$value) {
	//		echo $key . ' : ' . $value . "<br>";
	//	}
	//}
}
?>
