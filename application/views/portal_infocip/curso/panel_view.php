<?php $this->load->view('dashboard/header');?>
<script type="text/javascript">
$(function(){ 
    $('#Tabs_Curso').tabs();  //convierte a tabs 
    $("#tab_cursolistar").bind('click', function(){
        get_page('curso/load_listar_view_curso/','div_qry');
    });
})
</script>
    <div id="Tabs_Curso" >
        <ul>
            <li><a href="#pr" id="tab_cursoregistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_cursolistar">Listado</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <?php $this->load->view('portal_infocip/curso/ins_view'); ?>
            </div>
        </div>
        <div id="pl">
            <div id="div_qry"></div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>