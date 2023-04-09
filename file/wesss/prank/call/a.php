<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
?>



<?php

   $xuser = @$_POST['user'];

?><!doctype html>

<html>

<head>

   

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Prank</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<style type="text/css">

    #wrapshopcart{width:350px;margin:auto;padding:20px;

     padding-bottom: 1px;margin-bottom: 20px;background:#fff;}

  .container{

        margin:60px auto;

        max-width:400px;

        

    }

    #EE{

        width: 50%;

    }

    textarea { resize:none; }

    #count{

        text-align: right;

    }

</style>



</head>

<body>

<div class="container">    

     <hr/>



    <div class="form-group">

        <center>

                 <h3>Prank Call</h3>

        </center>

  

       <form method="post" action="">

          <div class="Login" style="display: block;">

              <div class="form-group">

          <label>Phone Number:</label>

          <input class="form-control" name="user" type="text" placeholder="" value="<?=$xuser;?>">

          </div>

        

          <button type="submit" class="btn btn-success" name="submit">Prank</button>

          </div>

       </form>

        </div>

<textarea class="form-control input-sm" type="textarea" placeholder="status" maxlength="150" rows="2" style="text-align: center;" readonly>

<?php

if(isset($_POST['submit'])){

   if($xuser == "" ){

    echo "<script>

			swal('nomor kosong!');

		</script>";

   }else{

      require_once("b.php");

   }

}

?></textarea>



       <center>

        <p> &copy; 2018 By Kumpul4semut

    <center>

    

</div>       



    </body>

</html>