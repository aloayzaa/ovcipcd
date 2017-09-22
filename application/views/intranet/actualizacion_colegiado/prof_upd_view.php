<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    <br>
    <fieldset>    
    <?php if ($titulos > 0) { ?>  
					<div class="box">
						<div class="box-head">
							<h3>Formaci&oacute;n Profesional</h3>
							
						</div>
						<div class="box-content">
							<ul class="messages">
                                                            <?php 
                                                            $i = 1; 
                                                            foreach($titulos as $fila){ 
                                                             ?>
								<li class="user<?php echo $i;?>">
									<a href="#"><img src="../uploads/ruteo/usuario.png" alt="" width="50" height="50"></a>
									<div class="info">
										<span class="arrow"></span>
										<div class="detail">
											<span class="sender">
												<strong> <?php echo mb_convert_encoding($fila->razsocinsacad, "UTF-8"); ?></strong>
											</span>
											<span class="time">Fecha de T&iacute;tulo:  <?php echo mb_convert_encoding($fila->fectitcol, "UTF-8"); ?></span>
										</div>
										<div class="message">
                                                                                    <p><strong>Cap&iacute;tulo: </strong><?php echo mb_convert_encoding($fila->desccap, "UTF-8"); ?></p>
                                                                                    <p><strong>Nro Rectoral: </strong><?php echo mb_convert_encoding($fila->nrectoral, "UTF-8"); ?></p>
										</div>
									</div>
								</li>
                                                            <?php $i++; } ?>
								
							</ul>
						</div>
					</div>
				                               <?php
                            } else {
                                echo "No se encontraron datos registrados.";

                            }
                            ?> 
</fieldset><br></div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>