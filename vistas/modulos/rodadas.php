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
      
      Administrar rodadas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar rodadas</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">


      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRodada">Agregar rodada</button>
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
              <th>Observaciones</th>
              <th>Estado</th>
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

          $rodadas = ControladorRodadas::ctrMostrarRodadas($item, $valor );
        
          foreach ($rodadas as $key => $value) {
            # code...
            //var_dump($value["nombre"]);   <td>'.$value["id"].'</td>
            echo '
              <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["ruta"].'</td>
                  <td>'.$value["lugar"].'</td>
                  <td>'.$value["fecha"].'</td>
                  <td>'.$value["observaciones"].'</td>';

                  if ($value["estado"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnActivarRodada" idRodada = "'.$value["id"].'" estadoRodada= "0"> Realizada</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnActivarRodada" idRodada = "'.$value["id"].'" estadoRodada= "1">No Realizada</button></td>';
                  }

                 echo '
                  
                  <td>
                    <div class="btn-group">
                    
                    <button class="btn btn-warning btnEditarRodada" idRodada = "'.$value["id"].'" data-toggle="modal" data-target="#modalEditarRodada"><i class="fa fa-pencil">Editar</i></button>

                    <button class="btn btn-danger btnEliminarRodada" idRodada = "'.$value["id"].'" ><i class="fa fa-times">Eliminar</i></button>

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
VENTANA MODAL PARA AGREGAR RODADA
******************************************-->
<!-- Modal -->
<div id="modalAgregarRodada" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Rodada</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- entrada para el  nombre de usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevaRuta" placeholder="Ingresar ruta" required>
              </div>
            </div>

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="nuevoLugar" placeholder="Ingresar lugar de reunion" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="date" name="nuevaFecha" placeholder="Ingresar fecha de la rodada" required>
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
           <input type="text" name="usr_crea" id="usr_crea" hidden value="<?php echo $_SESSION['id'] ?>">




          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Rodada</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $crearRodada = new ControladorRodadas();
          $crearRodada -> ctrCrearRodada();
        ?>

       
      </form>

    </div>

  </div>
</div>




<!--**************************************** 
VENTANA MODAL PARA EDITAR RODADA
******************************************-->
<!-- Modal -->
<div id="modalEditarRodada" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Rodada</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- Entrada para la ruta realizada o a realizar en la rodada -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" id="editarRuta" name="editarRuta" required>
              </div>
            </div>

            <!-- Entrada para editar el lugar de reunion de la rodada -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" id="editarLugar" name="editarLugar" required>
              </div>
            </div>

            <!-- Entrada para las observaciones de la rodada -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="editarObs" id="editarObs" required>
              </div>
            </div>

          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <input type="hidden" name="idRodada" id="idRodada">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Rodada</button>
        
        </div>

        <?php

            $editarRodada = new ControladorRodadas();
            $editarRodada -> ctrEditarRodada();

        ?>

      </form>

    </div>

  </div>
</div>


<?php

  $borrarRodada = new ControladorRodadas();
  $borrarRodada -> ctrBorrarRodada();

?> 
