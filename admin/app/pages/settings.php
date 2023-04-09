<?php 
if(isset($_GET['delete'])) {
$de = $_GET['delete'];
}

if(isset($_GET['edit'])) {
$cp = $_GET['edit'];
}
?>
<div id="ndexi" style="display: none;">settings</div>
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Ajustes
            <small>Personalización SSH</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cog"></i> Panel Admin</a></li>
            <li class="active">Ajustes</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		 <div class="col-md-12">
		  <div id="settings-form-notif"></div><br/>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#general" data-toggle="tab">General</a></li>
         <li><a href="#account" data-toggle="tab">Cuenta</a></li>
         <li><a href="#command" data-toggle="tab">Comando SSH</a></li>

		 <form id="form-settings" action="ajax.proc.php?do=save-settings" method="post">
		 <li class="pull-right"><a href="#"><button class="btn btn-primary btn-flat" id="save_button">Guardar</button></a></li>
		  </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="general">
                    <div class="form-group">
                      <label>Nombre de empresa</label>
                      <input name="company_name" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo settings('get', 'company_name') ?>">
                    </div>
					  <div class="form-group">
                      <label>Modo de mantenimiento</label>
                              <select class="form-control" name="maintance_mode" selected="<?php echo settings("get", "maintance_mode"); ?>">
                        <option value="n" <?php if(settings("get", "maintance_mode")=='n') { echo "selected"; } ?>>Desactivado</option>
                        <option value="y" <?php if(settings("get", "maintance_mode")=='y') { echo "selected"; } ?>>Activado</option>
                      </select>
</div>
					  <div class="form-group">
                      <label>Alternar automatización</label>
                               <select class="form-control" name="toggle_automation" selected="<?php echo settings("get", "toggle_automation"); ?>">
                       <option value="n" <?php if(settings("get", "toggle_automation")=='n') { echo "selected"; } ?>>Desactivado</option>
                        <option value="y" <?php if(settings("get", "toggle_automation")=='y') { echo "selected"; } ?>>Activado</option>
                      </select>
                    </div>
                  </div><!-- /.tab-pane -->
               
				  
				     <div class="tab-pane" id="account">
                    <div class="form-group">
                      <label>Bloquear cuenta adicional</label>
                              <select class="form-control" name="block_new_account" selected="<?php echo settings("get", "block_new_account"); ?>">
                       <option value="n" <?php if(settings("get", "block_new_account")=='n') { echo "selected"; } ?>>Desactivado</option>
                        <option value="y" <?php if(settings("get", "block_new_account")=='y') { echo "selected"; } ?>>Activado</option>
                     </select>
                        </div>
                  </div><!-- /.tab-pane --> 
				   
             <div class="tab-pane" id="command">
          <div class="form-group">
                      <label>Comando Agregar cuenta (CentOS)</label>
                      <textarea name="centosaddcommand" type="text" class="form-control"><?php echo settings('get', 'add_command_centos') ?></textarea>
                    </div>
          <div class="form-group">
                      <label>Comando Agregar cuenta (Debian)</label>
                      <textarea name="debianaddcommand" type="text" class="form-control"><?php echo settings('get', 'add_command_debian') ?></textarea>
                    </div>
          <div class="form-group">
                      <label>Comando Eliminar cuenta (Centos)</label>
                      <textarea name="centosdeleteaccount" type="text" class="form-control"><?php echo settings('get', 'delete_command_centos') ?></textarea>
                    </div>
          <div class="form-group">
                      <label>Comando Eliminar cuenta (Debian)</label>
                      <textarea name="debiandeleteaccount" type="text" class="form-control"><?php echo settings('get', 'delete_command_debian') ?></textarea>
                    </div>
        
        
        
                  </div><!-- /.tab-pane --> 
           
					</form>
				
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->

			  </div>
        </section><!-- /.content -->