<?php
session_start();

require 'XlRequest.php';

if (isset($_POST['msisdn']) && isset($_POST['otpCode']))
{
	$msisdn = $_POST['msisdn'];
	$otpCode = $_POST['otpCode'];
	try
	{
		$request = new XlRequest();
		$login = $request->login($msisdn,$otpCode);
		if (!empty($login->sessionId)) {
			$sesi = $login->sessionId;
			$_SESSION['dor'] = $sesi;
			$_SESSION['no'] = $msisdn;
			header("Location: belipaket.php");
		}else{
			echo "Login Gagal";
		}
	
	
	}catch(Exception $e) {}
		
} else {
	   header("Location:/");
}
?>
