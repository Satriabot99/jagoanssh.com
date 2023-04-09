<?php
// --------------------------------------------------------------------------------
// Softaculous - Softaculous Development Kit
// --------------------------------------------------------------------------------
// // http://www.softaculous.com
// --------------------------------------------------------------------------------
//
// Description :
//   Softaculous_API is a Class of Softaculous that allows users to Install and Upgrade
//	 Scripts provided by Softaculous. It also also allows users to Remove, Backup & Restore
//	 the installations made on the server.
//
////////////////////////////////////////////////////////////////////////////////////
	
if(!defined('SOFTACULOUS')){	
	define('SOFTACULOUS', 1);
}

///////////////////////////////////
/////// Softaculous API ///////////
///////////////////////////////////

class Softaculous_API{
	
	// The Login URL
	var $login = '';
	
	var $debug = 0;
	
	var $error = array();

	// THE POST DATA
	var $data = array();
	
	var $scripts = array();
	var $iscripts = array();
	
	// Response Format [serialize] [xml] [json]
	var $format = 'serialize';
	
	/**
	 * A Function to Login with Softaculous Parameters.
	 *
	 * @package      API 
	 * @author       Jigar Dhulla
	 * @param        string $url URL of which response is needed
	 * @param        array $post POST DATA
	 * @return       string $resp Response of URL
	 * @since     	 4.1.3
	 */
	function curl($url, $post = array()){
		
		// Set the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		// Turn off the server and peer verification (TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		// Follow redirects
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		
		if(!empty($post)){ 
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Get response from the server.
		$resp = curl_exec($ch);
		
		// Did we get the file ?
		if($resp === false){
			$this->error[] = 'cURL Error : '.curl_error($ch);
		}
		
		curl_close($ch);
		
		return $resp;
	}
	
	/**
	 * A Function to Login with Softaculous Parameters.
	 *
	 * @package      API 
	 * @author       Jigar Dhulla
	 * @param        string $act Actions
	 * @param        array $post POST DATA
	 * @return       string $resp Response of Actions
	 * @since     	 4.1.3
	 */
	function curl_call($act, $post = array()){
			
		// Add the ?
		if(!strstr($this->login, '?')){
			$this->login = $this->login.'?';
		}
		
		// Login Page with Softaculous Parameters
		$this->login = $this->login.$act;
		
		// Set the API mode
		if(!strstr($this->login, 'api=')){
			$this->login = $this->login.'&api='.$this->format;
		}
		
		return $resp = $this->curl($this->login, $post);
		
	}
	
	/**
	 * A Function that will INSTALL scripts. If the DATA is empty script information is retured
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		int $sid Script ID
	 * @param		array $data DATA to POST
	 * @return		string $resp Response of Action. Default: Serialize
	 * @since		4.1.3
	 */	
	function install($sid, $data = array()){
	
		// Get the Scripts List
		$this->list_installed_scripts();
		
		// Script present ?
		if(empty($this->iscripts[$sid])){
			$this->error[] = 'Script Not Found';
			return false;
		}
		
		// Is JS / PERL or PHP
		if($this->iscripts[$sid]['type'] == 'js'){
			$act = '&act=js&soft='.$sid;
		}elseif($this->iscripts[$sid]['type'] == 'perl'){
			$act = '&act=perl&soft='.$sid;
		}else{
			$act = '&act=software&soft='.$sid;
		}
		
		// Submit Details
		if(!empty($data)){ // If empty DATA, return script information
			$data['softsubmit'] = 1;
		}
		
		return $resp = $this->curl_call($act, $data);
		
	}
	
	/**
	 * A Function that will IMPORT existing installations in Softaculous
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		int $sid Script ID
	 * @param		array $data DATA to POST
	 * @return		string $resp Response of Actions. Default: Serialize
	 * @since		4.1.3
	 */	
	function import($sid, $data = array()){
		
		// Get the Scripts List
		$this->list_installed_scripts();
		
		// Script present ?
		if(empty($this->iscripts[$sid])){
			$this->error[] = 'Script Not Found';
			return false;
		}
		
		// Action for Import
		$act = '&act=import&soft='.$sid;
		
		// Submit details
		$data['softsubmit'] = 1;
		
		// Get response from the server.
		return $resp = $this->curl_call($act, $data);		
	}
	
	/**
	 * A Function that will UPDATE scripts
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		string $insid Installation ID
	 * @param		array $data DATA to POST
	 * @return		string $resp Response of Actions. Default: Serialize
	 * @since		4.1.3
	 */	
	function upgrade($insid, $data = array()){
		// Action for Upgrade
		$act = '&act=upgrade&insid='.$insid;
		
		if(!empty($data)){ // If empty DATA, return upgrade information of the installation
			// Submit Details
			$data['softsubmit'] = 1;
		}
		
		// Get response from the server.
		return $resp = $this->curl_call($act, $data);
		
	}
	
	/**
	 * A Function that will Restore the Backup
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		string $name Backup File Name
	 * @param		array $data DATA to POST
	 * @return		string $resp Response of Actions. Default: Serialize
	 * @since		4.1.3
	 */	
	function restore($name, $data = array()){
		
		// Action for restore
		$act = '&act=restore&restore='.$name;
		
		// Submit details
		$data['restore_ins'] = 1;
			
		// Get response from the server.
		return $resp = $this->curl_call($act, $data);
		
	}
	
	/**
	 * A Function that will Remove the Installation
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		string $insid Installation ID
	 * @param		array $data DATA to POST
	 * @return		string $resp Response of Actions. Default: Serialize
	 * @since		4.1.3
	 */	
	function remove($insid, $data = array()){
		
		// Action for Remove
		$act = '&act=remove&insid='.$insid;
		
		// Submit details
		$data['removeins'] = 1;
	
		// Get response from the server.
		return $resp = $this->curl_call($act, $data);
		
	}
	
	/**
	 * A Function that will Backup the Installation. Backup process will go in background. 
	 * You will receive an email in case of any error
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		string $insid Installation ID
	 * @param		array $data DATA to POST
	 * @return		string $resp Response of Actions. Default: Serialize
	 * @since		4.1.3
	 */	
	function backup($insid, $data = array()){
		
		// Action for Backup
		$act = '&act=backup&insid='.$insid;
		
		// Submit details
		$data['backupins'] = 1;
	
		// Get response from the server.
		return $resp = $this->curl_call($act, $data);
		
	}
	
	/**
	 * A Function that will list installations
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @param		bool $showupdates. [True : Show only installations with update.]
	 * @return		array $resp Installations
	 * @since		4.1.3
	 */	
	function installations($showupdates = false){
	
		// Action to load installations
		$login = $this->login.'?act=installations&showupdates='.$showupdates.'&api=serialize';
	
		// Get response from the server.
		$resp = $this->curl($login);
		
		$_resp = unserialize($resp);
		
		return $_resp['installations'];
	}
	
	/**
	 * A Function that will list scripts
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @return		array $scripts List of Softaculous Scripts
	 * @since		4.1.3
	 */	
	function list_scripts(){
		
		if(!empty($this->scripts)){
			return true;
		}
		
		// Get response from the server.
		$file = $this->curl('http://api.softaculous.com/scripts.php?in=serialize');
		
		$this->scripts = unserialize($file);
		
		if(empty($this->scripts)){
			$this->error[] = 'Scripts were not loaded.';
			return false;
		}else{
			return true;	
		}
		
	}
	
	/**
	 * A Function that will list Backups
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @return		array $resp Backups
	 * @since		4.1.3
	 */	
	function list_backups(){
	
		$login = $this->login.'?act=backups&api=serialize';
	
		// Get response from the server.
		$resp = $this->curl($login);
		$resp = unserialize($resp);
		return $resp['backups'];
		
	}
	
	/**
	 * A Function that will list installed scripts
	 *
	 * @package		API 
	 * @author		Jigar Dhulla
	 * @return		array $scripts List of Installed Softaculous Scripts
	 * @since		4.1.3
	 */	
	function list_installed_scripts(){
		
		if(!empty($this->iscripts)){
			return true;
		}
		
		$login = $this->login.'?api=serialize';
		
		// Get response from the server.
		$resp = $this->curl($login);
		
		$resp = unserialize(trim($resp));
		
		$this->iscripts = $resp['iscripts'];		
		
		if(empty($this->iscripts)){
			$this->error[] = 'Installed Scripts were not loaded.';
			return false;
		}else{
			return true;	
		}
		
	}

}

////////////////////////////////////////////////////////////////////////////
//////////////////////////// Import Example ////////////////////////////////
////////////////////////////////////////////////////////////////////////////

/* <?php
@set_time_limit(100);

//Include Class
include_once('sdk.php');

$new = new Softaculous_API();

// Login Page
$new->login = 'https://user:password@domain.com:2083/frontend/x3/softaculous/index.live.php';
if(isset($_POST['domain'])){
	$data['softdomain'] = $_POST['domain']; // Domain Name
}

if(isset($_POST['directory'])){
	$data['softdirectory'] = $_POST['directory']; // Directory of the installation
}

// Submit the details
if(isset($_POST['submit'])){
	$res = $new->import($_POST['scripts'], $data); // Import Function
	$res = unserialize($res); // Unserialize the serialized array
	if(!empty($res['done'])){
		echo 'Imported';
	}else{
		print_r($res['error']); // Reason why Import was not successful
	}
}

if(empty($res)){

	//Get the list of scripts
	$new->list_installed_scripts();
	
	echo '<form action="" method="post">Select script you want to import : <select name="scripts">';
	foreach($new->iscripts as $sk => $sv){
		echo '<option value="'.$sk.'">'.$sv['name'].'</option>';
	}
	echo '</select><br />
	<tr>
		<td>Enter the Domain : <input type="text" name="domain" value=""></td>
	<tr><br />
	<tr>
		<td>Enter the Directory : <input type="text" name="directory" value=""></td> 
	<tr><br/>
	<input type="submit" name="submit" value="submit">
	</form>';
}

?>*/

////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////
/////////////////////////// Install Example ////////////////////////////////
////////////////////////////////////////////////////////////////////////////

/* <?php
@set_time_limit(100);

include_once('sdk.php');

$new = new Softaculous_API();
$new->login = 'https://user:password@domain.com:2083/frontend/x3/softaculous/index.live.php';

// Domain Name
$data['softdomain'] = 'domain.com'; // OPTIONAL - By Default the primary domain will be used

// The directory is relative to your domain and should not exist. e.g. To install at http://mydomain/dir/ just type dir. To install only in http://mydomain/ leave this empty.
$data['softdirectory'] = 'wp887'; // OPTIONAL - By default it will be installed in the /public_html folder

// Admin Username
$data['admin_username'] = 'admin';

// Admin Pass
$data['admin_pass'] = 'pass';

// Admin Email
$data['admin_email'] = 'admin@domain.com';

// Database
$data['softdb'] = 'wp887';

//Database User Name
$data['dbusername'] = 'wp887';

// DB User Pass 
$data['dbuserpass'] = 'wp887';

// Language
$data['language'] = 'en';

// Site Name
$data['site_name'] = 'Wordpess wp887';

// Site Description
$data['site_desc'] = 'WordPress API Test';

// Response
$res = $new->install(26, $data); // Will install WordPress(26 is its script ID)

// Unserialize
$res = unserialize($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Installed';
}else{
	echo 'Installation Failed<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
?>*/

////////////////////////////////////////////////////////////////////////////

?>