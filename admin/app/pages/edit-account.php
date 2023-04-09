<?php 
if(isset($_GET['id'])) {
$cp = $_GET['id'];
}
?>
<div id="ndexi" style="display: none;">password-account</div>
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cambie la contraseña de la cuenta
            <small>Cambiar la contraseña de la cuenta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administración de cuentas</a></li>
            <li class="active">Cambiarla contraseña de la cuenta</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		
			    <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Cambie la contraseña de la cuenta</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" id="form-change-account-password" method="post" action="ajax.proc.php?do=change-account-password">
                  <div class="box-body">
				    <div id="change-account-password-form-notif"></div>
                    <div class="form-group">
                      <label>ID de la cuenta</label>
                      <input name="id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID Akun" value="<?php if(isset($cp)) { echo $cp; }; ?>">
                    </div>
					<div class="form-group">
                      <label>Nueva contraseña</label>
                      <input name="password" type="password" class="form-control" placeholder="password">
                    </div>
          
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="change-account-password-button" class="btn btn-primary">Cambia la contraseña</button>
                  </div>
                </form>
              </div><!-- /.box -->
			  </div>
			  </div>
        </section><!-- /.content -->