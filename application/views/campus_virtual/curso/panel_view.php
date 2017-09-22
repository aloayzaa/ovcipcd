<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/curso/jsCurso.js'></script>
    <div id="Tabs_Curso" >
        <ul>
            <li><a href="#pr" id="tab_cursoregistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_cursolistar">Listado Asignaturas</a></li>
            <li><a href="#pt" id="tab_cursotemporales">Activar Asignaturas Temporales</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <?php $this->load->view('campus_virtual/curso/ins_view'); ?>
            </div>
        </div>
        <div id="pl">
            Seleccione un Tipo: 
            <select name="cbo_tipo" id="cbo_tipo" onchange="filtroTipo(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Tipo" data-placement="right">
                <option value="">Seleccione Tipo</option>
                <option value="CURSO">CURSO</option>
                <option value="DIPLOMADO">DIPLOMADO</option>
                <option value="CURSO-IEPI">CURSO-IEPI</option>
                <option value="DIPLOMADO-IEPI">DIPLOMADO-IEPI</option>
            </select>
            <div id="div_qry"></div>
        </div>
        <div id="pt">
            Seleccione un Tipo: 
            <select name="cbo_tipo_Temporal" id="cbo_tipo_Temporal" onchange="filtroTipoTemporal(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Tipo" data-placement="right">
                <option value="">Seleccione Tipo</option>
                <option value="CURSO">CURSO</option>
                <option value="DIPLOMADO">DIPLOMADO</option>
            </select>
            <div id="div_qryTemp"></div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>