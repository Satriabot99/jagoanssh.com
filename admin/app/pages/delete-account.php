<?php 
if(isset($_GET['id'])) {
$cp = $_GET['id'];
}
?>
<div id="ndexi" style="display: none;">delete-account</div>
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Borrar cuenta
            <small>eliminar cuenta seleccionada</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administracion de cuentas</a></li>
            <li class="active">Borrar cuenta</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		
			    <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Borrar cuenta</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" id="form-delete-account" method="post" action="ajax.proc.php?q=delete-account">
                  <div class="box-body">
				    <div id="delete-account-notif"></div>
                    <div class="form-group">
                      <label>ID de la Cuenta</label>
                      <input name="id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Info ID cuenta" value="<?php if(isset($cp)) { echo $cp; }; ?>">
                    </div>
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="delete-account-button" class="btn btn-primary">Eliminar</button>
                  </div>
                </form>
              </div><!-- /.box -->
			  </div>
			  </div>
        </section><!-- /.content -->