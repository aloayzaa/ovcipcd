<?php

class Actualizacion_usu_model extends CI_Model {

       private $nombre = '';
       private $apepat = '';
       private $apemat = '';
       private $fecnac = '';
       private $sexo = '';
       private $departamento = '';
       private $provincia = '';
       private $distrito = '';
       private $dni = '';
       private $email = '';
       private $direccion = '';
       private $telefono = '';
       private $celular = '';
       private $nperid = '';
       private $estadocivil = '';
       
       
       public function getNombre() {
           return $this->nombre;
       }

       public function setNombre($nombre) {
           $this->nombre = $nombre;
       }

       public function getApepat() {
           return $this->apepat;
       }

       public function setApepat($apepat) {
           $this->apepat = $apepat;
       }

       public function getApemat() {
           return $this->apemat;
       }

       public function setApemat($apemat) {
           $this->apemat = $apemat;
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

       public function getDni() {
           return $this->dni;
       }

       public function setDni($dni) {
           $this->dni = $dni;
       }

       public function getEmail() {
           return $this->email;
       }

       public function setEmail($email) {
           $this->email = $email;
       }

       public function getDireccion() {
           return $this->direccion;
       }

       public function setDireccion($direccion) {
           $this->direccion = $direccion;
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

       public function getNperid() {
           return $this->nperid;
       }

       public function setNperid($nperid) {
           $this->nperid = $nperid;
       }
       
       public function getEstadocivil() {
           return $this->estadocivil;
       }

       public function setEstadocivil($estadocivil) {
           $this->estadocivil = $estadocivil;
       }

              
      //CONSTRUCTOR DE LA CLASE
    function __construct() {
          $this->load->database();
        parent::__construct();
//        if ($nPerId != null) {
//            $this->get_Persona($nPerId);
//        }
    }
            
    function usuarioDataUpd($nick) {

        $query = $this->db->query("CALL USP_ACT_USUARIO(?)", array($nick));
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNombre($row->nombre);
                $this->setApepat($row->apepat);
                $this->setApemat($row->apemat);
                $this->setFecnac($row->fecnac);
                $this->setSexo($row->sexo);
                $this->setDepartamento($row->departamento);
                $this->setProvincia($row->provincia);
                $this->setDistrito($row->distrito);
                $this->setDni($row->dni);
                $this->setEmail($row->email);
                $this->setDireccion($row->direccion);
                $this->setTelefono($row->telefono);
                $this->setCelular($row->celular); 
                $this->setNperid($row->p_perid);
                $this->setEstadocivil($row->estadocivil);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
     
        function DatosUsuarioIntUpd() {
            

        $paramcipinteg = array( 
            $this->getNombre(),
            $this->getApepat(),
            $this->getApemat(),
            $this->getCelular(),
            $this->getTelefono(),
            $this->getDireccion(),
            $this->getFecnac(),
            $this->getEmail(),
            $this->getSexo(),
            $this->getEstadocivil(),
            $this->getDepartamento(),
            $this->getProvincia(),
            $this->getDistrito(),
            $this->getNperid()
                );
        $query = $this->db->query("CALL UPD_ACT_USUARIO(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $paramcipinteg);
        if ($query) {
              $this->db->close();
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
   function get_s_cbo_tipodocumento() {
        $query = $this->db_colegiado->query("SELECT z.codzona,z.descrzona FROM zona z inner join distrito d on d.coddist=z.coddist inner join provincia p
on p.codprov=d.codprov inner join departamento dp on dp.coddepa=p.coddepa 
where z.descrzona not in ('Ninguna') and dp.coddepa='14';");
     if (count($query) > 0) {
            $this->db_colegiado->close();
            return $query->result();
        } else {
            return null;
        }
    }
   
 function ValidarEmail($email,$codigo) {
        $emailq = $this->db_bdcolegio->query("SELECT count(emailsec) as Cantidad from colegiado where emailsec = ? or email = ?",array($email,$email));
        $this->db_bdcolegio->close();
        $row2 = $emailq->row();
        $cantidad = $row2->Cantidad;
        if($cantidad > 0){
            return false;
        }        
        $params = array($email,$codigo);
        $query = $this->db->query("SELECT count(cPdeValor) as Cantidad from persona_detalle where cPdeValor = ? and nPerid != ?", $params);
        $this->db->close();
        $row = $query->row();
        $cantidad2 = $row->Cantidad;
        if($cantidad2 > 0){
            return false;
        } else{
            return true;
        }
            
    }
}

?>
