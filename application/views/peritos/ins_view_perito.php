
<?php $atributos = array('id'=>'frm_ins_peritos','name'=>'frm_ins_peritos') ?>
<?php echo form_open('',$atributos);
        
    $txt_ins_exp_nrodocumento = array('name' => 'txt_ins_exp_nrodocumento', 'id' => 'txt_ins_exp_nrodocumento','minlength'=>'8','maxlength'=>'8','style' => 'width:150px','type' => 'text', 'class' =>'cajassearch', 'data-original-title' => 'Esriba el Documento', 'data-placement' => 'right','required' => 'required');     
    $boton = array('name' => 'btn_busca_persona', 'id'=>'btn_busca_persona' ,'type' => 'button', 'class'=>"btn btn-primary",'value' => 'Buscar', 'style' => 'margin-bottom:9px;');
    ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>peritos/jsPeritos.js"></script> 

<div style="width: 600px">
    <legend>Asignación de Remitente</legend> 
        <fieldset>
    <div class="control-group"> 
       
        <div class="controls">
            
                <select onchange="tipodocumento(this)" name="cbo_parametro_categoria" id="cbo_parametro_categoria" style="width:100px">
                    
                    <?php foreach ($TipoDocumento as $TipoDocumento) {
                        ?><option value="<?php echo $TipoDocumento->nParId ?>"><?php echo $TipoDocumento->cParDescripcion ?></option>
                    <?php } ?>
                </select>
            
            <?php echo form_input($txt_ins_exp_nrodocumento); ?>
             <?php echo form_input($boton); ?>
                
            </div>
            <span id="preload"></span>
        </div> 
        <div id="c_list_data_remitente" style="margin-top: 10px;"></div>
    
    </fieldset>
          <div id="c_frm_perito_ins"></div>

<?php echo form_close();?>
<?php echo validation_errors();?>
</div>