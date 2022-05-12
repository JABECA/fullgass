<div class="content-wrapper">
  <section class="content-header">
    <h1>Tablero
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>
    </ol>
  </section>
    
  <section class="content">
       <!-- Fila 1 -->
      <div class="row">
          <?php
            include ('inicio/proximas_rodadas.php');
          ?>  
      </div>
     
        <!-- Fila 2 -->
      <div class="row">
          <?php
            include ('inicio/info_general.php');
          ?>  
      </div>

  </section>
</div>
