
<script type="text/javascript" src='<?php echo URL_JS; ?>sistram/expediente/jsCrearExpediente.js'></script>
<script type="text/javascript">
function generar_cargo(){
      var expediente = $('#c_spn_exp_numero').text();
      var visto = 'sb';
        $.ajax({
                type: "POST",
                url: "expediente/load_generar_cargo/"+expediente+'/'+visto,
                data:'',
                success: function(msg){
                     
window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/sistram/'+msg,'_blank')                
             
  
    },
                error: function(msg){                
                    mensaje("r","Error!, vuelva a intentarlo");  

                }
            });     
}

</script>
<div class="content">         
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Creaci&oacute;n de expediente</i></h3>
            </div>
            <div class="box-content box-nomargin">                
                <div id="tab">
                    <ul>
                        <li><a id="tab_ins_expediente" href="#0">Crear expediente</a></li>
                        <li><a id="tab_fnd_expediente" href="#1">Buscar expediente</a></li>
                            <li><a id="tab_qry_expediente" href="#2">Listado de expedientes</a></li>
                        <li id="c_tab_upd_expediente" style="display: none"><a id="tab_upd_expediente" href="#2"></a></li>
                        <li id="c_tab_ins_expedienteParte" style="display: none"><a id="tab_ins_expedienteParte" href="#3"></a></li>
                    </ul>
                    <div id="0"> 
                        <div id="c_tab_ins_expediente" style="min-width: 850px">                            
                            <?php $this->load->view('sistram/expediente/ins_view'); ?>
                        </div>                    
                    </div>
                    <div id="1"> 
                        <div id="c_tab_fnd_expediente" style="min-width: 850px">                             
                            <legend>Lista de Expedientes Generados</legend>
                            <div id="c_qry_exp" style="width: 852px"></div>                           
                        </div>
                    </div>
             <div id="2"> 
                        <div id="tab_qry_expediente" style="min-width: 850px">                             
                            <legend>Lista de Expedientes Enviados</legend>
                            <table>
                                
                                <tr>
                                    <td>Entre: </td>
                                    <td><input id="txt_fechainicio_expediente" name="txt_fechainicio_expediente" type="text" placeholder="Fecha Inicio"></td>
                                    <td>&nbsp;&nbsp;<input id="txt_fechafin_expediente" name="txt_fechafin_expediente" type="text" placeholder="Fecha Fin"></td>
                                
                                    <td>&nbsp;&nbsp;&nbsp;<button style="margin-bottom: 8px;" class="btn btn-primary" id="listarExpedientes">Listar</button></td>

                                </tr>

                            </table>
                            
                            
                            
                            <div id="c_qry_exp2" style="width: 852px"></div>                           
                        </div>
                    </div>
                <!-- Dialogo expediente generado -->
                <div id="c_div_exp_numero" class="modal hide" style="display: none;">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>Creaci&oacute;n de expediente</h3>
                    </div>
                    <div class="modal-body">
                        <p>Expediente creado: <span id="c_spn_exp_numero" style="font-size: 24px;font-weight: bold"></span></p>
                        <span style="font-style: italic;color: #777">Por favor anote este n&uacute;mero en un lugar seguro.</span>
                    </div>                  
                    <div class="modal-footer"> 
                         <input type="button" class="btn btn-success" id="btn_generacargo" name="btn_generacargo" value="Ver Cargo" onClick="generar_cargo()" style="width: 130px;">
                        <a data-dismiss="modal" class="btn btn-primary" href="#">Listo !</a>
                    </div>
                </div>
                        <!-- Dialogo expediente generado -->
                <div id="c_div_exp2" class="modal hide" style="width:600px;height: 500px">
                    <div class="modal-header">
                        
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>Detalle Multimedia</h3>
                    </div>
                    <div class="modal-body">
                      
                        <input type="hidden" id="hid_expedienteId" value="">
                         <center><div id="contenidomodal" style="background: rgba(200, 195, 195, 0.26);width: 500px;border:1px solid #777">
                           <?php //$this->load->view('sistram/expediente/upload_view'); ?>
                            </div></center>
                        <div id="tablamultimedia">
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
