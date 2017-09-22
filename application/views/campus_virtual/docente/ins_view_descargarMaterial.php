<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/material/jsMaterial.js'></script>

<?php
if($sesiones != null){
?>
<fieldset>
    <legend>Material</legend>  
    <select onchange="mostrarMateriales(this)" name="cbo_sesiones" id="cbo_sesiones" class="input-medium tip" style="width:200px;" data-placement="right">
        <option value="">Seleccione Sesion</option>
        <?php
        foreach ($sesiones as $fila) {
            ?>
            <option value="<?php echo $fila->nSesId ?>"><?php echo $fila->cSesTitulo ?></option>
        <?php } ?>
    </select>
    <div style="padding-bottom: 20px;"></div>
    <span id="preload"></span><div id="mostrarMateriales"></div>
</fieldset>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No existen sesiones para descargar material.</div>";
}
?>