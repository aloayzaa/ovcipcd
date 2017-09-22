<?php
class Migration_model extends CI_Model {
    
    private $md5 = '';
    
    public function getMd5() {
        return $this->md5;
    }

    public function setMd5($md5) {
        $this->md5 = $md5;
    }

                
     function enc(){    
      $params = array($this->getMd5());
      $query = $this->db->query("CALL USP_GEN_MD5 (?)",$params);
      $this->db->close();
      $row = $query->row();
      return  $row->p_codeo;
    } 
    
    function VerificaMigracion($nPerID){
        
     $params = array($nPerID);
     $query = $this->db->query("Select * from persona_detalle where nPerId =?",$params);

     $this->db->close();
     if($query){
        if($query->num_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }else{
        return 0;
    }
    }   
}
?>

