<?php

class adampt {

    //atributos   
    private $Parametros = array();
    private $pOUT1 = "aaaa";
    private $pOUT2 = "eeee";
    private $pOUT3 = "                                                           "; // 60 caracteres
    private $stmt;
    private $cn;
    private $connectionInfo;
    private $serverName;

    public function __construct() {

//       $this->serverName = "LUIGGI-PC"; //serverName\instanceName

        // $this->serverName = "TUXITODEB"; //serverName\instanceName
        $this->serverName = "localhost"; //serverName\instanceName
        //$this->serverName = "172.20.1.50"; //serverName\instanceName
        //$serverName = "172.20.1.50"; //serverName\instanceName
        $this->connectionInfo = array("Database" => "bdMptIntegradaCI", "UID" => "sa", "PWD" => "123", "CharacterSet" => 'UTF-8');

        // $this->connectionInfo = array("Database" => "bdMptIntegradaCI", "UID" => "sa", "PWD" => "123", "CharacterSet" => 'UTF-8');
        
        // $connectionInfo = array("Database"=>"bdMptIntegrada", "UID"=>"desarrollo", "PWD"=>"@desarrollo123");                        
        $this->cn = sqlsrv_connect($this->serverName, $this->connectionInfo);
    }

    //metodos
    public function setParam($NomPar, $tipo = null) {
        $this->Parametros[] = array(&$NomPar, SQLSRV_PARAM_IN);
    }

    public function setParamOut1($NomPar = null) {
        $this->Parametros[] = array(&$this->pOUT1, SQLSRV_PARAM_OUT, NULL, SQLSRV_SQLTYPE_INT);
    }

    public function setParamOut2($NomPar = null) {
        $this->Parametros[] = array(&$this->pOUT2, SQLSRV_PARAM_OUT, NULL, SQLSRV_SQLTYPE_INT);
    }

    public function setParamOut3($NomPar = null) {
        $this->Parametros[] = array(&$this->pOUT3, SQLSRV_PARAM_OUT, NULL, SQLSRV_SQLTYPE_VARCHAR('max'));
    }

    public function getParamOut1() {
        return $this->pOUT1;
    }

    public function getParamOut2() {
        return $this->pOUT2;
    }

    public function getParamOut3() {
        return $this->pOUT3;
    }

    public function prepara($pa) {
        $param = '?';
        //$totparam=count($parametros);
        if (count($this->Parametros) > 1) {
            $param = $param . str_repeat(',?', count($this->Parametros) - 1);
        }
        $this->stmt = sqlsrv_prepare($this->cn, '{call ' . $pa . '(' . $param . ')}', $this->Parametros); // array( &$qty, &$id));
        //$this->stmt= sqlsrv_query($cn, "{call ".$pa."(".$param.")}",$this->Parametros);// array( &$qty, &$id));
        //sqlsrv_next_result($this->stmt);                 
    }

    public function ejecuta() {
        $exec = sqlsrv_execute($this->stmt);
        sqlsrv_next_result($this->stmt);
        $this->Liberar();
        return $exec;
    }

    public function next() {
        $tem = array();
        $exec = sqlsrv_execute($this->stmt);
        $next_result = sqlsrv_next_result($this->stmt);
        // if($ne){
        while ($row = sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC)) {
            $tem[] = $row;
        }
        // }
        return $tem;
    }

    public function consulta($pa) {
        $param = '?';
        if (count($this->Parametros) > 1)
            $param .= str_repeat(',?', count($this->Parametros) - 1);
        $result = $this->stmt = sqlsrv_query($this->cn, '{call ' . $pa . '(' . $param . ')}', $this->Parametros); // array( &$qty, &$id));
        if ($result) {
            $Elementos = array();
            while ($row = sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC)) {
                $temp = array();
                foreach ($row as $key => $value) {
                    
                }
                array_push($Elementos, $row);
                //$Elementos[]=$row;
            }
            $this->Liberar();
            return $Elementos;
        } else {
            return false;
        }
    }

    public function getCampo($pa, $indice) {
        $param = '?';
        if (count($this->Parametros) > 1)
            $param .= str_repeat(',?', count($this->Parametros) - 1);
        $result = $this->stmt = sqlsrv_query($this->cn, '{call ' . $pa . '(' . $param . ')}', $this->Parametros); // array( &$qty, &$id));      
        if ($result) {
            if ($this->stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            if (sqlsrv_fetch($this->stmt) === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $value = sqlsrv_get_field($this->stmt, $indice);
            $this->Liberar();
            return $value;
        } else {
            return false;
        }
    }

    public function getFila($pa) {
        $param = '?';
        if (count($this->Parametros) > 1)
            $param .= str_repeat(',?', count($this->Parametros) - 1);

        $result = $this->stmt = sqlsrv_query($this->cn, '{call ' . $pa . '(' . $param . ')}', $this->Parametros); // array( &$qty, &$id));      
        if ($result) {
            if ($this->stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            $row = sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC);
            $this->Liberar();
            return $row;
        } else {
            return false;
        }
    }

    public function Liberar() {
        sqlsrv_free_stmt($this->stmt);
        unset($this->Parametros);
    }

    public function beginTran() {
        if (sqlsrv_begin_transaction($this->con) === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    public function commitTran() {
        sqlsrv_commit($this->cn);
    }

    public function rollbackTran() {
        sqlsrv_rollback($this->cn);
    }

}