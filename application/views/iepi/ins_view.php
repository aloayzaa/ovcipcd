<?php
$atributosForm = array('id' => 'frm_registrar_inscripcion', 'name' => 'frm_registrar_inscripcion', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$boton = form_submit('btn_ins_registrar', 'Registra Inscripcion', 'id="btn_ins_registrar" class="btn btn-primary"');
?>

<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head">
                <h3>Registro Matricula IEPI - CIP-CDLL</h3>
            </div>
            <div class="box-content box-nomargin">
                    <div class="step" id="step1">
                        <ul class="steps">
                            <li class="active">
                                PASO 1
                                <span>Inscripcion de Cursos-Diplomados IEPI CIP-CDLL</span>
                            </li>
                        </ul>
                        <div class="control-group">  
                            <label class="control-label" for="c_cbo_evento_listar"><b>Lista de Cursos:</b></label>
                            <div class="controls">
                                
                                <div id="c_cbo_evento_listar">
                                    
                                    
                                </div>
                            </div>                              
                        </div>
                       
                        <div class="control-group">  
                            <label class="control-label" for="txt_fnd_persona"><b>Buscar Persona:</b></label>
                            <div class="controls">
                                <div style="float:left;margin-top:0;">    
                                    <?php echo form_input(array('name' => 'txt_nrodni', 'id' => 'txt_nrodni', 'type' => 'text', 'required' => 'required', 'class' => 'input-medium cajassearch', 'style' => 'margin-bottom:9px;', 'maxlength' => '8')); ?>
                                    <?php echo form_button(array('name' => 'btn_busca_persona', 'id' => 'btn_busca_persona', 'type' => 'button', 'class' => 'btn btn-danger', 'content' => 'Buscar', 'style' => 'margin-bottom:9px;')); ?>
                                </div>
                                <span id="preload" style="margin-top:10px;"></span>
                            </div> 
                        </div> 

                        <div id="msj_custom" class="box-content" style="display:none;">
                        </div> 
                        <div id="info_persona" name="info_persona"> 
                        </div>
                      <!--  <div class="control-group">
                                <label class="control-label" for="c_cbo_evento_listar"><b>Tipo Certificado: </b></label>
                                <div class="controls" id="c_cbo_evento_listar">
                                    <select name='tipoCertificado' id='tipoCertificado' >
                                         <option value="Al">Alumno </option>
                                         <option value="Doc">Docente </option>
                                             
                                     </select>
                                </div>
                           
                        </div>   -->
                        <div class="control-group">
                             <label class="control-label" for="c_cbo_evento_listar"><b>Nota</b></label>
                             <div class="controls">
                              <?php echo form_input(array('name' => 'txt_nota', 'id' => 'txt_nota', 'type' => 'text', 'style' => 'margin-bottom:9px;')); ?>
                             </div>    
                        </div>
                            
                          <div class="control-group">  
                            <div class="controls">
                               <?php echo $boton; ?>
                                <div id="preload_registrar" >
                                  
                               </div>
                            </div>
                              
                         </div>
                      
                    </div>
            </div>
        </div>
    </div>
</div>

    <?php echo form_close(); ?>