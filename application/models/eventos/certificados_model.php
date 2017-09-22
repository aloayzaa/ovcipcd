<?php

class Certificados_model extends CI_Model {

    function __construct() {
       parent::__construct();
        $this->load->database();
        $this->colegiado=$this->load->database('db_colegiado',TRUE);
        //$this->evento=$this->load->database('evento',TRUE); 
    }
    function listar_certificados($evento){
        $query=$this->db->query("select * from evento where nEveId=?",$evento);
        $cuenta=$query->row();
        $cuenta_ing=$cuenta->cEveCuentaIngreso;
        if($cuenta_ing!=NULL){
        
                $query=$this->colegiado->query("select * from cuenta_ing where codctaing=?",$cuenta_ing);
                $monto=$query->row();
                $monto_evento=$monto->valorctaing;


                $query=$this->db->query("select i.nInscripcionId CODIGO, i.cInscripcionDni DNI ,
        concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as NOMBRES,cInscripcionFechaRegistro FECHA_DE_REGISTRO,nInscripcionPago PAGO ,cInscripcionComprobante COMPROBANTE,
        cInscripcionTipoComprobante TIPO_DE_COMPROBANTE,cInscripcionCuentaIngreso CUENTA_DE_INGRESO,cInscripcionAsistencia ASISTENCIA,cInscripcionObservacion OBSERVACION 
        ,$monto_evento as monto_evento ,i.ctipoCertificado, i.cemisionCertificado from inscripcion i inner join 
        persona_detalle pd on i.cInscripcionDni=pd.cPdeValor  
        inner join persona p on pd.nPerId=p.nPerId where pd.nParId=1 and pd.nPcaId=1 and i.cInscripcionEstado=1 and  i.nInscripcionEveId =?
                AND i.cInscripcionAsistencia = 'Si' ",$evento);
                if($query){
                    if($query->num_rows()>0){
                        return $query->result_array();
                    }
                    else{
                        return null;
                    }  
                } 
        }
        else {
            $query=$this->db->query("select i.nInscripcionId CODIGO, i.cInscripcionDni DNI ,
        concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as NOMBRES,cInscripcionFechaRegistro FECHA_DE_REGISTRO,'-' PAGO ,'-' COMPROBANTE,
        '-' TIPO_DE_COMPROBANTE,'-' CUENTA_DE_INGRESO,cInscripcionAsistencia ASISTENCIA,cInscripcionObservacion OBSERVACION 
        ,'-' as monto_evento,i.cemisionCertificado from inscripcion i inner join 
        persona_detalle pd on i.cInscripcionDni=pd.cPdeValor  
        inner join persona p on pd.nPerId=p.nPerId where pd.nParId=1 and pd.nPcaId=1 and i.cInscripcionEstado=1 and  i.nInscripcionEveId =?
                AND i.cInscripcionAsistencia = 'Si' ",$evento);
                if($query){
                    if($query->num_rows()>0){
                        return $query->result_array();
                    }
                    else{
                        return null;
                    }  
                }
        }
        
        
        
    }
     function getDatosCertificado($inscripcion){
         
        $this->db->query("SET lc_time_names = 'es_AR';");
        $query=$this->db->query("SELECT i.nInscripcionId CODIGO, i.cInscripcionDni DNI,UPPER(CONCAT(p.cPerNombres,' ',p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno)) AS NOMBRES, 
            cInscripcionFechaRegistro FECHA_DE_REGISTRO, nInscripcionPago PAGO, 
            cInscripcionComprobante COMPROBANTE, cInscripcionTipoComprobante TIPO_DE_COMPROBANTE, cInscripcionCuentaIngreso CUENTA_DE_INGRESO, cInscripcionAsistencia ASISTENCIA, cInscripcionObservacion OBSERVACION, 
            evento.cEveTitulo AS titulo, evento.nEveId ,p.nPerId,i.ctipoCertificado,
         concat(day(evento.cFechaEven),' de ',monthname(evento.cFechaEven),', ',year(evento.cFechaEven))
 AS fecha_evento, evento.Horas,evento.nEveTipoEvento
FROM inscripcion i
INNER JOIN persona_detalle pd ON i.cInscripcionDni = pd.cPdeValor
INNER JOIN persona p ON pd.nPerId = p.nPerId
INNER JOIN evento ON evento.nEveId = i.nInscripcionEveId
WHERE pd.nParId =1
AND pd.nPcaId =1
AND i.cInscripcionEstado =1
AND i.nInscripcionId =?
AND i.cInscripcionAsistencia =  'Si'",$inscripcion);
        if($query){
            if($query->num_rows()>0){
                return $query->row();
            }
            else{
                return null;
            }
        }
    }
    function certificadoIns($nPerId,$nEspecialidadId,$codigoqr,$md5,$image,$pdf){
        $parametros=array($nPerId,$nEspecialidadId,$codigoqr,$md5,$image,$pdf);
        $busqueda=array($nPerId,$nEspecialidadId);
                $param_update=array($codigoqr,$md5,$nPerId,$nEspecialidadId);
         $query=$this->db->query("select * from certificados_cursos where nPerId=? and nEspecialidadId=? and cTipoCertificado='evento'",$busqueda) ;
             if($query->num_rows()>0){
                 echo "va a modificarrr";
                 $query1=$this->db->query("update certificados_cursos set fecha_emision=now(),codigoqr=?,codmd5=? where nPerId=? and nEspecialidadId=? and cTipoCertificado='evento'",$param_update);
                 echo $query1;
                 
             }else{
                 $query1=$this->db->query("insert into certificados_cursos values(NuLL,?,?,now(),?,?,?,?,'evento')",$parametros);
             }
      
        if($query&&$query1){
            return true;
        }
        else {
            return false;
        }
    }
   
    function inscripcionEmitir($dni,$evento){
        $parametros=array($dni,$evento);
        $query=$this->db->query("select * from inscripcion where cInscripcionDni=? and nInscripcionEveId =?",$parametros);
        $row=$query->row();
        $emisiones=$row->cemisionCertificado;
        $emisiones=$emisiones+1;
        $parametros=array($emisiones,$dni,$evento);
        $this->db->query("update inscripcion set cemisionCertificado=? where cInscripcionDni=? and nInscripcionEveId =?",$parametros);
        //$this->db->query("update inscripcion set cemisionCertificado='Si' where cInscripcionDni=? and nInscripcionEveId =?",$parametros);
    }
    function getCapitulo($tipo){
            $query=$this->colegiado->query("select * from capitulo where codcap=?",$tipo);
            if($query){
                if($query->num_rows()>0){
                    $row=$query->row();
                    $capitulo=$row->desccap;
                    return $capitulo;
                }
            }
            else {
                return 0;
            }
            
    }
    function getTipoEvento($evento){
        $query=$this->db->query("select * from evento where nEveId=?",$evento);
        $tipo=$query->row();
        $tipoevento=$tipo->nEveTipoEvento;
         return $tipoevento;
        
    }
    function getCorrelativo($nPerId,$correlativo){
       $busqueda=array($nPerId,$correlativo);
       $query=$this->db->query("select * from certificados_cursos where nPerId=? and nEspecialidadId=? and cTipoCertificado='evento' limit 1",$busqueda) ;
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
 
  function verificarcolegiado($nPerId){
         $query=$this->db->query("SELECT * FROM persona_detalle WHERE nParId=2 and nPcaId=15 and nPerId=?",$nPerId) ;
       if($query->num_rows()>0){
           return $query->num_rows();
         }else{
             return 0;
          
         }
    }

}

