<script type="text/javascript">
    $(document).ready(function () {
            $("#check_todo").on("click",checar2);
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoRequisitos",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
    });
//    $("#enviar").on("click",editar);
    function checar2(){
        if($("#check_todo").is(':checked')) {
            $('input[name="order[]"]').prop("checked", "checked"); 
        } 
        else {  
            $('input[name="order[]"]').prop("checked", "");
        }  
    }
</script>
<div id="listadorequisito">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($requisitos > 0) { ?>

            <table id="ListadoRequisitos"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><input id="check_todo" type="checkbox" /></th>
                        <th>Codigo</th>
                        <th>Descripcion</th>

                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($requisitos as $requisito) { ?>
                        <?php
                        foreach ($requisitosXTramite as $requisitosT) {
                            if ($requisito["nRequisitosId"] == $requisitosT["nRequisitosId"]) {
                                if ($requisito["nTramiteId"] == $nTramiteIdGet) {
                                    $estilo = 'checked';
                                }
                                break;
                                ?>
                            <?php
                            } else {
                                $estilo = '';
                            }
                        }
                        ?>
                        <tr>
                            <td style="width: 380px;text-align: center;"><input type="checkbox" id="RequiDame" name="order[]" <?php echo $estilo; ?> value="<?php echo $requisito ["nRequisitosId"]; ?>" style="padding: 10px;"></td>
                            <td style="width: 380px;text-align: center;"><?php echo $requisito['nRequisitosId']; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $requisito['cRequisitosDescripcion']; ?></td>
                        </tr>
    <?php } ?>
                </tbody>
            </table>

            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No Existen Requisitos para listar </div>";
        }
        ?>

    </div>  

</div>
