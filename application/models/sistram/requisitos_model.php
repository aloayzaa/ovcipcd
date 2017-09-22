<?php

class Requisitos_model extends CI_Model {

  
    function __construct() {
       parent::__construct();
        $this->load->database();
    }
    private $tipoRequisito;
    private $descripcion;
    private $nRequisitosId;
    function getNRequisitosId() {
        return $this->nRequisitosId;
    }

    function setNRequisitosId($nRequisitosId) {
        $this->nRequisitosId = $nRequisitosId;
    }

        
    function getTipoRequisito() {
        return $this->tipoRequisito;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setTipoRequisito($tipoRequisito) {
        $this->tipoRequisito = $tipoRequisito;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

       
    function requisitosIns() {
       $parametros = array($this->getDescripcion(),$this->getTipoRequisito()
                );
       $query = $this->db->query("INSERT INTO tb_sistram_requisitos(nRequisitosId,cRequisitosDescripcion,cRequisitosTipo,cRequisitosEstado) VALUES 
              (NULL,?,?,1);", $parametros);
      
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        } 
    }
      
 
    function requisitosQry() {

        $query1 = $this->db->query("select * from tb_sistram_requisitos where cRequisitosEstado=1 order by cRequisitosDescripcion");
        if ($query1->num_rows() > 0) {
          return $query1->result();
        } else {
           return null;
        }
    }
        
    function requisitosGet($nInscripcionId){
        $parametros = array($nInscripcionId);
        $query = $this->db->query("select * from tb_sistram_requisitos where nRequisitosId=?",$parametros);

        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNRequisitosId($row->nRequisitosId);
                $this->setDescripcion($row->cRequisitosDescripcion); 
                $this->setTipoRequisito($row->cRequisitosTipo);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }

    }
    function requisitosUpd() {
        $parametros = array($this->getDescripcion(),$this->getTipoRequisito(),$this->getNRequisitosId()
                );
           
        $query = $this->db->query("UPDATE tb_sistram_requisitos SET cRequisitosDescripcion =?,
cRequisitosTipo =? WHERE nRequisitosId=?;", $parametros);
      
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        } 
    } 
        
    function requisitosDel(){
        $parametros = array($this->getNRequisitosId());
        $query = $this->db->query("UPDATE tb_sistram_requisitos SET cRequisitosEstado='0' WHERE nRequisitosId=?;", $parametros);
        if ($query) {
            return true;
        } else {
          throw new Exception('error al recuperar datos de la BD');
        }
    }
        
        
}

