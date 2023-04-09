<?php
if(isset($_POST['server'])): 
$id = chkString($_POST['server']);

$q = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM `servers` WHERE id='$id'"));
if($q): $ss = 1; endif;

if(isset($ss)) { 
if(isset($_POST['checkport'])) {
  $s = @explode(',', $_POST['checkport']);
  if(is_array($s)): $s = chkString($s[0]); else: $s = chkString($_POST['checkport']); endif;
  $connection = @fsockopen($q->host, $s);
  if (is_resource($connection)){ $success = 'Check Completed, Service is <strong>ONLINE.</strong>'; fclose($connection); } else { $error = 'Check Completed, Service is <strong>OFFLINE.</strong>'; }
}elseif(isset($_POST['action'])) {
  $s = restart($q->id, $_POST['action']);;
  if(!$s): $error = 'Restart Error, Unknown Error Occured.'; else: $success = 'Restart Completed, Service has been restarted successfully.'; endif;
}
?>
<div id="where" style="display:none;">ssh-servers</div>
<div id="ndexi" style="display:none;">ssh-servers</div>
<!-- Main component for a primary marketing message or call to action -->
<div class="container">
  <div class="row" style="padding-top:50px;padding-bottom:80px;">
  <div align="center">
  <h4><?php echo $q->description ?> Control Panel</h4>
         <h4><small style="color:grey;">Manage, Check & Restart Available Services.</small></h4></div>
         
  <hr>
  <?php if(isset($success)): ?>
  <div class="alert alert-success">
  <?php echo $success ?>
</div>
<?php elseif(isset($error)): ?>
  <div class="alert alert-danger">
  <?php echo $error ?>
</div>
<?php endif; ?>
  <!-- Server -->
<div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading">Server Information</div>
    <div class="panel-body">
       <table class="table table-bordered">
            <tbody>
               <tr>
                  <td>
                     <b>Host :</b>
                  </td>
                  <td>
                     <small><?php echo $q->host ?></small>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Location :</b>
                  </td>
                  <td>
                     <?php echo location($q->location)['name'] ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>OpenSSH :</b>
                  </td>
                  <td>
                     <?php echo (!empty($q->openssh_port))? $q->openssh_port : '-'; ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>Dropbear :</b>
                  </td>
                  <td>
                     <?php echo (!empty($q->dropbear_port))? $q->dropbear_port : '-'; ?>
                  </td>
               </tr>
               <tr>
                  <td>
                     <b>SSL / TLS :</b>
                  </td>
                  <td>
                     443
                  </td>
               </tr>
            </tbody>
         </table>
    </div>
  </div>
</div>
  <div class="col-md-8">
  <div class="col-md-6">
    <div class="panel panel-info">
    <div class="panel-heading">OpenSSH</div>
    <div class="panel-body">
  <?php if(!empty($q->openssh_port)): ?>
 <div style="padding-bottom:15px;"><span class="label label-success">Installed</span> <span class="label label-info">Port <?php echo $q->openssh_port ?></span></div>
 <div style="float:right;">
 <form method="post" action="<?php echo urlPrefix('panel') ?>">
   <input type="hidden" name="server" value="<?php echo $id ?>" />
   <input type="hidden" name="checkport" value="<?php echo $q->openssh_port ?>" />
   <button type="submit" class="btn btn-primary" type="button">Check</button>  
</form>
</div>
<div style="float:left;">
<form method="post" action="<?php echo urlPrefix('panel') ?>">
   <input type="hidden" name="server" value="<?php echo $id ?>" />
   <input type="hidden" name="action" value="openssh" />
   <button type="submit" name="restart" class="btn btn-warning"><i class="fa fa-retweet"></i> Restart</button>                 
</form>
 </div>       
<?php else: ?>
 <div style="padding-bottom:15px;"><span class="label label-danger">Not Installed</span></div>
 <div style="float:right;">
 <button type="submit" class="btn btn-primary" type="button" disabled="disabled">Check</button>  
</div>
<div style="float:left;">
<button type="submit" name="restart" class="btn btn-warning" disabled="disabled"><i class="fa fa-retweet"></i> Restart</button>                 
</div>       
<?php endif; ?>
    </div>
  </div>
  </div>

  <div class="col-md-6">
    <div class="panel panel-primary">
    <div class="panel-heading">Dropbear</div>
    <div class="panel-body">
  <?php if(!empty($q->dropbear_port)): ?>
 <div style="padding-bottom:15px;"><span class="label label-success">Installed</span> <span class="label label-primary">Port <?php echo $q->dropbear_port ?></span></div>
 <div style="float:right;">
 <form method="post" action="<?php echo urlPrefix('panel') ?>">
   <input type="hidden" name="server" value="<?php echo $id ?>" />
   <input type="hidden" name="checkport" value="<?php echo $q->openssh_port ?>" />
   <button type="submit" class="btn btn-primary" type="button">Check</button>  
</form>
</div>
<div style="float:left;">
<form method="post" action="<?php echo urlPrefix('panel') ?>">
   <input type="hidden" name="server" value="<?php echo $id ?>" />
   <input type="hidden" name="action" value="dropbear" />
   <button type="submit" name="restart" class="btn btn-warning"><i class="fa fa-retweet"></i> Restart</button>                 
</form>
 </div>       
<?php else: ?>
 <div style="padding-bottom:15px;"><span class="label label-danger">Not Installed</span></div>
 <div style="float:right;">
 <button type="submit" class="btn btn-primary" type="button" disabled="disabled">Check</button>  
</div>
<div style="float:left;">
<button type="submit" name="restart" class="btn btn-warning" name="dropbear" disabled="disabled"><i class="fa fa-retweet"></i> Restart</button>                 
</div>       
<?php endif; ?>
    </div>
  </div>
  </div>

  <div class="col-md-6">
    <div class="panel panel-success">
    <div class="panel-heading">Squid</div>
    <div class="panel-body">
  <?php if(!empty($q->squid_port)): ?>
 <div style="padding-bottom:15px;"><span class="label label-success">Installed</span> <span class="label label-success">Port <?php echo $q->squid_port ?></span></div>
 <div style="float:right;">
 <form method="post" action="<?php echo urlPrefix('panel') ?>">
   <input type="hidden" name="server" value="<?php echo $id ?>" />
   <input type="hidden" name="checkport" value="<?php echo $q->squid_port ?>" />
   <button type="submit" class="btn btn-primary" type="button">Check</button>  
</form>
</div>
<div style="float:left;">
<form method="post" action="<?php echo urlPrefix('panel') ?>">
   <input type="hidden" name="server" value="<?php echo $id ?>" />
   <input type="hidden" name="action" value="squid" />
   <button type="submit" name="restart" class="btn btn-warning" name="dropbear"><i class="fa fa-retweet"></i> Restart</button>                 
</form>
 </div>       
<?php else: ?>
 <div style="padding-bottom:15px;"><span class="label label-danger">Not Installed</span></div>
 <div style="float:right;">
 <button type="submit" class="btn btn-primary" type="button" disabled="disabled">Check</button>  
</div>
<div style="float:left;">
<button type="submit" name="restart" class="btn btn-warning" name="dropbear" disabled="disabled"><i class="fa fa-retweet"></i> Restart</button>                 
</div>       
<?php endif; ?>
    </div>
  </div>
  </div>
</div>
  <!-- End Server -->    
<br/></br/>


    </div> <!-- /container -->

  </div>

<?php } 
endif;

if(!isset($ss)):
if(isset($_GET['filter'])): 
switch($_GET['filter']) {
  case 'ssh':
    $dimas = "`type`='ssh' OR `type`='vpnssh' OR `type`='extra'";
  break;
  case 'vpn':
    $dimas = "`type`='vpn' OR `type`='vpnssh'";
  break;
  default:
    $dimas = "`host` IS NOT NULL";
  break;
}
else:
  $filter = '';
  $dimas = "`type`='vpnssh' $filter OR `type`='ssh' $filter";
endif;
?>
<div id="where" style="display:none;">ssh-servers</div>
<div id="ndexi" style="display:none;">ssh-servers</div>
<!-- Main component for a primary marketing message or call to action -->
<div class="container">

  <div class="row" style="padding-top:50px;padding-bottom:80px;">
  <div align="center">
  <h2>Server Panel</h2>
         <h4><small style="color:grey;">Choose what server you want to manage.</small></h4></div>
  <br/>

<?php $q = mysqli_query($conn, "SELECT * FROM `servers` WHERE $dimas"); $i = 0;
while($row = mysqli_fetch_object($q)) { 
}
?>
  <!-- Server -->
<div class="col-sm-8 col-md-offset-2">
   <div class="well">
      <div align="center">
      <h2 class="text-primary">Control Panel</h2>
      <form method="post" action="<?php urlPrefix('panel') ?>">
      <div class="form-group" style="padding:20px;">
 <select class="form-control" name="server">
            <?php $q = mysqli_query($conn, "SELECT * FROM `servers`");
while ($row = mysqli_fetch_object($q)) { 
?>
<option value="<?php echo $row->id ?>"><?php echo strtoupper($row->description).' ('.$row->host.')' ?></option>
                     <?php } ?>
              </select>
      </div>
     </div> 

      <p align="center"><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-cog" aria-hidden="true"></i> Manage Server</button></p>
      </form>
   </div>
</div>
  <!-- End Server -->    


    </div> <!-- /container -->

  </div>
<?php endif; ?>