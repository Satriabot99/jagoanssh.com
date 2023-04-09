<div id="ndexi" style="display: none;">server</div>

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administración del servidor
            <small>Administrar servidor</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administración del servidor</a></li>
            <li class="active">Administrar servidor</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Administrar servidor</h3>
				
                 
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding" id="form_result">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                       <th>Sistema Operativo</th>
                       <th>Tipo</th>
                       <th>Descripción</th>
                      <th>Ubicación</th>
                      <th>Host</th>
                      <th>Usado</th>		
					   <th>Límite de cuenta</th>
						  <th>Acción</th>
                    </tr>
					
<?php
$query = mysqli_query($conn, "SELECT * FROM servers ORDER BY id asc");
while ($row = mysqli_fetch_object($query)) {
$queries = mysqli_query($conn, "SELECT * FROM `accounts` WHERE in_server='$row->id'");
$accounts_in = mysqli_num_rows($queries);
$q = mysqli_query($conn, "SELECT * FROM `accounts` WHERE in_server='$row->id' AND `date_created`>='$currentReset'");
$s = mysqli_num_rows($queries);
?>
 <tr>
					<td><?php echo $row->id ?></td>
            <td><?php echo strtoupper($row->os) ?></td>
            <td><?php echo strtoupper($row->type) ?></td>
            <td><?php echo $row->description ?></td>
                      <td><?php echo location($row->location)['name'] ?></td>
                      <td><?php echo $row->host ?></td>
                      <td><?php echo $s ?> Hoy dia / <?php echo $row->accounts_limit ?> Todo</td>
						     <td><?php echo $row->accounts_limit ?></td>
					  <td><a href="?do=edit-server&edit=<?php echo $row->id ?>" class="btn btn-primary btn-xs btn-flat">Editar / Borrar</a> </td>
                    </tr>
<?php
}
?>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->