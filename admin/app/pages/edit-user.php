<?php 
if(isset($_GET['delete'])) {
$de = $_GET['delete'];
}

if(isset($_GET['edit'])) {
$cp = $_GET['edit'];
}
?>
<div id="ndexi" style="display: none;">edit-user</div>
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cambiar Contraseña / Eliminar Usuario
            <small>Cambiar contraseña o Borrar usuario</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Gestión de usuarios</a></li>
            <li class="active">Cambiar/Eliminar Usuario</li>
          </ol>
        </section>

     
        <!-- Main content -->
        <section class="content">
         <div class="row">
		  <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Borrar usuario</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form-delete" action="ajax.proc.php?do=delete-user" method="post">
                  <div class="box-body">
				  <div id="delete-form-notif"></div>
                    <div class="form-group">
                      <label>ID del Usuario</label>
                      <input name="id" type="text" class="form-control" placeholder="Masukkan ID user" value="<?php if(isset($de)) { echo $de; }; ?>">
                    </div>
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="delete-button" class="btn btn-primary">Borrar usuario</button>
                  </div>
                </form>
              </div><!-- /.box -->
			  </div>
			    <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Nueva contraseña</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" id="form-change-password" method="post" action="ajax.proc.php?do=change-user-password">
                  <div class="box-body">
				    <div id="change-password-form-notif"></div>
                    <div class="form-group">
                      <label>ID User</label>
                      <input name="id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID User" value="<?php if(isset($cp)) { echo $cp; }; ?>">
                    </div>
					<div class="form-group">
                      <label>Nueva contraseña</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    </div>
          
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="change-password-button" class="btn btn-primary">Cambia la contraseña</button>
                  </div>
                </form>
              </div><!-- /.box -->
			  </div>
        <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Cambiar Saldo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
        
                <form role="form" id="form-balance" method="post" action="ajax.proc.php?do=change-user-balance">
                  <div class="box-body">
            <div id="balance-notif"></div>
                    <div class="form-group">
                      <label>ID del Usuario</label>
                      <input name="id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan ID User" value="<?php if(isset($cp)) { echo $cp; }; ?>">
                    </div>
          <div class="form-group">
                      <label>Saldo Total</label>
                      <input name="saldo" type="text" class="form-control" id="exampleInputPassword1" value="<?php if (isset($cp)) { $x= mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='$cp'")); echo $x['balance']; } ?>">
                    </div>
          
          
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="balance-button" class="btn btn-primary">Cambiar Saldo</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
			  </div>
        </section><!-- /.content -->