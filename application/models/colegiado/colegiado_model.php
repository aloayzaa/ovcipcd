<?php

class colegiado_model extends CI_Model {

   //atributos Principales
   private $regcol = '';
   private $nombre = '';
   private $valdni='';
   private $tipo='';
   private $lecol='';
   private $cPerApellidoPaterno='';
   private $nPerId='';
   private $cPdeValor='';
   private $celular='';
   private $nruc='';
   private $direc='';
   private $email='';
   private $cPerNombres='';
   private $nParIdRubro='';
   private $rubro='';
   private $telefono = '';
       //atributos Secundarios 
    private $fechaingreso = '';
   
   function getTelefono() {
       return $this->telefono;
   }

   function setTelefono($telefono) {
       $this->telefono = $telefono;
   }
       
   function getRubro() {
       return $this->rubro;
   }

   function setRubro($rubro) {
       $this->rubro = $rubro;
   }

      
    public function getnParIdRubro() {
        return $this->nParIdRubro;
    }
    public function setnParIdRubro($nParIdRubro){
            $this-> nParIdRubro = $nParIdRubro;
                   
    }       
    public function getdirec() {
        return $this->direc;
    }
    public function setdirec($direc){
            $this-> direc = $direc;
                   
    }
     public function getemail() {
        return $this->email;
    }
    public function setemail($email){
            $this-> email = $email;
                   
    }
     public function getcPerNombres() {
        return $this->cPerNombres;
    }
    public function setcPerNombres($cPerNombres){
            $this-> cPerNombres = $cPerNombres;
                   
    }
   public function getcelular() {
        return $this->celular;
    }
    public function setcelular($celular){
            $this-> celular = $celular;        
    }
   public function getnruc() {
        return $this->nruc;
    }
    public function setnruc($nruc){
            $this-> nruc = $nruc;
                   
    }
    public function getlecol() {
        return $this->lecol;
    }
    public function setlecol($lecol){
            $this-> lecol = $lecol;
          
    }
    public function getcPerApellidoPaterno() {
        return $this->cPerApellidoPaterno;
    }
    public function setcPerApellidoPaterno($cPerApellidoPaterno){
            $this-> cPerApellidoPaterno = $cPerApellidoPaterno;
       
            
    }
    public function getnPerId() {
        return $this->nPerId;
    }
    public function setnPerId($nPerId){
            $this-> nPerId = $nPerId;
   
    }
    public function getcPdeValor() {
        return $this->cPdeValor;
    }
    public function setcPdeValor($cPdeValor){
            $this-> cPdeValor = $cPdeValor;
                 
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getValdni() {
        return $this->valdni;
    }

    public function setValdni($valdni) {
        $this->valdni = $valdni;
    }

    public function getRegcol() {
        return $this->regcol;
    }

    public function setRegcol($regcol) {
        $this->regcol = $regcol;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    public function getFechaingreso() {
        return $this->fechaingreso;
    }
    
    public function setFechaingreso($fechaingreso) {
        $this->fechaingreso = $fechaingreso;
    }
//-----------------------------------------*********-----
  //parametros secuendarios 
  private $dni = '';
  private $apellidomat = '';
  private $fecnac = '';
  private $sexo = '';
  private $estadocivil = '';
  private $departamento = '';
  private $provincia = '';
  private $distrito = '';

  function getDni() {
      return $this->dni;
  }

  function getApellidomat() {
      return $this->apellidomat;
  }

  function getFecnac() {
      return $this->fecnac;
  }

  function getSexo() {
      return $this->sexo;
  }

  function getEstadocivil() {
      return $this->estadocivil;
  }

  function getDepartamento() {
      return $this->departamento;
  }

  function getProvincia() {
      return $this->provincia;
  }

  function getDistrito() {
      return $this->distrito;
  }

  function setDni($dni) {
      $this->dni = $dni;
  }

  function setApellidomat($apellidomat) {
      $this->apellidomat = $apellidomat;
  }

  function setFecnac($fecnac) {
      $this->fecnac = $fecnac;
  }

  function setSexo($sexo) {
      $this->sexo = $sexo;
  }

  function setEstadocivil($estadocivil) {
      $this->estadocivil = $estadocivil;
  }

  function setDepartamento($departamento) {
      $this->departamento = $departamento;
  }

  function setProvincia($provincia) {
      $this->provincia = $provincia;
  }

  function setDistrito($distrito) {
      $this->distrito = $distrito;
  }

    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function colegiadoData($cip,$tipo) {
        if($tipo == 'cip'){
            $lecol = null;
        $ncadena = strlen($cip);
        switch ($ncadena) {
            case 1:
                $cip = '00000' . $cip;
                break;
            case 2:
                $cip = '0000' . $cip;
                break;
            case 3:
                $cip = '000' . $cip;
                break;
            case 4:
                $cip = '00' . $cip;
                break;
            case 5:
                $cip = '0' . $cip;
                break;
            case 6:
                $cip = $cip;
                break;
        }
          $regcol = $cip;
        }else if($tipo == 'dni'){
            $regcol = null;
             $lecol = $cip;
        }

           $query = $this->db_bdcolegio->query("select *, concat(c.apecol,' ',c.apematcol,',',c.nomcol) as nombre,lecol from colegiado c
        WHERE regcol=? or lecol=?", array($regcol,$lecol));
           $query1 = $this->db->query("select p.nPerId,pdd.cPdeValor lecol, concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as datos from persona p left join
persona_detalle pdd on p.nPerId =pdd.nPerId and pdd.nParId=1 and pdd.nPcaId=1
where pdd.cPdeValor=? and pdd.bPdeEliminado=0 and p.bPerEstado=0;", array($lecol));
           if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setRegcol($row->regcol);
                  $this->setlecol($row->lecol);
                $this->setNombre($row->nombre);
               $this->setTipo('colegiado');

                return true;
            } else if ($query1) {
            if ($query1->num_rows() > 0) {
                $row = $query1->row();
                $this->setRegcol($row->lecol);
                $this->setNombre($row->datos);
                $this->setTipo('externo');
                
                return true;
            }
        } 
           } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

        function colegiadoFechaUpd($cip) {
        $ncadena = strlen($cip);
        switch ($ncadena) {
            case 1:
                $cip = '00000' . $cip;
                break;
            case 2:
                $cip = '0000' . $cip;
                break;
            case 3:
                $cip = '000' . $cip;
                break;
            case 4:
                $cip = '00' . $cip;
                break;
            case 5:
                $cip = '0' . $cip;
                break;
            case 6:
                $cip = $cip;
                break;
        }
          $cip = array($this->getRegcol());
        $query = $this->db->query("CALL USP_CIP_S_FECHAUPD (?)", $cip);
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setFechaingreso($row->fechaingreso);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function personaQry() {
        $accion='qry_view';
        $parametros=  array($accion,NULL);
        $query1 = $this->db->query("CALL USP_STD_S_PERSONA_JURIDICA(?,?)",$parametros);
        if ($query1->num_rows() > 0) {
          return $query1->result();
        } else {
           return null;
        }
    }
         function personaGet($nPerId){
        $parametros = array(NULL,$nPerId);
        $query = $this->db->query("CALL USP_STD_S_PERSONA_JURIDICA(?,?)",$parametros);
   $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setnPerId($row->codigo);
                $this->setcPerNombres($row->razon_social);
                $this->setnruc($row->ruc);
                $this->setdirec($row->direccion);
                $this->setcelular($row->celular_empresa);
                $this->setemail($row->correo_empresa);
                $this->setnParIdRubro($row->nParIdRubro);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
   function DatosexternoUpd(){
     
        $param = array(
         $this->getcPerNombres(),
         $this->getcPerApellidoPaterno(),
         $this->getApellidomat(),
         $this->getDni(),
         $this->getemail(),
         $this->getFecnac(),
         $this->getSexo(),
         $this->getEstadocivil(),
         $this->getcelular(),
         $this->getTelefono(),
         $this->getDepartamento(),
         $this->getProvincia(),
         $this->getDistrito(),
         $this->getdirec());
//         var_dump($param);
        $query = $this->db->query("CALL UPD_ACTUALIZAR_USUARIOE(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$param);
         $this->db->close();
         
         if($query){
             return true;
             
         }else{
             return false;
         }
 }
  function DatosexternoUsuarioUpd(){
     
        $param = array(
         $this->getcPerNombres(),
         $this->getcPerApellidoPaterno(),
         $this->getApellidomat(),
         $this->getDni(),
         $this->getemail(),
         $this->getFecnac(),
         $this->getSexo(),
         $this->getEstadocivil(),
         $this->getcelular(),
         $this->getTelefono(),
         $this->getDepartamento(),
         $this->getProvincia(),
         $this->getDistrito(),
         $this->getdirec());
//         var_dump($param);
        $query = $this->db->query("CALL UPD_ACTUALIZAR_USUARIOEXT(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$param);
         $this->db->close();
         
         if($query){
             return true;
             
         }else{
             return false;
         }
 }
   function ValidarEmailExt($email,$codigo) {
//     return true;
        $emailq = $this->db_bdcolegio->query("select count(email) as Cantidad from colegiado where email = ? or emailsec =?",array($email,$email));
        $row2 = $emailq->row();
        $cantidad = $row2->Cantidad;
        $this->db_bdcolegio->close();
        $params = array($codigo,$email,$cantidad);
        $query = $this->db->query("CALL UDP_VALIDA_EMAIL_USUEXT (?,?,?)", $params);
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
    
    function persona_juridica_Upd() {
        $parametros = array($this->getcPerNombres(),$this->getnruc(),$this->getdirec(),$this->getcelular(),$this->getemail(),$this->getnPerId(),$this->getnParIdRubro());         
        $query = $this->db->query("CALL USP_SP_U_PERSONA_JURIDICA(?,?,?,?,?,?,?)", $parametros);
      
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        } 
    } 
    function get_s_cbo_rubro() {
        $query = $this->db->query("select nParId,cParDescripcion from parametro where bParEliminado='0' and  nPcaId=353          
 order by cParDescripcion");
        if (count($query)>0) {
          return $query->result_array();
        } else {
           return null;
        }
    }
    
}

?>
