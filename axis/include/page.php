<?php
$page = isset($_GET['page']) ? $_GET['page'].".php" : "index.php";
$page = file_exists("page/$page") ? "page/$page" : "page/notfound.php";
ob_start();
include($page);
