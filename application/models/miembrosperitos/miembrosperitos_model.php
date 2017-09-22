<?php

class Miembrosperitos_model extends CI_Model {

    private $regcol='';
    private $id='';
    private $Datos='';
    private $especialidad='';
    private $contacto='';
    private $Direccion='';
    private $email='';
    private $emailsec='';
    private $adscrito='';
    private $fechafin='';
    
     function __construct() {
        $this->load->database();
        parent::__construct();
    }
    
    public function getFechafin() {
        return $this->fechafin;
    }

    public function setFechafin($fechafin) {
        $this->fechafin = $fechafin;
    }

        public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
 
    public function getContacto() {
        return $this->contacto;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

        public function getRegcol() {
        return $this->regcol;
    }

    public function setRegcol($regcol) {
        $this->regcol = $regcol;
    }

    public function getDatos() {
        return $this->Datos;
    }

    public function setDatos($Datos) {
        $this->Datos = $Datos;
    }

    public function getEspecialidad() {
        return $this->especialidad;
    }

    public function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getEmailsec() {
        return $this->emailsec;
    }

    public function setEmailsec($emailsec) {
        $this->emailsec = $emailsec;
    }

               public function getAdscrito() {
        return $this->adscrito;
    }

    public function setAdscrito($adscrito) {
        $this->adscrito = $adscrito;
    }

          

    function get_datos_colegiado($regcol)
    {
 
        $query = $this->db_colegiado->query("call USP_PERIT_COLEGIADO_DATOS(?)",$regcol);
        $this->db_colegiado->close();
        if($query){
           if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setDatos($row->Datos);
                $this->setEspecialidad($row->especialidad);
                $this->setDireccion($row->direccion);
                $this->setContacto($row->contacto);
                $this->setEmail($row->email);
                $this->setEmailsec($row->emailsec);
                $this->setRegcol($row->regcol);
 
                return true;
           }else {
            return false;
                 }
           
                   }
        
    }
    
    function buscar_peritos($regcol)
    {
        $query = $this->db->query("Select count(*)as salida from peritos where nCip=? and bPeritoEstado=0",$regcol);
       
        $this->db->close();
        if (count($query) > 0) {
            $row = $query->row();
            $salida = $row->salida;
            if($salida == 1){
            return false;
            }
            return true;
          } else {
           return false;
        }
    }
     function miembrosIns() {
        $parametro = array( $this->getRegcol(),$this->getDatos(),$this->getEspecialidad(),$this->getDireccion(),$this->getContacto(),
        $this->getEmail(),$this->getEmailsec(),$this->getAdscrito(),$this->getFechafin());
        $query = $this->db->query("call USP_PERIT_INSERTAR_MIEMBROS_PERITOS(?,?,?,?,?,?,?,?,?)", $parametro);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
    }
    
    function miembrosQry($busqueda='') {
        $query = $this->db->query("call USP_PERIT_LISTAR_MIEMBROS_PERITOS(?)",$busqueda);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    
    function get_datos_miembros($id){
         $query = $this->db->query("call USP_PERIT_S_MIEMBROS(?)",$id);
               $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setId($row->nPeritoId);
                $this->setDatos($row->Datos);
                $this->setRegcol($row->cip);
                $this->setEspecialidad($row->especialidad);
                $this->setAdscrito($row->adscrito);
                $this->setDireccion($row->direccion);
                $this->setContacto($row->contacto);
                $this->setEmail($row->email);
                $this->setEmailsec($row->emailsec);
                
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
     function miembrosPeritosUpd(){
    $parametros =array($this->getId(),
            $this->getEspecialidad(),
            $this->getAdscrito(),
            $this->getDireccion(),
            $this->getContacto(),
            $this->getEmail(),
            $this->getEmailsec()

        );
    $query = $this->db->query("call USP_PERIT_UPD_MIEMBROS(?,?,?,?,?,?,?)",$parametros);
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
}

function MiembrosDel() {
        $parametros = array($this->getId());
        $query = $this->db->query("call USP_PERIT_DEL_MIEMBROS(?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function get_combo_peritos()
    {
        $query = $this->db->query("Select * from peritos where cPeritoRenovacion='Inactivo' ");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }

    function RenovacionPlanilla($parametros) {
        
        $query = $this->db->query("call USP_PERIT_UPD_RENOVACION(?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
        
}
?>
