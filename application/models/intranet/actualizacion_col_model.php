<?php

class Actualizacion_col_model extends CI_Model {

    //atributos Principales
    private $regcol = '';
    private $nombre = '';
    private $apellidop = '';
    private $apellidom = '';
    private $dni = '';
    private $fecnaccol = '';
    private $sexcol = '';
    private $colestcivil = '';
    private $direcol = '';
    private $email = '';
    private $emailsec = '';
    private $telcol = '';
    private $celcol = '';
    private $redpm = '';
    private $redpc = '';
    //atributos departamento
    private $codzona = '';
    private $descrzona = '';
    private $coddep = '';
    private $descrdep = '';
    private $coddist = '';
    private $descrdist = '';
    private $codprov = '';
    private $descrprov = '';
    //atributos Secundarios 
    private $direcolant = '';
    private $emailant = '';
    private $emailsecant = '';
    private $telcolant = '';
    private $celcolant = '';
    private $redpmant = '';
    private $redpcant = '';
    private $celuemp = '';
    private $celuempantes = '';
    private $ip = '';
    private $tipo='';
    private $fechaingreso = '';
    private $zonaantes = '';
    private $sexcolantes = '';
    private $colestcivilantes = '';
    
     //formacion profesional 
    private $razsocinsacad = '';
    private $desccap = '';
    private $fecinscol = '';
    private $fectitcol = '';
    private $nrectoral = '';
    
    //FAMILIA
    
    private $idfam ='';
    private $apepatfam ='';
    private $apematfam = '';
    private $nomfam = '';
    private $estadovf = '';
    private $fecnacfam ='';
    private $parentesco ='';
    
    private $coddeporte = '';
    private $seleccion = '';
    private $dominio = '';
    
    public function getCoddeporte() {
        return $this->coddeporte;
    }

    public function setCoddeporte($coddeporte) {
        $this->coddeporte = $coddeporte;
    }

    public function getSeleccion() {
        return $this->seleccion;
    }

    public function setSeleccion($seleccion) {
        $this->seleccion = $seleccion;
    }

    public function getDominio() {
        return $this->dominio;
    }

    public function setDominio($dominio) {
        $this->dominio = $dominio;
    }

        
    public function getIdfam() {
        return $this->idfam;
    }

    public function setIdfam($idfam) {
        $this->idfam = $idfam;
    }

    public function getApepatfam() {
        return $this->apepatfam;
    }

    public function setApepatfam($apepatfam) {
        $this->apepatfam = $apepatfam;
    }

    public function getApematfam() {
        return $this->apematfam;
    }

    public function setApematfam($apematfam) {
        $this->apematfam = $apematfam;
    }

    public function getNomfam() {
        return $this->nomfam;
    }

    public function setNomfam($nomfam) {
        $this->nomfam = $nomfam;
    }

    public function getEstadovf() {
        return $this->estadovf;
    }

    public function setEstadovf($estadovf) {
        $this->estadovf = $estadovf;
    }

    public function getFecnacfam() {
        return $this->fecnacfam;
    }

    public function setFecnacfam($fecnacfam) {
        $this->fecnacfam = $fecnacfam;
    }

    public function getParentesco() {
        return $this->parentesco;
    }

    public function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }

        
    public function getSexcolantes() {
        return $this->sexcolantes;
    }

    public function setSexcolantes($sexcolantes) {
        $this->sexcolantes = $sexcolantes;
    }

    public function getColestcivilantes() {
        return $this->colestcivilantes;
    }

    public function setColestcivilantes($colestcivilantes) {
        $this->colestcivilantes = $colestcivilantes;
    }

    public function getCeluempantes() {
        return $this->celuempantes;
    }

    public function setCeluempantes($celuempantes) {
        $this->celuempantes = $celuempantes;
    }

    public function getCoddep() {
        return $this->coddep;
    }

    public function setCoddep($coddep) {
        $this->coddep = $coddep;
    }

    public function getDescrdep() {
        return $this->descrdep;
    }

    public function setDescrdep($descrdep) {
        $this->descrdep = $descrdep;
    }

    public function getCoddist() {
        return $this->coddist;
    }

    public function setCoddist($coddist) {
        $this->coddist = $coddist;
    }

    public function getDescrdist() {
        return $this->descrdist;
    }

    public function setDescrdist($descrdist) {
        $this->descrdist = $descrdist;
    }

    public function getCodprov() {
        return $this->codprov;
    }

    public function setCodprov($codprov) {
        $this->codprov = $codprov;
    }

    public function getDescrprov() {
        return $this->descrprov;
    }

    public function setDescrprov($descrprov) {
        $this->descrprov = $descrprov;
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

    public function get_Direcol() {
        return $this->direcol;
    }

    public function set_Direcol($direcol) {
        $this->direcol = $direcol;
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

    public function getTelcol() {
        return $this->telcol;
    }

    public function setTelcol($telcol) {
        $this->telcol = $telcol;
    }

    public function getCelcol() {
        return $this->celcol;
    }

    public function setCelcol($celcol) {
        $this->celcol = $celcol;
    }

    public function getRedpm() {
        return $this->redpm;
    }

    public function setRedpm($redpm) {
        $this->redpm = $redpm;
    }

    public function getRedpc() {
        return $this->redpc;
    }

    public function setRedpc($redpc) {
        $this->redpc = $redpc;
    }
    public function getCeluemp() {
        return $this->celuemp;
    }

    public function setCeluemp($celuemp) {
        $this->celuemp = $celuemp;
    }
    public function getIp() {
        return $this->ip;
    }

    public function setIp($ip) {
        $this->ip = $ip;
    }
   public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    public function getFechaingreso() {
        return $this->fechaingreso;
    }

    public function setFechaingreso($fechaingreso) {
        $this->fechaingreso = $fechaingreso;
    }
    public function getApellidop() {
        return $this->apellidop;
    }

    public function setApellidop($apellidop) {
        $this->apellidop = $apellidop;
    }

    public function getApellidom() {
        return $this->apellidom;
    }

    public function setApellidom($apellidom) {
        $this->apellidom = $apellidom;
    }
    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }
    public function getFecnaccol() {
        return $this->fecnaccol;
    }

    public function setFecnaccol($fecnaccol) {
        $this->fecnaccol = $fecnaccol;
    }
    public function getSexcol() {
        return $this->sexcol;
    }

    public function setSexcol($sexcol) {
        $this->sexcol = $sexcol;
    }
    public function getColestcivil() {
        return $this->colestcivil;
    }

    public function setColestcivil($colestcivil) {
        $this->colestcivil = $colestcivil;
    }

//    -------------------------------------------
    public function getDirecolant() {
        return $this->direcolant;
    }

    public function setDirecolant($direcolant) {
        $this->direcolant = $direcolant;
    }

    public function getEmailant() {
        return $this->emailant;
    }

    public function setEmailant($emailant) {
        $this->emailant = $emailant;
    }

    public function getEmailsecant() {
        return $this->emailsecant;
    }

    public function setEmailsecant($emailsecant) {
        $this->emailsecant = $emailsecant;
    }

    public function getTelcolant() {
        return $this->telcolant;
    }

    public function setTelcolant($telcolant) {
        $this->telcolant = $telcolant;
    }

    public function getCelcolant() {
        return $this->celcolant;
    }

    public function setCelcolant($celcolant) {
        $this->celcolant = $celcolant;
    }

    public function getRedpmant() {
        return $this->redpmant;
    }

    public function setRedpmant($redpmant) {
        $this->redpmant = $redpmant;
    }

    public function getRedpcant() {
        return $this->redpcant;
    }

    public function setRedpcant($redpcant) {
        $this->redpcant = $redpcant;
    }
    public function getCodzona() {
        return $this->codzona;
    }

    public function setCodzona($codzona) {
        $this->codzona = $codzona;
    }

    public function getDescrzona() {
        return $this->descrzona;
    }

    public function setDescrzona($descrzona) {
        $this->descrzona = $descrzona;
    }
    public function getZonaantes() {
        return $this->zonaantes;
    }

    public function setZonaantes($zonaantes) {
        $this->zonaantes = $zonaantes;
    }
//    -------------------------------------------
    public function getRazsocinsacad() {
        return $this->razsocinsacad;
    }

    public function setRazsocinsacad($razsocinsacad) {
        $this->razsocinsacad = $razsocinsacad;
    }
    public function getDesccap() {
        return $this->desccap;
    }

    public function setDesccap($desccap) {
        $this->desccap = $desccap;
    }
    public function getFecinscol() {
        return $this->fecinscol;
    }

    public function setFecinscol($fecinscol) {
        $this->fecinscol = $fecinscol;
    }
    public function getFectitcol() {
        return $this->fectitcol;
    }

    public function setFectitcol($fectitcol) {
        $this->fectitcol = $fectitcol;
    }
    public function getNrectoral() {
        return $this->nrectoral;
    }

    public function setNrectoral($nrectoral) {
        $this->nrectoral = $nrectoral;
    }

      //CONSTRUCTOR DE LA CLASE
    function __construct() {
          $this->load->database();
        parent::__construct();
//        if ($nPerId != null) {
//            $this->get_Persona($nPerId);
//        }
    }
            
   
    function colegiadoDataProfUpd($cip) {
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
        $query = $this->db_bdcolegio->query("SELECT c.regcol, c.apecol, c.apematcol, c.nomcol, concat(c.apecol,' ',c.apematcol, ' ',c.nomcol)as nombre, concat(c.direcol,' - ',z.descrzona) as direccion,cp.desccap,ins.razsocinsacad,c.fecinscol,
ct.fectitcol,ct.nrectoral FROM  colegiado c inner join zona z on c.codzona=z.codzona inner join col_titulo ct on c.regcol=ct.regcol inner join
titulo t on t.codtitulo=ct.codtitulo inner join instacademica ins on ct.codinsacad=ins.codinsacad inner join 
especialidad esp on esp.codesp = t.codesp inner join capitulo cp on cp.codcap=esp.codcap
WHERE c.transfer<>'E' AND c.tipoclase<>'E' AND c.falleccol='V'
and c.regcol=?", array($cip));
        if ($query) {
            if ($query->num_rows() > 0) {
//                $row = $query->row();
//                $this->setRegcol($row->regcol);
//                $this->setRazsocinsacad($row->razsocinsacad);
//                $this->setDesccap($row->desccap);
//                $this->setFecinscol($row->fecinscol);
//                $this->setFectitcol($row->fectitcol);
//                $this->setNrectoral($row->nrectoral);
                return $query->result();
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function colegiadoDataFamiliaDt($cip) {
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
        $query = $this->db_bdcolegio->query("Select idfam,apepatfam,apematfam,nomfam,DATE_FORMAT(fecnacfam, '%d/%m/%Y' ) as fecnacfam,parentesco,estadovf from col_familia where regcol = ? order by parentesco desc", array($cip));
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function colegiadoDataDeporte($cip) {
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
        $query = $this->db_bdcolegio->query("select d.descdep, cd.regcol, cd.dominiodep, cd.seleccion, cd.coddep from col_dep cd inner join deporte d on d.coddep = cd.coddep where cd.regcol = ?", array($cip));
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
      function getDeportes() {
      
        $query = $this->db_bdcolegio->query("select * from deporte");
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
    function colegiadoDataUpd($cip) {
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

        $query = $this->db_bdcolegio->query("CALL USP_GEN_UDP_COLEGIADO(?)", array($cip));
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setRegcol($row->regcol);
                $this->setNombre($row->nomcol);
                $this->setApellidop($row->apecol);
                $this->setApellidom($row->apematcol);
                $this->setDni($row->lecol);
                $this->setSexcol($row->sexcol);
                $this->setColestcivil($row->colestcivil);
                $this->setFecnaccol($row->fechanac);
                $this->set_Direcol($row->direcol);
                $this->setEmail($row->email);
                $this->setEmailsec($row->emailsec);
                $this->setTelcol($row->telcol);
                $this->setCelcol($row->celcol);
                $this->setRedpm($row->redpm);
                $this->setRedpc($row->redpc);
                $this->setCeluemp($row->celuemp);
                $this->setCodzona($row->codzona);
                $this->setCoddist($row->coddist);
                $this->setCodprov($row->codprov);
                $this->setCoddep($row->coddepa);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
        function load_frm_upd_colegiado($str) {
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
        $query = $this->db_bdcolegio->query("CALL USP_GEN_U_COLEGIADO (?)", array($cip));
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setRegcol($row->regcol);
                $this->setRazsocinsacad($row->razsocinsacad);
                $this->setDesccap($row->desccap);
                $this->setFecinscol($row->fecinscol);
                $this->setFectitcol($row->fectitcol);
                $this->setNrectoral($row->nrectoral);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
        function DatosColegiadoIntUpd() {
            
        $parambdcolegio = array(
            $this->getRegcol(),
            $this->get_Direcol(),
            $this->getEmail(),
            $this->getEmailsec(),
            $this->getTelcol(),
            $this->getCelcol(),
            $this->getRedpm(),
            $this->getRedpc(),
            $this->getCeluemp(),
            $this->getCodzona(),
            $this->getColestcivil(),
            $this->getSexcol()
        );
        $querybd = $this->db_bdcolegio->query("CALL UDP_COLEGIADO(?,?,?,?,?,?,?,?,?,?,?,?)", $parambdcolegio);
        $this->db_bdcolegio->close();
        
        $paramcipinteg = array( 
           $this->get_Direcol(),
             $this->getEmailsec(),
            $this->getEmail(),
            $this->getTelcol(),
            $this->getCelcol(),
            $this->getRedpm(),
            $this->getRedpc(),
            $this->getCeluemp(),
            $this->getCodzona(),
            $this->getSexcol(),
            $this->getColestcivil(),
            $this->getDni(),
            $this->getFecnaccol(),
            $this->getNombre(),
            $this->getApellidop(),
            $this->getApellidom(),
            $this->getDescrdep(),
            $this->getDescrprov(),
            $this->getDescrdist(),
            $this->getRegcol(),
            $this->getDirecolant(),
            $this->getZonaantes(),
            $this->getEmailsecant(),
            $this->getEmailant(),
            $this->getTelcolant(),
            $this->getCelcolant(),
            $this->getRedpmant(),
            $this->getRedpcant(),
            $this->getIp(),
            $this->getTipo()
                );
        //var_dump($paramcipinteg);
        $query = $this->db->query("CALL UDP_COLEGIADO_CIP(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $paramcipinteg);
      
//         print_r($this->db->_error_message());  
        if ($querybd or $query) {
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
//     return true;
        $emailq = $this->db->query("SELECT count(cPdeValor) as Cantidad from persona_detalle where cPdeValor = ?",array($email));
        $row2 = $emailq->row();
        $cantidad = $row2->Cantidad;
        $this->db->close();
        $params = array($codigo,$email,$cantidad);
        $query = $this->db_bdcolegio->query("CALL UDP_VALIDA_EMAIL (?,?,?)", $params);
        $this->db_bdcolegio->close(); 
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

    function DeporteR() {
        $params = array($this->getCoddeporte(),$this->regcol);
        $query = $this->db_bdcolegio->query("Select * from col_dep where coddep = ? and regcol = ?", $params);
        $this->db_bdcolegio->close();      
        if ($query) {
            if ($query->num_rows() > 0) {               
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
     function FamiliaUpd() {
        $params = array(
            $this->getRegcol(),
            $this->getIdfam(),
            $this->getApepatfam(),
            $this->getApematfam(),
            $this->getNomfam(),
            $this->getFecnacfam(),
            $this->getParentesco(),
            $this->getEstadovf()
            
        );
        
        $query = $this->db_bdcolegio->query("CALL UPD_FAMILIA_COL(?,?,?,?,?,?,?,?)", $params);
        $this->db_bdcolegio->close();      
        if ($query) {         
                return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function FamiliaDel() {
        $params = array(
            $this->getRegcol(),
            $this->getIdfam()      
        );
        
        $query = $this->db_bdcolegio->query("CALL UPD_DELETEFAMILIA_COL(?,?)", $params);
        $this->db_bdcolegio->close();      
        if ($query) {         
                return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
     function FamiliaAdd() {
        $params = array(
            $this->getRegcol(),
            $this->getApepatfam(),
            $this->getApematfam(),
            $this->getNomfam(),
            $this->getFecnacfam(),
            $this->getParentesco(),
            $this->getEstadovf()
            
        );
        //echo var_dump($params);
        $query = $this->db_bdcolegio->query("CALL UPD_ADDFAMILIA_COL(?,?,?,?,?,?,?)", $params);
        $this->db_bdcolegio->close();     
        $row = $query->row();
        if ($query) {    
            if($row->tipo == 0){
                return 0;
            }else if($row->tipo == 1){
                return 1;
            }else{
                return 2;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
     function DeporteAdd() {
        $params = array(
            $this->getRegcol(),
            $this->getCoddeporte(),
            $this->getSeleccion(),
            $this->getDominio()           
        );
        
        $query = $this->db_bdcolegio->query("CALL UPD_ADDDEPORTE_COL(?,?,?,?)", $params);
        $this->db_bdcolegio->close();     
        $row = $query->row();
        if ($query) {    
                return true;
            
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function MostrarFamiliar($idfam) {
        $query = $this->db_bdcolegio->query("select idfam,regcol,apepatfam,apematfam,nomfam,fecnacfam,parentesco,estadovf from col_familia where idfam =?",array($idfam));
        $this->db_bdcolegio->close();
        if ($query) {    
                    $row = $query->row();
                    $this->setIdfam($row->idfam);
                    $this->setApepatfam($row->apepatfam);
                    $this->setApematfam($row->apematfam);
                    $this->setNomfam($row->nomfam);
                    $this->setRegcol($row->regcol);
                    $this->setFecnacfam($row->fecnacfam);
                    $this->setEstadovf($row->estadovf);
                    $this->setParentesco($row->parentesco);
                return true;
            
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
//     function MostrarDeporte($coddep,$regcol) {
//        $query = $this->db_bdcolegio->query("select * from col_dep where coddep = ? and regcol = ?",array($coddep,$regcol));
//        $this->db_bdcolegio->close();     
//        if ($query) {    
//                    $row = $query->row();
//                    $this->setRegcol($row->regcol);
//                    $this->setCoddeporte($row->coddep);
//                    $this->setDominio($row->dominiodep);
//                    $this->setSeleccion($row->seleccion);
//                return true;
//            
//        } else {
//            throw new Exception('error al recuperar datos de la BD');
//        }
//    }
    function DeporteDel() {
        $params = array(
            $this->getRegcol(),
            $this->getCoddeporte()           
        );
        
        $query = $this->db_bdcolegio->query("CALL UPD_DEPORTE_COL(?,?)", $params);
        $this->db_bdcolegio->close();      
        if ($query) {         
                return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
}

 
?>
