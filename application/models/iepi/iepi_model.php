<?php

class Iepi_model extends CI_Controller {
    // Parametros secuendarios Procedimiento
    private $tipo = '';
    private $lecol = '';
    private $nombre = '';
    private $ApellidoP = '';
    private $ApellidoM = '';
    private $telcol = '';
    private $email = '';
    private $evento = '';
    private $observacion = '';
    private $celcol = '';
    private $nEveId = '';
    private $admin = '';
    private $nInscripcionId = '';
    private $cInscripcionAsistencia = '';
    private $nInscripcionPago = '';
    private $cInscripcionTipoComprobante = '';
    private $nPerId;
    private $nota;
    private $descripcionCurso;
    private $tipoCertificado;
    
    function getTipoCertificado() {
        return $this->tipoCertificado;
    }

    function setTipoCertificado($tipoCertificado) {
        $this->tipoCertificado = $tipoCertificado;
    }

        
    
    
    function getDescripcionCurso() {
        return $this->descripcionCurso;
    }

    function setDescripcionCurso($descripcionCurso) {
        $this->descripcionCurso = $descripcionCurso;
    }

 
    
    function getNota() {
        return $this->nota;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

        
    function getNPerId() {
        return $this->nPerId;
    }

    function setNPerId($nPerId) {
        $this->nPerId = $nPerId;
    }

    
    function getCInscripcionTipoComprobante() {
        return $this->cInscripcionTipoComprobante;
    }

    function setCInscripcionTipoComprobante($cInscripcionTipoComprobante) {
        $this->cInscripcionTipoComprobante = $cInscripcionTipoComprobante;
    }

    function getNInscripcionPago() {
        return $this->nInscripcionPago;
    }

    function setNInscripcionPago($nInscripcionPago) {
        $this->nInscripcionPago = $nInscripcionPago;
    }

    function getCInscripcionAsistencia() {
        return $this->cInscripcionAsistencia;
    }

    function setCInscripcionAsistencia($cInscripcionAsistencia) {
        $this->cInscripcionAsistencia = $cInscripcionAsistencia;
    }

    function getNInscripcionId() {
        return $this->nInscripcionId;
    }

    function setNInscripcionId($nInscripcionId) {
        $this->nInscripcionId = $nInscripcionId;
    }

    function getadmin() {
        return $this->admin;
    }

    function setadmin($admin) {
        $this->admin = $admin;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getLecol() {
        return $this->lecol;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidoP() {
        return $this->ApellidoP;
    }

    function getApellidoM() {
        return $this->ApellidoM;
    }

    function getTelcol() {
        return $this->telcol;
    }

    function getEmail() {
        return $this->email;
    }

    function getEvento() {
        return $this->evento;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getCelcol() {
        return $this->celcol;
    }

    function getNEveId() {
        return $this->nEveId;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setLecol($lecol) {
        $this->lecol = $lecol;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidoP($ApellidoP) {
        $this->ApellidoP = $ApellidoP;
    }

    function setApellidoM($ApellidoM) {
        $this->ApellidoM = $ApellidoM;
    }

    function setTelcol($telcol) {
        $this->telcol = $telcol;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEvento($evento) {
        $this->evento = $evento;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setCelcol($celcol) {
        $this->celcol = $celcol;
    }

    function setNEveId($nEveId) {
        $this->nEveId = $nEveId;
    }

    public function __construct() {
        parent::__construct();
        $this->colegiado = $this->load->database('db_colegiado', TRUE);
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
    }
    function get_persona_existe($valor, $evento) {
        $query=$this->db->query("select * from persona_detalle where cPdeValor=?",$valor);
        if($query->num_rows()>0){
            $persona=$query->row();
            $nPerId=$persona->nPerId;
             $parametros = array($nPerId, $evento);
            $fila = $this->db->query("select * from iepi where nPerId=? and nCurId=? and nIepiEstado=1", $parametros);
            if ($fila->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
        
        
    }
    function IepiIns() {
        $parametros = array(
            $this->getTipo(),
            $this->getlecol(),
            $this->getNombre(),
            $this->getApellidoP(),
            $this->getApellidoM(),
            $this->getTelcol(),
            $this->getEmail(),
            $this->getNEveId(),
            $this->getCelcol(),
            $this->getNPerId(),
            $this->getNota()
        );
       // $query=true;
        $query = $this->db->query("CALL USP_INS_IEPI (?,?,?,?,?,?,?,?,?,?,?)", $parametros);
              
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
        
    }
    function getTipoCurso($curso){
        $query=$this->db->query("select cCurTipo from curso where nCurId=?",$curso);
        if($query->num_rows()>0){
            $row=$query->row();
            $tipo=$row->cCurTipo;
             return $tipo;
        }
        else {
            return "";
        }
            
        
        
    }
    private $alumno;
    private $nombreCurso;
    private $fechaInicio;
    private $fechaFin;
    private $docente;
    private $horas;
    private $dni;
    
    function getDni() {
        return $this->dni;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

        
    function getAlumno() {
        return $this->alumno;
    }

    function getNombreCurso() {
        return $this->nombreCurso;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getDocente() {
        return $this->docente;
    }

    function getHoras() {
        return $this->horas;
    }

    function setAlumno($alumno) {
        $this->alumno = $alumno;
    }

    function setNombreCurso($nombreCurso) {
        $this->nombreCurso = $nombreCurso;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setDocente($docente) {
        $this->docente = $docente;
    }

    function setHoras($horas) {
        $this->horas = $horas;
    }
    function certificadoDipIns($nPerId,$modulo,$codigoqr,$md5,$image,$pdf){
        
              $parametros=array($nPerId,$modulo,$codigoqr,$md5,$image,$pdf);
              $busqueda=array($nPerId,$modulo);
             $query=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda) ;
             if($query->num_rows()>0){
                 $this->db->query("update certificados_diplomados set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda);
             }else{
                 $this->db->query("insert into certificados_diplomados values(NuLL,?,?,now(),?,?,?,?,'iepi')",$parametros);
             }
        
     }
   
    function certificadoCurIns($nPerId,$nEspecialidadId,$codigoqr,$md5,$image,$pdf,$tipo){
        

        if($tipo==1){
              $parametros=array($nPerId,$nEspecialidadId,$codigoqr,$md5,$image,$pdf);
              $busqueda=array($nPerId,$nEspecialidadId);
             $query=$this->db->query("select * from certificados_cursos where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda) ;
             if($query->num_rows()>0){
                 $this->db->query("update certificados_cursos set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda);
             }else{
                 $this->db->query("insert into certificados_cursos values(NuLL,?,?,now(),?,?,?,?,'iepi')",$parametros);
             }
  
         }else if($tipo==2){
             $concepto=array($nEspecialidadId);
             $queryConcepto=$this->db->query("select * from concepto_diplomado where nCurId=? and cConDipTitulo='' and cConDipSumilla=''",$concepto);
             if($queryConcepto->num_rows()>0){
                
                     $row=$queryConcepto->row();
                     $ultimo=$row->nConDipId;
                      $parametros=array($nPerId,$ultimo,$codigoqr,$md5,$image,$pdf);
                      $busqueda=array($nPerId,$ultimo);
                      $queryevaluacion=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda) ;
                      if($queryevaluacion->num_rows()>0){
        
                            $this->db->query("update certificados_diplomados set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda);
                      }else{
              
                             $this->db->query("insert into certificados_diplomados values(NuLL,?,?,now(),?,?,?,?,'iepi')",$parametros);
                      }
                 }
             
             else{
                 
                $queryDip=$this->db->query("INSERT INTO concepto_diplomado (nConDipId,cConDipTitulo,cConDipSumilla,nCurId) VALUES (NULL ,'','',?)",$concepto);
                if($queryDip){
                 $queryMax=$this->db->query("select max(nConDipId) as ultimo from concepto_diplomado");
                 if($queryMax->num_rows()>0){
                     $row=$queryMax->row();
                     $ultimo=$row->ultimo;
                      $parametros=array($nPerId,$ultimo,$codigoqr,$md5,$image,$pdf);
                      $busqueda=array($nPerId,$ultimo);
                      $query6=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda) ;
                      if($query6->num_rows()>0){
                            $this->db->query("update certificados_diplomados set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi'",$busqueda);
                      }else{
                             $this->db->query("insert into certificados_diplomados values(NuLL,?,?,now(),?,?,?,?,'iepi')",$parametros);
                      }
                 }
             }
             
                
             }

         }
   
        
    }
     function iepiEmitir($nPerId,$nCurId){
        //var_dump($nPerId,$nCurId);
        $parametros=array($nCurId,$nPerId);
        $query=$this->db->query("select * from iepi where nCurId=? and nPerId =?",$parametros);
        $row=$query->row();
        $emisiones=$row->emisionCertificado;
        $emisiones=$emisiones+1;
        
        $parametros=array($emisiones,$nCurId,$nPerId);
        $this->db->query("update iepi set emisionCertificado=? where nCurId=? and nPerId =?",$parametros);
    }
   
    
    function getDatosCertificado($nPerId,$curso){
            $parametros=array($curso,$nPerId);
            $query=$this->db->query("SET lc_time_names = 'es_AR';");
        $query=$this->db->query("SELECT m.nPerId, upper(CONCAT(p.cPerNombres,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno )) AS Nombre, 
            pd.cPdeValor AS dni, m.nCurId AS CursoId, c.cCurTipo AS TipoCurso, c.cCurNombre AS Nombrecurso,
            c.cCurDescripcion,concat(day(d.cFechaInicio),' de ',monthname(d.cFechaInicio)) as fechainicio,concat(day(d.cFechaFin),' de ',monthname(d.cFechaFin)) as fechafin,d.cHoras,d.nPerId as docenteId,
            upper(CONCAT( p1.cPerNombres,' ',p1.cPerApellidoPaterno,' ', p1.cPerApellidoMaterno)) AS NombreDocente,m.emisionCertificado,m.nIepiNota,year(d.cFechaFin) as cFechaFin,year(d.CFechaInicio)as cFechaInicio FROM iepi AS m
        INNER JOIN persona AS p ON m.nPerId = p.nPerId
        INNER JOIN persona_detalle AS pd ON p.nPerId = pd.nPerId AND pd.nParId =1
        AND pd.nPcaId =1
        inner join curso_detalle_iepi as d on m.nCurId=d.nCurId
        INNER JOIN curso AS c ON m.nCurId = c.nCurId
        left join persona as p1 on d.nPerId=p1.nPerId
        WHERE m.nCurId =? and m.nPerId=? AND m.nIepiEstado =1 limit 1",$parametros);
        
        if($query->num_rows()>0){
            $row=$query->row();
            $this->setNPerId($row->nPerId);
            $this->setDni($row->dni);
            $this->setAlumno($row->Nombre);
            $this->setNombreCurso($row->Nombrecurso);
            $this->setDescripcionCurso($row->cCurDescripcion);
            
            
            if($row->cFechaFin==$row->cFechaInicio){
                  $inicio= $row->fechainicio;
               $fin= $row->fechafin." del ".$row->cFechaFin;
            }
            else {
                 $inicio= $row->fechainicio." del ".$row->cFechaInicio;
                  $fin= $row->fechafin." del ".$row->cFechaFin;
            }
                
            
            $this->setFechaInicio($inicio);
            $this->setFechaFin($fin);
            
            
            
            $this->setDocente($row->NombreDocente);
            $this->setHoras($row->cHoras);
            $this->setNota($row->nIepiNota);
         
            
            return true;
        }
        else {
            return false;
        }
                     
       
    }
    function getModulosDiplomado($curso){
         $query=$this->db->query("select * from concepto_diplomado where nCurId=? and cConDipTitulo<>''",$curso);
         if($query->num_rows()>0){
             return $query->result();
         }
         else {
             return "";
         }
    }

    function listar_inscripciones($evento) {
       
        $query = $this->db->query("SELECT m.nPerId, upper(CONCAT(p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno,' ', p.cPerNombres )) AS Nombre, pd.cPdeValor AS dni, m.nCurId AS CursoId, c.cCurTipo AS TipoCurso, c.cCurNombre AS Nombrecurso, m.emisionCertificado,m.nIepiNota FROM iepi AS m
INNER JOIN persona AS p ON m.nPerId = p.nPerId
INNER JOIN persona_detalle AS pd ON p.nPerId = pd.nPerId AND pd.nParId =1
AND pd.nPcaId =1
INNER JOIN curso AS c ON m.nCurId = c.nCurId
WHERE m.nCurId =? AND m.nIepiEstado =1",$evento);
        
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    function get_combo_cursos() {
        $query = $this->db->query("select * from curso where nCurEstado<>0 and (cCurTipo='CURSO-IEPI' or cCurTipo='DIPLOMADO-IEPI' )");
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                foreach ($query->result() as $reg) {
                    $data[$reg->nCurId] = $reg->cCurNombre;
                }
               $result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" class="chzn-select" style="width:300px" required="required"');
                //$result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" style="width:auto" required="required"');
                return $result;
            }
        } else {
            return false;
        }
    }
    function listar_ComboCurso() {
        $query = $this->db->query("select * from curso where nCurEstado<>0 and cCurTipo='CURSO-IEPI'");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    function listar_ComboDiplomado() {
        $query = $this->db->query("select * from curso where nCurEstado<>0 and cCurTipo='DIPLOMADO-IEPI' ");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }


    function InscripcionDel($curso,$nPerId) {
        $parametros = array($nPerId,$curso);
        $query = $this->db->query("update iepi set nIepiEstado=0 where nPerId=? and nCurId=? ", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
 
   
     function get_persona_dni($valor) {
        if ($valor != null) {
            $parametros = array($valor);
            
            $queryExt = $this->db->query("select p.nPerId,pdd.cPdeValor lecol,pdc.cPdeValor correo, concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as datos from persona p left join
persona_detalle pdc on p.nPerId =pdc.nPerId and pdc.nParId=1 and pdc.nPcaId=4 
left join
persona_detalle pdd on p.nPerId =pdd.nPerId and pdd.nParId=1 and pdd.nPcaId=1
where pdd.cPdeValor=? and pdd.bPdeEliminado=0 and pdc.bPdeEliminado=0 and p.bPerEstado=0;", $parametros);
         
                    if ($queryExt) {
                        if ($queryExt->num_rows() > 0) {
                            $fila = $queryExt->row();
                            $this->setTipo('2');
                            return $fila;
                        }
                    }
                    else {
                        $this->setTipo('3');
                    }
                
            } 
        
        return false;
    }
      function getPersona($valor) {
        if ($valor != null) {
                   
            $query = $this->db->query("select pdd.cPdeValor as dni,upper(concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno)) as datos from persona p left join
persona_detalle pdd on p.nPerId =pdd.nPerId and pdd.nParId=1 and pdd.nPcaId=1
where p.nPerId=? and p.bPerEstado=0", $valor);
         
                    if ($query) {
                        if ($query->num_rows() > 0) {
                           return $query->row();
                          
                           
                        }
                    }
                                 
            } 
        
        return false;
    }
    function getModulo($idmodulo){
       
         $query = $this->db->query("select * from concepto_diplomado where nConDipId=?",$idmodulo);
        if ($query->num_rows() > 0) {
            
            return $query->row();
        } else {
            return false;
        }
    }
    private $idcurso;
    private $nombrecurso;
    function getIdcurso() {
        return $this->idcurso;
    }

    function setIdcurso($idcurso) {
        $this->idcurso = $idcurso;
    }

        
    
    
    function cursoGet($idCurso) {
        $query = $this->db->query("select * from curso where nCurId = ?", array($idCurso));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //Objeto
            $this->setIdCurso($row->nCurId);
            $this->setNombreCurso($row->cCurNombre);
           
            return true;
        } else {
            return false;
        }
    }
    function getDiplomadoIepi($diplomado){
     //modifique lo de aqui    
        $parametros=array($diplomado);
        $query=$this->db->query("SET lc_time_names = 'es_AR';");
        $query=$this->db->query("select c.nCurId AS CursoId, c.cCurTipo AS TipoCurso, c.cCurNombre AS Nombrecurso,
            c.cCurDescripcion,concat(day(d.cFechaInicio),' de ',monthname(d.cFechaInicio)) as fechainicio,
            concat(day(d.cFechaFin),' de ',monthname(d.cFechaFin)) as fechafin,d.cHoras ,d.nPerId,  
            year(d.cFechaFin) as cFechaFin, year(d.cFechaInicio) as cFechaInicio from curso as c inner join curso_detalle_iepi as d on c.nCurId=d.nCurId where c.nCurId=?",$parametros);
         if($query->num_rows()>0){
                

                return $query->row();
            }
            else {
            return false;
        }
    }
     function getCorrelativo($nPerId,$curso){
       $busqueda=array($nPerId,$curso);
       $query=$this->db->query("select * from certificados_cursos where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi' limit 1",$busqueda) ;
       if($query->num_rows()>0){
           $reg=$query->row();
           return $reg->codcertificados;
           //  $query1=$this->db->query("update certificados_cursos set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='evento'");
       }else{
           $query1=$this->db->query("select max(codcertificados) as correlativo from certificados_cursos");
           $reg=$query1->row();
           if($reg->correlativo==NULL){
               return 1;
           }else {
                return $reg->correlativo+1;
           }    
          
         }
        
        
        
    }

    function obtenerModuloxDiploma($curso){
        $concepto=array($curso);
        $queryConcepto=$this->db->query("select * from concepto_diplomado where nCurId=? and cConDipTitulo='' and cConDipSumilla=''",$concepto);
        if($queryConcepto->num_rows()>0){
            $row=$queryConcepto->row();
            return $row->nConDipId;
        } else{
             return -1 ; 
        }
        
    }



      function getCorrelativoDiplomado($nPerId,$curso){
        $curso=$this->obtenerModuloxDiploma($curso);
       $busqueda=array($nPerId,$curso);
       $query=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='iepi' limit 1",$busqueda) ;
       if($query->num_rows()>0){
           $reg=$query->row();
           return $reg->codcertificados;
           //  $query1=$this->db->query("update certificados_cursos set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='evento'");
       }else{
           $query1=$this->db->query("select max(codcertificados) as correlativo from certificados_diplomados");
           $reg=$query1->row();
           if($reg->correlativo==NULL){
               return 1;
           }else {
                return $reg->correlativo+1;
           }    
          
         }
        
        
        
    }
        function notasUpd($nPerId,$curso,$nota){
        $parametros=array($nota,$nPerId,$curso);
        $query=$this->db->query("update iepi set nIepiNota=? where nPerId=? and nCurId=?",$parametros);
        if($query){
            return 1;
        }
        else {
            return 0;
        }
    }
   
}
