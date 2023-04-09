<?php
$conf['DEV_MODE'] = 0; 
$resetTime = '00:00:00';

/* App Database Configuration */
$conf['MYSQL_HOST'] = "localhost"; // MySQL Host
$conf['MYSQL_USER'] = "pelicul4_ssh"; // MySQL Username
$conf['MYSQL_PASSWORD'] = "YexMax123FFc"; // MySQL Password
$conf['MYSQL_DB'] = "pelicul4_ssh"; // MySQL Database Name 
/* End Database Configuration*/

/* DB Connection */
$conn = @mysqli_connect ($conf['MYSQL_HOST'], $conf['MYSQL_USER'], $conf['MYSQL_PASSWORD'], $conf['MYSQL_DB']);
if(!$conn){
	die( "Sorry! There's an error when proccessing your request.<br/>Error Code: #DBA1A2");
}

//define('urlSuffix', '/?do=');

$usernamePrefix = 'GreySSH-';
$urlPrefix = $siteUrl.'/?q=';

date_default_timezone_set('America/Lima');
$currentReset = date('D-M-Y').' '.$resetTime;
?>