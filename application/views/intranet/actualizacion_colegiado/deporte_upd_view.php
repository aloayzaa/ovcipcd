<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
 function mostrarseleccion($sel){
     if($sel == 'S'){
         echo 'Si Pertenece';
     }else{
         echo 'No pertenece';
     }
     
}

 function mostrardominio($dep){
     if($dep == 'INT'){
         echo 'Intermedio';
     }else if($dep == 'AMA'){
         echo 'Amateur';
      }else if($dep == 'PRO'){
         echo 'Profesional';
      } 
}
?>
<script type="text/javascript">
	// - popover
	$(".pover").popover();
	$(".pover").click(function(e){
		e.preventDefault();
		if($(this).data('trigger') == "manual"){
			$(this).popover('toggle');
		}
	});
</script>


<div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
<br>
     <div align="right"> <a data-original-title="Agregar" href="#" class="btn btn-danger" onclick="AgregarDeporte(<?php echo $cip; ?>);return false;">+ Agregar Deporte</a>

         <div class="row-fluid">
                   <?php if ($deporte > 0) { ?>                 
       <div class="box">				
                        <div class="box-head">
							<h3>Lista de los Deportes del Colegiado</h3>
						</div>

						<div class="box-content box-nomargin">
							<ul class="gallery">
                                                            <?php                   
                                                                             foreach ($deporte as $fila) {
                                                            ?>
                                                           
								<li>
                                                                    <a href="#" onclick="MostrarDeporte(<?php echo $fila->coddep ?>);return false;" class='pover btn' data-placement="top" data-title="<?php echo $fila->descdep ?>" data-content="Dominio del Deporte:<?php echo mostrardominio($fila->dominiodep) ?><br>Seleccion: <?php echo mostrarseleccion($fila->seleccion) ?>"><img src="<?php echo URL_IMG; ?>dashboard/icons/deportes/<?php echo $fila->coddep ?>.png" width="100" height="100"></a>
								</li>
                                                             <?php
                                                                             }
                                                             ?>
						        </ul>
						</div>

</div>
                                <?php
                            } else {
echo "<br>";
                                echo "<h4>* No se encontraron deportes asignados a su persona.</h4>";

                            }
                            ?>
</div>

     </div></div>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>