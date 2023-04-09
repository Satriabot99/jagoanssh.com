<?php

// --------------------------------------------------------------------------------
// Webuzo - Softaculous Development Kit
// --------------------------------------------------------------------------------
// // http://www.webuzo.com
// --------------------------------------------------------------------------------
//
// Description :
//   Webuzo_API is a Class of Webuzo that allows users to perform action on all of the features //   provided by Webuzo like managing FTP, Certificates, Domains, MX records, Email accounts, 
//   Forwarders, Zoner files, SSH, IP Block, Installing Tomcat/Rockmongo/AWStats in addition to
//   installing, upgrading, removing, backing up & restoring the installations made on the
//   server.
//
////////////////////////////////////////////////////////////////////////////////////
	
if(!defined('SOFTACULOUS')){	
	define('SOFTACULOUS', 1);
}

	
if(!defined('WEBUZO')){	
	define('WEBUZO', 1);
}

include_once('sdk.php');

///////////////////////////////
///////// Webuzo API //////////
///////////////////////////////	

class Webuzo_API extends Softaculous_API{	

	// The Login URL
	var $login = '';
	
	var $debug = 0;
	
	var $error = array();

	// THE POST DATA
	var $data = array();
	
	
	/**
	 * Initalize API login
	 *
	 * @category	 Login  
	 * @param        string $user The username to LOGIN
	 * @param        string $pass The password
	 * @param        string $host The host to perform actions
	 * @return       void
	 */
	function __construct($user, $pass, $host){
		
		$this->login = 'https://'.$user.':'.$pass.'@'.$host.':2003/index.php';
	
	}
	
	///////////////////////////////////////////////////////////////////////////////
	//							CATEGORY : FEATURES								 //
	///////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Check login error
	 *
	 * @category	 error
	 * @return       array
	 */
	function chk_error(){
		if(!empty($this->error)){
			return $this->r_print($this->error[0]);
		}		
	}
	
	/**
	 * List Domains
	 *
	 * @category	 Domain
	 * @return		string $resp Response of Action. Default: Serialize
	 */
	function list_domains(){
		$act = 'act=domainmanage';
		$resp = $this->curl_call($act);
		$this->chk_error();		
		return trim($resp);
	}
	
	/**
	 * Add Domain
	 *
	 * @category	 Domain
	 * @param        string $domain The domain to add
	 * @param		 (Optional) string $domainpath The path for an ADD-ON domain
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function add_domain($domain, $domainpath = ''){
		
		// The act
		$act = 'act=domainadd';

		$data['domain'] = $domain;
		$data['domainpath'] = $domainpath;
		$data['isaddon'] = !empty($domainpath);

		$data['submitdomain'] = 1;
		
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete Domain
	 *
	 * @category	 Domain
	 * @param        string $domain The domain to delete
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function delete_domain($domain){
		
		// The act
		$act = 'act=domainmanage';	
		
		$data['delete_domain_name'] = $domain;

		$data['delete_domain_id'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Change Endusers's Password
	 *
	 * @category	 Password
	 * @param        string $pass The NEW password for the USER
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function change_password($pass){
		
		// The act
		$act = 'act=changepassword';
		$data['newpass'] = $data['conf'] = $pass;
		$data['changepass'] = 1;
		
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Change File Manager Password
	 *
	 * @category	 Password
	 * @param        string $pass The NEW password for the File manager
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function change_fileman_pwd($pass){
		
		// The act
		$act = 'act=changepassword';	
		$data['filepass'] = $pass;
		$data['changefilepass'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Change Apache Tomcat Manager's Password
	 *
	 * @category	 Password
	 * @param        string $pass The NEW password for the Apache Tomcat
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function change_tomcat_pwd($pass){
		
		// The act
		$act = 'act=changepassword';
		$data['tomcatpass'] = $pass;
		$data['changetomcatpass'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List FTP users
	 *
	 * @category	 FTP
	 * @return       array
	 */
	function list_ftpuser(){
		$act = 'act=ftp';
		$resp = $this->curl_call($act);
		$this->chk_error();
		return $resp;		
	}
	
	/**
	 * Add FTP user
	 *
	 * @category	 FTP
	 * @param        string $user The FTP username
	 * @param        string $pass The password for the FTP user
	 * @param        string $directory The Directory path for the FTP users relative to /HOME/USER
	 * @param        string $quota_limit (Optional) Define a quota for the user
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function add_ftpuser($user, $pass, $directory, $quota_limit = ''){
		$act = 'act=ftp_account';
		
		$data['login'] = $user;
		
		$data['newpass'] = $data['conf'] = $pass;
		
		
		$data['dir'] = $directory;		
		
		if(!empty($quota_limit)){
			$data['quota'] = 'limited';
			$data['quota_limit'] = $quota_limit;
		}else{
			$data['quota'] = 'unlimited';			
		}
		
		$data['create_acc'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Edit FTP user
	 *
	 * @category	 FTP
	 * @param        string $user FTP user to EDIT data
	 * @param        string $quota_limit (Optional) Specify quota limit to the user
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function edit_ftpuser($user, $quota_limit = ''){
		$act = 'act=ftp';
		
		$data['edit_ftp_user'] = $user;
		
		if(!empty($quota_limit)){
			$data['quota'] = 'limited';
			$data['quota_limit'] = $quota_limit;
		}else{
			$data['quota'] = 'unlimited';			
		}		
		$data['edit_record'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Change FTP User's Password
	 *
	 * @category	 FTP
	 * @param        string $user FTP user to change Password
	 * @param        string $pass New password for the FTP user
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function change_ftpuser_pass($user, $pass){
		$act = 'act=editftp';
		
		$data['edit_ftp_user_pass'] = $user;

		$data['newpass'] = $data['conf'] = $pass;
		
		
		$data['changepass'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete FTP user
	 *
	 * @category	 FTP
	 * @param        string $user FTP user to delete
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function delete_ftpuser($user){
		$act = 'act=ftp';
		
		$data['delete_ftp_user'] = $user;

		$data['delete_fuser_id'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	///////////////////////////////////////////////////////////////////////////////
	//							CATEGORY : DATABASE								 //
	///////////////////////////////////////////////////////////////////////////////
		
	/**
	 * List Database with its size and users
	 *
	 * @category	 Database
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function list_database(){
		$act = 'act=dbmanage';
		$resp = trim($this->curl_call($act));				
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Add Database
	 *
	 * @category	 database
	 * @param        string $db_name Database name to create
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function add_database($db_name){
		$act = 'act=dbmanage';
		
		$data['db'] = $db_name;
		
		$data['submitdb'] = 1;
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return trim($resp);
	}
	
	/**
	 * Delete Database
	 *
	 * @category	 database
	 * @param        string $db_name Database name to delete
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function delete_database($db_name){
		$act = 'act=dbmanage';		
		
		$data['delete_db'] = $data['db'] = $db_name;
		
		
		$resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List Database Users
	 *
	 * @category	 Database
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function list_db_user(){
		$act = 'act=dbmanage';
		$resp = trim($this->curl_call($act));		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Add Database User
	 *
	 * @category	 database
	 * @param        string $db_user Database username to ADD
	 * @param        string $pass Password for the database user
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function add_db_user($db_user, $pass){
		$act = 'act=dbmanage';
		
		$data['dbuser'] = $db_user;

		$data['dbpassword'] = $pass;
		
		$data['submituserdb'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return trim($resp);
	}
	
	/**
	 * Delete Database user
	 *
	 * @category	 database
	 * @param        string $db_user Database user to delete
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function delete_db_user($db_user){
		$act = 'act=dbmanage';
		
		$data['delete_dbuser'] = $db_user;
		
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return trim($resp);
	}
	
	/**
	 * Set Privileges for a User to a specific database
	 *
	 * @category	 database
	 * @param        string $database Database name to ADD privileges
	 * @param        string $db_user Database users name to ADD privileges
	 * @param        string $host Database host
	 * @param        string $prilist Set of privileges to be given to the User
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function set_privileges($database, $db_user, $host, $prilist){
		$act = 'act=dbmanage';
		
		$data['dbname'] = $database;
		$data['dbuser'] = $db_user;
		$data['host'] = $host;
		$data['prilist'] = $prilist;
		
		$data['submitpri'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return trim($resp);
	}
	
	/**
	 * Install RockMongo
	 *
	 * @category	 database
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function install_rockmongo(){
		$act = 'act=mongodb';
		$data['install_mongdb'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	//////////////////////////////////////////////////////////////////////////////
	//					   CATEGORY : Advance Settings							//
	//////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Edit settings
	 *
	 * @category	 Advance settings
	 * @param        string $email Specify email address to SET
	 * @param        int $ins_email (Optional) Set 1 to receive installation emails, otherwise 0
	 * @param        int $rem_email (Optional) Set 1 to receive installations removal email,
	 				 otherwise 0
	 * @param        int $edit_email (Optional) Set 1 to receive installations editting email,
	 				 otherwise 0
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function edit_settings($email, $ins_email = '', $rem_email = '', $edit_email = '' ){
		$act = 'act=email';
		
		$data['email'] = $email;
		
		$data['ins_email'] =  empty($ins_email);
		
		$data['rem_email'] = empty($rem_email);
		
		$data['editdetail_email'] = empty($edit_email);

		$data['editemailsettings'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Restart services
	 *
	 * @category	 Advanced Settings
	 * @param        string $service_name Specify the service to restart
	 				 E.g exim, dovecot, tomcat, httpd, named, pure-ftpd, mysqld
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function restart_service($service_name){
		$act = 'act=services';
		
		$data['restart_service'] = $service_name;

		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Start/Stop FTP
	 *
	 * @category	 Advanced Settings
	 * @param        string $action Specify start/stop to START/STOP FTP service respectively
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function start_stop_ftp($action){
		$act = 'act=services';
		if($action != 'stop'){
			$data['status'] = 'stop';
		}else{
			$data['status'] = 'running';
		}
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Enable/Disable suPHP
	 *
	 * @category	 Security
	 * @param        string $action Specify on/off to START/STOP suPHP respectively
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function manage_suphp($action){
		$act = 'act=apache_settings';
		
		if($action != 'off'){
			$data['suphpon'] = 1;
		}else{
			$data['suphpon'] = NULL;
		}
		
		$data['editapachesettings'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Install AWStats
	 *
	 * @category	 Advanced Settings
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function install_awstats(){
		$act = 'act=awstats';
		$data['install_awstats'] = 1;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	//////////////////////////////////////////////////////////////////////////////
	//					   CATEGORY : Server Settings							//
	//////////////////////////////////////////////////////////////////////////////		
	
	/**
	 * List DNS Record
	 *
	 * @category	 Server Settings
	 * @param        string $domain Specify domain to list DNS records
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function list_dns_record($domain){
		$act = 'act=advancedns';
		
		$data['domain'] = $domain;

		$resp =$this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Add DNS Record
	 *
	 * @category	 Server Settings
	 * @param        string $domain Specify domain to ADD DNS record
	 * @param        string $name Specify record name
	 * @param        string $ttl Specify TTL
	 * @param        string $type Specify TYPE of record
	 * @param        string $address Specify destination address
	 * @return		 string $resp Response of Action. Default: Serialize
	 */
	function add_dns_record($domain, $name, $ttl, $type, $address){
		$act = 'act=advancedns';
		
				
		$data['selectdomain'] = $domain;
		
		$data['name'] = $name;
		
		$data['ttl'] =  $ttl;
		
		$data['selecttype'] = $type;
		
		$data['address'] = $address;

		$data['create_record'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Edit DNS Record
	 *
	 * @category	 Server Settings
	 * @param        string $id Specify ID of record to EDIT
	 * @param        string $domain Specify domain to ADD DNS record
	 * @param        string $name Specify record name
	 * @param        string $ttl Specify TTL
	 * @param        string $type Specify TYPE of record
	 * @param        string $address Specify destination address
	 * @return		 string $resp Response of Action. Default: Serialize
	 * @return       array
	 */
	function edit_dns_record($id, $domain, $name, $ttl, $type, $address){
		$act = 'act=advancedns';
		
	$data['edit_record'] = $id;
	
	$data['domain_name'] =  $domain;
	
	$data['name'] = $name;
	
	$data['ttl'] = $ttl;
	
	$data['type'] = $type;
	
	$data['record'] = $address;

		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete DNS Record
	 *
	 * @category	 Server Settings
	 * @param        string $id ID of Dns record for delete
	 * @param        string $domain Domain for the DNS record for delete
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_dns_record($id, $domain){
		$act = 'act=advancedns';
		
		// Specify record to be DELETED
		$data['delete_record'] = $id;
		
		// Specify the DOMAIN
		$data['domain_name'] = $domain;

		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List CRON
	 *
	 * @category	 Server Settings
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function list_cron(){
		$act = 'act=cronjob';
		$resp = $this->curl_call($act);		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Add a CRON
	 *
	 * @category	 Server Settings
     * @param        string $minute Minute of the cron part
     * @param        string $hour Hour of the cron part
     * @param        string $day Day of the cron part
	 * @param        string $month Month of the cron part
	 * @param        string $weekday Weekend of the cron part
	 * @param        string $cmd Command of the cron part
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function add_cron($minute, $hour, $day, $month, $weekday, $cmd){
		$act = 'act=cronjob';	
				
		// Specify minutes
		$data['minute'] = $minute;
		
		// Specify hour
		$data['hour'] = $hour;
		
		// Specify day
		$data['day'] = $day;
		
		// Specify month
		$data['month'] = $month;
		
		// Specify weekday
		$data['weekday'] = $weekday;
		
		// Specify command
		$data['cmd'] = $cmd;

		$data['create_record'] = 1;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Edit CRON
	 *
	 * @category	 Server Settings
	 * @param        string $id ID of the cron record. Get from the list of cron
     * @param        string $minute Minute of the cron part
     * @param        string $hour Hour of the cron part
     * @param        string $day Day of the cron part
	 * @param        string $month Month of the cron part
	 * @param        string $weekday Weekend of the cron part
	 * @param        string $cmd Command of the cron part
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function edit_cron($id, $minute, $hour, $day, $month, $weekday, $cmd){
		$act = 'act=cronjob';	
				
		// Specify minutes
		$data['minute'] = $minute;
		
		// Specify hour
		$data['hour'] = $hour;
		
		// Specify day
		$data['day'] = $day;
		
		// Specify month
		$data['month'] = $month;
		
		// Specify weekday
		$data['weekday'] = $weekday;
		
		// Specify command
		$data['cmd'] = $cmd;
		
		$data['edit_record'] = 'c'. $id;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return trim($resp);
	}
	
	/**
	 * Delete CRON
	 *
	 * @category	 Server Settings
	 * @param        string $id ID of the cron record. Get from the list of cron
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_cron($id){
		$act = 'act=cronjob';
		$data['delete_record'] = 'c'. $id;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return trim($resp);
	}
	
	/**
	 * Install Apache Tomcat
	 *
	 * @category	 Server Settings
	 * @param        string $pass Password for the tomcat manager
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function install_tomcat($pass){
		$act = 'act=apache_tomcat';
		
		// Specify PASSWORD for Apache Tomcat
		$data['manager_pass'] = $pass;
		
		$data['install_apache_tomcat'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	//////////////////////////////////////////////////////////////////////////
	//					   		CATEGORY : Security							//
	//////////////////////////////////////////////////////////////////////////
	
	/**
	 * List SSL Key
	 *
	 * @category	 Security
	  * @return		string $resp Response of Actions. Default: Serialize
	 */
	function list_ssl_key(){
		$act = 'act=sslkey';
		$resp = $this->curl_call($act);				
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Create SSL Key
	 *
	 * @category	 Security
	 * @param        string $domain Domain name for the SSL Key
	 * @param        string $keysize Size of the SSl Key
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function create_ssl_key($domain, $keysize = ''){
		$act = 'act=sslkey';
		// Specify DOMAIN
		$data['selectdomain'] = $domain;
		// Specify Key size
		$data['keysize'] = (empty($keysize) ? '1024' : $keysize);
		$data['create_key'] = 1;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Upload SSL Key
	 *
	 * @category	 Security
	 * @param        string $domain Domain name for the SSL Key
	 * @param        string $keypaste Entire SSL Key
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function upload_ssl_key($domain, $keypaste){
		$act = 'act=sslkey';
		// Specify DOMAIN
		$data['selectdomain'] = $domain;
		// Specify KEY contents
		$data['kpaste'] = $keypaste;
		$data['install_key'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Detail SSL Key
	 *
	 * @category	 Security
	 * @param        string $domain Specify domain name to detail view of SSL Key
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function detail_ssl_key($domain){
		$act = 'act=sslkey';
		// Specify DOMAIN
		$data['detail_record'] = $domain;
	    $resp = $this->curl_call($act, $data);
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete SSL Key
	 *
	 * @category	 Security
	 * @param        string $domain Specify domain name to delete SSL Key
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_ssl_key($domain){
		$act = 'act=sslkey';
		// Specify DOMAIN
		$data['delete_record'] = $domain;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List SSL CSR
	 *
	 * @category	 Security	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function list_ssl_csr(){
		$act = 'act=sslcsr';
		$resp = $this->curl_call($act);		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Create SSL CSR
	 *
	 * @category	 Security
	 * @param        string $domain Domain name for the CSR
	 * @param        string $country_code Two latter Country Code
	 * @param        string $state Name of the State
	 * @param        string $locality Name of the Location
	 * @param        string $org Name of the Organitaion
	 * @param        string $org_unit Name of the Organitaion unit
	 * @param        string $passphrase Password prase
	 * @param        string $email Email address	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function create_ssl_csr($domain, $country_code, $state, $locality, $org, $org_unit,  $passphrase, $email){
		$act = 'act=sslcsr';
		// Specify DOMAIN
		$data['selectdomain'] = $domain; // Note : Domain should have a KEY		
		// Specify country code
		$data['country'] = $country_code;		
		// Specify state
		$data['state'] = $state;		
		// Specify locality
		$data['locality'] = $locality;		
		// Specify organization
		$data['organisation'] = $org;		
		// Specify organization unit
		$data['orgunit'] = $org_unit;		
		// Specify PASSPHRASE
		$data['pass'] = $passphrase;		
		// Specify email
		$data['email'] = $email;
		$data['createcsr'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Detail SSL CSR
	 *
	 * @category	 Security
	 * @param        string $domain Specify domain name to detail view of SSL CSR
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function detail_ssl_csr($domain){
		$act = 'act=sslcsr';
		// Specify DOMAIN
		$data['detail_record'] = $domain;
	    $resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete SSL CSR
	 *
	 * @category	 Security
	 * @param        string $domain Specify domain name to delete SSL CSR
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_ssl_csr($domain){
		$act = 'act=sslcsr';
		// Specify DOMAIN
		$data['delete_record'] = $domain;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List SSL Certificate
	 *
	 * @category	 Security
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function list_ssl_crt(){
		$act = 'act=sslcrt';
		$resp = $this->curl_call($act);				
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Create SSL Certificate
	 *
	 * @category	 Security
	 * @param        string $domain Domain for the Certificate
	 * @param        string $country_code Two latter Country Code
	 * @param        string $state Name of the State
	 * @param        string $locality Name of the Location
	 * @param        string $org Name of the Organitaion
	 * @param        string $org_unit Name of the Organitaion unit
	 * @param        string $email Email address	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function create_ssl_crt($domain, $country_code, $state, $locality, $org, $org_unit, $email){
		$act = 'act=sslcrt';
		// Specify DOMAIN
		$data['selectkey'] = $domain; // Note : Domain should have a KEY		
		// Specify country code
		$data['country'] = $country_code;		
		// Specify state
		$data['state'] = $state;		
		// Specify locality
		$data['locality'] = $locality;		
		// Specify organization
		$data['organisation'] = $org;		
		// Specify organization unit
		$data['orgunit'] = $org_unit;		
		// Specify email
		$data['email'] = $email;
		$data['create_crt'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Upload SSL Certificate
	 *
	 * @category	 Security
	 * @param        string $domain Domain name for the Certificate
	 * @param        string $keypaste Entire certificate.
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function upload_ssl_crt($domain, $keypaste){
		$act = 'act=sslcrt';
		// Specify DOMAIN
		$data['selectdomain'] = $domain; // Note : Domain should have a KEY
		// Specify KEY contents
		$data['kpaste'] = $keypaste;
		$data['install_crt'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Detail SSL Certificate
	 *
	 * @category	 Security
	 * @param        string $domain Specify domain name to detail view of SSL Certificat
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function detail_ssl_crt($domain){
		$act = 'act=sslcrt';
		// Specify DOMAIN
		$data['detail_record'] = $domain;
	    $resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Delete SSL Certificate
	 *
	 * @category	 Security
	 * @param        string $domain Specify domain name to delete SSL Certificat
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_ssl_crt($domain){
		$act = 'act=sslcrt';
		// Specify DOMAIN
		$data['delete_record'] = $domain;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List Blocked IP.
	 * @return		string $resp Response of Actions. Default: Serialize
	 */
	function list_ipblock(){
		$act = 'act=ipblock';
		$resp = $this->curl_call($act);		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Block IP
	 *
	 * @category	 Security
	 * @param        string $ip IP Address for block
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function add_ipblock($ip){
		$act = 'act=ipblock';
		// Specify IP to block
		$data['dip'] = $ip;
		$data['add_ip'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete Blocked IP
	 *
	 * @category	 Security
	 * @param        string $ip IP Address for unblock
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_ipblock($ip){
		$act = 'act=ipblock';
		// Specify IP to unblock
		$data['delete_ip'] = $ip;
		$data['delete_record'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Enable/Disable SSH Access
	 *
	 * @category	 Security
	 * @param        string $action Action should be on or off
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function ssh_access($action){
		$act = 'act=ssh_access';
		
		// Specify on/off to enable/disable SSH access respectively.
		if($action == 'off'){
			$data['sshon'] = NULL;
		}else{
			$data['sshon'] = 1;
		}
		
		$data['editsshsettings'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	//////////////////////////////////////////////////////////////////////////////
	//					   		CATEGORY : Email Server							//
	//////////////////////////////////////////////////////////////////////////////	
		
	/**
	 * List Email Users
	 *
	 * @category	 Email
	 * @param        string $domain Specify domain name for the Email User Account list
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function list_emailuser($domain){
		$act = 'act=email_account';
		// Specify domain
		$data['domain'] = $domain;
		$resp = trim($this->curl_call($act, $data));		
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Add Email User
	 *
	 * @category	 Email
	 * @param        string $domain Domain for the Email User Account to add
	 * @param        string $emailuser Email user name for add
	 * @param        string $password Password for user	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function add_emailuser($domain, $emailuser, $password){
		$act = 'act=email_account';
		// Specify DOMAIN
		$data['selectdomain'] = $domain;
		// Specify email user to create
		$data['login'] = $emailuser;
		// Specfy PASSWORD
		$data['newpass'] = $data['conf'] = $password;
		$data['create_acc'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Change Email Users' Password
	 *
	 * @category	 Email
	 * @param        string $domain Domain for the Email User Account for change passsword
	 * @param        string $emailuser Email user name for change passsword
	 * @param        string $password New password for user 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function change_email_user_pass($domain, $emailuser, $password){
		$act = 'act=email_account';
		// Specify DOMAIN
		$data['domain_name'] = $domain;
		// Specify record to be EDITTED
		$data['edit_record'] = $emailuser;
		// Specify PASSWORD
		$data['cpass'] = $password;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete Email Users
	 *
	 * @category	 Email
	 * @param        string $domain Domain for the Email User Account for delete
	 * @param        string $emailuser Email user name for delete
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_email_user($domain, $emailuser){
		$act = 'act=email_account';
		// Specify DOMAIN
		$data['domain_name'] = $domain;
		// Specify record to be DELETED
		$data['delete_record'] = $emailuser;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List Email Forwarder
	 *
	 * @category	 Email
	 * @param        string $domain Domain for the Email Forwarder list	
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function list_emailforward($domain){
		$act = 'act=email_forward';
		// Specify DOMAIN
		$data['domain'] = $domain;
		$resp = trim($this->curl_call($act, $data));				
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Add Email Forwarder
	 *
	 * @category	 Email
	 * @param        string $domain Domain for the Email Forwarder add
	 * @param        string $forward_address Forwarder name to add
	 * @param        string $forward_to To whome it is forwarded
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function add_emailforward($domain, $forward_address, $forward_to){
		$act = 'act=email_forward';
		// Specify DOMAIN
		$data['selectdomain'] = $domain;
		// Specify senders email address
		$data['addemail'] = $forward_address;
		// Specify email address to be forwarded to
		$data['sendemail'] = $forward_to;
		$data['create_acc'] = 1;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete Email Forwarder
	 *
	 * @category	 Email
	 * @param        string $domain Domain for the Email Forwarder delete
	 * @param        string $forward_address Forwarder name 
	 * @param        string $forward_to To whome it is forwarded
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_email_forward($domain, $forward_address, $forward_to){
		$act = 'act=email_forward';
		// Specify DOMAIN
		$data['domain_name'] = $domain;
		// Specify record to be DELETED
		$data['forward_name'] = $forward_address;		
		// Specify record to be DELETED
		$data['to_name'] = $forward_to;
		$data['delete_record'] = 1;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * List MX record
	 *
	 * @category	 Email Server
	 * @param        string $domain Domain for the MX Record list
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function list_mx_entry($domain){
		$act = 'act=mxentry';
		// Specify DOMAIN
		$data['domain'] = $domain;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Add MX record
	 *
	 * @category	 Email Server
	 * @param        string $domain Domain for the MX Record add
	 * @param        string $priority Priority for the MX Record Entry
	 * @param        string $destination Destination address	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function add_mx_entry($domain, $priority, $destination){
		$act = 'act=mxentry';
		// Specify the DOMAIN
		$data['selectdomain'] = $domain;
		// Specify the PRIORITY
		$data['priority'] = $priority;
		// Specify the Destination
		$data['destination'] = $destination;
		$data['create_record'] = 1;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Edit MX record
	 *
	 * @category	 Email Server
	 * @param        string $domain Domain for the MX Record edit
	 * @param        string $record Record no of the Entry	 
	 * @param        string $priority Priority for the MX Record Entry
	 * @param        string $destination Destination address	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function edit_mx_entry($domain, $record, $priority, $destination){
		$act = 'act=mxentry';
		// Specify the DOMAIN
		$data['domain_name'] = $domain;
		// Specify the record to be EDITTED
		$data['edit_record'] = $record;
		// Specify the PRIORITY
		$data['editpriority'] = $priority;
		// Specify DESTINATION
		$data['editdestination'] = $destination;
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
	}
	
	/**
	 * Delete MX record
	 *
	 * @category	 Email Server
	 * @param        string $domain Domain for the MX Record delete
	 * @param        string $record Record no of the Entry	 
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function delete_mx_entry($domain, $record){
		$act = 'act=mxentry';
		$data['domain_name'] = $domain;
		$data['delete_record'] = $record;
		$resp = $this->curl_call($act, $data);		
		$this->chk_error();
		return $resp;
	}
	
	//////////////////////////////////////////////////////////////////////////
	//					   CATEGORY : Server Info							//
	//////////////////////////////////////////////////////////////////////////
	
	/**
	 * Show Error Log
	 *
	 * @category	 Server Info
	 * @param        string $domain Domain for the error log (Opional)
	 * @return		 string $resp Response of Actions. Default: Serialize
	 */
	function show_error_log($domain = ''){
		$act = 'act=errorlog';
		if(empty($domain)){
			$data['domain_log'] = 'error_log';
		}else{
			$data['domain_log'] = $domain .'.err';
		}
		$resp = $this->curl_call($act, $data);				
		$this->chk_error();
		return $resp;
		
	}
	
	/**
	 * Prints result
	 *
	 * @category	 Debug
	 * @param        Array $data
	 * @return       array
	 */
	function r_print($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	
}

//////////////////////////////////////////////////////////////////////
//							EXAMPLES								//
//////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
//							CATEGORY : FEATURES								 //
///////////////////////////////////////////////////////////////////////////////


////////////////////////////
//		List Domain       //
////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the list of domains
$res = unserialize($test->list_domains());

// Done/Error
if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing domain<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////
//		Add Domain       //
///////////////////////////
/*$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);
$res = $test->add_domain($doamin, $domainpath);
$res = unserialize($res);

$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Domain added';
}else{
	echo 'Error while adding domain<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////
//		Delete Domain       //
//////////////////////////////
/*$test = new Webuzo_API($webuzo_user', $webuzo_password, $host );

$res = $test->delete_domain($domain);
$res = unserialize($res);
$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Domain Deleted';
}else{
	echo 'Error while deleting Domain<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		Change Password       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->change_password($webuzo_password);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Password changed';
}else{
	echo 'Error while changing Password<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////////////
//		Change File Manager's        //
//			 Password				 //
///////////////////////////////////////
/*$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->change_fileman_pwd($pass);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Password changed for File Manager';
}else{
	echo 'Error while changing password for File Manager<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////////////////////
//		Change Apache Tomcat Manager's        //
//			 		Password				  //
////////////////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);
$res = $test->change_tomcat_pwd($pass);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Password changed for Apache Tomcat Manager';
}else{
	echo 'Error while changing Password for Apache Tomcat Manager<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////
//		List FTP User       //
//////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the list of FTP users
$res = unserialize($test->list_ftpuser());
//$test->r_print($res);

// Done/Error
if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing FTP User<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////
//		Add FTP User       //
/////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_ftpuser($user, $pass, $directory, $quota_limit);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'FTP user added';
}else{
	echo 'Error while adding FTP user<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////
//		Edit FTP User       //
//////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the list of FTP users
// $res = $test->list_ftpuser();
$res = $test->edit_ftpuser($user, $quota_limit);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'FTP user\' quota edited';
}else{
	echo 'Error while editing FTP user\'s quota<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////////
//		Change FTP Users'        //
//			 Password			 //
///////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the list of FTP users
// $res = $test->list_ftpuser();
$res = $test->change_ftpuser_pass($ftpuser, $pass);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'FTP user\'s password changed';
}else{
	echo 'Error while changing FTP user\'s password<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		Delete FTP User       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the list of FTP users
// $res = $test->list_ftpuser();

$res = $test->delete_ftpuser($ftp_user);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'FTP user Deleted';
}else{
	echo 'Error while deleting FTP user<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////////////////////////////////////////////////////
//							CATEGORY : MYSQL								 //
///////////////////////////////////////////////////////////////////////////////
	
//////////////////////////////
//		List Database       //
//////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of Databases
$res = unserialize($test->list_database());

// Done/Error
if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing Databases<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////
//		Add Database       //
/////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_database($db_name);
$res = unserialize($res);
$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Database created';
}else{
	echo 'Error while creating database<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		Delete Database       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of Databases
// $res = $test->list_database();

$res = trim($test->delete_database($db_name));
$res = unserialize($res);
$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Database Deleted';
}else{
	echo 'Error while deleting Database<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////////
//		 List Database Users       //
/////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of Database Users
$res = $test->list_db_user();
//$test->r_print($res);
$res = unserialize($res);

// Done/Error
if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing Database User<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////////
//		 Add Database Users       //
////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Specify Database username
// Note : Database username cannot exceed more than 16 characters inclusive of Webuzo username
// E.g soft_abcdefghijh is allowed

$res = $test->add_db_user($db_user, $pass);
$res = unserialize($res);
//$res = unserialize(trim($res));
$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Database user created';
}else{
	echo 'Error while creating database user<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////////////
//		 Delete Database Users       //
///////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of Database Users
// $res = $test->list_db_user();

// Specify Database user to DELETE in the following format:
// FORMAT : webuzo-username_databaseuser
// E.g : soft_test

$res = $test->delete_db_user($db_user);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Database user Deleted';
}else{
	echo 'Error while deleting Database user<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////////////
//		 Set Database Privileges       //
/////////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Specify Database name in the following format:
// FORMAT : webuzo-username_databasename
// E.g : soft_test
// Specify Database user in the following format:
// FORMAT : webuzo-username_databaseuser
// E.g : soft_test


// Specify the Databas HOST
// Set $data['host'] = 'localhost'; for localhost
// Set $data['host'] = 'any host'; for Remote Host
// Set $data['host'] = 'example.com'; for your HOST(example.com)
// Set the privileges. Leave blank to restrict privileges
// 'SELECT,CREATE,INSERT,UPDATE,ALTER,DELETE,INDEX,CREATE_TEMPORARY_TABLES,EXECUTE,DROP,LOCK_TABLES,REFERENCES,CREATE_ROUTINE,CREATE_VIEW,SHOW_VIEW' 


$res = $test->set_privileges($database, $db_user, $host, $prilist);
$res = unserialize($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Privileges set successfully';
}else{
	echo 'Error while setting privileges<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////
//		Install RockMongo       //
//////////////////////////////////

/*$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Install RockMongo
$res = $test->install_rockmongo();
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'RockMongo installed successfully';
}else{
	echo 'Error while installing RockMongo<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////////////////////////////////////////
//					   CATEGORY : Advance Settings							//
//////////////////////////////////////////////////////////////////////////////


///////////////////////////////
//		Email Settings       //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->edit_settings($email, $ins_email, $rem_email, $edit_email);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Email settings editted successfully';
}else{
	echo 'Error while editing Email settings<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////
//		Restart services       //
/////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Specify the services to be restarted
$res = $test->restart_service($service_name);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Service '.$data['restart_service'].' restarted successfully';
}else{
	echo 'Error while restarting '.$data['restart_service'].' service<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		Start/ Stop FTP       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Specify FTP start/stop
$res = $test->start_stop_ftp($status);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Settings saved successfully';
}else{
	echo 'Error while saving settings<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////////
//		Enable/Disable suPHP       //
/////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Set on and off to enable and disable suPHP respectively
$res = $test->manage_suphp($status);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Settings saved successfully';
}else{
	echo 'Error while saving settings<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		Install AWStats       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Install AWStats
$res = $test->install_awstats();
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'AWStats installed successfully';
}else{
	echo 'Error while installing AWStats<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////////////////////////////////////////
//					   CATEGORY : Server Settings							//
//////////////////////////////////////////////////////////////////////////////
	
///////////////////////////////
//		List DNS Record      //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->list_dns_record($domain);
$res = unserialize($res);
if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing DNS Record<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////
//		Add DNS Record      //
//////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_dns_record($domain, $name, $ttl, $type, $address);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'DNS record added successfully';
}else{
	echo 'Error while adding DNS record<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		Edit DNS Record       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the $data['edit_record'] from LIST of DNS Records
//$res = $test->list_dns_record($domain.com);

$res = $test->edit_dns_record($id, $domain, $name, $ttl, $type, $address);
$res = unserialize($res);
$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'DNS Record record editted successfully';
}else{
	echo 'Error while editing DNS Record<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////
//		Delete DNS Record      //
/////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the $data['delete_record'] from LIST of DNS Records
// $res = $test->list_dns_record($data);

$res = $test->delete_dns_record($id, $domain);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'DNS Record deleted';
}else{
	echo 'Error while deleting DNS Record<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////
//		List CRON       //
//////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of CRONs Set
$res = $test->list_cron();
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing cron<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////
//		Add CRON      //
////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_cron($minute, $hour, $day, $month, $weekday, $cmd);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'CRON added successfully';
}else{
	echo 'Error while adding CRON<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////
//		Edit CRON       //
//////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get $data['edit_record'] from the LIST of CRON
// $res = $test->list_cron();

$res = $test->edit_cron($id, $minute, $hour, $day, $month, $weekday, $cmd);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'CRON editted successfully';
}else{
	echo 'Error while editing CRON<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////
//		Delete CRON       //
////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get $data['delete_record'] from the LIST of CRON
// $res = $test->list_cron();

$res = $test->delete_cron($id);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'CRON Deleted';
}else{
	echo 'Error while deleting CRON<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////////
//		Install Apache Tomcat      //
/////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->install_tomcat($pass);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Apache Tomcat installed successfully';
}else{
	echo 'Error while installing Apache Tomcat<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////////////////////////////////////
//					   		CATEGORY : Security							//
//////////////////////////////////////////////////////////////////////////

//////////////////////////////
//		 List SSL Key       //
//////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of SSL keys available
$res = $test->list_ssl_key();
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing SSL key<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		 Create SSL Key       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->create_ssl_key($domain, $keysize);

// $keysize
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL key created';
}else{
	echo 'Error while creating ssl key<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		 Upload SSL Key       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->upload_ssl_key($domain, $keypaste);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL key uploaded';
}else{
	echo 'Error while uploading SSL key<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		 Detail SSL Key       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->detail_ssl_key($domain);
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while showing details for SSL key<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		 Delete SSL Key       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->delete_ssl_key($domain);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL key deleted';
}else{
	echo 'Error while deleting SSL key<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////
//		 List SSL CSR        //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of SSL CSR
$res = $test->list_ssl_csr();
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing SSL CSR<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////
//		 Create SSL CSR        //
/////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->create_ssl_csr($domain, $country_code, $state, $locality, $org, $org_unit, $passphrase, $email);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL CSR created';
}else{
	echo 'Error while creating SSL CSR<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////
//		 Detail SSL CSR        //
/////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->detail_ssl_csr($domain);
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while showing details for SSL CSR<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////
//		 Delete SSL CSR        //
/////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->delete_ssl_csr($domain);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL CSR deleted';
}else{
	echo 'Error while deleting SSL CSR<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////
//		List SSL Certificate		//
//////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of SSL Certificates
$res = $test->list_ssl_crt();
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing SSL Certificate<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////
//		 Create SSL Certificate			//
//////////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->create_ssl_crt($domain, $country_code, $state, $locality, $org, $org_unit, $email);

$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL Certificate created';
}else{
	echo 'Error while creating SSL Certificate<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////
//	    Upload SSL Certificate		//
//////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->upload_ssl_crt($domain, $keypaste);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL certificate uploaded';
}else{
	echo 'Error while uploading SSL certificate<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////
//		 Detail SSL Certificate			//
//////////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->detail_ssl_crt($domain);
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while showing details for SSL Certificate<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////////////
//		 Delete SSL Certificate        //
/////////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->delete_ssl_crt($domain);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'SSL Certificate deleted';
}else{
	echo 'Error while deleting SSL Certificate<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////
//		List Blocked IP       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of Blocked IPs
$res = $test->list_ipblock();
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing Blocked IPs<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////
//		Block IP       //
/////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_ipblock($ip);
$res = unserialize($res);

// Done/Error
if(!empty($res['done'])){
	echo 'IP Blocked';
}else{
	echo 'Error while Blocking IP<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////
//		Unblock IP       //
///////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->delete_ipblock($ip);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'IP Unblocked successfully';
}else{
	echo 'Error while Unblocking IP<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////////
//		Enable/Disable SSH       //
///////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->ssh_access($action);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Settings saved successfully';
}else{
	echo 'Error while saving settings<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////////////////////////////////////////
//					   		CATEGORY : Email Server							//
//////////////////////////////////////////////////////////////////////////////
	
////////////////////////////////
//		List Email User       //
////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of email users
$res = $test->list_emailuser($domain);
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing Email User<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////
//		Add Email User       //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_emailuser($domain, $emailuser, $password);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Email user added';
}else{
	echo 'Error while adding Email user<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////////////
//		Change Email Users'        //
//			 Password			   //
/////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the $data['edit_record'] from LIST of Email users
// $res = $test->list_emailuser($domain);
$res = $test->change_email_user_pass($domain, $emailuser, $password);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Email user\'s password changed';
}else{
	echo 'Error while changing Email user\'s password<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////
//		Delete Email User       //
//////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the $data['delete_record'] from LIST of Email users
//$res = $test->list_emailuser($domain);

$res = $test->delete_email_user($domain, $emailuser);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Email user Deleted';
}else{
	echo 'Error while deleting Email user<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////
//		List Email Forwarders       //
//////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of Email Forwarders
$res = $test->list_emailforward($domain);
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing Email Forwarders<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


////////////////////////////////////
//		Add Email Forwarder       //
////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_emailforward($domain, $forward_address, $forward_to);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Email Forwarder added';
}else{
	echo 'Error while adding Email Forwarder<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////////////
//		Delete Email Forwarder       //
///////////////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the $data['forward_name'] from LIST of Email Forwarders
// $res = $test->list_emailforward($domain);
$res = $test->delete_email_forward($domain, $forward_address, $forward_to);
$res = unserialize($res);
$test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'Email Forwarder Deleted';
}else{
	echo 'Error while deleting Email Forwarder<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////
//		List MX Record       //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get the LIST of MXRecords
$res = $test->list_mx_entry($domain);
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while listing MX Records<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////
//		Add MX Record       //
//////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->add_mx_entry($domain, $priority, $destination);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'MX record added successfully';
}else{
	echo 'Error while adding MX record<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


/////////////////////////////
//		Edit MX Entry      //
/////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get $data['edit_record'] from the LIST of MX Records
// $res = $test->list_mx_entry();

$res = $test->edit_mx_entry($domain, $record, $priority, $destination);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'MX Entry record editted successfully';
}else{
	echo 'Error while editing MX Entry<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


///////////////////////////////
//		Delete MX Entry      //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

// Get $data['delete_record'] from the LIST of MX Records
// $res = $test->list_mx_entry();

$res = $test->delete_mx_entry($domain, $record);
$res = unserialize($res);
// $test->r_print($res);

// Done/Error
if(!empty($res['done'])){
	echo 'MX Record deleted';
}else{
	echo 'Error while deleting MX Record<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


//////////////////////////////////////////////////////////////////////////
//					   CATEGORY : Server Info							//
//////////////////////////////////////////////////////////////////////////

///////////////////////////////
//		Show Error Log       //
///////////////////////////////
/*
$test = new Webuzo_API($webuzo_user', $webuzo_password, $host);

$res = $test->show_error_log();
$res = unserialize($res);

if(empty($res['error'])){
	$test->r_print($res);
}else{
	echo 'Error while showing Error Log<br/>';
	if(!empty($res['error'])){
		print_r($res['error']);
	}
}
*/


// **************************************************************************************
// 											END OF FILE
// **************************************************************************************



?>