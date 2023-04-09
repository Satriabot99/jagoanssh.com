<?php
$addr = $_SERVER["REMOTE_ADDR"];
$port = "80";
if ($_GET["addr"]) {
  $addr = $_GET["addr"];
}
if ($_GET["port"]) {
  $port = $_GET["port"];
}
if ($_GET["port2"]) {
  $port2 = $_GET["port2"];
}
if ($_GET["addr"]) {
  if ($_GET["port"] && !$_GET["port2"]) {
    $fp = @fsockopen($addr, $port, $errno, $errstr, 2);
    $success = "#FF0000";
    $success_msg = "<span class=\"label label-danger\">Closed</span>";
    if ($fp) {
      $success = "#99FF66";
      $success_msg = "<span class=\"label label-primary\">Open</span>";
    }
    @fclose($fp);
    echo '<script>$("#check").html("Check Now");$("#check").attr("disabled", false);</script> <div id="notif"><div class="alert alert-success alert-dismissable">
    <b>Host /IP : ' .$addr. '</b>
    <br><b>Port : ' .$port. '</b>
    <br><b>Status : ' .$success_msg. '</b>
  </div>';
  }
  else if ($_GET["port"] && $_GET["port2"]) {
    $p1 = $_GET["port"];
    $p2 = $_GET["port2"];
    if ($p1 == $p2) {
      $fp = @fsockopen($addr, $port, $errno, $errstr, 2);
      $success = "#FF0000";
      $success_msg = "<span class=\"label label-danger\">Closed</span>";
      if ($fp) {
        $success = "#99FF66";
        $success_msg = "is open and ready to be used";
      }
      @fclose($fp);
      echo '<div style="width:300px;background:' .$success. ';padding:10px;font-family:arial;font-size:12px;">
      The address <b>"' .$addr. ':' .$port. '"</b> ' .$success_msg. '
      </div>';
    }
    else {
      if ($p1 < $p2) {
        $s = $p1;
        $st = $p1;
        $e = $p2;
      }
      else if ($p2 < $p1) {
        $s = $p2;
        $st = $p2;
        $e = $p1;
      }
      while ($s <= $e) {
        $fp = @fsockopen($addr, $s, $errno, $errstr, 1);
        if ($fp) {
          $p_open = $p_open. " " .$s;
          $p_1 = 1;
        }
        @fclose($fp);
        $s++;
      }
      if ($p_1) {
        $c = "#99FF66";
        $m = "On the address <b>" .$addr. "</b> and port range <b>" .$st. "-" .$e. "</b> the following ports were open: " .$p_open;
      }
      else {
        $c = "#FF0000";
        $m = "No ports on the address <b>" .$addr. "</b> and port range <b>" .$st. "-" .$e. "</b> were open";
      }
      echo '<div style="width:300px;background:' .$c. ';padding:10px;font-family:arial;font-size:12px;">' .$m. '</div>';
    }
  }
}
?>