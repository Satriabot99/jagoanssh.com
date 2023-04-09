<?php
if(isset($_POST['id'])) {
$id = $_POST['id'];
mysqli_query($conn, "DELETE FROM `accounts` WHERE `in_server`='$id'");
mysqli_query($conn, "DELETE FROM servers WHERE id='$id'");
echo "<script>window.location.href = '?do=edit-server&is_deleted=1';";
				  }
				  ?>
				  
	