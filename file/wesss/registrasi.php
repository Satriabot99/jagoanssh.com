<?php 



require 'db.php';



if(isset($_POST["submit"])){

	if(register($_POST) > 0){

		
        echo "<script>
		alert('Daftar  berhasil');
		window.location.href='member-login.php';
		</script>";



	}else{



		echo mysqli_error($connect);

	}

}

 ?>

<html>

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Registrasi</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

    .container{
        max-width:400px;
        height:auto;
        text-align:center;
    }

    #response{

        text-align: center;

    }



    textarea { resize:none; }

    #count{

        text-align: right;

    }

</style>

</head>

<body>

<div class="container">





	<div class="form-group">

	 <form action="" method="post">

	    <h3>Registrasi</h3>

	 	<div class="" ="form-group">

		 	<label for="username">Username:</label>

		 	<input class="form-control"  type="text" name="username" placeholder="Minimal 4" minlength="4" maxlength="15" id="username" required></input>

	 	</div>

	 		<div class="form-group">

		 	<label for="password">Password:</label>

		 	<input class="form-control" type="password" name="password" placeholder="password" id="password"></input>

	 	</div>

	 	<div class="form-group">

		 	<label for="password2">Konfirmasi Password:</label>

		 	<input class="form-control" type="password" name="password2" placeholder="password" id="password2"></input>

	 	</div>



        <div class="form-group">

		 	<button class="btn btn-outline-dark" type="submit" name="submit" ><i class="fa fa-tasks"></i>Daftar</button>

	 	</div>

	

	 </form>

	  <div class="container">

		 	<label for="password">Sudah Punya Akun??</label>

		 	<a href="member-login.php">Login</a>

	 </div>

</div>

</div>

</body>

</html>

