<?php

class Pagosinfocip_model extends CI_Model {

    function __construct() {
       parent::__construct();
        $this->load->database();
       $this->colegiado=$this->load->database('db_colegiado',TRUE);
       //$this->evento=$this->load->database('evento',TRUE); 
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
    function getCapitulos(){
            $query = $this->colegiado->query("select * from capitulo");
            
            if ($query) {
              
              return $query->result();
             }
            
            else {
            throw new Exception('error al recuperar datos de la BD');
            }               
    }
    function pagosQry($cuentaIngreso,$fechainicio,$fechafin) {
        $parametros=array($cuentaIngreso,$fechainicio,$fechafin,$cuentaIngreso,$fechainicio,$fechafin);

        $query1 = $this->colegiado->query("select concat(b.codbol,' - Boleta') as codbol ,upper(b.nombbol) as nombbol,descripcion,b.regcol,sum(db.preciobol*db.cantbol) as preciobol,b.fecpagobol
                 from deta_bol as db inner join boleta as b on db.codbol=b.codbol 
                where db.codctaing =? and date(b.fecpagobol)>=? and date(b.fecpagobol)<=? and b.estadobol='P'
                group by b.codbol
                union all
                select concat(f.codfac,'- Factura') as codbol,upper(f.razsocfac),df.descripcion,df.descripcion,round(round(igvfac,2) + sum(df.preciofac*df.cantfac),2) as preciofac,f.fecpagofac
                 from deta_fac as df inner join factura as f on df.codfac=f.codfac 
                where df.codctaing = ? and date(f.fecpagofac)>=? and date(f.fecpagofac)<=? and f.estadofac='P' group by f.codfac
                ",$parametros);

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

