<script type="text/javascript" src='<?php echo URL_JS;?>miembrosperitos/jsBuscarPerito.js'></script>
<?php $atributos = array('id'=>'frm_ins_miembros','name'=>'frm_ins_miembros','class' => 'form-horizontal') ?>
    <?php echo form_open('miembrosperitos/miembrosperitos/miembrosIns',$atributos);

    $txt_perito_NroCip = array('name' => 'txt_perito_NroCip', 'id' => 'txt_perito_NroCip', 'style' => 'width:100px', 'maxlength' => '6', 'type' => 'text', 'class' => 'cajassearch', 'placeholder' => 'N° CIP', 'data-original-title' => 'Escriba el N° CIP', 'data-placement' => 'right','required' => 'required');
    $txt_perito_adscrito=array('name' => 'txt_perito_adscrito', 'id' => 'txt_perito_adscrito', 'style' => 'width:200px', 'maxlength' => '80','type'=>'text','class'=>'input-medium input-prepend tip','placeholder' => 'Lugar Adscrito');
    $txt_perito_datos_ins=array('name' => 'txt_perito_datos_ins', 'id' => 'txt_perito_datos_ins');
    $txt_perito_especialidad_ins=array('name' => 'txt_perito_especialidad_ins', 'id' => 'txt_perito_especialidad_ins');
    $txt_perito_direccion_ins=array('name' => 'txt_perito_direccion_ins', 'id' => 'txt_perito_direccion_ins');
    $txt_perito_contacto_ins=array('name' => 'txt_perito_contacto_ins', 'id' => 'txt_perito_contacto_ins');
    $txt_perito_email_ins=array('name' => 'txt_perito_email_ins', 'id' => 'txt_perito_email_ins');
    $txt_perito_emailsec_ins=array('name'=>'txt_perito_emailsec_ins','id'=>'txt_perito_emailsec_ins');
    $txt_perito_fecha_inscripcionfin  = array('name' => 'txt_perito_fecha_inscripcionfin', 'id' => 'txt_perito_fecha_inscripcionfin', 'style' => 'width:150px', 'class' => 'cajascalendar','placeholder' => 'Fecha Final', 'data-original-title' => 'Seleccione la fecha','required' => 'required','readonly'=>true);
    $botonsearch = array('name' => 'btn_search_per', 'id'=>'btn_search_per' ,'type' => 'button', 'value' => 'Buscar',  'class'=>"btn btn-primary");
    $boton = array('name' => 'btn_asig_per', 'id'=>'btn_asig_per' ,'class'=>'btn btn-danger','type' => 'submit', 'value' => 'Registrar Perito');

?>
       
<div style="width: 550px"> 

</br>
    <fieldset>
        <table>
            <tr>
                      
                <td style="vertical-align: top;padding-top: 7px;padding-right: 10px;"><label for="txt_perito_NroCip">Nro de CIP-CDLL</label></td>
                <td> <?php echo form_input($txt_perito_NroCip); ?> <?php echo form_input($botonsearch); ?></td>
                <td><span id="preload_regcol"> </span></td>
           
            </tr>
            
        </table>
        </br>
            <div id="Datos_Perito" style="display:none;">
                <center>
                <div class="row-fluid no-margin" style="margin:auto;width:50%;">
                        <div class="span12">
                            <ul class="quicktasks"> 
                                <li style="width: auto">
                                    <a href="#">
                                        <img alt="" src="<?php echo  URL_IMG_DASH; ?>icons/essen/32/user.png"> 
                                        <span class="amount">
                                        
                                            <label style="font-size:16px;font-weight:bolder" name="txt_nombre_completo" id="txt_nombre_completo"> </label>
                                            <label style="font-size:16px;font-weight:bold" name="txt_perito_Especialidad" id="txt_perito_Especialidad"> </label>
                                            <label style="font-size:16px; font-weight:bold" name="txt_perito_codigo" id="txt_perito_codigo"> </label>
                                            <?php echo form_input($txt_perito_fecha_inscripcionfin); ?>
                                        </span>
                                         <img id="img_adscrito" alt="" src="<?php echo  URL_IMG_DASH; ?>icons/essen/16/plus.png">
                                           <p>
                                         <div style="display: none;" id="Adscrito"  class="control-group">
                                             <center>
                                             <table>
                                                 
                                                 <td> <h4>Adscrito:&nbsp;</h4></td>
                                                 <td><?php echo form_input($txt_perito_adscrito); ?></td>
                                                 
                                             </table>
                                             </center>
                                         </div>
                                         
                                         <?php echo form_input($boton); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <div id="datos_perito" style="display: none">
                        
                     <?php echo form_input($txt_perito_datos_ins); ?>
                     <?php echo form_input($txt_perito_especialidad_ins); ?>
                     <?php echo form_input($txt_perito_direccion_ins); ?>
                     <?php echo form_input($txt_perito_contacto_ins); ?> 
                     <?php echo form_input($txt_perito_email_ins); ?>
                     <?php echo form_input($txt_perito_emailsec_ins);?>
                    </div>
                    
                    </br>
                    </div>
                   
                    </center>
      
            </div>       
    </fieldset>
    <?php echo form_close(); ?>
    <?php echo validation_errors(); ?>

</div>
    