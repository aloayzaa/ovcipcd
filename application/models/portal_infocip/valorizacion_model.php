<?php

class Valorizacion_model extends CI_Model {
    
    private $n_ValId = '';
    private $c_ValDesripcionCurso = '';
    private $c_ValFechaCaducidad = '';
   private $curso= '';
     private $idcurso = '';
    private $n_ValCodcurso = '';
     
    function __construct() {

        parent::__construct();
    }
    
       public function setN_ValCodcurso($n_ValCodcurso) {
       $this->n_ValCodcurso = $n_ValCodcurso;
    }
    
      public function getN_ValCodcurso() {
       return $this->n_ValCodcurso;
    }
    
       public function setIdcurso($idcurso) {
       $this->idcurso = $idcurso;
    }
    
      public function getIdcurso() {
       return $this->idcurso;
    }
       
      public function setCurso($curso) {
       $this->curso = $curso;
    }
    
      public function getCurso() {
       return $this->curso;
    }

    
    public function getN_ValId() {
        return $this->n_ValId;
    }

    public function setN_ValId($n_ValId) {
        $this->n_ValId = $n_ValId;
    }


    public function getC_ValDesripcionCurso() {
        return $this->c_ValDesripcionCurso;
    }

    public function setC_ValDesripcionCurso($c_ValDesripcionCurso) {
        $this->c_ValDesripcionCurso = $c_ValDesripcionCurso;
    }

    public function getC_ValFechaCaducidad() {
        return $this->c_ValFechaCaducidad;
    }

    public function setC_ValFechaCaducidad($c_ValFechaCaducidad) {
        $this->c_ValFechaCaducidad = $c_ValFechaCaducidad;
    }
    
       
       function AsignaturaCbo() {
        $query = $this->db->query(' SELECT * FROM `curso` WHERE `nCurTemporal`=1');
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
    
//LISTAR
    function valorizacionQry() {
   
        $query = $this->db->query("select * from valorizacion where n_ValEstado=1");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
  //  INSERTAR
    function valorizacionIns() {
        
$v1=$this->getC_ValDesripcionCurso();
$v2=$this->getC_ValFechaCaducidad();
$v3=$this->getCurso();

$query = $this->db->query("INSERT INTO valorizacion(n_ValId, c_ValDesripcionCurso, c_ValFechaCaducidad, n_ValCodcurso, n_ValEstado, n_ValVot, n_PorVot)
VALUES ('','$v1','$v2','$v3','1', 0, 0)");
$this->db->close();
if ($query) {
return true;
} else {
throw new Exception('error al recuperar datos de la BD');
}        

        }
    
     function valorizacionUpd() {
    $parametros = array($this->getN_ValId(), $this->getC_ValFechaCaducidad(), $this->getC_ValDesripcionCurso());
    $query = $this->db->query("CALL USP_VALORIZACION_UPD (?,?,?)", $parametros);
    if ($query) {
     return true;
     } else {
         throw new Exception('error al recuperar datos de la BD');
        }
    } 
   
    //LISTAR
    function valorizacionGet($n_ValId) {
        $query = $this->db->query("SELECT c.n_ValId, c.c_ValDesripcionCurso, c.c_ValFechaCaducidad, c.n_ValCodcurso 
FROM valorizacion c WHERE c.n_ValId=?", array($n_ValId));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //Objeto
            $this->setN_ValId($row->n_ValId);
            $this->setC_ValDesripcionCurso($row->c_ValDesripcionCurso);
            $this->setC_ValFechaCaducidad($row->c_ValFechaCaducidad);
            //aca modifique
            $this->setN_ValCodcurso($row->n_ValCodcurso);
            return true;
        } else {
            return false;
        }
    }

    //Eliminar
    function valorizacionDel(){
        $parametros= array($this->getN_ValId());
        $query = $this->db->query("call USP_VALORIZACION_DEL(?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
}

?>
