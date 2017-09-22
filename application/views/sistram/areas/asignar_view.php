<script type="text/javascript" src='<?php echo URL_JS;?>sistram/areas/jsAreasAsig.js'></script>  

<?php
$atributosForm = array(
    'id' => 'frm_asignar_responsable', 
    'name' => 'frm_asignar_responsable', 
    'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$boton = form_submit('btn_ins_asignar',
        'Asignar',
        'id="btn_ins_asignar" class="btn btn-primary"');

?>

<div class="row-fluid">
    <div class="span12">
                  
      
                  
                <br><br>                       
                                     
                         
                        <input type="hidden" value="<?php echo $nAreasId?>" name="hid_asig_nAreasId" id="hid_asig_nAreasId">
                      
                    
                        <div style="margin-left:0px;" class="controls">
                                    <label class="control-label" for="txt_ins_area_descripcion"><b>Responsable: </b></label>
                
                                    <select style=" margin-left: -80px;"  name="cbo_usuarios_admin_upd" id="cbo_usuarios_admin_upd" class="chzn-select" >
                                        <option value="" selected>Seleccione un Nombre</option>

                                        <?php foreach($usuarios as $usuario){?>
                                        <option value="<?php echo $usuario->nombres ;?>"><?php echo $usuario->nombres; ?></option>
                                        <?php  } ?>
                                    </select>
                                    <div style="  display: inline-block; margin-left: 16px;margin-top: -16px;" id="nombre_usuario_upd"></div>
                        </div>
                        <br>  
                        <div  id="div_btn_asig" class="control-group">  
                            <div style="margin-left:140px;" class="controls">
                               <?php echo $boton; ?>
                                <br>
                                 <div id="preload_registrarasig" >
                                  
                                    </div> 
                            </div>
                              
                        </div>
                      
                   
    
    </div>
        
    <div id="div_responsables"> <?php $this->load->view('sistram/areas/responsables_view');?> </div>
                      
            
    
    
    
    
</div>

    <?php echo form_close(); ?>