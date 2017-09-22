<?php
class Favoritos_usu_model extends CI_Model{
    
    
    private $nResId=''; 
    private $nMatId='';
    private $nFavId='';
            
    public function getNFavId() {
        return $this->nFavId;
    }

    public function setNFavId($nFavId) {
        $this->nFavId = $nFavId;
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

        
        
      function favoritos_usuqry($iduser,$tipouser) {
       
          $parametros = array($iduser,$tipouser);
         
        $query = $this->db_biblioteca->query("call USP_LISTAR_FAVORITOS(?,?)",$parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
        function FavoritosDel() {
        $parametros = array($this->getNFavId());
  
//        print_r($parametros);
        $query = $this->db_biblioteca->query("CALL USP_FAVORITOS_DEL(?)",$parametros);
      
        if ($query) {
                    return true;
        } else {
            return false;
        }
    }
    
}
?>

