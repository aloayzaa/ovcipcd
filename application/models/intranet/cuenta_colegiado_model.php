<?php

class cuenta_colegiado_model extends CI_Model {

    private $Pagos = '';
    private $año = '';
    private $mes = '';

    public function getPagos() {
        return $this->Pagos;
    }

    public function setPagos($Pagos) {
        $this->Pagos = $Pagos;
    }

    public function getAño() {
        return $this->año;
    }

    public function setAño($año) {
        $this->año = $año;
    }

    public function getMes() {
        return $this->mes;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    function cuenta_colegiadoqry($cip, $tipoclase) {
        $parametros = array($cip, $tipoclase);
        $query = $this->db_bdcolegio->query("CALL USP_CUENTA_COLEGIADO(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
      function cuenta_colegiadoqryfix($cip, $tipoclase) {
        $parametros = array($cip, $tipoclase);
        $query = $this->db_bdcolegio->query("CALL USP_CUENTA_COLEGIADOFIX(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
      function cuenta_yearsfix($cip, $tipoclase) {
        $parametros = array($cip, $tipoclase);
        $query = $this->db_bdcolegio->query("CALL USP_CUENTA_YEARSFIX(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function cuenta_colegiadoqrysub($cip, $tipoclase) {
        $parametros = array($cip, $tipoclase);
        $query = $this->db_bdcolegio->query("CALL USP_CUENTA_COLEGIADOSUB(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function pago_totalqry($cip) {
        
        $ncadena = strlen($cip);
        switch ($ncadena) {
            case 1:
                $cip = '00000' . $cip;
                break;
            case 2:
                $cip = '0000' . $cip;
                break;
            case 3:
                $cip = '000' . $cip;
                break;
            case 4:
                $cip = '00' . $cip;
                break;
            case 5:
                $cip = '0' . $cip;
                break;
            case 6:
                $cip = $cip;
                break;
        }
        $parametros = array($cip);
        $query = $this->db_bdcolegio->query("
Select sum(ROUND((co.valor - co.descuento),2)) 
 AS Pagos FROM colcuota co inner join
cuota c on co.codcuota=c.codcuota WHERE co.regcol=? order by Pagos desc", $parametros);
        if ($query) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            $this->db_bdcolegio->close();
            return NULL;
        }
    }

    function deuda_totalqry($cip, $tipoclase,$habilidad) {
        $this->db_bdcolegio->close();
        $ncadena = strlen($cip);
        switch ($ncadena) {
            case 1:
                $cip = '00000' . $cip;
                break;
            case 2:
                $cip = '0000' . $cip;
                break;
            case 3:
                $cip = '000' . $cip;
                break;
            case 4:
                $cip = '00' . $cip;
                break;
            case 5:
                $cip = '0' . $cip;
                break;
            case 6:
                $cip = $cip;
                break;
        }
        $parametros = array($cip, $tipoclase);
        $query = $this->db_bdcolegio->query("CALL USP_DEUDA_COLEGIADOFIX(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function multa_totalqry($cip) {
        $parametros = array($cip);
        $query = $this->db_bdcolegio->query("select CASE WHEN (sum(multelec)) is NULL then 0 ELSE sum(multelec) end  as multa from col_eleccion ce inner join 
eleccion e on ce.codelec=e.codelec where regcol=? and estadoelec='O'", $parametros);
        if ($query) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function deudacol_totalqry($cip) {
        $parametros = array($cip);
        $query = $this->db_bdcolegio->query("select CASE WHEN (sum(saldodeu)) is NULL then 0 ELSE sum(saldodeu) end  as saldo from col_deuda cd 
inner join otrasdeudas od on cd.coddeuda=od.coddeuda where regcol=? and estadodeu='NC'", $parametros);
        if ($query) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function exocol_totalqry($cip) {
          $ncadena = strlen($cip);
        switch ($ncadena) {
            case 1:
                $cip = '00000' . $cip;
                break;
            case 2:
                $cip = '0000' . $cip;
                break;
            case 3:
                $cip = '000' . $cip;
                break;
            case 4:
                $cip = '00' . $cip;
                break;
            case 5:
                $cip = '0' . $cip;
                break;
            case 6:
                $cip = $cip;
                break;
        }
        $parametros = array($cip);
        $query = $this->db_bdcolegio->query("select 
case when sum(ce.valorexo) is null then 0 else sum(ce.valorexo) end as monto, c.año from col_exo ce 
            inner join cuota c
on ce.codcuota = c.codcuota 
where ce.regcol=? group by c.año;", $parametros);
        if ($query) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function monto_totalqry($parametros) {
        $query = $this->db_bdcolegio->query("select sum(c.valorcuota) as monto from cuota c inner join cuenta_ing ci on c.codctaing=ci.codctaing where c.año=? and c.mes=? 
and c.tipocole=? and c.codctaing<>'200'", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function multa_detalleqry() {
        $parametros = array(142180);
        $query = $this->db_bdcolegio->query("select ce.codelec,motelec,multelec from col_eleccion ce inner join 
eleccion e on ce.codelec=e.codelec where regcol=? and estadoelec='O'", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function deuda_detalleqry() {

        $parametros = array(142180, 'O');
        $query = $this->db_bdcolegio->query("call USP_DET_DEUDA_COLEGIADO(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function pago_detalleqry($parametros) {
        $query = $this->db_bdcolegio->query("select c.codctaing,ci.descctaing,c.valorcuota from cuota c inner join cuenta_ing ci on c.codctaing=ci.codctaing where c.año=? and c.mes=? 
and c.tipocole=? and c.codctaing<>'200';", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function cuenta_colegiadoqry2($cip, $tipoclase) {
        $parametros = array($cip, $tipoclase);
        $query = $this->db_bdcolegio->query("SELECT co.codcuota,c.año,c.mes,
CASE c.mes
	WHEN 01 THEN 'Enero'
	WHEN 02 THEN 'Febrero'
	WHEN 03 THEN 'Marzo'
	WHEN 04 THEN 'Abril'
	WHEN 05 THEN 'Mayo'
	WHEN 06 THEN 'Junio'
	WHEN 07 THEN 'Julio'
	WHEN 08 THEN 'Agosto'
	WHEN 09 THEN 'Septiembre'
	WHEN 10 THEN 'Octubre'
	WHEN 11 THEN 'Noviembre'
	WHEN 12 THEN 'Diciembre'
	END
	AS 'NombreMes',co.fechapago,co.valor as vPagos,co.descuento,ROUND((co.valor - co.descuento),2) as TotalPago,co.estado FROM colcuota co inner join cuota c on co.codcuota=c.codcuota
WHERE co.regcol=?", $parametros);
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

}

?>
