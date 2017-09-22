<?php

class Material_model extends CI_Model{
   
    private $nMatId='';
    private $Tipomat=''; 
     private $Tipomat2=''; 
      private $Tipomat3=''; 
    private $codigo='';
    private $titulo='';
    private $capitulo='';
    private $capituloDescripcion='';
    private $especialidad='';
    private $especialidadDescripcion='';
    private $universidad='';
    private $universidadDescripcion='';
    private $ano='';
    private $resumen='';
    private $observacion='';
    private $multimedia='';
    private $aut='';
    private $estado_mat='';
    private $multlink='';
    
    private $nMatIdLibro='';
    private $Titulolib='';
    private $Autlibro='';
    private $editoriallib='';
    private $edicionlib='';
    private $categorialib='';
    private $resumenlib='';
    private $observacionlib='';
    private $ejemplareslib='';
    private $multimedialibro='';
    private $libro_est='';
    
    
    private $nMatIdRevista='';
    private $Titulorev='';
    private $Autrevista='';
    private $editorialrev='';
    private $edicionrev='';
    private $categoriarev='';
    private $resumenrev='';
    private $observacionrev='';
    private $ejemplaresrev='';
    private $multimediarev='';
    
   private $nMultCodigo = '';
 

        
    function __construct() {
             parent::__construct();
                $this->load->database();        
    }
    
   /////// GET YSET////////// 
    
   public function getLibro_est() {
       return $this->libro_est;
   }

   public function setLibro_est($libro_est) {
       $this->libro_est = $libro_est;
   }

      public function getMultlink() {
       return $this->multlink;
   }

   public function setMultlink($multlink) {
       $this->multlink = $multlink;
   }

      public function getEstado_mat() {
       return $this->estado_mat;
   }

   public function setEstado_mat($estado_mat) {
       $this->estado_mat = $estado_mat;
   }

      public function getNMatIdRevista() {
       return $this->nMatIdRevista;
   }

   public function setNMatIdRevista($nMatIdRevista) {
       $this->nMatIdRevista = $nMatIdRevista;
   }

   public function getAutrevista() {
       return $this->Autrevista;
   }

   public function setAutrevista($Autrevista) {
       $this->Autrevista = $Autrevista;
   }

   public function getEditorialrev() {
       return $this->editorialrev;
   }

   public function setEditorialrev($editorialrev) {
       $this->editorialrev = $editorialrev;
   }

   public function getCategoriarev() {
       return $this->categoriarev;
   }

   public function setCategoriarev($categoriarev) {
       $this->categoriarev = $categoriarev;
   }

   public function getResumenrev() {
       return $this->resumenrev;
   }

   public function setResumenrev($resumenrev) {
       $this->resumenrev = $resumenrev;
   }

   public function getObservacionrev() {
       return $this->observacionrev;
   }

   public function setObservacionrev($observacionrev) {
       $this->observacionrev = $observacionrev;
   }

   public function getEjemplaresrev() {
       return $this->ejemplaresrev;
   }

   public function setEjemplaresrev($ejemplaresrev) {
       $this->ejemplaresrev = $ejemplaresrev;
   }

   public function getMultimediarev() {
       return $this->multimediarev;
   }

   public function setMultimediarev($multimediarev) {
       $this->multimediarev = $multimediarev;
   }

      public function getMultimedialibro() {
       return $this->multimedialibro;
   }

   public function setMultimedialibro($multimedialibro) {
       $this->multimedialibro = $multimedialibro;
   }

      public function getEspecialidadDescripcion() {
       return $this->especialidadDescripcion;
   }

   public function setEspecialidadDescripcion($especialidadDescripcion) {
       $this->especialidadDescripcion = $especialidadDescripcion;
   }

  

      public function getAut() {
       return $this->aut;
   }
   public function getUniversidadDescripcion() {
       return $this->universidadDescripcion;
   }

   public function setUniversidadDescripcion($universidadDescripcion) {
       $this->universidadDescripcion = $universidadDescripcion;
   }

   
   public function setAut($aut) {
       $this->aut = $aut;
   }

   
      public function getNMatId() {
       return $this->nMatId;
   }

   public function setNMatId($nMatId) {
       $this->nMatId = $nMatId;
   }

   public function getTipomat() {
       return $this->Tipomat;
   }

   public function setTipomat($Tipomat) {
       $this->Tipomat = $Tipomat;
   }
   
   public function getTipomat2() {
       return $this->Tipomat2;
   }

   public function setTipomat2($Tipomat2) {
       $this->Tipomat2 = $Tipomat2;
   }

   public function getTipomat3() {
       return $this->Tipomat3;
   }

   public function setTipomat3($Tipomat3) {
       $this->Tipomat3 = $Tipomat3;
   }

   
   public function getCodigo() {
       return $this->codigo;
   }

   public function setCodigo($codigo) {
       $this->codigo = $codigo;
   }

   public function getTitulo() {
       return $this->titulo;
   }

   public function setTitulo($titulo) {
       $this->titulo = $titulo;
   }


   public function getCapitulo() {
       return $this->capitulo;
   }

   public function setCapitulo($capitulo) {
       $this->capitulo = $capitulo;
   }
   
   public function getCapituloDescripcion() {
       return $this->capituloDescripcion;
   }

   public function setCapituloDescripcion($capituloDescripcion) {
       $this->capituloDescripcion = $capituloDescripcion;
   }

   
   public function getEspecialidad() {
       return $this->especialidad;
   }

   public function setEspecialidad($especialidad) {
       $this->especialidad = $especialidad;
   }

   public function getUniversidad() {
       return $this->universidad;
   }

   public function setUniversidad($universidad) {
       $this->universidad = $universidad;
   }

   public function getAno() {
       return $this->ano;
   }

   public function setAno($ano) {
       $this->ano = $ano;
   }

   public function getResumen() {
       return $this->resumen;
   }

   public function setResumen($resumen) {
       $this->resumen = $resumen;
   }

   public function getObservacion() {
       return $this->observacion;
   }

   public function setObservacion($observacion) {
       $this->observacion = $observacion;
   }

   public function getMultimedia() {
       return $this->multimedia;
   }

   public function setMultimedia($multimedia) {
       $this->multimedia = $multimedia;
   }
   
   
   public function getNMatIdLibro() {
       return $this->nMatIdLibro;
   }

   public function setNMatIdLibro($nMatIdLibro) {
       $this->nMatIdLibro = $nMatIdLibro;
   }

   
   public function getTitulolib() {
       return $this->Titulolib;
   }

   public function setTitulolib($Titulolib) {
       $this->Titulolib = $Titulolib;
   }

   public function getAutlibro() {
       return $this->Autlibro;
   }

   public function setAutlibro($Autlibro) {
       $this->Autlibro = $Autlibro;
   }

   public function getEditoriallib() {
       return $this->editoriallib;
   }

   public function setEditoriallib($editoriallib) {
       $this->editoriallib = $editoriallib;
   }

   public function getEdicionlib() {
       return $this->edicionlib;
   }

   public function setEdicionlib($edicionlib) {
       $this->edicionlib = $edicionlib;
   }
   
   
   
   //AGREGADO 
   
   public function getCategorialib() {
       return $this->categorialib;
   }

   public function setCategorialib($categorialib) {
       $this->categorialib = $categorialib;
   }

   public function getResumenlib() {
       return $this->resumenlib;
   }

   public function setResumenlib($resumenlib) {
       $this->resumenlib = $resumenlib;
   }

   public function getObservacionlib() {
       return $this->observacionlib;
   }

   public function setObservacionlib($observacionlib) {
       $this->observacionlib = $observacionlib;
   }

   public function getEjemplareslib() {
       return $this->ejemplareslib;
   }

   public function setEjemplareslib($ejemplareslib) {
       $this->ejemplareslib = $ejemplareslib;
   }

     

   public function getTitulorev() {
       return $this->Titulorev;
   }

   public function setTitulorev($Titulorev) {
       $this->Titulorev = $Titulorev;
   }

   public function getEdicionrev() {
       return $this->edicionrev;
   }

   public function setEdicionrev($edicionrev) {
       $this->edicionrev = $edicionrev;
   }

   public function getNMultCodigo() {
       return $this->nMultCodigo;
   }

   public function setNMultCodigo($nMultCodigo) {
       $this->nMultCodigo = $nMultCodigo;
   }

        public function get_s_cbo_universidad() {
        $query = $this->db_biblioteca->query("CALL USP_UNIVERSIDAD");
     if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }


    
        function UniversidadCbo() {
      $query = $this->db_biblioteca->query("SELECT codinsacad,razsocinsacad FROM bdcolegio.instacademica WHERE tipoinsacad='U'");
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                $data[''] = '';
                foreach ($query->result() as $reg) {
                    $data[$reg->codinsacad] = $reg->razsocinsacad;
                }
                $result = form_dropdown("cbo_ins_mat_univer", $data,'','id="cbo_ins_mat_univer" data-placeholder="Seleccione una universidad" class="chzn-select" style="width:390px;"');
                return $result;
            }
        } else {
            return false;
        }
    }
    
    
    
    function CapituloCbo(){
        
        $query=$this->db_biblioteca->query("SELECT codcap,desccap FROM bdcolegio.capitulo");
        if(count($query)>0){
            
            
            return $query->result();
            
        }
        else{
            return false;
        }
        
    }
    
    function EspecialidadCbo(){
        
        $query=$this->db_biblioteca->query("SELECT codesp,descesp FROM bdcolegio.especialidad");
        if(count($query)>0){
            
            
            return $query->result();
            
        }
        else{
            return false;
        }
        
    }
    
    function colegiados($buscar){
        
          $query=$this->db_biblioteca->query("select regcol,concat(apecol,' ',apematcol,' ',nomcol)as value
                                                                                        from colegiado2 where apecol like '%$buscar%'");
           
            
            
                return $query;
      
    }
    
    
      public function especialidades($capitulos)
    {
        $query=$this->db_biblioteca->query("SELECT * FROM bdcolegio.especialidad WHERE codcap='$capitulos'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }
    
    
    function materialins(){
         $t='';
         $a='';
         $codigo='T00';
         $cod='T0';
         if(strlen( $this->getCapitulo())==1){
          $resultado=$codigo.$this->getCapitulo();
      
         }else{
              $resultado=$cod.$this->getCapitulo();
         
         }
         
         
         if($this->getTipomat()=='T')
             {
                   $t='T';
                     $mult='sinpdf.png';
                     $parametros = array($resultado,$this->getTitulo(),$this->getAut(),$this->getCapitulo(),$this->getEspecialidad(),$this->getUniversidad(),$this->getResumen(),$this->getObservacion(),$t,$this->getAno(),$mult);
                        $query = $this->db_biblioteca->query("CALL USP_TESIS_ADD3(?,?,?,?,?,?,?,?,?,?,?)", $parametros);
              }
  
         if($this->getTipomat2()=='L')
             {
                 $t='L';
                   $parametros = array($this->getTitulolib(),$this->getAutlibro(),$this->getEditoriallib(),$this->getEdicionlib(),$this->getCategorialib(),$this->getResumenlib(),$this->getObservacionlib(),$this->getEjemplareslib(),$t);
                    $query = $this->db_biblioteca->query("CALL USP_MATERIAL_ADD(?,?,?,?,?,?,?,?,?)", $parametros);
             }
             
             if($this->getTipomat3()=='R')
             {
                 $t='R';
                   $parametros = array($this->getTitulorev(),$this->getAutrevista(),$this->getEditorialrev(),$this->getEdicionrev(),$this->getCategoriarev(),$this->getResumenrev(),$this->getObservacionrev(),$this->getEjemplaresrev(),$t);
                    $query = $this->db_biblioteca->query("CALL USP_MATERIAL_ADD(?,?,?,?,?,?,?,?,?)", $parametros);
             }
         
       
      $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
         //UPDATE
             
                     function materialUpd() {
        $parametros = array($this->getTitulo(),$this->getAut(),$this->getCapitulo(),$this->getEspecialidad(),$this->getUniversidad(),$this->getResumen(),$this->getObservacion(),$this->getNMatId(),$this->getAno());
        $query = $this->db_biblioteca->query("CALL USP_UPD_TESIS(?,?,?,?,?,?,?,?,?)",$parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
                    
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    //////////LISTAR//////////////////7777
         
        function materialQry($parametros) { 
        $query = $this->db_biblioteca->query("CALL USP_LISTAR(?,?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }   
        
      }
      
      
      function libroQry($parametros) {   
        $query = $this->db_biblioteca->query("CALL USP_LISTAR_LIBRO(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }   
        
      }
      
      
      //////////LISTAR//////////////////
         
        function revistaQry($parametros) {      
        $query = $this->db_biblioteca->query("CALL USP_LISTAR_REVISTA(?,?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }   
        
      }
      
     function libroGet($nMatId){

             $query = $this->db_biblioteca->query("SELECT *  
                                                                                       FROM tbl_bib_matbibliografico b
                                                                                       INNER JOIN tbl_multimedia_material m ON m.nMatId = b.nMatId
                                                                                       WHERE b.nMatId=$nMatId");
        
          if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                 $this->setNMatIdLibro($row->nMatId);
                 $this->setTitulolib($row->cMatTitulo);
                 $this->setAutlibro($row->cMatAutor);
                 $this->setEditoriallib($row->cMatEditorial);
                 $this->setEdicionlib($row->cMatEdicion);
                 
                 $this->setCategorialib($row->cMatCategoria);
                 $this->setResumenlib($row->cMatResumen);
                 $this->setObservacionlib($row->cMatObservacion);
                 $this->setEjemplareslib($row->nMatEjemplares);
                  $this->setMultimedialibro($row->cMatMultimedia);
                  $this->setLibro_est($row->cMatEstadoReserva);
                  
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
    
     function libroUpd() {
        $parametros = array($this->getTitulolib(), $this->getAutlibro(),$this->getEditoriallib(),$this->getEdicionlib(),$this->getNMatIdLibro(),$this->getCategorialib(),$this->getResumenlib(),$this->getObservacionlib(),$this->getEjemplareslib());
        $query = $this->db_biblioteca->query("CALL USP_UPD_LIBRO(?,?,?,?,?,?,?,?,?)",$parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
       //Eliminar
    function libroDel(){
        $parametros= array($this->getNMatIdLibro());
        $query = $this->db_biblioteca->query("call USP_LIBRO_DEL(?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
      
  function materialGet($nMatId) {

       $query = $this->db_biblioteca->query("SELECT *,c.desccap,e.descesp,i.razsocinsacad
                                                                           FROM tbl_bib_catatesis t
                                                                           INNER JOIN bdcolegio.capitulo c ON t.codcap = c.codcap
                                                                           INNER JOIN bdcolegio.especialidad e ON t.codesp = e.codesp
                                                                           INNER JOIN bdcolegio.instacademica i ON t.codinsacad = i.codinsacad  
                                                                           INNER JOIN tbl_multimedia_tesis m ON m.nMatId = t.nMatId
                                                                           WHERE t.nMatId=$nMatId");
          if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                 $this->setNMatId($row->nMatId);        
                $this->setCapitulo($row->codcap);
             $this->setCapituloDescripcion($row->desccap);
             $this->setEspecialidadDescripcion($row->descesp);
              $this->setTitulo($row->cMatTitulo);
              $this->setAut($row->cMatAutor);
              $this->setEspecialidad($row->codesp);
              $this->setUniversidad($row->codinsacad);
              $this->setUniversidadDescripcion($row->razsocinsacad);
              $this->setAno($row->cMataño);
              $this->setResumen($row->cMatResumen);
              $this->setObservacion($row->cMatObservacion);
              $this->setMultimedia($row->cMatMultimedia);
               $this->setMultlink($row->cMatLink);
              $this->setEstado_mat($row->cMatEstadoReserva);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
        function materialUpload() {
        $parametros = array($this->getNMatId(),$this->getMultimedia());
        $query = $this->db_biblioteca->query("CALL USP_UPLOAD_TESIS(?,?)", $parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }  
    
         function material_multpdfAbstract() {
        $parametros = array($this->getNMatId(),$this->getMultimedia());
        $query = $this->db_biblioteca->query("CALL USP_UPLOAD_ABSTRACT(?,?)", $parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
    
       function material_multpdf() {
           
                    
                    
         $parametros = array($this->getMultimedia());
        $query = $this->db_biblioteca->query("CALL MATERIAL_MULTIMEDIAPDF(?)", $parametros);
      $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
    
           function libroUpload() {
        $parametros = array($this->getNMatIdLibro(),$this->getMultimedialibro());
        $query = $this->db_biblioteca->query("CALL USP_UPLOAD_MATERIAL(?,?)", $parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
    
          function libroinsUpload() {
        $parametros = array($this->getMultimedialibro());
        $query = $this->db_biblioteca->query("CALL USP_UPLOAD_MAT(?)", $parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
    
    
     function revistaMultimediaqry($nMatId) {
        $query = $this->db_biblioteca->query("CALL USP_GEN_REVISTA_MULTIMEDIA(?)",$nMatId);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    
           function revistaUpload() {
        $parametros = array($this->getNMatIdRevista(),$this->getMultimediarev());
        $query = $this->db_biblioteca->query("CALL USP_UPLOAD_MATERIAL1(?,?)", $parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
    
         function revistainsUpload() {
        $parametros = array($this->getMultimediarev());
        $query = $this->db_biblioteca->query("CALL USP_UPLOAD_MAT(?)", $parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    } 
    
    
    
    /////////REVISTA///////////
function revistaGet($nMatId){
        $query = $this->db_biblioteca->query("SELECT *  FROM tbl_bib_matbibliografico where nMatId = ? ", array($nMatId));

          if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                 $this->setNMatIdRevista($row->nMatId);
                 $this->setTitulorev($row->cMatTitulo);
                 $this->setAutrevista($row->cMatAutor);
                 $this->setEditorialrev($row->cMatEditorial);
                 $this->setEdicionrev($row->cMatEdicion);
                 
                 $this->setCategoriarev($row->cMatCategoria);
                 $this->setResumenrev($row->cMatResumen);
                 $this->setObservacionrev($row->cMatObservacion);
                 $this->setEjemplaresrev($row->nMatEjemplares);
          

                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
        function revistaUpd() {
        $parametros = array($this->getTitulolib(), $this->getAutlibro(),$this->getEditoriallib(),$this->getEdicionlib(),$this->getNMatIdLibro(),$this->getCategorialib(),$this->getResumenlib(),$this->getObservacionlib(),$this->getEjemplareslib());
        $query = $this->db_biblioteca->query("CALL USP_UPD_REVISTA(?,?,?,?,?,?,?,?,?)",$parametros);
        $this->db_biblioteca->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
    function revistaDel(){
        $parametros= array($this->getNMatIdRevista());
        $query = $this->db_biblioteca->query("call USP_REVISTA_DEL(?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
       function tesisDel(){
        $parametros= array($this->getNMatId());
        $query = $this->db_biblioteca->query("call USP_TESIS_DEL(?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
    
    function MultimediaDel() {
        $parametros = array($this->getNMultCodigo());
        $query = $this->db_biblioteca->query("CALL USP_GEN_D_MULTIMEDIA_REVISTA_ELIMINAR (?)",$parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
            function MaterialMultimediaqry($nMatId) {
        $query = $this->db_biblioteca->query("CALL USP_GEN_S_MULTIMEDIA_MATERIAL(?)",$nMatId);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    
         function SinMultimediaqry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_LISTAR_SINMULTIMEDIA");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
           function SinMultimedialibqry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_LISTAR_SINMULTIMEDIA_LIBRO ");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
           function SinMultimediarevqry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_LISTAR_SINMULTIMEDIA_REVISTA");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
}

?>
