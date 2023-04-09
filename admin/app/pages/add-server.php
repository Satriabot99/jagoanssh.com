<div id="ndexi" style="display: none;">add-server</div>

       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Agregar servidor
            <small>crear un nuevo servidor</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administración del servidor</a></li>
            <li class="active">Agregar servidor</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
      <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Agregar nuevo servidor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form-add-server" method="post" action="ajax.proc.php?do=add-server">
                  <div class="box-body">
           <div id="add-server-form-notif"></div>
                    <div class="form-group">
                      <label>Ubicación</label>
                      <input name="location" type="text" class="form-control" placeholder="Lokasi Geologis Server (Contoh: Jakarta, Indonesia.)" value="Singapore[DIMAS_FLAG]http://greyssh.com/negara/sg.png">
                    </div>

     <div class="form-group">
                      <label>Sistema Operativo del servidor</label>
                               <select class="form-control" name="os">
                       <option value="centos">CentOS</option>
                        <option value="debian">Debian</option>
                      </select>
                    </div>


     <div class="form-group">
                      <label>Tipo de servidor</label>
                               <select class="form-control" name="type">
                         <option value="websocket3">Websocket 3 Days</option>
                          <option value="websocket7">Websocket 7 Days</option>
                          <option value="servers_v2ray">V2ray 7 Days</option>
                          <option value="ssh">SSH Server 3 Days </option>
                          <option value="ssh">SSH Server 7 Days</option>
                          <option value="ssh">SSH Server 30 Days</option>
                          <option value="vpn">VPN Server 3 Days</option>
                          <option value="vpn">VPN Server 7 Days</option>
                      </select>
                    </div>

                           <div class="form-group">
                      <label>Descripción</label>
                      <input name="description" type="text" class="form-control" placeholder="Deskripsi Server">
                    </div>
            <div class="form-group">
                      <label>Límites de cuenta</label>
                      <input name="limit" type="text" class="form-control" placeholder="Batasan Jumlah Akun">
                    </div>
            <div class="form-group">
                      <label>Multi login</label>
                      <input name="max_login" type="text" class="form-control" placeholder="Max Berapa Device Yang Bisa Login Sekaligus">
                    </div>
            <div class="form-group">
                      <label>Período activo de la cuenta</label>
                      <input name="activefor" type="text" class="form-control" placeholder="Masa Aktif Akun (Berapa Hari)">
                    </div>
                    <hr>
            <div class="form-group">
                      <label>Usuario root</label>
                      <input name="username" type="text" class="form-control" placeholder="Username Root">
                    </div>
                    <div class="form-group">
                      <label>Contraseña root</label>
                      <input name="password" type="password" class="form-control" placeholder="Password Root">
                    </div>
            <div class="form-group">
                      <label>Host del Servidor</label>
                      <input name="host" type="text" class="form-control" placeholder="Host atau IP Server">
                    </div>

            <div class="form-group">
                      <label>Puerto de conexión predeterminado</label>
                      <input name="port" type="text" class="form-control" placeholder="Port Default Untuk Eksekusi (Port SSH yang bisa login root)" value="22">
                    </div>
                    <hr>
            <div class="form-group">
                      <label>Puerto Dropbear</label>
                      <input name="dropbear" type="text" class="form-control" placeholder="Port Untuk Dropbear">
                    </div>
                    <div class="form-group">
                    	<div class="form-group">
                      <label>Puerto OpenSSH</label>
                      <input name="ssl" type="text" class="form-control" placeholder="Port Untuk OpenSSH">
                    </div>
                      <label>Puerto SSL/TLS</label>
                      <input name="openssh" type="text" class="form-control" placeholder="Port Untuk SSL/TLS">
                    </div>
                      <div class="form-group">
                      <label>Puerto Squid</label>
                      <input name="squid" type="text" class="form-control" placeholder="Isi Port Squid Untuk Mengaktifkan Squid Proxy">
                    </div>
                    <hr>
                         <div class="form-group">
                      <label>Puerto TCP OpenVPN</label>
                       <input name="vpnport[tcp]" type="text" class="form-control" placeholder="Port Untuk OpenVPN TCP">
                    </div>
                         <div class="form-group">
                      <label>Puerto UDP OpenVPN</label>
                       <input name="vpnport[udp]" type="text" class="form-control" placeholder="Port Untuk OpenVPN UDP">
                    </div>
                    <div class="form-group">
                      <label>Puerto UDP OpenVPN</label>
                       <input name="vpnport[ssl]" type="text" class="form-control" placeholder="Port Untuk OpenVPN SSL">
                    </div>
                         <div class="form-group">
                      <label>Link de Configuración OpenVPN (TCP)</label>
                     <input name="config[tcp]" type="text" class="form-control" placeholder="Link Config OpenVPN TCP">
                      </div>
                  <div class="form-group">
                      <label>Link de Configuración OpenVPN (UDP)</label>
                     <input name="config[udp]" type="text" class="form-control" placeholder="Link Config OpenVPN SSL">
                      </div>
                 <div class="form-group">
                      <label>Link de Configuración OpenVPN (SSL)</label>
                     <input name="config[ssl]" type="text" class="form-control" placeholder="Link Config OpenVPN SSL">
                      </div>
        
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button id="add-server-button" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
              </div><!-- /.box -->
        </div>
        </div>
        </section><!-- /.content -->