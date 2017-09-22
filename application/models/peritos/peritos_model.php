<?php

class Peritos_model extends CI_Model {

   private $Id='';
   private $nSdelId='';
   private $Remitente='';
   private $Documento='';
   private $Telefono='';
   private $Rubro='';
   private $Tipo='';
   private $nsolicitud ='';
   private $cFechaSol='';
   private $cFechaSolRes='';
   private $DescripcionSol='';
   private $DireccionPer='';
   private $Archivo='';
   private $Asunto='';
   private $bEstadoSolicitud='';
   private $Multimedia = '';
   private $cMultLink = '';
   
    function __construct() {
        $this->load->database();
        parent::__construct();
    }
   
    public function getMultimedia() {
        return $this->Multimedia;
    }

    public function setMultimedia($Multimedia) {
        $this->Multimedia = $Multimedia;
    }

    public function getCMultLink() {
        return $this->cMultLink;
    }

    public function setCMultLink($cMultLink) {
        $this->cMultLink = $cMultLink;
    }

        public function getNSdelId() {
       return $this->nSdelId;
   }

   public function setNSdelId($nSdelId) {
       $this->nSdelId = $nSdelId;
   }

      public function getAsunto() {
       return $this->Asunto;
   }

   public function setAsunto($Asunto) {
       $this->Asunto = $Asunto;
   }
   
   public function getCFechaSol() {
       return $this->cFechaSol;
   }

   public function setCFechaSol($cFechaSol) {
       $this->cFechaSol = $cFechaSol;
   }

   public function getCFechaSolRes() {
       return $this->cFechaSolRes;
   }

   public function setCFechaSolRes($cFechaSolRes) {
       $this->cFechaSolRes = $cFechaSolRes;
   }

   public function getDescripcionSol() {
       return $this->DescripcionSol;
   }

   public function setDescripcionSol($DescripcionSol) {
       $this->DescripcionSol = $DescripcionSol;
   }

   public function getDireccionPer() {
       return $this->DireccionPer;
   }

   public function setDireccionPer($DireccionPer) {
       $this->DireccionPer = $DireccionPer;
   }

   public function getArchivo() {
       return $this->Archivo;
   }

   public function setArchivo($Archivo) {
       $this->Archivo = $Archivo;
   }

      public function getNsolicitud() {
       return $this->nsolicitud;
   }

   public function setNsolicitud($nsolicitud) {
       $this->nsolicitud = $nsolicitud;
   }

     
    public function getRemitente() {
        return $this->Remitente;
    }

    public function setRemitente($Remitente) {
        $this->Remitente = $Remitente;
    }
    public function getDocumento() {
        return $this->Documento;
    }

    public function setDocumento($Documento) {
        $this->Documento = $Documento;
    }
 
    public function getTelefono() {
        return $this->Telefono;
    }

    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    public function getRubro() {
        return $this->Rubro;
    }

    public function setRubro($Rubro) {
        $this->Rubro = $Rubro;
    }
          
   public function getId() {
       return $this->Id;
   }

   public function setId($Id) {
       $this->Id = $Id;
   }
   public function getTipo() {
       return $this->Tipo;
   }

   public function setTipo($Tipo) {
       $this->Tipo = $Tipo;
   }
   public function getBEstadoSolicitud() {
       return $this->bEstadoSolicitud;
   }

   public function setBEstadoSolicitud($bEstadoSolicitud) {
       $this->bEstadoSolicitud = $bEstadoSolicitud;
   }

   
   function Solicitud_Peritaje_Ins() {
        $parametro = array($this->getId(),$this->getCFechaSol(),$this->getDescripcionSol(),$this->getDireccionPer(),$this->getCFechaSolRes(),$this->getAsunto());
        $query = $this->db->query("CALL USP_PERIT_INSERTAR_SOLICITUD(?,?,?,?,?,?)", $parametro);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
    }
  function get_combo_parametro_segun_categoria(){
        $query = $this->db->query("CALL USP_GEN_S_ParametroSegunCategoria()");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
  function RemitenteData($parametro,$Documento) {
      $param = array($Documento,$parametro);
      $query = $this->db->query("call USP_S_BUSCAR_REMITENTE(?,?)",$param);
      $this->db->close();
      if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setId($row->Id);
                $this->setRemitente($row->Remitente);
                $this->setDocumento($row->Documento);
                $this->setTelefono($row->Tel);
                $this->setRubro($row->Rubro);
                $this->setTipo($row->Tipo);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
  
  }
    
  function NumeroSolicitud() {
      $query = $this->db->query("call USP_S_GENERAR_NUMERO_SOLICITUD()");
      $this->db->close();
      if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNsolicitud($row->nsolicitud);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
  
  }
  function peritosQry($busqueda='') {
        $query = $this->db->query("call USP_PERIT_LISTAR_SOLICITUD(?)",$busqueda);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
  
    function get_combo_peritos()
    {
        $query = $this->db->query("Select * from peritos where bPeritoEstado='0' ");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    function asignacion_peritos($valor)
    {  
             
        $query = $this->db->query("select nSdelId,nSolId,p.cPeritoDatos
from solicitudper_detalle sd
inner join peritos p on sd.nPeritoId=p.nPeritoId
where sd.nSolId=$valor and sd.bSolicitudEstado=0");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    function Asignacion_peritos_ins() {
        $parametro = array($this->getNsolicitud(),$this->getId());
        $query = $this->db->query("CALL USP_PERIT_INSERTAR_ASIGNACION(?,?)", $parametro);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
    }
    
    function buscar_asignacion_peritos($nPeritoId,$nSolId)
    {
        $parametro = array($nPeritoId,$nSolId);
        $query = $this->db->query("Select count(*)as salida from solicitudper_detalle where nPeritoId=? and nSolId=? and bSolicitudEstado=0",$parametro);
       
        $this->db->close();
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

    function RemoverPerito() {
        $parametros = array($this->getNSdelId());
        $query = $this->db->query("CALL USP_PERIT_REMOVER_ASIGNACION(?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function get_Solicitud($nSolId)
    {
            $query = $this->db->query("call USP_PERIT_S_SOLICITUD(?)",$nSolId);
               $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setId($row->nSolId);
                $this->setAsunto($row->nSolAsunto);
                $this->setCFechaSol($row->cSolFechaSolicitud);
                $this->setDescripcionSol($row->nSolDescripcionPert);
                $this->setDireccionPer($row->nSolDireccionPert);
                $this->setCFechaSolRes($row->cSolFechaRespuesta);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
     function solicitudUpd(){
    $parametros =array($this->getId(),
            $this->getAsunto(),
            $this->getCFechaSol(),
            $this->getDescripcionSol(),
            $this->getDireccionPer(),
            $this->getCFechaSolRes(),
        );
        
    $query = $this->db->query("call USP_PERIT_UPD_SOLICITUD(?,?,?,?,?,?)",$parametros);
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
}

function get_VistaPrevia($nSolId){
         $query = $this->db->query("call USP_PERIT_S_VISTAPREVIA(?)",$nSolId);
         
         $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                
                $this->setRemitente($row->Remitente);
                $this->setAsunto($row->nSolAsunto);
                $this->setCFechaSol($row->cSolFechaSolicitud);
                $this->setDescripcionSol($row->nSolDescripcionPert);
                $this->setDireccionPer($row->nSolDireccionPert);
                $this->setCFechaSolRes($row->cSolFechaRespuesta);
                $this->setBEstadoSolicitud($row->estado);
                              
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function SolicitudDel() {
        $parametros = array($this->getId());
        $query = $this->db->query("call USP_PERIT_DEL_SOLICITUD(?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
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
    
      function SolicitudUpload() {
        $parametros = array($this->getMultimedia(),$this->getId());
        $query = $this->db->query("CALL USP_PERIT_UPD_MULTIMEDIA (?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
     function SolicitudMultimediaqry($nSolId) { 
        $query = $this->db->query("CALL USP_PERIT_S_MULTIMEDIA(?)",$nSolId);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    
    
}


?>
