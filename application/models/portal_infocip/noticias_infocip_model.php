<?php

class Noticias_infocip_model extends CI_Model {

    private $nNotCodigo = '';
    private $cNotFechaFinal = '';
    private $cNotFechaInicial = '';
    private $cNotTitulo = '';
    private $cNotSumilla = '';
    private $cNotContenido = '';
    private $Multimedia = '';
    private $nMultCodigo = '';
    private $cMultLink = '';
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

   
    
        function __construct() {
        parent::__construct();
        $this->load->database();
        
    }

     function CursoCbo() {
         
        $query = $this->db->query('SELECT * 
FROM  `tb_portal_tiponoticia` 
WHERE  `nTNotCodigo` 
BETWEEN 18 
AND 21 
ORDER BY  `tb_portal_tiponoticia`.`nTNotCodigo` ASC');
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
    function noticias_infocipqry($parametros='') {

        $query = $this->db->query("CALL USP_GEN_S_NOTICIAS2(?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
        function NoticiasMultimediaqry($nNotCodigo) {

        $query = $this->db->query("CALL USP_GEN_S_MULTIMEDIA_BOLSA2(?)",$nNotCodigo);
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

    
        function NoticiasInfocipIns() {
        $parametros = array($this->getCNotFechaFinal(), $this->getCNotTitulo(), $this->getCNotSumilla(),$this->getCNotContenido(), $this->getCurso());
        $query = $this->db->query("CALL USP_GEN_I_INFORMACION_INTRANET2(?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
        function NoticiasInfocipUpd() {
        $parametros = array($this->getNNotCodigo(), $this->getCNotFechaFinal(), $this->getCNotTitulo(),$this->getCNotSumilla(),$this->getCNotContenido());
        $query = $this->db->query("CALL USP_GEN_U_NOTICIAS_ACTUALIZA2 (?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    
    function NoticiasInfocipGet($nNotCodigo) {

       $query = $this->db->query("SELECT tpn.nNotCodigo, cNotTitulo, cNotSumilla, cNotContenido, cNotFechaInicial ,cNotFechaFinal, ifnull( (
SELECT m.cMultLinkMiniatura
FROM tb_portal_noticia_y_multimedia nm
INNER JOIN tb_portal_multimedia m ON m.nMultCodigo = nm.nMultCodigo
WHERE nm.nNotCodigo = tpn.nNotCodigo
AND m.nMultEstado =1
ORDER BY nm.nMultCodigo DESC
LIMIT 1
), 'default.jpg' ) AS cMultLinkMiniatura
FROM tb_portal_noticia tpn
WHERE nNotCodigo =? and nTNotCodigo =nTNotCodigo
AND nNotEstado =1
ORDER BY nNotCodigo DESC",array($nNotCodigo));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setNNotCodigo($row->nNotCodigo);
             $this->setCNotTitulo($row->cNotTitulo);
             $this->setCNotSumilla($row->cNotSumilla);
             $this->setCNotContenido($row->cNotContenido);
              $this->setCNotFechaInicial($row->cNotFechaInicial);
            $this->setCNotFechaFinal($row->cNotFechaFinal);
            $this->setMultimedia($row->cMultLinkMiniatura);
             return true;
        } else {
            return false;
        }
    }

    function NoticiasInfocipDel() {
        $parametros = array($this->getNNotCodigo());
        $query = $this->db->query("CALL USP_GEN_D_NOTICIAS_ELIMINAR2 (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
       function MultimediaDel() {
        $parametros = array($this->getNMultCodigo());
        $query = $this->db->query("CALL USP_GEN_D_MULTIMEDIA_ELIMINAR2 (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

        function noticiasempresarialUpload() {
        $parametros = array($this->getMultimedia(),$this->getNNotCodigo()

            );
        $query = $this->db->query("CALL USP_GEN_I_NOTICIAS_MULTIMEDIA2 (?,?)", $parametros);
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

