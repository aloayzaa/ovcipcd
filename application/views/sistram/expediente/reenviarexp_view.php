<script type="text/javascript">
    $(document).ready(function () {
        $("#reenviar").on("click",reenviarAdmin);
        $("#option1").on("click",fAgrega);
    });

   function fAgrega()
{  
        if($("#option1").is(':checked')) {
            document.getElementById("txt_ins_exp_obser").value ='Todos las observaciones fueron subsanadas.';
        } 
	 else {  
                document.getElementById("txt_ins_exp_obser").value ='';
	}  
}
        function reenviarAdmin(){
      if (document.getElementById("txt_ins_exp_obser").value ==''){ 
                alert("Tiene que dar V°B° de las observaciones") 
               // return 0; 
            } else{
                    var data={expedientes:$("#hid_nExpedienteId").val(),
                        observacion:$("#txt_ins_exp_obser").val(),
                        usuarioreenviar:$("#usuarioreenviar").val()};
             msgLoading("#preload_reenviar","Cargando...")       
            $.ajax({
                data : data,
                url:   'expediente/reenviarAdmin/',
                type:  'post',
                success:  function (response) {
                    $("#preload_reenviar").html("");
                        if(response.trim()==1){
                                  $('.popedit').dialog('close');
                             mensaje("Se ha enviado los expedientes correctamente!","e");
                             msgLoading2("#c_qry_exp");
                             get_page('expediente/load_listar_view_mesapartes/','c_qry_exp');
                         }
                         else if(response.trim()==-1){
                             $("#preload_reenviar").html("<br><div class='alert alert-warning'><strong>El expediente deben tener otro destinatario</strong></div>");
                        }
                         else{
                            mensaje("Se ah generado un error al enviar expedientes!","r");
                         }
                },
                error:function(){
                     mensaje("Se ah generado un error al enviar expedientes!","r");
                }
             }); 
            }
    }
    </script>

<div id="ContenedorGeneralPendientes">
    <div class="content" style="width: 350px">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Levantamiento de Observaciones</h3>
                </div>
                <?php 
                $hid_nExpedienteId = array('name' => 'hid_nExpedienteId', 'id' => 'hid_nExpedienteId', 'value' => $nExpedienteId, 'type' => 'hidden');
                ?>
                    <div class="box-content">
    <div align="left">
        <?php echo form_input($hid_nExpedienteId); ?>
                    <select id="usuarioreenviar" name="usuarioreenviar">
                       <option value="1">Director Secretario</option>
                       <option value="2">Administrador</option>
                    </select>
                    <button style="margin-top: -9px;" class="btn btn-danger" id="reenviar">Enviar</button>
                    <div id="preload_reenviar"></div>
            </div>
                    <br>
                    <div class="control-group">  
        <label class="control-label"><b>Importante:</b> Ingresar Observacion:</label>
        <div class="controls">                                        
           <input type="checkbox" id="option1" name="option1"> V°B°(Mesa de Partes)
        </div> 
        <br>
        <div class="controls">  
            <textarea row="6" type="text" name="txt_ins_exp_obser" id="txt_ins_exp_obser" required="required" style="width: 95%;"></textarea>
        </div>                                
    </div>    
            </div>
        </div>
    </div></div>
    
</div>