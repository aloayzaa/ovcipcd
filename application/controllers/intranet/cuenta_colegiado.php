<?php

class cuenta_colegiado extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db_colegiado = $this->load->database('colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/cuenta_colegiado_model');
    }

    function index() {
        $data['titulo'] = 'Estado de Cuenta CIP-CDLL';
        $data['bandeja'] = $this->cuenta_colegiado_model->cuenta_colegiadoqry();
        $data['bandeja2'] = $this->cuenta_colegiado_model->cuenta_colegiadoqry2();
        $data['reporte']= $this->cuenta_colegiado_model->pago_totalqry();
        $data['reporte_deuda']= $this->cuenta_colegiado_model->deuda_totalqry();
        $data['reporte_multa']= $this->cuenta_colegiado_model->multa_totalqry();
        $this->load->view('intranet/cuenta_colegiado/panel_view', $data);
    }
   function popupVistaDetalle($regol) {
        $campos['registros'] = $this->cuenta_colegiado_model->multa_detalleqry($regol);
        $this->load->view('intranet/cuenta_colegiado/detalle_multa_view', $campos);
    }
   function popupVistaDetalleDeuda($regol) {
        $campos['coldeuda'] = $this->cuenta_colegiado_model->deuda_detalleqry($regol);
        $this->load->view('intranet/cuenta_colegiado/detalle_deuda_view', $campos);
    }
   function popupPagoDetalle($año,$mes) {
        $data['año'] = $año;
        $data['mes'] = $mes;
        $data['tipocole'] = $this->session->userdata('tipoclase');
        $campos['detalle'] = $this->cuenta_colegiado_model->pago_detalleqry($data);
        $campos['monto']= $this->cuenta_colegiado_model->monto_totalqry($data);
        $this->load->view('intranet/cuenta_colegiado/detalle_pago_view', $campos);
    }
}

?>
