<?php

class Certificados extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
         $this->load->helper('file');
        $this->load->library('form_validation');
            $this->load->helper('url');
        $this->load->model('certificado/certificados_model','',TRUE);
        
       // $this->load->model('general_model', 'objEventos');
        $this->load->library('ciqrcode');
        $this->load->library('html2pdf');
        $this->load->model('iepi/iepi_model','',TRUE);
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Certificados de INFOCIP';
        $data['curso'] = $this->certificados_model->listar_ComboCurso();
        $data['diplomado'] = $this->certificados_model->listar_ComboDiplomado();
        $this->load->view('certificado/panel_view', $data);
    }
    function detalleDiplomado($nPerId,$horario) {
        $datos['nPerId']=$nPerId;
        $datos['horario']=$horario;
        $datos['cursoId']=$this->certificados_model->getCursoId($horario);
        $datos['modulos']=$this->certificados_model->getModulosDiplomado($horario);
        $datos['data'] = $this->certificados_model->getInformacion($nPerId,$horario);
        $datos['notas'] = $this->certificados_model->getNotas($nPerId,$horario);
        $datos['asistencias'] = $this->certificados_model->getAsistencias($nPerId,$horario);
        $this->load->view('certificado/detalle_view',$datos);
    }
    function cbo_cursos_usuarios($tipocurso){
        $result = $this->certificados_model->get_combo_cursos($tipocurso);
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }
    function cbo_horario($horario){
         $result = $this->certificados_model->get_combo_horario($horario);
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }
    function cbo_horario_dip($horario){
         $result = $this->certificados_model->get_combo_horario_dip($horario);
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        } 
    }
    function load_listar_view_certificados($horario) {
      //  echo $evento;
        $data['matriculas'] = $this->certificados_model->listar_certificados($horario);
        $this->load->view('certificado/qry_view', $data);
    }
    function load_listar_view_diplomas($horario){
        
        $data['modulos']=$this->certificados_model->getModulosDiplomado($horario);       
        $data['matriculas'] = $this->certificados_model->listar_certificados($horario);
        $this->load->view('certificado/qry_view_dip', $data);
        
    }
    function actualizarConceptoDiplomado(){
       $fechainicio=$this->input->post('fechainicio');
       $fechafin= $this->input->post('fechafin');
       $horas=$this->input->post('horas');
       $modulo=$this->input->post('modulo');
       $query=$this->certificados_model->actualizarConceptoDiplomado($fechainicio,$fechafin,$horas,$modulo);
        if($query){
            echo 1;
        }
        else {
            echo 0;
        }
    }
    function load_listar_view_certificados_docente($horario){
        
        $reg=$this->certificados_model->getDatosDocente($horario);
        $docente_curso=$reg->Nombre;
        $nPerId=$reg->nPerId;
        
        
        $horas=$this->certificados_model->getHorasAcademicas($horario);
        $row=$this->certificados_model->getDatosHorario($horario); 
        $nombre_curso=$row->cCurNombre;
        $fecha_inicio=$row->fechaini;        
        $fecha_fin=$row->fechafin;
        
        echo '<br>';
        echo '<center><div class="alert alert-success" role="alert"><h4 class="alert-heading">Docente del Curso</h4>'.$docente_curso.'</div>';
        echo '</center><br>';
        
            echo '<select id="grado" style="width: 80px">
                       <option value="Ing.">Ing.</option>
                       <option value="Dr.">Dr.</option>
                       <option value="Lic.">Lic.</option>
                       <option value="PhD.">PhD.</option>
                       <option value="CPC.">CPC.</option>
                   </select>';
        echo  ' <button onclick="generarCertificadoDocente()" class="btn btn-primary" id="generar">Generar Certificados</button>';
     
        
        echo '<div id="preload2"></div>';
    }
    function load_listar_view_diplomas_docente($horario){
        
         
        $reg=$this->certificados_model->getDatosDocente($horario);
        $docente_curso=$reg->Nombre;
        $nPerId=$reg->nPerId;
        
        
        $horas=$this->certificados_model->getHorasAcademicas($horario);
        $row=$this->certificados_model->getDatosHorario($horario); 
        $nombre_curso=$row->cCurNombre;
        $fecha_inicio=$row->fechaini;        
        $fecha_fin=$row->fechafin;
        
        echo '<br>';
        echo '<center><div class="alert alert-success" role="alert"><h4 class="alert-heading">Docente del Diplomado</h4>'.$docente_curso.'</div>';
        echo '</center><br>';
        
          echo '<select id="grado1" style="width: 80px">
                       <option value="Ing.">Ing.</option>
                       <option value="Dr.">Dr.</option>
                       <option value="Lic.">Lic.</option>
                       <option value="PhD.">PhD.</option>
                       <option value="CPC.">CPC.</option>
                   </select>';
        
        
        echo  '<button onclick="generarDiplomaDocente()" class="btn btn-primary" id="generar">Generar Certificados</button>';
        echo '<div id="preload3"></div>';
    }
    function generarCertificadoDocente($horario){
        $grado=$this->input->post('grado');
        $reg=$this->certificados_model->getDatosDocente($horario);
        $docente_curso=$reg->Nombre;
        $nPerId=$reg->nPerId;
        
        
        $horas=$this->certificados_model->getHorasAcademicas($horario);
        $row=$this->certificados_model->getDatosHorario($horario); 
        $nombre_curso=$row->cCurNombre;
        $fecha_inicio=$row->fechaini;        
        $fecha_fin=$row->fechafin;
        $nCurId=$row->nCurId;
        if($row->cHorFechaFin==$row->cHorFechaInicio){
            $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
        }else{
             $fecha_inicio=$fecha_inicio." del ".$row->cHorFechaInicio;
             $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
        }
        
        
        
              
            $nombrescon_bajo=str_replace(' ','_',$docente_curso);
            $docente_curso=$grado." ".$docente_curso;
            $titulocursocon_bajo=str_replace(' ','_',$nombre_curso);
            $anio=  strftime("%Y");
            
            $correlativo=$this->certificados_model->getCorrelativo($nPerId,$nCurId);
            $serie=$this->codificarcorrelativo($correlativo);     
           
            $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
            $codigo=md5($qr);
            $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
           
            $image='C-'.$anio."-".$serie;
            $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId;
             
            $params['data'] = $md;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
            $this->ciqrcode->generate($params);  
         
            $query=$this->certificados_model->certificadoCurIns($nPerId,$nCurId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf",1);
          
            $this->pdf($docente_curso,$nombre_curso,$fecha_inicio,$fecha_fin,$docente_curso,-1,$image,$horas,"",$pdf);
             
            echo $pdf;
    }
    function generarDiplomaDocente($horario){
         $grado=$this->input->post('grado');
        $reg=$this->certificados_model->getDatosDocente($horario);
        $docente_curso=$reg->Nombre;
        $nPerId=$reg->nPerId;
              
        $horas=$this->certificados_model->getHorasAcademicas($horario);
        $row=$this->certificados_model->getDatosHorario($horario); 
        $nombre_curso=$row->cCurNombre;
        $fecha_inicio=$row->fechaini;        
        $fecha_fin=$row->fechafin;
        $nCurId=$row->nCurId;
        
        if($row->cHorFechaFin==$row->cHorFechaInicio){
            $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
        }else{
             $fecha_inicio=$fecha_inicio." del ".$row->cHorFechaInicio;
             $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
        }
        
               
         $modulos=$this->certificados_model->getModulosDiplomado($horario);
         
            $nombrescon_bajo=str_replace(' ','_',$docente_curso);
            $docente_curso=$grado." ".$docente_curso;
            $titulocursocon_bajo=str_replace(' ','_',$nombre_curso);
            $anio=  strftime("%Y");
            
            $correlativo=$this->certificados_model->getCorrelativoDiplomado($nPerId,$nCurId);
            $serie=$this->codificarcorrelativo($correlativo);     
           
            $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
            $codigo=md5($qr);
            $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
         
            $image='D-'.$anio."-".$serie;
            $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId;
             
            $params['data'] = $md;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
            $this->ciqrcode->generate($params);  
         
         
            $datos=array($nPerId,         //0
                      $docente_curso,     //1 nombre alumno
                      $nombre_curso,    //2 nombre del diplomado
                      $fecha_inicio,    //3 fecha inicio
                      $fecha_fin,       //4 fecha fin
                      $modulos,         //5 modulos del diplomado
                      $horas,           //6 horas academicas del diplomado
                     $image,              //7 nombre de la imagen
                  );
            
            $query=$this->certificados_model->certificadoCurIns($nPerId,$nCurId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf",2);
          
            $this->pdfdiplomadodocente($datos,$pdf);
            
            echo $pdf;
    }
    function generarCertificadoDip(){
        $nPerId=$this->input->post('alumno');
        $horario=$this->input->post('horario');
        $nromodulo=$this->input->post('nromodulo');
             
        $row= $this->certificados_model->getDatosCertificado($nPerId,$horario); 
           
        $nombres= $row->Nombre;
        $dni= $row->dni;  
        $nCurId=$row->CursoId;
        $nombre_curso=$row->Nombrecurso;
        $fecha_inicio=$row->fechaini;
        $fecha_fin=$row->fechafin;
        
        if($row->cHorFechaFin==$row->cHorFechaInicio){
            $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
        }else{
             $fecha_inicio=$fecha_inicio." del ".$row->cHorFechaInicio;
             $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
        }
        
        
        
        
        $modulos=$this->certificados_model->getModulosDiplomado($horario);
        $horas=$this->certificados_model->getHorasAcademicas($horario);
        $promedio=$this->certificados_model->getDatosPromedio($nPerId,$horario);
        
               
                $nombrescon_bajo=str_replace(' ','_',$nombres);
                $titulocursocon_bajo=str_replace(' ','_',$nombre_curso);
                $anio=  strftime("%Y");

                $correlativo=$this->certificados_model->getCorrelativoDiplomado($nPerId,$nCurId);
                $serie=$this->codificarcorrelativo($correlativo);     

                $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                $codigo=md5($qr);
                $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
                
                $image='D-'.$anio."-".$serie;
                $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId;

                $params['data'] = $md;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
                $this->ciqrcode->generate($params);  
           
           
           $datos=array($nPerId,         //0
                      $nombres,         //1 nombre alumno
                      $dni,             //2 dni del alumno
                      $nCurId,          //3 id del diplomado
                      $nombre_curso,    //4 nombre del diplomado
                      $fecha_inicio,    //5 fecha inicio
                      $fecha_fin,       //6 fecha fin
                      $modulos,         //7 modulos del diplomado
                      $horas,           //8 horas academicas del diplomado
                      $promedio,        //9 promedio 
                      $image,              //10 nombre de la imagen
                  );
           $ultimo=end($modulos); 
       
           if($ultimo->nConDipId==$nromodulo){
               $this->certificados_model->certificadoCurIns($nPerId,$nCurId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf",2);
               $this->pdfdiplomado($datos,$pdf);
               $this->generarCertificadoModuloAp($modulos,$datos);
               
               
           }else{
               $this->generarCertificadoModuloAs($modulos,$nromodulo,$datos);
           }
           
         echo 1;  
           
    }
    function generarCertificadoModuloAp($modulos,$datos){
        $i=0;$campo="";
           $listado_objetos = array();
           $nPerId=$datos[0];$alumno=$datos[1];$dni=$datos[2];$nCurId=$datos[3];$nombrediploma=$datos[4];
        
        foreach($modulos as $modulo){
             $datosModulo=$this->certificados_model->getModulo($modulo->nConDipId);
             $campo['nromodulo'][$i]=$datosModulo->cConDipTitulo;
             $campo['nombre_modulo'][$i]=$datosModulo->cConDipSumilla;
             if($datosModulo->cFechaInicio == $datosModulo->cFechaFin){
                   $datosModulo->fechafin= $datosModulo->fechafin." del ".$datosModulo->cFechaFin;
             } 
             else {
                 $datosModulo->fechainicio= $datosModulo->fechainicio." del ".$datosModulo->cFechaInicio;
                 $datosModulo->fechafin= $datosModulo->fechafin." del ".$datosModulo->cFechaFin;
           
             }
                         
             $campo['fecha_inicio'][$i]=$datosModulo->fechainicio;
             $campo['fecha_fin'][$i]=$datosModulo->fechafin;
             $campo['horas'][$i]=$datosModulo->nHoras;
             
             
             
             $datosDocente=$this->certificados_model->getPersona($datosModulo->nPerId);
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
             else{
               $docente=$datosDocente->datos;
            }
             
                $nombrescon_bajo=str_replace(' ','_',$alumno);
                $titulocursocon_bajo=str_replace(' ','_',$nombrediploma);
                $anio=  strftime("%Y");

                $correlativo=$this->certificados_model->getCorrelativoDiplomado($nPerId,$modulo->nConDipId);
                $serie=$this->codificarcorrelativo($correlativo);     

                $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                 $codigo=md5($qr);
                 $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
               
                $image='D-'.$anio."-".$serie;
                $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId."-".$modulo->nConDipId;

                $params['data'] = $md;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
                $this->ciqrcode->generate($params);
             
                       

             $campo['docente_curso'][$i]=$docente;
             $campo['nombres'][$i]=$alumno;
             $campo['nombre_curso'][$i]=$nombrediploma;
           
             $campo['qr'][$i]=$image;
             array_push($listado_objetos, $campo); 
             $i++;
             $data=array($alumno,                     //0nombres del alumno
                          $datosModulo->cConDipTitulo,      //1nro de modulo
                          $datosModulo->cConDipSumilla,   //2nombre del modulo
                          $datosModulo->fechainicio,     //3 fecha inicio del modulo
                          $datosModulo->fechafin,       //4 fecha fin del modulo
                          $datosModulo->nHoras,          //5 horas del modulo
                          $docente,                       //6 docente del modulo
                          $image ,                            //7 nombre de la imagen
                          $nombrediploma                      //8 nombre diplomado
                            );
    
           $this->pdfModulos($data,'AP',$pdf);
           $this->certificados_model->certificadoDipIns($nPerId,$modulo->nConDipId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf");
        
        }
        $nombre='INFOCIP-'.$anio.'_G-Modulos';
       $this->pdfunidoModulos($listado_objetos,$nombre.".pdf",'AP');
        
    }
    
    function generarCertificadoModuloAs($modulos,$nromodulo,$datos){
         $i=0;$campo="";
           $listado_objetos = array();
           $nPerId=$datos[0];$alumno=$datos[1];$dni=$datos[2];$nombrediploma=$datos[4];
        
        foreach($modulos as $modulo){
            if($modulo->nConDipId!=$nromodulo){
             $datosModulo=$this->certificados_model->getModulo($modulo->nConDipId);
             $campo['nromodulo'][$i]=$datosModulo->cConDipTitulo;
             $campo['nombre_modulo'][$i]=$datosModulo->cConDipSumilla;
             
             if($datosModulo->cFechaInicio == $datosModulo->cFechaFin){
                   $datosModulo->fechafin= $datosModulo->fechafin." del ".$datosModulo->cFechaFin;
             } 
             else {
                 $datosModulo->fechainicio= $datosModulo->fechainicio." del ".$datosModulo->cFechaInicio;
                 $datosModulo->fechafin= $datosModulo->fechafin." del ".$datosModulo->cFechaFin;
           
             }
                     
             
             $campo['fecha_inicio'][$i]=$datosModulo->fechainicio;
             $campo['fecha_fin'][$i]=$datosModulo->fechafin;
             $campo['horas'][$i]=$datosModulo->nHoras;
             $nCurId=$datosModulo->nCurId;
             $datosDocente=$this->certificados_model->getPersona($datosModulo->nPerId);
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
               }else{
               $docente=$datosDocente->datos;
            }
            
             
                $nombrescon_bajo=str_replace(' ','_',$alumno);
                $titulocursocon_bajo=str_replace(' ','_',$nombrediploma);
                $anio=  strftime("%Y");

                $correlativo=$this->certificados_model->getCorrelativoDiplomado($nPerId,$modulo->nConDipId);
                $serie=$this->codificarcorrelativo($correlativo);     

                $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                $codigo=md5($qr);
                 $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
                
                $image='D-'.$anio."-".$serie;
                $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId."-".$modulo->nConDipId;

                $params['data'] = $md;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
                $this->ciqrcode->generate($params);
             
             $campo['docente_curso'][$i]=$docente;
             $campo['nombres'][$i]=$alumno;
             $campo['nombre_curso'][$i]=$nombrediploma;
             $campo['qr'][$i]=$image;
             array_push($listado_objetos, $campo); 
             $i++;
             $data=array($alumno,                     //0nombres del alumno
                          $datosModulo->cConDipTitulo,      //1nro de modulo
                          $datosModulo->cConDipSumilla,   //2nombre del modulo
                          $datosModulo->fechainicio,     //3 fecha inicio del modulo
                          $datosModulo->fechafin,       //4 fecha fin del modulo
                          $datosModulo->nHoras,          //5 horas del modulo
                          $docente,                       //6 docente del modulo
                          $image,                            //7 nombre de la imagen
                          $nombrediploma                      //8 nombre diplomado
                            );

             $this->pdfModulos($data,'AS',$pdf);
            
             $this->certificados_model->certificadoDipIns($nPerId,$modulo->nConDipId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf");
         
            }
            else {
                     $datosModulo=$this->certificados_model->getModulo($modulo->nConDipId);
             $campo['nromodulo'][$i]=$datosModulo->cConDipTitulo;
             $campo['nombre_modulo'][$i]=$datosModulo->cConDipSumilla;
              if($datosModulo->cFechaInicio == $datosModulo->cFechaFin){
                $datosModulo->fechafin= $datosModulo->fechafin." del ".$datosModulo->cFechaFin;
             } 
             else {
                 $datosModulo->fechainicio= $datosModulo->fechainicio." del ".$datosModulo->cFechaInicio;
                 $datosModulo->fechafin= $datosModulo->fechafin." del ".$datosModulo->cFechaFin;
           
             }
             
             
             
             
             $campo['fecha_inicio'][$i]=$datosModulo->fechainicio;
             $campo['fecha_fin'][$i]=$datosModulo->fechafin;
             $campo['horas'][$i]=$datosModulo->nHoras;
             $nCurId=$datosModulo->nCurId;
             $datosDocente=$this->certificados_model->getPersona($datosModulo->nPerId);
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
               }else{
               $docente=$datosDocente->datos;
            }
            
             
                $nombrescon_bajo=str_replace(' ','_',$alumno);
                $titulocursocon_bajo=str_replace(' ','_',$nombrediploma);
                $anio=  strftime("%Y");

                $correlativo=$this->certificados_model->getCorrelativoDiplomado($nPerId,$modulo->nConDipId);
                $serie=$this->codificarcorrelativo($correlativo);     

                $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                $codigo=md5($qr);
                $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
                
                $image='D-'.$anio."-".$serie;
                $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId."-".$modulo->nConDipId;

                $params['data'] = $md;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
                $this->ciqrcode->generate($params);
             
             
        
             $campo['docente_curso'][$i]=$docente;
             $campo['nombres'][$i]=$alumno;
             $campo['nombre_curso'][$i]=$nombrediploma;
             $campo['qr'][$i]=$image;
             array_push($listado_objetos, $campo); 
             $i++;
             $data=array($alumno,                     //0nombres del alumno
                          $datosModulo->cConDipTitulo,      //1nro de modulo
                          $datosModulo->cConDipSumilla,   //2nombre del modulo
                          $datosModulo->fechainicio,     //3 fecha inicio del modulo
                          $datosModulo->fechafin,       //4 fecha fin del modulo
                          $datosModulo->nHoras,          //5 horas del modulo
                          $docente,                       //6 docente del modulo
                          $image,                            //7 nombre de la imagen
                          $nombrediploma                      //8 nombre diplomado
                            );

             $this->pdfModulos($data,'AS',$pdf);
            
               $this->certificados_model->certificadoDipIns($nPerId,$modulo->nConDipId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf");
               break;
            }
        }
         $nombre='INFOCIP-'.$anio.'_G-Modulos';
       $this->pdfunidoModulos($listado_objetos,$nombre.".pdf",'AS');
      //  $this->pdfunidoModulos($listado_objetos,"certificados_modulos_infocip.pdf",'AS');
      
        
    }
    function pdfModulos($datos,$tipo,$pdf){
          $data['datos']=$datos;
         $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
  $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
         $this->createFolder();
         $this->html2pdf->folder('./uploads/certificados/pdf/infocip/');
         //establecemos el nombre del archivo
         $archivo=$pdf.".pdf";
         $this->html2pdf->filename($archivo);
         $this->html2pdf->paper('a4', 'landscape');
         //$this->load->view('certificado/pdf_certificados_modulos', $data);
         if($tipo=='AP'){
         $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificados_modulos', $data,true)));//certificado de curso 
         }
         else {
            $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificados_modulosAS', $data,true)));//certificado de curso 
         }
            if($this->html2pdf->create('save')) 
            {  

            }
    }
    function pdfunidoModulos($listado,$nombre,$tipo)
    {
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
     $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $data['listado']=$listado;
        //18166268
        
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/infocip/');

        $nom_archivo=$nombre;
        $this->html2pdf->filename($nom_archivo);
        $this->html2pdf->paper('a4', 'landscape');

        if($tipo=='AP'){
        $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificados_modulos_unido', $data,true)));//certificado de curso delante
        }
        else {
            $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificados_modulosAS_unido', $data,true)));//certificado de curso delante
        
        }
        
        
        if($this->html2pdf->create('save')) 
        {  
            //$this->show($nom_archivo);
        }
    }
     function pdfdiplomadodocente($datos,$pdf)
    {
               
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data['datos']=$datos;
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/infocip/');
        
        $archivo=$pdf.".pdf";
        $this->html2pdf->filename($archivo);
       
        $this->html2pdf->paper('letter', 'landscape');// poner esto para imprimir diplomadosssss
        //$this->load->view('certificado/diplomado', $data);
        $this->html2pdf->html(utf8_decode($this->load->view('certificado/diplomado_docente', $data,true)));//certificado asistido
      
        if($this->html2pdf->create('save')) 
        {  
           // $this->show($archivo);
        }
    }
    
    function pdfdiplomado($datos,$pdf)
    {
               
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data['datos']=$datos;
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/infocip/');
        
        $archivo=$pdf.".pdf";
        $this->html2pdf->filename($archivo);
       
        $this->html2pdf->paper('letter', 'landscape');// poner esto para imprimir diplomadosssss
        //$this->load->view('certificado/diplomado', $data);
        $this->html2pdf->html(utf8_decode($this->load->view('certificado/diplomado', $data,true)));//certificado asistido
      
        if($this->html2pdf->create('save')) 
        {  
        }
    } 
    // estoy modificando aqui .............
    function generarCertificado(){
        $inscripcion=$this->input->post('inscripcion');
        $horario=$this->input->post('horario');
        
        $inscripcion = substr($inscripcion, 0, -1); 
        $idInscripcion = explode(",", $inscripcion);
        
        $listado_objetos = array();
        $listado_objetos_aprobados=array();
        
        $i=0;
        $j=0;
        
        foreach ($idInscripcion as $v) {
        
            $row= $this->certificados_model->getDatosCertificado($v,$horario); 
            $nPerId=$row->nPerId;
            $nombres= $row->Nombre;
            $dni= $row->dni;   
            $nombre_curso=$row->Nombrecurso;
            $descripcion_curso=$row->descripcionCurso;
            
            $fecha_inicio=$row->fechaini;
            $fecha_fin=$row->fechafin;
            $nCurId=$row->CursoId;
            if($row->cHorFechaInicio==$row->cHorFechaFin){
                $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
            }
            else {
                 $fecha_inicio=$fecha_inicio." del ".$row->cHorFechaInicio;
                 $fecha_fin=$fecha_fin." del ".$row->cHorFechaFin;
            }
            
            
            
            $reg=$this->certificados_model->getDatosDocente($horario);
            $docente_curso=$reg->Nombre;
                    
            
            $datos=explode(" ",$docente_curso); 
            $tamano = count($datos); 
            $espacios = $tamano - 1; 
         //   echo "cantidad".$espacios;
            $docente_curso="";
            if($espacios>=3){
                $cont=0;
                foreach($datos as $dato){
                    //echo "dato".$dato."\n";
                    $cont++;
                    if($cont==2){
                        continue;
                    }
                    $docente_curso=$docente_curso.$dato." ";
                }
         //       echo $docente_curso;
            }
            else{
              $docente_curso=$reg->Nombre;
            }

            $horas=$this->certificados_model->getHorasAcademicas($horario);
            $promedio=$this->certificados_model->getDatosPromedio($nPerId,$horario);
            
                $nombrescon_bajo=str_replace(' ','_',$nombres);
                $titulocursocon_bajo=str_replace(' ','_',$nombre_curso);
                $anio=  strftime("%Y");

                $correlativo=$this->certificados_model->getCorrelativo($nPerId,$nCurId);
                $serie=$this->codificarcorrelativo($correlativo);     

                $qr=$nombrescon_bajo."/".$titulocursocon_bajo."/".$anio."-".$serie;
                 $codigo=md5($qr);
                 $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
               
                $image='C-'.$anio."-".$serie;
                $pdf='INFOCIP-'.$anio."-".$nCurId."-".$nPerId;

                $params['data'] = $md;
                $params['level'] = 'H';
                $params['size'] = 5;
                $params['savename'] = FCPATH.'uploads/certificados/qr/infocip/'.$image.'.png';
                $this->ciqrcode->generate($params);  
         
            
            if($promedio<14){
          
              $campo['nombres'][$i]=$nombres;
              $campo['nombre_curso'][$i]=$nombre_curso;
              $campo['fecha_inicio'][$i]=$fecha_inicio;
              $campo['fecha_fin'][$i]=$fecha_fin;
              $campo['docente_curso'][$i]=$docente_curso;
              $campo['promedio'][$i]=$promedio;
              $campo['qr'][$i]=$image;
              $campo['horas'][$i]=$horas;
              $campo['descripcion'][$i]=$descripcion_curso;
              $i++;
              array_push($listado_objetos, $campo);
            }
            else {
                $campo2['nombres'][$j]=$nombres;
                $campo2['nombre_curso'][$j]=$nombre_curso;
                $campo2['fecha_inicio'][$j]=$fecha_inicio;
                $campo2['fecha_fin'][$j]=$fecha_fin;
                $campo2['docente_curso'][$j]=$docente_curso;
                $campo2['promedio'][$j]=$promedio;
                $campo2['qr'][$j]=$image;
                $campo2['horas'][$j]=$horas;
                $campo2['descripcion'][$j]=$descripcion_curso;
                $j++;
             array_push($listado_objetos_aprobados, $campo2);
            }
                                 
            $this->certificados_model->certificadoCurIns($nPerId,$nCurId,$qr,$codigo,"qr/infocip/".$image.".png","pdf/infocip/".$pdf.".pdf",1);
            $this->certificados_model->matriculaEmitir($nPerId,$horario);
            $this->pdf($nombres,$nombre_curso,$fecha_inicio,$fecha_fin,$docente_curso,$promedio,$image,$horas,$descripcion_curso,$pdf);
         
        }
        $nombre='INFOCIP-'.$anio.'_G-'.$nCurId."-As";
        $nombre1='INFOCIP-'.$anio.'_G-'.$nCurId."-ApAnt";
        $nombre2='INFOCIP-'.$anio.'_G-'.$nCurId."-ApPos";
        $this->pdfunido($listado_objetos,$nombre.'.pdf',1); //tipo 1 asistio al curso pero no aprobo
        $this->pdfunido($listado_objetos_aprobados,$nombre1.'.pdf',2);  // tipo 2 asistio al curso y aprobo el curso delante
        $this->pdfunido($listado_objetos_aprobados,$nombre2.'.pdf',3);  // tipo 3 asistio al curso y aprobo el curso atras
     
        echo 1;
        
        }  
    
    function pdfunido($listado,$nombre,$tipo)
    {
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        
       $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $data['listado']=$listado;
        //18166268
        
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/infocip/');

        $nom_archivo=$nombre;
        $this->html2pdf->filename($nom_archivo);
        $this->html2pdf->paper('a4', 'landscape');

        if($tipo==1){
           $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificado_asistente_unido', $data,true)));// asistio pero no aprobo unido
       
        }
        else if($tipo==2) {
            //$this->load->view('certificado/pdf0', $data); 
             $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificado_aprobado_unidoAnt', $data,true)));//asisito aprobo parte delante
         }
         else if($tipo==3){
              $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificado_aprobado_unidoPos', $data,true))); // asisito aprobo  parte atras
         }
        if($this->html2pdf->create('save')) 
        {  
            //$this->show($nom_archivo);
        }
    } 
    
    function pdf($nombres,$nombre_curso,$fecha_inicio,$fecha_fin,$docente_curso,$promedio,$qr,$horas,$descripcion,$pdf)
    {
               
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data['title']='Certificados';
        $data['persona']=  $nombres;
        $data['curso']= $nombre_curso;
        
        
        $data['fechaini']= $fecha_inicio;
        $data['fechafin']= $fecha_fin;
        
        
        $data['docente']=$docente_curso;
        $data['promedio']=$promedio;
        $data['qr']= $qr;
        $data['horas']= $horas;
        $data['descripcion']= $descripcion;
        
        
       $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        
     $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        
        $this->createFolder();
 
        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./uploads/certificados/pdf/infocip/');
        
        //establecemos el nombre del archivo
        $archivo=$pdf.".pdf";
        $this->html2pdf->filename($archivo);
        
        //establecemos el tipo de papel
        $this->html2pdf->paper('a4', 'landscape');
        if($promedio>=14){
          // $this->load->view('certificado/pdf', $data); 
           $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificado_aprobado', $data,true)));//certificado aprobado
         
        } else if($promedio<=14&&$promedio>=10) {
           //  $this->load->view('certificado/pdf3', $data); 
           $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_certificado_asistente', $data,true)));//certificado asistido
        }
        else if($promedio==-1){ // ceritificado para docente
           $this->html2pdf->html(utf8_decode($this->load->view('certificado/pdf_plantilla_certificado_docente', $data,true)));
         }
         //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save')) 
        {  
         //   $this->show($archivo);
        }
    } 
    
    private function createFolder()
    {
       /* if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs", 0777);
        }*/
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
   
}
    

