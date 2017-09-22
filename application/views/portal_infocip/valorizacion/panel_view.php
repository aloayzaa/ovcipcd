<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/jsValorizacion.js'></script>
    
<div class="content" style="width: 800px">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de Valorizacion de cursos</h3>
            </div>
            <div class="box-content">

<div id="Tabs_Valorizacion" >
        <ul>
            <li><a href="#pr" id="tab_valorizacionregistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_valorizacionlistado">Listado</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <?php $this->load->view('portal_infocip/valorizacion/ins_view'); ?>
            </div>
        </div>
        <div id="pl" style="width:100%;">
                               
            <div id="div_qry"></div>
        </div>
    </div>
                
                                         </div>
        </div>
    </div>
</div>             
                
<?php $this->load->view('dashboard/footer');?>


