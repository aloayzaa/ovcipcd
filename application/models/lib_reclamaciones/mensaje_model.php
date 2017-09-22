<?php

class Mensaje_model extends CI_Model {
    
    private $nDmeIdDetalleMensaje='';
    private $nPerIdPersona='';
    private $nMenIdMensaje='';
    private $cMenTipoMensaje='';
    private $cDmeEmisor='';
    private $cDmeOficina='';
    private $cDmeArea='';
    private $cDmeSubArea='';
    private $cMenAsunto='';
    private $cMenMensaje;
   private $cBuzonMensaje='';
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

     public function setCBuzonMensaje($cBuzonMensaje) {
         $this->cBuzonMensaje = $cBuzonMensaje;
     }
      public function getCBuzonMensaje() {
         return $this->cBuzonMensaje;
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
     
     
      public function AreaCbo(){
        
        $query = $this->bdlib_reclamaciones->query("SELECT nAreIdArea,cAreNombreArea FROM tb_lib_rec_area");
        if(count($query)>0){
            
           return $query->result();
        }
        else{
            return false;
        }
        
    }
    
     function SubAreaCbo(){
        
        $query=$this->bdlib_reclamaciones->query("SELECT nSuaIdSubArea,cSuaNombreSubArea FROM tb_lib_rec_subarea");
        if(count($query)>0){
            
            
            return $query->result();
            
        }
        else{
            return false;
        }
        
    }
    
    public function SubArea($Area)
    {
//        $this->db->where('codcap',$capitulos);
//        $this->db->order_by('poblacion','asc');
//        $query = $this->db->get('especialidad');
        $query=$this->bdlib_reclamaciones->query("SELECT * FROM tb_lib_rec_subarea WHERE nAreIdArea='$Area'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }

   public function TipoMensajeCbo(){
        
        $query = $this->bdlib_reclamaciones->query("SELECT nTpmIdTipoMensaje,
            cTpmTipoMensaje FROM tb_lib_rec_tipomensaje");
        if(count($query)>0){
            
           return $query->result();
        }
        else{
            return false;
            
        }
        
        
   
   }

   function mensajeIns(){ $parametros = array(
            
            
//                                $this-> getCDmeEmisor(),
//                                $this->getCDmeOficina(),
       
                              $this->getCMenTipoMensaje(),
                                $this->getCDmeArea(),
                                $this->getCDmeSubArea(),
                                
                                $this->getCMenAsunto(),
                                 
                                $this-> getCMenMensaje(),
//                                $this->getdMenFecha(),
                               

                                    );
            $query = $this->bdlib_reclamaciones->query("CALL USP_INS_MENSAJE(?,?,?,?,?)", $parametros);
            
          
            $this->bdlib_reclamaciones->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
     
   
    function mensajelistar_reclamo(){
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id, CONCAT(p.apecol,'',p.apematcol,', ',p.nomcol) as emisor,m.cMenAsunto as asunto, m.dMenFecha as fecha,m.cMenEstado as estado
        from tb_lib_rec_mensaje1 m 
        inner join bdcolegio.colegiado p on m.nPerIdPersona = p.regcol 
        where p.regcol=142180
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
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id, CONCAT(p.apecol,'',p.apematcol,', ',p.nomcol) as emisor,m.cMenAsunto as asunto, m.dMenFecha as fecha,m.cMenEstado as estado
        from tb_lib_rec_mensaje1 m 
        inner join bdcolegio.colegiado p on m.nPerIdPersona = p.regcol 
        where p.regcol=142180
       and m.nTpmIdTipoMensaje=2");
        if ($query->num_rows() > 0) {
            $this->bdlib_reclamaciones->close();
            return $query->result_array();
        } else {
            return null;
        }
}


    function mensajelistar_opiniones(){
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id, CONCAT(p.apecol,'',p.apematcol,', ',p.nomcol) as emisor,m.cMenAsunto as asunto, m.dMenFecha as fecha,m.cMenEstado as estado
        from tb_lib_rec_mensaje1 m 
        inner join bdcolegio.colegiado p on m.nPerIdPersona = p.regcol 
        where p.regcol=142180
       and m.nTpmIdTipoMensaje=3");
        if ($query->num_rows() > 0) {
            $this->bdlib_reclamaciones->close();
            return $query->result_array();
        } else {
            return null;
        }
}
function MensajeGet($id) {
        $query = $this->bdlib_reclamaciones->query("select m.nMenIdMensaje as id,m.cMenAsunto,m.cMenMensaje,b.cBuzonMensaje
from tb_lib_rec_mensaje1 m 
inner join tb_lib_rec_buzon b on m.nMenIdMensaje=b.nMenIdMensaje

where m.nMenIdMensaje=? ", array($id));
        //  inner join capitulo on tbl_bib_catatesis.codcap = capitulo.desccap  
          if ($query) {
            if ($query->num_rows() > 1) {
                $row = $query->row();
           $this->setNMenIdMensaje($row->id);
//             $this->setCDmeArea($row->cDmeArea);
//             $this->setCDmeSubArea($row->cDmeSubAre);
             $this->setCMenAsunto($row->cMenAsunto);
             $this->setCMenMensaje($row->cMenMensaje);
             $this->setCBuzonMensaje($row->cBuzonMensaje);
              
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    
    
    
}