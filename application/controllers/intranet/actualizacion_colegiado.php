<?php

class Actualizacion_colegiado extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/actualizacion_col_model');
        $this->load->model('colegiado/colegiado_model');
        $this->load->model('intranet/ubigeo_model');
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
    function index() {
$this->loaders->verificaAcceso('W');
          $data['titulo'] = 'Actualizaci&oacute;n Datos Personales';
          $this->load->view('intranet/actualizacion_colegiado/panel_view',$data);
    }
	function cargar(){
	 $this->load_frm_upd_colegiado($this->session->userdata('nick'));
	}
     function load_frm_upd_colegiado($str) {
        $query = $this->actualizacion_col_model->colegiadoDataUpd($str);
       
        if ($query) {
            
            $datos['regcol'] = $this->actualizacion_col_model->getRegcol();
            $datos['nomcol'] = $this->actualizacion_col_model->getNombre();
            $datos['apecol'] = $this->actualizacion_col_model->getApellidop();
            $datos['apematcol'] = $this->actualizacion_col_model->getApellidom();
            $datos['lecol'] = $this->actualizacion_col_model->getDni();
            $datos['sexcol'] = $this->actualizacion_col_model->getSexcol();
            $datos['colestcivil'] = $this->actualizacion_col_model->getColestcivil();
            $datos['fechanac'] = $this->actualizacion_col_model->getFecnaccol();
            $datos['direcol'] = $this->actualizacion_col_model->get_Direcol();
            $datos['email'] = $this->actualizacion_col_model->getEmail();
            $datos['emailsec'] = $this->actualizacion_col_model->getEmailsec();
            $datos['telcol'] = $this->actualizacion_col_model->getTelcol();
            $datos['celcol'] = $this->actualizacion_col_model->getCelcol();
            $datos['redpm'] = $this->actualizacion_col_model->getRedpm();
            $datos['redpc'] = $this->actualizacion_col_model->getRedpc();
            $datos['celuemp'] = $this->actualizacion_col_model->getCeluemp();
            $datos['codigodepa'] = $this->actualizacion_col_model->getCoddep();

            $datos['codigoprovi'] = $this->actualizacion_col_model->getCodprov();

            $datos['codigodistri'] = $this->actualizacion_col_model->getCoddist();

            $datos['codigozona'] = $this->actualizacion_col_model->getCodzona();

            $datos['departamento']= $this->ubigeo_model->get_s_cbo_tipodocumento(4,'');
            $datos['provincia']= $this->ubigeo_model->get_s_cbo_tipodocumento(3,$datos['codigodepa']);
            $datos['distrito']= $this->ubigeo_model->get_s_cbo_tipodocumento(2,$datos['codigoprovi']);
            $datos['zona']= $this->ubigeo_model->get_s_cbo_tipodocumento(1,$datos['codigodistri']);
            $datos['titulo'] = 'Actualización de Datos Colegiado';
            $datos['nickname'] = $this->session->userdata('nick');
            $this->load->view('intranet/actualizacion_colegiado/update_view', $datos);
        } else {
            $this->load->view('intranet/actualizacion_colegiado/update_view');
        }
    }

function load_frm_upd_prof_colegiado() {
$regcol = $this->session->userdata('nick');
if ($regcol =='') {
  $this->router->show_404(); 
}else{
$query = $this->actualizacion_col_model->colegiadoDataProfUpd($regcol);
}
		//$query = $this->actualizacion_col_model->colegiadoDataProfUpd($this->input->post('regcol'));
        if ($query) {
            $datos['titulos'] = $query;
            $this->load->view('intranet/actualizacion_colegiado/prof_upd_view', $datos);
        } else {
		$datos['titulos'] = 0;
            $this->load->view('intranet/actualizacion_colegiado/prof_upd_view',$datos);
        }
    }
    
     function load_frm_upd_familia_colegiado() {
	    $regcol = $this->session->userdata('nick');
		if ($regcol =='') {
  $this->router->show_404(); 
}else{
 $query = $this->actualizacion_col_model->colegiadoDataFamiliaDt($regcol);
}
		$datos['cip']=   $regcol;
        if ($query) {
        $datos['familia']=$query;
            $this->load->view('intranet/actualizacion_colegiado/familia_upd_view', $datos);
        } else {
		$datos['familia']=0;
            $this->load->view('intranet/actualizacion_colegiado/familia_upd_view',$datos);
        }
    }
     function load_frm_upd_deporte_colegiado() {
	    $regcol = $this->session->userdata('nick');
				if ($regcol =='') {
  $this->router->show_404(); 
}else{
        $query = $this->actualizacion_col_model->colegiadoDataDeporte($regcol);
}
  $datos['cip']=  $regcol;
        if ($query) {
        $datos['deporte']=$query;
            $this->load->view('intranet/actualizacion_colegiado/deporte_upd_view', $datos);
        } else {
 $datos['deporte']=0;
            $this->load->view('intranet/actualizacion_colegiado/deporte_upd_view',$datos);
        }
    }

        function DatosColegiadoIntUpd() {
	       
            $direc_tipo = $this->input->post('cbo_tipo_direccion');
            $direc_dir = " ".$this->input->post('txt_upd_col_direccion_dir');
            $direc_no = " # ".$this->input->post('txt_upd_col_direccion_no');
            
            if($this->input->post('txt_upd_col_direccion_int') != ''){
            $direc_int = " Int. ".$this->input->post('txt_upd_col_direccion_int');
            }else{
            $direc_int = '';    
            }
            if($this->input->post('txt_upd_col_direccion_mz') != ''){
            $direc_mz = " Mz. ".$this->input->post('txt_upd_col_direccion_mz');
            }else{
            $direc_mz = '';    
            }
            if($this->input->post('txt_upd_col_direccion_lote') != ''){
            $direc_lote = " Lt. ".$this->input->post('txt_upd_col_direccion_lote');
            }else{
            $direc_lote = '';    
            }
            if($this->input->post('txt_upd_col_direccion_piso') != ''){
            $direc_piso = " Piso ".$this->input->post('txt_upd_col_direccion_piso');
            }else{
            $direc_piso = '';    
            }
            if($this->input->post('txt_upd_col_direccion_dpto') != ''){
            $direc_dpto = " Dpto. ".$this->input->post('txt_upd_col_direccion_dpto');
            }else{
            $direc_dpto = '';    
            }
            if($this->input->post('txt_upd_col_direccion_sector') != ''){
            $direc_sector = " Sect. ".$this->input->post('txt_upd_col_direccion_sector');
            }else{
            $direc_sector = '';    
            }
            if($this->input->post('txt_upd_col_direccion_etapa') != ''){
            $direc_etapa = " Etp. ".$this->input->post('txt_upd_col_direccion_etapa');
            }else{
            $direc_etapa = '';    
            }
             
//        if ($this->form_validation->run() == true) {
            
            $this->actualizacion_col_model->setCodzona($this->input->post('Zona'));
            $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
           // $this->actualizacion_col_model->set_Direcol($this->input->post('txt_upd_col_direccion'));
            $this->actualizacion_col_model->setEmailsec($this->input->post('txt_upd_col_emails'));
             $this->actualizacion_col_model->setEmail($this->input->post('txt_upd_col_emailp'));
            $this->actualizacion_col_model->setTelcol($this->input->post('txt_upd_col_telefono'));
            $this->actualizacion_col_model->setCelcol($this->input->post('txt_upd_col_celular'));
            $this->actualizacion_col_model->setRedpm($this->input->post('txt_upd_col_celularrpm'));
            $this->actualizacion_col_model->setRedpc($this->input->post('txt_upd_col_celularrpc'));
            $this->actualizacion_col_model->setCeluemp($this->input->post('celuemp'));
            $this->actualizacion_col_model->setSexcol($this->input->post('cbo_upd_col_sexo'));
            $this->actualizacion_col_model->setColestcivil($this->input->post('cbo_ins_estado_civil'));
             //DIRECCION
            if($this->input->post('cbo_tipo_direccion') != ''){
                 
                $newdirec = $direc_tipo.$direc_dir.$direc_no.$direc_int.$direc_mz.$direc_lote.$direc_piso.$direc_dpto.$direc_sector.$direc_etapa;
                
                $this->actualizacion_col_model->set_Direcol($newdirec);
                
            }else{
            
            $this->actualizacion_col_model->set_Direcol($this->input->post('txt_upd_col_direccion_b'));
            
            }
            $this->actualizacion_col_model->setZonaantes($this->input->post('txt_hd_zona'));
            $this->actualizacion_col_model->setDirecolant($this->input->post('txt_hd_direccion'));
            $this->actualizacion_col_model->setEmailsecant($this->input->post('txt_hd_emails'));
            $this->actualizacion_col_model->setEmailant($this->input->post('txt_hd_emailp'));
            $this->actualizacion_col_model->setCelcolant($this->input->post('txt_hd_celular'));
            $this->actualizacion_col_model->setTelcolant($this->input->post('txt_hd_telefono'));
            $this->actualizacion_col_model->setRedpmant($this->input->post('txt_hd_celularrpm'));
            $this->actualizacion_col_model->setRedpcant($this->input->post('txt_hd_celularrpc'));
            $this->actualizacion_col_model->setCeluempantes($this->input->post('txt_hd_tipocel'));
            $this->actualizacion_col_model->setSexcolantes($this->input->post('txt_hd_sexo'));
            $this->actualizacion_col_model->setColestcivilantes($this->input->post('txt_hd_estadocivil'));
            
            $this->actualizacion_col_model->setFecnaccol($this->input->post('txt_hd_fecnac'));
            $this->actualizacion_col_model->setNombre($this->input->post('txt_hd_nombre'));
            $this->actualizacion_col_model->setApellidop($this->input->post('txt_hd_apepat'));
            $this->actualizacion_col_model->setApellidom($this->input->post('txt_hd_apemat'));
            $this->actualizacion_col_model->setDni($this->input->post('txt_hd_dni'));
            $this->actualizacion_col_model->setEmailant($this->input->post('txt_hd_emailp'));
            
            $this->actualizacion_col_model->setDescrdep($this->input->post('txt_hd_Departamentos'));
            $this->actualizacion_col_model->setDescrdist($this->input->post('txt_hd_Distrito'));
            $this->actualizacion_col_model->setDescrprov($this->input->post('txt_hd_Provincia'));
            $this->actualizacion_col_model->setCodzona($this->input->post('Zona'));
            
            $this->actualizacion_col_model->setIp($this->input->post('ip'));
            $this->actualizacion_col_model->setTipo('Externo');

            $result = $this->actualizacion_col_model->DatosColegiadoIntUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
    
    function LLena_combos(){
         $tipo = $this->input->post('tipo');
         $id = $this->input->post('id');
         $result = $this->ubigeo_model->get_s_cbo_tipodocumento($tipo,$id);
         if($result){
	     ?>
		<option value="">Seleccionar</option>
	     <?php
            foreach ($result as $fila) {
            ?>
            <option value="<?php echo $fila->codigo?>"><?php echo $fila->descrip?></option>
            <?php
            }
        } else {
            return false;
        }
    }
    function ValidarEmail() {
        $bDni = $this->actualizacion_col_model->ValidarEmail($this->input->post('txt_upd_col_emails'),$this->input->post('codigo'));
        if ($bDni) {
                echo "true";
            } else {
                echo "false";
            }
    }

    function MostrarFamiliar($idfam,$regcol) {
        $query = $this->actualizacion_col_model->MostrarFamiliar($idfam);
                $familia['regcol'] = $regcol;
                $familia['idfam'] = $this->actualizacion_col_model->getIdfam();
                $familia['apepatfam'] = $this->actualizacion_col_model->getApepatfam();
                $familia['apematfam'] = $this->actualizacion_col_model->getApematfam();
                $familia['nomfam'] = $this->actualizacion_col_model->getNomfam();
                $familia['parentesco'] = $this->actualizacion_col_model->getParentesco();
                $familia['estadovf'] = $this->actualizacion_col_model->getEstadovf();
                $familia['fecnacfam'] = $this->actualizacion_col_model->getFecnacfam();

        $this->load->view('intranet/actualizacion_colegiado/familia_upd_edit', $familia);
    }
    
    function MostrarDeporte($iddep,$regcol) {
        
                $deporte['coddep'] = $iddep;
                $deporte['regcol'] = $regcol;
        $this->load->view('intranet/actualizacion_colegiado/deporte_upd_delete', $deporte);
    }
     function AgregarFamiliar($idfam) {
                $familia['regcol'] = $idfam;   
        $this->load->view('intranet/actualizacion_colegiado/familia_upd_add', $familia);
    }
     function AgregarDeporte($regcol) {
                $deporte['regcol'] = $regcol;   
                $deporte['lista'] = $this->actualizacion_col_model->getDeportes();
        $this->load->view('intranet/actualizacion_colegiado/deporte_upd_add', $deporte);
    }
         function EliminarFamiliar($idfam,$regcol) {
                $familia['regcol'] = $regcol;   
                $familia['idfam'] = $idfam; 
        $this->load->view('intranet/actualizacion_colegiado/familia_upd_delete', $familia);
    }

            function ActualizarFamiliar() {

  
//        if ($this->form_validation->run() == true) {
           
            
            $this->actualizacion_col_model->setFecnacfam($this->input->post('txt_upd_fecnac'));
            $this->actualizacion_col_model->setNomfam($this->input->post('txt_upd_nomfam'));
            $this->actualizacion_col_model->setApepatfam($this->input->post('txt_upd_apepatfam'));
            $this->actualizacion_col_model->setApematfam($this->input->post('txt_upd_apematfam'));
            $this->actualizacion_col_model->setParentesco($this->input->post('cbo_upd_parentesco'));
            $this->actualizacion_col_model->setEstadovf($this->input->post('cbo_upd_estado'));
            
            $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
            $this->actualizacion_col_model->setIdfam($this->input->post('hid_upd_idfam'));
            
            $result = $this->actualizacion_col_model->FamiliaUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
    
                function DelDeporte() {

  
//        if ($this->form_validation->run() == true) {
           
           
             $this->actualizacion_col_model->setCoddeporte($this->input->post('hid_upd_coddep'));
             $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
            
            $result = $this->actualizacion_col_model->DeporteDel();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
    
         function DelFamiliar() {

            $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
            $this->actualizacion_col_model->setIdfam($this->input->post('hid_upd_idfam'));
            
            $result = $this->actualizacion_col_model->FamiliaDel();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
     function DeporteRepetido() {

            $this->actualizacion_col_model->setRegcol($this->input->post('codigo'));
            $this->actualizacion_col_model->setCoddeporte($this->input->post('cbo_deportes'));
            
            $result = $this->actualizacion_col_model->DeporteR();
            if ($result) {
                echo "false";
            } else {
                echo "true";
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
    
    
         function AddFamiliar() {

  
//        if ($this->form_validation->run() == true) {
           
            
            $this->actualizacion_col_model->setFecnacfam($this->input->post('txt_upd_fecnac'));
            $this->actualizacion_col_model->setNomfam($this->input->post('txt_upd_nomfam'));
            $this->actualizacion_col_model->setApepatfam($this->input->post('txt_upd_apepatfam'));
            $this->actualizacion_col_model->setApematfam($this->input->post('txt_upd_apematfam'));
            $this->actualizacion_col_model->setParentesco($this->input->post('cbo_upd_parentesco'));
            $this->actualizacion_col_model->setEstadovf($this->input->post('cbo_upd_estado'));           
            $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
            
            $result = $this->actualizacion_col_model->FamiliaAdd();
            if ($result == 0) {
                echo 0;
            } else if ($result == 1){
                echo 1;
            } else if ($result == 2){
                echo 2;
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
    
     function AddDeporte() {

  
//        if ($this->form_validation->run() == true) {
           
            
            $this->actualizacion_col_model->setSeleccion($this->input->post('cbo_upd_seleccion'));
            $this->actualizacion_col_model->setDominio($this->input->post('cbo_upd_dominio'));
             $this->actualizacion_col_model->setCoddeporte($this->input->post('cbo_deportes'));
             $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
            
            $result = $this->actualizacion_col_model->DeporteAdd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
//        } else {
//            //errores de form_validation desde el evento mostrado
//            echo 3;
//        }
    }
    
        function ValidarFechaNac() {
        $txtfecnac = $this->input->post('txt_upd_fecnac');
        $year_ingresado=explode('/',$txtfecnac);
        $year=$year_ingresado[2];
        $mes=$year_ingresado[1];
        $dia=$year_ingresado[0];
        $hoym = date('m');
        $hoyd = date('d');
        $hoyy = date('Y');
            if($year >= $hoyy){
                if ($mes >= $hoym){
                    if($dia > $hoyd) {
                        echo "false";
                    }else{
                        echo "true";
                    }
                }else{
                   echo "true"; 
                }
            }else{
                echo "true";
            }
    }

	function ValidarFechaNacFam() {
        $txtfecnac = $this->input->post('txt_upd_fecnac');
        $year_ingresado=explode('-',$txtfecnac);
        $year=$year_ingresado[0];
        $mes=$year_ingresado[1];
        $dia=$year_ingresado[2];
        $hoym = date('m');
        $hoyd = date('d');
        $hoyy = date('Y');
            if($year >= $hoyy){
                if ($mes >= $hoym){
                    if($dia > $hoyd) {
                        echo "false";
                    }else{
                        echo "true";
                    }
                }else{
                   echo "true"; 
                }
            }else{
                echo "true";
            }
    }

}
?>
 