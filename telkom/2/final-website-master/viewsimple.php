<?php
// var_dump($_SESSION);
?>
<form method="post" action="">
<h1>tsel tembak <input type="submit" name="changestyle" value="Change Style"></h1> 
<pre>
Msisdn <input type="number" name="msisdn"<?php if (isset($_SESSION['msisdn'])) {echo ' value="' . $_SESSION['msisdn'] . '"';}?> placeholder="628xx">
OTP&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="otp">

<input type="submit" name="submit-otp" value="SEND OTP"> <input type="submit" name="login" value="LOGIN"> <input type="submit" name="clear" value="Clear Session">
</pre>
</form>
<?php
if (isset($_SESSION['hasill'])) {
    echo '' . $_SESSION['hasill'] . '';
}
?>