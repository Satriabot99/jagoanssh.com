<?php 
session_start();

if (isset($_SESSION["login"])) {
	header("Location: masuk.php");
	exit;
}

require 'db.php';
if(isset($_POST["submit"])) {
	$username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($connect,  "SELECT * FROM user WHERE username = '$username'");
         #cek username
  	if( mysqli_num_rows($result) === 1) {
    		#cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"]) ){
        
    			#set session
    			$_SESSION["login"]=true;
    			header("Location: masuk.php");
    			exit;

    		}
    	}
    	$error = true;
}

 ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AlatSemut</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    body{
        margin:0px;
        padding:0px;
        background-image: url("img/bg.jpg");
        background-repeat: no-repeat;
        background-size:cover;
        background-position: center;
        background-attachment: fixed;
        color:#fff;
        
    }
    body::after{
        content:'';
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0));
        bottom: 0;
    }
    .container{
        
        max-width:250px;
        max-height:450px;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0.6;
        position: relative;
        z-index: 1;
        border: 2px solid #fff;
        border-radius: 5%
        
    }
    .info{
        text-align:center;
        margin:auto;
    }
    @media (min-width: 992px) {

        .container{
        max-width:300px;
        max-height:420px;
        margin: 90px auto;
        }
    }
    .form-control{
     background: rgba(23, 20, 20, 0.52);
     border: 2px solid #fff
    }
  
   
    #count{
        text-align: right;
         margin-left:50px;
         position: relative;
        
        
    }
    #count:hover{
        background:#000;
    }
    .sip{
        background:#fff;
        color:#000;
        border: 2px solid black;
        padding: 2px;
        margin-right: 5px;
        margin-left:5px;
        font-family: sans-serif; 
        
    }
    .sip:hover{
        background:rgba(0, 0, 0, 0.5);
        color:#fff;
    }
    #container marquee{
        max-width:200px;
        max-height: 30px;
        padding:5px;
        background:#fff;
        color:red;
        border: 2px #000;
        font-size: 13px;
        margin-top: 15px;
        text-align: center;
       
    }
    #container marquee p{
    	margin-top: -6px;
    	padding: 2px
    }
    #container marquee:hover{
        background:#fff;
    }
    label{
        padding:10px;
        
    }

 
</style>

</head>
<body>
<div class="container">
    <div class="form-group">
	 <form action="" method="post">
	     <center>
	    <h3 class="sip"><i class="fa fa-hand-o-right" aria-hidden="true"></i>LOGIN<i class="fa fa-hand-o-left" aria-hidden="true"></i></h3>
	    </center>
	    <center>
	    <?php if(isset($error ) ): ?>
	    <script>
        alert ("Akun Salah");
        </script>
        <?php endif; ?>
        </center>
       
	   <div class="form-group">
	       <center>
		 	<label for="username"><i class="fa fa-user" aria-hidden="true"></i>
Username:</label></center>
		 	<input class="form-control" type="text" name="username" placeholder="username"  id="username" required></input>
       </div>
	   <div class="form-group">
	       <center>
		 	<label for="password"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
Password:</label></center>
		 	<input class="form-control"  type="password" name="password" placeholder="password" id="password"></input>
  	   </div>
 	   <div class="form-group">
 	       <center>
		 	<button class="sip" type="submit" name="submit" ><i class="fa fa-sign-in" aria-hidden="true"></i>Masuk</button></center>
       </div>	
  </form>
  </div>
   <div class="info">

            <label for="password">Belum Punya Akun??</label>

            <a href="registrasi.php">Registrasi</a>

     </div>
  
  
	 <div id="count">
	 <?php

        $filename = 'counter.txt';	//mendefinisikan nama file untuk menyimpan counter
        
        function counter(){		//function counter
        	global $filename;	//set global variabel $filename
        
        	if(file_exists($filename)){		//jika file counter.txt ada
        		$value = file_get_contents($filename);	//set value = nilai di notepad
        	}else{		//jika file counter.txt tidak ada maka akan membuat file counter.txt
        		$value = 0;		//kemudian set value = 0
        	}
        
        	file_put_contents($filename, ++$value);		//menuliskan kedalam file counter.txt value+1
        }
        
        counter();	//menjalankan function counter
        
        echo '<i class="fa fa-bar-chart" aria-hidden="true"></i>Visited: '.file_get_contents($filename);	//menampilkan counter di website
?>
</div>
</div>


</body>
</html>

