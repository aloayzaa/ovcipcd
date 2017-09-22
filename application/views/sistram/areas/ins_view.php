<?php
$atributosForm = array(
    'id' => 'frm_registrar_area', 
    'name' => 'frm_registrar_area', 
    'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$boton = form_submit('btn_ins_registrar',
        'Registrar',
        'id="btn_ins_registrar" class="btn btn-primary"');
?>

<div class="row-fluid">
    <div class="span12">
        <div class="box">
            <div class="box-head">
                <h3>Registro de Areas CIP-CDLL</h3>
            </div>
            <div class="box-content box-nomargin">
                    <div class="step" id="step1">
                        <ul class="steps">
                            <li class="active">
                              <span>Registro de Areas CIP-CDLL</span>
                            </li>
                        </ul>
                        <div class="control-group">  
                            <label class="control-label" for="txt_ins_nombre_cargo"><b>Nombre de Cargo:</b></label>
                            <div  class="controls">
                                <input name="txt_ins_nombre_cargo" id="txt_ins_nombre_cargo" type="text" class="input-medium input-prepend tip" data-original-title="Esriba Cargo" required='required'>
                            </div> 
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="txt_ins_area_descripcion"><b>Nombre de usuario</b></label>
                            <div class="controls">
                                    <select onchange="mostrar_usuarios()" name="cbo_usuarios_admin" id="cbo_usuarios_admin" class="chzn-select" >
                                        <option value="" selected>Seleccione Área</option>

                                        <?php foreach($usuarios as $usuario){?>
                                        <option value="<?php echo $usuario->ID ;?>"><?php echo $usuario->usuario; ?></option>
                                        <?php  } ?>
                                    </select> 
                            </div>    
                        </div>
                        
                        <div class="control-group">  
                            <label class="control-label" for="txt_fnd_persona"><b>Responsable del Área:</b></label>
                            <div  class="controls">
                                <br>
                                <div id="nombre_usuario" >
                                </div>
                            </div> 
                        </div> 
                            
                          <div id="div_btn"  class="control-group">  
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