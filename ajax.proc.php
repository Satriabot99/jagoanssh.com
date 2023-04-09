<?php
session_start();

include('app/settings/config.php');
include('app/function.php');

        if(isset($_GET['do'])){
        	$act=htmlentities($_GET['do']);
        }else{
       		$act="";
        }
        
        $file="app/ajax/$act.php";
        $cek=strlen($act);
        
        if($cek>30 || !file_exists($file) || empty($act)){
        	include ("app/error/notfound.php");
        }else{
        	include ($file);
        }
        ?>