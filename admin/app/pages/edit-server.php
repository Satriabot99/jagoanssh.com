<?php 
if(isset($_GET['id'])) {
$cp = $_GET['id'];
}
?>
<div id="ndexi" style="display: none;">edit-server</div>
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cambiar de servidor
            <small>cambiar de servidor</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administración del servidor</a></li>
            <li class="active">Cambiar/Eliminar servidor</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		
			    <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Cambiar detalles del servidor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" id="form-edit-server" method="post" action="ajax.proc.php?q=edit-server">
                  <div class="box-body" id="form-edit">
				    <div id="edit-server-form-notif"><?php if(isset($_GET['is_deleted'])) { ?><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> ¡Exito!</h4>
                   Servidor eliminado con éxito.
                  </div><?php } ?></div>
                    <div class="form-group" id="select-server">
                      <label>Seleccionar servidor</label>
                       <select class="form-control" name="server">
					  <?php $query = mysqli_query($conn, "SELECT * FROM servers");
while ($row = mysqli_fetch_object($query)) { 
?>
<option value="<?php echo $row->id ?>">(#<?php echo $row->id ?>) <?php echo $row->description . ' / '. $row->host ?></option>
                     <?php } ?>
					    </select>
                    </div>
				
          
					
                  </div><!-- /.box-body -->
                  <div class="box-footer" id="edit-server-footer">
                    <button type="button" id="edit-server-button" class="btn btn-primary">Seleccionar</button>
				</div>
                </form>
              </div><!-- /.box -->
			  </div>
			  </div>
        </section><!-- /.content -->