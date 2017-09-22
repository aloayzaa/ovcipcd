<?php $this->load->view('dashboard/header');?>



<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/encuesta/jsEncuesta.js'></script>
    <div id="Tabs_Encuesta" >
        <ul>
            <li><a href="#pr" id="tab_preguntasregistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_preguntaslistar">Listado</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <?php $this->load->view('campus_virtual/encuesta/ins_view'); ?>
            </div>
        </div>
        
        <div id="pl">
            <div class="controls">
                <p><h3>Seleccione :</h3>
                <select name="cbo_bloque" id="cbo_bloque" onchange="filtroTipoBloque(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un bloque" data-placement="right">
                <option value="">Seleccione Tipo</option>
                <option value="1">Al Docente</option>
                <option value="2">Al Curso</option>
                <option value="3">A los Materiales</option>
                <option value="4">A la Infraestructura</option>
                <option value="5">A los Servicios Complementarios</option>
            </select>
                </div>
            <div id="div_qry"></div>
        </div>
  </div>  
<?php $this->load->view('dashboard/footer');?>