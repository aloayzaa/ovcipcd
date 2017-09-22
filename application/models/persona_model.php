<?php

class Persona_model extends CI_Model {

    //atributos Principales
   private $Id ='';
   private $Nombres = '';
   private $ApellidoPat = '';
   private $ApellidoMat = '';
   private $Direc = '';
   private $Email = '';
   private $Tel = '';
   private $Cel = '';
   private $Dni ='';
   private $Sex ='';
   private $FechaNac ='';
   private $Departamento ='';
   private $Provincia ='';
   private $Distrito ='';
   private $EstadoCivil ='';
   private $Usuario ='';
   private $Password ='';

   public function getApellidoMat() {
       return $this->ApellidoMat;
   }

   public function setApellidoMat($ApellidoMat) {
       $this->ApellidoMat = $ApellidoMat;
   }

   public function getSex() {
       return $this->Sex;
   }

   public function setSex($Sex) {
       $this->Sex = $Sex;
   }

   public function getDepartamento() {
       return $this->Departamento;
   }

   public function setDepartamento($Departamento) {
       $this->Departamento = $Departamento;
   }

   public function getProvincia() {
       return $this->Provincia;
   }

   public function setProvincia($Provincia) {
       $this->Provincia = $Provincia;
   }

   public function getDistrito() {
       return $this->Distrito;
   }

   public function setDistrito($Distrito) {
       $this->Distrito = $Distrito;
   }

   public function getEstadoCivil() {
       return $this->EstadoCivil;
   }

   public function setEstadoCivil($EstadoCivil) {
       $this->EstadoCivil = $EstadoCivil;
   }

      public function getId() {
       return $this->Id;
   }

   public function setId($Id) {
       $this->Id = $Id;
   }

   public function getNombres() {
       return $this->Nombres;
   }

   public function setNombres($Nombres) {
       $this->Nombres = $Nombres;
   }

   public function getApellidoPat() {
       return $this->ApellidoPat;
   }

   public function setApellidoPat($ApellidoPat) {
       $this->ApellidoPat = $ApellidoPat;
   }

   public function getDirec() {
       return $this->Direc;
   }

   public function setDirec($Direc) {
       $this->Direc = $Direc;
   }

   public function getEmail() {
       return $this->Email;
   }

   public function setEmail($Email) {
       $this->Email = $Email;
   }

   public function getTel() {
       return $this->Tel;
   }

   public function setTel($Tel) {
       $this->Tel = $Tel;
   }

   public function getCel() {
       return $this->Cel;
   }

   public function setCel($Cel) {
       $this->Cel = $Cel;
   }

   public function getFechaNac() {
       return $this->FechaNac;
   }

   public function setFechaNac($FechaNac) {
       $this->FechaNac = $FechaNac;
   }


   public function getDni() {
       return $this->Dni;
   }

   public function setDni($Dni) {
       $this->Dni = $Dni;
   }
      public function setUsuario($Usuario) {
       $this->Usuario = $Usuario;
   }
        public function getUsuario() {
       return $this->Usuario;
   }
         public function setPassword($Password) {
       $this->Password = $Password;
   }
            public function getPassword() {
        return $this->Password;
   }
      function __construct() {
        parent::__construct();
        $this->load->database();
    }
	
    function ValidarUsuario($usuario) {
        $query = $this->db->query("CALL USP_CIP_V_USUARIO (?)", array($usuario));
        $this->db->close();
        if ($query) { 
        if ($query->num_rows() > 0) {
          return true;       
        } else {
           return false;
        }
         } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function ValidarDni($dni) {
	   $col_dni = $this->db_colegiado->query("select lecol as Dni from colegiado where lecol = ?", array($dni));
	   if ($col_dni->num_rows() >0){
	   	   $parametro = $col_dni->row();
	   $col_dni= $parametro->Dni;
	   } else
	   {$col_dni= '';
	   }
	    $this->db_colegiado->close();
        $query = $this->db->query("CALL USP_CIP_G_DNI_USUARIO (?,?)", array($dni,$col_dni));
        $row = $query->row();
        $this->db->close(); 
         if ($query->num_rows() >0) {
             if($row->tipo == 2){
                  return 2; 
             }
          return 1;       
        } else {
           return 3;
        }
    }
    function ValidarEmail($email) {
        $query = $this->db->query("CALL USP_CIP_G_EMAIL_USUARIO (?)", array($email));
        $this->db->close();
        if ($query) { 
        if ($query->num_rows() > 0) {
          return true;       
        } else {
           return false;
        }
         } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function DatosPersonaNuevoIns() {
        $parametros = array(
            $this->getNombres(),
            $this->getApellidoPat(),
            $this->getApellidoMat(),
            $this->getDirec(),
            $this->getEmail(),
            $this->getTel(),
            $this->getCel(),
            $this->getDni(),
            $this->getSex(),
            $this->getFechaNac(),
            $this->getDepartamento(),
            $this->getProvincia(),
            $this->getDistrito(),
            $this->getEstadoCivil(),
            $this->getUsuario(),
            $this->getPassword()
//            $this->getActv()
        ); 
        $query = $this->db->query("CALL USP_GEN_I_REGISTRO (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1,5)", $parametros);
        $this->db->close();
        if ($query) {
           return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function enc(){
      $query = $this->db->query("CALL USP_GEN_MD5 (?)",$this->getDni());
      $this->db->close();
      $row = $query->row();
      return  $row->p_codeo;
    } 
    
    function ActivarUsuario($str){
        
         $query = $this->db->query("CALL USP_A_USUARIO (?)",$str);
         $this->db->close();
         if ($query) {
                //$this->session->set_flashdata('message', array('title' => 'Su Registro fue Completado Correctamente', 'content' => 'Revisa tu Email, donde encontraras tu direccion de activacion!.', 'type' => 'message'));
                print "<script type=\"text/javascript\">alert('Su activacion fue correcta');document.location = 'http://www.cip-trujillo.org/portal_infocip/login/vi_login'</script>";
                return true;
        } else {
             $this->session->set_flashdata('message', array('title' => 'Error en la activacion', 'content' => 'Error en el Link de Activacion, asegurese de que sea el correcto!.', 'type' => 'message'));
                print "<script type=\"text/javascript\">alert('Hubo problema con su activacion');document.location = 'http://www.cip-trujillo.org/portal_infocip/login/vi_login'</script>";
                
                return false;
        }
    }
    
}

?>
