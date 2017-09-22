<?php

class Certificados_model extends CI_Model {

    function __construct() {
       parent::__construct();
        $this->load->database();
        $this->colegiado=$this->load->database('db_colegiado',TRUE);
        $this->db=$this->load->database('bdcampusvirtual',TRUE);
        //$this->evento=$this->load->database('evento',TRUE); 
    }
     function listar_ComboCurso() {
        $query = $this->db->query("select * from curso where nCurEstado<>0 and cCurTipo='CURSO'");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
     function listar_ComboDiplomado() {
        $query = $this->db->query("select * from curso where nCurEstado<>0 and cCurTipo='DIPLOMADO'");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    function get_combo_cursos($tipocurso) {
        $query = $this->db->query("select * from curso where nCurEstado=1 and cCurTipo=?",$tipocurso);
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                $data['0']="Seleccione un Curso";
                foreach ($query->result() as $reg) {
                    $data[$reg->nCurId] = mb_convert_encoding($reg->cCurNombre, 'UTF-8');
                }
               $result=form_dropdown("cbo_curso_listar", $data,'','id="cbo_curso_listar" onchange="listarHorario()" class="chzn-select" style="width:auto" required="required"');
                //$result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" style="width:auto" required="required"');
                return $result;
            }
        } else {
            return false;
        }
    }
    function get_combo_horario($curso) {
        $query = $this->db->query("select nHorId,concat(cHorDia,' ',cHorHoraInicio,'-',cHorFechaFin,' ',cHorAmbiente)as nombre from horario where nCurId=? ORDER BY cHorFechaFin DESC",$curso);
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                 $data['0']="Seleccione un Horario";
                foreach ($query->result() as $reg) {
                    $data[$reg->nHorId] = mb_convert_encoding($reg->nombre, 'UTF-8');
                }
               $result=form_dropdown("cbo_horario_listar", $data,'','id="cbo_horario_listar" class="chzn-select" style="width:auto" required="required"');
                //$result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" style="width:auto" required="required"');
                return $result;
            }
        } else {
            return false;
        }
    }
    function get_combo_horario_dip($curso) {
        $query = $this->db->query("select nHorId,concat(cHorDia,' ',cHorHoraInicio,'-',cHorFechaFin,' ',cHorAmbiente)as nombre from horario where nCurId=? ORDER BY cHorFechaFin DESC  limit 10",$curso);
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                 $data['0']="Seleccione un Horario";
                foreach ($query->result() as $reg) {
                    $data[$reg->nHorId] = mb_convert_encoding($reg->nombre, 'UTF-8');
                }
               $result=form_dropdown("cbo_horario_listar_dip", $data,'','id="cbo_horario_listar_dip" class="chzn-select" style="width:auto" required="required"');
                //$result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" style="width:auto" required="required"');
                return $result;
            }
        } else {
            return false;
        }
    }
    function listar_certificados($horario){
        $query=$this->db->query("select tmp2.nPerId,tmp2.Nombre,tmp2.CursoId,tmp2.Costo,tmp2.NombreCurso,tmp2.Montoapagar,
tmp2.horarioId,tmp2.montopagado,  ROUND(round(AVG(n.cNotValor),1)) AS Promedio,tmp2.horarioId,tmp2.cHorFechaInicio,tmp2.cHorFechaFin,tmp2.emisionCertificado
from (select tmp.nPerId,tmp.Nombre,tmp.CursoId,tmp.Costo,tmp.TipoCurso,tmp.NombreCurso,
tmp.Descuento,tmp.Des,if(tmp.Des=1,tmp.Costo-(tmp.Costo*tmp.Descuento/100),tmp.Costo)as
Montoapagar, tmp.horarioId,tmp.montopagado,tmp.cHorFechaInicio,tmp.cHorFechaFin,tmp.emisionCertificado from 
(SELECT m.nPerId, CONCAT( p.cPerNombres,' ', p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno ) AS Nombre, pd.cPdeValor AS dni, h.nCurId AS CursoId, h.nHorCosto AS Costo, c.cCurTipo AS TipoCurso, c.cCurNombre AS Nombrecurso, IF( m.nMatDescuento =1, h.nHorDescuento, 0 ) AS Descuento, m.nMatDescuento AS Des,m.nHorId as horarioId,sum(pag.nPagAcuenta) as montopagado
,h.cHorFechaInicio,h.cHorFechaFin,m.emisionCertificado FROM matricula AS m
INNER JOIN persona AS p ON m.nPerId = p.nPerId
INNER JOIN persona_detalle AS pd ON p.nPerId = pd.nPerId AND pd.nParId =1
AND pd.nPcaId =1
INNER JOIN horario AS h ON m.nHorId = h.nHorId
INNER JOIN curso AS c ON h.nCurId = c.nCurId
INNER JOIN pago as pag on m.nPerId=pag.nPerId and m.nHorId=pag.nHorId
WHERE m.nHorId =? AND m.nMatEstado =1 AND nMatTipo =1 
group by pag.nPerId, pag.nHorId)tmp )tmp2 
INNER JOIN sesion AS s ON s.nHorId = tmp2.horarioId
INNER JOIN nota AS n ON n.nPerId = tmp2.nPerId AND n.nSesId = s.nSesId where s.nSesEstado = 1 GROUP BY tmp2.nPerId",$horario);
      if($query->num_rows()>0){
         return $query->result_array();
      }
      else {
         return  null;    
      }
     
    }
     function getDatosCertificado($nPerId,$horario){
        $parametros=array($nPerId,$horario);        
        $query=$this->db->query("SET lc_time_names = 'es_AR';");
        $query=$this->db->query("SELECT m.nPerId, upper(CONCAT( p.cPerNombres,  ' ', p.cPerApellidoPaterno,  ' ', p.cPerApellidoMaterno )) AS Nombre, pd.cPdeValor AS dni, h.nCurId AS CursoId, h.nHorCosto AS Costo, c.cCurTipo AS TipoCurso, c.cCurNombre AS Nombrecurso, IF( m.nMatDescuento =1, h.nHorDescuento, 0 ) AS Descuento,
            m.nMatDescuento AS Des,concat(day(h.cHorFechaInicio),' de ',monthname(h.cHorFechaInicio)) as fechaini,
            concat(day(h.cHorFechaFin),' de ',monthname(h.cHorFechaFin)) as fechafin,
            year(h.cHorFechaFin) as cHorFechaFin,year(h.cHorFechaInicio) as cHorFechaInicio,
            c.cCurDescripcion as descripcionCurso
FROM matricula AS m
INNER JOIN persona AS p ON m.nPerId = p.nPerId
INNER JOIN persona_detalle AS pd ON p.nPerId = pd.nPerId
AND pd.nParId =1
AND pd.nPcaId =1
INNER JOIN horario AS h ON m.nHorId = h.nHorId
INNER JOIN curso AS c ON h.nCurId = c.nCurId
WHERE m.nPerId =? and m.nHorId=?
AND m.nMatEstado =1
AND nMatTipo =1",$parametros);
        if($query){
            if($query->num_rows()>0){
                return $query->row();
            }
            else{
                return null;
            }
        }
    }
    function getDatosDocente($horario){
        $query=$this->db->query("SELECT h.nPerId, upper(CONCAT( p.cPerNombres,' ',p.cPerApellidoPaterno,' ', p.cPerApellidoMaterno )) AS Nombre
FROM horario AS h
INNER JOIN persona AS p ON h.nPerId = p.nPerId
INNER JOIN persona_detalle AS pd ON p.nPerId = pd.nPerId
AND pd.nParId =1
AND pd.nPcaId =1
WHERE h.nHorId=?",$horario);
        //$row=$query->row();
        //$nombre=$row->Nombre;
        
        return $query->row();
    }
    /*function getDatosPromedio($nPerId,$Horario){
        $parametros=array($nPerId,$Horario);
        $query=$this->db->query("SELECT n.nPerId,h.nHorId AS Horario,
	   c.cCurNombre AS Curso,
	   CONCAT(h.cHorFechaInicio,'-',h.cHorFechaFin) AS Fechas,
	   round(AVG(n.cNotValor),0) AS Promedio
FROM matricula AS m
INNER JOIN horario AS h ON m.nHorId = h.nHorId
INNER JOIN curso AS c ON c.nCurId = h.nCurId
INNER JOIN sesion AS s ON s.nHorId = h.nHorId
INNER JOIN nota AS n ON n.nPerId = m.nPerId AND n.nSesId = s.nSesId
WHERE m.nPerId = ? and h.nHorId =?
  AND m.nMatEstado = 1 
  AND m.nMatTipo = 1 
  AND s.nSesEstado = 1
  AND c.nCurEstado = 1
  AND m.nMatTipo = 1
  AND h.nHorEstado = 0
GROUP BY h.nHorId
ORDER BY h.nHorId",$parametros);
        
       $row=$query->row();
        $promedio=$row->Promedio;
        
        return $promedio; 
    } */       

        function getDatosPromedio($nPerId,$Horario){
        $parametros=array($nPerId,$Horario);
        $query=$this->db->query("SELECT n.nPerId, h.nHorId AS Horario, c.cCurNombre AS Curso, CONCAT( h.cHorFechaInicio, '-', h.cHorFechaFin ) AS Fechas, (SELECT ROUND( (
sum( n.cNotValor ) / count( n.cNotValor ) )
) AS cNotValor
FROM nota AS n
INNER JOIN sesion s ON n.nSesId = s.nSesId
WHERE n.nPerId = '$nPerId'
AND s.nHorId = '$Horario') AS Promedio
FROM matricula AS m
INNER JOIN horario AS h ON m.nHorId = h.nHorId
INNER JOIN curso AS c ON c.nCurId = h.nCurId
INNER JOIN sesion AS s ON s.nHorId = h.nHorId
INNER JOIN nota AS n ON n.nPerId = m.nPerId
AND n.nSesId = s.nSesId
WHERE m.nPerId =?
AND h.nHorId =?
AND m.nMatEstado =1
AND m.nMatTipo =1
AND s.nSesEstado =1
AND c.nCurEstado =1
AND m.nMatTipo =1
AND h.nHorEstado =0
GROUP BY h.nHorId
ORDER BY h.nHorId",$parametros);
        
       $row=$query->row();
        $promedio=$row->Promedio;
        
        return $promedio; 
    }

    function certificadoIns($nPerId,$nEspecialidadId,$nombres,$especialidad,$codigoqr,$md5,$image){
        $parametros=array($nPerId,$nEspecialidadId,$nombres,$especialidad,$codigoqr,$md5,$image);
        //var_dump($parametros);
        $query=$this->db->query("INSERT INTO  certificados (codcertificados,nPerId,nEspecialidadId,datos_personales,
        especialidad ,fecha_emision,codigoqr,codmd5,image,c_cert_estado,cTipoCertificado)
        VALUES (NULL,?,?,?,?,now(),?,?,?,'e','infocip')",$parametros);
        if($query){
            return true;
        }
        else {
            return false;
        }
        
    }
    function matriculaEmitir($nPerId,$nHorId){
        $parametros=array($nHorId,$nPerId);
        $query=$this->db->query("select * from matricula where nHorId=? and nPerId =?",$parametros);
        $row=$query->row();
        $emisiones=$row->emisionCertificado;
        $emisiones=$emisiones+1;
        
        $parametros=array($emisiones,$nHorId,$nPerId);
        $this->db->query("update matricula set emisionCertificado=? where nHorId=? and nPerId =?",$parametros);
    }
    function getHorasAcademicas($horario){
        $query=$this->db->query("SELECT count(*) as sesiones FROM sesion WHERE nHorId=? and nSesEstado=1",$horario);
        if($query->num_rows()>0){
             $row=$query->row();
             $sesiones=$row->sesiones;
        }
        else {
            $sesiones=0;
        }
        
        $query=$this->db->query("SELECT (cHorHoraFin-cHorHoraInicio) as horas FROM horario WHERE nHorId=?",$horario);
        if($query->num_rows()>0){
             $row=$query->row();
             $horas=$row->horas;
        }
        else{
            $horas=0;
        }
        return $horas*$sesiones;
        
        
        
    }
    function getDatosHorario($horario){
        $query=$this->db->query("SET lc_time_names = 'es_AR';");
        $query=$this->db->query("SELECT concat(day(horario.cHorFechaInicio),' de ',monthname(horario.cHorFechaInicio)) as fechaini,
            concat(day(horario.cHorFechaFin),' de ',monthname(horario.cHorFechaFin)) as fechafin,curso.cCurNombre,curso.nCurId
            ,curso.cCurDescripcion,year( horario.cHorFechaFin ) as cHorFechaFin, year( horario.cHorFechaInicio ) as cHorFechaInicio
            FROM horario inner join curso on horario.nCurId=curso.nCurId where horario.nHorId=?",$horario);
        
        
        if($query->num_rows()>0){
             return $query->row();
        }
        else {
            return null;
        }
    }
    function getInformacion($nPerId,$horario){
        $parametros=array($horario,$nPerId);
        $informacion="";
        $query=$this->db->query("SELECT COUNT( * ) AS nrosesiones FROM sesion WHERE  nHorId =?",$horario);
        if($query->num_rows()>0){
            $row=$query->row();
            $informacion['nrosesiones']=$row->nrosesiones;
        }
        $query1=$this->db->query("SELECT count(*) as nroasistencias 
FROM asistencia a
INNER JOIN sesion s ON a.nSesId = s.nSesId
WHERE s.nHorId =?
AND a.nPerId =?
AND a.cAsiValor =  'AS'",$parametros);
        if($query1->num_rows()>0){
            $row=$query1->row();
            $informacion['nroasistencias']=$row->nroasistencias;
        }
        $informacion['nrofaltas']=$informacion['nrosesiones']-$informacion['nroasistencias'];
        $informacion['porcentaje_asistencias']=$informacion['nroasistencias']*100/$informacion['nrosesiones'];
        
        
    return $informacion;
        
    }
    function getNotas($nPerId,$horario){
         $parametros=array($horario,$nPerId);
          $query=$this->db->query(" SELECT * FROM nota n INNER JOIN sesion s ON n.nSesId = s.nSesId WHERE s.nHorId =? AND n.nPerId =?",$parametros);
        if($query->num_rows()>0){
           return $query->result();
        }
    }
    function getAsistencias($nPerId,$horario){
         $parametros=array($horario,$nPerId);
        $query1=$this->db->query("SELECT * 
FROM asistencia a
INNER JOIN sesion s ON a.nSesId = s.nSesId
WHERE s.nHorId =?
AND a.nPerId =?",$parametros);
        if($query1->num_rows()>0){
            return $query1->result();
           
        }
        
        
        
    }
    function getModulosDiplomado($horario){
        
         $curso=$this->db->query("select nCurId from horario where nHorId=?",$horario);
         if($curso->num_rows()>0){
             $reg=$curso->row();
            $nCurId=$reg->nCurId;
             $query=$this->db->query("select * from concepto_diplomado where nCurId=? and cConDipTitulo<>''",$nCurId);
             if($query->num_rows()>0){
             return $query->result();
             }
         }  
         else {
             return "";
         }
    }
    function actualizarConceptoDiplomado($fechainicio,$fechafin,$horas,$modulo){
        $parametros=array($fechainicio,$fechafin,$horas,$modulo);
        $query=$this->db->query("update concepto_diplomado set cFechaInicio=?,cFechaFin=?,nHoras=? where nConDipId=?",$parametros);
        if($query){
            return true;
        }
        else {
            return false;
        }
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
         $query=$this->db->query("SET lc_time_names = 'es_AR';");
         $query = $this->db->query("select nConDipId,cConDipTitulo,cConDipSumilla,nCurId,nPerId,"
                 . "concat(day(cFechaInicio),' de ',monthname(cFechaInicio)) as fechainicio,"
                 . "concat(day(cFechaFin),' de ',monthname(cFechaFin)) as fechafin,nHoras,year(cFechaInicio) as cFechaInicio,"
                 . "year(cFechaFin) as cFechaFin from concepto_diplomado where nConDipId=?",$idmodulo);
        if ($query->num_rows() > 0) {
          //  var_dump($query->row());
            return $query->row();
        } else {
            return false;
        }
    }
     function certificadoDipIns($nPerId,$modulo,$codigoqr,$md5,$image,$pdf){
        
              $parametros=array($nPerId,$modulo,$codigoqr,$md5,$image,$pdf);
              $busqueda=array($nPerId,$modulo);
            $query=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda) ;
             if($query->num_rows()>0){
                 $this->db->query("update certificados_diplomados set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda);
             }else{
                 $this->db->query("insert into certificados_diplomados values(NuLL,?,?,now(),?,?,?,?,'infocip')",$parametros);
             }
        
     }
    function certificadoCurIns($nPerId,$nEspecialidadId,$codigoqr,$md5,$image,$pdf,$tipo){
        
        if($tipo==1){
              $parametros=array($nPerId,$nEspecialidadId,$codigoqr,$md5,$image,$pdf);
              $busqueda=array($nPerId,$nEspecialidadId);
                 $update_qr=array($codigoqr,$md5,$nPerId,$nEspecialidadId);
             $query=$this->db->query("select * from certificados_cursos where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda) ;
             if($query->num_rows()>0){
                 $this->db->query("update certificados_cursos set fecha_emision=now(),codigoqr=?,codmd5=? where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$update_qr);
             }else{
                 $this->db->query("insert into certificados_cursos values(NuLL,?,?,now(),?,?,?,?,'infocip')",$parametros);
             }
  
         }else if($tipo==2){
             $concepto=array($nEspecialidadId);
             $queryConcepto=$this->db->query("select * from concepto_diplomado where nCurId=? and cConDipTitulo='' and cConDipSumilla=''",$concepto);
             if($queryConcepto->num_rows()>0){
                
                     $row=$queryConcepto->row();
                     $ultimo=$row->nConDipId;
                      $parametros=array($nPerId,$ultimo,$codigoqr,$md5,$image,$pdf);
                      $busqueda=array($nPerId,$ultimo);
                      $queryevaluacion=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda) ;
                      if($queryevaluacion->num_rows()>0){
                            $this->db->query("update certificados_diplomados set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda);
                      }else{
                             $this->db->query("insert into certificados_diplomados values(NuLL,?,?,now(),?,?,?,?,'infocip')",$parametros);
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
                      $query6=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda) ;
                      if($query6->num_rows()>0){
                            $this->db->query("update certificados_diplomados set fecha_emision=now() where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip'",$busqueda);
                      }else{
                             $this->db->query("insert into certificados_diplomados values(NuLL,?,?,now(),?,?,?,?,'infocip')",$parametros);
                      }
                 }
             }
             
                
             }

         }
   
        
    }
     function getCorrelativo($nPerId,$curso){
       $busqueda=array($nPerId,$curso);
       $query=$this->db->query("select * from certificados_cursos where nPerId=? and nEspecialidadId=? and cTipoCertificado='Infocip' limit 1",$busqueda) ;
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
      function getCorrelativoDiplomado($nPerId,$curso){
       $busqueda=array($nPerId,$curso);
       $query=$this->db->query("select * from certificados_diplomados where nPerId=? and nEspecialidadId=? and cTipoCertificado='infocip' limit 1",$busqueda) ;
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
    function getCursoId($horario){
        $query=$this->db->query("select nCurId from horario where nHorId=?",$horario);
        if($query->num_rows()>0){
            $reg=$query->row();
            return $reg->nCurId;
        }
    }
        
        
}

