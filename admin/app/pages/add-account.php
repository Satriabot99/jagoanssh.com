<div id="ndexi" style="display: none;">add-account</div>

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Anadir cuenta
            <small>crear una nueva cuenta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administracion de cuentas</a></li>
            <li class="active">Anadir cuenta</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		  <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Agregar nueva cuenta</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form-add-account" method="post" action="ajax.proc.php?do=add-account">
                  <div class="box-body">
				   <div id="add-account-form-notif"></div>
       
					  <div class="form-group">
                      <label>Usuario</label>
                      <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label>Contrasena</label>
                      <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
					   
                    <div class="form-group">
                      <label >Servidor</label>
					       <select class="form-control" name="server">
					  <?php $query = mysqli_query($conn, "SELECT * FROM servers");
while ($row = mysqli_fetch_object($query)) { 
$queries = mysqli_query($conn, "SELECT * FROM `accounts` WHERE `in_server`='$row->id'");
$accounts_in = mysqli_num_rows($queries);
?>
<option value="<?php echo $row->id ?>">(#<?php echo $row->id ?>) <?php echo $row->description . ' / '. $row->host ?> [Aktif: <?php echo $accounts_in ?>]</option>
                     <?php } ?>
					    </select>
					
                    </div>

               
      	
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="add-account-button" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div><!-- /.box -->
			  </div>
			  </div>
        </section><!-- /.content -->