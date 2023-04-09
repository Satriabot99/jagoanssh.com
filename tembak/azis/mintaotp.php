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
$success ="btn-success";
require 'XlRequest.php';
$init  = new XlRequest();
if (isset($_POST['msisdn'])) {
	$nomor = $_POST['msisdn'];
	$id = $_POST['serviceID'];
	$request = $init->getPass($nomor, $id);
	if (!isset($request->responseCode)) {
		echo "<div class=".$success.">Terimakasih sudah berkunjung ke jagoanssh.com transaksi anda sedang di proses</div>";
	}
	else {
		foreach($request as $key=>$value) {
			echo $key . ' : ' . $value . "<br>";
		}
	}
}
?>
