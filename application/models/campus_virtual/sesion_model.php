<?php

class Sesion_model extends CI_Model {
    
    private $idSesion;
    private $idHorario;
    private $fecha = '';
    private $titulo = '';
    private $valor = '';
    private $observacion = '';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getObservacion() {
        return $this->observacion;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function getIdSesion() {
        return $this->idSesion;
    }

    public function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;
    }

    public function getIdHorario() {
        return $this->idHorario;
    }

    public function setIdHorario($idHorario) {
        $this->idHorario = $idHorario;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    function sesionIns(){
        $parametros = array($this->getIdSesion(), $this->getTitulo(), $this->getValor());
        $query = $this->db->query("call USP_CVI_I_Sesion(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function sesionUpd(){
        $parametros = array($this->getTitulo(), $this->getIdSesion());
        $query = $this->db->query("call USP_CVI_U_Sesion(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function sesionesCbo($valor) {
        $query = $this->db->query("select s.nSesId, s.cSesTitulo from sesion s
                                  where s.nHorId = ? and s.nSesEstado = 1;", array($valor));
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
    
    function sesionesTemporales($valor){
        $query = $this->db->query("select DATE_FORMAT(s.cSesFechaProgramada, '%d/%m/%Y') as Fecha, s.nHorId as id, s.nSesId as idSesion from sesion s
                                  where s.nHorId = ? and s.nSesEstado = 0", array($valor));
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
    
    function verificarSesionesActivas($idHorario) {
        $query = $this->db->query("select count(s.nHorId) as cantidad from sesion s 
                                  where s.nHorId=?;", array($idHorario));
        $row = $query->row();
        $verificar['cantidad'] = $row->cantidad;
        return $verificar;
    }
    
function getSesionesHorario() {
        $query = $this->db->query("SELECT s.nSesId AS IdSesion,
                                                s.cSesFechaProgramada as Fecha
                                        FROM sesion AS s 
                                        WHERE s.nHorId = ? AND s.nSesEstado = 1;", array($this->idHorario));
        
        if(count($query)>0) {
            return $query;
        }
        else {
            return false;
        }
    }
    
    function verificarTieneNotas($idSesion){
        $query = $this->db->query("select count(*) as cantidad from nota n 
                                  where n.nSesId = ?;", array($idSesion));
        $row = $query->row();
        $cantidad = $row->cantidad;
        return $cantidad;
    }
    
    function sesionGet($idSesion){
        $query = $this->db->query("select s.nSesId, s.cSesTitulo, s.cSesFechaProgramada from sesion s 
                                  where s.nSesId = ?;", array($idSesion));
        if($query->num_rows() > 0){
                    $row = $query->row();
                    $this->setIdSesion($row->nSesId);
                    $this->setTitulo($row->cSesTitulo);
                    $this->setFecha($row->cSesFechaProgramada);
                    $resp = true;
        }
        else{
                $resp = false;
            }
        return $resp;    
    }
    
    function alumnosHorario($idHorario){
        $query = $this->db->query("select m.nPerId from matricula m 
                                  where m.nHorId = ?;", array($idHorario));
        $i = 0;
        $arreglo = null;
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $arreglo[$i] = $row->nPerId;
                $i++;
            }
        }
        return $arreglo;    
    }
    
    function sesionRecuperacionIns(){
        $parametros = array($this->getIdhorario(), $this->getFecha(), $this->getObservacion(), $this->getIdSesion());
        $query = $this->db->query("call USP_CVI_I_SesionRecuperacion(?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
function fechaHoy(){
    // P.ej: select date_format('2015-03-16', '%d/%m/%Y') AS hoy --- activar cuando paso el curso.
   $query = $this->db->query("select date_format(curdate(), '%d/%m/%Y') AS hoy;");
        $row = $query->row();
        $fecha = $row->hoy;
        return $fecha;
    }
}

?>