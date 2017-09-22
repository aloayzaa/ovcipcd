<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsReserva.js'></script>   


<div class="content" style="width: 950px">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de Reservas</h3>
            </div>
            <div class="box-content">
    <div id="Tab_Reserva" style="width:100%;" >
        <ul>
            <li><a href="#pl" id="tab_reservalistar">Listado Reservas Activas</a></li>
           
        </ul>
        
        <div id="pl" style="width:127%;">        
            <div id="div_qry"></div>
        </div>
        
        
    </div>  
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer');?>

