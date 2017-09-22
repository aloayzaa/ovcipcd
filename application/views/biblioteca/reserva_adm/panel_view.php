<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsReserva_adm.js'></script>   


<div class="content" style="width: 700px">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de Activacion de Reservas </h3>
            </div>
            <div class="box-content">
    <div id="Tab_Reserva_adm" >
        <ul>
            <li><a href="#pl" id="tab_reserva_adm_listar">Historial Reservas</a></li>
            <li><a href="#pl2" id="tab_reservas_externos">Historial Reservas Externos</a></li>
        </ul>
        <div id="pl" style="width:125%;">        
            <div id="div_qry"></div>
        </div>
        <div id="pl2" style="width:125%;">        
            <div id="div_qry2"></div>
        </div>
    </div>  
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer');?>
