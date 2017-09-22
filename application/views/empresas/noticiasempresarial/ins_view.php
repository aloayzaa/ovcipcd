
<?php
$atributosForm = array('id' => 'frm_ins_noticiasempresarial', 'name' => 'frm_ins_noticiasempresarial', 'class' => 'form-horizontal');
echo form_open('empresas/noticiasempresariales/NoticiasEmpresarialIns', $atributosForm);

$txt_ins_notempre_fecha = array('name' => 'txt_ins_notempre_fecha', 'id' => 'txt_ins_notempre_fecha', 'class' => 'cajascalendar','required' => 'required');
$txt_ins_notempre_titulo = array('name' => 'txt_ins_notempre_titulo', 'id' => 'txt_ins_notempre_titulo', 'maxlength' => '500' ,"style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip','data-original-title' => 'Esriba su Titulo', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_notempre_sumilla = array('name' => 'txt_ins_notempre_sumilla', 'id' => 'txt_ins_notempre_sumilla', 'maxlength' => '500' ,"style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip','data-original-title' => 'Esriba su Sumilla', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_notempre_contenido = array('name' => 'txt_ins_notempre_contenido', 'id' => 'txt_ins_notempre_contenido', "cols" => "95", "rows" => "10", 'required' => 'required');
$boton = array('name' => 'btn_ins_notempre', 'type' => 'submit', 'value' => 'Registrar Noticia Empresarial', 'id="btn_ins_notempre" class="btn btn-primary"');

$nTNotDescripcion['']='Seleccione una Opcion';
foreach ($TNoticias as $TNoticias){
    $nTNotDescripcion[$TNoticias->nTNotCodigo]=$TNoticias->nTNotDescripcion;
}

?>
<style type="text/css">
.ocultardiv{
   display:none;
}
</style>
<div style="width: 700px"> 
    <legend>Registrar Noticia Emprerarial Nueva</legend> 
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="txt_ins_notempre_fecha">Fecha:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_notempre_fecha); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_notempre_titulo">Titulo:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_notempre_titulo); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_notempre_sumilla">Sumilla:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_notempre_sumilla); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cbo_tnoticia">Tipo Noticia: </label>
            <div class="controls">
                  <?php echo form_dropdown('cbo_tnoticia',$nTNotDescripcion,''
                    ,'id="cbo_tnoticia" class="input-medium tip" 
                        style="width:260px;" required="required" 
                        data-original-title="Selecciona una opcion" data-placement="right"')
                ?>
            </div>
        </div>
         <div id="div_evento" class="control-group ocultardiv">
            <label class="control-label" for="cbo_ins_notempre_evento">Evento: </label>
            <div  class="controls">
                <select id="cbo_ins_notempre_evento" name="cbo_ins_notempre_evento" class="chzn-select" style="width:260px;">
                     <option value>Seleccione Evento </option>
                                             
                      <?php
                                foreach ($evento as $evento) {
                                 ?>
                                    <option value="<?php echo $evento["nEveId"] ?>"><?php echo mb_convert_encoding($evento["cEveTitulo"],'UTF-8') ?></option>
                                        <?php
                                    }
                                ?>
                 </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_notempre_contenido"><b>Contenido:</b></label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_notempre_contenido); ?>
            </div>
        </div>
        <br>
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
</div>