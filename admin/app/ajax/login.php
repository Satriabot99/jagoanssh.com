<?php
if(isset($_POST['username_admin'])) {
$username_admin = $_POST['username_admin'];
$password_admin = $_POST['password_admin'];

$username = "admin"; // VlhObGNtNWhiV1VnUVc1a1lRPT0=
$password = "Otiz123Next3128c22";

if($username_admin==$username) {
if($password_admin==$password) {
$_SESSION['login'] = 1;
$_SESSION['Ym1GdFlTQnNaVzVuYTJGda=='] = "GreySSH";
$_SESSION['Ym1GdFlTQnNaVzVuYTJGdw=='] = "GreySSH";
$_SESSION['WlcxaGFXdz0='] = "support@greyssh.com";
header("Location: index.php");
} else {
header("Location: index.php?wrong=1");
}
} else {
header("Location: index.php?wrong=1");
}
} else {
header("Location: index.php?wrong=1");
}

?>