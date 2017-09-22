<?php

class Tipoexpediente_model extends CI_Model {

  
    function __construct() {
       parent::__construct();
        $this->load->database();
    }
  
    private $descripcion;
    private $nTipexpedienteId;
    
    function getDescripcion() {
        return $this->descripcion;
    }

    function getNTipexpedienteId() {
        return $this->nTipexpedienteId;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNTipexpedienteId($nTipexpedienteId) {
        $this->nTipexpedienteId = $nTipexpedienteId;
    }

    function tipoexpedienteIns() {
        $parametros = array($this->getDescripcion());

      $query = $this->db->query("INSERT INTO tb_sistram_tipo_expediente(
nTipexpedienteId,
cTipexpedienteDescripcion,
cTipexpedienteEstado
)
VALUES (NULL ,?,'1');", $parametros);
      
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        } 
    }
      
 
    function tipoexpedienteQry() {

        $query1 = $this->db->query("select * from tb_sistram_tipo_expediente where cTipexpedienteEstado=1");
        if ($query1->num_rows() > 0) {
          return $query1->result();
        } else {
           return null;
        }
    }
        
    function tipoexpedienteGet($nTipexpedienteId){
        $parametros = array($nTipexpedienteId);
        $query = $this->db->query("select * from tb_sistram_tipo_expediente where nTipexpedienteId=?",$parametros);

        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNTipexpedienteId($row->nTipexpedienteId);
                $this->setDescripcion($row->cTipexpedienteDescripcion); 
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }

    }
    function tipoexpedienteUpd() {
        $parametros = array($this->getDescripcion(),$this->getNTipexpedienteId());
           
        $query = $this->db->query("UPDATE tb_sistram_tipo_expediente SET cTipexpedienteDescripcion=? WHERE nTipexpedienteId=?;", $parametros);
      
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        } 
    } 
        
    function tipoexpedienteDel(){
        $parametros = array($this->getNTipexpedienteId());
        $query = $this->db->query("UPDATE tb_sistram_tipo_expediente SET cTipexpedienteEstado='0' WHERE nTipexpedienteId=?;", $parametros);
        if ($query) {
            return true;
        } else {
          throw new Exception('error al recuperar datos de la BD');
        }
    }
        
        
}
