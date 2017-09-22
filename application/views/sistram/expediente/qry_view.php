<script type="text/javascript">
    $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoExpedientes",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
        $(".pover").popover();
        $(".pover").click(function (e) {
            e.preventDefault();
            if ($(this).data('trigger') == "manual") {
                $(this).popover('toggle');
            }
        });

        $("#checktodo").on("click",checar);
        $("#enviar").on("click",enviarAdmin);
    });
    function sombreado(input){
        
        var fila= $(input).parent().parent();
        if ($(input).is(':checked')) {
           // $(input).parent().parent().addClass("sombreado");
           fila.css({"background": "#0072C6","color": "white"});
        } else {
            fila.css({'background' : '', 'color' : ''});
        }
    }
    function checar(){
         var filas= $("#ListadoExpedientes").children('tbody').children('tr');
        if($("#checktodo").is(':checked')) {
              filas.css({"background": "#0072C6","color": "white"});
              $('input[name="orderBox[]"]').prop("checked", "checked");
             
        } 
	 else {  
               filas.css({"background": "","color": ""});
             $('input[name="orderBox[]"]').prop("checked", "");
             
	}  
    }          
    function enviarAdmin(){
        var checkboxValues = "";
    $('input[name="orderBox[]"]:checked').each(function() {
          var input=$(this).val();
          checkboxValues += $(this).val() + ",";
        });
    
       if(checkboxValues!=""){
           var usuario=$("#usuarioderivar").val();
                   
            var data={expedientes:checkboxValues,usuario:usuario};
            
            $.ajax({
                data:  data,
                url:   'expediente/enviarAdmin/',
                type:  'post',
                beforeSend: function () {
                      msgLoading("#preload");
                },
                success:  function (response) {
                    $("#preload").html("");
                        if(response.trim()==1){
                             mensaje("Se ha enviado los expedientes correctamente!","e");
                             $('input[name="orderBox[]"]:checked').attr('checked', false);
                             msgLoading2("#c_qry_exp");
                             get_page('expediente/load_listar_view_mesapartes/','c_qry_exp');
  
                         }
                         else  if(response.trim()==0){
                            mensaje("Se ah generado un error al enviar expedientes!","r");
                          
                         }
                         else {
                             $("#preload").html("<br><div class='alert alert-warning'><strong>Los expedientes "+response+" deben tener otro destinatario</strong></div>");
                           //  mensaje("Los expedientes "+response+" deben tener otro destinatario","a");
                         }
                },
                error:function(){
                     mensaje("Se ah generado un error al enviar expedientes!","r");
                }
             });
        }
        else {
            alert("Seleccione al menos un registro");
        }
        
        
    }
   
    
  </script>
  <style>
      
      
      .sombreado{
        background: #0072C6;
        color: white;
      }
  </style> 
  <div id="Expedientes">
    <br>
    <input type="hidden" value="2" id="hid_area_id">
    <div class="form" style="width: 100%">
        
        <?php  if ($expedientes > 0) {?>
            <div align="left">
                   <select id="usuarioderivar" name="usuarioderivar">
                       <option value="Secretario">Director Secretario</option>
                       <option value="Administrador">Administrador</option>
                   </select>
                    <button style="margin-top:-10px" class="btn btn-danger" id="enviar"> Enviar </button>
                    <div id="preload"></div>
            </div>
        
            <table id="ListadoExpedientes"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><input id="checktodo" type="checkbox" /></th>
                        <th>Expediente</th>
                        <th>Fecha de Registro</th>
                         <th>Tipo Expediente</th>
                        <th>Sumilla</th>
                        <th>Solicitante</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($expedientes as $expediente) { ?>
                                <?php if($expediente->cExpedienteEstado!=''){ ?>
                    <tr style="background: darksalmon;">
                                      <td style="width: 380px;text-align: center;">
                                          <input id="check" name="orderBox1[]" value=<?php echo $expediente->nExpedienteId;?> type="checkbox" disabled="disabled"/>
                                      </td>
                                     <?php }else{?>
                                   <tr>
                                      <td style="width: 380px;text-align: center;">
                                          <input  onclick="sombreado(this)" id="check" name="orderBox[]" value=<?php echo $expediente->nExpedienteId;?> type="checkbox"/>
                                      </td>        
                                     <?php }?>                             
                                    <td style="width: 280px;text-align: center;"><?php echo $expediente->nExpedienteCodigo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->cExpedienteFechaRegistro; ?></td>
                                    <td style="width: 50px;text-align: center;"><?php echo $expediente->cTipexpedienteDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->cExpedienteSumilla; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->solicitante; ?></td>
                                    <td style="width: 380px;text-align: center;font-weight: bold;">
                                        <?php if($expediente->cExpedienteEstado!=''){ ?>                                        
                                        <a class="pover btn" style="border: none; background-image: none;" 
                                                data-placement="top" data-title="Expediente: <?php echo $expediente->nExpedienteCodigo; ?>" data-content="
                                                   <table>
                                                    <tr>
                                                        <td class='controls'>
                                                         
                                                           <h4><b>Observacion: <?php echo $expediente->cExpedienteObservacion ?></b></h4><br>
                                                                                                      
                                                        </td> 
                                                                
                                                      </tr>

                                                      </table>"> 
                                           <span><?php echo $expediente->cExpedienteEstado; ?></span>   
                                        </a>
                                        <?php  } ?>
                                    </td>
                                        <td style="width: 380px;text-align: center;">
                                                     
                                              <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/editar1.png" width="22" height="22" onclick="editarExpediente(<?php echo $expediente->nExpedienteId;?>)">
                                              <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/multimedia.png" width="22" height="22" onclick="abrirMultimedia(<?php echo $expediente->nExpedienteId;?>)"> 
                                            
                                              <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="22" height="22" onclick="darbajaExpediente(<?php echo $expediente->nExpedienteId;?>)">
                                              <?php if($expediente->cExpedienteEstado!=''){ ?>
                                        <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/derivar.png" width="20" height="20" onclick="reenviar_decanato(<?php echo $expediente->nExpedienteId;?>)">
                                                         <?php }?>
                                        </td>                           
                                </tr>
                              
                                
                    <?php } ?>
                </tbody>
            </table> 
        <center><br>
              <table>
                <tr>
                  <td style="padding-right:  1em;"><div style=" width: 100px; height: 20px; background-color:darksalmon;"></div><p> Exp. Observado </p></td>
                 </tr>
              </table> </center>                   
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Información!!</h4>No existen expedientes generados</div>";
        }
        ?>     
    </div> 
</div>
