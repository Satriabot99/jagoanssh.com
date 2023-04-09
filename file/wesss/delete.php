<?php 
require 'db.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
	echo "<script>
		alert('Akun Dihapus');
		window.location.href='admin.php';
		</script>";	
}else{
	echo "<script>
		alert('Gagal Menghapus');
		window.location.href='admin.php';
		</script>";

		
}
