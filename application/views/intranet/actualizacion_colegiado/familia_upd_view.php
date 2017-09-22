<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
function Imprimevf($estado){
    if($estado == 'V'){
        echo 'Vivo';
    }else{
        echo 'Fallecido';
    }
}
function Parentesco($parentesco){
    if($parentesco == 'P'){
        echo 'Padre';
    }elseif($parentesco == 'M'){
        echo 'Madre';
    }elseif($parentesco == 'E'){
        echo 'Esposo(a)';
    }elseif($parentesco == 'H'){
        echo 'Hijo(a)';
    }
}

?>
<div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
<br>
     <div class="row-fluid">
         <div align="right"> <a data-original-title="Agregar" href="#" class="btn btn-primary" onclick="AgregarFamiliar(<?php echo $cip; ?>);return false;">+ Agregar Familiar</a>
										 </div>
          <?php if ($familia > 0) { ?>  
					<div class="box">
						<div class="box-head tabs">
							<h3>Tabla de Contenido de Familia</h3>
						</div>
						<div class="box-content box-nomargin">
							<table class='table table-striped dataTable dataTable-noheader dataTable-nofooter table-bordered'>
								<thead>
									<tr>
										
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Nombres</th>
                                                                                <th>Nacimiento</th>
                                                                                <th>Parentesco</th>
										<th>Situacion</th>
                                                                                <th>Opciones</th>
									</tr>
								</thead>
								<tbody>
                                                                    
									<?php                   
                                                                             foreach ($familia as $fila) {
                                                                         ?>
                                                                    <tr>
                                                                             <td><?php echo $fila->apepatfam ?></td>
                                                                            <td><?php echo $fila->apematfam ?></td>
                                                                            <td><?php echo $fila->nomfam ?></td>
                                                                            <td><?php echo $fila->fecnacfam ?></td>
                                                                             <td><?php Parentesco($fila->parentesco) ?></td>
                                                                            <td><?php Imprimevf($fila->estadovf) ?></td>
                                                                           
                                                                            <td><div class="btn-group">                
                                                                                <a data-original-title="Show" href="#" class="btn btn-mini tip" onclick="MostrarFamiliar(<?php echo $fila->idfam ?>,<?php echo $cip; ?>);return false;"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/edit.png" alt=""></a>
										<?php if($fila->parentesco != 'P' && $fila->parentesco != 'M'){ ?>
                                                                                <a data-original-title="Remove" href="#" class="btn btn-mini tip" onclick="EliminarFamiliar(<?php echo $fila->idfam ?>);return false;"><img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/cross.png" alt=""></a>
										<?php }else{ ?>	
                                                                                <a data-original-title="Remove" href="#" class="btn btn-mini tip"><img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/slash.png" alt=""></a>
										
                                                                                <?php } ?>
                                                                                </div>
                                                                            </td>
                                                                         </tr>
                                                                          <?php
                                                                             }
                                                                         ?>
								</tbody>
							</table>
						</div>
                                              
					</div>
                                         <?php
                            } else {
echo "<br>";
                                echo "<h4>* No se encontraron familiares registrados.</h4>";

                            }
                            ?>
         <div align="left">
             <p>&nbsp;</p><p>-Solo podras agregar un maximo de 5 hijos*</p>
         </div>
			</div>
		</div>	
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>