<?php

class Tramite_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private $titulo;
    private $descripcion;
    private $nTramiteId;
    private $nrequisitoId;
    private $tipoPersona;
    
    function getTipoPersona() {
        return $this->tipoPersona;
    }

    function setTipoPersona($tipoPersona) {
        $this->tipoPersona = $tipoPersona;
    }

    

    function getNrequisitoId() {
        return $this->nrequisitoId;
    }

    function setNrequisitoId($nrequisitoId) {
        $this->nrequisitoId = $nrequisitoId;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getNTramiteId() {
        return $this->nTramiteId;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNTramiteId($nTramiteId) {
        $this->nTramiteId = $nTramiteId;
    }

    function requisitosagregar($nTramiteId) {
        $parametros = array($nTramiteId);
        $query = $this->db->query("SELECT * FROM tb_sistram_requisitos WHERE nRequisitosId NOT IN (SELECT nRequisitosId from tb_sistram_requisitostramite where nTramiteId=?)", $parametros);

        if ($query) {
            return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function tramiterequisitoIns() {
        $parametros = array($this->getNrequisitoId(), $this->getNTramiteId());
        $query = $this->db->query("INSERT INTO tb_sistram_requisitostramite(
nRequisitosId,nTramiteId)VALUES (?,?);", $parametros);

        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function RequisitosTramiteGet($nTramiteId) {
        $parametros = array($nTramiteId);
        $query = $this->db->query("select * from tb_sistram_requisitostramite as rt inner join tb_sistram_requisitos as r on rt.nRequisitosId=r.nRequisitosId
where rt.nTramiteId=?", $parametros);

        if ($query) {
            return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function tramiteIns() {
        $parametros = array($this->getTitulo(), $this->getDescripcion(),$this->getTipoPersona());
        $query = $this->db->query("INSERT INTO tb_sistram_tramite(
nTramiteId,cTramiteTitulo,cTramiteDescripcion,cTramiteTipoPersona,nTramiteEstado)
VALUES(NULL,?,?,?,1);", $parametros);

        if ($query) {
            return $this->db->insert_id();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function tramiteQry() {

        $query1 = $this->db->query("select * from tb_sistram_tramite where nTramiteEstado=1");
        if ($query1->num_rows() > 0) {
            return $query1->result();
        } else {
            return null;
        }
    }

    function tramiteGet($nTramiteId) {
        $parametros = array($nTramiteId);
        $query = $this->db->query("select * from tb_sistram_tramite where nTramiteId=? and nTramiteEstado=1", $parametros);

        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNTramiteId($row->nTramiteId);
                $this->setTitulo($row->cTramiteTitulo);
                $this->setDescripcion($row->cTramiteDescripcion);
                $this->setTipoPersona($row->cTramiteTipoPersona);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function tramiteUpd() {
        $parametros = array($this->getTitulo(), $this->getDescripcion(),$this->getTipoPersona() ,$this->getNTramiteId());

        $query = $this->db->query("UPDATE tb_sistram_tramite SET cTramiteTitulo=?,
cTramiteDescripcion=?, cTramiteTipoPersona=? WHERE nTramiteId=?;", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function tramiteDel() {
        $parametros = array($this->getNTramiteId());
        $query = $this->db->query("UPDATE tb_sistram_tramite SET nTramiteEstado='0' WHERE nTramiteId=?;", $parametros);
        if ($query) {
            $query1 = $this->db->query("select * from tb_sistram_requisitostramite where nTramiteId=?", $parametros);
            if ($query1->num_rows() > 0) {
                $query2 = $this->db->query("DELETE FROM tb_sistram_requisitostramite WHERE nTramiteId=?;", $parametros);
                if ($query2) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function requisitotramiteDel() {
        $parametros = array($this->getNTramiteId(), $this->getNrequisitoId());
        $query = $this->db->query("DELETE FROM tb_sistram_requisitostramite WHERE nTramiteId=? and nRequisitosId=?", $parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

}
