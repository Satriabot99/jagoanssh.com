<?php
session_start();
echo '<script>confirm("Logout Berhasil, Silakan Login Kembali!");</script>';
    $session = session_destroy();
    echo "<script type=\"text/javascript\" language=\"javascript\">
 window.location.replace(\"404.shtml\");
</script>";
?>