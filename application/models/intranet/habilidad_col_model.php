<?php

class Habilidad_col_model extends CI_Model {

    private $regcol = ''; // numero cip
    private $habilidad = 1; //habilidad muestra 1 HABIL  2 INHABIL
    private $tipoclase = ''; // tipo clase
    private $fecinscol = ''; // fecha inscripcion
    private $fecaportcol = ''; // fecha aportacion colegiado
    private $fechactual = ''; // fecha actual
    private $cantidadmultas = ''; //cantidad de multas
    private $estadoelec = ''; // Estado eleccion Omiso
    private $fecinshab = '';
    private $numfecvit = 0;
    private $numcolcuotavit = '';
    private $cantidadcuotas = '';
    private $nombre = '';
    private $apellidomat = '';
    private $apellidopat = '';
    private $dni = '';
    private $coltitulo = '';
    private $nummultas = '';
    private $numdeudas = '';
    private $error = '';
    private $numdeudacuo = '0';

    public function getNumdeudacuo() {
        return $this->numdeudacuo;
    }

    public function setNumdeudacuo($numdeudacuo) {
        $this->numdeudacuo = $numdeudacuo;
    }

    //VER CUAOTAS VARIABLES

    public function getError() {
        return $this->error;
    }

    public function setError($error) {
        $this->error = $error;
    }

    private $transferencia = '';
    private $fallecido = '';
    private $año = '';
    private $mes = '';
    private $añovi = '';
    private $mesvi = '';
    private $añoact = '';

    // arreglo cuotas

    public function getTransferencia() {
        return $this->transferencia;
    }

    public function getFallecido() {
        return $this->fallecido;
    }

    public function getAño() {
        return $this->año;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getAñovi() {
        return $this->añovi;
    }

    public function getMesvi() {
        return $this->mesvi;
    }

    public function getAñoact() {
        return $this->añoact;
    }

    public function setTransferencia($transferencia) {
        $this->transferencia = $transferencia;
    }

    public function setFallecido($fallecido) {
        $this->fallecido = $fallecido;
    }

    public function setAño($año) {
        $this->año = $año;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function setAñovi($añovi) {
        $this->añovi = $añovi;
    }

    public function setMesvi($mesvi) {
        $this->mesvi = $mesvi;
    }

    public function setAñoact($añoact) {
        $this->añoact = $añoact;
    }

    public function getNumdeudas() {
        return $this->numdeudas;
    }

    public function setNumdeudas($numdeudas) {
        $this->numdeudas = $numdeudas;
    }

    public function getNummultas() {
        return $this->nummultas;
    }

    public function setNummultas($nummultas) {
        $this->nummultas = $nummultas;
    }

    public function getColtitulo() {
        return $this->coltitulo;
    }

    public function setColtitulo($coltitulo) {
        $this->coltitulo = $coltitulo;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidomat() {
        return $this->apellidomat;
    }

    public function getApellidopat() {
        return $this->apellidopat;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidomat($apellidomat) {
        $this->apellidomat = $apellidomat;
    }

    public function setApellidopat($apellidopat) {
        $this->apellidopat = $apellidopat;
    }

    public function getCantidadcuotas() {
        return $this->cantidadcuotas;
    }

    public function setCantidadcuotas($cantidadcuotas) {
        $this->cantidadcuotas = $cantidadcuotas;
    }

    public function getNumfecvit() {
        return $this->numfecvit;
    }

    public function setNumfecvit($numfecvit) {
        $this->numfecvit = $numfecvit;
    }

    public function getFecinshab() {
        return $this->fecinshab;
    }

    public function setFecinshab($fecinshab) {
        $this->fecinshab = $fecinshab;
    }

    public function getCantidadmultas() {
        return $this->cantidadmultas;
    }

    public function setCantidadmultas($cantidadmultas) {
        $this->cantidadmultas = $cantidadmultas;
    }

    public function getFechactual() {
        return $this->fechactual;
    }

    public function setFechactual($fechactual) {
        $this->fechactual = $fechactual;
    }

    public function getTipoclase() {
        return $this->tipoclase;
    }

    public function getFecinscol() {
        return $this->fecinscol;
    }

    public function setTipoclase($tipoclase) {
        $this->tipoclase = $tipoclase;
    }

    public function setFecinscol($fecinscol) {
        $this->fecinscol = $fecinscol;
    }

    public function getRegcol() {
        return $this->regcol;
    }

    public function getHabilidad() {
        return $this->habilidad;
    }

    public function setRegcol($regcol) {
        $this->regcol = $regcol;
    }

    public function setHabilidad($habilidad) {
        $this->habilidad = $habilidad;
    }

    public function getFecaportcol() {
        return $this->fecaportcol;
    }

    public function setFecaportcol($fecaportcol) {
        $this->fecaportcol = $fecaportcol;
    }

    public function getEstadoelec() {
        return $this->estadoelec;
    }

    public function setEstadoelec($estadoelec) {
        $this->estadoelec = $estadoelec;
    }

    public function getNumcolcuotavit() {
        return $this->numcolcuotavit;
    }

    public function setNumcolcuotavit($numcolcuotavit) {
        $this->numcolcuotavit = $numcolcuotavit;
    }

    function chkHabilitado($cip) {

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
        $query = $this->db_bdcolegio->query("CALL USP_CUENTA_HABILITADO(?)", $parametros);
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return 1;
            } else {
                return 0;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function habilidadCheck($cip) {

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

        ////////////////////////////////////Tomando datos de Colegiado//////////////////////////////
        $query_colegiado = $this->db_bdcolegio->query("SELECT ti.desctitulo, c.apecol,c.lecol, c.apematcol, c.nomcol, c.regcol, c.tipoclase,c.fecinscol,c.fecaportcol FROM colegiado c
                inner join col_titulo ct on c.regcol = ct.regcol inner join titulo ti on ti.codtitulo = ct.codtitulo WHERE c.regcol=?", array($cip));
        $this->db_bdcolegio->close();
        if ($query_colegiado->num_rows() > 0) {
            $ingeniero = $query_colegiado->row();
			//var_dump($ingeniero);
            $this->setTipoclase($ingeniero->tipoclase);
            $this->setFecinscol($ingeniero->fecinscol);
            $this->setFecaportcol($ingeniero->fecaportcol);
            $this->setRegcol($ingeniero->regcol);
            $this->setApellidopat($ingeniero->apecol);
            $this->setApellidomat($ingeniero->apematcol);
            $this->setDni($ingeniero->lecol);
            $this->setNombre($ingeniero->nomcol);
            $this->setColtitulo($ingeniero->desctitulo);
        } else{
		$this->setHabilidad(3);
		}
        /////////////////////////FECHA ACTUAL/////////////////////////////////
        $query_fecha = $this->db_bdcolegio->query("select date_format(now(),'%Y-%m-%d') as fec");
        $this->db_bdcolegio->close();
        $fecha_ahora = $query_fecha->row();
        $this->setFechactual($fecha_ahora->fec);

        ////////////////////////////////////MULTAS POR NO HABER VOTADO /////////////////////////////////////
        $query_multas = $this->db_bdcolegio->query("SELECT * FROM colegiado, col_eleccion WHERE colegiado.regcol=col_eleccion.regcol
	and colegiado.regcol=? and estadoelec = 'O' ", array($cip)); // O - omiso NO VOTO  
        $this->db_bdcolegio->close();
        if ($query_multas->num_rows() > 0) {
            $this->setHabilidad(0);  // Manda inHabil directamente
            $this->setCantidadmultas(1);
            $this->setNumdeudacuo(1);
        }
        /////////////////////////////////////////////////////DEUDA POR MIEMBRO DE MESA///////////////////////////////////////
        $query_miembromesa = $this->db_bdcolegio->query("SELECT * FROM colegiado, col_deuda WHERE colegiado.regcol=col_deuda.regcol
                           and colegiado.regcol=? and estadodeu = 'NC' and coddeuda='6' and saldodeu > 0 ", array($cip));
        $this->db_bdcolegio->close();
        if ($query_miembromesa->num_rows() > 0) {
            $this->setHabilidad(0);  // Manda inHabil directamente
            $this->setCantidadmultas(1);
            $this->setNumdeudacuo(1);
        }
        if ($this->getNumdeudacuo() != 1) {
            ///////////////// VALIDANDO FECHAS       
            if ($this->getFecinscol() < '1991-10-01') {
                $this->setFecinshab('1991-10-01');
            }
            if ($this->getFecaportcol() > $this->getFecinshab()) {
                $this->setFecinshab($this->getFecaportcol());
            }
            ////////// AÑO Y MES DE APORTE
            //ano y mes de aporte
            $af = substr($this->getFecinshab(), 0, 4);
            $mf = substr($this->getFecinshab(), 5, 2);
            //ano y mes actual
            $aa = substr($this->getFechactual(), 0, 4);
            $ma = substr($this->getFechactual(), 5, 2);
            $pf = $aa . $ma; //ano y mes actual



            if ($this->getTipoclase() == 'V') {  // SI EL COLEGIADO ES DE TIPO VITALICIO
                $av = substr($this->getFecinscol(), 0, 4);
                $mv = substr($this->getFecinscol(), 5, 2);

                $av = $av + 30;
                $pf = $av . $mv;
                $pc = $af . $mf;

                //////////CALCULO DE CANTIDAD DE MESES ENTRE FECHAINSHABILIDAD Y FECVIT
                $query_concuototv = $this->db_bdcolegio->query("select period_diff(?,?) as ct", array($pf, $pc));
                $this->db_bdcolegio->close();
                $rownumfecvit = $query_concuototv->row();
                $this->setNumfecvit($rownumfecvit->ct);

                if ($this->getNumfecvit() < 0) {
                    $this->setHabilidad(1);
                } else {
                    $query_cancuotavit = $this->db_bdcolegio->query("select count(cuota.codcuota) as cantidad from cuota,colcuota where regcol=? and
		cuota.codcuota=colcuota.codcuota and estado = 'P' and tipocole='O'", array($cip));
                    $this->db_bdcolegio->close();
                    $cancuotavit = $query_cancuotavit->row();
                    $this->setNumcolcuotavit($cancuotavit->cantidad);
                    if ($this->getNumfecvit() <= $this->getNumcolcuotavit()) {
                        $this->setHabilidad(1);
                    }
                }
            }
            // SI ES VITALICIO SIGUE INHABIL Y ES DE TIPO ORDINARIO
           
            if (($this->getHabilidad() == 0 and $this->getTipoclase() == 'V') or $this->getTipoclase() == 'O') {
                
                $query_concat = $this->db_bdcolegio->query("select count(*) as cantidad from colcuota where regcol = ? and estado = 'P'", array($cip));
                $this->db_bdcolegio->close();
                $concat = $query_concat->row();
                $this->setCantidadcuotas($concat->cantidad);

                if ($this->getCantidadcuotas() <= 0) {

                    $query_rs = $this->db_bdcolegio->query("select period_diff(extract(YEAR_MONTH from curdate()),extract(YEAR_MONTH from fecaportcol)) as can_mes from colegiado where regcol = ?", array($cip));
                    $this->db_bdcolegio->close();
                    $rs = $query_rs->row();
                    $ca_mes = $rs->can_mes;

                    if ($ca_mes > 3) { // REVISAR TRASLADOS
                        $this->setHabilidad(0); // RETORNA INHABIL SI EL ORDINARIO NO HA PAGADO NINGUNA CUOTA
                    } else {
                        $this->setHabilidad(1); // RETORNA HABIL
                    }
                }
                //calcula el mes y ano ultimo
                $query_conmayor = $this->db_bdcolegio->query("select max(codcuota) as maximo from colcuota where regcol = ? and estado = 'P'", array($cip));
                $this->db_bdcolegio->close();
                $conmayor = $query_conmayor->row();
                $maycuo = $conmayor->maximo;

                if ($maycuo != NULL) {


                    $query_conmayorfec = $this->db_bdcolegio->query("select año, mes from cuota where codcuota=?", array($maycuo));
                    $this->db_bdcolegio->close();
                    $conmayorfec = $query_conmayorfec->row();
                    $maxaño = $conmayorfec->año;
                    $maxmes = $conmayorfec->mes;
                    $pm = $maxaño . $maxmes; //fecha de ultimo ano y mes pagados


                    $pc = $af . $mf;
                    $pf = $aa . $ma; //fecha de ano y mes actual
                    //verifica si esta en el rango de habiles
                    //calculo entre la cantidad de meses entre fecha actual y ultimo pagado
                    $query_concuoult = $this->db_bdcolegio->query("select period_diff(?,?) as ct", array($pf, $pm));
                    $this->db_bdcolegio->close();
                    $concuoult = $query_concuoult->row();
                    $numdif = $concuoult->ct;

                    if ($numdif <= 3) {


                        //Calculo de cantidad de meses entre fecinshab ultima pagada

                        $query_concuotot = $this->db_bdcolegio->query("select period_diff(?,?) as ct1", array($pm, $pc));
                        $this->db_bdcolegio->close();
                        $concuotot = $query_concuotot->row();
                        $numfectot = $concuotot->ct1;
                        $numfectot = $numfectot + 1;


                        //Calculo de cuotas pagadas desde fecinshab hasta fecparahab
                        $query_concuota = $this->db_bdcolegio->query("select count(*) as cantidad from colcuota where regcol=? and estado='P'", array($cip));
                        $this->db_bdcolegio->close();
                        $concuota = $query_concuota->row();
                        $numcolcuota = $concuota->cantidad;


                        if ($numcolcuota >= $numfectot) {

                           $this->setHabilidad(1);
                        }
                    } else {
                        $this->setHabilidad(0);
                    }
                } else {
                    $this->setHabilidad(0);
                    $this->setError(4);
                }
            } elseif ($this->getTipoclase() == 'T') {
                $query_concuotatem = $this->db_bdcolegio->query("Select count(*) as cantidad from colcuota cc, cuota c where cc.codcuota=c.codcuota and
		cc.regcol=? and año=? and mes=? and estado = 'P'", array($cip, $aa, $ma));
                $this->db_bdcolegio->close();
                $concuotatem = $query_concuotatem->row();
                $numtem = $concuotatem->cantidad;
                if ($numtem == 1) {
                    $this->setHabilidad(1);
                }
            }
//            //EVALUACION FINAL SI ESTA HABILITADO
//            $c1 = 0;
//            $c2 = 0;
//
//            $ah = $aa;
//            switch ($ma) {
//                case '01' : $vig_mes = '10';
//                    $ah = $aa - 1;
//                    break;
//                case '02' : $vig_mes = '11';
//                    $ah = $aa - 1;
//                    break;
//                case '03' : $vig_mes = '12';
//                    $ah = $aa - 1;
//                    break;
//                case '04' : $vig_mes = '01';
//                    break;
//                case '05' : $vig_mes = '02';
//                    break;
//                case '06' : $vig_mes = '03';
//                    break;
//                case '07' : $vig_mes = '04';
//                    break;
//                case '08' : $vig_mes = '05';
//                    break;
//                case '09' : $vig_mes = '06';
//                    break;
//                case '10' : $vig_mes = '07';
//                    break;
//                case '11' : $vig_mes = '08';
//                    break;
//                case '12' : $vig_mes = '09';
//                    break;
//            }
//
//            if ($aa == $ah) {
//
//                $query_conhabilita = $this->db_bdcolegio->query("select count(*) as cantidad from colcuota,cuota
//				where regcol=? and estado='P' and colcuota.codcuota=cuota.codcuota and año=? and mes>=?", array($cip, $aa, $vig_mes));
//                $this->db_bdcolegio->close();
//                $conhabilita = $query_conhabilita->row();
//                $cuotahabilita = $conhabilita->cantidad;
//            } else {
//                $query_conhabilita2 = $this->db_bdcolegio->query("select count(*) as cantidad from colcuota,cuota
//				where regcol=? and estado='P' and colcuota.codcuota=cuota.codcuota and año=? and mes>=?", array($cip, $ah, $vig_mes));
//                $this->db_bdcolegio->close();
//                $conhabilita2 = $query_conhabilita2->row();
//                $c1 = $conhabilita2->cantidad;
//
//                $query_conhabilita3 = $this->db_bdcolegio->query("select count(*) as cantidad from colcuota,cuota
//			where regcol=? and estado='P' and colcuota.codcuota=cuota.codcuota and año=$aa and mes>=01", array($cip, $aa));
//                $this->db_bdcolegio->close();
//                $conhabilita3 = $query_conhabilita3->row();
//                $c2 = $conhabilita3->cantidad;
//
//                $cuotahabilita = $c1 + $c2;
//            }

//
//            if ((($this->getHabilidad() == 0) && ($cuotahabilita > 0)) ||
//                    ($this->getHabilidad() == 1) && ($cuotahabilita > 0)) {
//                $this->setHabilidad(2);
//            }
//        }
//
//        if ($this->getHabilidad() == 0) {
//            if ($this->chkHabilitado($cip) == 1) {
//                $this->setHabilidad(4);
//            } else {
//                $this->setHabilidad(0);
//            }
//        }
            }  
             if ($this->chkHabilitado($cip) == 1) {
                 if ($this->getHabilidad() == 0) {
                  $this->setHabilidad(4);
                 }else{
                   $this->setHabilidad(2);   
                 }
             }
         
        } 
    

    function chkMultas($cip) {
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

        $query = $this->db_bdcolegio->query("select ce.codelec,motelec,multelec from col_eleccion ce inner join 
eleccion e on ce.codelec=e.codelec where regcol=? and estadoelec='O'", array($cip));
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                $this->setNummultas(1);
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function chkDeudas($cip) {
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
        $query = $this->db_bdcolegio->query("select cd.coddeuda,motivdeuda,saldodeu from col_deuda cd 
inner join otrasdeudas od on cd.coddeuda=od.coddeuda where regcol=? and estadodeu='NC'", array($cip));
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                $this->setNumdeudas(1);
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function verMeses($cip, $año) {

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

        $parametros = array($cip, $año);
        $query = $this->db_bdcolegio->query("CALL USP_CUENTA_MESFIX(?,?)", $parametros);
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function verExo($cip, $año) {

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

        $parametros = array($cip, $año);
        $query = $this->db_bdcolegio->query("SELECT c.codcuota, e.regcol, c.año, c.mes, round(sum( e.valorexo )) AS valor
        FROM col_exo e INNER JOIN cuota c ON c.codcuota = e.codcuota WHERE e.regcol = ? AND c.año = ? GROUP BY mes", $parametros);
        $this->db_bdcolegio->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function chkCuotas($cip) {
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
        $colegiado = $this->db_bdcolegio->query("select concat(apecol,' ', apematcol, ' ',nomcol) as nombres, direcol as direccion,falleccol,transfer
from colegiado where regcol=?", array($cip));
        $this->db_bdcolegio->close();
        $colegiadoqry = $colegiado->row();
        $this->setTransferencia($colegiadoqry->transfer);
        $this->setFallecido($colegiadoqry->falleccol);

        $query1 = $this->db_bdcolegio->query("select date_format(fecaportcol,'%Y') as año, 
  date_format(fecaportcol,'%m') as mes,fecaportcol from colegiado where regcol=?", array($cip));
        $this->db_bdcolegio->close();
        $nfic = $query1->row();
        if ($query1) {
            if (($query1->num_rows() > 0) && (date($nfic->fecaportcol) > date('1991-10-01'))) {

                $this->setAño($nfic->año);
                $this->setMes($nfic->mes);
            } else {
                $this->setAño(1991);
                $this->setMes(10);
            }
        }
        //Determina el año actual
        $actual = $this->db_bdcolegio->query("SELECT año as anioact from cuota order by año desc limit 1");
        $this->db_bdcolegio->close();
        $rowactual = $actual->row();
        $this->setAñoact($rowactual->anioact);
//      $mesact = substr($añoact, 5, 2);
        //Determinar año de convertirse en Vitalicio
        $vitalicio = $this->db_bdcolegio->query("select fecinscol from colegiado where regcol=?", array($cip));
        $this->db_bdcolegio->close();
        $rowvitalicio = $vitalicio->row();
        $rsañovi = $rowvitalicio->fecinscol;
        $meseva = substr($rsañovi, 5, 2);

        $añovi = intval(substr($rsañovi, 0, 4));
        if ($añovi == 0) {
            $this->setAñovi($this->getAño() + 30);
            $this->setMesvi(12);
        } else {
            if ($meseva == '12') {

                $this->setAñovi(intval(substr($rsañovi, 0, 4)) + 31);
                $this->setMesvi(1);
            } else {
                $this->setAñovi(intval(substr($rsañovi, 0, 4)) + 30);
                $this->setMesvi(intval(substr($rsañovi, 5, 2)) + 1);
            }
        }


        for ($i = $this->getAño(); $i <= $this->getAñoact(); $i++) {
            
        }
    }

}
?>