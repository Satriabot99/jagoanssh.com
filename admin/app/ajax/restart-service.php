<?php

$server = mysqli_real_escape_string($conn, $_POST['server']);


if ((empty($server)))
{

  echo "<script>$('#restart-button').html('Submit');$('#restart-button').attr('disabled', false);</script> <div id='restart-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-exclamation-circle'></i> Fallo al guardar!</h4>
                    Por favor ingrese el formulario correctamente.
                  </div></div>";

             } else {
 if(restart($server)):
 echo "<script>$('#restart-button').html('Submit');$('#restart-button').attr('disabled', false);</script> <div id='restart-notif'><div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Exito!</h4>
                   Se reinició con éxito el servicio.
                  </div></div>";
else:
echo "<script>$('#restart-button').html('Submit');$('#restart-button').attr('disabled', false);</script> <div id='restart-notif'><div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Fallo al Reiniciar!</h4>
                   Error al reiniciar el servicio.
                  </div></div>";
endif;
                    }
  