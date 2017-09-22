<?php $this->load->view('dashboard/header');?>

<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/encuesta/jsEncuestaAsignar.js'></script>
    <div id="Tabs_EncuestaAsignar" >
        <ul>
            <li><a href="#pr" id="tab_preguntasencuesta">Asignar</a></li>
            <li><a href="#pl" id="tab_listadoencuesta">Listado</a></li>
            <li><a href="#pd" id="tab_reportesencuesta">Reporte</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <?php $this->load->view('campus_virtual/encuesta/ins_view_asignar'); ?>
            </div>
        </div>

        <div id="pl">
            Seleccione Periodo:
            <select name="cbo_tipoanio" id="cbo_tipoanio" onchange="filtroCursosanio(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione año" data-placement="right">
                
                            <?php
                                $tope = date("Y");
                                $max = 2;
                                $min = 0;
                                for($a = $tope - $max; $a <= $tope + $min; $a++)
                                    echo "<option value='$a' >$a</option>";
                            ?>
            </select>
            <div id="div_qryanio"></div>
        </div>

        <div id="pd">
            Seleccione Periodo:
            <select name="cbo_tipo" id="cbo_tipo" onchange="filtroTipoReporte(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione año" data-placement="right">

                            <?php
                                $tope = date("Y");
                                $max = 2;
                                $min = 0;
                                for($a = $tope - $max; $a <= $tope + $min; $a++)
                                    echo "<option value='$a' >$a</option>";
                            ?>
            </select>
            <div id="div_qry"></div>
        </div>
    </div>
<?php $this->load->view('dashboard/footer');?>