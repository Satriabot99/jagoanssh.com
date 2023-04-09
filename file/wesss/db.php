<?php 

$h = 'localhost';

$u = 'jagoanss_semut';

$p = 'Kampret123#';

$db = 'jagoanss_semut';



$connect = new mysqli($h, $u, $p, $db);

if ($connect->connect_error) {

	echo "gagal";

}



function register($data){

global $connect;



        $username = strtolower(stripcslashes($data['username']));

		$password = mysqli_real_escape_string($connect, $data['password']);

		$password2 = mysqli_real_escape_string($connect, $data['password2']);

		//cek username sudah ada atau belum

		$result = mysqli_query($connect, "SELECT username FROM user

			WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {

			echo "<script>

				 alert('username sudah terdaftar ');

				</script>";

				return false;

		}

		//Konfirmasi password

	   if ($password != $password2 ) {

	 	echo "<script>

				alert('Konfirmasi Password Tidak sama')

			</script>";	

			return false;

	}

	   //enkripsi password

		$password = password_hash($password, PASSWORD_DEFAULT);

//$password = md5(); 		

//var_dump($password);die;

		//tambah ke database

		mysqli_query($connect, "INSERT INTO user VALUES('', '$username','$password')");

		return mysqli_affected_rows($connect);





}

function hapus($id){
	global $connect;
	
	mysqli_query($connect,"DELETE FROM user WHERE id = $id");
	return mysqli_affected_rows($connect);

}



?>