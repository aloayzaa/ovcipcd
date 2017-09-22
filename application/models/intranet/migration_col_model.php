<?php

class Migration_col_model extends CI_Model {
    
    private $regcol = '';
    private $nombre = '';
    private $apellidop = '';
    private $apellidom = '';
    private $dni = '';
    private $sexcol ='';
    private $colestcivil = '';
    private $fecnaccol ='';
    private $_direcol ='';
    private $emailsec ='';
    private $telcol ='';
    private $celcol ='';
    private $Coddist ='';
    private $Codprov ='';
    private $Coddepa ='';
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
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

    public function getFecnaccol() {
        return $this->fecnaccol;
    }

    public function setFecnaccol($fecnaccol) {
        $this->fecnaccol = $fecnaccol;
    }

    public function get_direcol() {
        return $this->_direcol;
    }

    public function set_direcol($_direcol) {
        $this->_direcol = $_direcol;
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

    public function getCoddist() {
        return $this->Coddist;
    }

    public function setCoddist($Coddist) {
        $this->Coddist = $Coddist;
    }

    public function getCodprov() {
        return $this->Codprov;
    }

    public function setCodprov($Codprov) {
        $this->Codprov = $Codprov;
    }

    public function getCoddep() {
        return $this->Coddepa;
    }

    public function setCoddep($Coddepa) {
        $this->Coddepa = $Coddepa;
    }

        
    public function getRegcol() {
        return $this->regcol;
    }

    public function setRegcol($regcol) {
        $this->regcol = $regcol;
    }
        function __construct() {
          $this->load->database();
        parent::__construct();
//        if ($nPerId != null) {
//            $this->get_Persona($nPerId);
//        }
    }
            
    function LoadMigration($cip){
        
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
                $this->setEmailsec($row->emailsec);
                $this->setTelcol($row->telcol);
                $this->setCelcol($row->celcol);
                $this->setCoddist($row->descrdist);
                $this->setCodprov($row->descrprov);
                $this->setCoddep($row->descrdepa);
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    
            $paramcipinteg = array( 
            $this->get_Direcol(),
            $this->getEmailsec(),
            $this->getTelcol(),
            $this->getCelcol(),
            $this->getSexcol(),
            $this->getColestcivil(),
            $this->getDni(),
            $this->getFecnaccol(),
            $this->getNombre(),
            $this->getApellidop(),
            $this->getApellidom(),
            $this->getCoddep(),
            $this->getCodprov(),
            $this->getCoddist(),
            $this->getRegcol()
                );
        $querydb = $this->db->query("CALL UDP_COLEGIADO_MIGRATOR(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $paramcipinteg);
        $this->db->close();
         if ($querydb) {
             return true;
         }else{
              throw new Exception('error al recuperar datos de la BD');
         }
    }

}
?>
