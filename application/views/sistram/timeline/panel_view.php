
<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        
       $(".chzn-select").chosen();
       $('#Tabs_timeline').tabs();  //convierte a tabs 
       $("#txt_codigoexpediente").keypress(function(e) {
            if(e.which == 13) {
               // Acciones a realizar, por ej: enviar formulario.
               buscarExpediente();
            }
         });
        $("#btn_busca_expediente").on("click",buscarExpediente);
       
    });
    function buscarExpediente(){
        var codigo=$("#txt_codigoexpediente").val();
        if(codigo!==''){
        
        var data={codigo:codigo};
         $.ajax({
                data:  data,
                url:   'timeline/buscarExpediente/',
                type:  'post',
                beforeSend: function () {
                    
                      msgLoading2("#qry_timeline");
                },
                success:  function (response) {
                    //mensaje("Se ha enviado los expedientes correctamente!","e");
                    $("#qry_timeline").html(response);
                  },
                error:function(){
                     mensaje("Se ah generado un error al buscar expediente","r");
                }
             });
       }
      else {
           alert("Ingrese un codigo de expediente")
       }
    }
 
</script>    

<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de Busqueda por Expediente </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_timeline">
                    <ul>
                        <li><a href="#Timeline1" id="TimelineListar">Busqueda de Expedientes</a></li>
                    </ul>
                      
                    <div id="Timeline1">
                        
                       <div class="control-group">  
                            <label class="control-label" for="txt_fnd_persona"><b>Codigo Expediente: </b></label>
                            <div class="controls">
                                <div >    
                                    <input type="text" name="txt_codigoexpediente" value="" id="txt_codigoexpediente" required="required" class="input-medium cajassearch" style="margin-bottom:9px;"> 
                                    <button name="btn_busca_expediente" type="button" id="btn_busca_expediente" class="btn btn-danger" style="margin-bottom:9px;">Buscar</button>                                </div>
                               
                            </div> 
                        </div> 
                        
                        
                        <div align="center" id="qry_timeline" style="width: 600px;">
                           
                        </div>
                        

                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







