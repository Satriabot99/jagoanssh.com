<?php
/**
 *Name:    XlRequest
 *Author:  Adipati arya
 *aryaadipati2@gmail.com
 *@adipati
 *
 * Added Awesomeness: Adipati arya
 *
 * Created:  11.10.2017
 *
 * Description:  Modified auth system based on Guzzle with extensive customization. This is basically what guzzle should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 * @package		Xlrequest
 * @author		aryaadipati2@gmail.com
 * @link		http://sshcepat.com/xl
 * @filesource	https://github.com/adipatiarya/XLRequest
 */
 
require 'XlRequest.php';
$init  = new XlRequest();
if (isset($_POST['msisdn'])) {
	$request = $init->getPass($_POST['msisdn']);
	if (!isset($request->responseCode)) {
		echo "Password dikirim ke ". $_POST['msisdn'];
	}
	else {
		foreach($request as $key=>$value) {
			echo $key . ' : ' . $value . "<br>";
		}
	}
}
?>
