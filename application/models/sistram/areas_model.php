<?php

class Areas_model extends CI_Controller {

    // Parametros secuendarios Procedimiento
   
    private $nUsuId;
    private $cargodescripcion;
    private $areadescripcion;
    private $descripcionCargo;
    private $nAreaId;
    

    function getDescripcionCargo() {
        return $this->descripcionCargo;
    }

    function setDescripcionCargo($descripcionCargo) {
        $this->descripcionCargo = $descripcionCargo;
    }

        
    function getCargodescripcion() {
        return $this->cargodescripcion;
    }

    function setCargodescripcion($cargodescripcion) {
        $this->cargodescripcion = $cargodescripcion;
    }

        
    
    function getNAreaId() {
        return $this->nAreaId;
    }

    function setNAreaId($nAreaId) {
        $this->nAreaId = $nAreaId;
    }

    function getAreadescripcion() {
        return $this->areadescripcion;
    }

    function setAreadescripcion($areadescripcion) {
        $this->areadescripcion = $areadescripcion;
    }

    function getNUsuId() {
        return $this->nUsuId;
    }

    function setNUsuId($nUsuId) {
        $this->nUsuId = $nUsuId;
    }

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
    function getUsuariosColegiado(){
        $query=$this->bdcolegio->query("select * from user");
        if($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }
    function validarArea($area){
        $parametros=array($area);
        $query=$this->db->query("select * from tb_sistram_areas where nUsuId=? and cAreasEstado=1",$parametros);
        if($query->num_rows()>0){
            return false;
        }
        else{
            return true;
        }
        
    }
    
    
    function getUsuId($usuario){
        $query=$this->db->query("select * from usuario where cUsuNick=? and nUsuTipo=2 and bUsuEstado=1",$usuario);
        if($query){
            if($query->num_rows()>0){
                $row=$query->row();
                return $row->nUsuId;
            }
            else{ return -1;}
        }
        
    }
    function getUsuario($ID){
        $parametros=array($ID);
        $query=$this->bdcolegio->query("select * from user where ID=?",$parametros);
        if($query->num_rows() > 0) {
            
            $row=$query->row();
            return $row->nombres;
        }
        else {
            return 'false';
        }
    }
   
    function areasIns() {
        $parametros = array($this->getAreadescripcion(),$this->getCargodescripcion(),$this->getNUsuId());
        
        $query = $this->db->query("INSERT INTO tb_sistram_areas(nAreasId,cAreasDescripcion,cDescripcionCargo,nUsuId,cAreasEstado)VALUES(NULL,?,?,?,'1')", $parametros);

        if ($query) {
            return $this->db->insert_id();
           // return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function areasQry() {
        $query = $this->db->query("SELECT * FROM tb_sistram_areas as a where a.cAreasEstado=1");
        if ($query) {
            return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }


    function areasDel() {
              
        
        $parametros = array($this->getNAreaId());
        // $query1=$this->db->query("DELETE FROM tb_sistram_detalle_area_persona WHERE nAreasId=?;",$parametros);
        $query = $this->db->query("update tb_sistram_areas set cAreasEstado=0 WHERE nAreasId=?;", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function validarmovimientoareas($nAreasId){
        $parametros=array($nAreasId,$nAreasId);
        $query=$this->db->query("select * from tb_sistram_movimiento where nAreasIdEmisor=? or nAreasIdReceptor=?",$parametros);
        if($query->num_rows()>0){
            return false;
        }
        else{
            return true;
        }
        
        
    }
     function areaencargadoIns($nAreaId,$responsable) {
        $parametros = array($nAreaId, $responsable);

        $query = $this->db->query("INSERT INTO tb_sistram_areasdetalle (nAreadetalleId,nAreasId,cNombreEncargado,dFechaInicio,dFechaFin,estadoDetalle)
                VALUES (NULL,?,?,curdate(),NULL,'1');", $parametros);

        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
      function areaGet($nAreasId) {
        $parametros = array($nAreasId);
        $query = $this->db->query("SELECT * FROM tb_sistram_areas as a where a.cAreasEstado=1 and a.nAreasId=?", $parametros);
        if ($query) {
            $row = $query->row();
     
            $this->setNAreaId($row->nAreasId);
            $this->setAreadescripcion($row->cAreasDescripcion);
            $this->setDescripcionCargo($row->cDescripcionCargo);
       
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function responsableQry($nAreasId) {
        $parametros = array($nAreasId);
        $query = $this->db->query("SELECT da.cNombreEncargado,da.dFechaInicio,da.estadoDetalle
                FROM tb_sistram_areasdetalle da inner join tb_sistram_areas as a on da.nAreasId=a.nAreasId 
             where da.nAreasId=? and a.cAreasEstado=1 ", $parametros);

        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
    }
    function areasAsig($nombre,$areaId) {
      
        $param = array($areaId);
        $query2 = $this->db->query("select * from  tb_sistram_areasdetalle WHERE estadoDetalle=1 and nAreasId=?;", $param);
        if($query2->num_rows()>0){
        $row = $query2->row();
        $nombreresponsable = $row->cNombreEncargado;
        //echo $nombreresponsable;
            if ($nombre != $nombreresponsable) {
                $query = $this->db->query("UPDATE tb_sistram_areasdetalle SET estadoDetalle='0',dFechaFin=curdate() WHERE estadoDetalle=1 and nAreasId=?;", $param);
                if ($query) {
                    $this->areaencargadoIns($areaId, $nombre);
                    return 1;
                } else {
                    return -1;
                }
            } else {
                return 2;
            }
        }else {
             $a=$this->areaencargadoIns($areaId, $nombre);
             if($a){
                 return 1;
             }
             else {
                 return -1;
             }
             
        }
     
    }

}
