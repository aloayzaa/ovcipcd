<?php

class Iepi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
         $this->load->library('ciqrcode');
        $this->load->library('html2pdf');
        
        $this->load->model('general_model', 'objEventos');
        $this->load->model('general_model', 'objPersona');
        $this->load->model('iepi/iepi_model');
        $this->load->helper('url');
        
     
        
        $this->load->model('certificado/certificados_model','',TRUE);
        
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Matricula- IEPI';
        $data['curso'] = $this->iepi_model->listar_ComboCurso();
        $data['diplomado'] = $this->iepi_model->listar_ComboDiplomado();
        $this->load->view('iepi/panel_view', $data);
    }

    function listar_inscripciones($curso) {
        if ($curso == 0) {
            
        } else {
            
            $data['evento'] = $this->iepi_model->listar_inscripciones($curso);
            if($this->iepi_model->getTipoCurso($curso)=='CURSO-IEPI'){
                 $this->load->view('iepi/qry_view', $data);
            }
            else if($this->iepi_model->getTipoCurso($curso)=='DIPLOMADO-IEPI'){
                $data['modulos']=$this->iepi_model->getModulosDiplomado($curso);
                $this->load->view('iepi/qry_view_dip', $data);
                
            }
         }
    }

    function listar_Comboinscripcion() {
        $data['evento'] = $this->busqueda_model->listar_Comboinscripcion();
        $this->load->view('busqueda/qry_view', $data);
    }

    function cbo_eventos_usuarios() {
        $result = $this->iepi_model->get_combo_cursos();
        //$result=$this->;
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }

    function get_persona_dni() {
        $valor = $this->input->post('valor');
        $evento = $this->input->post('eventos');
        if ($this->input->post('valor')) {
            $fila = $this->iepi_model->get_persona_dni($valor);
            $tipo = $this->iepi_model->getTipo();

            if ($fila) {

                $dni = $this->iepi_model->get_persona_existe($valor, $evento);

               if ($dni == true) {
                    echo 'existe';
                    exit();
                }
                if ($tipo == '2') {
                    ?>
                    <center>
                        <div class="row-fluid no-margin" style="margin:auto;width:50%;">
                            <div class="span12">
                                <ul class="quicktasks"> 
                                    <li style="width: auto">
                                        <a>
                                            <img alt="" src="<?php echo URL_IMG_DASH; ?>icons/essen/32/user.png"> 
                                            <span class="amount"><b>DNI: <?php echo strtoupper($fila->lecol); ?></b></span>
                                            <span class="description"><i><b><?php echo $fila->datos; ?></b></i></span>
                                            <span class="description"><i><b>CORREO: <?php echo $fila->correo; ?></b></i></span>
                                            <input type="hidden" value="<?php echo $fila->nPerId?>" name="hid_ins_nPerId_persona" id="hid_ins_nPerId_persona">
                                            <input id="txt_tipo" name="txt_tipo" type="hidden" value="2">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </center>
                    <?php
                }
            } else {
                $this->load->view('busqueda/ins_new');
            }
        } else {
            echo "vacio";
        }
    }

    function IepiIns() {
        $this->form_validation->set_rules('txt_nrodni', 'DNI', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->iepi_model->setLecol($this->input->post('txt_nrodni'));
             $this->iepi_model->setNota($this->input->post('txt_nota'));
            
             //$this->iepi_model->setTipoCertificado($this->input->post('tipoCertificado'));
             
            $this->iepi_model->setNombre($this->input->post('txt_ins_per_nombres'));
            $this->iepi_model->setApellidoP($this->input->post('txt_ins_per_apellidop'));
            $this->iepi_model->setApellidoM($this->input->post('txt_ins_per_apellidom'));
            $this->iepi_model->setTelcol($this->input->post('txt_ins_per_telefono'));
            $this->iepi_model->setCelcol($this->input->post('txt_ins_per_celular'));
            $this->iepi_model->setEmail($this->input->post('txt_ins_per_correo'));
            $this->iepi_model->setNEveId($this->input->post('cbo_evento_listar'));
            $this->iepi_model->setobservacion($this->input->post('txt_ins_observacion'));
            $this->iepi_model->setTipo($this->input->post('txt_tipo'));
            if($this->input->post('txt_tipo')=='2'){
                 $this->iepi_model->setNPerId($this->input->post('hid_ins_nPerId_persona'));
                
            }else {
                 $this->iepi_model->setNPerId("");
            }
            $result = $this->iepi_model->IepiIns();
            
            if ($result) {
                echo 1; //EXITO
            } else {
                echo 0; //ERROR
            }
        } else {
            $this->index();
        }
    }

    function InscripcionDel($curso,$nPerId) {
        
       $result = $this->iepi_model->InscripcionDel($curso,$nPerId);
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    function codificarcorrelativo($correlativo){
         if($correlativo<10){
                $serie='00000'.$correlativo;
            }else if($correlativo>=10&&$correlativo<100){
                $serie='0000'.$correlativo;
            }
            else if($correlativo>=100&&$correlativo<1000){
                $serie='000'.$correlativo;
            }
            else if($correlativo>=1000&&$correlativo<10000){
                $serie='00'.$correlativo;
            }
            else if($correlativo>=10000&&$correlativo<100000){
                 $serie='0'.$correlativo;
            }
            else if($correlativo>=100000&&$correlativo<1000000){
                 $serie=$correlativo;
            }
          
            return $serie;
    }
    function generarCertificadoDocente(){
        $organizadopor=$this->input->post('organizadopor');
        $curso=$this->input->post('curso');
          $grado=$this->input->post('grado');
        
        $cursoiepi=$this->iepi_model->getDiplomadoIepi($curso);
        $docenteId=$cursoiepi->nPerId;
        $nombrecurso=$cursoiepi->Nombrecurso;
        $fechainicio=$cursoiepi->fechainicio;
        $fechafin=$cursoiepi->fechafin;
        $horas=$cursoiepi->cHoras;
        
        //modifique lo de aqui
        if($cursoiepi->cFechaFin==$cursoiepi->cFechaInicio){
            $fechafin=$fechafin." del ".$cursoiepi->cFechaFin; 
        }
        else {
             $fechainicio=$fechainicio." del ".$cursoiepi->cFechaInicio; 
            $fechafin=$fechafin." del ".$cursoiepi->cFechaFin; 
        }
        
       
        
        $datosDocente=$this->iepi_model->getPersona($docenteId); 
            $nombre=$datosDocente->datos;
            $dni=$datosDocente->dni;
            
            
            $nombrescon_bajo=str_replace(' ','_',$nombre);
            
            $titulocursocon_bajo=str_replace(' ','_',$nombrecurso);
            $anio=  strftime("%Y");
            $correlativo=$this->iepi_model->getCorrelativo($docenteId,$curso);
            $serie=$this->codificarcorrelativo($correlativo);     
           
            $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
            $codigo=md5($qr);
            $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
            
           
            
            
            $image='C-'.$anio."-".$serie;
            $pdf='IEPI-'.$anio."-".$curso."-".$docenteId;
             
            
            $nombre=$grado." ".$nombre;
            $params['data'] = $md;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH.'uploads/certificados/qr/iepi/'.$image.'.png';
            $this->ciqrcode->generate($params);  

            $datos=array($docenteId, //0 nperId
                     $dni,             //1 dni
                     $nombre,          //2 nombre del alumno
                     $nombrecurso,     //3 nombre del curso 
                     $fechainicio,     //4 fecha de cuando incio el curso
                     $fechafin,        //5 fecha de cuando termino el curso
                  
                     $horas,           //6 horas academicas del curso
               
                     $image,       //7 nombre de la imagen
                     $organizadopor);  //8 organizado por
           
            $query=$this->iepi_model->certificadoCurIns($docenteId,$curso,$qr,$codigo,"qr/iepi/".$image.".png","pdf/iepi/".$pdf.".pdf",1);
                 
            $this->pdfdocentecurso($datos,$pdf);
            echo $pdf;
            
            
    }
    function pdfdocentecurso($datos,$pdf)
     {   $data['datos']=$datos;
         $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
         $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
         $this->createFolder();
         $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');
         //establecemos el nombre del archivo
         $archivo=$pdf.".pdf";
         $this->html2pdf->filename($archivo);
         $this->html2pdf->paper('a4', 'landscape');
         $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_plantilla_docentecurso', $data,true)));//certificado de curso 
        if($this->html2pdf->create('save')) 
        {  
            
        }
     }
    function generarDiplomaDocente(){
        $organizadopor=$this->input->post('organizadopor');
        $diplomado=$this->input->post('diplomado');
        $grado=$this->input->post('grado');
       
        
        $modulos=$this->iepi_model->getModulosDiplomado($diplomado); 
        $cursoiepi=$this->iepi_model->getDiplomadoIepi($diplomado);
        
        $nombrediplomado=$cursoiepi->Nombrecurso;
        $fechainicio=$cursoiepi->fechainicio;
        $fechafin=$cursoiepi->fechafin;
        $horas=$cursoiepi->cHoras;
        
        if($cursoiepi->cFechaFin==$cursoiepi->cFechaInicio){
            $fechafin=$fechafin." del ".$cursoiepi->cFechaFin; 
        }
        else {
             $fechainicio=$fechainicio." del ".$cursoiepi->cFechaInicio; 
            $fechafin=$fechafin." del ".$cursoiepi->cFechaFin; 
        }
        $cantidad=count($modulos);
        $docentes=array();
        $listado_objetos=array();
        foreach($modulos as $modulo){
        array_push($docentes,$modulo->nPerId);
        }
        $i=0;
        $docentes_conteo=array_count_values($docentes);
        foreach($docentes_conteo as $key => $value){
           // echo $key." ".$value."<br>";
            $cad=" del ";
            foreach($modulos as $modulo){
                if($value==$cantidad){
                    $cad="";
                }
                else if($modulo->nPerId==$key ){
                   $cad=$cad.$modulo->cConDipTitulo.", ";  
                }
            }
            $datosDocente=$this->iepi_model->getPersona($key); 
            $nombre=$datosDocente->datos;
            $dni=$datosDocente->dni;

            $nombrescon_bajo=str_replace(' ','_',$nombre);
            $nombre=$grado." ".$nombre;
            $titulocursocon_bajo=str_replace(' ','_',$nombrediplomado);
            $anio=  strftime("%Y");
            $correlativo=$this->iepi_model->getCorrelativoDiplomado($key,$diplomado);
            $serie=$this->codificarcorrelativo($correlativo);     
           
            $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
            $codigo=md5($qr);
               $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
            $image='D-'.$anio."-".$serie;
            $pdf='IEPI-'.$anio."-".$diplomado."-".$key;
             
            $params['data'] = $md;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH.'uploads/certificados/qr/iepi/'.$image.'.png';
            $this->ciqrcode->generate($params); 
            
            $datos=array($nombre,   // 0 nombre
                $nombrediplomado,   // 1 nombre diplomado
                $fechainicio,       // 2  fecha inicio
                $fechafin,          // 3  fecha fin
                $image,             // 4 nombre de la imagen
                $horas,             // 5 horas
                $modulos,           // 6 modulos
                $organizadopor,     // 7 organizado por
                $cad);             // 8 modulos que enseño
            
            $campo="";
              $campo['nombres'][$i]=$nombre;
              $campo['nombre_curso'][$i]=$nombrediplomado;
              $campo['fecha_inicio'][$i]=$fechainicio;
              $campo['fecha_fin'][$i]=$fechafin;
              $campo['qr'][$i]=$image;
              $campo['horas'][$i]=$horas;
              $campo['modulos']=$modulos;
              $campo['organizadopor'][$i]=$organizadopor;
              $campo['modulosdictados'][$i]=$cad;
              
              $this->pdfdocentediplomado($datos,$pdf);
              $this->iepi_model->certificadoCurIns($key,$diplomado,$qr,$codigo,"qr/iepi/".$image.".png","pdf/iepi/".$pdf.".pdf",2);
               
            array_push($listado_objetos, $campo);
            $i++;
            
        }
        $grupal='IEPI-'.$anio.'_G-'.$diplomado;
        $this->pdfdocentediplomadounido($listado_objetos,$grupal);
        echo $grupal;
        
    }
    function pdfdocentediplomado($datos,$pdf){
         $data['datos']=$datos;
         $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
         $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
         $this->createFolder();
         $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');
         //establecemos el nombre del archivo
         $archivo=$pdf.".pdf";
         $this->html2pdf->filename($archivo);
         $this->html2pdf->paper('letter', 'landscape');
        
         //$this->load->view('iepi/pdf_certificados_modulos', $data);
         $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_diplomado_docente', $data,true)));//certificado de curso 
  
            if($this->html2pdf->create('save')) 
            {  

            }
    }
    function pdfdocentediplomadounido($listado,$pdf)
    {
       $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $data['listado']=$listado;
              
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');

        $nom_archivo=$pdf.".pdf";
        $this->html2pdf->filename($nom_archivo);
        $this->html2pdf->paper('letter', 'landscape');
        $this->html2pdf->html(utf8_decode($this->load->view('iepi/diplomadodocente', $data,true)));//diploma delante 

        if($this->html2pdf->create('save')) 
        {  
        }
    } 
    function generarCertificadoModulo(){
        $inscripcion=$this->input->post('inscripcion');
        $modulo=$this->input->post('modulo');
        $fechainicio=$this->input->post('fechainicio');
        $fechafin=$this->input->post('fechafin');
         $horas=$this->input->post('horas');
         $organizadopor=$this->input->post('organizadopor');
        
        $inscripcion = substr($inscripcion, 0, -1); 
        $idInscripcion = explode(",", $inscripcion);
       
        $datosModulo=$this->iepi_model->getModulo($modulo);
        $this->iepi_model->cursoGet($datosModulo->nCurId);
     
        //echo $this->iepi_model->getNombreCurso();
        
        $datosDocente=$this->iepi_model->getPersona($datosModulo->nPerId);
        
        $diplomado=$datosModulo->nCurId;
        $nombrediplomado=$this->iepi_model->getNombreCurso();
        $nromodulo=$datosModulo->cConDipTitulo;
        $nombremodulo=$datosModulo->cConDipSumilla;
        $docente=$datosDocente->datos;
        
            $datos=explode(" ",$docente); 
            $tamano = count($datos); 
            $espacios = $tamano - 1; 
           
            if($espacios>=3){
                 $docente="";
                    $cont=0;
                    foreach($datos as $dato){
                        $cont++;
                        if($cont==2){
                            continue;
                        }
                        $docente=$docente.$dato." ";   
                    }

            }
         $listado_objetos = array();
        $i=0;
        foreach ($idInscripcion as $nPerId) {
        
            $datosAlumno=$this->iepi_model->getPersona($nPerId); 
            $dni=$datosAlumno->dni;
            $alumno=$datosAlumno->datos;
            
            
            $nombrescon_bajo=str_replace(' ','_',$alumno);
            $titulocursocon_bajo=str_replace(' ','_',$nombrediplomado);
            $anio=  strftime("%Y");
            $correlativo=$this->iepi_model->getCorrelativoDiplomado($nPerId,$diplomado);
            $serie=$this->codificarcorrelativo($correlativo);     
           
            $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
            $codigo=md5($qr);
               $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
            $image='D-'.$anio."-".$serie;
            $pdf='IEPI-'.$anio."-".$diplomado."-".$modulo."-".$nPerId;
             
            $params['data'] = $md;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH.'uploads/certificados/qr/iepi/'.$image.'.png';
            $this->ciqrcode->generate($params); 
            
            $campo="";
              $campo['nombres'][$i]=$alumno;
              $campo['nromodulo'][$i]=$nromodulo;
              $campo['nombre_modulo'][$i]=$nombremodulo;
              $campo['nombre_curso'][$i]=$nombrediplomado;
              $campo['fecha_inicio'][$i]=$fechainicio;
              $campo['fecha_fin'][$i]=$fechafin;
              $campo['docente_curso'][$i]=$docente;
              $campo['qr'][$i]=$image;
              $campo['horas'][$i]=$horas;
              $campo['organizadopor'][$i]=$organizadopor;
              $i++;
               array_push($listado_objetos, $campo);
             //
              $datos=array($nPerId,   //0 nperId
                    $dni,             //1 dni
                    $alumno,          //2 nombre del alumno
                    $nromodulo,       //3 nro del modulo
                    $nombremodulo,    //4 nombre del modulo
                    $nombrediplomado, //5nombre del diplomado
                    $fechainicio,     //6 fecha de cuando incio el curso
                    $fechafin,        //7 fecha de cuando termino el curso
                    $docente,         //8 nombre del docente
                    $horas,           //9 horas academicas del curso
                    $image,            //10 nombre de la imagen
                    $organizadopor); //11 organizador por 
              
                    
                     $query=$this->iepi_model->certificadoDipIns($nPerId,$modulo,$qr,$codigo,"qr/iepi/".$image.".png","pdf/iepi/".$pdf.".pdf");
                     $this->iepi_model->iepiEmitir($nPerId,$diplomado);
                     $this->pdfModulos($datos,$pdf);

           } 
           $this->pdfunidoModulos($listado_objetos,'IEPI-'.$anio."_G-".$diplomado.'-'.$modulo.".pdf"); 
           echo 1;
           
           
       }
       function pdfModulos($datos,$pdf){
          $data['datos']=$datos;
         $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
         $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
         $this->createFolder();
         $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');
         //establecemos el nombre del archivo
         $archivo=$pdf.".pdf";
         $this->html2pdf->filename($archivo);
         $this->html2pdf->paper('a4', 'landscape');
        
         //$this->load->view('iepi/pdf_certificados_modulos', $data);
         $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_certificados_modulos', $data,true)));//certificado de curso 
  
            if($this->html2pdf->create('save')) 
            {  

            }
        }
        function pdfunidoModulos($listado,$nombre)
        {
            $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
            $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
            $data['listado']=$listado;
            //18166268

            $this->createFolder();
            $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');

            $nom_archivo=$nombre;
            $this->html2pdf->filename($nom_archivo);
            $this->html2pdf->paper('a4', 'landscape');


            $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_certificados_modulos_unido', $data,true)));//certificado de curso delante

            if($this->html2pdf->create('save')) 
            {  
                //$this->show($nom_archivo);
            }
        } 
       
    function generarCertificadoCur(){
        $curso=$this->input->post('curso');
        $inscripcion=$this->input->post('inscripcion');
        $organizadopor=$this->input->post('organizadopor');
             
        $inscripcion = substr($inscripcion, 0, -1); 
        $idInscripcion = explode(",", $inscripcion);
        $listado_objetos = "";
        $listado_objetos = array();
       
        $j=0;
        $tipo=0;
        $tipocurso=$this->iepi_model->getTipoCurso($curso);
        if($tipocurso=='CURSO-IEPI'){
             $tipo=1;           
        }
        else if($tipocurso=='DIPLOMADO-IEPI') {
            $tipo=2;
            $modulos=$this->iepi_model->getModulosDiplomado($curso);
        }
        
         $i=0;
        foreach ($idInscripcion as $nPerId) {
        
            $query=$this->iepi_model->getDatosCertificado($nPerId,$curso); 
          
            $nPerId=$this->iepi_model->getNPerId();
            $dni=$this->iepi_model->getDni();
            $alumno=$this->iepi_model->getAlumno();
            $nombrecurso=$this->iepi_model->getNombreCurso();
            $descripcioncurso=$this->iepi_model->getDescripcionCurso();
            
            
            $fechaini=$this->iepi_model->getFechaInicio();
            $fechafin=$this->iepi_model->getFechaFin();
            $docente=$this->iepi_model->getDocente();
            $horas=$this->iepi_model->getHoras();
            $nota=$this->iepi_model->getNota(); 
             
            $datos=explode(" ",$docente); 
            $tamano = count($datos); 
            $espacios = $tamano - 1; 
            
            if($espacios>=3){
                $docente="";
                    $cont=0;
                    foreach($datos as $dato){
                        $cont++;
                        if($cont==2){
                            continue;
                        }
                        $docente=$docente.$dato." ";   
                    }

            }
            $this->iepi_model->setDocente($docente);
                                 
                                 
                     
            $campo="";
              $campo['nombres'][$i]=$alumno;
              $campo['nombre_curso'][$i]=$nombrecurso;
              $campo['descripcioncurso'][$i]=$descripcioncurso;
              $campo['fecha_inicio'][$i]=$fechaini;
              $campo['fecha_fin'][$i]=$fechafin;
              $campo['docente_curso'][$i]=$docente;
              $campo['promedio'][$i]=$nota;
              //$campo['qr'][$i]=$qr;
              $campo['horas'][$i]=$horas;
              $campo['organizadopor'][$i]=$organizadopor;
             
             if($tipo==2){
                   $campo['modulos']=$modulos;
              } 
              
            $nombrescon_bajo=str_replace(' ','_',$alumno);
            $titulocursocon_bajo=str_replace(' ','_',$nombrecurso);
            $anio=  strftime("%Y");
            
                      
            $this->iepi_model->iepiEmitir($nPerId,$curso); 
            if($query){
                if($tipocurso=='CURSO-IEPI'){
                    
                    $correlativo=$this->iepi_model->getCorrelativo($nPerId,$curso);
                    $serie=$this->codificarcorrelativo($correlativo);     
           
                    $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                     $codigo=md5($qr);
                     $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
                   
               
                     $image='C-'.$anio."-".$serie;
                     $pdf='IEPI-'.$anio."-".$curso."-".$nPerId;
                     $campo['qr'][$i]=$image;
             
                     $params['data'] = $md;
                     $params['level'] = 'H';
                     $params['size'] = 5;
                     $params['savename'] = FCPATH.'uploads/certificados/qr/iepi/'.$image.'.png';
                     $this->ciqrcode->generate($params);  
                    
                    $datos=array($this->iepi_model->getNPerId(), //0 nperId
                    $this->iepi_model->getDni(),             //1 dni
                    $this->iepi_model->getAlumno(),          //2 nombre del alumno
                    $this->iepi_model->getNombreCurso(),     //3 nombre del curso 
                    $this->iepi_model->getFechaInicio(),     //4 fecha de cuando incio el curso
                    $this->iepi_model->getFechaFin(),        //5 fecha de cuando termino el curso
                    $this->iepi_model->getDocente(),         //6 nombre del docente
                    $this->iepi_model->getHoras(),           //7 horas academicas del curso
                    $this->iepi_model->getNota(),            //8 nota q saco
                    $image,                                  //9 nombre de la imagen
                    $organizadopor);                         //10 organizado por            
                    
                    $query=$this->iepi_model->certificadoCurIns($nPerId,$curso,$qr,$codigo,"qr/iepi/".$image.".png","pdf/iepi/".$pdf.".pdf",$tipo);
                    $this->pdf($datos,$pdf,1);

                    //$query=$this->iepi_model->certificadoIns($nPerId,$curso,$qr,$codigo,$qr.".png",$qr.".pdf",$tipo);
                }
                else {
                    
                    $correlativo=$this->iepi_model->getCorrelativoDiplomado($nPerId,$curso);
                
                    $serie=$this->codificarcorrelativo($correlativo);    
                    
                    $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                    $codigo=md5($qr);
                    $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
                    
               
                     $image='D-'.$anio."-".$serie;
                     $pdf='IEPI-'.$anio."-".$curso."-".$nPerId;
                     $campo['qr'][$i]=$image;
             
                     $params['data'] = $md;
                     $params['level'] = 'H';
                     $params['size'] = 5;
                     $params['savename'] = FCPATH.'uploads/certificados/qr/iepi/'.$image.'.png';
                     $this->ciqrcode->generate($params);                
                   $datos=array($this->iepi_model->getNPerId(), //0 nperId
                    $this->iepi_model->getDni(),             //1 dni
                    $this->iepi_model->getAlumno(),          //2 nombre del alumno
                    $this->iepi_model->getNombreCurso(),     //3 nombre del curso 
                    $this->iepi_model->getFechaInicio(),     //4 fecha de cuando incio el curso
                    $this->iepi_model->getFechaFin(),        //5 fecha de cuando termino el curso
                    $this->iepi_model->getDocente(),         //6 nombre del docente
                    $this->iepi_model->getHoras(),           //7 horas academicas del curso
                    $this->iepi_model->getNota(),            //8 nota q saco
                    $image,                                  //9 nombre de la imagen
                    $modulos,                               //10 modulos  
                    $organizadopor);                       //11   organizado por                                           //10 modulos del diplomado     
                    
                   
                    $query=$this->iepi_model->certificadoCurIns($nPerId,$curso,$qr,$codigo,"qr/iepi/".$image.".png","pdf/iepi/".$pdf.".pdf",$tipo);
               
                    $this->pdf($datos,$pdf,$tipo); 
                }
             }   
            else {
                echo 0;
            }
            $i++;
            array_push($listado_objetos, $campo);

              
        }
        if($tipo==1){
             $this->pdfunido($listado_objetos,'IEPI-'.$anio."_G-".$curso.'ant.pdf',11); 
             $this->pdfunido($listado_objetos,'IEPI-'.$anio."_G-".$curso.'pos.pdf',12);
        }
        else {
             $this->pdfunido($listado_objetos,'IEPI-'.$anio."_G-".$curso.'Dipant.pdf',21);
             $this->pdfunido($listado_objetos,'IEPI-'.$anio."_G-".$curso.'Dippos.pdf',22);
        }
       
       echo 1;
       // / $this->pdfunido($listado_objetos_aprobados,'aprobados_anterior'.$horario.'.pdf',2);  // tipo 2 asistio al curso y aprobo el curso delante
       // $this->pdfunido($listado_objetos_aprobados,'aprobados_posterior'.$horario.'.pdf',3);  // tipo 3 asistio al curso y aprobo el curso atras
     } 
      
     function pdf($datos,$pdf,$tipo)
     {   $data['datos']=$datos;
         $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
         $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
         $this->createFolder();
         $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');
         //establecemos el nombre del archivo
         $archivo=$pdf.".pdf";
         $this->html2pdf->filename($archivo);
         $this->html2pdf->paper('a4', 'landscape');
        
        if($tipo==1){
            $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_plantilla_certificado', $data,true)));//certificado de curso 
        }
        else {
        
             $this->html2pdf->paper('letter', 'landscape');
             $this->html2pdf->html(utf8_decode($this->load->view('iepi/diplomado', $data,true)));//certificado de diplomados
            
        }
           
        if($this->html2pdf->create('save')) 
        {  
            
        }
     }
    function pdfunido($listado,$nombre,$tipo)
    {
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $data['listado']=$listado;
        //18166268
        
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/iepi/');

        $nom_archivo=$nombre;
        $this->html2pdf->filename($nom_archivo);
        $this->html2pdf->paper('a4', 'landscape');

        if($tipo==11){
            $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_plantilla_certificado_unidoant', $data,true)));//certificado de curso delante
        }
        else if($tipo==12){
           $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_plantilla_certificado_unidopos', $data,true)));//certificado de curso atras
            
        }
        else if($tipo==21){
             $this->html2pdf->paper('letter', 'landscape');
             $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_plantilla_diploma_unidoant', $data,true)));//diploma delante 
        }
        else if($tipo==22) {
           $this->html2pdf->paper('letter', 'landscape');
           $this->html2pdf->html(utf8_decode($this->load->view('iepi/pdf_plantilla_diploma_unidopos', $data,true)));//diploma atras
        }
        
        
        if($this->html2pdf->create('save')) 
        {  
            //$this->show($nom_archivo);
        }
    } 
         
    private function createFolder(){
        if(!is_dir("./uploads/certificados/pdf"))
        {
            mkdir("./uploads/certificados/pdf/iepi", 0777);
        }
    }
    function notasUpd(){
       $nPerId= $this->input->post('nPerId');
         $curso= $this->input->post('curso');
           $nota= $this->input->post('nota');
           
        $result = $this->iepi_model->notasUpd($nPerId,$curso,$nota);
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
           
        
        
    }
}
