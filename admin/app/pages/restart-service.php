<div id="ndexi" style="display: none;">restart</div>

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Reiniciar servicio
            <small>reiniciar un servicio</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Área de usuario</a></li>
            <li class="active">Reiniciar servicio</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		  <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Reiniciar servicio</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form-restart" method="post" action="ajax.proc.php?do=restart-service">
                  <div class="box-body">
				   <div id="restart-notif"></div>
					  
         
                    <div class="form-group">
                      <label >Servidor</label>
					       <select class="form-control" name="server">
					  <?php $query = mysqli_query($conn, "SELECT * FROM servers");
while ($row = mysqli_fetch_object($query)) { 
$queries = mysqli_query($conn, "SELECT * FROM accounts WHERE in_server='$row->id'");
$accounts_in = mysqli_num_rows($queries);
?>

<option value="<?php echo $row->id ?>">(#<?php echo $row->id ?>) <?php echo location($row->location)['name'] ?> [Disponible]</option>
                     <?php } ?>
					    </select>
					
                    </div>
      	
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="restart-button" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div><!-- /.box -->
			  </div>
			  </div>
        </section><!-- /.content -->