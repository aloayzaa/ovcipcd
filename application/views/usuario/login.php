<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CIP-CDLL - SERVICIOS VIRTUALES 2014</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link rel="stylesheet" href='<?php echo URL_CSS2; ?>bootstrap.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS2; ?>bootstrap-responsive.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS2; ?>stylesheet.css'>
        <link rel="stylesheet" href='<?php echo URL_ICON; ?>font-awesome.css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Le fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144"  href='<?php echo URL_MAIN; ?>img/login/apple-touch-icon-144-precomposed.html'>
        <link rel="apple-touch-icon-precomposed" sizes="144x144"  href='<?php echo URL_MAIN; ?>img/login/apple-touch-icon-114-precomposed.html'>
        <link rel="apple-touch-icon-precomposed" sizes="72x72"  href='<?php echo URL_MAIN; ?>img/login/apple-touch-icon-72-precomposed.html'>
        <link rel="apple-touch-icon-precomposed" sizes="72x72"  href='<?php echo URL_MAIN; ?>img/login/apple-touch-icon-57-precomposed.html'>

        <link rel="shortcut icon" href="img/favicon.png">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>
        <?php {
            $atributosForm = array('id ' => 'loginForm', 'class' => "form-horizontal");
            echo form_open('usuario/autenticar', $atributosForm);
            $cajaNick = array('name' => 'user', 'id' => 'user', 'value' => set_value('user'), 'placeholder' => "Ej. icervantes", 'class' => "span12", 'required' => 'required');
            $cajaPsw = array('name' => 'pw', 'id' => 'pw', 'type' => 'password', 'value' => '', 'placeholder' => 'Ej. Cerdf!90Ec', 'class' => "span12", 'required' => 'required');
        }
        ?>
        <div class="inner_content" style="padding: 60px;margin-top:-50px;">

            <div class="widgets_area" >

                <div class="span6">
                           <div class="status-widgets">
                        <!--<div class="row-fluid">-->
                        <div class="span4">
          <!--<div class="header">-->
            <h3>
                <img src='<?php echo URL_MAIN; ?>img/login/logo-cip_88x88.png' class="header-logo" alt="" />
                &nbsp;<strong>CIP-CD LA LIBERTAD</strong>
            </h3><br>
        <!--</div>-->
                        </div>
                        <!--</div>-->
                    </div>
                    <div class="status-widgets">
                        <!--<div class="row-fluid">-->
                        <div class="span4">
                            <div class="widget grey clearfix">
                                <div class="options">
                                    <ul>
                                        <li><a><i class="icon-cog"></i></a></li>
                                        <li><a><i class="icon-refresh"></i></a></li>
                                    </ul>
                                    <i class="icon-windows"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        Registro de Usuarios
                                    </div>
                                    <div class="description">
                                        Accederas a nuestros servicios.
                                    </div>
                                </div>
                                <a href="http://www.cip-trujillo.org/registroexterno/registro" class="more"><i class="icon-arrow-right"></i></a>
                            </div>
                        </div>

                        <!--</div>-->
                    </div>
                    <div class="status-widgets">
                        <div class="span4">
                            <div class="widget blue clearfix">
                                <div class="options">
                                    <ul>
                                        <li><a><i class="icon-cog"></i></a></li>
                                        <li><a><i class="icon-refresh"></i></a></li>
                                    </ul>
                                    <i class="icon-android"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        Recuper. Contraseña
                                    </div>
                                    <div class="description">
                                        Recuperación de contraseña.
                                    </div>
                                </div>
                                <a href="http://www.cip-trujillo.org/registroexterno/recuperarclave" class="more"><i class="icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="status-widgets">
                        <div class="span4">
                            <div class="widget red clearfix">
                                <div class="options">
                                    <ul>
                                        <li><a><i class="icon-cog"></i></a></li>
                                        <li><a><i class="icon-refresh"></i></a></li>
                                    </ul>
                                    <i class="icon-group"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        Chat en Vivo
                                    </div>
                                    <div class="description">
                                        Comunicate por esta via de acceso.
                                    </div>
                                </div>
                                <a href="/ayuda/client.php?locale=sp&amp;style=original" class="more" target="_blank" onClick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open('/ayuda/client.php?locale=sp&amp;style=original&amp;url='+escape(document.location.href)+'&amp;referrer='+escape(document.referrer), 'webim', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;"><i class="icon-arrow-right"></i></a>
                                <!--<a href="" class="more"><i class="icon-arrow-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                    <div class="status-widgets">
                        <div class="span4">
                            <div class="widget orange clearfix">
                                <div class="options">
                                    <ul>
                                        <li><a><i class="icon-cog"></i></a></li>
                                        <li><a><i class="icon-refresh"></i></a></li>
                                    </ul>
                                    <i class="icon-facebook-sign"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        Facebook
                                    </div>
                                    <div class="description">
                                        Nuestra red social 
                                    </div>
                                </div>
                                <a href="https://www.facebook.com/CipLaLibertad" target="_blank" class="more"><i class="icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    

                </div>


                <div class="span4">
                    <div class="well">
                        <div class="well-header">
                            <h5>Acceder Usuarios CIP-CDLL</h5>
                        </div>

                        <div class="well-content no_padding">
                            <ul class="rows">
                                <li style="padding: 45px">
                                    <div class="login-header bordered" style="margin-top: -30px;">
                                        <h2>Oficina Virtual CIP-CDLL</h2>
                                    </div>
                                    <!--<form>-->
                                    <div class="login-field">
                                        <label for="username">Username</label>
                                        <?php echo form_input($cajaNick); ?>
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="login-field">
                                        <label for="password">Password</label>
                                        <?php echo form_input($cajaPsw); ?>
                                        <i class="icon-lock"></i>
                                    </div>
             <div>

                                        <div class="login-field">
                                            <label>Tipo de Usuario</label>
 
                                                <table>
                                                    <tr>
                                                        <td>
                                                                                                          <select id="cbo_usu_tipo" class="span2" name="cbo_usu_tipo">
                                                    <option value="7">Colegiado</option>
                                                    <option value="2">Administrador</option>
                                                    <option value="5">Externo</option>
                                                </select>  
                                                        </td>&nbsp;
                                                        <td>
                                                             <a1 id="opener" href=""><img src="http://www.cip-trujillo.org/ver_aqui.png"></a1>
                                                        </td>
                                                    </tr>
                                                </table>

                                             <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
$(function() {
$( "#dialog" ).dialog({
autoOpen: false,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
$( "#opener" ).click(function() {
$( "#dialog" ).dialog( "open" );
});
});
</script>
<div id="dialog" title="Información Adicional">
<p>Tipos de Usuarios</p>
<p><strong>Colegiado:</strong> Usuario Agremiado que pertenece a nuestro Consejo Departamental de la Libertad.</p>
<p><strong>Administrador:</strong> Usuario administrativo del CIP-CDLL con permisos autorizados</p>
<p><strong>Externo:</strong> Usuario externo que es registrado por nuestro Sistema de "Registro de Usuarios" con permisos a nuestra biblioteca virtual.</p>
</div>
                                        </div>
                                    </div>
                                    <div class="login-button clearfix">                                        <a href="http://www.cip-trujillo.org/registroexterno/recuperarclave" role="button" data-toggle="modal">Recuperar contraseña?</a>
                                        <button type="submit" class="pull-right btn btn-large blue">INGRESAR <i class="icon-arrow-right"></i></button>
									</div>
									<div>									<p style="color: #663300">* Es recomendable utilizar navegadores como:</p>
									<div><a target="_blank" href="https://www.mozilla.org/es-ES/firefox/new/"><img src='<?php echo URL_MAIN; ?>img/firefox.png' alt="Descargar" title="Descargar"/></a><a target="_blank" href="http://www.google.com.pe/intl/es-419/chrome/"><img src='<?php echo URL_MAIN; ?>img/chrome.png' alt="Descargar" title="Descargar" /></a><img src='<?php echo URL_MAIN; ?>img/fono.png' alt="Descargar" title="Descargar" />(044) 621667</div>
                                    <!--</form>-->
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <!--</div>-->

            </div>
        </div>
    <!-- LOCKSCREEN -->

        <!-- /LOCKSCREEN -->
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script  src='<?php echo URL_JS2; ?>jquery-1.10.2.js'></script>
        <script  src='<?php echo URL_JS2; ?>jquery-ui-1.10.3.js'></script>
        <script  src='<?php echo URL_JS2; ?>bootstrap.js'></script>
        <script src='<?php echo URL_JS2; ?>library/chosen.jquery.min.js'></script>


        <script  src='<?php echo URL_JS_LI; ?>jquery.uniform.min.js'></script>


        <script src='<?php echo URL_JS_LI; ?>jquery.backstretch.min.js'></script>

        <script>
            jQuery(document).ready(function($) {
                $('.uniform').uniform();
            });

            jQuery.backstretch([
                "http://www.cip-trujillo.org/ovcipcdll/demo/slide_01.jpg", 
                "http://www.cip-trujillo.org/ovcipcdll/demo/slide_02.jpg",
                "http://www.cip-trujillo.org/ovcipcdll/demo/slide_03.jpg",
                "http://www.cip-trujillo.org/ovcipcdll/demo/slide_04.jpg"
            ],{
                duration: 5000, fade: 1000
            });
        </script>

    </body>
</html>
