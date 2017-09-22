<?php 
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Index extends CI_Controller {
    function __construct() {
        parent::__construct();
 $this->db_colegiado = $this->load->database('colegiado', TRUE);
                 //$this->load->model('biblioteca/reservas_usuario_model');
                         //$this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
        $this->_Esta_logeado(); 
  $this->_Esta_migrado();
    }

    public function index() {
        $nick = $this->session->userdata('nick');
        if ($nick == 'Biblioteca' or $nick == 'Admin'){
                  $data['main_content'] = 'dashboard/cuerpo';  
        }
else{
            $data['main_content'] = 'dashboard/cuerpo2';
}
        $data['titulo'] = 'Oficina Virtual v3.0';
        // $data['ver']=$this->reservas_usuario_model->estaQry();
         //$data['ver1']=$this->reservas_usuario_model->ultimaTesisQry();
         //$data['ver2']=$this->reservas_usuario_model->ultimaRyLQry();
         //$data['ver3']=$this->reservas_usuario_model->listaUltimaReservas();
        $this->load->view('dashboard/template',$data);
    }

    function _Esta_logeado() {
        $esta_logeado = $this->session->userdata('esta_logeado');
        $nPerID = $this->session->userdata('nPerID');
        if ($esta_logeado != true OR $nPerID = '') {
            redirect('usuario/login');
        }
    } 
 function _Esta_migrado() {
        $this->load->model('migration_model');
        $nick = $this->session->userdata('nick');
        $nPerID = $this->session->userdata('IDPer');
        $ntypo = $this->session->userdata('usutipo');
        $this->migration_model->setMd5($nick);
        $migrado = $this->migration_model->VerificaMigracion($nPerID);
        if($migrado == 0 && $ntypo ==7){
            
            echo "<script>
                 document.location='http://localhost/registroexterno/alerta/migration/".$this->migration_model->enc()."';
                </script>";
        }
    }
	    function cambiar_clave() {
		    $esta_logeado = $this->session->userdata('esta_logeado');
        $nPerID = $this->session->userdata('nPerID');
     if ($esta_logeado != false OR $nPerID = '') {
            echo "1";
        }else{
		    echo "0";
		};
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */