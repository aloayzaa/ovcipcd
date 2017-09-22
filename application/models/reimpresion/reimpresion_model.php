<?php

class Reimpresion_model extends CI_Model {

   private $titulo='';
   private $descripcion='';
   private $tipoeventos='';
   private $fechaevento='';
   private $fechaeventoinicio='';
   private $cuenta_ingreso='';
   private $horas;
   function getHoras() {
       return $this->horas;
   }

   function setHoras($horas) {
       $this->horas = $horas;
   }

      
   
   private $nEveId='';
   function getFechaeventoinicio() {
       return $this->fechaeventoinicio;
   }

   function setFechaeventoinicio($fechaeventoinicio) {
       $this->fechaeventoinicio = $fechaeventoinicio;
   }
   function getNEveId() {
       return $this->nEveId;
   }

    function setNEveId($nEveId) {
        $this->nEveId = $nEveId;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getTipoeventos() {
        return $this->tipoeventos;
    }
    
    function getFechaevento() {
        return $this->fechaevento;
    }

    function getCuenta_ingreso() {
        return $this->cuenta_ingreso;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setTipoeventos($tipoeventos) {
        $this->tipoeventos = $tipoeventos;
    }

    function setFechaevento($fechaevento) {
        $this->fechaevento = $fechaevento;
    }

    function setCuenta_ingreso($cuenta_ingreso) {
        $this->cuenta_ingreso = $cuenta_ingreso;
    }
    function __construct() {
       parent::__construct();
        $this->load->database();
     //  $this->db=$this->load->database('cipbdnueva',TRUE);
       //$this->evento=$this->load->database('evento',TRUE); 
    }
    function convertir($fecha){
        $pos=-1;
       for($i=0;$i<strlen($fecha);$i=$i+1){
           if($fecha[$i]=='/'){
               $pos=$i;
               break;
           }
        }
        if($pos>=0){
             $valor=substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);  
        }
        else {
              $valor=$fecha;
              }
        return $valor;
    }
    function validarcuenta(){
       $parametros=array( $this->getCuenta_ingreso());
        $query=$this->colegiado->query("select * from cuenta_ing where codctaing=?",$parametros);
        if($query){
            if($query->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }
    function eventosIns() {
           // echo "nombre del titulo".$this->getTitulo();
        
                $parametros = array($this->getTitulo(), 
                $this->getTipoeventos(),
                $this->getDescripcion(), 
                $this->convertir($this->getFechaevento()),
                $this->getCuenta_ingreso(),
                $this->convertir($this->getFechaeventoinicio()),
                $this->getHoras()
               );
    
       $query = $this->db->query("CALL USP_SISEVE_I_EVENTO(?,?,?,?,?,?,?)", $parametros);
      
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        } 
    }
      
    function getCapitulos(){
            $query = $this->colegiado->query("select * from capitulo");
            
            if ($query) {
              
              return $query->result();
             }
            
            else {
            throw new Exception('error al recuperar datos de la BD');
            }               
    }
    function certificadosQry($tipo,$fechainicio,$fechafin) {
        $parametros=array($tipo,$fechainicio,$fechafin,$tipo,$fechainicio,$fechafin);
if ($tipo == 'evento'){
   $query1 = $this->db->query("select cer.codcertificados,cer.fecha_emision,cer.pdf, c.cEveTitulo as cCurNombre, upper(concat
(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres)) as datos from 
certificados_cursos as cer 
inner join evento as c on cer.nEspecialidadId=c.nEveId inner join persona as p on 
cer.nPerId=p.nPerId
where cTipoCertificado=? and date(fecha_emision)>=? and date
(fecha_emision)<=? ",$parametros);
}else{
   $query1 = $this->db->query("select cer.codcertificados,cer.fecha_emision,cer.pdf, c.cCurNombre, upper(concat
(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres)) as datos from 
certificados_cursos as cer 
inner join curso as c on cer.nEspecialidadId=c.nCurId inner join persona as p on 
cer.nPerId=p.nPerId
where cTipoCertificado=? and date(fecha_emision)>=? and date
(fecha_emision)<=? union all 
select cer.codcertificados,cer.fecha_emision,cer.pdf,concat
(cur.cCurNombre,'-',c.cConDipTitulo) as cCurNombre, upper(concat
(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres)) as datos from 
certificados_diplomados as cer 
inner join concepto_diplomado as c on cer.nEspecialidadId=c.nConDipId inner join 
persona as p on cer.nPerId=p.nPerId
inner join curso as cur on c.nCurId=cur.nCurId
where cTipoCertificado=? and date(fecha_emision)>=? and date
(fecha_emision)<=?",$parametros);
}
       
       if ($query1->num_rows() > 0) {
           return $query1->result_array();
        } else {
            return null;
        }
    }
        
    function eventosGet($nEveId){
        $parametros = array($nEveId);
        $query = $this->db->query("CALL USP_SISEVE_S_EVENTO(?)",$parametros);

        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNEveId($row->nEveId);
                $this->setTitulo($row->cEveTitulo); 
                $this->setTipoeventos($row->nEveTipoEvento);
                $this->setDescripcion($row->cEveDescripcion); 
                $this->setFechaevento($row->cFechaEven);
                $this->setFechaeventoinicio($row->cFechaEvenInicio);
                $this->setCuenta_ingreso($row->cEveCuentaIngreso);
                $this->setHoras($row->Horas);

                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }

    }
     function eventosUpd_sincuenta() {
        $parametros = array(
            $this->getTitulo(), 
            $this->getDescripcion(), 
            $this->convertir($this->getFechaevento()),
            $this->convertir($this->getFechaeventoinicio()),
            $this->getHoras(),
            $this->getNEveId()
            );
        $query = $this->db->query("UPDATE  evento SET  `cEveTitulo` =?,
`cEveDescripcion` =?,
`cFechaEven` = ?,
`cFechaEvenInicio`=?,Horas=?
WHERE `nEveId` =?;", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {

            throw new Exception('error al recuperar datos de la BD');
        }
    } 
        
    function eventosUpd() {
        $parametros = array(
            $this->getNEveId(),
            $this->getTitulo(), 
            $this->getTipoeventos(),
            $this->getDescripcion(), 
            $this->convertir($this->getFechaevento()),
            $this->getCuenta_ingreso(),
            $this->convertir($this->getFechaeventoinicio()),
            $this->getHoras()
            );
        $query = $this->db->query("CALL USP_SISEVE_U_EVENTO(?,?,?,?,?,?,?,?)", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {

            throw new Exception('error al recuperar datos de la BD');
        }
    } 
        
    function eventosDel(){
        $parametros = array($this->getNEveId());
        $query = $this->db->query("call USP_SISEVE_D_EVENTO(?)", $parametros);
        if ($query) {
            return true;
        } else {
          throw new Exception('error al recuperar datos de la BD');
        }
    }
        
        
}

