<?php

class Persona_model extends CI_Model {

    private $PerApellidoPaterno = '';
    private $PerApellidoMaterno = '';
    private $PerNombres = '';
    private $Correo='';
    private $Telefono='';
    private $Dni='';
    private $Id = '';
    private $Cel = '';

    function __construct() {
        $this->load->database();
        parent::__construct();
    }

   public function getCel() {
        return $this->Cel;
    }

    public function setCel($Cel) {
        $this->Cel = $Cel;
    }

 
    public function getPerApellidoPaterno() {
        return $this->PerApellidoPaterno;
    }

    public function setPerApellidoPaterno($PerApellidoPaterno) {
        $this->PerApellidoPaterno = $PerApellidoPaterno;
    }

    public function getPerApellidoMaterno() {
        return $this->PerApellidoMaterno;
    }

    public function setPerApellidoMaterno($PerApellidoMaterno) {
        $this->PerApellidoMaterno = $PerApellidoMaterno;
    }

    public function getPerNombres() {
        return $this->PerNombres;
    }

    public function setPerNombres($PerNombres) {
        $this->PerNombres = $PerNombres;
    }

    public function getCorreo() {
        return $this->Correo;
    }
    
    public function setCorreo($Correo) {
        $this->Correo = $Correo;
    }
    
    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }
    
    public function getDni(){
        return $this->Dni;
    }
    public function setDni($Dni){
        $this->Dni=$Dni;
    }

    public function getId() {
        return $this->Id;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    function personaIns() {
        $parametro = array( $this->getDni(),$this->getPerApellidoPaterno(), $this->getPerApellidoMaterno(), $this->getPerNombres(),$this->getCorreo(), $this->getTelefono());
        $query = $this->db->query("call USP_PERIT_INSERTAR_PERSONA (?,?,?,?,?,?)", $parametro);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
    }
    function personaUpd(){
    $parametros =array($this->getId(),
            $this->getPerNombres(),
            $this->getTelefono(),
            $this->getCorreo(),
	     $this->getCel(),
            $this->getPerApellidoPaterno(),
            $this->getPerApellidoMaterno(),

        );

    $query = $this->db->query("call USP_PERIT_UPD_PERSONA(?,?,?,?,?,?,?)",$parametros);
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
}
    function personaQry($busqueda='') {
        $query = $this->db->query("call USP_PERIT_LISTAR_PERSONA (?)",$busqueda);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }

    function personaDel() {
        $parametros = array($this->getId());
        $query = $this->db->query("call USP_PERIT_DEL_PERSONA(?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

   function personaGet($id) {
        $query = $this->db->query("call USP_PERIT_S_PERSONANATURAL(?)",$id);
               $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setId($row->nPerId);
                $this->setDni($row->DNI);
                $this->setPerApellidoPaterno($row->cPerApellidoPaterno);
                $this->setPerApellidoMaterno($row->cPerApellidoMaterno);
                $this->setPerNombres($row->cPerNombres);
                $this->setCorreo($row->Email);
                $this->setTelefono($row->Tel);
                $this->setCel($row->Cel);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    
    function get_datos_dni($dni) {
       $query = $this->db_colegiado->query("Select regcol as cip,emailsec,telcol as telefono,celcol as celular from colegiado where lecol=?",array($dni));
       if($query->num_rows()>0)
       {
           $parametro = $query->row();
           $cip = $parametro->cip;
           $emailsec = $parametro->emailsec;
           $telefono = $parametro->telefono;
		   $celular = $parametro->celular;
        }
       else 
       {
        $cip='';
       }
        $this->db_colegiado->close();

       $query1 = $this->db->query("Select * from usuario where cUsuNick = ?",array($cip));
       if($query1->num_rows()>0)
       {
           $parametro=$query1->row();
           $nPerId=$parametro->nPerId;
       }
       else
       {
          $nPerId='';
          $emailsec='';
          $telefono='';
          $celular='';
       }  
       $this->db->close();
       $query2 = $this->db->query("call USP_PERIT_S_DNI(?,?,?,?,?,?)",array($dni,$nPerId,$cip,$emailsec,$telefono,$celular));
       if ($query2->num_rows()> 0) {
            $row = $query2->row();
            $this->setPerApellidoPaterno($row->cPerApellidoPaterno);
            $this->setPerApellidoMaterno($row->cPerApellidoMaterno);
            $this->setPerNombres($row->cPerNombres);
            $this->setCorreo($row->Email);
            $this->setTelefono($row->Tel);
            
            return true;
               return $query2->result;
        } else {
            return null;
        }
    }


    function buscar_correo_persona($correo){
        $query = $this->db->query("Select count(*)as salida from persona_detalle where cPdeValor=?",$correo);
        $this->db->close();
        if (count($query) > 0) {
            $row = $query->row();
            $salida = $row->salida;
            if($salida >= 1){
            return false;
            }
            return true;
          } else {
           return false;
        }
        
    }
function buscar_correo_persona_editar($correo,$id){
        $parametros =array($correo,$id);
        $query = $this->db->query("Select count(*)as salida from persona_detalle where cPdeValor=? and nPerId=? and nParId=1",$parametros);
        $this->db->close();
        if (count($query) > 0) {
            $row = $query->row();
            $salida = $row->salida;
            if($salida == 1){
            return true;
            }
            return false;
          } else {
           return false;
        }
        
    }

}
?>
