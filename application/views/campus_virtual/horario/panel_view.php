<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/horario/jsHorario.js'></script>
    <div id="Tabs_Horario" >
        <ul>
            <li><a href="#pr" id="tab_horarioregistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_horariolistar">Listado</a></li>
        </ul>
        <div id="pr" style="height:800px;">
            <div id="div_ins">
                <?php $this->load->view('campus_virtual/horario/ins_view'); ?>
            </div>
        </div>
        <div id="pl" style="width:100%;">
            Seleccione un Estado: 
            <select name="cbo_estado" id="cbo_estado" onchange="filtroEstado(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Estado" data-placement="right">
                <option value="">Seleccione Estado</option>
                <option value="1">ACTIVOS</option>
                <option value="0">FINALIZADOS</option>
            </select>
            <div id="div_qry"></div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>