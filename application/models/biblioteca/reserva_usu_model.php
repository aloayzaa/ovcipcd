<?php
class Reserva_usu_model extends CI_Model{
    
    
    private $nResId=''; 
    private $nMatId='';
    private $nPerId='';
     private $hora='';
     private $fechafin='';
     private $cMatTipo='';
     private $cApe='';
     private $nombres='';
     private $universidad='';
     
     
   

                 
     public function getCMatTipo() {
         return $this->cMatTipo;
     }

     public function setCMatTipo($cMatTipo) {
         $this->cMatTipo = $cMatTipo;
     }

          public function getFechafin() {
         return $this->fechafin;
     }

     public function setFechafin($fechafin) {
         $this->fechafin = $fechafin;
     }

          
    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
    
    public function getNPerId() {
        return $this->nPerId;
    }

    public function setNPerId($nPerId) {
        $this->nPerId = $nPerId;
    }

                
    public function getNResId() {
        return $this->nResId;
    }

    public function setNResId($nResId) {
        $this->nResId = $nResId;
    }
    
  
    public function getNMatId() {
        return $this->nMatId;
    }

    public function setNMatId($nMatId) {
        $this->nMatId = $nMatId;
    }

    
    public function getCApe() {
        return $this->cApe;
    }

    public function setCApe($cApe) {
        $this->cApe = $cApe;
    }

        
    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getUniversidad() {
        return $this->universidad;
    }

    public function setUniversidad($universidad) {
        $this->universidad = $universidad;
    }

            
        
      function reserva_usuqry($iduser,$tipouser) {
      
           $parametros = array($iduser,$tipouser);
         
        $query = $this->db_biblioteca->query("call USP_RESERVA_AUT_USU(?,?)",$parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
        function FavoritosAdd() {
        $parametros = array($this->getNMatId(),$this->getCMatTipo(),$this->getNPerId());
  
//        print_r($parametros);
        $query = $this->db_biblioteca->query("CALL USP_FAVORITOS_ADD (?,?,?)",$parametros);
      
        if ($query) {
                    return true;
        } else {
            return false;
        }
    }
    
        function ReservaCancel() {
        $parametros = array($this->getNResId(),$this->getCMatTipo(),$this->getNMatId());
  
//        print_r($parametros);
        $query = $this->db_biblioteca->query("CALL USP_RESERVA_CANCEL (?,?,?)",$parametros);
      
        if ($query) {
                    return true;
        } else {
            return false;
        }
    }
    
        
    function reservains($iduser,$tipouser,$id){
       $tipo='T';
       $apelli='Nacho';
      $parametros = array($this->getNMatId(),$this->getFechafin(),$this->getHora(),$tipo,$iduser,$tipouser,$id,$this->getCApe(),$this->getNombres(),$this->getUniversidad());
      $query = $this->db_biblioteca->query("CALL USP_RESERVA_ADD(?,?,?,?,?,?,?,?,?,?)", $parametros);
      $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
        function reservainslib($iduser,$tipouser,$id){
       $tipo='L';
      $parametros = array($this->getNMatId(),$this->getFechafin(),$this->getHora(),$tipo,$iduser,$tipouser,$id,$this->getCApe(),$this->getNombres(),$this->getUniversidad());
      $query = $this->db_biblioteca->query("CALL USP_RESERVA_LIBRO_ADD(?,?,?,?,?,?,?,?,?,?)", $parametros);
      $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
}
?>
