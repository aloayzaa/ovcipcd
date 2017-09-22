
<?php
$txt_ins_notificacion = array(
    'name' => 'txt_ins_notificacion',
    'id' => 'txt_ins_notificacion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 301px;",
    'required' => 'required');

$boton = array('name' => 'btn_ins_notempre',
    'type' => 'submit', 
    'value' => 'Notificar Expediente', 
    'id="btn_ins_notempre" class="btn btn-danger"');


?>

<div> 
    <table>
            <tr>
                <td>
                    <label style="font-weight: bold" for="txt_ins_notificacion">Describir Notificación:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td >
                    <?php echo form_textarea($txt_ins_notificacion); ?>
                </td>    
            </tr>
    </table> 
  
         
    
        <div class="control-group"> 
            <div class="controls">
                 <button class="btn btn-primary" onclick="notificar_view()">Notificar Expediente</button>
            </div>
            <div class="controls" id="notificar"></div>
            
        </div> 
   
   
</div>