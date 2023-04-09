<div id="ndexi" style="display: none;">users</div>

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Gestion de usuarios
            <small>administrar usuarios</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Gestion de usuarios</a></li>
            <li class="active">Administrar usuarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
            <div class="col-xs-12">
             
                <div class="box-body table-responsive no-padding" id="form_result">
                  <table class="table table-hover" id="tbl_users">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Gmail</th>
                      <th>Telefono</th>				 
					  <th>Registrado en</th>
             <th>Equilibrio</th>
					   <th>Accion</th>
                    </tr>
					</thead>
<?php
$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id asc");
while ($row = mysqli_fetch_object($query)) {
?>
 <tr>
					<td><?php echo $row->id ?></td>
                      <td><?php echo $row->firstname." ".$row->lastname ?></td>
                      <td><?php echo $row->email ?></td>
                      <td><?php echo $row->phone ?></td>
                      <td><?php echo $row->registered_on ?></td>
                      <td><?php echo $row->balance ?></td>
					  <td><a href="?do=edit-user&edit=<?php echo $row->id ?>" class="btn btn-primary btn-xs btn-flat">Edit</a> &nbsp; <a href="?q=edit-user&delete=<?php echo $row->id ?>" class="btn btn-xs btn-danger btn-flat">Eliminar</a> </td>
                    </tr>
<?php
}
?>
                  
                  </table>
             </div>
          </div>
        </section><!-- /.content -->