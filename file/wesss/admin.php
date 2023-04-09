<?php
session_start();

if (!isset($_SESSION["admin"])) {
	header("Location: index.php");
	exit;
}
require "db.php";
$query = mysqli_query($connect,"SELECT * FROM user ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tembak Xl</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style type="text/css">
.table{
    max-width:350px;
}
</style>
</head>
<body>
<div class="container">
        <h1>Hy Admin</h1>
        <a class="nav-item tombol btn btn-success" href="logout.php">Logout</a>
        <h3>User Terdaftar</h3>

        <form action="" method="post">
            <table class="table table-striped table-dark">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php if(mysqli_num_rows($query)>0){ ?>
                <?php
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data["username"];?></td>
                    <td><a class="nav-item tombol btn btn-danger" href="delete.php?id=<?php echo $data["id"];?>">Delete</a>
                    </td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
            </table>
        </form>
</div>

</body>
</html>