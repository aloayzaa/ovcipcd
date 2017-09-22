<?php

class Eventos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('eventos/eventos_model','',TRUE);
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Eventos';
        $data['TEventos']=$this->eventos_model->getCapitulos();
        $this->load->view('eventos/panel_view', $data);
    }

    function load_listar_view_eventos() {
        $this->load->view('eventos/qry_view');
    }


    function eventosQry() {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
          
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'eventos_model',
                    'metodo' => 'eventosQry',
                    'criterios' => '',
                    'pkid' => 'nEveId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nEveId',
                        'cEveCuentaIngreso',
                        'cEveTitulo',
                        'cFechaEvenInicio',
                        'cFechaEven',
                        'nEveTipoEvento',
                        'opcion'
                    ),
                )
        );
    }
    
    function eventosIns() {
               
        $this->form_validation->set_rules('txt_ins_eve_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_ins_eve_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_rules('txt_ins_eve_fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('txt_ins_eve_fecha_inicio', 'Fecha Inicio', 'required');
        $this->form_validation->set_rules('txt_ins_eve_cuenta_ingreso', 'Cuenta Ingreso', 'required|trim');
        
        $this->form_validation->set_message('required', 'El %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->eventos_model->setTitulo($this->input->post('txt_ins_eve_titulo'));
            $this->eventos_model->setDescripcion($this->input->post('txt_ins_eve_descripcion'));
            $this->eventos_model->setTipoeventos($this->input->post('cbo_tevento'));
            $this->eventos_model->setFechaevento($this->input->post('txt_ins_eve_fecha'));
            
            $this->eventos_model->setFechaeventoinicio($this->input->post('txt_ins_eve_fecha_inicio'));
            
            $this->eventos_model->setCuenta_ingreso($this->input->post('txt_ins_eve_cuenta_ingreso'));
            
            $this->eventos_model->setHoras($this->input->post('txt_ins_eve_horas'));
            if($this->eventos_model->getHoras()=='Sin Hora'){
                  $this->eventos_model->setHoras(0);
            }
            
            if($this->eventos_model->getCuenta_ingreso()!='Sin Cuenta'){
                $validar=$this->eventos_model->validarcuenta();
                if($validar){
                      $result = $this->eventos_model->eventosIns();
                    if ($result) {
                        echo 1; //EXITO
                    } else {
                        echo 0; //ERROR
                    }
                }
                else {
                    echo 2;//error de cuenta ingreso no esta en bdcolegio
                }  
            }else {
                  
                  $this->eventos_model->setCuenta_ingreso(NULL);
                  $result = $this->eventos_model->eventosIns();
                  if ($result) {
                        echo 1; //EXITO
                    } else {
                        echo 0; //ERROR
                    }
                  
            }
                
            
          
            }
           
         else {
            $this->index();
        }
    }
      
    function popupEditar($nEveId){
            $parametros = $this->eventosGet($nEveId);
            $this->load->view('eventos/upd_view',$parametros);
    }
    
    
    function eventosGet($nEveId) {
        $query = $this->eventos_model->eventosGet($nEveId);
        if ($query) {
            $evento['nEveId'] = $this->eventos_model->getNEveId();
            $evento['cEveTitulo'] = $this->eventos_model->getTitulo();
            $evento['nEveTipoEvento'] = $this->eventos_model->getTipoeventos();
            $evento['cEveDescripcion'] = $this->eventos_model->getDescripcion();
            $evento['cFechaEven'] = $this->eventos_model->getFechaevento();
            $evento['cFechaEvenInicio'] = $this->eventos_model->getFechaeventoinicio();
            $evento['cEveCuentaIngreso'] = $this->eventos_model->getCuenta_ingreso();
            $evento['tipoevento']=$this->eventos_model->getCapitulos();
            $evento['horas']=$this->eventos_model->getHoras();
            
            return $evento;
            
        } else {
            return false;
        }
    }

    function eventosUpd() {
        $this->form_validation->set_rules('txt_upd_eve_titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('txt_upd_eve_descripcion', 'Descripcion', 'required');
        $this->form_validation->set_rules('txt_upd_eve_fecha', 'Fecha', 'required');
         $this->form_validation->set_rules('txt_upd_eve_fecha_inicio', 'Fecha Inicio', 'required');
       
        
        $this->form_validation->set_rules('txt_upd_eve_cuenta', 'Cuenta Ingreso', 'required');
        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            
            $this->eventos_model->setTitulo($this->input->post('txt_upd_eve_titulo'));
            $this->eventos_model->setDescripcion($this->input->post('txt_upd_eve_descripcion'));
            $this->eventos_model->setTipoeventos($this->input->post('cbo_tevento'));
            $this->eventos_model->setFechaevento($this->input->post('txt_upd_eve_fecha'));
            
            $this->eventos_model->setFechaeventoinicio($this->input->post('txt_upd_eve_fecha_inicio'));
                      
            $this->eventos_model->setCuenta_ingreso($this->input->post('txt_upd_eve_cuenta'));
            $this->eventos_model->setNEveId($this->input->post('hid_udp_nEveId'));
            
            
            $this->eventos_model->setHoras($this->input->post('txt_upd_eve_horas'));
            if($this->eventos_model->getHoras()=='Sin Hora'){
                  $this->eventos_model->setHoras(0);
            }
            if($this->eventos_model->getCuenta_ingreso()=='Sin Cuenta'){
                 $this->eventos_model->setCuenta_ingreso(NULL);
               $result = $this->eventos_model->eventosUpd();
            }
            else {
                $result = $this->eventos_model->eventosUpd();
            }
//$result = $this->eventos_model->eventosUpd();
                    if ($result) {
                        echo 1; //EXITO
                    } else {
                        echo 0; //ERROR
                    } 
 
        } 
        else {
           // $this->index();
        }
    }

    function eventosDel($nNotCodigo) {
        $this->eventos_model->setNEveId($nNotCodigo);
        $result = $this->eventos_model->eventosDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

   

}
    

