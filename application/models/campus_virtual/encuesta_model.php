<?php

class Encuesta_model extends CI_Model {
    
    private $idpregunta;
    private $idHorario;
    private $enunciado = '';
    private $bloque = '';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getIdpregunta() {
        return $this->idpregunta;
    }

    public function setIdpregunta($idpregunta) {
        $this->idpregunta = $idpregunta;
    }

     public function setIdHorario($idHorario){
        $this->idHorario = $idHorario;
    }

    public function getIdHorario(){
        return $this->idHorario;
    } 
    
    public function getEnunciado() {
        return $this->enunciado;
    }

    public function setEnunciado($enunciado) {
        $this->enunciado = $enunciado;
    }

    public function getBloque() {
        return $this->bloque;
    }

    public function setBloque($bloque) {
        $this->bloque = $bloque;
    }

    function encuestaIns(){
        $parametros = array($this->getEnunciado(), $this->getBloque());

        $query = $this->db->query("call USP_CVI_I_Pregunta(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function encuestahorarioIns(){

        $parametros = array($this->getIdpregunta(), $this->getIdHorario());
        $query = $this->db->query("call USP_CVI_I_EncuestaHorario(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
               }
   }
   function estadisticaDocente($idHorario) {
        $query = $this->db->query("SELECT pe.nHorId , p.nPreBloque, sum(r.nRenValor) as valores, COUNT(*) as numero
                                    FROM pregunta_encuesta pe
                                    INNER JOIN pregunta p ON pe.nPreId = p.nPreId
                                    INNER JOIN respuesta r ON pe.nPreId = r.nPreId
                                    WHERE p.nPreBloque =1
                                    AND r.nHorId = ".$idHorario);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $estadistica['valores'] = $row->valores;
            $estadistica['numero'] = $row->numero;
            return $estadistica;
        } else {
            return false;
        }
    }
   function encuestahorarioDel(){

        $parametros = array($this->getIdpregunta(), $this->getIdHorario());
        $query = $this->db->query("call USP_CVI_D_EncuestaHorario(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
               }
   }
    
    function encuestaQry($criterio='') {
        $query = $this->db->query("SELECT nPreId,cPreEnunciado FROM pregunta 
                                   where nPreEstado = 1 and nPreBloque= ".$criterio['criterio']);
         if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function preguntaEstado(){
        $parametros= array($this->getIdpregunta());
        $query = $this->db->query("call USP_CVI_U_preguntaEstado(?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function encuestaelim(){
        $parametros= array($this->getIdHorario()); 
        $query = $this->db->query("call USP_CVI_D_encuestaasignada (?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function activarencuesta(){
        $parametros= array($this->getIdHorario()); 
        $query = $this->db->query("call USP_CVI_U_activaencuesta (?)",$parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function reporteEncuestaQry($criterio='') {
        $query = $this->db->query("SELECT DISTINCT (h.nHorId) as ID, concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente,
                                   c.cCurNombre as Curso, concat(h.cHorAmbiente , ' < ', h.cHorFechaInicio, ' - ', h.cHorFechaFin, ' > ') as Horario
                                   FROM  respuesta re
                                   INNER JOIN horario h ON re.nHorId = h.nHorId
                                   INNER JOIN curso c ON h.nCurId = c.nCurId
                                   INNER JOIN persona p on h.nPerId=p.nPerId
                                   WHERE INSERT(h.cHorFechaInicio, 5, 7, '') = ?;", array($criterio['criterio']));
         if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function listadoEncuestaQry($criterio='') {
        $query = $this->db->query("SELECT DISTINCT (pe.nHorId) as ID, concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente,
                                   c.cCurNombre as Curso, concat(h.cHorAmbiente , ' < ', h.cHorFechaInicio, ' - ', h.cHorFechaFin, ' > ') as Horario
                                  from pregunta_encuesta pe 
                                    inner join horario h on pe.nHorId = h.nHorId 
                                    inner join curso c on h.nCurId=c.nCurId
                                    inner join persona p on h.nPerId=p.nPerId 
                                   WHERE INSERT(h.cHorFechaInicio, 5, 7, '') = ?;", array($criterio['criterio']));
         if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
   
    function encuestaGet($idpregunta) {
        $query = $this->db->query("select * from pregunta where nPreId = ?", array($idpregunta));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setEnunciado($row->cPreEnunciado);
            return true;
        } else {
            return false;
        }
    }

    function damePreguntas( $idHorario) {
        $query = $this->db->query("SELECT h.nHorId, p.cPreEnunciado, p.nPreId FROM matricula m
                                    INNER JOIN horario h ON m.nHorId = h.nHorId
                                    INNER JOIN pregunta_encuesta e ON m.nHorId = e.nHorId
                                    INNER JOIN pregunta p On e.nPreId = p.nPreId
                                    WHERE h.nHorId = ?", array( $idHorario) );
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function GetDetalle($idHorario) {
        $query = $this->db->query("SELECT COUNT(DISTINCT re.nPerId) as Num, c.cCurNombre as Curso, h.nHorId as ID
                                   FROM  respuesta re
                                   INNER JOIN horario h ON re.nHorId = h.nHorId
                                   INNER JOIN curso c ON h.nCurId = c.nCurId
                                   INNER JOIN persona p on h.nPerId=p.nPerId
                                   WHERE h.nHorId=?;", array($idHorario,));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $horario['Curso'] = $row->Curso;
            $horario['Num'] = $row->Num;
            $horario['ID'] = $row->ID;
            return $horario;
        } else {
            return false;
        }
    }

    function CursoCbo(){
        $query = $this->db->query('CALL USP_CVI_S_CursosHorario()');
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }


    function HorarioCbo($id){

        $query = $this->db->query("SELECT h.nHorId, c.cCurNombre, h.cHorFechaInicio, h.cHorDia, h.cHorHoraInicio, cHorHoraFin
                                        FROM curso AS c
                                        INNER JOIN horario AS h
                                        WHERE h.nCurId=c.nCurId
                                        AND c.nCurEstado = 1 and h.nHorEstado = 0
                                        AND h.nCurId = ? AND h.cHorFechaFin>DATE_FORMAT(curdate(),'%d/%m/%Y');",$id);

        if (count($query) > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }

    function validarEncuesta($idCurso){
        $parametros= array($idCurso);

        $query = $this->db->query("select * from curso");

        if ($query->num_rows() > 0) {
            $this->db->close();
        } else {
            return null;
        }
    }
    
    function PreguntaCheBx() {
        $query = $this->db->query("select * from pregunta where nPreEstado = 1");
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function valorRespuesta($idHorario) {
        $query = $this->db->query("SELECT nRenValor,count(nRenValor) AS m1
                                   FROM respuesta WHERE
                                   nPreId=1 and nHorId = ?",array($idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function encuestaUpd() {
        $parametros = array( $this->getIdpregunta(), $this->getEnunciado());
        $query = $this->db->query("call USP_CVI_U_Pregunta(?,?)",$parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }


    
    function dameIDPreguntas($idHorario) {
        $query = $this->db->query("select pe.nPreId, p.cPreEnunciado from pregunta_encuesta pe
                                   inner join pregunta p ON pe.nPreId = p.nPreId
                                   where pe.nHorId = ".$idHorario);
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function dameValores($idPregunta, $idHorario){
        $query = $this->db->query("select r.nPreId, r.nRenValor, count(*) as cantidad from respuesta r
                                  where r.nPreId = ? and r.nHorId = ?
                                  group by r.nRenValor;", array($idPregunta, $idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function tablaReporte($idHorario){
        $tabla = '';
        $tabla = $tabla.'<table width="670px" class="table table-striped dataTable dataTable-noheader dataTable-nofooter table-bordered">';
        $tabla = $tabla.'<thead>';
        $tabla = $tabla.'<tr>';
        $tabla = $tabla.'<th width="75%" >';
        $tabla = $tabla.'<h3>';
        $tabla = $tabla.'Pregunta';
        $tabla = $tabla.'</h3>';
        $tabla = $tabla.'</th>';
        $tabla = $tabla.'<th width="5%">';
        $tabla = $tabla.'<h3>';
        $tabla = $tabla.'1';
        $tabla = $tabla.'</h3>';
        $tabla = $tabla.'</th >';
        $tabla = $tabla.'<th width="5%">';
        $tabla = $tabla.'<h3>';
        $tabla = $tabla.'2';
        $tabla = $tabla.'</h3>';
        $tabla = $tabla.'</th>';
        $tabla = $tabla.'<th width="5%">';
        $tabla = $tabla.'<h3>';
        $tabla = $tabla.'3';
        $tabla = $tabla.'</h3>';
        $tabla = $tabla.'</th>';
        $tabla = $tabla.'<th width="5%">';

        $tabla = $tabla.'<h3>';
        $tabla = $tabla.'4';
        $tabla = $tabla.'</h3>';
        $tabla = $tabla.'</th>';
        $tabla = $tabla.'<th width="5%">';
        $tabla = $tabla.'<h3>';
        $tabla = $tabla.'5';
        $tabla = $tabla.'</h3>';
        $tabla = $tabla.'</th>';
        $tabla = $tabla.'</tr>';
        $tabla = $tabla.'</thead>';
        $res = $this->dameIDPreguntas($idHorario);
        if($res != false){
            foreach($res as $fila){
                $tabla = $tabla.'<tr>';
                $tabla = $tabla.'<td>';
                $tabla = $tabla.$fila->cPreEnunciado;
                $tabla = $tabla.'</td>';
                $val = $this->dameValores($fila->nPreId, $idHorario);
                if($val != false){
                    $tabla = $tabla.'<th>';
                    foreach($val as $fil){
                        if($fil->nRenValor == '1'){
                            $tabla = $tabla.$fil->cantidad;
                        }
                    }
                    $tabla = $tabla.'</th>';
                    $tabla = $tabla.'<th>';
                    foreach($val as $fil){
                        if($fil->nRenValor == '2'){
                            $tabla = $tabla.$fil->cantidad;
                        }
                    }
                    $tabla = $tabla.'</th>';
                    $tabla = $tabla.'<th>';
                    foreach($val as $fil){
                        if($fil->nRenValor == '3'){
                            $tabla = $tabla.$fil->cantidad;
                        }
                    }
                    $tabla = $tabla.'</th>';
                    $tabla = $tabla.'<th>';
                    foreach($val as $fil){
                        if($fil->nRenValor == '4'){
                            $tabla = $tabla.$fil->cantidad;
                        }
                    }
                    $tabla = $tabla.'</th>';
                    $tabla = $tabla.'<th>';
                    foreach($val as $fil){
                        if($fil->nRenValor == '5'){
                            $tabla = $tabla.$fil->cantidad;
                        }
                    }
                    $tabla = $tabla.'</th>';
                }
                $tabla = $tabla.'</tr>';
            }
            $tabla = $tabla.'</table>';
        }
        return $tabla;
    }


}
?>
