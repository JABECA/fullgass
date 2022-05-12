<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logofullgassoficial.png" class="img-responsive" style="padding:30px 100px 0px 100px">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="form-group has-feedback">
        <label>Tipo de usuario: </label><br>
        <input type="radio" name="ing_tipo_usuario" id="ing_tipo_usuario" value="Administrador">&nbsp;Administrador&nbsp;
        <input type="radio" name="ing_tipo_usuario" id="ing_tipo_usuario" value="Piloto">&nbsp;Piloto
       
      
      </div>

      <div class="row">
       
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

   <div class="login-logo">

    <img src="vistas/img/plantilla/sbk_fullgas2.jpg" class="img-responsive" style="padding: 5px 5px 5px 30px">

  </div>

</div>
