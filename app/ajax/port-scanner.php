<?php
if(!empty($_POST['domain'])) {  
    //list of port numbers to scan
    $ports = array(21, 22, 25, 80, 81, 110, 143, 443, 8080, 3128);
    
    $results = array();
    foreach($ports as $port) {
        if($pf = @fsockopen($_POST['domain'], $port, $err, $err_string, 1)) {
            $results[$port] = true;
            fclose($pf);
        } else {
            $results[$port] = false;
        }
    }

    foreach($results as $port=>$val) {
        $prot = getservbyport($port,"tcp");
                echo "<script>$('#check').html('Scan Now');$('#check').attr('disabled', false);</script> <div id='notif'><div class='alert alert-success alert-dismissable'>
                <b>Port: $port </b>";
        if($val) {
            echo "<span class=\"label label-primary\">Open</span></div>";
        }
        else {
            echo "<span class=\"label label-danger\">Closed</span></div>";
        }
    }
}
?>