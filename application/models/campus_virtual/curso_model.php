<?php

class Curso_model extends CI_Model {

    private $idCurso;
    private $nombre = '';
    private $tipo = '';
    private $descripcion = '';
    private $descuento = '';
    private $cuenta = '';
    
    //solo para iepi
    private $fechainicio;
    private $fechafin;
    private $horas;
    private $nPerIdDocente;
    

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //metodos para get y set solo para iepi
    function getFechainicio() {
        return $this->fechainicio;
    }

    function getFechafin() {
        return $this->fechafin;
    }

    function getHoras() {
        return $this->horas;
    }

    function getNPerIdDocente() {
        return $this->nPerIdDocente;
    }

    function setFechainicio($fechainicio) {
        $this->fechainicio = $fechainicio;
    }

    function setFechafin($fechafin) {
        $this->fechafin = $fechafin;
    }

    function setHoras($horas) {
        $this->horas = $horas;
    }

    function setNPerIdDocente($nPerIdDocente) {
        $this->nPerIdDocente = $nPerIdDocente;
    }

    //--------------------------------------//    
    
    
    function getDescuento() {
        return $this->descuento;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
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

    public function getCuenta() {
        return $this->cuenta;
    }

    public function setCuenta($cuenta) {
        $this->cuenta = $cuenta;
    }

    function cursoQry($criterio = '') {
        $query = $this->db->query("select nCurId, cCurNombre, cCurTipo, cCurDescripcion , nCurCuentaIngreso
                                  from curso where nCurEstado=1 and cCurTipo=? order by nCurId desc", array($criterio['criterio']));
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function cursoQryTemporales($criterio = '') {
        $query = $this->db->query("select nCurId, cCurNombre, cCurTipo, cCurDescripcion 
                                  from curso where nCurTemporal=1 and nCurEstado=0 and cCurTipo=? order by nCurId desc", array($criterio['criterio']));
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function activarCursosTemporales() {
        $parametros = array($this->getIdCurso());
        $query = $this->db->query("update curso set nCurEstado=1, nCurTemporal=0 where nCurId=?", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function cursoIns() {
        //  echo  "modelo: tipo!".$this->getTipo();
        $parametros = array($this->getNombre(), $this->getTipo(), $this->getDescripcion());
        if ($this->verificarCurso($this->getNombre())) {
            $query = $this->db->query("update curso set nCurEstado=1, nCurTemporal=0, cCurTipo=?, cCurDescripcion=? where cCurNombre=?", array($this->getTipo(), $this->getDescripcion(), $this->getNombre()));
        } else {
            $query = $this->db->query("call USP_CVI_I_Curso(?,?,?)", $parametros);
        }
       $this->db->close();
        $idnuevo=-1;
        if ($query) {
            $query2=$this->db->query("SELECT MAX( nCurId ) AS max FROM curso");
            $idnuevo=$query2->row();
            $idnuevo=$idnuevo->max;
            return $idnuevo;
           // return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function conceptoDiplomadoIns($titulo,$sumilla,$idnuevo){
        $parametros=array($titulo,$sumilla,$idnuevo);
        $query=$this->db->query("INSERT INTO concepto_diplomado (nConDipId,cConDipTitulo,cConDipSumilla,nCurId) VALUES (NULL ,?,?,?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
        
        
    }
    function moduloUpd($id,$nombre,$nPerId){
         $parametros = array($nombre,$nPerId,$id);
     
         $query = $this->db->query("update concepto_diplomado set cConDipSumilla=?,nPerId=? where nConDipId=?", $parametros); 
          if ($query) {
            return true;
            } else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
        
    }
    function moduloDel($id){
        $query = $this->db->query("delete from concepto_diplomado where nConDipId=?", $id); 
          if ($query) {
            return true;
            } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function cursoAsig() {
        $parametros = array($this->getCuenta(), $this->getIdCurso());
        $query = $this->db->query("update curso set nCurCuentaIngreso=? where nCurId=?", $parametros);
        /*  echo "cuenta".$this->getCuenta();
          echo "idcurso".$this->getIdCurso(); */
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
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
            $this->setCuenta($row->nCurCuentaIngreso);
            return true;
        } else {
            return false;
        }
    }

    function cursoUpd() {
        $parametros = array($this->getIdCurso(), $this->getNombre(), $this->getTipo(), $this->getDescripcion());
        $query = $this->db->query("call USP_CVI_U_Curso(?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function cursoDet(){
        $evaluar=$this->db->query("select * from curso_detalle_iepi where nCurId=?",$this->getIdCurso());
        if($evaluar->num_rows()>0){
            $parametros = array($this->getFechainicio(),$this->getFechafin(),$this->getHoras(),$this->getNPerIdDocente(),$this->getIdCurso());
            $query = $this->db->query("update curso_detalle_iepi set cFechaInicio=?,cFechaFin=?,cHoras=?,nPerId=? where nCurId=?", $parametros);
            $this->db->close();
        }
        else {
          $parametros = array($this->getIdCurso(),$this->getFechainicio(),$this->getFechafin(),$this->getHoras(),$this->getNPerIdDocente());
          $query = $this->db->query("insert into curso_detalle_iepi values (NULL,?,?,?,?,?)", $parametros);
          $this->db->close();
        }
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function cursoEstado() {
        $parametros = array($this->getIdCurso());
        $query = $this->db->query("call USP_CVI_U_CursoEstado(?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function detalleiepi($idcurso){
        $query = $this->db->query("select * from curso_detalle_iepi where nCurId=? limit 1", $idcurso);
        if ($query->num_rows()>0) {
             return $query->row();
        } else {
            return "";
        }
    }

    function verificarCurso($nombreCurso) {
        $query = $this->db->query("select nCurId, nCurEstado, nCurTemporal from curso where cCurNombre=?", array($nombreCurso));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function getModulos($idCurso){
        $query = $this->db->query("select * from concepto_diplomado where nCurId=? and cConDipTitulo<>'' and cConDipSumilla<>''",$idCurso);
        if ($query->num_rows() > 0) {
            
            return $query->result();
        } else {
            return false;
        }
    }
    function cantidadModulos($idCurso){
        $query = $this->db->query("select * from concepto_diplomado where nCurId=?",$idCurso);
        return $query->num_rows();
        
    }
     

}

?>
