<?php
$numPilotos = ModeloPilotos::mdlContarPilotos();
$PilotosCumpleaños = ModeloPilotos::mdlMostrarCumpleaños();

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

 date_default_timezone_set("America/Bogota");

    // $fecha_actual = strtotime(date("20-07-Y")); //30-04-2022 
    $fecha_actual = strtotime(date("d-m-Y")); //30-04-2022 
    $fechaCumple = strtotime(date("19-07-Y")); //19-07-2022 

    if ($fecha_actual > $fechaCumple) {
        $proximoYear = date("Y")+1;
        $fechaCumple = date("19-07-$proximoYear");
        $diasRestantes = dias_restantes($fechaCumple);  
    }else{
        $fechaCumple = date("19-07-Y");
        $diasRestantes = dias_restantes($fechaCumple);  
    }
    
    function dias_restantes($fechaCumple) {  
        // $fecha_actual = date("2022-07-20"); 
        $fecha_actual = date("Y-m-d");  
        $s = strtotime($fechaCumple)-strtotime($fecha_actual);  
        $d = intval($s/86400);  
        $diferencia = $d;  
        return $diferencia;  
    }

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
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
        <div class="inner">
            <p>Pilotos Registrados</p>
           <h4><?php echo  number_format($numPilotos['total']); ?></h4>
         </div>
        <div class="icon">
            <i class="fa fa-motorcycle"></i>
        </div>
            <a href="#" class="small-box-footer">Más Informacíon <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- Caja 2 -->
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-purple">
        <div class="inner">
            <p>% de asistencia Mensual</p>
           <h4>coming soon</h4>
         </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
            <a href="#" class="small-box-footer">Más Informacíon <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- Caja 3 -->
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-purple">
        <div class="inner">
            <p>Dias restantes Aniversario</p>
           <h4><?php echo $diasRestantes; ?></h4>
         </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
            <a href="#" class="small-box-footer">Más Informacíon <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- <?php foreach ($PilotosCumpleaños as $key => $value): ?>
    <?php $contador = $key+1 ?>
    <div class="col-lg-3 col-xs-6">
    	<div class="<?php echo $clases[$key] ?>">
	        <div class="inner">
	           <p>Feliz Cumpleaños:</p>
	           <h6><?php echo  ($value['nombres'].' '.$value['apellidos']); ?></h6>
	         </div>
	        <div class="icon">
	            <i class="fa fa-birthday-cake"></i>
	        </div>
	            <a href="#" class="small-box-footer">Más Informacíon <i class="fa fa-arrow-circle-right"></i></a>
   		</div>
	</div>
<?php endforeach ?>
 -->


 <div class="col-lg-3 col-xs-6">
    	<div class="small-box bg-teal">
	        <div class="inner">
	           <p>Feliz Cumpleaños:</p>
	           <?php 
               if (sizeof($PilotosCumpleaños) > 0) {
                  
                       echo "<h6>Feliz Cumpleaños a: </h6>";
                   
               }else{
                        echo "<h4>Ningun integrante cumple años hoy</h4>";
               }
               ?>
	         </div>
	        <div class="icon">
	            <i class="fa fa-birthday-cake"></i>
	        </div>
	            <a href="#" class="small-box-footer">Más Informacíon <i class="fa fa-arrow-circle-right"></i></a>
   		</div>
</div>







