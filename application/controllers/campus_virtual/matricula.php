<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Matricula extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->bdcolegio = $this->load->database('db_colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/matricula_model');
        $this->load->model('campus_virtual/pago_model');
        $this->load->model('campus_virtual/sesion_model');
        $this->load->model('campus_virtual/asistencia_model');
        $this->load->model('campus_virtual/nota_model');
        $this->load->model('campus_virtual/horario_model');
    }

    function index() {
    $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Lista de Matriculas';
        $data['curso'] = $this->matricula_model->CursoCbo();
        $this->load->view('campus_virtual/matricula/panel_view', $data);
    }
    
    function load_listar_view_detalle($idCurso, $idAlumno,$estado) {
      
        $campos['tesoreria'] = $this->matricula_model->listar_pagos_tesoreria($idAlumno, $idCurso, $estado);

        $campos['campus'] = $this->matricula_model->listar_pagos_campus($idAlumno, $idCurso, $estado);
        $campos['montoCurso'] = $this->matricula_model->montoCurso($idCurso, $idAlumno,$estado);
        $campos['pagosCurso'] = $this->matricula_model->pagosCurso($idAlumno, $idCurso, $estado);

        $this->load->view('campus_virtual/matricula/detalle_view', $campos);
    }

    function load_listar_view_matricula() {
        $this->matricula_model->reservas_inactivas();
        $this->load->view('campus_virtual/matricula/qry_view');

    }

    function load_listar_view_matricula2() {
        $this->load->view('campus_virtual/matricula/qry2_view');
    }

    function load_horario() {

        $idAlumno = $this->input->post('idAlumno');
        $curso = $this->input->post('idCurso');

        if ($this->validarMatricula($idAlumno, $curso) && $curso) {
            $horario = $this->matricula_model->HorarioCbo($curso);

            $idHorario[''] = 'Seleccione Horario';
            //$idCurso['']= date('Y/m/d');
            foreach ($horario as $horario) {
                $idHorario[$horario->nHorId] = $horario->cHorDia . ' ' .
                        $horario->cHorFechaInicio . ' ' .
                        $horario->cHorHoraInicio . ' ' .
                        $horario->cHorAmbiente;
            }
            echo form_dropdown('cbo_ins_mat_horario', $idHorario, '', 'id="cbo_ins_mat_horario" 
                                class="input-medium tip"
                                style="width:260px;"
                                required="required"
                                data-original-title="Selecione Horario"
                                data-placement="right"');
        } else {
            $idHorario[''] = 'El Alumno ya cuenta con una Matrícula/Reserva';
            echo form_dropdown('cbo_ins_mat_horario', $idHorario, '', 'id="cbo_ins_mat_horario" 
                                class="input-medium tip"
                                style="width:260px;"
                                required="required"
                                data-original-title="Selecione Horario"
                                data-placement="right"');
        }
    }

    function load_horario2() {

        $idAlumno = $this->input->post('idAlumno');
        $curso = $this->input->post('idCurso');

       /* if ($this->validarMatricula($idAlumno, $curso) && $curso) */{
            $horario = $this->matricula_model->HorarioCbo($curso);

            $idHorario['0'] = 'Seleccione Horario';
            //$idCurso['']= date('Y/m/d');
            foreach ($horario as $horario) {
                $idHorario[$horario->nHorId] = $horario->cHorDia . ' ' .
                        $horario->cHorFechaInicio . ' ' .
                        $horario->cHorHoraInicio . ' ' .
                        $horario->cHorAmbiente;
            }

            echo form_dropdown('cbo_upd_mat_horario1', $idHorario, 0, 'id="cbo_upd_mat_horario1" 
                                        class="input-medium tip"
                                        style="width:260px;"
                                        required="required"
                                        data-original-title="Selecione Horario"
                                        data-placement="right"');
        }/* else */{
         /*   $idHorario[''] = 'El Alumno ya cuenta con una Matrícula/Reserva';
            echo form_dropdown('cbo_upd_mat_horario1', $idHorario, 0, 'id="cbo_upd_mat_horario1" 
                                        class="input-medium tip"
                                        style="width:260px;"
                                        required="required"
                                        data-original-title="Selecione Horario"
                                        data-placement="right"');*/
        }
    }
    // onchange="mostrarTipoPagos()"

    function load_curso() {

        $curso = $this->matricula_model->CursoCbo();

        $idCurso[''] = 'Seleccione Curso';
        //$idCurso['']= date('Y/m/d');
        foreach ($curso as $curso) {
            $idCurso[$curso->nCurId] = $curso->cCurNombre;
        }
        echo form_dropdown('cbo_ins_mat_curso', $idCurso, 0, 'id="cbo_ins_mat_curso" 
                                class="input-medium tip"
                                style="width:260px;"
                                required="required"
                                data-original-title="Selecione un Curso"
                                data-placement="right"
                                onchange="filtroCurso(this)"');
    }

    function load_cursosH() {
        $tipo = $this->input->post('criterio');
        $curs = $this->matricula_model->HorarioCbo1();

        $idHorario1[0] = 'Todos';

        foreach ($curs as $cur) {
            $idHorario1[$cur->nHorId] = $cur->cCurNombre . ' - ' .
                    $cur->cHorFechaInicio . ' ' .
                    $cur->cHorHoraInicio . ' ' .
                    $cur->cHorFechaFin;
        }

        echo form_dropdown('cbo_filtro', $idHorario1, '', 'id="cbo_filtro" 
                              class="input-medium tip"
                              style="width:260px;"
                              required="required"
                              data-original-title="Selecione Horario"
                              data-placement="right"
                              onchange="filtro(this)"');
    }

    function matriculaIns() {
        
        $fecha= $this->input->post('txt_ins_pag_fecha');
        $fecha = str_replace("-", "/", $fecha);
          
        $this->form_validation->set_rules('cbo_ins_mat_horario', 'Horario', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_tip_mat', 'Tipo Matricula', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $acuenta = $this->input->post('txt_ins_pag_monto');
            $nroVoucher = $this->input->post('txt_ins_pag_nroTicket');
            $idHorario = $this->input->post('cbo_ins_mat_horario');
            // Cantidad de cupos para el Horario
            if ($this->matricula_model->validarCantidad($idHorario)) {
                $monto = $this->input->post('txt_ins_pag_monto');
                $this->pago_model->setIdHorario($this->input->post('cbo_ins_mat_horario'));
                $this->pago_model->setMonto($monto);
                $descuento = $this->input->post('chk_ins_pag_des');
                $idAlumno = $this->input->post('hid_upd_alu_idPersona');
                $this->matricula_model->setObservacion($this->input->post('txt_obs_mat'));
                $this->matricula_model->setIdAlumno($idAlumno);
                $this->matricula_model->setIdHorario($idHorario);
                $this->matricula_model->setTipo($this->input->post('cbo_ins_tip_mat'));
                if ($descuento == '') {
                    $this->matricula_model->setDescuento(0);
                } else {
                    $this->matricula_model->setDescuento(1);
                }
                // MATRICULA DE ALUMNO
                if ($this->input->post('cbo_ins_tip_mat') == 1) {
                                    $resul = $this->matricula_model->matriculaIns();
                                     $this->matricula_model->matriculaPermisosIns();
				                            if ($this->horario_model->horarioComenzado($idHorario)) {
                    $this->sesion_model->setIdHorario($idHorario);
                    $sesiones = $this->sesion_model->getSesionesHorario();
                    if ($sesiones->num_rows() > 0) {
                        foreach ($sesiones->result() as $sesion) {
                            $idSesion = $sesion->IdSesion;
                            $Fecha = $sesion->Fecha;
                            $this->asistencia_model->setIdSesion($idSesion);
                            $this->asistencia_model->setIdPersona($idAlumno);
                            $this->asistencia_model->setFecha($Fecha);
                            $this->asistencia_model->setValor('FA');
                            $this->asistencia_model->asistenciaIns();
                            $this->nota_model->setIdSesion($idSesion);
                            if ($this->nota_model->getSesionesNota() > 0) {
                                $this->nota_model->setIdPersona($idAlumno);
                                $this->nota_model->setFecha($Fecha);
                                $this->nota_model->setValor('00');
                                $this->nota_model->notaIns();
                            }
                        }
                    }
                }
                    if ($descuento == 'accept') {
                        $resul2 = $this->realizarInsertPagos(true, $idHorario);
                    } 
                    else {
                        $resul2 = $this->realizarInsertPagos(false, $idHorario);
                    }
                    $this->matricula_model->setIdAlumno($idAlumno);
                } else {
                    $valor = $this->horario_model->horarioComenzado($idHorario);
                 if ($valor) {
                             echo 4;
                             exit;
                            }else{
                             $resul = $this->matricula_model->matriculaIns();
							$resul2 = true;
                            }
                }

                if ($resul && $resul2) {
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    exit;
                }
            } else {
                echo 3;
            }
        } else {
            $this->index();
        }
    }

    function realizarInsertPagos($descuento, $idHorario) {
        $fecha= $this->input->post('txt_ins_pag_fecha');
        $fecha = str_replace("-", "/", $fecha);
       
        $this->horario_model->horarioGet($idHorario);
        $valorDescuento = $this->horario_model->getDescuento();
        $valorCosto = $this->horario_model->getCosto();
        $nroModulos = $this->horario_model->getNroModulos();
        $acuenta = $this->input->post('txt_ins_pag_monto');
        $nroVoucher = $this->input->post('txt_ins_pag_nroTicket');

        if ($descuento == true) {
            $nuevoCosto = $valorCosto - ($valorCosto * ($valorDescuento / 100));
        } else {
            $nuevoCosto = $valorCosto;
        }

        $res = $this->matriculaInsertarPago($nuevoCosto, $acuenta, $fecha, $nroVoucher, null);
        return $res;
    }



    function matriculaQry($criterio = null) {
        $opcionesGrid = array(
            "Confirmar" => "flag",
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'matricula_model',
            'metodo' => 'matriculaQry',
            'criterios' => array('criterio' => $criterio),
            'pkid' => 'IdCombinado',
            'opciones' => json_encode($opcionesGrid),
            'columns' => array('Alumno',
                  'Dni',
                'Curso',
                'Correo',
                'Celular',
                'Fecha_Inicio',
                'Dia',
                'Hora_Inicio',
                'Hora_Fin',
                'Ambiente',
                'opcion'
            ),
                )
        );
    }

    function matriculaQry2($criterio = null) {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'matricula_model',
            'metodo' => 'matriculaQry',
            'criterios' => array('criterio' => $criterio),
            'pkid' => 'IdCombinado',
            'opciones' => json_encode($opcionesGrid),
            'columns' => array('Alumno',
                'Dni',
                'Curso',
                'Fecha_Inicio',
                'Dia',
                'Hora_Inicio',
                'Hora_Fin',
                'Ambiente',
                'opcion'
            ),
                )
        );
    }

    function buscarAlumno($dni) {
        $query = $this->matricula_model->buscarAlumno($dni);
        if ($query) {
            $a = $this->matricula_model->getAlumno();
            $alumno['idPersona'] = $a['id'];
            $alumno['dni'] = $a['dni'];
            $alumno['nombres'] = $a['nombres'];
            $alumno['apellidoPaterno'] = $a['apellidoPaterno'];
            $alumno['apellidoMaterno'] = $a['apellidoMaterno'];
            $alumno['celular'] = $a['celular'];
            $alumno['correoElectronico'] = $a['correoElectronico'];
            $alumno['direccion'] = $a['direccion'];
            $alumno['cip'] = $a['cip'];

            $result = "";
            $result .= '<legend>Datos de la Persona</legend>';
            $result .= '<fieldset>';
            $result .= '<table>';
            $result .= '<tbody>';
            $result.='<tr>';
            $result.='<td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="../uploads/ruteo/usuario.png" width="110" height="108"></td>';
            $result.='<td style="vertical-align:top;">';
            $result.='<table cellpadding="2" cellspacing="0">';
            $result.='<tbody>';
            $result.='<tr>';
            $result.='<td><b>Nombres</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $alumno['nombres'] . ' ' . $alumno['apellidoPaterno'] . ' ' . $alumno['apellidoMaterno'] . '</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Nro DNI</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $alumno['dni'] . '</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Celular</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $alumno['celular'] . '</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Correo Electronico</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $alumno['correoElectronico'] . '</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>Direccion</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $alumno['direccion'] . '</td>';
            $result.='</tr>';
            $result.='<tr>';
            $result.='<td><b>C.I.P.</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $alumno['cip'] . '</td>';
            $result.='</tr>';

            $result.='<td colspan="3" style="padding-top:10px;">';
            $result.="<input type='hidden' name='hid_upd_alu_idPersona' id='hid_upd_alu_idPersona' value='" . $alumno['idPersona'] . "'>";
            $result.='</td>';
            $result.='</tr>';
            $result.='</tbody>';
            $result.='</table>';
            $result.='</td>';
            $result.='</tr>';
            $result.='</tbody>';
            $result .= '</table>';
            $result .= '</fieldset>';

            echo $result;
        } else {
            return false;
        }
    }

    function matriculaDel($idAlumno, $idHorario) {
            $this->matricula_model->setIdAlumno($idAlumno);
            $this->matricula_model->setIdHorario($idHorario);
            $result = $this->matricula_model->matriculaDel();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
       // }
    }

    function popupEditarMatricula($idAlumno, $idHorario) {

        $campos = $this->matriculaGet($idAlumno, $idHorario);
        $campos['idAlumno'] = $idAlumno;
        $campos['Hor'] = $idHorario;
        $campos['idMatricula'] = $idAlumno . '/' . $idHorario;
        $campos['cursos'] = $this->matricula_model->CursoCbo();


        $campos['tesoreria'] = $this->matricula_model->listar_pagos_tesoreria($idAlumno, $idHorario, 1);
        $campos['campus'] = $this->matricula_model->listar_pagos_campus($idAlumno, $idHorario, 1);
        $campos['montoCurso'] = $this->matricula_model->montoCurso($idHorario,$idAlumno, 1);
        $campos['pagosCurso'] = $this->matricula_model->pagosCurso($idAlumno, $idHorario, 1);

        $campos['evaluarCambio']=$this->matricula_model->evaluarcambioHorario($idAlumno, $idHorario);


        $this->load->view('campus_virtual/matricula/upd_view', $campos);
    }

    function popupEditarReserva($idAlumno, $idHorario) {

        $campos = $this->matriculaGet($idAlumno, $idHorario);
        $campos['idAlumno'] = $idAlumno;
        $campos['Hor'] = $idHorario;
        $campos['idMatricula'] = $idAlumno . '/' . $idHorario;
        $campos['cursos'] = $this->matricula_model->CursoCbo();
        $campos['montoCurso'] = $this->matricula_model->montoCurso($idHorario,'', 1);
        $campos['pagosCurso'] = $this->matricula_model->pagosCurso($idAlumno, $idHorario, 1);


        $this->load->view('campus_virtual/matricula/upd_reserva_view', $campos);
    }

    function matriculaGet($idAlumno, $idHorario) {
        $query = $this->matricula_model->buscarMatricula($idAlumno, $idHorario);

        if ($query) {
            $a = $this->matricula_model->getAlumno();
            $matri['persona'] = $a['persona'];
            $matri['Curso'] = $a['CursoId'];
            $matri['nPerId'] = $a['nPerId'];
            $matri['dni'] = $a['dni'];
            $matri['TipoMatricula'] = $a['TipoMatricula'];
            $matri['TipoCurso'] = $a['TipoCurso'];
            $matri['Descuento'] = $a['Descuento'];
            $matri['Costo'] = $a['Costo'];
            $cur = $matri['Curso'];
            if ($cur) {
                $horario = $this->matricula_model->HorarioCbo($cur);
                $matri['horario'] = $horario;
            }
            return $matri;
        } else {
            return false;
        }
    }

    function validarMatricula($idAlumno, $idCurso) {
        $count = $this->matricula_model->validarMatricula($idAlumno, $idCurso);

        return $count == 0;
    }

    //------------------------------------------------------------------------------
    function matriculaInsertarPago($montoParcial, $acuenta, $fecha, $nroVoucher, $observacion) {
        $this->pago_model->setIdAlumno($this->input->post('hid_upd_alu_idPersona'));
        $this->pago_model->setIdHorario($this->input->post('cbo_ins_mat_horario'));
        
        $this->pago_model->setTipoComprobante($this->input->post('txt_ins_pag_tipo'));
        
        $this->pago_model->setNroVoucher($nroVoucher);
        $this->pago_model->setMonto($montoParcial);
        $this->pago_model->setAcuenta($acuenta);
        $this->pago_model->setFecha($fecha);
        $this->pago_model->setObservacion($observacion);
        $resul = $this->pago_model->pagoInsertar(1);
        return $resul;
    }

    function reservaUpd(){
        
        
        $this->pago_model->setTipoComprobante($this->input->post('txt_ins_pag_tipo')); 
         $idAlumno = $this->input->post('hid_upd_hor_idAlumno1');
        $this->pago_model->setIdAlumno($this->input->post('idAlumno'));
        $this->pago_model->setIdHorario($this->input->post('idCurso'));
        $this->pago_model->setNroVoucher($this->input->post('txt_ins_pag_nroTicket'));
        $this->pago_model->setMonto($this->input->post('txt_ins_pag_monto'));
        $this->pago_model->setAcuenta($this->input->post('txt_ins_pag_monto'));
                      $this->matricula_model->setIdAlumno($idAlumno);
        $fecha=$this->input->post('txt_ins_pag_fecha');
        $fecha = str_replace("-", "/", $fecha);
        $this->pago_model->setFecha($fecha);
               
        $this->pago_model->setDescuento($this->input->post('chk_ins_pag_des1'));
        $this->pago_model->setObservacion($this->input->post('txt_obs_mat1'));
         $this->matricula_model->matriculaPermisosIns();
        $resul =$this->pago_model->pagoInsertar(0);
        if($resul){
            echo 1;
        }
    }
        
    //------------------------------------------------------------------------------
   
     function load_descuento_horario() {
        $idHorario = $this->input->post('idHorario');
        $tip = $this->input->post('tip');
        $query = $this->horario_model->horarioGet($idHorario);
        if ($query) {
            $descuento = $this->horario_model->getDescuento();
            $result = '';
            $result .= '<div class="control-group">';
            if ($tip == 0) {
                $monto = $this->horario_model->getCosto();
                $modulos = $this->horario_model->getNroModulos();
                $result .='<label class="control-label"">' . $monto . ' - ' . $modulos . 'M (' . $descuento . '%)</label>';
            } else {
                $result .='<label class="control-label"">' . $descuento . '%</label>';
            }
            $result .= '</div>';
            echo $result;
        } else {
            return false;
        }
    }

    function matriculaUpd($horarioantes, $horariodespues, $idAlumno) {
        // echo "horarioantes: ".$horarioantes."horariodespues: ".$horariodespues."idalumno".$idAlumno;
        $query = $this->matricula_model->matriculaUpd($horarioantes, $horariodespues, $idAlumno);
        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function actualizarPago($horario, $idAlumno) {
         // echo "horario: ".$horario."idalumno".$idAlumno;
        $query = $this->matricula_model->actualizarPago($horario, $idAlumno);
        if ($query) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function mostrar_pagos() {
        $idCurso = $this->input->post('idCurso');
        $idAlumno = $this->input->post('idAlumno');
       $query = $this->matricula_model->mostrar_pagos($idCurso, $idAlumno);
          if ($query) {

            $result = '<div class="control-group">
                        <label class="control-label" for="lbl_comprobante"><b>Nro. de Ticket:  </b></label>
                        <label class="control-label" for="lbl_comprobante" style="color:blue"><b>' . $this->matricula_model->getTipocomprobante() . ' - ' . $this->matricula_model->getComprobante() . '</b></label>
                     </div>';


            $result = $result . ' <div class="control-group">
                        <label class="control-label" for="txt_ins_pag_monto"><b>Monto:  </b></label>
                        <label class="control-label" for="lbl_monto"style="color:blue"><b>' . $this->matricula_model->getMonto() . '</b>
                     </div>';
            $result = $result . '<div class="control-group style="display:none">
                                          
                                              <div class="controls">' .
                    form_hidden('txt_ins_pag_nroTicket', $this->matricula_model->getComprobante()) . '
                                              </div>
                                          </div>';
            $result = $result . '<div class="control-group" style="display:none">
                                    
                                              <div class="controls">' .
                    form_hidden('txt_ins_pag_monto', $this->matricula_model->getMonto()) . '
                                              </div>
                                          </div>';
                                          $observacion = $this->matricula_model->getObservacion();
                          $codigo = str_replace(' ', '_',$observacion);
            $result=$result."<input type='hidden' id='txt_ins_pag_fecha' name='txt_ins_pag_fecha' value=".$this->matricula_model->getFecha().">";
            $result=$result."<input type='hidden' id='txt_ins_pag_observacion' name='txt_ins_pag_observacion' value=".$codigo.">";
            $result=$result."<input type='hidden' id='txt_ins_pag_tipo' name='txt_ins_pag_tipo' value=".$this->matricula_model->getTipocomprobante().">";
//           
            echo $result;
        } else {

            echo "no";
        }
        // echo "datossss".$idCurso." ".$idAlumno;
    }

}

?>