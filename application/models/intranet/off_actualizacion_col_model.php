<?php

class actualizacion_col_model extends CI_Model {

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
    private $codzona = '';
    private $descrzona = '';
    //atributos Secundarios 
    private $direcolant = '';
    private $emailant = '';
    private $emailsecant = '';
    private $telcolant = '';
    private $celcolant = '';
    private $redpmant = '';
    private $redpcant = '';
    private $celuemp = '';
    private $ip = '';
    private $fechaingreso = '';
    private $zonaantes = '';
    
     //formacion profesional 
    private $razsocinsacad = '';
    private $desccap = '';
    private $fecinscol = '';
    private $fectitcol = '';
    private $nrectoral = '';
    

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
        $query = $this->db_colegiado->query("select *,DATE_FORMAT((c.fecnaccol), '%d/%m/%Y') as fechanac from colegiado c
inner join zona z  on z.codzona=c.codzona WHERE regcol=?", array($cip));
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
                $this->setDescrzona($row->descrzona);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
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
        $query = $this->db_colegiado->query("SELECT c.regcol, c.apecol, c.apematcol, c.nomcol, concat(c.apecol,' ',c.apematcol, ' ',c.nomcol)as nombre, concat(c.direcol,' - ',z.descrzona) as direccion,cp.desccap,ins.razsocinsacad,c.fecinscol,
ct.fectitcol,ct.nrectoral FROM  colegiado c inner join zona z on c.codzona=z.codzona inner join col_titulo ct on c.regcol=ct.regcol inner join
titulo t on t.codtitulo=ct.codtitulo inner join instacademica ins on ct.codinsacad=ins.codinsacad inner join 
especialidad esp on esp.codesp = t.codesp inner join capitulo cp on cp.codcap=esp.codcap
WHERE c.transfer<>'E' AND c.tipoclase<>'E' AND c.falleccol='V'
and c.regcol=?", array($cip));
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
        $parametros = array($this->getRegcol(), $this->getDirecol(), $this->getEmail(), $this->getEmailsec(), $this->getTelcol(), $this->getCelcol(),
            $this->getRedpm(), $this->getRedpc(),$this->getCeluemp(),$this->getCodzona());
        $query = $this->db_colegiado->query("CALL USP_CIP_U_DATOSCOLEGIADO (?,?,?,?,?,?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }


}

?>
