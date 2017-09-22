<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsDatosColegiado.js"></script>
<script type="text/javascript">
    $(function(){
        $('#Tabs_UpdColegiado').tabs();
    })
</script>


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Actualización de Colegiado</i></h3>
                
                            </div>
            <div class="box-content">
                <div id="Tabs_UpdColegiado">
                    <ul>
                        <li><a href="#colegiadol" id="colegiadoDatosPersonales"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/user.png"> DatosPersonales</a></li>
                        <li><a href="#colegiado2" id="colegiadoDatosProfesionales"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/bestseller.png"> Formación Profesional</a></li>
                        <li><a href="#colegiado3" id="colegiadoDatosFamilia"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/issue.png"> Datos Familiares</a></li>
                        <li><a href="#colegiado4" id="colegiadoDatosDeporte"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/issue.png"> Datos de Deporte</a></li>
                    </ul>
                    <div id="colegiadol">

                    </div>
                    <div id="colegiado2">
                         <div style="min-width: 400px;">
                        <br>
                        <div id="c_frm_prof_upd"></div></div>
                    </div>
                    <div id="colegiado3">
                        <br>
                        <div id="c_frm_familia_upd"></div>
                    </div>
                     <div id="colegiado4">
                        <br>
                        <div id="c_frm_deporte_upd"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>