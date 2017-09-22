<?php

class Curso_model extends CI_Model {
    
    private $idCurso;
    private $nombre = '';
    private $tipo = '';
    private $descripcion = '';
  //  private $descuento = '';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    function cursoQry() {
        $query = $this->db->query("select nCurId, cCurNombre, 
                                       cCurDescripcion, cCurTipo from curso where nCurTemporal=1");
         if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

     function cursoGet($idCurso) {
        $query = $this->db->query("select * from curso where nCurId = ?", array($idCurso));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //Objeto
            $this->setIdCurso($row->nCurId);
            $this->setNombre($row->cCurNombre);
            $this->setTipo($row->cCurTipo);
            $this->setDescripcion($row->cCurDescripcion);
         //   $this->setDescuento($row->nCurDescuento);
            return true;
        } else {
            return false;
        }
    }

    function cursoIns(){
        $parametros = array($this->getNombre(), $this->getTipo(), $this->getDescripcion());
        $query = $this->db->query("call USP_PI_I_CursoT(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

   

    function cursoUpd() {
        $parametros = array($this->getIdCurso(), $this->getNombre(), $this->getTipo(), $this->getDescripcion());
        $query = $this->db->query("call USP_PI_U_CursoT(?,?,?,?)",$parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function cursoEstado(){
        $parametros= array($this->getIdCurso());
        $query = $this->db->query("call USP_PI_U_CursoTEstado(?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
}

?>
