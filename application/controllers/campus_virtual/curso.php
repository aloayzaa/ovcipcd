<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Curso extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/curso_model');
         $this->load->model('campus_virtual/horario_model');
    }
    
    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Lista de Cursos';
        $this->load->view('campus_virtual/curso/panel_view', $data);
    }
    
    function load_listar_view_curso() {
        $this->load->view('campus_virtual/curso/qry_view');
    }
    
    
    function load_listar_view_cursosTemporales() {
        $this->load->view('campus_virtual/curso/qry_view_Temporales');
    }
        function cursoIns() {
        $this->form_validation->set_rules('txt_ins_cur_nombre', 'Nombre', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            
            // echo "cantidad de modulos".$this->input->post('cantidad_modulo');
            
            $this->curso_model->setNombre($this->input->post('txt_ins_cur_nombre'));
            $this->curso_model->setTipo($this->input->post('cbo_ins_cur_tipo'));
            $this->curso_model->setDescripcion($this->input->post('txt_ins_cur_descripcion'));
            $idnuevo = $this->curso_model->cursoIns();
            $cantidad=$this->input->post('cantidad_modulo');
            $result=true;        
            if($idnuevo>0 && $cantidad>0){
               
                for($i=1;$i<=$cantidad;$i++){
                   if($result==true){
                      $variable='detalle'.$i;
                     $sumilla=$this->input->post($variable);
                     if($i==1){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo I',$sumilla,$idnuevo);  
                     }
                     else if($i==2){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo II',$sumilla,$idnuevo);  
                     }
                     else if($i==3){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo III',$sumilla,$idnuevo);   
                     }
                     else if($i==4){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo IV',$sumilla,$idnuevo);   
                     }
                     else if($i==5){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo V',$sumilla,$idnuevo);   
                     }
                     else if($i==6){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo VI',$sumilla,$idnuevo);   
                     }
                     else if($i==7){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo VII',$sumilla,$idnuevo);   
                     }
                     else if($i==8){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo VIII',$sumilla,$idnuevo);   
                     } 
                   } 
                }
            }
            if ($result) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }
    
    function cursoQry($criterio = null) {
        //var_dump($criterio);
        if($criterio=='CURSO-IEPI'||$criterio=='DIPLOMADO-IEPI'){
            $opcionesGrid = array(
               "Editar" => "pencil",
                "Asignar"=>"wrench",
                "Eliminar" => "trash",
                 "Detallar" => "copy"
            );
        }else {
            $opcionesGrid = array(
                "Editar" => "pencil",
                "Asignar"=>"wrench",
                "Eliminar" => "trash"
            );
        }
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'curso_model',
                    'metodo' => 'cursoQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'nCurId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nCurId',
                        'cCurNombre',
                        'cCurDescripcion',
                        'cCurTipo',
                        'nCurCuentaIngreso',
                        'opcion'
                    ),
                )
        );
    }
    
    function cursoQryTemporales($criterio = null) {
        $opcionesGrid = array(
            "Activar Asignatura" => "check",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'curso_model',
                    'metodo' => 'cursoQryTemporales',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'nCurId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nCurId',
                        'cCurNombre',
                        'cCurDescripcion',
                        'cCurTipo',
                        'opcion'
                    ),
                )
        );
    }
    
    function activarCursosTemporales(){
        $idCurso = $this->input->post('hid_idCurso');
        $this->curso_model->setIdCurso($idCurso);
        $resul = $this->curso_model->activarCursosTemporales();
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }
    function popupAsignarCuenta($idCurso){
        $campos = $this->cursoGet($idCurso);
        //echo "mostrar datooooo";
        $this->load->view('campus_virtual/curso/asig_view', $campos);

    }
    function popupEditarCurso($idCurso) {
        $campos = $this->cursoGet($idCurso); 
        if($campos['tipo']=='DIPLOMADO'||$campos['tipo']=='DIPLOMADO-IEPI'){
            $campos['detalles']=$this->curso_model->getModulos($idCurso);
            $campos['docentes']=$this->horario_model->DocenteCbo();
        }
        $this->load->view('campus_virtual/curso/upd_view', $campos);
    }
    function popupDetallarDatos($idCurso){
         $campos = $this->cursoGet($idCurso);
         //$campos['docentes']=$this->horario_model->docentesCbo();
           if($campos['tipo']=='DIPLOMADO-IEPI'){
            $campos['docentes']=NULL;
         }else {
              $campos['docentes']=$this->horario_model->DocenteCbo();
         }
         $campos['detalle']=$this->curso_model->detalleiepi($idCurso);
         $this->load->view('campus_virtual/curso/detalleCurso_view', $campos);
    }
    
    function load_listar_detalleDiplomado($idcurso){
          $campos = $this->cursoGet($idcurso);
        if($campos['tipo']=='DIPLOMADO'||$campos['tipo']=='DIPLOMADO-IEPI'){
            $campos['detalles']=$this->curso_model->getModulos($idcurso);
              $campos['docentes']=$this->horario_model->DocenteCbo();
         
        }
        $this->load->view('campus_virtual/curso/detalle_view', $campos);
        
    }
    
    function popupActivarCursoTemporal($idCurso) {
        $data = $this->cursoGet($idCurso);
        $this->load->view('campus_virtual/curso/ins_view_activarTemporal', $data);
    }

    function cursoGet($idCurso) {
        $query = $this->curso_model->cursoGet($idCurso);
        if ($query) {
            $curso['idCurso'] = $this->curso_model->getIdCurso();
            $curso['nombre'] = $this->curso_model->getNombre();
            $curso['tipo'] = $this->curso_model->getTipo();
            $curso['descripcion'] = $this->curso_model->getDescripcion();
            $curso['cuenta'] = $this->curso_model->getCuenta();
            return $curso;
        } else {
            return false;
        }
    }
    function cursoAsig() {
        $this->form_validation->set_rules('txt_upd_asig_cuenta', 'Cuenta Ingreso', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            //$this->curso_model->setNombre($this->input->post('txt_upd_cur_nombre'));
            $this->curso_model->setTipo($this->input->post('cbo_upd_cur_tipo'));
           // $this->curso_model->setDescripcion($this->input->post('txt_upd_cur_descripcion'));
             $this->curso_model->setCuenta($this->input->post('txt_upd_asig_cuenta'));
            // echo $this->input->post('txt_upd_asig_cuenta');
            // echo $this->curso_model->getCuenta();
             $this->curso_model->setIdCurso($this->input->post('hid_upd_cur_idCurso'));
            $resul = $this->curso_model->cursoAsig();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }
    function moduloUpd($id,$nombre,$nPerId){
            $nombre=str_replace('%20',' ',$nombre);
             $resul = $this->curso_model->moduloUpd($id,$nombre,$nPerId);
             if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
    }
      function moduloDel($id){
           $resul = $this->curso_model->moduloDel($id);
             if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
    }
    function moduloIns($nro,$sumilla,$idnuevo){
            $sumilla=str_replace('%20',' ',$sumilla);         
                     if($nro==2){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo II',$sumilla,$idnuevo);  
                     }
                     else if($nro==3){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo III',$sumilla,$idnuevo);   
                     }
                     else if($nro==4){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo IV',$sumilla,$idnuevo);   
                     }
                     else if($nro==5){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo V',$sumilla,$idnuevo);   
                     }
                     else if($nro==6){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo VI',$sumilla,$idnuevo);   
                     }
                     else if($nro==7){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo VII',$sumilla,$idnuevo);   
                     }
                     else if($nro==8){
                        $result=$this->curso_model->conceptoDiplomadoIns('Modulo VIII',$sumilla,$idnuevo);   
                     }
             if ($result) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }         
                     
              
    }
    function cursoUpd() {
        $this->form_validation->set_rules('txt_upd_cur_nombre', 'Nombre', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->curso_model->setNombre($this->input->post('txt_upd_cur_nombre'));
            $this->curso_model->setTipo($this->input->post('cbo_upd_cur_tipo'));
           /* $tipo=$this->input->post('cbo_upd_cur_tipo');
            if($tipo=='DIPLOMADO'||$tipo=='DIPLOMADO-IEPI'){
                echo "actualizar en la otra tablaaaaa";
            }*/
            $this->curso_model->setDescripcion($this->input->post('txt_upd_cur_descripcion'));
            $this->curso_model->setIdCurso($this->input->post('hid_upd_cur_idCurso'));
            $resul = $this->curso_model->cursoUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }
    function cursoDet(){
        $this->form_validation->set_rules('txt_upd_cur_fecha_inicio', 'Fecha Inicio', 'required');
        $this->form_validation->set_rules('txt_upd_cur_fecha_fin', 'Fecha Fin', 'required');
        $this->form_validation->set_rules('txt_upd_cur_horas', 'Horas', 'required');

        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->curso_model->setFechainicio($this->input->post('txt_upd_cur_fecha_inicio'));
            $this->curso_model->setFechafin($this->input->post('txt_upd_cur_fecha_fin'));
            $this->curso_model->setHoras($this->input->post('txt_upd_cur_horas'));
            $this->curso_model->setNPerIdDocente($this->input->post('cbo_hor_docente'));
            $this->curso_model->setIdCurso($this->input->post('hid_upd_cur_idCurso'));
           
            $resul = $this->curso_model->cursoDet();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
         
    }
    
    function cursoEstado($idCurso){
        $this->curso_model->setIdCurso($idCurso);
        $result=$this->curso_model->cursoEstado();
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
    
}

?>
