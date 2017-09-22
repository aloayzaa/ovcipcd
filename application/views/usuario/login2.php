<!doctype html>
<html lang="en">
    <head>
        <title>OFICINA VIRTUAL CIP-CDLL</title>

         Mobile Specific Metas 
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>bootstrap/bootstrap.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>bootstrap/bootstrap-responsive.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>supr-theme/jquery.ui.supr.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>icons.css'>
        <link rel="stylesheet" href='<?php echo URL_CSS; ?>main.css'>
        <link rel="stylesheet" href='<?php echo URL_PLUG; ?>uniform/uniform.default.css'>
        <link rel="stylesheet" href='<?php echo URL_JS; ?>jsValida.js'>


        <link rel="shortcut icon" href='<?php echo URL_IMG; ?>favicon.ico'>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href='<?php echo URL_IMG; ?>apple-touch-icon-144-precomposed.png'>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href='<?php echo URL_IMG; ?>apple-touch-icon-114-precomposed.png'>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href='<?php echo URL_IMG; ?>apple-touch-icon-72-precomposed.png'>
        <link rel="apple-touch-icon-precomposed" href='<?php echo URL_IMG; ?>apple-touch-icon-57-precomposed.png'>
   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>


    <body class="loginPage">

        <div class="container-fluid">

            <div id="header">

                <div class="row-fluid">

                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <a class="brand" href="dashboard.html">Oficina Virtual.<span class="slogan">Administrador</span></a>
                            </div>
                        </div> /navbar-inner 
                    </div> /navbar 
                </div> End .row-fluid 

            </div> End #header 

        </div> End .container-fluid  

        <?php
           {
        $atributosForm = array('id ' => 'loginForm', 'class' => "form-horizontal");
        echo form_open('usuario/autenticar', $atributosForm);
        $cajaNick = array('name' => 'user', 'id' => 'user', 'value' => set_value('user'), 'placeholder' => "Ej. icervantes", 'class' => "span12", 'required' => 'required');
        $cajaPsw = array('name' => 'pw', 'id' => 'pw', 'type' => 'password', 'value' => '', 'placeholder' => 'Ej. Cerdf!90Ec', 'class' => "span12", 'required' => 'required');
       
        } ?>

        <div id="login" class="container-fluid">

            <div class="loginContainer">
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div id="user" class="row-fluid">
                            <label class="form-label span12" for="username">
                                Username:
                                <span class="icon16 icomoon-icon-user-2 right gray marginR10"></span>
                            </label>
                            <?php echo form_input($cajaNick); ?>
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">
                    <div class="span12">
                        <div id="pw" class="row-fluid" >
                            <label class="form-label span12" for="password">
                                Password:
                                <span class="icon16 icomoon-icon-locked right gray marginR10"></span>
                                <span class="forgot"><a href="#">¿Olvidaste tu clave?</a></span>
                            </label>
                            <?php echo form_input($cajaPsw); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="tipusuario">
                                Tipo de Usuario:
                                 <select id="cbo_usu_tipo" style="width: 195px"  name="cbo_usu_tipo">
                                <option value="7">Colegiado</option>
                                <option value="2">Administrador</option>
                                <option value="5">Externo</option>
                            </select>
                            </label> 
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">                       
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="form-actions">
                                <div class="span12 controls">
                                    <input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Recordar mi clave
                                    <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Acceder</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php echo form_close(); ?>
                </form>
            </div>

        </div> End .container-fluid 
         Le javascript
        ================================================== 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <link rel="stylesheet" href='<?php echo URL_JS; ?>bootstrap/bootstrap.js'>
        <link rel="stylesheet" href='<?php echo URL_PLUG; ?>touch-punch/jquery.ui.touch-punch.min.js'>
        <link rel="stylesheet" href='<?php echo URL_PLUG; ?>ios-fix/ios-orientationchange-fix.js'>
        <link rel="stylesheet" href='<?php echo URL_PLUG; ?>validate/jquery.validate.min.js'>
        <script src='<?php echo URL_PLUG; ?>uniform/jquery.uniform.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function() {
//                $("#cbo_usu_tipo").change(function() {         
//             alert($(this).val()); 
//
//    }); 
                $("input, textarea, select").not('.nostyle').uniform();
            });
        </script>


         NACHALO NA TYXO.BG BROYACH 
        <script type="text/javascript">
            
            d=document;d.write('<a href="https://www.tyxo.bg/?138779" title="Tyxo.bg counter"><img width="1" height="1" border="0" alt="Tyxo.bg counter" src="'+location.protocol+'//cnt.tyxo.bg/138779?rnd='+Math.round(Math.random()*2147483647));
            d.write('&sp='+screen.width+'x'+screen.height+'&r='+escape(d.referrer)+'"></a>');
            //
        </script><noscript><a href="http://www.tyxo.bg/?138779" title="Tyxo.bg counter"><img src="https://cnt.tyxo.bg/138779" width="1" height="1" border="0" alt="Tyxo.bg counter" /></a></noscript>
         KRAI NA TYXO.BG BROYACH 
    </body>
</html>






