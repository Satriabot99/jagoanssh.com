<?php
if(isset($_SESSION['user'])){
	include("dashboard.php");
}else{
	include("login_page.php");
}