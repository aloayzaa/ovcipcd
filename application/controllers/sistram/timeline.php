<?php

class Timeline extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
//        $this->load->library('html2pdf');
        $this->load->model('sistram/timeline_model');
        $this->load->helper('url');
    }

    function index() {
             $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Historico - Expediente';
  
        $this->load->view('sistram/timeline/panel_view', $data);
    }
    function buscarExpediente(){
        $codigo=$this->input->post('codigo');
        $data['directivo'] = $this->timeline_model->expedientesGet($codigo);
        $data['movimientos']=$this->timeline_model->detalleMovimiento($codigo);

        $this->load->view('sistram/timeline/qry_view', $data);
        
    }
    function exportar_pdf(){
        $this->load->library('html2pdf');
        $codigo=$this->input->post('codigo');
        $data['directivo'] = $this->timeline_model->expedientesGet($codigo);
        $data['movimientos']=$this->timeline_model->detalleMovimiento($codigo);
        $this->html2pdf->folder('./uploads/sistram/reporte/');

        $archivo = "REP-" . $codigo . ".pdf";
        $this->html2pdf->filename($archivo);

        $this->html2pdf->paper('a4', 'portrait');
        $this->html2pdf->html(utf8_decode($this->load->view('sistram/timeline/pdf_timeline', $data, true)));
        if ($this->html2pdf->create('save')) {
            echo $archivo;
        }
   }
      private function createFolder() {
        if (!is_dir("./uploads")) {
            mkdir("./uploads", 0777);
            mkdir("./uploads/sistram", 0777);
            mkdir("./uploads/sistram/reporte", 0777);
        }
    }
   
 
}
