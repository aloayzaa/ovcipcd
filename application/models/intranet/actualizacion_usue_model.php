<?php

class Actualizacion_usue_model extends CI_Model {
  
  private $usuario = '';
  private $dni = '';
  private $nombres = '';
  private $apellidopat = '';
  private $apellidomat = '';
  private $fecnac = '';
  private $sexo = '';
  private $estadocivil = '';
  private $email = '';
  private $telefono = '';
  private $celular = '';
  private $departamento = '';
  private $provincia = '';
  private $distrito = '';
  private $direccion = '';
  
  public function getUsuario() {
      return $this->usuario;
  }

  public function setUsuario($usuario) {
      $this->usuario = $usuario;
  }

    public function getDni() {
      return $this->dni;
  }

  public function setDni($dni) {
      $this->dni = $dni;
  }

  public function getNombres() {
      return $this->nombres;
  }

  public function setNombres($nombres) {
      $this->nombres = $nombres;
  }

  public function getApellidopat() {
      return $this->apellidopat;
  }

  public function setApellidopat($apellidopat) {
      $this->apellidopat = $apellidopat;
  }

  public function getApellidomat() {
      return $this->apellidomat;
  }

  public function setApellidomat($apellidomat) {
      $this->apellidomat = $apellidomat;
  }

  public function getFecnac() {
      return $this->fecnac;
  }

  public function setFecnac($fecnac) {
      $this->fecnac = $fecnac;
  }

  public function getSexo() {
      return $this->sexo;
  }

  public function setSexo($sexo) {
      $this->sexo = $sexo;
  }

  public function getEstadocivil() {
      return $this->estadocivil;
  }

  public function setEstadocivil($estadocivil) {
      $this->estadocivil = $estadocivil;
  }

  public function getEmail() {
      return $this->email;
  }

  public function setEmail($email) {
      $this->email = $email;
  }

  public function getTelefono() {
      return $this->telefono;
  }

  public function setTelefono($telefono) {
      $this->telefono = $telefono;
  }

  public function getCelular() {
      return $this->celular;
  }

  public function setCelular($celular) {
      $this->celular = $celular;
  }

  public function getDepartamento() {
      return $this->departamento;
  }

  public function setDepartamento($departamento) {
      $this->departamento = $departamento;
  }

  public function getProvincia() {
      return $this->provincia;
  }

  public function setProvincia($provincia) {
      $this->provincia = $provincia;
  }

  public function getDistrito() {
      return $this->distrito;
  }

  public function setDistrito($distrito) {
      $this->distrito = $distrito;
  }

  public function getDireccion() {
      return $this->direccion;
  }

  public function setDireccion($direccion) {
      $this->direccion = $direccion;
  }
    //CONSTRUCTOR DE LA CLASE
    function __construct() {
          $this->load->database();
        parent::__construct();
//        if ($nPerId != null) {
//            $this->get_Persona($nPerId);
//        }
    }

 function usuarioDataUpd($str){
      $query = $this->db->query("CALL GET_DATOS_USUARIOEXTERNO(?)", array($str));
      $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setDni($row->dni);
                $this->setApellidopat($row->cPerApellidoPaterno);
                $this->setApellidomat($row->cPerApellidoMaterno);
                $this->setNombres($row->cPerNombres);
                $this->setFecnac($row->fPnaFechaNacimiento);
                $this->setSexo($row->bPnaSexo);
                $this->setEstadocivil($row->nParId);
                $this->setEmail($row->email);
                $this->setTelefono($row->telefono);
                $this->setCelular($row->celular);
                $this->setDepartamento($row->cUbiIdDepartamento);
                $this->setProvincia($row->cUbiIdProvincia);
                $this->setDistrito($row->cUbiIdDistrito);
                $this->setDireccion($row->direccion);
               
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
 }
  function usuarioDataUpdExt($str){
      $paramentro= array($str);
      $query = $this->db->query("CALL USP_SP_U_PERSONAEXTERNA(?)",$paramentro);
      $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setDni($row->dni);
                $this->setApellidopat($row->cPerApellidoPaterno);
                $this->setApellidomat($row->cPerApellidoMaterno);
                $this->setNombres($row->cPerNombres);
                $this->setFecnac($row->fPnaFechaNacimiento);
                $this->setSexo($row->bPnaSexo);
                $this->setEstadocivil($row->nParId);
                $this->setEmail($row->email);
                $this->setTelefono($row->telefono);
                $this->setCelular($row->celular);
                $this->setDepartamento($row->cUbiIdDepartamento);
                $this->setProvincia($row->cUbiIdProvincia);
                $this->setDistrito($row->cUbiIdDistrito);
                $this->setDireccion($row->direccion);
               
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
 }
 
 function DatosColegiadoUpd(){
     $param = array(
         $this->getUsuario(),
         $this->getNombres(),
         $this->getApellidopat(),
         $this->getApellidomat(),
         $this->getDni(),
         $this->getEmail(),
         $this->getFecnac(),
         $this->getSexo(),
         $this->getEstadocivil(),
         $this->getCelular(),
         $this->getTelefono(),
         $this->getDepartamento(),
         $this->getProvincia(),
         $this->getDistrito(),
         $this->getDireccion());
         $query = $this->db->query("CALL UPD_ACTUALIZAR_USUARIOE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$param);
         $this->db->close();
         if($query){
             return true;
             
         }else{
             return false;
         }
 }
 
  function ValidarEmail($email,$codigo) {
//     return true;
        $emailq = $this->db_bdcolegio->query("select count(email) as Cantidad from colegiado where email = ? or emailsec =?",array($email,$email));
        $row2 = $emailq->row();
        $cantidad = $row2->Cantidad;
        $this->db_bdcolegio->close();
        $params = array($codigo,$email,$cantidad);
        $query = $this->db->query("CALL UDP_VALIDA_EMAIL_USUE (?,?,?)", $params);
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
    
  function DatosUbigeo($one,$two)
    {
        $parametros = array($one,$two);
        $query = $this->db->query('CALL sp_ubigeo(?,?)',$parametros);
      $this->db->close();
         if ($query->num_rows()>0) {
                return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function Datoscivil()
    {
        $query = $this->db->query('select * from parametro where nPcaId=2 and nParId <> 6');
        $this->db->close();
         if (count($query)>0) {
                return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
  
}

?>
