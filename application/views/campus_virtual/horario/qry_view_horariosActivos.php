<?php
    function formatoFechas($fechas){
        $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $fechaAntes = substr($var, $i, 10);
            $anio = substr($fechaAntes, 0, 4);
            $mes = substr($fechaAntes, 5, 2);
            $dia = substr($fechaAntes, 8, 2);
            $arreglo[$v] = $dia.'-'.$mes.'-'.$anio;
            $v++;
        } 
        $longitud2 = count($arreglo);
        $nuevasFechas = '';
        for($j = 0; $j < $longitud2; $j = $j + 1){
            if($nuevasFechas == ''){
                $nuevasFechas = $arreglo[$j];
            }
            else{
                $nuevasFechas = $nuevasFechas.','.$arreglo[$j];
            }
        }
        return $nuevasFechas;
    }
?>
<script type="text/javascript">
    $(document).ready(function() {
        var dataTable = {
        tabla           : "BandejaPendiente-Lista",
        ordenaPor       : new Array([0, "asc" ])
        };
        paginaDataTable(dataTable);  
    });
</script>
<div id="ContenedorGeneralPendientes">
            <div class="content" style="width: 900px">
                <div class="row-fluid">
                    <div class="box-content">
                        <div id="Tabs_RegistroNuevo">
                            <div class="form" style="width: 100%">
                                <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Asignatura</th>
                                            <th>Fecha Inicio-Fin</th>
                                            <th>Ambiente</th>
                                            <th>Hora Inicio-Fin</th>
                                            <th>Dias Semana</th>
                                            <th>Fechas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($horarios as $horarios) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 100px;text-align: center;"> <?php echo $horarios->Asignatura; ?></td>
                                                <td style="width: 100px;text-align: center;"> <?php echo $horarios->FechaInicio.' - '.$horarios->FechaFin; ?></td>
                                                <td style="width: 50px;text-align: center;"> <?php echo $horarios->Ambiente; ?></td>
                                                <td style="width: 40px;text-align: center;"> <?php echo $horarios->horaInicio.' - '.$horarios->horaFin; ?></td>
                                                <td style="width: 100px;text-align: center;"> <?php echo $horarios->Dias; ?></td>
                                                <td style="width: 200px;text-align: left;"> <?php echo formatoFechas($horarios->Fechas); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>