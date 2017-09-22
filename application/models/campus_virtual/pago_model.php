<?php

class pago_model extends CI_Model {
    
    private $idAlumno;
    private $idHorario;
    private $monto;
    private $fecha;
    private $nroVoucher;
    private $tipomat;
    private $acuenta;
    private $observacion;
    private $idPago;
    private $Descuento;
    public $tipoComprobante;
    
    function getTipoComprobante() {
        return $this->tipoComprobante;
    }

    function setTipoComprobante($tipoComprobante) {
        $this->tipoComprobante = $tipoComprobante;
    }

       
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function getDescuento() {
        return $this->Descuento;
    }

    function setDescuento($Descuento) {
        $this->Descuento = $Descuento;
    }

    public function getIdPago(){
        return $this->idPago;
    }
    
    public function setIdPago($idPago) {
        $this->idPago=$idPago;
    }

    public function getIdAlumno(){
        return $this->idAlumno;
    }
    
    public function setIdAlumno($idAlumno) {
        $this->idAlumno=$idAlumno;
    }
    
    public function getIdHorario() {
        return $this->idHorario;
    }
    
    public function setIdHorario($idHorario) {
        $this->idHorario=$idHorario;
    }

    public function  getMonto() {
        return $this->monto;
    }
    
    public function setMonto($monto) {
        $this->monto=$monto;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
    
    public function setFecha($fecha) {
        $this->fecha=$fecha;
    }
    
    public function getNroVoucher() {
        return $this->nroVoucher;
    }
    
    public function setNroVoucher($nroVoucher) {
        $this->nroVoucher=$nroVoucher;
    }
    public function getTipomat() {
        return $this->tipomat;
    }

    public function setTipomat($tipomat) {
        $this->tipomat = $tipomat;
    }

    public function getAcuenta() {
        return $this->acuenta;
    }

    public function setAcuenta($acuenta) {
        $this->acuenta = $acuenta;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
    

    //----------------------------------------------------------------------------
    public function pagoInsertar($tipo){
       
      $parametros = array($this->getIdHorario(), $this->getIdAlumno(), $this->getMonto(), $this->getNroVoucher(), $this->getAcuenta(), $this->getFecha(),'Ninguna',$this->getTipoComprobante());
      $pmatricula= array($this->getDescuento(), $this->getObservacion(),$this->getIdHorario(),$this->getIdAlumno());
      if($tipo==0){
         $matricula = $this->db->query("update matricula set nMatTipo=1,nMatDescuento=?,cMatObservacion=? where nHorId=? and nPerId=?",$pmatricula);
      }
        $query = $this->db->query("CALL USP_CVI_I_PagoMatricula (?,?,?,?,?,?,?,?);", $parametros);
        $this->db->close();
        if ($query ) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    public function pagoActualizar(){
        $parametros = array($this->getIdPago(), $this->getAcuenta(), $this->getObservacion(), $this->getNroVoucher(), $this->getFecha());
        $query = $this->db->query("CALL USP_CVI_U_PagoMatricula (?,?,?,?,?);", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    //----------------------------------------------------------------------------
        
    public function pagoIns($descuento){
        if(!$this->validarCosto(1,$descuento)){
            return false;
        }
        else {
            $parametros = array($this->getIdHorario(), 
                                $this->getIdAlumno(), 
                                $this->getMonto(),
                                $this->getNroVoucher());
            $query1 = $this->db->query("CALL USP_CVI_I_Pago(?,?,?,?);",$parametros);
            $this->db->close();
            if ($query1) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }
        }
    }
        public function pagoUpd($descuento){
            $tipo = $this->getTipomat();
        if($tipo == 0 && $descuento){
           $parametros = array($this->getIdHorario(), 
                                $this->getIdAlumno(), 
                                $this->getMonto(),
                                $this->getNroVoucher());
            $query1 = $this->db->query("CALL USP_CVI_I_Pago(?,?,?,?);",$parametros);
            $query2 = $this->db->query("update matricula
 set nMatDescuento = '1'
where nHorId=?
 and nPerId=?", array($this->getIdHorario(),$this->getIdAlumno()));
            $this->db->close();
            if ($query1 && $query2) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }  
        }
        else {
                         $parametros = array($this->getIdHorario(), 
                                $this->getIdAlumno(), 
                                $this->getMonto(),
                                $this->getNroVoucher());
            $query1 = $this->db->query("CALL USP_CVI_I_Pago(?,?,?,?);",$parametros);
            $this->db->close();
            if ($query1) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }
            return false;
        }

    }
    
    function validarCosto($tipoMat,$des){
        if($tipoMat == 1) {
            $query = $this->db->query('CALL USP_CVI_S_GetCostoCurso(?)',  array($this->getIdHorario()));
            $this->db->close();
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $costo = $row->costo;
                $cuotas = $row->cuotas;
                $descuento = $row->descuento;
            }
            else{
                  $costo = 0;
                  $cuotas=1;
                }
            if($des) 
              {
             return ($this->getMonto() >= ($costo*(1-($descuento/100))/$cuotas))&&($this->getMonto() <= ($costo*(1-($descuento/100))));   
            }
            else {
                return ($this->getMonto() >= ($costo/$cuotas))&&($this->getMonto() <= $costo);
            }
        }
        else {
            return true;
        }
    }
    
    function pagoUpdHor($idHorNuevo) {
        $parametros = array($idHorNuevo, $this->getIdAlumno(),  $this->getIdHorario());
        $query = $this->db->query("CALL USP_CVI_U_Pago(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function getPagos($idAlumno, $idHorario){
        $query = $this->db->query('SELECT * FROM pago WHERE nPerId=? AND nHorId=? and nEstPago=1;', array($idAlumno, $idHorario));
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}
?>
