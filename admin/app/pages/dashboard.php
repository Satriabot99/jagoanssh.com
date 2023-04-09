<?php
$active_ssh = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `accounts` WHERE `status`=1 AND `isvpn`='n'"));
$active_vpn = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `accounts` WHERE `status`=1 AND `isvpn`='y'"));
$servers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `servers`"));
?>
<div id="ndexi" style="display: none;">dashboard</div>
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Tablero</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
                 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $active_ssh ?></h3>
                  <p>Cuenta VPN activa</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-checkmark"></i>
                </div>
                <a href="?do=accounts" class="small-box-footer">Ver y administrar <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
                 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo $active_vpn ?></h3>
                  <p>Cuenta SSH activa</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-checkmark"></i>
                </div>
                <a href="?do=accounts" class="small-box-footer">Ver y administrar <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $servers ?></h3>
                  <p>Servidores Disponibles</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hdd-o"></i>
                </div>
                <a href="?do=servers" class="small-box-footer">Ver y administrar <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="row">
			
          </div><!-- /.row -->
         
          </div><!-- /.row -->
        </section><!-- /.content -->