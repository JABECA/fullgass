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
         Administrar Aportes
        <?php }else{ ?>
          Aportes realizados
        <?php } ?>
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Aportes</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">


      <div class="box-header with-border">
        <?php if ($perfil == 'Administrador') { ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPago">Agregar Aportes</button>
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
              <th>Enero</th>
              <th>Febrero</th>
              <th>Marzo</th>
              <th>Abril</th>
              <th>Mayo</th>
              <th>Junio</th>
              <th>Julio</th>
              <th>Agosto</th>
              <th>Septiembre</th>
              <th>Octubre</th>
              <th>Noviembre</th>
              <th>Diciembre</th>
              <th>Año</th>
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
            $pagos = ControladorPagos::ctrMostrarPagosPiloto($item, $valor );
          }else if($perfil == 'Administrador'){
            $item = null;
            $valor = null;
            $pagos = ControladorPagos::ctrMostrarPagos($item, $valor );
          }
          // $pagos = ControladorPagos::ctrMostrarPagos($item, $valor );
          //$pagos = ControladorPagos::ctrMostrarPagosPiloto($item, $valor );

          foreach ($pagos as $key => $value) {
            # code...
            //var_dump($value["nombre"]);   <td>'.$value["id"].'</td>
            echo '
              <tr>
                  <td>'.($key+1).'</td>

                  <td>'.$value["nombres"].'</td>

                  <td>'.$value["apellidos"].'</td>';


                  if ($value["enero"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "enero" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago="enero" perfil = "'.$perfil.'">Debe</button></td>';
                  }


                  if ($value["febrero"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "febrero" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "febrero" perfil = "'.$perfil.'">Debe</button></td>';
                  }

                  if ($value["marzo"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "marzo" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "marzo" perfil = "'.$perfil.'">Debe</button></td>';
                  }

                  if ($value["abril"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "abril" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "abril" perfil = "'.$perfil.'">Debe</button></td>';
                  }

                  if ($value["mayo"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "mayo" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "mayo" perfil = "'.$perfil.'">Debe</button></td>';
                  }

                  if ($value["junio"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "junio" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "junio" perfil = "'.$perfil.'">Debe</button></td>';
                  }

                  if ($value["julio"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "julio" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "julio" perfil = "'.$perfil.'">Debe</button></td>';
                  }

                  if ($value["agosto"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "agosto" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "agosto" perfil = "'.$perfil.'">Debe</button></td>';
                  }


                  if ($value["septiembre"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "septiembre" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "septiembre" perfil = "'.$perfil.'">Debe</button></td>';
                  }


                  if ($value["octubre"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "octubre" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "octubre" perfil = "'.$perfil.'">Debe</button></td>';
                  }


                  if ($value["noviembre"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "noviembre" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "noviembre" perfil = "'.$perfil.'">Debe</button></td>';
                  }


                  if ($value["diciembre"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "0" mesPago= "diciembre" perfil = "'.$perfil.'">Pago</button></td>';

                  }else{
                    echo '<td><button class="btn btn-danger btn-xs  btnPagoMes" idPago = "'.$value["id"].'" estadoPago= "1" mesPago= "diciembre" perfil = "'.$perfil.'">Debe</button></td>';
                  }
                


                  echo '
                

                  <td>'.$value["year"].'</td>
                 
               </tr>

            ';
          }

          ?>
        
          </tbody>
          

        </table>
      </div>
      <div>
           <a href="https://api.whatsapp.com/send?phone=+57 3112716976&text=Hola, Nececito mas informacion!" class="small-box-footer">Mas Informacion: Diana Maria Aleman<i class="fa fa-whatsapp"></i></a>
      </div>
      

      <!-- /.box-body -->

    </div>
    <!-- fin div box -->

  </section>
  <!-- fin seccion content -->
</div>
<!-- /.content-wrapper -->


<div id="modalAgregarPago" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
        
        <div class="modal-header" style="background: #3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Aporte</h4>
        </div>
        
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <select class="form-control input-lg Buscador" style="width: 100%;" type="text" name="id_piloto" placeholder="IngresarPiloto" required>
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

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <select class="form-control input-lg Buscador" name="year">
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                </select>
                
              </div>
            </div>

         
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="enero" placeholder="Pago Enero" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="febrero" placeholder="Pago febrero" required>
              </div>
             </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="marzo" placeholder="Pago Marzo" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="abril" placeholder="Pago Abril" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="mayo" placeholder="Pago Mayo" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="junio" placeholder="Pago Junio" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="julio" placeholder="Pago Julio" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="agosto" placeholder="Pago Agosto" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="septiembre" placeholder="Pago Septiembre" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="octubre" placeholder="Pago Octubre" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="noviembre" placeholder="Pago Noviembre" required>
              </div>
            </div>
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <input class="form-control input-lg" type="text" name="diciembre" placeholder="Pago Diciembre" required>
              </div>
            </div>


   

          </div>
        </div>
        <!-- fin cuerpo del modal -->

        <!-- pie del modal -->  
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Aporte</button>
        
        </div>

        <!-- crreamos objeto de php para poder ejecutar el metodo que permite guardar nivel -->
        <?php        
          $crearPago = new ControladorPagos();
          $crearPago -> ctrCrearPago();
        ?>

       
      </form>

    </div>

  </div>
</div>

