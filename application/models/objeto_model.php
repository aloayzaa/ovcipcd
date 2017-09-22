<?php

require_once('aplicacion_model.php');

class Objeto_model extends Aplicacion_model {

    //DECLARACION DE VARIABLES
    private $nObjId = '';
    private $cObjNombre = '';
    private $cObjNombreArchivo = '';
    private $nObjIdPadre = '';
    private $bObjEliminado = '';
    private $bObjTipo = '';
    private $nAplId = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct($idobjeto = null) {
        parent::__construct();
        if ($idobjeto != null) {
            $this->get_ObjObjeto($idobjeto);
        }
    }

    //FUNCIONES SET
    function set_nObjId($nObjId) {
        $this->nObjId = $nObjId;
    }

    function set_nAplId($nAplId) {
        $this->nAplId = $nAplId;
    }

    // function setnAplId($nAplId){
    // 	$this->nAplId = $nAplId;
    // }
    function set_cObjNombre($cObjNombre) {
        $this->cObjNombre = $cObjNombre;
    }

    function set_cObjNombreArchivo($cObjNombreArchivo) {
        $this->cObjNombreArchivo = $cObjNombreArchivo;
    }

    function set_nObjIdPadre($nObjIdPadre) {
        $this->nObjIdPadre = $nObjIdPadre;
    }

    function set_bObjEliminado($bObjEliminado) {
        $this->bObjEliminado = $bObjEliminado;
    }

    function set_bObjTipo($bObjTipo) {
        $this->bObjTipo = $bObjTipo;
    }

    //FUNCIONES GET
    function get_nObjId() {
        return $this->nObjId;
    }

    function get_nAplId() {
        return $this->nAplId;
    }

    // function getnAplId(){
    // 	return $this->nAplId;
    // }
    function get_cObjNombre() {
        return $this->cObjNombre;
    }

    function get_cObjNombreArchivo() {
        return $this->cObjNombreArchivo;
    }

    function get_nObjIdPadre() {
        return $this->nObjIdPadre;
    }

    function get_bObjEliminado() {
        return $this->bObjEliminado;
    }

    function get_bObjTipo() {
        return $this->bObjTipo;
    }

    //CONSTRUCTOR DEL OBJETO OBJETO
    function get_ObjObjeto($idobjeto) {
        $query = $this->db->query("SELECT * FROM objeto WHERE nObjId=? AND bObjEliminado=0", array($idobjeto));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->set_nObjId($row->nObjId);
            $this->set_cObjNombre($row->cObjNombre);
            $this->set_cObjNombreArchivo($row->cObjNombreArchivo);
            $this->set_nObjIdPadre($row->nObjIdPadre);
            $this->set_bObjEliminado($row->bObjEliminado);
            $this->set_bObjTipo($row->bObjTipo);
            $this->get_ObjAplicacion($row->nAplId);
        }
    }

    //LISTA DE MENU CON OPCIONES

    function listaMenuOpciones2() {
        $resultado = array();
        $ul = "";
        $active = "";
        $opciones = "";
      $url = $this->session->userdata('url'); 
                $idaplicacion=$this->session->userdata('IDUsu');
        $query = $this->db->query("select distinct a.nAplId,a.cAplNombre,a.cAplIcono from objeto o inner join usuario_objeto uo on uo.nObjId=o.nObjId inner join aplicacion a on a.nAplId=o.nAplId
 where uo.nUsuId=?",array($idaplicacion));
//        $query = $this->db->query("SELECT * FROM aplicacion WHERE nAplTipo='1' AND bAplEliminado='0'");
//                    $this->db->close();
        foreach ($query->result() as $row) {
//                    $idusuario = $this->session->userdata('IDUsu');
//                    $opt = $this->db->query("call USP_GEN_S_MENU_TODOS (?,?,?)", array('W', $idusuario, $row->nAplId));
            $opt = $this->listaSubMenus('W', $row->nAplId);
            if ($opt != null) {
                $active = "";
                $ul = 'class="collapsed-nav closed"';
                $array = array();
                foreach ($opt->result() as $opcion) {
                    if ($url) {
                        if ($opcion->cOdetNombreArchivo == $url) {
                            $active = "class=\"active open\"";
                            $ul = 'class="collapsed-nav closed" style="display:block"';
                            $opciones = 'class="active"';
                        } else {
                            $opciones = '';
                        }
                    }
                    $array[] = array(
                        "value" => $opcion->cObjNombre,
                        "url" => $opcion->cOdetNombreArchivo,
                        "li" => $opciones
                    );
                }

                $resultado[] = array(
                    'menu' => $row->cAplNombre,
                    'datos' => $array,
                    'icon' => $row->cAplIcono,
                    'active' => $active,
                    'ul' => $ul);
            }
        }
        return $resultado;
    }

    //LISTA DE SUBMENUS
    function listaSubMenus($plataforma, $idaplicacion) {
        $idusuario = $this->session->userdata('IDUsu');
        $query = $this->db->query("call USP_GEN_S_MENU_TODOS (?,?,?)", array($plataforma, $idusuario, $idaplicacion));
//        print_r($query);
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

}

?>