<?php
session_start();

include('../app/settings/config.php');
include('../app/function.php');
if(isset($_GET['wrong'])) {
echo "Wrong Login";
die();
}
if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Panel Admin GreySSH</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
      <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.13/r-2.1.1/datatables.min.css"/>
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the assets/css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.assets/js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="?do=dashboard" class="logo" style="background-color:#2196F3;"><b>Panel</b> Admin</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background-color:#2196F3;">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu de Navegación</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="assets/img/flechaverde-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Hola, <?php echo $_SESSION['Ym1GdFlTQnNaVzVuYTJGda=='] ?>! <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="assets/img/flechaverde-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $_SESSION['Ym1GdFlTQnNaVzVuYTJGdw=='] ?>
                      <small><?php echo $_SESSION['WlcxaGFXdz0=']  ?></small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
               
                    <div class="pull-right">
                      <a href="ajax.proc.php?do=signout" class="btn btn-default btn-flat">Cerrar Seción</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="assets/img/flechaverde-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['Ym1GdFlTQnNaVzVuYTJGdw=='] ?></p>

              <a href="#"><i class="fa fa-circle text-info"></i> Administrator</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu de Navegación</li>
           <li id="dashboard"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Tablero</span></a></li>
  
            
            <li class="treeview" id="acc-man">
              <a href="#">
                <i class="fa fa-slack"></i>
                <span>Administración de cuentas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?do=accounts"><i class="fa fa-circle-o"></i> Administrar cuentas</a></li>
                <li><a href="?do=add-account"><i class="fa fa-circle-o"></i> Añadir cuenta</a></li>
           </ul>
            </li>
			 <li class="treeview" id="serv-man">
              <a href="#">
                <i class="fa fa-hdd-o"></i>
                <span>Gestionar Servidor</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?do=servers"><i class="fa fa-circle-o"></i> Administrar servidor</a></li>
                <li><a href="?do=add-server"><i class="fa fa-circle-o"></i> Agregar nuevo servidor</a></li>
                <li><a href="?do=edit-server"><i class="fa fa-circle-o"></i> Cambiar/Eliminar servidor</a></li>
                <li><a href="?do=restart-service"><i class="fa fa-circle-o"></i> Reiniciar servicio</a></li>
</ul>
            </li>
          
            <li id="settings">
              <a href="?do=settings">
                <i class="fa fa-cog"></i> <span>Ajustes</span>
             </a>
            </li>
          
            <li class="header">Etiquetas</li>
            <li><a href="#"><i class="fa fa-circle-o text-success"></i> Activo</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Pendiente</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Expirados</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
<?php
        if(isset($_GET['do'])){
        	$act=htmlentities($_GET['do']);
        }else{
       		$act="dashboard";
        }
        
        $file="app/pages/$act.php";
        $cek=strlen($act);
        
        if($cek>30 || !file_exists($file) || empty($act)){
        	include ("app/pages/error/notfound.php");
        }else{
        	include ($file);
        }
        ?>		
      </div><!-- /.content-wrapper -->
	  
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2022 <a href="#">GreySSH</a>.</strong> Derechos reservados.
        <strong>Thanks To • <a href="//t.me/GreySSH_Team">Grupos GreySSH </a></strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="app/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/js/jquery.form.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
	
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- daterangepicker -->
    <script src="app/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.13/r-2.1.1/datatables.min.js"></script>
    <script src="app/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Slimscroll -->
    <script src="app/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
	 </body>
</html>
<?php } else { ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Panel Admin - <?php echo settings('get', 'company_name'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>PANEL </b>ADMIN GreySSH</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Powered By <a href="//t.me/GreySSH_Channel">GreySSH</a></p>
        <form action="ajax.proc.php?do=login" method="post">
          <div class="form-group has-feedback">
            <input name="username_admin" type="text" class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password_admin" type="password" class="form-control" placeholder="Contraseña"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  </body>
</html>
<?php } ?>