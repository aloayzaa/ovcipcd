<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Persona extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('peritaje/persona_model');
        $this->load->model('peritaje/personajuridica_model');
         $this->db_colegiado = $this->load->database('colegiado', TRUE);
    }

    function index() {
$this->loaders->verificaAcceso('W');
    $data['titulo']=  'Registro de Personas CIP-CDLL';
        $this->load->view("peritaje/panel_view",$data);
        
    }
    function load_listar_view_persona() {
        $this->load->view("peritaje/qry_view");
    }
    function load_listar_view_persona_juridica(){
        $this->load->view("peritaje/qry_view_personajuridica");
    }       
     function load_ins_view_persona() {
        $this->load->view("peritaje/ins_view");
    }
   
    function load_ins_view_personajuridica() {
         $data['Rubro']=  $this->personajuridica_model->get_s_cbo_rubro();
        $this->load->view("peritaje/ins_view_pj",$data);
    }

    function personaIns() {
        
        $this->form_validation->set_rules('txt_ins_per_apePat', 'Apellido Paterno', '|trim|required');
        $this->form_validation->set_rules('txt_ins_per_apeMat', 'Apellido Materno', '|trim|required');
        $this->form_validation->set_rules('txt_ins_per_Nombres', 'Nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_per_Correo', 'Correo', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        $correo = $this->input->post("txt_ins_per_Correo");
        $data = $this->persona_model->buscar_correo_persona($correo);
       if ($this->form_validation->run() == true && $data) {
            $this->persona_model->setDni($this->input->post('txt_ins_per_DNI'));
            $this->persona_model->setPerApellidoPaterno($this->input->post('txt_ins_per_apePat'));
            $this->persona_model->setPerApellidoMaterno($this->input->post('txt_ins_per_apeMat'));
            $this->persona_model->setPerNombres($this->input->post('txt_ins_per_Nombres'));
            $this->persona_model->setCorreo($this->input->post('txt_ins_per_Correo'));
            $this->persona_model->setTelefono($this->input->post('txt_ins_per_Telefono'));
            $resul = $this->persona_model->personaIns();
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
        
        function personajuridicaIns() {
            $this->form_validation->set_rules('txt_ins_emp_ruc','Ruc','|trim|required|');
            $this->form_validation->set_rules('txt_ins_emp_razonsocial','Razón Social','|trim|required|');
            $this->form_validation->set_rules('txt_ins_emp_direccionfiscal','Dirección Fiscal','|trim|required|');
            $this->form_validation->set_rules('txt_ins_emp_email','Correo','|trim|required|');
            $this->form_validation->set_message('required', 'El %s es requerido');
            $correo = $this->input->post("txt_ins_emp_email");
            $data = $this->persona_model->buscar_correo_persona($correo);
             if ($this->form_validation->run() == true && $data) {
                 $this->personajuridica_model->setRuc($this->input->post('txt_ins_emp_ruc'));
                 $this->personajuridica_model->setRubro($this->input->post('cbo_ins_emp_rubro'));
                 $this->personajuridica_model->setRz($this->input->post('txt_ins_emp_razonsocial'));
                 $this->personajuridica_model->setTel($this->input->post('txt_ins_emp_telefono'));
                 $this->personajuridica_model->setFax($this->input->post('txt_ins_emp_fax'));
                 $this->personajuridica_model->setEmail($this->input->post('txt_ins_emp_email'));
                 $this->personajuridica_model->setDirF($this->input->post('txt_ins_emp_direccionfiscal'));
                 $this->personajuridica_model->setDirT($this->input->post('txt_ins_emp_direccionterminal'));
                 $resul = $this->personajuridica_model->personajuridicaIns();
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
        
        function personaQry($criterio=''){
            $opcionesGrid=array(
                "Editar"=>"pencil",
                "Eliminar"=>"trash",);
            echo $this->jqgrid->get_DatosGrid(
              array(
                  'modelo'=>'persona_model',
                  'metodo'=>'personaQry',
                  'criterios'=>array('criterio' => $criterio),
                  'pkid'=>'nPerId',
                  'opciones'=>json_encode($opcionesGrid),
                  'columns'=>array(
                      'nPerId',
                      'cPerNombres',
                      'cPerApellidoPaterno',
                      'cPerApellidoMaterno',
                      'DNI',
                      'Email',
                      'Tel',
			 'Cel',
                      'opcion'
                  ),
                  )
              );
        }
        
        function personajuridicaQry($criterio=''){
            $opcionesGrid=array(
                "Editar"=>"pencil",
                "Eliminar"=>"trash",);
            echo $this->jqgrid->get_DatosGrid(
              array(
                  'modelo'=>'personajuridica_model',
                  'metodo'=>'personajuridicaQry',
                  'criterios'=>array('criterio' => $criterio),
                  'pkid'=>'nPerId',
                  'opciones'=>  json_encode($opcionesGrid),
                  'columns'=>array(
                      'nPerId',
                      'cPerNombres',
                      'Ruc',
                      'Rubro',
                      'Tel',
                      'Fax',
                      'Email',
                      'opcion'
                  ),
                  )
              );
        }
        function personaDel($id){
            $this->persona_model->setId($id);
            $result = $this->persona_model->personaDel();
            if ($result){
                echo 1;
            }else{
                echo 0;
            }
        }
        
        function personajuridicaDel($id){
            $this->personajuridica_model->setId($id);
            $result = $this->personajuridica_model->personajuridicaDel();
            if ($result){
                echo 1;
            }else{
                echo 0;
            }
        }
        function popupEditar($id){
            $parametros = $this->personaGet($id);
            $this->load->view('peritaje/upd_view',$parametros);
        }
        
        function popupEditar_personajuridica($id){
            $parametros = $this->personajuridicaGet($id);
            $parametros['RubroUpd']=  $this->personajuridica_model->get_s_cbo_rubro();
            $this->load->view('peritaje/upd_view_persona_juridica',$parametros);
            
        }
        
        function personaGet($id){
            $query = $this->persona_model->personaGet($id);
		
            if ($query){
                $persona['nPerId']=$this->persona_model->getId();
                $persona['cPerNombres']=$this->persona_model->getPerNombres();
                $persona['cPerApellidoPaterno']=$this->persona_model->getPerApellidoPaterno();
                $persona['cPerApellidoMaterno']=$this->persona_model->getPerApellidoMaterno();
                $persona['DNI']=$this->persona_model->getDni();
                $persona['Email']=$this->persona_model->getCorreo();
                $persona['Tel']=$this->persona_model->getTelefono();
                $persona['Cel']=$this->persona_model->getCel();
                
                return $persona ; 
            }else
                return false;
            
        }
        
        
        
         function personajuridicaGet($id){
             $query = $this->personajuridica_model->personajuridicaGet($id);
            if ($query){
                $personajuridica['nPerId']=$this->personajuridica_model->getId();
                $personajuridica['Ruc']=  $this->personajuridica_model->getRuc();
                $personajuridica['Rubro']= $this->personajuridica_model->getRubro();
                $personajuridica['cPerNombres']= $this->personajuridica_model->getRz();
                $personajuridica['Tel']=$this->personajuridica_model->getTel();
                $personajuridica['Fax']=$this->personajuridica_model->getFax();
                $personajuridica['Email']=$this->personajuridica_model->getEmail();
                $personajuridica['DirF']=$this->personajuridica_model->getDirF();
                $personajuridica['DirT']=$this->personajuridica_model->getDirT();
                
                return $personajuridica ; 
            }else
                return false;
            
        }
        
        function get_datos_ruc(){
            $ruc=  $this->input->post("ruc");
             $data = $this->personajuridica_model->get_datos_ruc($ruc);

             if ($data){
                $result['nParId'] = $this->personajuridica_model->getRubro();
                $result['cPerNombres'] = $this->personajuridica_model->getRz();
                
                $result['Tel'] = $this->personajuridica_model->getTel();
                $result['Fax'] = $this->personajuridica_model->getFax();
                $result['DirT'] = $this->personajuridica_model->getDirT();
                $result['DirF'] = $this->personajuridica_model->getDirF();
                $result['Email'] = $this->personajuridica_model->getEmail();
                        
             echo "get_persona_ruc('". mb_convert_encoding($result['nParId'],"UTF-8")."','".$result['cPerNombres']."','".$result['Tel']."','".$result['Fax']."','".$result['Email']."','".$result['DirF']."','".$result['DirT']."');";
             }
            
             

        }
        
        function get_datos_dni(){
            $dni=  $this->input->post("dni");
             $data = $this->persona_model->get_datos_dni($dni);
            
             if ($data){
                $result['cPerApellidoPaterno'] = $this->persona_model->getPerApellidoPaterno();
                $result['cPerApellidoMaterno'] = $this->persona_model->getPerApellidoMaterno();
                $result['cPerNombres'] = $this->persona_model->getPerNombres();
                $result['Email'] = $this->persona_model->getCorreo();
                $result['Tel'] = $this->persona_model->getTelefono();
               
             echo "get_persona_dni('". mb_convert_encoding($result['cPerApellidoPaterno'],"UTF-8")."','".$result['cPerApellidoMaterno']."','".$result['cPerNombres']."','".$result['Email']."','".$result['Tel']."');";
             }
            
             

        }
        
      function personaUpd() {
        $this->form_validation->set_rules('txt_upd_per_apePat', 'ApellidoPat', '|trim|required');
        $this->form_validation->set_rules('txt_upd_per_apeMat', 'ApellidoMat', '|trim|required');
        $this->form_validation->set_rules('txt_upd_per_Nombres', 'Nombres', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        $correo = $this->input->post("txt_upd_per_Correo");
        $id=  $this->input->post("hid_udp_id");
        $data = $this->persona_model->buscar_correo_persona_editar($correo,$id);
        $data2=$this->persona_model->buscar_correo_persona($correo);
        if ($this->form_validation->run() == true && $data || $data2) {
            $this->persona_model->setId($this->input->post('hid_udp_id'));
            $this->persona_model->setPerNombres($this->input->post('txt_upd_per_Nombres'));
            $this->persona_model->setTelefono($this->input->post('txt_upd_per_Telefono'));
            $this->persona_model->setCorreo($this->input->post('txt_upd_per_Correo'));
            $this->persona_model->setCel($this->input->post('txt_upd_per_Celular'));
            $this->persona_model->setPerApellidoPaterno($this->input->post('txt_upd_per_apePat'));
            $this->persona_model->setPerApellidoMaterno($this->input->post('txt_upd_per_apeMat'));                    
            $resul = $this->persona_model->personaUpd();
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
        
            function personajuridicaUpd() {
        $this->form_validation->set_rules('txt_upd_emp_Ruc', 'Ruc', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        $correo = $this->input->post("txt_upd_emp_email");
        $id = $this->input->post("hid_udp_id_personajuridica");
        $data = $this->persona_model->buscar_correo_persona_editar($correo,$id);
        $data2 = $this->persona_model->buscar_correo_persona($correo);
        if ($this->form_validation->run() == true && $data || $data2) {
            
            $this->personajuridica_model->setId($this->input->post('hid_udp_id_personajuridica'));
            $this->personajuridica_model->setRz($this->input->post('txt_upd_emp_razonsocial'));
            $this->personajuridica_model->setRubro($this->input->post('RubroUpd'));
            $this->personajuridica_model->setTel($this->input->post('txt_upd_emp_telefono'));
            $this->personajuridica_model->setFax($this->input->post('txt_upd_emp_fax'));
            $this->personajuridica_model->setEmail($this->input->post('txt_upd_emp_email'));
            $this->personajuridica_model->setDirF($this->input->post('txt_upd_emp_direccionfiscal'));
            $this->personajuridica_model->setDirT($this->input->post('txt_upd_emp_direccionterminal'));
            $resul = $this->personajuridica_model->personajuridicaUpd();
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
 
    }