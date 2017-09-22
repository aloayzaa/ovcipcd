<?php

class Certificados extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('eventos/certificados_model','',TRUE);
        $this->load->model('general_model', 'objEventos');
        
        $this->load->library('ciqrcode');
        $this->load->library('html2pdf');
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Certificados';
        //$data['TEventos']=$this->eventos_model->getCapitulos();
        $this->load->view('eventos/certificados/panel_view', $data);
    }
    function cbo_eventos_usuarios(){
        $result = $this->objEventos->get_combo_eventos();
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }
    function load_listar_view_certificados($evento) {
      //  echo $evento;
        $data['tipoEvento']=$this->certificados_model->getTipoEvento($evento);
        $data['evento'] = $this->certificados_model->listar_certificados($evento);
        $this->load->view('eventos/certificados/qry_view', $data);
    }
    function generarCertificado(){
      
        $inscripcion=$this->input->post('inscripcion');
        $organizadopor=$this->input->post('organizadopor');
        $inscripcion = substr($inscripcion, 0, -1); 
        $idInscripcion = explode(",", $inscripcion);
        
         $listado_objetos = array();
            $i=0;
        foreach ($idInscripcion as $v) {
            $row= $this->certificados_model->getDatosCertificado($v);
            $idinscripcion=$row->CODIGO;
            $nPerId=$row->nPerId;
            $evento=$row->nEveId;
            $dni= $row->DNI;
            $nombres= $row->NOMBRES;
            $titulo_evento=$row->titulo;
            $fecha_evento=$row->fecha_evento;
            $horas=$row->Horas;
            $tipo_evento=$row->nEveTipoEvento;
            $tipocertificado=$row->ctipoCertificado;
           /* if($tipocertificado=='PAR'){
                $tipocertificado='Asistente';
            }else if($tipocertificado=='EXP'){
                $tipocertificado='Expositor';
            }*/
            if($tipocertificado=='PAR'){
                $tipocertificado='Asistente';
                if($this->certificados_model->verificarcolegiado($nPerId)>0){
                $nombres="Ing. ".$nombres;
                 }
            }else if($tipocertificado=='EXP/Ing.'){
                $tipocertificado='Expositor';
                $nombres="Ing. ".$nombres;
            }else if($tipocertificado=='EXP/Dr.'){
                $tipocertificado='Expositor';
                $nombres="Dr. ".$nombres;
            }else if($tipocertificado=='EXP/Lic.'){
                $tipocertificado='Expositor';
                $nombres="Lic. ".$nombres;
            }else if($tipocertificado=='EXP/PhD.'){
                $tipocertificado='Expositor';
                $nombres="PhD. ".$nombres;
            }else if($tipocertificado=='EXP/CPC.'){
                $tipocertificado='Expositor';
                $nombres="CPC. ".$nombres;
            } 
            else if($tipocertificado=='ORG'){
                $tipocertificado='Organizador';
               if($this->certificados_model->verificarcolegiado($nPerId)>0){
                $nombres=" ".$nombres;
                 }
            } 
            else if($tipocertificado=='PAN'){
                $tipocertificado='Personal de Apoyo';
               //if($this->certificados_model->verificarcolegiado($nPerId)>0){
                $nombres="Ing. ".$nombres;
                 //}
            }
            //condicion riesgoza < 100 - Samuel.
            if($tipo_evento<104 && $tipo_evento>0){
            //$tipoevento="La Comisión de Seguridad y Salud Ocupacional del CIP-CDLL";
                                $tipoevento = "el Capítulo de Ingeniería " . $this->certificados_model->getCapitulo($tipo_evento);
                //$tipoevento=$organizadopor;
                              $cargo="Presidente Capítulo de Ingeniería ".$this->certificados_model->getCapitulo($tipo_evento);
            switch ($tipo_evento){
              case 1: $presidente="Zulma Coral Gonzales";$firma="agricola.png"; break;
                case 2: $presidente="Jorge Cortez Rodríguez";$firma="agronomica.png"; break;
                case 3: $presidente="Rolando Ochoa Zevallos";$firma="civiles.png"; break;
                case 4: $presidente="Cesar Benites La Portilla";$firma="minas.png"; break;
                case 5: $presidente="José Luna Victoria Vittery";$firma="industrial.png"; break;
                case 6: $presidente="Ernesto Paul Rodríguez Sánchez";$firma="mecanica.png"; break;
                case 8: $presidente="Manuel Vera Herrera";$firma="quimica.png"; break;
                case 9:  $presidente="Gilmar Mendoza Ordoñez";$firma="zootecnia.png";break;
                case 10:  $presidente="José Luis Madrid Renteria";$firma="sistemas.png";break;
                case 11: $presidente="Kalun José Lau Gan";$firma="electronica.png"; break;
                //Agregados por Ing. ICP
                case 100: $presidente="Luis Mesones Odar";$firma="decano.png";$cargo="Decano"; $tipoevento="El Consejo Departamental de La Libertad"; break;
                //case 101: $presidente="Jorge Luis Paredes Estacio";$firma="expositor.png"; $cargo="Presidente del Centro de Peritaje CDLL";$tipoevento="El Centro de Peritaje del Consejo Departamental de La Libertad"; break;
                 //case 100: $presidente="Miguel Solano Ortiz";$firma="expositor.png"; $cargo="Vice-Presidente Comisión <br>GRD-CDLL";$tipoevento="La Comisión Gestión del Riesgo de Desastres"; break;
                //case 101: $presidente="Neisser Joselito Mendoza León";$firma="expositor.png"; $cargo="Presidente del Comité Local Chepen-Guadalupe - CDLL";$tipoevento="El Comité Local Chepen-Guadalupe del Consejo Departamental de La Libertad"; break;
                //case 101: $presidente="Jorge Luis Paredes Estacio";$firma="expositor.png"; $cargo="Expositor";$tipoevento="El Consejo Departamental de La Libertad en Convenio con CHASKA CAPACITACIONES EIRL."; break;
                //case 101: $presidente="Manuel E. García Naranjo Bustos";$firma="expositor.png"; $cargo="Expositor";$tipoevento="El Consejo Departamental de La Libertad en Convenio con CHASKA CAPACITACIONES EIRL."; break;
                 //case 101: $presidente="Miguel Alberto Salinas Seminario";$firma="expositor.png"; $cargo="Expositor";$tipoevento="El Consejo Departamental de La Libertad en Convenio con CHASKA CAPACITACIONES EIRL."; break;
                case 101: $presidente="Néstor W. Huamán Guerrero";$firma="expositor.png"; $cargo="Expositor";$tipoevento="El Consejo Departamental de La Libertad en Convenio con CHASKA CAPACITACIONES EIRL."; break;
                //case 101: $presidente="Pedro Gaitán Benites";$firma="expositor.png"; $cargo="Presidente del Comité Local de Huamachuco";$tipoevento="El Comité Local Huamachuco del Consejo Departamental de La Libertad"; break;
                //case 101: $presidente="Juan Jose Jhong Junchaya";$firma="expositor.png"; $cargo="Expositor";$tipoevento="El Centro de Peritaje del Consejo Departamental de La Libertad"; break;
                case 102: $presidente="ROGER LEÓN DÍAZ";$firma="iepi.png";$cargo="Presidente del IEPI"; $tipoevento="El Instituto de Estudios Profesionales de Ingeniería (IEPI) del Consejo Departamental de La Libertad"; break;
                //case 102: $presidente="Aldo Torres Lopez";$firma="iepi.png";$cargo="Expositor"; $tipoevento="El Instituto de Estudios Profesionales de Ingeniería (IEPI) del Consejo Departamental de La Libertad"; break;
                case 103: $presidente="Rafael Vergara Medina";$firma="seguridad.png"; $cargo="Presidente Comisión de Seguridad y Salud Ocupacional"; $tipoevento="La Comisión de Seguridad y Salud Ocupacional del Consejo Departamental de La Libertad";break;
                case 104: $presidente="FILIBERTO AZABACHE FERNÁNDEZ";$firma="supervisores.png"; $cargo="Presidente de Comisión de Asuntos Municipales";break;
                //case 101: $presidente="Miguel Solano Ortiz";$firma="expositor.png"; $cargo="Vice-Presidente Comisión GRD-CDLL";$tipoevento="La Comisión Gestión del Riesgo de Desastres"; break;
                }
            }else {
                $tipoevento=$organizadopor;
                $presidente="Tito Burgos Sarmiento";
                $firma="secretario.png";
                $cargo="Director Secretario CIP-CDLL";
            }
            
            $nombrescon_bajo=str_replace(' ','_',$row->NOMBRES);
            $tituloeventocon_bajo=str_replace(' ','_',$titulo_evento);
            $anio=  strftime("%Y");
            $correlativo=$this->certificados_model->getCorrelativo($nPerId,$evento);
                     
            
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
            $qr=$nombrescon_bajo."/".$tituloeventocon_bajo."/".$anio."-".$serie;
            $codigo=md5($qr);
            $md="http://www.cip-trujillo.org/verificar_cer.php?verifica=".$codigo;
            $image='E-'.$anio."-".$serie;
            $pdf='EVE-'.$anio."-".$evento."-".$nPerId;
            

            $params['data'] = $md;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH.'uploads/certificados/qr/eventos/'.$image.'.png';
            //generamos el código qr
            $this->ciqrcode->generate($params);    
            //echo '<img src="'.base_url().'qr_code/qrcode_'.$dni.'.png" />';
            
            $campo="";     
            
            
              $campo['nombres'][$i]=$nombres;
              $campo['titulo_evento'][$i]=$titulo_evento;
              $campo['fecha_evento'][$i]=$fecha_evento;
              $campo['dni'][$i]=$dni;
              $campo['horas'][$i]=$horas;
              $campo['tipoevento'][$i]=$tipoevento;
              $campo['tipo_evento'][$i] = $tipo_evento;
              $campo['evento'][$i]=$evento;
              $campo['presidente'][$i]=$presidente;
              $campo['cargo'][$i]=$cargo;
              $campo['tipocertificado'][$i]=$tipocertificado;
              $campo['image'][$i]=$image;
                $campo['firma'][$i]=$firma;

              
              $i++;
              array_push($listado_objetos, $campo);
               $query=$this->certificados_model->certificadoIns($nPerId,$evento,$qr,$codigo,"qr/eventos/".$image.".png","pdf/eventos/".$pdf.".pdf");  
                $this->certificados_model->inscripcionEmitir($dni,$evento);
            if($query){
            }   
            else {
                echo 0;
            }
           $this->pdf($nombres,$titulo_evento,$fecha_evento,$dni,$horas,$tipoevento,$tipo_evento,$evento,$presidente,$cargo,$tipocertificado,$image,$pdf,$firma);
         
        }
        $nombre='EVE-'.$anio."_G-".$evento.".pdf";
          $this->pdfunido($listado_objetos, $nombre,$tipo_evento);
        echo 1;
      
        
        
    }
        function pdfunido($listado_objetos, $nombre,$tipo_evento) {
        //datos que queremos enviar a la vista, lo mismo de siempre
      $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        $data['listado']=$listado_objetos;
     
        $this->createFolder();
        $this->html2pdf->folder('./uploads/certificados/pdf/eventos/');

        $nom_archivo=$nombre;
        $this->html2pdf->filename($nom_archivo);
          if ($tipo_evento==101) {
            $this->html2pdf->paper('a4', 'landscape');
            $this->html2pdf->html(utf8_decode($this->load->view('eventos/certificados/pdf_plantilla_eventos_unido', $data, true)));
        } else if($tipo_evento==105){
            $this->html2pdf->paper('a4', 'landscape');
            $this->html2pdf->html(utf8_decode($this->load->view('eventos/certificados/pdf_plantilla_eventos_unido_1firma', $data, true)));
        }else {
            $this->html2pdf->paper('a4', 'portrait');
            $this->html2pdf->html(utf8_decode($this->load->view('eventos/certificados/pdf_plantilla_eventos_unido_constancia', $data, true)));
        }
        //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save')) 
        {  
            //$this->show($archivo);
        }
    }  
    
    
    
    function pdf($nombres,$titulo_evento,$fecha_evento,$dni,$horas,$tipoevento,$tipo_evento,$evento,$presidente,$cargo,$tipocertificado,$image,$pdf,$firma)
    {
        //datos que queremos enviar a la vista, lo mismo de siempre
        $data['title']='Certificados';
        $data['persona']=  $nombres;
        $data['evento']= $titulo_evento;
        $data['fecha']= $fecha_evento;
        $data['image']= $image;
        $data['horas']= $horas;
        $data['tipoevento']= $tipoevento;
                $data['tipo_evento'] = $tipo_evento;
        $data['presidente']= $presidente;
        $data['cargo']= $cargo;
        $data['tipocertificado']= $tipocertificado;
        //agregar parametro $firma en la funcion pdf
        $data['firma']= $firma;
        
           $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
         $data['fechahoy']=  strftime(" %d de ".$meses[date('n')-1].", %Y");
        
        
        //establecemos la carpeta en la que queremos guardar los pdfs,
        //si no existen las creamos y damos permisos
        $this->createFolder();
 
        //importante el slash del final o no funcionará correctamente
        $this->html2pdf->folder('./uploads/certificados/pdf/eventos/');
        
        //establecemos el nombre del archivo
        $archivo=$pdf.".pdf";
        $this->html2pdf->filename($archivo);
       
         if ($tipo_evento==101) {
            $this->html2pdf->paper('a4', 'landscape');
            $this->html2pdf->html(utf8_decode($this->load->view('eventos/certificados/pdf_plantilla_eventos', $data, true)));
        } else if($tipo_evento==105){
                        $this->html2pdf->paper('a4', 'landscape');
            $this->html2pdf->html(utf8_decode($this->load->view('eventos/certificados/pdf_plantilla_eventos_1firma', $data, true)));
        }else {
            $this->html2pdf->paper('a4', 'portrait');
            $this->html2pdf->html(utf8_decode($this->load->view('eventos/certificados/pdf_plantilla_eventos_constancia', $data, true)));
        }
        //si el pdf se guarda correctamente lo mostramos en pantalla
        if($this->html2pdf->create('save')) 
        {  
           // $this->show($archivo);
        }
    }  
    
    private function createFolder()
    {
        if(!is_dir("./uploads/certificados/pdf"))
        {
             mkdir("./uploads/certificados/pdf/eventos", 0777);
        }
       
    }
    
    
    
  
    
}
    

