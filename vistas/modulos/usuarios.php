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
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">


      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>

      </div>

       <!-- tabla que lista los usuarios -->
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
            <tr>
              <th style="width:5px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Identificacion</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>

          <tbody>

          <!--************************************************************************************
            Creamos el objeto de php que nos traera la informacion del usuario de la base de datos
          ***************************************************************************************-->
          <?php

          $item = null;
          $valor = null;

          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor );
        
          //var_dump($usuarios);
          foreach ($usuarios as $key => $value) {
            # code...
            //var_dump($value["nombre"]);   <td>'.$value["id"].'</td>
            echo '
              <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>
                  <td>'.$value["identificacion"].'</td>';


                  if ($value["foto"] != "") {
                    # code...
                    echo ' <td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                  }else{
                     echo ' <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                  }

                 echo '
                  <td>'.$value["perfil"].'</td>';

                  if ($value["estado"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario = "'.$value["id"].'" estadoUsuario= "0">Activado</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnActivar" idUsuario = "'.$value["id"].'" estadoUsuario= "1">Desactivado</button></td>';
                  }

                 echo '
                  
                  <td>
                    <div class="btn-group">
                    
                    <button class="btn btn-warning btnEditarUsuario" idUsuario = "'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil">Editar</i></button>

                    <button class="btn btn-danger btnEliminarUsuario" idUsuario = "'.$value["id"].'" fotoUsuario = "'.$value["foto"].'" usuario = "'.$value["usuario"].'"><i class="fa fa-times">Eliminar</i></button>

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
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- entrada para el  nombre de usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoNombre" placeholder="Ingresar Nombre" required>
              </div>
            </div>

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevaCedula" placeholder="Ingresar identificacion" required>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoTelefono" placeholder="Ingresar telefono" required>
              </div>
            </div>

            <!-- entrada para el login de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar usuario" required>
              </div>
            </div>

                <!-- entrada para el password del login del Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control input-lg" type="password" name="nuevoPassword" placeholder="Ingresar contraseña" required>
              </div>
            </div>

             <!-- entrada para el perfil de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                <!-- <input class="form-control input-lg" type="tetx" name="nuevoPerfil" placeholder="Ingresar perfil de usuario" required> -->
                <select class="form-control input-lg" name="nuevoPerfil">
                  <option value="">Seleccione un perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Cacique">Cacique</option>
                  <option value="Lider">Lider</option>
                  <option value="Cordinador">Cordinador</option>
                  <option value="Piloto" selected="">Piloto</option>
                </select>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoContacto" placeholder="Ingresar nombre de un contacto" required>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoTelefonoContacto" placeholder="Ingresar telefono del contacto" required>
              </div>
            </div>


             <!-- entrada para la foto del Usuario -->
            <div class="form-group">
              <div class="panel">Subir Foto</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto" >
              <p class="help-block">Peso maximo de la foto 2 MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>



           <input type="tetx" name="estado" id="estado" hidden value="0">




          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();
        ?>

       
      </form>

    </div>

  </div>
</div>




<!--**************************************** 
VENTANA MODAL PARA EDITAR USUARIO
******************************************-->
<!-- Modal -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- entrada para el  nombre de usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" id="editarNombre" name="editarNombre" required>
              </div>
            </div>

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" id="editarCedula" name="editarCedula" required>
              </div>
            </div>

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="editarTelefono" id="editarTelefono"  placeholder="Ingresar telefono" required>
              </div>
            </div>

              <!-- entrada para el login de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="tetx" id="editarUsuario" name="editarUsuario" required readonly="">
              </div>
            </div>

                <!-- entrada para el password del login del Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control input-lg" type="password" name="editarPassword" id="editarPassword" placeholder="Escriba la nueva contraseña" >
                <!-- envio campo de password oculto por si el usuario no lo cambia -->
                 <input type="hidden" id="passwordActual" name="passwordActual"> 
              </div>
            </div>

   <!-- entrada para el perfil de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                <!-- <input class="form-control input-lg" type="tetx" name="nuevoPerfil" placeholder="Ingresar perfil de usuario" required> -->
                <select class="form-control input-lg" name="editarPerfil">
                  <option value="">Seleccione un perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Cacique">Cacique</option>
                  <option value="Lider">Lider</option>
                  <option value="Cordinador">Cordinador</option>
                  <option value="Piloto" >Piloto</option>
                </select>
              </div>
            </div>

                <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="editarContacto" id="editarContacto" placeholder="Ingresar nombre de un contacto" required>
              </div>
            </div>

            <!-- entrada para la cedula o identificacion de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="tetx" name="editarTelefonoContacto" id="editarTelefonoContacto" placeholder="Ingresar telefono del contacto" required>
              </div>
            </div>

             <!-- entrada para la foto del Usuario -->
            <div class="form-group">
              <div class="panel">Subir Foto</div>
              <input type="file" class="nuevaFoto" name="editarFoto" >
              <p class="help-block">Peso maximo de la foto 2 MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

           <input type="hidden" name="id_User" id="id_User">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>
        
        </div>

        <?php

            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();

        ?>

         <input type="tetx" name="calificado" id="calificado" hidden value="no">

      </form>

    </div>

  </div>
</div>


<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 
