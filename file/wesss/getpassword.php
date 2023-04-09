<?php

require 'XlRequest.php';

if (isset($_POST['msisdn'])) {
	
	$init  = new XlRequest();
	$pass = $init->getPass($_POST['msisdn']);
	//print_r($pass);
	if (!isset($pass->responseCode)) {
		echo "<script>
				alert('Otp Terkirim!');
			</script>";
	}
	else {
		foreach($pass as $key=>$value) {
			echo $key . ' : ' . $value . "<br>";
		}
	}
}
else {
	Header("Location:/");
}
?>
