<?php

class Anuncio_model extends CI_Model {

    private $nNotCodigo = '';
    private $cNotFechaFinal = '';
    private $cNotFechaInicial = '';
    private $cNotTitulo = '';
    private $cNotSumilla = '';
    private $cNotContenido = '';
    private $Multimedia = '';
    private $nMultCodigo = '';
    private $cMultLink = '';
    private $cTipoPortal = '';
     private $curso= '';
    
     public function setCurso($curso) {
       $this->curso = $curso;
    }
    
      public function getCurso() {
       return $this->curso;
    }
//    creando nuevos set y get.
    public function getNTMultCodigo() {
        return $this->nTMultCodigo;
    }

    public function setNTMultCodigo($nTMultCodigo) {
        $this->nTMultCodigo = $nTMultCodigo;
    }

    public function getCMultLink() {
        return $this->cMultLink;
    }

    public function setCMultLink($cMultLink) {
        $this->cMultLink = $cMultLink;
    }

    public function getCMultTitulo() {
        return $this->cMultTitulo;
    }

    public function setCMultTitulo($cMultTitulo) {
        $this->cMultTitulo = $cMultTitulo;
    }

    public function getCMultDesc() {
        return $this->cMultDesc;
    }

    public function setCMultDesc($cMultDesc) {
        $this->cMultDesc = $cMultDesc;
    }
    //    fin de la creacion de los set y get.

    public function getNNotCodigo() {
        return $this->nNotCodigo;
    }

    public function setNNotCodigo($nNotCodigo) {
        $this->nNotCodigo = $nNotCodigo;
    }

    public function getCNotFechaFinal() {
        return $this->cNotFechaFinal;
    }

    public function setCNotFechaFinal($cNotFechaFinal) {
        $this->cNotFechaFinal = $cNotFechaFinal;
    }

    
      public function getCNotFechaInicial() {
        return $this->cNotFechaInicial;
    }

    public function setCNotFechaInicial($cNotFechaInicial) {
        $this->cNotFechaInicial = $cNotFechaInicial;
    }
    
    
    public function getCNotTitulo() {
        return $this->cNotTitulo;
    }

    public function setCNotTitulo($cNotTitulo) {
        $this->cNotTitulo = $cNotTitulo;
    }

        public function getCNotSumilla() {
        return $this->cNotSumilla;
    }

    public function setCNotSumilla($cNotSumilla) {
        $this->cNotSumilla = $cNotSumilla;
    }
    
    public function getCNotContenido() {
        return $this->cNotContenido;
    }

    public function setCNotContenido($cNotContenido) {
        $this->cNotContenido = $cNotContenido;
    }

    public function getMultimedia() {
        return $this->Multimedia;
    }

    public function setMultimedia($Multimedia) {
        $this->Multimedia = $Multimedia;
    }
    public function getNMultCodigo() {
        return $this->nMultCodigo;
    }

    public function setNMultCodigo($nMultCodigo) {
        $this->nMultCodigo = $nMultCodigo;
    }
       public function getCTipoPortal() {
        return $this->cTipoPortal;
    }

    public function setCTipoPortal($cTipoPortal) {
        $this->cTipoPortal = $cTipoPortal;
    }
    
        function __construct() {
        parent::__construct();
        $this->load->database();
        
    }


    function anuncioqry() {

        $query = $this->db->query("CALL USP_GEN_S_NOTICIA_BOLSA2()");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
        function AnuncioMultimediaqry($nNotCodigo) {

        $query = $this->db->query("CALL USP_GEN_S_MULTIMEDIA_ANUNCIO(?)",$nNotCodigo);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
        function get_s_cbo_multimedia() {
       $query = $this->db->query("CALL USP_GEN_S_TIPO_MULTIMEDIA2");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

       
    function AnuncioIns() {
        $parametros = array($this->getCNotFechaFinal(), $this->getCNotTitulo(), $this->getCNotSumilla(),$this->getCNotContenido(),$this->getCTipoPortal());
        $query = $this->db->query("CALL USP_GEN_I_BOLSA_TRABAJO2(?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
            function AnuncioUpd() {
        $parametros = array($this->getNNotCodigo(), $this->getCNotFechaFinal(), $this->getCNotTitulo(),$this->getCNotSumilla(),$this->getCNotContenido(),$this->getCTipoPortal());
        $query = $this->db->query("CALL USP_GEN_U_NOTICIAS_ACTUALIZA3 (?,?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
    function AnuncioGet($nNotCodigo) {

       $query = $this->db->query("select * from anuncio where nNotCodigo=?",array($nNotCodigo));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setNNotCodigo($row->nNotCodigo);
             $this->setCNotTitulo($row->cNotTitulo);
             $this->setCNotSumilla($row->cNotSumilla);
             $this->setCNotContenido($row->cNotContenido);
              $this->setCNotFechaInicial($row->cNotFechaInicial);
            $this->setCNotFechaFinal($row->cNotFechaFinal);
            $this->setMultimedia($row->cMultLinkMiniatura);
            $this->setCTipoPortal($row->cTipoPortal);
             return true;
        } else {
            return false;
        }
    }

    function AnuncioDel() {
        $parametros = array($this->getNNotCodigo());
        $query = $this->db->query("CALL USP_GEN_D_NOTICIAS_ELIMINAR3 (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
       function MultimediaDel() {
        $parametros = array($this->getNMultCodigo());
        $query = $this->db->query("CALL USP_GEN_D_MULTIMEDIA_ELIMINAR3 (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

        function noticiasempresarialUpload() {
        $parametros = array($this->getMultimedia(),$this->getNNotCodigo()

            );
        $query = $this->db->query("CALL USP_GEN_I_MULTIMEDIA_ANUNCIO (?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
        
        function noticiasempresarialUploadPdf() {
        $parametros = array($this->getCMultLink(),$this->getNNotCodigo()
            );
        $query = $this->db->query("CALL USP_GEN_I_NOTICIAS_MULTIMEDIAPDF2 (?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
}

