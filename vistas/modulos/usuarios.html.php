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
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo Login</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Alejandro</td>
              <td>Alejo</td>
              <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Evaluado</td>
              <td><button class="btn btn-success btn-xs">Activo</button></td>
              <td>2018-10-31 12:00:00</td>
              
              <td>
                <div class="btn-group">
                
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                </div>
              </td>

            </tr>
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

      <form role="form" method="post" enctype="multipart/form-data">
        
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

             <!-- entrada para el cargo del Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoCargo" placeholder="Cargo que desempeña" required>
              </div>
            </div>

            <!-- entrada para el login de Usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="tetx" name="nuevoUsuario" placeholder="Ingresar usuario" required>
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
                  <option value="Especial">Especial</option>
                  <option value="Evaluado">Evaluado</option>
                  <option value="Evaluador">Evaluador</option>
                </select>
              </div>
            </div>

             <!-- entrada para la foto del Usuario -->
            <div class="form-group">
              <div class="panel">Subir Foto</div>
              <input type="file" name="nuevaFoto" id="nuevaFoto">
              <p class="help-block">Peso maximo de la foto 10 MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px">
            </div>



          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar usuario</button>
        
        </div>

      </form>

    </div>

  </div>
</div>