<?php

class Mensaje2_model extends CI_Model {
    
    private $nDmeIdDetalleMensaje='';
    private $nPerIdPersona='';
    private $nMenIdMensaje='';
    private $cMenTipoMensaje='';
    private $cDmeEmisor='';
    private $cDmeOficina='';
    private $cDmeArea='';
    private $cDmeSubArea='';
    private $cMenAsunto='';
    private $cMenMensaje='';
    private $cMenEstado='';
    private $dMenFecha=''  ;
    
     function __construct() {
   
        $this->load->database();
        parent::__construct();
     }
    
     public function getNDmeIdDetalleMensaje() {
         return $this->nDmeIdDetalleMensaje;
     }

     public function setNDmeIdDetalleMensaje($nDmeIdDetalleMensaje) {
         $this->nDmeIdDetalleMensaje = $nDmeIdDetalleMensaje;
     }

     public function getNPerIdPersona() {
         return $this->nPerIdPersona;
     }

     public function setNPerIdPersona($nPerIdPersona) {
         $this->nPerIdPersona = $nPerIdPersona;
     }

     public function getNMenIdMensaje() {
         return $this->nMenIdMensaje;
     }

     public function setNMenIdMensaje($nMenIdMensaje) {
         $this->nMenIdMensaje = $nMenIdMensaje;
     }
    
     public function getCMenTipoMensaje() {
         return $this->cMenTipoMensaje;
     }

     public function setCMenTipoMensaje($cMenTipoMensaje) {
         $this->cMenTipoMensaje = $cMenTipoMensaje;
     }

     public function getCDmeEmisor() {
         return $this->cDmeEmisor;
     }

     public function setCDmeEmisor($cDmeEmisor) {
         $this->cDmeEmisor = $cDmeEmisor;
     }

     public function getCDmeOficina() {
         return $this->cDmeOficina;
     }

     public function setCDmeOficina($cDmeOficina) {
         $this->cDmeOficina = $cDmeOficina;
     }

     public function getCDmeArea() {
         return $this->cDmeArea;
     }

     public function setCDmeArea($cDmeArea) {
         $this->cDmeArea = $cDmeArea;
     }

     public function getCDmeSubArea() {
         return $this->cDmeSubArea;
     }

     public function setCDmeSubArea($cDmeSubArea) {
         $this->cDmeSubArea = $cDmeSubArea;
     }

     public function getCMenAsunto() {
         return $this->cMenAsunto;
     }

     public function setCMenAsunto($cMenAsunto) {
         $this->cMenAsunto = $cMenAsunto;
     }

     public function getCMenMensaje() {
         return $this->cMenMensaje;
     }

     public function setCMenMensaje($cMenMensaje) {
         $this->cMenMensaje = $cMenMensaje;
     }

     public function getCMenEstado() {
         return $this->cMenEstado;
     }

     public function setCMenEstado($cMenEstado) {
         $this->cMenEstado = $cMenEstado;
     }

     public function getDMenFecha() {
         return $this->dMenFecha;
     }

     public function setDMenFecha($dMenFecha) {
         $this->dMenFecha = $dMenFecha;
         
     }
     
     function popupResponderMensaje($idUsuario) {
        $campos = $this->docenteGet($idUsuario);
        $this->load->view('lib_reclamaciones/mensaje/upd_view_respon', $campos);
    }
     
     
     
   

 


   function mensajeIns(){ $parametros = array(
            
            
//                                
       

                                    $this-> getNMenIdMensaje(),
                                    $this-> getCMenMensaje(),
                                    $this->getdMenFecha()

                                    );
            $query = $this->bdlib_reclamaciones->query("CALL USP_INS_MENSAJE2(?,?,?)", $parametros);
            
            
            $this->bdlib_reclamaciones->close();
        if ($query) {
            
            return true;
        } else {
            return false;
        }
    }
     
   
    function mensajelistar_reclamo(){
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id,CONCAT(r.apecol,'',r.apematcol,', ',r.nomcol) as emisor,m.cMenAsunto as asunto, m.dMenFecha as fecha,m.cMenEstado as estado
        from tb_lib_rec_mensaje1 m 
        inner join bdcolegio.colegiado r on m.nPerIdPersona = r.regcol
       
        inner join tb_lib_rec_subarea s on m.cDmeSubArea=s.nSuaIdSubArea
         inner join bdcolegio.user p on s.nPerIdPersona = p.ID
        where m.cDmeSubArea = 11  
        and m.nTpmIdTipoMensaje=1
       "
                );
        
        if ($query->num_rows() > 0) {
            $this->bdlib_reclamaciones->close();
            return $query->result_array();
        } else {
            return null;
        }
}


    function mensajelistar_sugerencia(){
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id,CONCAT(r.apecol,'',r.apematcol,', ',r.nomcol) as emisor,m.cMenAsunto as asunto, m.dMenFecha as fecha,m.cMenEstado as estado
        from tb_lib_rec_mensaje1 m 
        inner join bdcolegio.colegiado r on m.nPerIdPersona = r.regcol
       
        inner join tb_lib_rec_subarea s on m.cDmeSubArea=s.nSuaIdSubArea
         inner join bdcolegio.user p on s.nPerIdPersona = p.ID
        where m.cDmeSubArea = 11   
        and m.nTpmIdTipoMensaje=2");
        if ($query->num_rows() > 0) {
            $this->bdlib_reclamaciones->close();
            return $query->result_array();
        } else {
            return null;
        }
}


    function mensajelistar_opiniones(){
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id,CONCAT(r.apecol,'',r.apematcol,', ',r.nomcol) as emisor,m.cMenAsunto as asunto, m.dMenFecha as fecha,m.cMenEstado as estado
        from tb_lib_rec_mensaje1 m 
        inner join bdcolegio.colegiado r on m.nPerIdPersona = r.regcol
       
        inner join tb_lib_rec_subarea s on m.cDmeSubArea=s.nSuaIdSubArea
         inner join bdcolegio.user p on s.nPerIdPersona = p.ID
        where m.cDmeSubArea = 11    
       and m.nTpmIdTipoMensaje=3");
        if ($query->num_rows() > 0) {
            $this->bdlib_reclamaciones->close();
            return $query->result_array();
        } else {
            return null;
        }
}
function MensajeGet($id) {
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id,m.cMenAsunto,m.cMenMensaje
from tb_lib_rec_mensaje1 m where m.nMenIdMensaje=? ", array($id));
        //  inner join capitulo on tbl_bib_catatesis.codcap = capitulo.desccap  
          if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
           $this->setNMenIdMensaje($row->id);
//             $this->setCDmeArea($row->cDmeArea);
//             $this->setCDmeSubArea($row->cDmeSubAre);
             $this->setCMenAsunto($row->cMenAsunto);
              $this->setCMenMensaje($row->cMenMensaje);
              
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    
    
    
}