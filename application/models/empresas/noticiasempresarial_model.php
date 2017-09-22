<?php

class Noticiasempresarial_model extends CI_Model {

    private $nNotCodigo = '';
    private $cNotFechaFinal = '';
    private $cNotTitulo = '';
    private $cNotSumilla = '';
    private $cNotContenido = '';
    private $Multimedia = '';
    private $nNotPublicacion='';
    
    function getNNotPublicacion() {
        return $this->nNotPublicacion;
    }

    function setNNotPublicacion($nNotPublicacion) {
        $this->nNotPublicacion = $nNotPublicacion;
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

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function tipo_noticia()
    {
       $query = $this->db->query('SELECT * FROM tb_portal_tiponoticia WHERE 
                nTNotCodigo=17 or nTNotCodigo=12 or nTNotCodigo=15');
       if($query){
           return $query->result();
        }
    }
     function cargar_combo() {
        $query = $this->db->query("select nEveId,cEveTitulo from evento");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {

            return null;
        }
    }

    function noticiasempresarialqry() {
        $parametros = array('');
// print_r($Parametros);
        $query = $this->db->query("CALL USP_GEN_S_NOTICIAS (?)", $parametros);

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
        function NoticiasEmpresarialIns($tiponoticia) {
        $parametros = array(
            $this->getCNotFechaFinal(),
            $this->getCNotTitulo(),
            $this->getCNotSumilla(),
            $this->getCNotContenido(),
            $this->getNNotPublicacion(),
            $tiponoticia);

        $query = $this->db->query("CALL USP_GEN_I_INFORMACION_INTRANET(?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
        function NoticiasEmpresarialUpd() {
        $parametros = array($this->getNNotCodigo(), $this->getCNotFechaFinal(), $this->getCNotTitulo(),$this->getCNotSumilla(),$this->getCNotContenido());
//        print_r($parametros);
//        exit();
        $query = $this->db->query("CALL USP_GEN_U_NOTICIAS_ACTUALIZA (?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    
    function NoticiasEmpresarialGet($nNotCodigo) {
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
WHERE nNotCodigo =? and nTNotCodigo in (15,17,12)
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

    function NoticiasEmpresarialDel() {
//        $this->adampt->setParam($this->getNNotCodigo());
        $parametros = array($this->getNNotCodigo());
//        $parametros = array($nNotCodigo);
        $query = $this->db->query("CALL USP_GEN_D_NOTICIAS_ELIMINAR (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

        function noticiasempresarialUpload() {
        $parametros = array($this->getMultimedia(),$this->getNNotCodigo()
            );
        $query = $this->db->query("CALL USP_GEN_I_NOTICIAS_MULTIMEDIA (?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }   
}

