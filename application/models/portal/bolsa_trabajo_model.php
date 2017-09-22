<?php

class Bolsa_trabajo_model extends CI_Model {

    private $nNotCodigo = '';
    private $cNotFechaFinal = '';
    private $cNotTitulo = '';
    private $cNotSumilla = '';
    private $cNotContenido = '';
    private $Multimedia = '';
    private $nMultCodigo = '';
    private $cMultLink = '';
    
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


    function bolsa_trabajoqry($parametros='') {
//        $parametros = array('criterio');
        $query = $this->db->query("CALL USP_GEN_S_NOTICIA_BOLSA(?,'')", $parametros);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
        function BolsaMultimediaqry($nNotCodigo) {
//        $nNotCodigo = array($this->getNNotCodigo());
        $query = $this->db->query("CALL USP_GEN_S_MULTIMEDIA_BOLSA(?)",$nNotCodigo);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
        function get_s_cbo_multimedia() {
       $query = $this->db->query("CALL USP_GEN_S_TIPO_MULTIMEDIA");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    
        function BolsaTrabajoIns() {
        $parametros = array($this->getCNotFechaFinal(), $this->getCNotTitulo(), $this->getCNotSumilla(),$this->getCNotContenido());
        $query = $this->db->query("CALL USP_GEN_I_BOLSA_TRABAJO(?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
        function BolsaTrabajoUpd() {
        $parametros = array($this->getNNotCodigo(), $this->getCNotFechaFinal(), $this->getCNotTitulo(),$this->getCNotSumilla(),$this->getCNotContenido());
        $query = $this->db->query("CALL USP_GEN_U_NOTICIAS_ACTUALIZA (?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    
    function BolsaTrabajoGet($nNotCodigo) {
//       $query = $this->db->query("SELECT * FROM tb_portal_noticia WHERE nNotCodigo=? AND nTNotCodigo=17 and nNotEstado=1",array($nNotCodigo));
       $query = $this->db->query("SELECT tpn.nNotCodigo, cNotTitulo, cNotSumilla, cNotContenido, cNotFechaFinal, ifnull( (
SELECT m.cMultLinkMiniatura
FROM tb_portal_noticia_y_multimedia nm
INNER JOIN tb_portal_multimedia m ON m.nMultCodigo = nm.nMultCodigo
WHERE nm.nNotCodigo = tpn.nNotCodigo
AND m.nMultEstado =1
ORDER BY nm.nMultCodigo DESC
LIMIT 1
), 'ico_notas_prensa_default.jpg' ) AS cMultLinkMiniatura
FROM tb_portal_noticia tpn
WHERE nNotCodigo =? and nTNotCodigo =11
AND nNotEstado =1
ORDER BY nNotCodigo DESC",array($nNotCodigo));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setNNotCodigo($row->nNotCodigo);
             $this->setCNotTitulo($row->cNotTitulo);
             $this->setCNotSumilla($row->cNotSumilla);
             $this->setCNotContenido($row->cNotContenido);
            $this->setCNotFechaFinal($row->cNotFechaFinal);
            $this->setMultimedia($row->cMultLinkMiniatura);
             return true;
        } else {
            return false;
        }
    }

    function BolsaTrabajoDel() {
        $parametros = array($this->getNNotCodigo());
        $query = $this->db->query("CALL USP_GEN_D_NOTICIAS_ELIMINAR (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
       function MultimediaDel() {
        $parametros = array($this->getNMultCodigo());
        $query = $this->db->query("CALL USP_GEN_D_MULTIMEDIA_ELIMINAR (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

        function noticiasempresarialUpload() {
        $parametros = array($this->getMultimedia(),$this->getNNotCodigo()
//                ,$this->getNTMultCodigo(),$this->getCMultLink(),$this->getCMultTitulo(),$this->getCMultDesc()
            );
        $query = $this->db->query("CALL USP_GEN_I_NOTICIAS_MULTIMEDIA (?,?)", $parametros);
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
        $query = $this->db->query("CALL USP_GEN_I_NOTICIAS_MULTIMEDIAPDF (?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
}

