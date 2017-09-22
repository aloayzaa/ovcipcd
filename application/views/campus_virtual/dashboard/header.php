<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href='<?php echo URL_CSS_DB; ?>bootstrap.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS_DB; ?>jquery.fancybox.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS_DB; ?>style.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS_DB; ?>chosen.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>validate/validation.css'>       
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>../js/scripts_uploadify/uploadify.css'>    
        <link rel="stylesheet" type="text/css" href='<?php echo URL_JS; ?>jqgrid/css/ui.jqgrid.css' />        
        <script type="text/javascript" src='<?php echo URL_JS; ?>jquery.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS; ?>jquery-1.8.1.min.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS; ?>chosen.jquery.min.js'></script>  
        <script type="text/javascript" src='<?php echo URL_JS; ?>ui.spinner.js'></script> 
        <script type="text/javascript" src='<?php echo URL_JS_DB; ?>bootstrap.min.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS_DB; ?>less.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS_DB; ?>jquery.fancybox.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS_DB; ?>custom.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS; ?>menu.js'></script>
        <!-- Scripts para JQuery Grid -->
        <script src="<?php echo URL_JS; ?>jquery-ui-1.8.23.min.js"></script>

        <script src="<?php echo URL_JS; ?>jqgrid/jquery.jqGrid.min.js" type="text/javascript"></script>
        <script src="<?php echo URL_JS; ?>jqgrid/jquery.jqGrid.min.js" type="text/javascript"></script>
        <script src="<?php echo URL_JS; ?>jqchart/jquery.jqChart.min.js" type="text/javascript"></script>
        <script src="<?php echo URL_JS; ?>jqgrid/i18n/grid.locale-es.js" type="text/javascript"></script>              

        <script type="text/javascript" src='<?php echo URL_JS; ?>validacion/jqueryvalidate.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS; ?>validacion/additional-methods.js'></script>
        <script type="text/javascript" src='<?php echo URL_JS; ?>mask/jquery.maskedinput.js'></script>
        
        <!-- Data Tables -->
        <link rel="stylesheet" href='<?php echo URL_CSS_DB; ?>jquery.dataTables_themeroller.css'>
        <script type="text/javascript" src='<?php echo URL_JS_DB; ?>jquery.dataTables.min.js'></script>
        <script src="<?php echo URL_JS; ?>js_pretyfoto/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            function mueveReloj(){ 
                momentoActual = new Date() ;
                hora = momentoActual.getHours() ;
                minuto = momentoActual.getMinutes() ;
                segundo = momentoActual.getSeconds() ;
                var jDate = '<?php echo date('d/M/Y') ?>';
                horaImprimible = hora + ":" + minuto + ":" + segundo ;
                $("#hora-servidor").html("<b>Fecha:</b> "+jDate + " &nbsp;&nbsp;&nbsp;<b>Hora:</b> " + horaImprimible); 
                // setInterval("mueveReloj()",1000);
            }  
            setInterval("mueveReloj()",1000);
        </script>


        <link rel="stylesheet" href='<?php echo URL_CSS; ?>jquery-ui-1.8.23.custom.css'>
        <link href='<?php echo URL_CSS; ?>jquery.jgrowl.css' rel="stylesheet" type="text/css">

         <link rel="stylesheet" href='<?php echo URL_CSS; ?>jquery-ui.css' />
        <script src='<?php echo URL_JS_DB; ?>jquery-1.9.1.js'></script>
        <script src='<?php echo URL_JS_DB; ?>jquery-ui.js'></script>
        <link rel="stylesheet" href="/resources/demos/style.css" />
    </head>
    <body onUnload="msjCargando();">    
        <div class="style-toggler">
            <img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/color.png" alt="" class='tip' title="Toggle style-switcher" data-placement="right">
        </div>			
        <div class="style-switcher">
            <h3>Cambiar Color</h3>
            <ul>
                <li>
                    <a href="#" class='style'>Default</a>
                </li>
                <li>
                    <a href="#" class='blue'>Plomo</a>
                </li>
                <li>
                    <a href="#" class='green'>Verde</a>
                </li>
                <li>
                    <a href="#" class='red'>Rojo</a>
                </li>
            </ul>
        </div>

        <!-- INICIO AGREGADO -->
        <div class="style-switcher2">
                <!-- <center><h3>MENU</h3> </center> -->
            <div class="navi" style="margin:0 0 0 0;">
                <ul id="prueba2" class='main-nav'>
                    <?php
                    $opciones = $this->loaders->get_menu();
                    $count = count($opciones);
                    for ($i = 0; $i < $count; $i++) {
                        $ico = ($opciones[$i]["active"] != "" ? "toggle-subnav-up-white.png" : "toggle-subnav-down.png");
                        ?>
                        <li <?php echo $opciones[$i]["active"]; ?>>
                            <a href="#" class="light toggle-collapsed">
                                <div class="ico">
                                    <i class="<?php echo $opciones[$i]["icon"]; ?> icon-white"></i>
                                </div><?php echo $opciones[$i]["menu"]; ?><img src="<?php echo URL_IMG . 'dashboard/' . $ico; ?>" alt="">
                            </a>
                            <?php
                            $count2 = count($opciones[$i]["datos"]);
                            echo '<ul ' . $opciones[$i]["ul"] . '>';
                            for ($j = 0; $j < $count2; $j++) {
                                ?>                              
                            <li <?php echo $opciones[$i]["datos"][$j]["li"]; ?>>
                                <a href="<?php echo $opciones[$i]["datos"][$j]["url"]; ?>"><?php echo $opciones[$i]["datos"][$j]["value"]; ?></a>
                            </li>
                            <?php
                        }
                        echo '</ul>';
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--  FIN AGREGADO -->
        <div class="topbar">
            <div class="container-fluid">
                <a href="<?php echo URL_MAIN . 'dashboard/index'; ?>" class='company'>Oficina Virtual v2.0</a>
                <form action="#">
                    <input type="text" value="Buscar Aqui...">
                </form>
                <ul class='mini'>
                    <li class='dropdown messageContainer'>
                        <a href="#" class='dropdown-toggle' data-toggle='dropdown'>
                            <img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/balloons-white.png" alt="">
                            Mensajes
                            <span class="label label-info">3</span>
                        </a>
                        <ul class="dropdown-menu pull-right custom custom-dark">
                            <li class='custom'>
                                <div class="title">
                                    Hello, whats your name?
                                    <span>Jul 22, 2012 by <a href="#" class='pover' data-title="Hover me" data-content="User information comes here">Hover me</a></span>
                                </div>
                                <div class="action">
                                    <div class="btn-group">
                                        <a href="#" class='tip btn btn-mini' title="Show message"><img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/magnifier.png" alt=""></a>
                                        <a href="#" class='tip btn btn-mini' title="Reply message"><img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/mail-reply.png" alt=""></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/gear.png" alt="">
                            Mis Datos
                        </a>
                    </li>
                    <li>
                        <?php echo anchor('usuario/logout', '<img src="' . URL_IMG . 'dashboard/icons/fugue/control-power.png" alt=""> Cerra Sesión') ?>
                    </li>
                </ul>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="container-fluid">
                <ul class="bread pull-left"> 
                    <li>
                        <a href="<?php echo URL_MAIN . 'dashboard/index'; ?>">
                            <div id="hora-servidor"></div>
                        </a>
                    </li>
                </ul>

            </div>
        </div>	
        <div class="main">
            <!-- AGREGADO -->
            <div class="style-toggler2">
                <img src="<?php echo URL_IMG; ?>dashboard/icons/fugue/menu.png" alt="" class='tip' title="Toggle style-switcher" data-placement="right">
            </div>	

            <div class="container-fluid" id="contenidogen" style="position:absolute;width:auto; margin-right:10px;">
                <div class="content" id="contenido" style="width: 100%;">                    <!---->
                    <script type="text/javascript" src='<?php echo URL_JS; ?>jquery.jgrowl_minimized.js'></script>                    
                    <script type="text/javascript" src='<?php echo URL_JS; ?>jsGeneral.js'></script>
                    <script type="text/javascript" src='<?php echo URL_JS; ?>jsValidacionGeneral.js'></script>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



