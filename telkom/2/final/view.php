<?php
// var_dump($_SESSION);
?>

<meta name="viewport" content="width=device-width,initial-scale=1.0">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



<div class="container">
  <h1>TEMBAK MASA AKTIF AXIS 720 HARI(MASTER)</h1>
  <form method="post" action="">
    <div class="form-group">
      <label for="auth">AUTH CODE </label>
      <input type="text" class="form-control" name="auth"<?php if (isset($_SESSION['auth'])) {echo ' value="' . $_SESSION['auth'] . '"';}?>>
    </div>
    <!-- <div class="form-group">
      <label for="key">Password </label>
      <input type="password" class="form-control" name="key" <?php if (isset($_POST['key'])) {echo 'value="' . $_POST['key'] . '"';}?>>
    </div> -->
    <input type="submit" name="submit-auth2" class="btn btn-primary" value="LANJUTKAN">
    <input type="submit" name="clear" class="btn btn-warning" value="Clear Session">
    <input type="submit" name="changestyle" class="btn btn-success" value="TEMBAK KUOTA ANNIVERSARY">
  </form>

</div>
<?php
if (isset($_SESSION['hasill'])) {
    echo '<center><div class="alert alert-success" col-md-4>' . $_SESSION['hasill'] . '</div></center>';}?>

    
