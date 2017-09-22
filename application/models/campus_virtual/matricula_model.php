<?php

class Matricula_model extends CI_Model {

    private $alumno = array();
    private $idAlumno;
    private $idHorario;
    private $estado = 1;
    private $tipo;
    private $fecha;
    private $descuento;
    private $observacion;
    private $curso;
   
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    Public function getCurso() {
        return $this->curso;
    }

    Public function setCurso($curso) {
        $this->curso = $curso;
    }
    public function setIdAlumno($idAlumno) {
        $this->idAlumno = $idAlumno;
    }

    public function getIdAlumno() {
        return $this->idAlumno;
    }

    public function setIdHorario($idHorario) {
        $this->idHorario = $idHorario;
    }

    public function getIdHorario() {
        return $this->idHorario;
    }

    public function setTipo($Tipo) {
        $this->tipo = $Tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getAlumno() {
        return $this->alumno;
    }

    public function setAlumno($al) {
        $this->alumno = $al;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($es) {
        $this->estado = $es;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function matriculaIns() {
        $parametros = array($this->getIdAlumno(),
            $this->getIdHorario(),
            $this->getTipo(),
            $this->getEstado(),
            $this->getDescuento(),
            $this->getObservacion());
        $query = $this->db->query('CALL USP_CVI_I_Matricula(?,?,?,?,?,?)', $parametros);
            $this->db->close();

        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function CursoCbo() {
        $query = $this->db->query('CALL USP_CVI_S_CursosHorario()');
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function HorarioCbo($id) {

        $query = $this->db->query("SELECT h.nHorId, c.cCurNombre, h.cHorFechaInicio, h.cHorDia, h.cHorHoraInicio, cHorAmbiente
                                        FROM curso AS c
                                          INNER JOIN horario AS h
                                        WHERE h.nCurId=c.nCurId
                                        AND c.nCurEstado = 1
                                        AND h.nHorEstado = 0
                                        AND h.nCurId = " . $id . " AND DATE_ADD(DATE_FORMAT(h.cHorFechaFinProrroga, '%Y-%m-%d'), INTERVAL 15 DAY) >= curdate();");
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscarAlumno($dni) {
        $resp = false;

        $query = $this->db->query("select p.nPerId,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno,      
                                    pr.cPdeValor as DNI,      
                                    ifnull(pt.cPdeValor,'') as Celular,      
                                    ifnull(pdt.cPdeValor,'') as Direccion,
                                    ifnull(pe.cPdeValor,'') as Correo,
                                    ifnull(pde.cPdeValor,'') as CIP
                                    from persona p            
                                    INNER join persona_detalle pr on pr.nPerId=p.nPerId and pr.nParId=1 and pr.nPcaId=1 and pr.bPdeEliminado ='0'      
                                    LEFT join persona_detalle pt on pt.nPerId=p.nPerId and pt.nParId=3 and pt.nPcaId=3 and pt.bPdeEliminado ='0'      
                                    LEFT join persona_detalle pdt on pdt.nPerId=p.nPerId and pdt.nParId=1 and pdt.nPcaId=7 and pdt.bPdeEliminado ='0'      
                                    LEFT join persona_detalle pe on pe.nPerId=p.nPerId and pe.nParId=1 and pe.nPcaId=4 and pe.bPdeEliminado ='0'
                                    LEFT join persona_detalle pde on pde.nPerId=p.nPerId and pde.nParId=2 and pde.nPcaId=15 and pde.bPdeEliminado ='0'
                                    WHERE pr.cPdeValor=ltrim(rtrim('" . $dni . "'))");
        $this->db->close();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->alumno['id'] = ($row->nPerId);
            $this->alumno['nombres'] = ($row->cPerNombres);
            $this->alumno['apellidoPaterno'] = ($row->cPerApellidoPaterno);
            $this->alumno['apellidoMaterno'] = ($row->cPerApellidoMaterno);
            $this->alumno['dni'] = ($row->DNI);
            $this->alumno['celular'] = ($row->Celular);
            $this->alumno['correoElectronico'] = ($row->Correo);
            $this->alumno['direccion'] = ($row->Direccion);
            if($row->CIP==""){
                $this->alumno['cip'] = "No Existe CIP";}
            else {
                $this->alumno['cip'] = ($row->CIP);
            }
                
            $resp = true;
             return $resp;
        } else {
                        return  $resp = false;;
            }

    }

    function HorarioCbo1() {
        $query = $this->db->query("SELECT h.nHorId, c.cCurNombre, h.cHorFechaInicio, h.cHorDia, h.cHorHoraInicio, h.cHorAmbiente, h.cHorFechaFin
FROM curso AS c
INNER JOIN horario AS h ON h.nCurId = c.nCurId
WHERE h.nHorEstado =0
AND DATE_ADD( DATE_FORMAT(h.cHorFechaFinProrroga, '%Y-%m-%d'), INTERVAL 15
DAY ) >= curdate();");
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function buscarAlumnoId($idAlumno) {
        $resp = false;

        $query = $this->db->query("select p.nPerId,
                                         CONCAT(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as Alumno,
                                         pr.cPdeValor as DNI,      
                                         ifnull(pt.cPdeValor,'') as Telefono,      
                                         ifnull(pdt.cPdeValor,'') as Direccion,
                                         ifnull(pe.cPdeValor,'') as Correo 
                                         from persona p            
                                            INNER join persona_detalle pr on pr.nPerId=p.nPerId and pr.nParId=1 and pr.nPcaId=1 and pr.bPdeEliminado ='0'      
                                            LEFT join persona_detalle pt on pt.nPerId=p.nPerId and pt.nParId=1 and pt.nPcaId=3 and pt.bPdeEliminado ='0'      
                                            LEFT join persona_detalle pdt on pdt.nPerId=p.nPerId and pdt.nParId=1 and pdt.nPcaId=7 and pdt.bPdeEliminado ='0'      
                                            LEFT join persona_detalle pe on pe.nPerId=p.nPerId and pe.nParId=1 and pe.nPcaId=4 and pe.bPdeEliminado ='0'     
                                         WHERE p.nPerId=ltrim(rtrim(?))", array($idAlumno));
        $this->db->close();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->alumno['id'] = ($row->nPerId);
            $this->alumno['alumno'] = ($row->Alumno);
            $this->alumno['dni'] = ($row->DNI);
            $resp = true;
        } else {
            $resp = false;
        }

        return $resp;
    }

    function matriculaQry($criterio = '') {
        $tipo = strstr($criterio['criterio'], '-', true);
        $cur = str_replace("-", "", strstr($criterio['criterio'], '-'));
        if ($cur != 0) {
            $query = $this->db->query("SELECT UPPER( CONCAT( p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ' ', p.cPerNombres ) ) AS Alumno,pd.cPdeValor as Dni, m.nPerId AS AlumnoId,pc.cPdeValor AS Correo,pt.cPdeValor AS Celular, c.cCurNombre AS Curso, h.cHorFechaInicio AS Fecha_Inicio, h.cHorDia AS Dia, h.cHorHoraInicio AS Hora_Inicio, h.cHorHoraFin AS Hora_Fin, h.cHorAmbiente AS Ambiente, m.nHorId AS HorarioId, CONCAT( m.nPerId, ',', m.nHorId ) AS IdCombinado
FROM matricula AS m
INNER JOIN persona AS p
LEFT JOIN persona_detalle pd ON pd.nPerId = p.nPerId
AND pd.nParId =1
AND pd.nPcaId =1
LEFT JOIN persona_detalle pc ON pc.nPerId = p.nPerId
AND pc.nParId =1
AND pc.nPcaId =4
LEFT JOIN persona_detalle pt ON pt.nPerId = p.nPerId
AND pt.nParId =3
AND pt.nPcaId =3
INNER JOIN horario AS h
INNER JOIN curso AS c
WHERE m.nPerId = p.nPerId
AND pd.nPerId = p.nPerId and pd.nParId =1 and pd.nPcaId=1
AND m.nHorId = h.nHorId
AND h.nCurId = c.nCurId
AND m.nMatTipo = " . $tipo . " AND m.nHorId = " . $cur . " AND m.nMatEstado =1
AND h.nHorEstado =0
AND c.nCurEstado =1
ORDER BY m.cMatFecha DESC;");
        } else {
            $query = $this->db->query("CALL USP_CVI_S_Matricula_ByTipo(?)", $criterio['criterio']);
        }
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
function reservas_inactivas() {
   $fecha_combinada = $this->db->query("select DATE_FORMAT(date_sub(curdate(), INTERVAL 3 DAY),'%Y/%m/%d') as fecha_combinada");
     $row= $fecha_combinada ->row();
   $valor_fecha = $row->fecha_combinada;
       $personas = $this->db->query("select nPerId from matricula where nMatTipo=0 and cMatFecha =?",array($valor_fecha));
        $parametro = '';
        $count = 1;
         foreach ($personas->result() as $row) {
            $valor = $row->nPerId;
            if ($count == 1) {
                $parametro = $valor;
            } else {
                $parametro = $parametro . "," . $valor;
            }
            $count++;
        }
  //========================================================
 $horario = $this->db->query("select nHorId from matricula where nMatTipo=0 and cMatFecha =?",array($valor_fecha));
        $param_horario = '';
        $count1 = 1;
        foreach ($horario->result() as $row) {
            $valor1 = $row->nHorId;
            if ($count1 == 1) {
                $param_horario = $valor1;
            } else {
                $param_horario = $param_horario . "," . $valor1;
            }
            $count1++;
       }
       // echo "hasta aqui llegooo".$parametro."  ".$param_horario;
        if($parametro!=""&&$param_horario!=""){
        $query = $this->db->query("DELETE FROM matricula WHERE nPerId IN ($parametro) and nHorId in($param_horario)");
        }
        else {$query=true;}
        if ($query) {
            return true;
        } else {
              throw new Exception('error al recuperar datos de la BD');
        }
    }


    function matriculaDel() {
        $parametros = array($this->getIdAlumno(),
            $this->getIdHorario());
        $query = $this->db->query("call USP_CVI_U_MatriculaEstado(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function matriculaDel2($idAlumno, $idHorario) {
        $parametros = array($idAlumno,
            $idHorario);
        $query = $this->db->query("call USP_CVI_D_Matricula(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function validarMatricula($idAlumno, $idCurso) {
        $parametros = array($idAlumno,
            $idCurso);

        $query = $this->db->query("call USP_CVI_S_MatriculaCurso(?,?)", $parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $count = $row->Count;

            return $count;
        } else {
            return null;
        }
    }

    function buscarMatricula($idAlumno, $idHorario) {
        // Get Datos Alumno
        $parametros = array($idAlumno,
            $idHorario);
        $query = $this->db->query("SELECT m.nPerId,CONCAT(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) AS Nombre,pd.cPdeValor as dni, 
                                                    h.nCurId AS CursoId, 
                                                    h.nHorCosto AS Costo,
                                                    c.cCurTipo AS TipoCurso,
                                                    m.nMatTipo AS TipoMatricula,
                                                    IF(m.nMatDescuento = 1, h.nHorDescuento, 0) AS Descuento,
                                                    m.nMatDescuento AS Des
                                         FROM matricula AS m
                                         INNER JOIN persona AS p ON m.nPerId = p.nPerId
                                         INNER JOIN persona_detalle AS pd ON p.nPerId = pd.nPerId and pd.nParId=1 and pd.nPcaId=1
                                         INNER JOIN horario AS h ON m.nHorId = h.nHorId
                                         INNER JOIN curso AS c ON h.nCurId = c.nCurId
                                         WHERE m.nPerId=? AND m.nHorId=?;", $parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setAlumno(array('persona' => $row->Nombre,
                'CursoId' => $row->CursoId,
                'nPerId' => $row->nPerId,
                'dni' => $row->dni,
                'Costo' => $row->Costo,
                'Descuento' => $row->Des,
                'TipoCurso' => $row->TipoCurso,
                'TipoMatricula' => $row->TipoMatricula));
            $resp = true;
        } else {
            $resp = false;
        }

        return $resp;
    }

    function matriculaAlumnoIns($dni) {
        //echo $dni;
        $query1 = $this->bdcolegio->query("SELECT ifnull(apecol,'') as Apellido_Paterno, 
                                                  ifnull(apematcol,'') as Apellido_Materno,
                                                  ifnull(nomcol,'') as Nombre, 
                                                  ifnull(direcol,'') as Dirección,
                                                  ifnull(telcol,'') as Telefono,
                                                  ifnull(emailsec,'') as Correo,
                                                  ifnull(lecol,'') as DNI,
                                                  ifnull(regcol,'') as CIP
                                           FROM colegiado
                                           WHERE lecol=ltrim(rtrim(?));", array($dni));
        $this->bdcolegio->close();
        if ($query1->num_rows() > 0) {
            $row1 = $query1->row();
            $parametros = array($row1->Apellido_Paterno,
                $row1->Apellido_Materno,
                $row1->Nombre,
                '0',
                'AL',
                $row1->DNI,
                $row1->Dirección,
                $row1->Telefono,
                $row1->Correo,
                $row1->CIP,
                $row1->CIP
            );
        }

        $query = $this->db->query("CALL USP_CVI_I_Persona(?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        //$this->alumno['id'] = $this->db->query("SELECT MAX(nPerId) FROM persona");
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

   /* ya no vale function ultimoAlumno($dni) {
        $query = $this->bdcolegio->query("select regcol from colegiado where lecol = ?", array($dni));
        $this->bdcolegio->close();
        $row_dni = $query->row();
        $nick = $row_dni->regcol;
        $resul = "";
        $query2 = $this->db->query("select nPerId from usuario where cUsuNick =?", array($nick));
        $this->db->close();
        if ($query2->num_rows() > 0) {
            $row = $query2->row();
            $resul = $row->nPerId;
        }
        return $resul;
    }*/

    function validarCantidad($idHor) {
        $query = $this->db->query("SELECT COUNT(m.nPerId) AS Cantidad,
                                                h.nHorCupoMax AS Cupo 
                                        FROM matricula AS m 
                                        JOIN horario AS h ON m.nHorId = h.nHorId
                                        WHERE m.nHorId = ? AND m.nMatTipo = 1 AND m.nMatEstado = 1", array($idHor));
        foreach ($query->result() as $row) {
            $cant = $row->Cantidad;
            $cupo = $row->Cupo;
        }

        if ($cant == $cupo) {
            $query = $this->db->query("SET SQL_SAFE_UPDATES=0;
                                             UPDATE matricula SET nMatEstado = 0 WHERE nMatTipo = 0 AND nHorId = ?;", array($idHor));
        }

        return $cant < $cupo;
    }

    function cambiarHorario($idHorarioNuevo) {
        $parametros = array($this->getIdAlumno(), $this->getIdHorario(), $idHorarioNuevo);
        $query = $this->db->query("CALL USP_CVI_U_HorarioMatricula(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function matriculaPermisosIns() {
        $parametros = array($this->getIdAlumno());
        $query1 = $this->db->query("select nUsuId from usuario where nPerId = ?", $parametros);
              if($query1->num_rows()>0){
                           $fila=$query1->row();
                            $usuario = $fila->nUsuId;
        $query2 = $this->db->query("select nUsuId,nObjId
                                    from usuario_objeto
                                    where nUsuId = " . $usuario . " and nObjId = 31;");
        if ($query2->num_rows() == 0) {
            $query = $this->db->query("CALL USP_CVI_I_PermisosAl(?)", array($usuario));
            $this->db->close();
            if ($query) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }
        } else {
            return true;
        }
              }

              else {
  $validar = $this->db->query("call USP_CVI_I_USUARIOS_NODATOS(?)", $parametros);
    if ($validar) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }
              }
    }

    //---------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------

    function getDescripcionHorario($idHorario) {
        $query = $this->db->query('SELECT c.cCurNombre as nombre FROM matricula m 
                                    INNER JOIN horario h ON m.nHorId = h.nHorId 
                                    INNER JOIN curso c ON h.nCurId = c.nCurId 
                                    WHERE h.nHorId = ?;', array($idHorario));
        $this->db->close();
        if (count($query) > 0) {
            $row = $query->row();
            return $row->nombre;
        } else {
            return null;
        }
    }

   /* ya no vale function getPagosFaltantes($idPersona, $idHorario) {
        $query = $this->db->query('SELECT * FROM pago p 
                                    WHERE p.nPerId=? 
                                    AND p.nHorId=? 
                                    AND p.nPagMonto<>p.nPagAcuenta;', array($idPersona, $idHorario));
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }*/

    private $comprobante;
    private $monto;
    private $tipocomprobante;

    public function getComprobante() {
        return $this->comprobante;
    }

    public function setComprobante($comprobante) {
        $this->comprobante = $comprobante;
    }

    public function getMonto() {
        return $this->monto;
    }

    public function setMonto($monto) {
        $this->monto = $monto;
    }

    public function getTipocomprobante() {
        return $this->tipocomprobante;
    }

    public function setTipocomprobante($tipocomprobante) {
        $this->tipocomprobante = $tipocomprobante;
    }
    
    function evaluarcambioHorario($idAlumno, $idHorario){
         $parametros = array($idHorario, $idAlumno);
         $query =$this->db->query("select * from pago where nHorId=? and nPerId=? and nEstPago=1",$parametros);
         $row = $query->row();
         $observacion=$row->cPagObservacion;
         
       // echo "numero de registros";
          $nregistros=$query->num_rows();
       //   echo $nregistros;

         if($observacion=='Ninguna' && $nregistros==1){
            return 1;
         }
         else if($observacion=='Ninguna' && $nregistros>1){
            return 0;
         }
         else if($observacion!='Ninguna' && $nregistros>1){
            return 0;
         }
         else if($observacion!='Ninguna' && $nregistros==1){
            return 0;
         }
    }

    function matriculaUpd($horarioantes, $horariodespues, $idAlumno) {
        //echo "Modelohorarioantes: ".$horarioantes."horariodespues: ".$horariodespues."idalumno".$idAlumno;

        $parametros = array($idAlumno, $horarioantes, $horariodespues);
        $query = $this->db->query("CALL USP_CVI_U_HorarioMatricula(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
           return false;
        }
    }

    function pagosCurso($idAlumno, $idHorario, $estado) {
        if ($estado == 1) {
            $parametros = array($idHorario, $idAlumno);
            $query = $this->db->query("select sum(nPagAcuenta) as nPagAcuenta from pago where nHorId=? and nPerId=? and nEstPago=1", $parametros);
        } else if ($estado == 2) {
            $parametros = array($idHorario, $idAlumno);
            $query = $this->db->query("SELECT sum(pago.nPagAcuenta) as nPagAcuenta FROM pago inner join horario on pago.nHorId=horario.nHorId where horario.nCurId=? and pago.nPerId=? and nEstPago=1", $parametros);
        }

        if ($query->num_rows() > 0) {
            $reg = $query->row();
            $valor = $reg->nPagAcuenta;
            return $valor;
        } else {
            return false;
        }
    }

    function montoCurso($idHorario, $idAlumno, $estado) {
        $estado_descuento = 0;

        if ($estado == 1) {

            $parametros = array($idHorario);
            $query = $this->db->query('select * from horario inner join curso ON horario.nCurId = curso.nCurId where nHorId=?', $parametros);
            $row = $query->row();
            $cuenta_ingreso = $row->nCurCuentaIngreso;
            $descuento = $row->nHorDescuento;
        } else if ($estado == 2) {
            $parametros = array($idHorario);
            $query = $this->db->query('select * from curso where nCurId=?', $parametros);
            $row = $query->row();
            $cuenta_ingreso = $row->nCurCuentaIngreso;
            $query = $this->db->query('select * from horario where nCurId=? and nHorEstado=0 limit 1', $parametros);
            $row = $query->row();
            $descuento = $row->nHorDescuento;
        }
        $parametros = array($idHorario, $idAlumno);
        $matricula = $this->db->query("select * from matricula where nHorId=? and nPerId=? and nMatTipo=1 and nMatEstado=1", $parametros);
        if ($matricula->num_rows() > 0) {
            $reg = $matricula->row();
            $estado_descuento = $reg->nMatDescuento;
        }

       // $query1 = $this->bdcolegio->query("select * from cuenta_ing where codctaing=" . $cuenta_ingreso);
$query1 = $this->db->query("SELECT h.nHorCosto AS valorctaing FROM horario h INNER JOIN curso c ON h.nCurId = c.nCurId WHERE h.nHorEstado =0 AND c.nCurCuentaIngreso =?",$cuenta_ingreso);
        if ($query1->num_rows() > 0) {
            $reg = $query1->row();
            $valor = $reg->valorctaing;
            if ($estado_descuento != "") {
                if ($estado_descuento == 1) {
                    $valor = $valor - ($descuento * $valor / 100);
                }
            }
            return $valor;
        } else {
            return false;
        }
    }

    function actualizarPago($horario, $idAlumno) {
        // echo "horario: ".$horario."idalumno".$idAlumno;
        $parametros = array($horario, $idAlumno);
        $query = $this->db->query("SELECT * from pago where nHorId=? and nPerId=? and nEstPago=1", $parametros);
        $row=$query->row();
        $observacion="Ninguna"; 
        $montodepago=$row->nPagMonto;

        $query = $this->listar_pagos_tesoreria($idAlumno, $horario, 1);
        foreach ($query as $pagoTesoreria) {
            $voucher = $pagoTesoreria->codbol . "";
            $monto = $pagoTesoreria->preciobol . "";
            $cuenta_ingreso = $pagoTesoreria->codctaing . "";
            $descripcion = $pagoTesoreria->descripcion . "";
            $fecha = $pagoTesoreria->fecha . " ";
            $fecha = str_replace("-", "/", $fecha);
            $tipo=$pagoTesoreria->tipo;
            $parametros = array($horario, $idAlumno, $montodepago, $voucher, $monto, $fecha, $observacion,$tipo);

            $query2 = $this->db->query("CALL USP_CVI_I_PagoMatricula (?,?,?,?,?,?,?,?);", $parametros);
            if ($query2) {
                $band = 1;
            } else {
                $band = 0;
            }
        }
        if ($band) {
            return true;
        } else {
            return false;
        }
    }

    function listar_pagos_tesoreria($nPerId, $idHorario, $estado) {

        $parametros = array($nPerId);
        $query = $this->db->query('select * from persona_detalle where nPerId=? and nParId=1 and nPcaId=1', $parametros);
        $row = $query->row();
        $dni = $row->cPdeValor;

        if ($estado == 1) {
            $parametros = array($idHorario);
            $query = $this->db->query('select * from horario inner join curso ON horario.nCurId = curso.nCurId where nHorId=?', $parametros);
            $row = $query->row();
            $cuenta_ing = $row->nCurCuentaIngreso;
        } else if ($estado == 2) {
            $parametros = array($idHorario);
            $query = $this->db->query('select * from curso where nCurId=?', $parametros);
            $row = $query->row();
            $cuenta_ing = $row->nCurCuentaIngreso;
        }


        $pagos = $this->db->query("SELECT * FROM pago WHERE nEstPago =1 and nPerId=? ORDER BY nPagId",$nPerId);
        $comprobante = '';
        $i = 0;

        if (count($pagos) > 0) {
            foreach ($pagos->result() as $pago) {

                $comprobante = $comprobante ."'". $pago->nPagNumeroVoucher . "',";
            }
            $comprobante = substr($comprobante, 0, -1);
        }
        $parametros = array($cuenta_ing, $dni);
        $query = $this->bdcolegio->query("SELECT boleta.codbol, deta_bol.codctaing, deta_bol.descripcion, deta_bol.preciobol,date( boleta.fecpagobol) as fecha,'Boleta' AS tipo FROM deta_bol inner join boleta 
            on deta_bol.codbol= boleta.codbol where deta_bol.codctaing=? and boleta.lebol=? and boleta.estadobol='P' and boleta.codbol not in($comprobante) UNION ALL SELECT factura.codfac AS codbol, codctaing, descripcion,round(((0.18*preciofac)+preciofac),0) AS preciobol,date(factura.fecemifac) as fecha
            ,'Factura' from deta_fac inner join factura on deta_fac.codfac=factura.codfac where deta_fac.descripcion like '%" . $dni . "%' and codctaing='$cuenta_ing' and factura.estadofac='P' and factura.codfac not in($comprobante)", $parametros);


        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function listar_pagos_campus($nPerId, $idHorario, $estado) {
        if ($estado == 1) {
            $parametros = array($idHorario, $nPerId);
            $query = $this->db->query("SELECT * from pago where nHorId=? and nPerId=? and nEstPago=1", $parametros);
        } else if ($estado == 2) {
            $parametros = array($idHorario, $nPerId);
            $query = $this->db->query("SELECT * FROM pago inner join horario on pago.nHorId=horario.nHorId where horario.nCurId=? and pago.nPerId=? and nEstPago=1", $parametros);
        }
        if (count($query) > 0) {
             return $query->result();
        }

        else {
            return null;
        }
    }

    function mostrar_pagos($idCurso, $dni) {
        $cuenta = $this->db->query('select * from curso where nCurId=?', $idCurso);
        $reg = $cuenta->row();
        $cuenta_ingreso = $reg->nCurCuentaIngreso;
        $parametros = array($cuenta_ingreso, $dni);
        $query = $this->bdcolegio->query("SELECT boleta.codbol as codbol,deta_bol.preciobol as preciobol,date(fecpagobol)as fecpagobol,deta_bol.descripcion as observacion FROM deta_bol inner join boleta 
            on deta_bol.codbol= boleta.codbol where deta_bol.codctaing=? and boleta.lebol=? and boleta.estadobol = 'P' 
            ORDER BY deta_bol.codbol DESC LIMIT 1", $parametros);
        if ($query) {
            //echo "sadsadsad1";
            if ($query->num_rows() > 0) {

                $row = $query->row();
                $this->setMonto($row->preciobol);
                $this->setComprobante($row->codbol);
                $this->setFecha($row->fecpagobol);
                $this->setTipocomprobante("Boleta");
                $this->setObservacion($row->observacion);

                return true;
            } else {
                $parametros = array($dni, $cuenta_ingreso);
               // echo "sadsadsad2";
                $query = $this->bdcolegio->query("select deta_fac.codfac as codfac, deta_fac.codctaing, round(deta_fac.preciofac+(0.18*(deta_fac.preciofac)),0) as preciofac, DATE( factura.fecpagofac ) as facpago,deta_fac.descripcion as observacion from deta_fac inner join factura on  deta_fac.codfac = factura.codfac where descripcion like '%" . $dni . "%' and factura.estadofac='P' and codctaing=$cuenta_ingreso");
                //echo "hizo la consulta";

                if ($query->num_rows() > 0) {
                  //    echo "sadsadsad3";
                    $row = $query->row();
                    $this->setMonto($row->preciofac);
                    $this->setComprobante($row->codfac);
                    $this->setFecha($row->facpago);
                    $this->setTipocomprobante("Factura");
                    $this->setObservacion($row->observacion);
                    return true;
                } else {
                    return 0;
                }
            }
        } else {
            return 0;
        }

        // $query=$this->bdcolegio->query('select *')
    }

    //---------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------
}

