<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Peritos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('peritos/peritos_model');
    }

    function index() {
$this->loaders->verificaAcceso('W');
    $data['titulo']=  'Registro de Solicitudes de Peritaje';
        $this->load->view("peritos/panel_view",$data);
    }
    function load_listar_view_peritos() {
        $this->load->view("peritos/qry_view");
    }
    
     function load_ins_view_peritos() {
         $data['TipoDocumento']=  $this->peritos_model->get_combo_parametro_segun_categoria();
        $this->load->view("peritos/ins_view_perito",$data);
    }
     function load_qry_peritos() {
          $this->load->view("peritos/qry_view");
    }
   
    function mostrar_lista_asignacion($valor)
    {
        $data['registros']= $this->peritos_model->asignacion_peritos($valor);
        $this->load->view("peritos/tabla_asignacion",$data);
    }
    
    function load_listar_view_Multimedia($nSolId) {
        $data['bandeja'] = $this->peritos_model->SolicitudMultimediaqry($nSolId);
        $this->load->view('peritos/qry_multimedia',$data);
    }

   function popupUpload($nSolId) {
       
         $campos = $this->get_Solicitud($nSolId);
         $campos['TMultimedia'] = $this->peritos_model->get_s_cbo_multimedia();
         $this->load->view('peritos/upload_multimedia', $campos);
    } 

     function popupAsignar($valor) {
        $data['valor'] = $valor;
        $data['peritos'] = $this->peritos_model->get_combo_peritos();
        $this->load->view("peritos/vista_asignar", $data);
    }
    
    function popupVistaPrevia($nSolId) {
   
      
        $campos=$this->get_VistaPrevia($nSolId);
        $campos['registros']= $this->peritos_model->asignacion_peritos($nSolId);
        $campos['nsolicitud'] = $this->strBoleto($nSolId);
        
        $this->load->view('peritos/vista_previa',$campos);
    }
     

    function RemitenteData($parametro,$Documento) {
        $query = $this->peritos_model->RemitenteData($parametro,$Documento);
        if ($query) {
            $result['Id']=$this->peritos_model->getId();
            $result['DNI'] = $this->peritos_model->getDocumento();
            $result['Ruc'] = $this->peritos_model->getDocumento();
            $result['Remitente'] = $this->peritos_model->getRemitente();
            $result['Rubro'] = $this->peritos_model->getRubro();
            $result['Tel'] = $this->peritos_model->getTelefono();
            $tipo = $result['Tipo']=$this->peritos_model->getTipo();
            if($tipo=='1'){
            $result = "";
            $result .= '<legend>Datos de la Persona Remitente</legend>';
            $result .= '<fieldset>';
            $result .= '<table>';
            $result .= '<tbody>';
            $result.='<tr>';
            $result.='<td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="../uploads/ruteo/usuario.png" width="110" height="108"></td>';
            $result.='<td style="vertical-align:top;">';
            $result.='<table cellpadding="2" cellspacing="0">';
            $result.='<tbody>';
            $result.='<tr>';
            $result.='<td><b>DNI</b></td>';
            $result.='<td><b>:</b></td>';
            
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getDocumento().'</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Nombre Completo</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getRemitente().'</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Telefono</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getTelefono().'</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td colspan="3" style="padding-top:10px;">';
            $result.='<input type="hidden" id="nPerId" name="nPerId" value='.$this->peritos_model->getId().'></input>';
            $nPerId=$this->peritos_model->getId();
            $result.="<input type='button' name='btnsiguiente' id='btnsiguiente'onclick='load_frm_datos_complementarios(".$nPerId.")' value='Siguiente' class='btn btn-primary'>";
            $result.='</tr>';
            echo $result;
            }
            else
            {
               
            $result = "";
            $result .= '<legend>Datos de la Empresa Remitente</legend>';
            $result .= '<fieldset>';
            $result .= '<table>';
            $result .= '<tbody>';
            $result.='<tr>';
            $result.='<td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="../images/empresa.jpg" width="110" height="108"></td>';
            $result.='<td style="vertical-align:top;">';
            $result.='<table cellpadding="2" cellspacing="0">';
            $result.='<tbody>';
            $result.='<tr>';
            $result.='<td><b>RUC</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getDocumento().'</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Razón Social</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getRemitente().'</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Rubro</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getRubro().'</td>';
            $result.='</tr>'; 
            $result.='<tr>';
            $result.='<td><b>Telefono</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">'.$this->peritos_model->getTelefono().'</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td colspan="3" style="padding-top:10px;">';
            $nPerId=$this->peritos_model->getId();
            $result.="<input type='button' name='btnsiguiente' id='btnsiguiente'onclick='load_frm_datos_complementarios(".$nPerId.")' value='Siguiente' class='btn btn-primary'>";
            $result.='</tr>';
            
            echo $result;
            }
            
            
    }
}
function load_frm_datos_complementarios($nPerId) {
            $this->peritos_model->NumeroSolicitud();
            $data['nsolicitud'] = $this->strBoleto($this->peritos_model->getNsolicitud()+1);
            $data['ID']=$nPerId;  
            $this->load->view("peritos/ins_view_datos_complementarios",$data);
    }
    
    
    function strBoleto($cip){
    $ncadena = strlen($cip);
        switch ($ncadena) {
            case 1:
                $cip = 'N-00000' . $cip;
                return $cip;
            case 2:
                $cip = 'N-0000' . $cip;
               return $cip;
            case 3:
                $cip = 'N-000' . $cip;
                return $cip;
            case 4:
                $cip = 'N-00' . $cip;
                return $cip;
            case 5:
                $cip = 'N-0' . $cip;
                return $cip;
            case 6:
                $cip = 'N-'.$cip;
                return $cip;
        }
}
function Solicitud_Peritaje_Ins() {
    $this->form_validation->set_rules('txt_ins_asunto', 'Asunto de Solicitud', '|trim|required');
    $this->form_validation->set_rules('txt_ins_fecha_solicitud', 'Fecha Solicitud', '|trim|required');
    $this->form_validation->set_rules('txt_ins_descripcion_peritaje', 'Descripción de Solicitud', '|trim|required');
    $this->form_validation->set_rules('txt_ins_direccion_peritaje', 'Dirección de Peritaje', '|trim|required');
    $this->form_validation->set_rules('txt_ins_fecha_respuesta', 'Fecha de Respuesta', '|trim|required');
    if ($this->form_validation->run() == true) {
    $this->peritos_model->setId($this->input->post('nPerId'));
    $this->peritos_model->setCFechaSol($this->input->post('txt_ins_fecha_solicitud'));
    $this->peritos_model->setDescripcionSol($this->input->post('txt_ins_descripcion_peritaje'));
    $this->peritos_model->setDireccionPer($this->input->post('txt_ins_direccion_peritaje'));
    $this->peritos_model->setCFechaSolRes($this->input->post('txt_ins_fecha_respuesta'));
    $this->peritos_model->setAsunto($this->input->post('txt_ins_asunto'));
    $resul = $this->peritos_model->Solicitud_Peritaje_Ins();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else  {
                $this->index();
            }
}

function peritosQry($criterio=''){
            $opcionesGrid=array(
                "Editar"=>"pencil",
                "Vista Previa" => "newwin",
                "Asignar"=>"circle-plus",
                "Multimedia" => "folder-collapsed",
                "Eliminar"=>"trash",);
            echo $this->jqgrid->get_DatosGrid(
              array(
                  'modelo'=>'peritos_model',
                  'metodo'=>'peritosQry',
                  'criterios'=>array('criterio' => $criterio),
                  'pkid'=>'nSolId',
                  'opciones'=>json_encode($opcionesGrid),
                  'columns'=>array(
                      'nSolId',
                      'Remitente',
                      'nSolAsunto',
                      'fecha',
                      'fechafin',
                      'estado',
                      'opcion'
                  ),
                  )
              );
        }
    
        function Asignacion_peritos_ins()
        {
            $nPeritoId = $this->input->post('Perito');
            $nSolId= $this->input->post('numerosolicitud');
            $data = $this->peritos_model->buscar_asignacion_peritos($nPeritoId,$nSolId);
            if($data){
            $this->peritos_model->setNsolicitud($this->input->post('numerosolicitud'));
            $this->peritos_model->setId($this->input->post('Perito'));
            $resul = $this->peritos_model->Asignacion_peritos_ins(); 
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }
        
     function RemoverPerito($nSdelId){  
        $this->peritos_model->setNSdelId($nSdelId);
        $result = $this->peritos_model->RemoverPerito();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
         
     } 
     
     function popupEditar($nSolId){
            $parametros = $this->get_Solicitud($nSolId);
            $this->load->view('peritos/upd_view',$parametros);
        }

    function get_Solicitud($nSolId)
    {
            $query = $this->peritos_model->get_Solicitud($nSolId);
        if ($query){
                $solicitud_peritaje['nSolId']=$this->peritos_model->getId();
                $solicitud_peritaje['nSolAsunto']=$this->peritos_model->getAsunto();
                $solicitud_peritaje['cSolFechaSolicitud']=$this->peritos_model->getCFechaSol();
                $solicitud_peritaje['nSolDescripcionPert']=$this->peritos_model->getDescripcionSol();
                $solicitud_peritaje['nSolDireccionPert']=$this->peritos_model->getDireccionPer();
                $solicitud_peritaje['cSolFechaRespuesta']=$this->peritos_model->getCFechaSolRes();
                
                return $solicitud_peritaje ; 
            }else
                return false;       
    }

        function solicitudUpd() {
        $this->form_validation->set_rules('txt_upd_sol_Asunto', 'Asunto', '|trim|required');
        $this->form_validation->set_rules('txt_upd_sol_FechaEmision', 'Fecha de Emisión', '|trim|required');
        $this->form_validation->set_rules('txt_upd_sol_Descripcion', 'Descripción', '|trim|required');
        $this->form_validation->set_rules('txt_upd_sol_Direccion', 'Dirección', '|trim|required');
        $this->form_validation->set_rules('txt_upd_sol_FechaRespuesta', 'Fecha de Respuesta', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            
            $this->peritos_model->setId($this->input->post('hid_udp_id'));
            $this->peritos_model->setAsunto($this->input->post('txt_upd_sol_Asunto'));
            $this->peritos_model->setCFechaSol($this->input->post('txt_upd_sol_FechaEmision'));
            $this->peritos_model->setDescripcionSol($this->input->post('txt_upd_sol_Descripcion'));
            $this->peritos_model->setDireccionPer($this->input->post('txt_upd_sol_Direccion'));
            $this->peritos_model->setCFechaSolRes($this->input->post('txt_upd_sol_FechaRespuesta'));

            $resul = $this->peritos_model->solicitudUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else  {
                $this->index();
            }
        }
        
        function get_VistaPrevia($nSolId)
    {
            $query = $this->peritos_model->get_VistaPrevia($nSolId);
            
        if ($query){
                $solicitud_peritaje['Remitente']=$this->peritos_model->getRemitente();
                $solicitud_peritaje['nSolAsunto']=$this->peritos_model->getAsunto();
                $solicitud_peritaje['cSolFechaSolicitud']=$this->peritos_model->getCFechaSol();
                $solicitud_peritaje['nSolDescripcionPert']=$this->peritos_model->getDescripcionSol();
                $solicitud_peritaje['nSolDireccionPert']=$this->peritos_model->getDireccionPer();
                $solicitud_peritaje['cSolFechaRespuesta']=$this->peritos_model->getCFechaSolRes();
                $solicitud_peritaje['estado']=$this->peritos_model->getBEstadoSolicitud();
                
                return $solicitud_peritaje ; 
            }else
                return false;       
    }
    
    function SolicitudDel($id){
            $this->peritos_model->setId($id);
            $result = $this->peritos_model->SolicitudDel();
            if ($result){
                echo 1;
            }else{
                echo 0;
            }
        }
        
        
         function SolicitudUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/cip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
//            $nombreArchivox = md5(mt_rand(2147483647, 4294967294)) . "_" . $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->peritos_model->setId($this->input->post('hid_upload_nNotCodigo'));
            $this->peritos_model->setMultimedia($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->peritos_model->SolicitudUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

       
}
    ?>