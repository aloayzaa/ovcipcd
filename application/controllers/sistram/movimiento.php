<?php

class Movimiento extends CI_Controller {
  
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
//      $this->load->library('html2pdf');    
        $this->load->model('sistram/movimiento_model');
        $this->load->model('sistram/administrador_model');
        
         $this->load->model('sistram/expediente_model');
        
    }

    function index() {
             $this->loaders->verificaAcceso('W');
        //aqui sera con el usuario
        $nAreaId=$this->session->userdata('IDPer');
        $usuario=$this->session->userdata('tipoclase');
        
        $data['AreaNombre']=$usuario;
        $data['titulo']='Movimientos';
        $data['nAreaId']=$nAreaId;
        
        
        $data['movimientos']= $this->movimiento_model->movimientoQry($nAreaId,"SinProcesar",0);
        $data['procesados']='';
        $this->load->view('sistram/movimiento/panel_view',$data);
    }
    function load_listar_view_movimiento(){
         // aqui sera con el usuariooo
              $nAreaId=$this->session->userdata('IDPer');
        $usuario=$this->session->userdata('tipoclase');
        
        $data['AreaNombre']=$usuario;
        $data['nAreaId']=$nAreaId;
        $data['movimientos']=$this->movimiento_model->movimientoQry($nAreaId,"SinProcesar",0);
        $this->load->view('sistram/movimiento/qry_view', $data);
    }
    function load_listar_view_procesados($anio){
           // aqui sera con el usuariooo
        $nAreaId=$this->session->userdata('IDPer');
        $usuario=$this->session->userdata('tipoclase');
        
        $data['AreaNombre']=$usuario;
        $data['nAreaId']=$nAreaId;
      
        $procesados=$this->movimiento_model->movimientoQry($nAreaId,"Procesados",$anio);
      
        if(count($procesados)>0){
          foreach($procesados as $procesado){
            $procesado->notificaciones=$this->movimiento_model->notificacionesGet($procesado->nExpedienteId,$nAreaId);
          }
          $data['procesados']=$procesados;
        }else {
             $data['procesados']='';
        }
        $data['areasnotificacion']=$this->administrador_model->areasderivar();
  
        
        $this->load->view('sistram/movimiento/qry_view_procesados', $data);
   
    }

    function expedienteGet($expediente){
         
         $areasno=$this->input->post('areasnoconsiderar');
        
        $data['expediente']=$this->movimiento_model->expedienteGet($expediente);
            // aqui sera con el usuariooo
                $nAreaId=$this->session->userdata('IDPer');
        if($areasno==''){
            $data['areasderivar']=$this->administrador_model->areasderivarconexcepcion($nAreaId.',');
        }
        else  {
            $data['areasderivar']=$this->administrador_model->areasderivarconexcepcion($areasno); 
        }
        
         $verificarderivacion=$this->movimiento_model->verificar_derivacion($nAreaId,$expediente);
         if($verificarderivacion){
              $this->load->view('sistram/movimiento/detalle_view',$data);
         }
         else {
           echo '<div class="alert alert-warning"><strong>El Expediente se encuentra derivado</strong></div>'; 
         }
    }
    function expedienteDoc($expediente){
          $data['expediente']=$this->movimiento_model->expedienteGet($expediente);
          $data['multimedia']=$this->administrador_model->expedienteMultimedia($expediente);
        
         $this->load->view('sistram/movimiento/documentacion_view',$data);
    }
    function notificarExpediente(){
        $movimiento=$this->input->post('valor');
        $notificacion=$this->input->post('notificacion');
        // aqui sera con el usuariooo
               $nAreaId=$this->session->userdata('IDPer');
       
        $result=$this->movimiento_model->notificarExpediente($movimiento,$nAreaId,$notificacion);
        if($result){
            echo 1; 
        }
        else{
            echo 0;
        } 
    }
    function verExpediente($expediente){
         $data['expediente']=$this->movimiento_model->expedienteGet($expediente);
         $data['multimedia']=$this->administrador_model->expedienteMultimedia($expediente);
         $data['derivadoareas'] = $this->administrador_model->derivadoareas($expediente);
      
         $this->load->view('sistram/movimiento/procesar_view',$data);
    }
    function procesarExpediente(){
        $movimiento=$this->input->post('valor');
        $resumen=$this->input->post('resumen');
       
        $result=$this->movimiento_model->procesarExpediente($movimiento,$resumen);
        if($result){
           // funcion para generar pdf
            $idexpediente=$this->movimiento_model->getExpedienteId($movimiento);
            $codigo=$this->movimiento_model->CodigoExpedienteGet($idexpediente);
            $res=$this->load_generar_cargo($idexpediente,$codigo,'vb');         
                if($res){
                    echo 1; 
                }
                else {
                    echo 0;
                }
        }
        else{
            echo 0;
        } 
    }
     function load_generar_cargo($expedienteId,$data, $visto) {
        $this->load->library('html2pdf');   
        $sql['tabla'] = $this->expediente_model->generar_Expcargo($data);
        $sql['requisitos'] = $this->expediente_model->dame_requisitos($data);
        $sql['movimientos']=$this->expediente_model->movimientosGet($expedienteId);
        $sql['visto'] = $visto;
        $this->createFolder();
        $this->html2pdf->folder('./uploads/sistram/');

        $archivo = "TRAM-" . $data . ".pdf";
        $archivo = $data . ".pdf";
        $this->html2pdf->filename($archivo);

        $this->html2pdf->paper('a4', 'portrait');
        $this->html2pdf->html(utf8_decode($this->load->view('sistram/expediente/generacion_cargo', $sql, true)));
        if ($this->html2pdf->create('save')) {
            return true;
        }
    }
      private function createFolder() {
        if (!is_dir("./uploads")) {
            mkdir("./uploads", 0777);
            mkdir("./uploads/sistram", 0777);
        }
    }
    
          
    
    function verNotificacion(){
        $this->load->view('sistram/movimiento/notificar_view');
    }
    function mensajenovisto(){
        $areaId=$this->input->post('areaid');
        $exp_novistos=$this->movimiento_model->mensajenovisto($areaId);
        if(count($exp_novistos)){
            foreach($exp_novistos as $exp){
              	echo "<li  id='mensaje".$exp->nMovimientoId."''>";
          		echo "<h6>";
                            echo "<strong>".$exp->areaemisor."</strong>, te envió un mensaje";
			    echo '<input type = "button" onClick = "cambiarvisto('.$exp->nMovimientoId.');" value = "X">';
          		echo "</h6>";
          		echo "<p>";										                      		
					echo $exp->cExpedienteSumilla;
					echo "<br><span>";
						echo $exp->dMovimientoFechaRecepcion;	
					echo "</span>";	
				echo "</p>";
		echo "</li>";
            }
        }
        else {
            return "nohay";
        }
    }
    function cambiarvisto(){
        $movimientoId=$this->input->post('movimientoid');
        $result=$this->movimiento_model->cambiarvisto($movimientoId);
        if($result){
            echo 1; 
        }
        else{
            echo 0;
        } 
        
    }
       //funciones agregadas para el multimedia en movimiento
    function popupMultimediaExpediente($nExpedienteId) {
        $parametros['bandeja']=$this->expediente_model->ExpMultimediaqry($nExpedienteId);
        // agregar una vista a movimiento qry_view_mult
        $this->load->view('sistram/movimiento/qry_view_mult', $parametros);
    }
    function recargar(){
        // agregar una vista a movimiento upload_view
        $this->load->view('sistram/movimiento/upload_view');
    }
     // observar expediente
      function observarExpediente(){
        $movimiento=$this->input->post('valor');
        $resumen=$this->input->post('resumen');
       
        $result=$this->movimiento_model->observarExpediente($movimiento,$resumen);
        if($result){
           // funcion para generar pdf
            $idexpediente=$this->movimiento_model->getExpedienteId($movimiento);
            $codigo=$this->movimiento_model->CodigoExpedienteGet($idexpediente);
             echo 1; 
             
        }
        else{
            echo 0;
        } 
    }
        function falta_invExpediente() {
               $user=$this->session->userdata('IDPer');
        $movimiento=$this->input->post('valor');
        $observacion = $this->input->post('resumen');
        $query = $this->movimiento_model->falta_invExpediente($user,$movimiento, $observacion);
        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
    

