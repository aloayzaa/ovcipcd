<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsHabilidad.js"></script>
<script type="text/javascript">
    $(function() {
        $('#Tabs_UpdColegiado').tabs();
    })
</script>
<style>
    table {
        width: 650px;
        border:1px solid #000000;
        border-spacing: 0px; }

    table a, table, tbody, tfoot, tr, th, td {
        font-family: Arial, Helvetica, sans-serif;
    }

    table caption {
        font-size: 1.8em;
        text-align: center;
        
        background: url(http://i.imgur.com/cIY3Kaw.gif) center;
        color: #FFFFFF;}

    thead th {
        background: url(http://i.imgur.com/phobUI4.gif) center;
        height: 21px;
        color: #FFFFFF;
        font-size: 0.8em;
        font-family: Arial;
        font-weight: bold;
        padding: 0px 7px;
        margin: 20px 0px 0px;
        text-align: left; }

    tbody tr {	background: #ffffff; }

    tbody tr.odd {	background: #f0f0f0; }

    tbody th {
        background: url(http://i.imgur.com/hdPHv0K.gif) left center no-repeat;
        background-position: 5px;
        padding-left: 40px !important; }

    tbody tr.odd th {
        background: url(http://i.imgur.com/eg6vuKX.gif) left center no-repeat;
        background-position: 5px;
        padding-left: 40px !important; }

    tbody th, tbody td {
        font-size: 0.8em;
        line-height: 1.4em;
        font-family: Arial, Helvetica, sans-serif;
        color: #000000;
        padding: 10px 7px;
        border-bottom: 1px solid #800000;
        text-align: left; }

    tbody a {
        color: #000000;
        font-weight: bold;
        text-decoration: none; }

/*    tbody a:hover {
        color: #ffffff;
        text-decoration: underline; }

    tbody tr:hover th {
        background: #800000 url(http://i.imgur.com/GGgSLlb.gif) left center no-repeat;
        background-position: 5px;
        color: #ffffff; }

    tbody tr.odd:hover th {
        background: #000000 url(http://i.imgur.com/VnWxOiR.gif) left center no-repeat;
        background-position: 5px;
        color: #ffffff; }

    tbody tr:hover th a, tr.odd:hover th a	{
        color: #ffffff; }

    tbody tr:hover td, tr:hover td a, tr.odd:hover td, tr.odd:hover td a {
        background: #800000;
        color: #ffffff;	 }

    tbody tr.odd:hover td, tr.odd:hover td a{
        background: #000000;
        color: #ffffff;	 }*/

    tfoot th, tfoot td {
        background: #ffffff url(http://i.imgur.com/NbLdqu0.gif) repeat-x bottom;
        font-size: 0.8em;
        color: #ffffff;
        height: 21px;
    }    
</style>
<?php
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $codigocip, 'type' => 'hidden');
$hid_upd_tipoclase = array('name' => 'hid_upd_tipoclase', 'id' => 'hid_upd_tipoclase', 'value' => $tipoclase, 'type' => 'hidden');
$hid_upd_habilidad = array('name' => 'hid_upd_habilidad', 'id' => 'hid_upd_habilidad', 'value' => $habilidad, 'type' => 'hidden');
$hid_upd_pages = array('name' => 'hid_upd_pages', 'id' => 'hid_upd_pages', 'value' => 10, 'type' => 'hidden');

function HabilidadImg($habilidad) {
    if ($habilidad == 0) {
        echo "http://i.imgur.com/IUFb2Lt.png";
    } else if ($habilidad == 1) {
        echo "http://i.imgur.com/9XL17wh.png";
    } else if ($habilidad == 4) {
        echo "http://i.imgur.com/IUFb2Lt.png";
    }else {
        echo "http://i.imgur.com/9XL17wh.png";
    }
}

function HabilidadStr($habilidad) {
    if ($habilidad == 0) {
        echo "<font color=red><strong>COLEGIADO INHÁBIL</strong></font>";
    } else if ($habilidad == 1) {
        echo "<font color=green><strong>COLEGIADO HÁBIL</strong></font>";
    }else if ($habilidad == 4) {
        echo "<font color=red><strong>COLEGIADO INHABILITADO</strong></font>";
    } else {
        echo "<font color=green><strong>COLEGIADO HABILITADO</strong></font>";
    }
}

function Clase($clase) {

    if ($clase == 'O') {
        echo "ORDINARIO";
    } else if ($clase == 'V') {
        echo "VITALICIO";
    } else {
        echo "TRASLADO";
    }
}

?>

<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Habilidad de Colegiado</i></h3>

            </div>
            <div class="box-content">
                <div id="Tabs_UpdColegiado">
                    <ul>
                        <li><a href="#habilidad" id="colegiadohabilidad"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/user.png">Ver habilidad de Colegiado</a></li>
                        <li><a href="#detalle" id="colegiadodetalle"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/bestseller.png"> Ver Detalle Economico</a></li>
                        </ul>
                    <div id="habilidad" align="center">
                        <div style="min-width: 600px;">
                            <?php echo form_input($hid_upd_regcol); ?>
                            <?php echo form_input($hid_upd_pages); ?>
                            <?php echo form_input($hid_upd_tipoclase); ?>
                            <?php echo form_input($hid_upd_habilidad); ?>
                            <br />
                            <div class="box-head" style="border-style:solid;border-color: #B7B7B7;">

                                <fieldset>     
                                    <br><br>
                                    <table border=1>
                                        <thead>
                                        <th colspan="4" style="text-align:center;">La última vez que consultó su habilidad fue : <?php echo date("F j, Y, g:i a"); ?></th>
                                        </thead>
                                        <tbody>          
                                            <tr>
                                                <th style="width: 5px;">&nbsp;</th>
                                                <td style="width: 60px;"><b>Nro CIP :</b></td>

                                                <td style="width: 135px;padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($codigocip, "UTF-8"), ''); ?></td>
                                                <td rowspan="2"><div align="center"><button id="verdeudas"class="btn btn-danger" onclick="ver_multas('<?php echo $codigocip; ?>');"><span> Ver Multas</span></button>
                                                        <button id="vermultas" onclick="ver_deudas('<?php echo $codigocip; ?>');" class="btn btn-danger"><span> Ver Deudas</span></button></div></td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td><b>Nombres :</b></td>
                                                <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($nombre, "UTF-8"), ''); ?></td>

                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td style="width: 80px;"><b>Apellido Paterno :</b></td>
                                                <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($apellidopat, "UTF-8"), ''); ?></td>
                                                <td style="width: 200px;text-align:center;vertical-align:top;" rowspan="4"><img src="<?php echo HabilidadImg($habilidad) ?>" width="105" height="115"><br><br> <?php echo HabilidadStr($habilidad) ?></td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td><b>Apellido Materno :</b></td>
                                                <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($apellidomat, "UTF-8"), ''); ?></td>

                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td><b>DNI :</b></td>
                                                <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($lecol, "UTF-8"), ''); ?></td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td><b>Tipo de Colegiado :</b></td>
                                                <td style="padding-left:5px;color: #f20c0c;"><?php echo form_label(mb_convert_encoding(Clase($tipoclase), "UTF-8"), ''); ?></td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td><b>Fecha Inscripción :</b></td>
                                                <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($fechains, "UTF-8"), ''); ?></td>
                                                <td style="text-align:center;"><b>Título Profesional</b></td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td><b>Fecha Aporte :</b></td>
                                                <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($fechaapor, "UTF-8"), ''); ?></td>
                                                <td style="text-align:center;">Ingeniero <?php echo $coltitulo ?></td>
                                            </tr>
                                        <tfoot><th colspan="4"> * Para verificar nuestros medios de pagos, ingresar al siguiente enlace.
										</th>
										<script type="text/javascript">
										function MostrarNota(){
    set_popupDetalle("habilidad_colegiado/ver_info","IMPORTANTE!",610,175,'','');
}
										</script>
										</tfoot>
                                    </table>
																			<a href="#" onclick="MostrarNota();return false;" class='pover btn'><img src="http://www.cip-trujillo.org/ver_aqui.png"></a>
                                </fieldset><br></div>
                            <?php echo form_close(); ?>


                        </div>
                    </div>
                      
                     <div id="detalle">
                        <br>
                        <div id="c_get_detalle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>