<div id="ndexi" style="display: none;">accounts</div>

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administracion de cuentas
            <small>cuentas de administracion</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administracion de cuentas</a></li>
            <li class="active">Administrar cuenta SSH</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
            <div class="col-xs-12">
   
              
                <div class="box-body table-responsive no-padding" id="form_result">
                  <table class="table table-hover" id="tbl_accounts">
                    <thead>
                    <tr>
                      <th>ID</th>
                      
                      <th>Usuario</th>
                      			 
					  <th>Servidor</th>
					   <th>Creado</th>
					   <th>Expirado</th>
             <th>SSH</th>
					    <th>Accion</th>
                    </tr>
                  </thead>
                   <tbody style="background-color:#FFFFFF;">
<?php
$query = mysqli_query($conn, "SELECT * FROM accounts WHERE status='1' ORDER BY id DESC");
while ($row = mysqli_fetch_object($query)) {
?>
 <tr>
					<td><?php echo $row->id ?></td>
                      <td><?php echo $row->username ?></td>
                       <td><?php echo mysqli_fetch_object(mysqli_query($conn, "SELECT `description` FROM `servers` WHERE `id`='$row->in_server'"))->description ?></td>
					  <td><?php echo $row->date_created ?></td>
            <td><?php echo round((strtotime($row->date_expired) - strtotime(date('Y-m-d H:i:s')))/(60*60)) ?> Horas</td>
            <td><?php echo ($row->isvpn=='y')? 'Ya': 'Tidak'; ?></td>
					 <td><a href="?do=delete-account&id=<?php echo $row->id ?>" class="btn btn-danger btn-xs btn-flat">Eliminar</a></td>
                    </tr>
<?php
}
?>
  </tbody>                
                  </table>
               
             </div>
          </div>
        </section><!-- /.content -->