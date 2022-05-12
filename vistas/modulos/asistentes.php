              <!--*******EVITA QUE UN USUARIO VULNERE LA URL ***** -->
<?php

  if($_SESSION["perfil"] == "Piloto" || $_SESSION["perfil"] == "Ejecutivo"){
    echo '<script>window.location = "inicio";</script>';
    return;
  }

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar asistencias eventos del club
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar asistencias</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">


      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAsistentes">Agregar asistentes</button>
      </div>

       <!-- tabla que lista los usuarios -->
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width:5px">#</th>
              <th>Ruta</th>
              <th>Lugar</th>
              <th>Fecha</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Opciones</th>
            </tr>
          </thead>

          <tbody>

          <!--************************************************************************************
            Creamos el objeto de php que nos traera la informacion de la ruta de la base de datos
          ***************************************************************************************-->
          <?php

          $item = null;
          $valor = null;

          $asistencias = ControladorAsistentes::ctrMostrarAsistentes($item, $valor );
        
        // r.ruta, r.lugar, r.fecha, p.nombres, p.apellidos

          foreach ($asistencias as $key => $value) {
            # code...
            //var_dump($value["nombre"]);   <td>'.$value["id"].'</td>
            echo '
              <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["ruta"].'</td>
                  <td>'.$value["lugar"].'</td>
                  <td>'.$value["fecha"].'</td>
                  <td>'.$value["nombres"].'</td>
                  <td>'.$value["apellidos"].'</td>';


                  // if ($value["estado"] != 0) {
                  //   echo '<td><button class="btn btn-success btn-xs btnActivarRodada" idRodada = "'.$value["id"].'" estadoRodada= "0"> Realizada</button></td>';

                  // }else{
                  //   echo '<td><button class="btn btn-danger btn-xs  btnActivarRodada" idRodada = "'.$value["id"].'" estadoRodada= "1">No Realizada</button></td>';
                  // }

                 echo '
                  
                  <td>
                    <div class="btn-group">
                    
                    <button class="btn btn-danger btnEliminarAsistencia" idAsistencia = "'.$value["id"].'" ><i class="fa fa-times">Eliminar</i></button>

                    </div>
                  </td>
               </tr>

            ';
          }

          ?>
        
          </tbody>
          

        </table>
      </div>

      <!-- /.box-body -->

    </div>
    <!-- fin div box -->

  </section>
  <!-- fin seccion content -->
</div>
<!-- /.content-wrapper -->

<!--**************************************** 
VENTANA MODAL PARA AGREGAR asistentes
******************************************-->
<!-- Modal -->
<div id="modalAgregarAsistentes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Asistentes</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

           

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <select class="form-control input-lg Buscador" style="width: 100%;" type="tetx" name="nuevaRodada" placeholder="Ingresar rodada ó evento" required>
                  <option value="">Selecccione Rodada ó evento</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $rodadas = ControladorRodadas::ctrMostrarRodadasRealizadas($item, $valor );
                    foreach ($rodadas as $key => $value) {
                      echo'
                       <option value="'.$value["id"].'"><b>Ruta</b>: '.$value["ruta"].' / <b>Lugar</b>: '.$value["lugar"].'</option>
                    ';

                    }

                    ?>
                </select>
              </div>
            </div>

             <!-- entrada para el  nombre de usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control input-lg Buscador" style="width: 100%;" type="tetx" name="pilotos[]" multiple required>
                  <?php
                    $item = null;
                    $valor = null;

                    $pilotos = ControladorPilotos::ctrMostrarPilotos($item, $valor );
                    foreach ($pilotos as $key => $value) {
                      echo'
                       <option value="'.$value["id"].'">'.$value["nombres"].' '.$value["apellidos"].'</option>
                    ';

                    }

                    ?>
                </select>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="nuevaObs" placeholder="Ingresar observaciones" required>
              </div>
            </div>

           <input type="text" name="estado" id="estado" hidden value="0">




          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Asistencias</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $crearRodada = new ControladorAsistentes();
          $crearRodada -> ctrCrearAsistentes();
        ?>

       
      </form>

    </div>

  </div>
</div>

<?php

  $borrarAsistente = new ControladorAsistentes();
  $borrarAsistente -> ctrBorrarAsistente();

?> 
