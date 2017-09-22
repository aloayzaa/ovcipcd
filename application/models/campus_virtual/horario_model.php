<?php

class Horario_model extends CI_Model {

    private $idhorario= '';
    private $dia = '';
    private $fechainicio = '';
    private $fechafin = '';
    private $horainicio = '';
    private $horafin = '';
    private $ambiente = '';
    private $idDocente = '';
    private $idCurso = '';
    private $diaslimite = ''; 
    private $duracion = '';
    private $costo = '';
    private $fechas = '';
    private $fechaTemporal = '';
    private $nroCuotas = '';
    private $nroModulos = '';
    private $cupoMax = '';
    private $fechaProrroga = '';
    private $descuento = '';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }
    
    public function getFechaProrroga() {
        return $this->fechaProrroga;
    }

    public function setFechaProrroga($fechaProrroga) {
        $this->fechaProrroga = $fechaProrroga;
    }

    public function getNroCuotas() {
        return $this->nroCuotas;
    }

    public function setNroCuotas($nroCuotas) {
        $this->nroCuotas = $nroCuotas;
    }

    public function getNroModulos() {
        return $this->nroModulos;
    }

    public function setNroModulos($nroModulos) {
        $this->nroModulos = $nroModulos;
    }

    public function getCupoMax() {
        return $this->cupoMax;
    }

    public function setCupoMax($cupoMax) {
        $this->cupoMax = $cupoMax;
    }
    
    public function getFechaTemporal() {
        return $this->fechaTemporal;
    }

    public function setFechaTemporal($fechaTemporal) {
        $this->fechaTemporal = $fechaTemporal;
    }

    public function getFechas() {
        return $this->fechas;
    }

    public function setFechas($fechas) {
        $this->fechas = $fechas;
    }

    public function getIdhorario() {
        return $this->idhorario;
    }

    public function setIdhorario($idhorario) {
        $this->idhorario = $idhorario;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function getDia() {
        return $this->dia;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }

    public function getFechainicio() {
        return $this->fechainicio;
    }

    public function setFechainicio($fechainicio) {
        $this->fechainicio = $fechainicio;
    }

    public function getFechafin() {
        return $this->fechafin;
    }

    public function setFechafin($fechafin) {
        $this->fechafin = $fechafin;
    }

    public function getHorainicio() {
        return $this->horainicio;
    }

    public function setHorainicio($horainicio) {
        $this->horainicio = $horainicio;
    }

    public function getHorafin() {
        return $this->horafin;
    }

    public function setHorafin($horafin) {
        $this->horafin = $horafin;
    }

    public function getAmbiente() {
        return $this->ambiente;
    }

    public function setAmbiente($ambiente) {
        $this->ambiente = $ambiente;
    }

    public function getIdDocente() {
        return $this->idDocente;
    }

    public function setIdDocente($idDocente) {
        $this->idDocente = $idDocente;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }
    
    public function getDiaslimite() {
        return $this->diaslimite;
    }
    
    public function setDiaslimite($diaslimite){
        $this->diaslimite = $diaslimite;
    }

    function horarioQry($criterio='') {
        if($criterio['criterio'] == 1){
            $query = $this->db->query("select h.nHorId as ID, concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente, concat(c.cCurNombre, ' > ', DATE_FORMAT(h.cHorFechaInicio,'%d/%m/%Y'), ' - ', DATE_FORMAT(h.cHorFechaFin,'%d/%m/%Y')) as Horario, h.cHorAmbiente as Ambiente 
                                from horario h 
                                inner join persona p on h.nPerId = p.nPerId 
                                inner join curso c on h.nCurId = c.nCurId 
                                where DATE_FORMAT(now(), '%Y/%m/%d') <= DATE_ADD(STR_TO_DATE(h.cHorFechaFin, '%Y/%m/%d'), INTERVAL 7 DAY) 
                                and h.nHorEstado = 0;");
        }
        else{
            $query = $this->db->query("select h.nHorId as ID, concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente, concat(c.cCurNombre, ' > ', DATE_FORMAT(h.cHorFechaInicio,'%d/%m/%Y'), ' - ', DATE_FORMAT(h.cHorFechaFin,'%d/%m/%Y')) as Horario, h.cHorAmbiente as Ambiente 
                                from horario h 
                                inner join persona p on h.nPerId = p.nPerId 
                                inner join curso c on h.nCurId = c.nCurId 
                                where DATE_FORMAT(now(), '%Y/%m/%d') > DATE_ADD(STR_TO_DATE(h.cHorFechaFin, '%Y/%m/%d'), INTERVAL 7 DAY) 
                                and h.nHorEstado = 0;");
        }
    
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function horarioIns(){
        $parametros = array($this->getIdDocente(), $this->getIdCurso(), $this->getFechainicio(), $this->getDia(), $this->getHorainicio(), $this->getAmbiente(), $this->getFechafin(), $this->getHorafin(), $this->getDiaslimite(), $this->getDuracion(), $this->getCosto(), $this->getFechas(), $this->getNroCuotas(), $this->getCupoMax(), $this->getDescuento(), $this->getNroModulos());
        $query = $this->db->query("call USP_CVI_I_Horario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function horarioSesionesInactivasIns(){
        $parametros = array($this->getIdhorario(),$this->getFechaTemporal());
        $query = $this->db->query("call USP_CVI_I_SesionTemporal (?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
      /*function horarioSesionesInactivasUpd(){
        $parametros = array($this->getFechaTemporal(),$this->getIdhorario());
        $query = $this->db->query("update sesion set cSesFechaProgramada=? where nHorId=? and nSesId='3'", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }*/
    
    function ultimoIDHorario(){
        $query = $this->db->query("select MAX(nHorId) as id from horario;");
        $row = $query->row();
        $ultimoId = $row->id;
        
        return $ultimoId;
    }

    function CursoCbo() {
        $query = $this->db->query("select nCurId, cCurNombre 
                                   from curso where nCurEstado = 1 order by cCurNombre asc ");
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }

    function DocenteCbo() {
        $query = $this->db->query("select nPerId, concat(cPerApellidoPaterno, ' ',cPerApellidoMaterno, ', ', cPerNombres) as Docente 
                                   from persona 
                                   where cPerTipo ='DO' and bPerEstado = 0
                                   order by cPerApellidoPaterno");
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
        
    
    function horarioGet($idHorario) {
        $query = $this->db->query("select * from horario where nHorId = ?", array($idHorario));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //Objeto 
            $this->setIdhorario($row->nHorId);
            $this->setIdDocente($row->nPerId);
            $this->setIdCurso($row->nCurId);
            $this->setDia($row->cHorDia);
            $this->setHorainicio($row->cHorHoraInicio);
            $this->setHorafin($row->cHorHoraFin);
            $this->setAmbiente($row->cHorAmbiente);
            $this->setFechainicio($row->cHorFechaInicio);
            $this->setFechafin($row->cHorFechaFin);
            $this->setDiaslimite($row->nHorDiasLimite);
            $this->setDuracion($row->nHorDuracion);
            $this->setCosto($row->nHorCosto);
            $this->setFechas($row->cHorFechas);
            $this->setNroCuotas($row->nHorCuotas);
            $this->setNroModulos($row->nHorModulos);
            $this->setCupoMax($row->nHorCupoMax);
            $this->setDescuento($row->nHorDescuento);
            return true;
        } else {
            return false;
        }
    }
    
    function horarioGetDetalle($idHorario) {
        $query = $this->db->query("select h.nHorId, concat(p.cPerApellidoPaterno, ' ',p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente, c.cCurNombre as Curso, h.cHorFechaInicio, h.cHorFechaFin, h.cHorDia, h.cHorHoraInicio, h.cHorHoraFin, h.cHorAmbiente, h.nHorDiasLimite, h.nHorDuracion, h.nHorCosto, h.cHorFechas, (select count(m.nHorId) from matricula m where m.nHorId = ? and m.nMatEstado='1' and m.nMatTipo='1') as Matriculados from horario h 
        inner join persona p on h.nPerId=p.nPerId 
        inner join curso c on h.nCurId=c.nCurId 
        where h.nHorId = ?;", array($idHorario, $idHorario));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $horario['idHorario'] = $row->nHorId;
            $horario['Docente'] = $row->Docente;
            $horario['Curso'] = $row->Curso;
            $horario['dia'] = $row->cHorDia;
            $horario['horainicio'] = $row->cHorHoraInicio;
            $horario['horafin'] = $row->cHorHoraFin;
            $horario['ambiente'] = $row->cHorAmbiente;
            $horario['fechainicio'] = $row->cHorFechaInicio;
            $horario['fechafin'] = $row->cHorFechaFin;
            $horario['diaslimite'] = $row->nHorDiasLimite;
            $horario['duracion'] = $row->nHorDuracion;
            $horario['costo'] = $row->nHorCosto;
            $horario['fechas'] = $row->cHorFechas;
            $horario['matriculados'] = $row->Matriculados;
            return $horario;
        } else {
            return false;
        }
    }
    
    function verificarHorarioActivo($idHorario) {
        $query = $this->db->query("select count(s.nHorId) as cantidad from sesion s 
                                  where s.nHorId=?;", array($idHorario));
        $row = $query->row();
        $verificar['cantidad'] = $row->cantidad;
        return $verificar;
    }
    
    function horarioUpd() {
        $parametros = array($this->getIdhorario(), $this->getIdDocente(), $this->getIdCurso(), $this->getFechainicio(), $this->getDia(), $this->getHorainicio(), $this->getAmbiente(), $this->getFechafin(), $this->getHorafin(), $this->getDiaslimite(), $this->getDuracion(), $this->getCosto(), $this->getFechas(), $this->getNroCuotas(), $this->getCupoMax(), $this->getDescuento());
        $query = $this->db->query("call USP_CVI_U_Horario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function horarioUpdProrroga() {
        $parametros = array($this->getIdhorario(), $this->getFechaProrroga());
        $query = $this->db->query("call USP_CVI_U_HorarioProrroga(?,?)",$parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function docentesCbo() {
        $query = $this->db->query("select nPerId, concat(cPerApellidoPaterno, ' ',cPerApellidoMaterno, ', ', cPerNombres) as Docente 
                                   from persona 
                                   where cPerTipo ='DO' and bPerEstado = 0
                                   order by cPerApellidoPaterno");
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                $data[''] = '';
                foreach ($query->result() as $fila) {
                    $data[$fila->nPerId] = $fila->Docente;
                }
                $result = form_dropdown("cbo_hor_docente", $data, '', 'id="cbo_hor_docente" data-placeholder="Seleccione un Docente" required="true" class="chzn-select" style="width:290px;"');
                return $result;
            }
        } else {
            return false;
        }
    }
    
    function fechasHorario($idHorario){
        $query = $this->db->query("select cHorFechas as fechas from horario h 
                                  where h.nHorEstado = 0 and h.nHorId = ?;", array($idHorario));
        $row = $query->row();
        $fechas = $row->fechas;
        
        return $fechas;
    }
    
    function horariosActivos(){
        $this->db->query("SET lc_time_names = 'es_PE'");
        $query = $this->db->query("select h.nHorId as ID, concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente, c.cCurNombre as Asignatura, DATE_FORMAT(h.cHorFechaInicio,'%d %M %y') as FechaInicio, DATE_FORMAT(h.cHorFechaFin,'%d %M %y') as FechaFin, h.cHorAmbiente as Ambiente, h.cHorDia as Dias, h.cHorHoraInicio as horaInicio, h.cHorHoraFin as horaFin, h.cHorFechas as Fechas 
                                  from horario h 
                                  inner join persona p on h.nPerId = p.nPerId 
                                  inner join curso c on h.nCurId = c.nCurId 
                                  where DATE_FORMAT(now(), '%Y/%m/%d') <= STR_TO_DATE(h.cHorFechaFin, '%Y/%m/%d') 
                                  and h.nHorEstado = 0;");
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function horarioComenzado($idHor) {
        $query = $this->db->query("SELECT h.cHorFechaInicio as FechaI,
                                          DATE_FORMAT( curdate( ) , '%Y/%m/%d' ) AS FechaA
                                   FROM horario AS h 
                                   WHERE h.nHorId = ?", array($idHor));
        
        foreach($query->result() as $row) {
            $fechaI = $row->FechaI;
            $fechaAc = $row->FechaA;
        }
        
        return $fechaI <= $fechaAc;
    }
    
    function validarHorario($idHorario){
        if($idHorario == null){
            $query = $this->db->query("select h.cHorAmbiente as Ambiente, h.cHorHoraInicio as horaInicio, h.cHorHoraFin as horaFin, h.cHorFechas as Fechas 
                                  from horario h 
                                  inner join persona p on h.nPerId = p.nPerId 
                                  inner join curso c on h.nCurId = c.nCurId 
                                  where h.nHorEstado = 0;");
        }
        else{
            $query = $this->db->query("select h.cHorAmbiente as Ambiente, h.cHorHoraInicio as horaInicio, h.cHorHoraFin as horaFin, h.cHorFechas as Fechas 
                                  from horario h 
                                  inner join persona p on h.nPerId = p.nPerId 
                                  inner join curso c on h.nCurId = c.nCurId 
                                  where h.nHorId != ? and h.nHorEstado = 0;", array($idHorario));
        }
        
        $filas = count($query);
        if($filas > 0){
        $i=0;
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $arreglo[$i] = $row->Fechas."-".$row->Ambiente."_".$row->horaInicio.$row->horaFin;
                $i++;
            }
        }
         else {
             $arreglo = null;
         }
        }
        else{
            $arreglo = null;
        }
        return $arreglo;
    }
    
    function sesionesHorario($idHorario){
        $query = $this->db->query("select DATE_FORMAT( s.cSesFechaProgramada, '%d/%m/%Y' ) AS FechaSesion, concat( p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres ) AS Docente, if( s.nSesEstado =1, 'AS', 'FA') AS EstadoH
FROM sesion s
INNER JOIN horario h ON s.nHorId = h.nHorId
INNER JOIN persona p ON h.nPerId = p.nPerId
WHERE s.nHorId =?", array($idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function sesionesFinalizadasHorario($idHorario){
        $query = $this->db->query("select s.nSesId, DATE_FORMAT(s.cSesFechaProgramada, '%d/%m/%Y') as cSesFechaProgramada from sesion s 
                                  where s.nHorId = ? 
                                  and DATE_FORMAT(now(), '%Y/%m/%d') > STR_TO_DATE(s.cSesFechaProgramada, '%Y/%m/%d') 
                                  and s.nSesEstado = 0;", array($idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function asistenciasDocenteHorario($idHorario){
        $query = $this->db->query("select DATE_FORMAT(ad.cAdoFecha, '%d/%m/%Y') as Fecha, ad.cAdoValor as Estado from asistencia_docente ad 
                                  inner join sesion s on ad.nSesId = s.nSesId 
                                  inner join horario h on s.nHorId = h.nHorId 
                                  where h.nHorId = ?;", array($idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function horarioDel(){
        $query = $this->db->query("call USP_CVI_D_Horario(?)",array($this->getIdhorario()));
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function sesionesJustificar(){
        $query = $this->db->query("select s.nSesId, s.cSesTitulo from sesion s
                                  where s.nHorId = ?", array($valor));
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
	function sumarDias($fecha){
        $query = $this->db->query("select DATE_FORMAT(DATE_ADD('".$fecha."', INTERVAL 7 DAY), '%Y/%m/%d') as sumaDias;");
        $row = $query->row();
        $fecha = $row->sumaDias;
        
        return $fecha;
    }

    function promediosFinales($idHorario){
        $query = $this->db->query("select concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Alumno, sum(n.cNotValor)/count(*) as Promedio, if(sum(n.cNotValor)/count(*) >= 10.5, 'Aprobado', 'Desaprobado') as Estado from nota n 
                                  inner join persona p on n.nPerId = p.nPerId 
                                  inner join sesion s on n.nSesId = s.nSesId 
                                  inner join horario h on s.nHorId = h.nHorId 
                                  where h.nHorId = ? 
                                  group by p.nPerId;", array($idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function diaFecha($fecha){
        $query = $this->db->query("select dayofweek('".$fecha."') as dia;");
        $row = $query->row();
        $diaNombre = $row->dia;
        
        return $diaNombre;
    }
    
    function fechaActual(){
        $query = $this->db->query("select date_format(curdate(), '%Y/%m/%d') as hoy;");
        $row = $query->row();
        $fecha = $row->hoy;
        
        return $fecha;
    }

}

?>
