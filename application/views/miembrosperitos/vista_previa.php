<?php
$atributosForm = array('id ' => 'frm_vista_previa', 'name ' => 'frm_vista_previa', 'class' => 'form-horizontal');
echo form_open('miembrosperitos/miembrosperitos/get_datos_miembros/' . $nPeritoId . "/", $atributosForm);
$txt_upd_miembro_datos = array('name' => 'txt_upd_miembro_datos', 'id' => 'txt_upd_miembro_datos',"style"=>"text-align: center;font-size: 18px; font-weight: bold;");
$txt_upd_miembro_cip = array('name' => 'txt_upd_miembro_cip', 'id' => 'txt_upd_miembro_cip',"style" => "text-align: center;font-size: 18px; font-weight: bold;");
$txt_upd_miembro_especialidad = array('name' => 'txt_upd_miembro_especialidad', 'id' => 'txt_upd_miembro_especialidad',"style"=>"font-size: 16px");
$txt_upd_miembro_adscrito = array('name' => 'txt_upd_miembro_adscrito', 'id' => 'txt_upd_miembro_adscrito',"style"=>"font-size: 16px");
$txt_upd_miembro_direccion = array('name' => 'txt_upd_miembro_direccion', 'id' => 'txt_upd_miembro_direccion',"style"=>"font-size: 16px");
$txt_upd_miembro_contacto = array('name' => 'txt_upd_miembro_contacto', 'id' => 'txt_upd_miembro_contacto',"style"=>"font-size: 16px");
$txt_upd_miembro_email = array('name' => 'txt_upd_miembro_email', 'id' => 'txt_upd_miembro_email',"style"=>"font-size: 16px");
$txt_upd_miembro_emailsec = array('name' => 'txt_upd_miembro_email', 'id' => 'txt_upd_miembro_email',"style"=>"font-size: 16px");
?>
<style>
    .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
    .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 4px solid #36752D; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
    .datagrid table td, .datagrid table th { padding: 6px 8px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; color:#FFFFFF; font-size: 14px; font-weight: bold; border-left: 1px solid #36752D; } 
    .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #275420; border-left: 1px solid #C6FFC2;font-size: 15px;font-weight: normal; }
    .datagrid table tbody .alt td { background: #DFFFDE; color: #275420; }
    .datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #36752D;background: #DFFFDE;} 
    .datagrid table tfoot td { padding: 0; font-size: 11px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }
    .datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #36752D;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #275420; color: #FFFFFF; background: none; background-color:#36752D;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>

<div class="datagrid">
    <table>
<thead>
    <tr>
        <th>
            <?php echo form_label(mb_convert_encoding($Datos, "UTF-8"),'',$txt_upd_miembro_datos); ?>
            <?php echo form_label(mb_convert_encoding($cip, "UTF-8"),'',$txt_upd_miembro_cip); ?>
        </th>
        
    </tr>
</thead>

<tbody>
    <tr>
        <td>
            <strong>Especialidad/es:</strong> 
            <strong><?php echo form_label(mb_convert_encoding($especialidad, "UTF-8"),'',$txt_upd_miembro_especialidad); ?></strong>
        </td>
       
        
    </tr>
<tr class="alt">
    <td>
        <strong>Adscrito:</strong> 
        <strong><?php echo form_label(mb_convert_encoding($adscrito, "UTF-8"),'',$txt_upd_miembro_adscrito); ?></strong>
    </td>
    
    
</tr>
<tr>
    <td>
        <strong>Direccion:</strong> 
        <strong><?php echo form_label(mb_convert_encoding($direccion, "UTF-8"),'',$txt_upd_miembro_direccion); ?></strong>     
                                                
    </td>
    
    
</tr>
<tr class="alt">
    <td>
        <strong>Contacto:</strong> 
        <strong><?php echo form_label(mb_convert_encoding($contacto, "UTF-8"),'',$txt_upd_miembro_contacto); ?></strong>
                                                
    </td>
   
    
</tr>
<tr>
    <td>
        <strong>Email:</strong> 
        <div style="font-size: 16px;">
        <?php echo form_label(mb_convert_encoding($email, "UTF-8"),'',$txt_upd_miembro_email); ?></strong>
        </div>
                                                     
    </td>
</tr>
<tr class="alt">
    <td>
        <strong>Email Secundario:</strong> 
        <div style="font-size: 16px;">
        <?php echo form_label(mb_convert_encoding($emailsec, "UTF-8"),'',$txt_upd_miembro_emailsec); ?>
        </div>
                                                     
    </td>
</tr>
</tbody>
</table>
</div>

 <?php echo form_close(); ?>

