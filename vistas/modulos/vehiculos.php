              <!--*******EVITA QUE UN USUARIO VULNERE LA URL ***** -->
<?php

  // if($_SESSION["perfil"] == "Operativo" || $_SESSION["perfil"] == "Ejecutivo"){
  //   echo '<script>window.location = "inicio";</script>';
  //   return;
  // }
  $idPiloto = $_SESSION['id'];
  $perfil = $_SESSION['perfil'];
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      <?php if ($perfil == 'Administrador') { ?>
         Administrar Vehiculos
        <?php }else{ ?>
          Vehiculos registrados
        <?php } ?>
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Vehiculos</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">


      <div class="box-header with-border">
        <?php if ($perfil == 'Administrador') { ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVehiculo">Agregar Vehiculo</button>
        <?php }else{ ?>
          <!-- <button class="btn btn-primary">Agregar Pagos</button> -->
        <?php } ?>
      </div>

       <!-- tabla que lista los usuarios -->
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width:5px">#</th>
              <th>Nombre Piloto</th>
              <th>Apellidos</th>
              <th>Marca</th>
              <th>Referencia</th>
              <th>Modelo</th>
              <th>Placa</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>

          <tbody>

          <!--************************************************************************************
            Creamos el objeto de php que nos traera la informacion del usuario de la base de datos
          ***************************************************************************************-->
          <?php

            if ($perfil == 'Piloto') {
              $item = 'id';
              $valor = $idPiloto;
              $vehiculos = ControladorVehiculos::ctrMostrarVehiculosPiloto($item, $valor );
            }else if($perfil == 'Administrador'){
              $item = null;
              $valor = null;
              $vehiculos = ControladorVehiculos::ctrMostrarVehiculos($item, $valor );
            }

           //var_dump($usuarios);
          foreach ($vehiculos as $key => $value) {
            # code...
            //var_dump($value["nombre"]);   <td>'.$value["id"].'</td>
            echo '
              <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombres"].'</td>
                  <td>'.$value["apellidos"].'</td>
                  <td>'.$value["marca"].'</td>
                  <td>'.$value["referencia"].'</td>
                  <td>'.$value["modelo"].'</td>
                  <td>'.$value["placa"].'</td>';

                  if ($value["estado"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnActivarVehiculo" idVehiculo = "'.$value["id"].'" estadoVehiculo= "0">Activado</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnActivarVehiculo" idVehiculo = "'.$value["id"].'" estadoVehiculo= "1">Desactivado</button></td>';
                  }

                 echo '
                  
                  <td>
                    <div class="btn-group">
                    
                    <button class="btn btn-warning btnEditarVehiculo" idVehiculo = "'.$value["id"].'" data-toggle="modal" data-target="#modalEditarVehiculo"><i class="fa fa-pencil">Editar</i></button>';

                    if ($perfil == 'Administrador') {
                      echo '
                         <button class="btn btn-danger btnEliminarVehiculo" idVehiculo = "'.$value["id"].'" ><i class="fa fa-times">Eliminar</i></button>
                      ';
                    }
                    echo '
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
VENTANA MODAL PARA AGREGAR USUARIO
******************************************-->
<!-- Modal -->
<div id="modalAgregarVehiculo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Vehiculo</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <select class="form-control input-lg Buscador" style="width: 100%;" type="tetx" name="nuevoPiloto" placeholder="IngresarPiloto" required>
                  <option value="">Selecccione Piloto</option>
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
            <!-- entrada para el  nombre de usuario -->
           
              
               

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevaMarca" placeholder="Ingresar Marca" required>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevaReferencia" placeholder="Ingresar referencia" required>
              </div>
            </div>

            <!-- entrada para el login de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoModelo"  placeholder="Ingresar modelo" required>
              </div>
            </div>

                <!-- entrada para el password del login del Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control input-lg" type="text" name="nuevaPlaca" placeholder="Ingresar placa" required>
              </div>
            </div>

        

           <input type="text" name="estado" id="estado" hidden value="0">




          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar vehiculo</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $crearVehiculo = new ControladorVehiculos();
          $crearVehiculo -> ctrCrearVehiculo();
        ?>

       
      </form>

    </div>

  </div>
</div>




<!--**************************************** 
VENTANA MODAL PARA EDITAR USUARIO
******************************************-->
<!-- Modal -->
<div id="modalEditarVehiculo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editr Vehiculo</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

       <input type="text" name="id_vehiculo" id="id_vehiculo" hidden>
      <input  type="text" name="editarPiloto" id="editarPiloto" hidden>
            

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="editarMarca" id="editarMarca" placeholder="Ingresar Marca" required>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="editarReferencia" id="editarReferencia" placeholder="Ingresar referencia" required>
              </div>
            </div>

            <!-- entrada para el login de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="tetx" name="editarModelo" id="editarModelo"  placeholder="Ingresar modelo" required>
              </div>
            </div>

                <!-- entrada para el password del login del Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control input-lg" type="text" name="editarPlaca" id="editarPlaca" placeholder="Ingresar placa" required>
              </div>
            </div>

        
          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar vehiculo</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $editarVehiculo = new ControladorVehiculos();
          $editarVehiculo -> ctrEditarVehiculo();
        ?>

       
      </form>

    </div>

  </div>
</div>


<?php

  $borrarVehiculo = new ControladorVehiculos();
  $borrarVehiculo -> ctrBorrarVehiculo();

?> 
