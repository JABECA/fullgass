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
          Administrar Pilotos
        <?php }else{ ?>
          Mis datos personales
        <?php } ?>
     
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Pilotos</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">


      <div class="box-header with-border">
        <?php if ($perfil == 'Administrador') { ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPiloto">Agregar Piloto</button>
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
              <th>Nombres</th>
              <th>C.C</th>
              <th>Fecha Nacimiento</th>
              <th>Telefono</th>
              <th>Contacto</th>
              <th>Tel. Contacto</th>
              <th>Fecha Ingreso</th>              
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
            $pilotos = ControladorPilotos::ctrMostrarPiloto($item, $valor );
          }else if($perfil == 'Administrador'){
            $item = null;
            $valor = null;
            $pilotos = ControladorPilotos::ctrMostrarPilotos($item, $valor );
          }

          foreach ($pilotos as $key => $value) {
            # code...
            //var_dump($value["nombre"]);   <td>'.$value["id"].'</td>
            echo '
              <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombres"].' '.$value["apellidos"].'</td>
                  <td>'.$value["numeroIdentificacion"].'</td>
                  <td>'.$value["fecha_nacimiento"].'</td>
                  <td>'.$value["telefono"].'</td>
                  <td>'.$value["nombre_contacto"].'</td>
                  <td>'.$value["numero_contacto"].'</td>
                  <td>'.$value["fecha_ingreso"].'</td>

                  ';

                
                  if ($value["estado"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnActivarPiloto" idPiloto = "'.$value["id"].'" estadoPiloto= "0" perfil= "'.$perfil.'">Activado</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnActivarPiloto" idPiloto = "'.$value["id"].'" estadoPiloto= "1" perfil= "'.$perfil.'">Desactivado</button></td>';
                  }

                 echo '
                  <td>
                    <div class="btn-group">
                    
                    <button class="btn btn-warning btnEditarPiloto" idPiloto = "'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPiloto"><i class="fa fa-pencil"></i></button>';
                   
                    if ($perfil == 'Administrador') {
                      echo '
                        <button class="btn btn-danger btnEliminarPiloto" idPiloto = "'.$value["id"].'" ><i class="fa fa-times"></i></button>
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
VENTANA MODAL PARA AGREGAR PILOTO
******************************************-->
<!-- Modal -->
<div id="modalAgregarPiloto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Piloto</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- entrada para el  nombre de usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="tetx" name="nombres" id='nombres' placeholder="Ingresar Nombres" required>
              </div>
            </div>

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="apellidos" placeholder="Ingresar apellidos" required>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Piloto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="numeroIdentificacion" id="numeroIdentificacion" placeholder="Ingresar identificacion" required>
              </div>
            </div>

                  <!-- entrada para la fecha de necimiento de Piloto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg"  type="text" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento del Piloto" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
            </div>


                <!-- entrada para la cedula o identificacion de Piloto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="telefono" placeholder="Ingresar telefono del piloto" required>
              </div>
            </div>

                <!-- entrada para el contacto de Piloto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nombre_contacto" id="nombre_contacto" placeholder="nombre del contacto o familiar del piloto" required>
              </div>
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="number" name="numero_contacto" id="numero_contacto" placeholder="numero celular o fijo del contacto" required>
              </div>
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="date" name="fecha_ingreso" id="fecha_ingreso" placeholder="fecha de ingreso al club" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="usuario" id="usuario" placeholder="usuario login" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="nuevoPassword" id="nuevoPassword" placeholder="password/contraseña" required>
              </div>
            </div>


           <input type="tetx" name="estado" id="estado" hidden value="0">




          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Piloto</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $crearPiloto = new ControladorPilotos();
          $crearPiloto -> ctrCrearPiloto();
        ?>

       
      </form>

    </div>

  </div>
</div>




<!--**************************************** 
VENTANA MODAL PARA EDITAR USUARIO
******************************************-->
<!-- Modal -->
<div id="modalEditarPiloto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Piloto</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- entrada para el  nombre de usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" id="editarNombres" name="editarNombres" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" id="editarApellidos" name="editarApellidos" required>
              </div>
            </div>
            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" id="editarIdentificacion" name="editarIdentificacion" required>
              </div>
            </div>

                   <!-- entrada para la fecha de necimiento de Piloto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg"  type="text" name="editar_fecha_nacimiento" id="editar_fecha_nacimiento" placeholder="Fecha de Nacimiento del Piloto" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
            </div>


             <!-- entrada para el cargo del Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                <input class="form-control input-lg" type="text" id="editarTelefono" name="editarTelefono" required>
              </div>
            </div>

                   <!-- entrada para el contacto de Piloto -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="editar_nombre_contacto" id="editar_nombre_contacto" placeholder="nombre del contacto o familiar del piloto" required>
              </div>
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="number" name="editar_numero_contacto" id="editar_numero_contacto" placeholder="numero celular o fijo del contacto" required>
              </div>
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="date" name="editar_fecha_ingreso" id="editar_fecha_ingreso" placeholder="fecha de ingreso al club" required>
              </div>
            </div>

             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="editarUsuario" id="editarUsuario" placeholder="usuario login" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="editarPassword" id="editarPassword" placeholder="password/contraseña" required>
                <input type="hidden" id="passwordActual" name="passwordActual"> 
              </div>
            </div>

            <input class="form-control input-lg" type="hidden" id="idPiloto" name="idPiloto" readonly="">

         

          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Piloto</button>
        
        </div>

        <?php

            $editarPiloto = new Controladorpilotos();
            $editarPiloto -> ctrEditarPiloto();

        ?>

       

      </form>

    </div>

  </div>
</div>


<?php

  $borrarPiloto = new ControladorPilotos();
  $borrarPiloto -> ctrBorrarPiloto();

?> 
