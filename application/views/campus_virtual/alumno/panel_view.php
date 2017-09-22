<?php $this->load->view('dashboard/header');
$idPersona = $idPer;
?>
<input type="hidden" value="<?php echo $idPersona; ?>" name="hid_idPersona" id="hid_idPersona"/>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/alumno/jsAlumno.js'></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/alumno/jsAlumnoRespuesta.js'></script>
    <div id="Tabs_Alumno" >
        <ul>
            <li><a href="#pl" id="tab_cursoslistar">Listado</a></li>
        </ul>
        <div id="pl">
            <legend>Mis Cursos</legend>
            <table>
                <tr>
                    <td style="width: 600px; text-align: right;">
                        Periodo:
                        <select id="cbo_filtro_anio" name="cbo_filtro_anio" style="width: 80px;" onchange="filtroCursosAlumno(cbo_filtro_anio)">
                        <!--<option value=""selected>año</option>-->
                            <?php
                                $tope = date("Y");
                                $max = 0;
                                $min = 0;
                                for($a = $tope - $max; $a <= $tope + $min; $a++)
                                    echo "<option value='$a' >$a</option>";
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div id="div_qry">
            </div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>