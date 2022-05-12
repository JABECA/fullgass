<?php
    $numPilotos = ModeloPilotos::mdlContarPilotos();
    $proximaRodada = ModeloRodadas::mdlMostrarProximaRodada();
    $proximaRodadas = ModeloRodadas::mdlMostrarProximaRodadas();

    $clases = array('small-box bg-blue',  //0
                    'small-box bg-green', //1
                    'small-box bg-teal',  //2
                    'small-box bg-purple', //3
                    'small-box bg-aqua',   //4
                    'small-box bg-gray',   //5
                    'small-box bg-fuchsia',//6
                    'small-box bg-navy',    //7
                    'small-box bg-olive',   //8
                    'small-box bg-lime',    //9
                   );

?>

<!-- Caja 1 -->
<?php foreach ($proximaRodadas as $key => $value): ?>
    <?php $contador = $key+1 ?>
    <div class="col-lg-3 col-xs-6">
        <div class="<?php echo $clases[$key] ?>">
            <div class="inner">
                <p>Rodada: <?php echo $contador; ?>  </p>
               <h6>Fecha: <?php echo  ($value['fecha']); ?></h6>
               <h6>Ruta:  <?php echo  ($value['ruta']); ?></h6>
               <h6>Lugar: <?php echo  ($value['lugar']); ?></h6>
            </div>
            
            <div class="icon">
                <i class="fa fa-road"></i>
            </div>
          
        <a href="https://api.whatsapp.com/send?phone=+57 3234474011&text=Hola, Nececito mas informacion!" class="small-box-footer">Info: Jhony<i class="fa fa-whatsapp"></i></a>
        <a href="https://api.whatsapp.com/send?phone=+57 3145716480&text=Hola, Nececito mas informacion!" class="small-box-footer">Info: Alejandro<i class="fa fa-whatsapp"></i></a>
        <a href="https://api.whatsapp.com/send?phone=+57 3137794686&text=Hola, Nececito mas informacion!" class="small-box-footer">Info: Yamid<i class="fa fa-whatsapp"></i></a>
    </div>
    
</div>
<?php endforeach ?>









      