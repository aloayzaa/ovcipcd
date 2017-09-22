<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Horario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->bdcampus = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/horario_model');
        $this->load->model('campus_virtual/bitacora_model');
        $this->load->model('campus_virtual/sesion_model');


                $this->load->model('campus_virtual/docente_model');
    }

    function index(){
        $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Lista de Horarios';
        $data['curso']=$this->horario_model->CursoCbo();
        $data['usuario']=$this->horario_model->DocenteCbo();
        $data['horarios']=$this->horario_model->horariosActivos();
        $this->load->view("campus_virtual/horario/panel_view",$data);
    }
    
    function load_ins_view_horario() {
        $data['titulo'] = 'Lista de Horarios';
        $data['curso']=$this->horario_model->CursoCbo();
        $data['usuario']=$this->horario_model->DocenteCbo();
        $data['horarios']=$this->horario_model->horariosActivos();
        $this->load->view('campus_virtual/horario/ins_view', $data);
    }

    function load_qry_view_horariosActivos(){
        $data['horarios']=$this->horario_model->horariosActivos();
        $this->load->view('campus_virtual/horario/qry_view_horariosActivos', $data);
    }

    function load_listar_view_horario() {
        $this->load->view('campus_virtual/horario/qry_view');
    }

    function load_listar_view_horarioActivos() {
        $this->load->view('campus_virtual/horario/qry_viewActivos');
    }
    
    function bitacoraInsU($idHorario) {
        $hor = $this->horarioGet($idHorario);
        
        $this->bitacora_model->setIdUsuario(2);
//        $this->bitacora_model->setIdUsuario($this->session->userdata('IDUsu'));
        $this->bitacora_model->setTabla('horario');
        $this->bitacora_model->setTipoOperacion('U');
        $this->bitacora_model->setFecha($this->horario_model->fechaActual());
        
        if($hor['idDocente'] != $this->input->post('cbo_hor_docente')) {
            $this->bitacora_model->setCampo('nPerId');
            $this->bitacora_model->setValorAnterior($hor['idDocente']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['idCurso'] != $this->input->post('cbo_upd_hor_curso')) {
            $this->bitacora_model->setCampo('nCurId');
            $this->bitacora_model->setValorAnterior($hor['idCurso']);
            $this->bitacora_model->bitacoraIns();
        }
        
        $fechas = $this->input->post('txt_upd_hor_fechas');
        $fechaInicio = $this->fechadeInicio($fechas);
        $fechaFin = $this->fechadeFin($fechas);
        $dias = $this->diasHorario($fechas);
        $duracion = $this->numeroSesiones($fechas);
        
        if($hor['fechainicio'] != $fechaInicio) {
            $this->bitacora_model->setCampo('cHorFechaInicio');
            $this->bitacora_model->setValorAnterior($hor['fechainicio']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['dia'] != $dias) {
            $this->bitacora_model->setCampo('cHorDia');
            $this->bitacora_model->setValorAnterior($hor['dia']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['horainicio'] != $this->input->post('txt_upd_hor_horainicio')) {
            $this->bitacora_model->setCampo('cHorHoraInicio');
            $this->bitacora_model->setValorAnterior($hor['horainicio']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['ambiente'] != $this->input->post('cbo_upd_hor_ambiente')) {
            $this->bitacora_model->setCampo('cHorAmbiente');
            $this->bitacora_model->setValorAnterior($hor['ambiente']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['fechafin'] != $fechaFin) {
            $this->bitacora_model->setCampo('cHorFechaFin');
            $this->bitacora_model->setValorAnterior($hor['fechafin']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['horafin'] != $this->input->post('txt_upd_hor_horafin')) {
            $this->bitacora_model->setCampo('cHorHoraFin');
            $this->bitacora_model->setValorAnterior($hor['horafin']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['diaslimite'] != $this->input->post('txt_upd_hor_diaslimite')) {
            $this->bitacora_model->setCampo('nHorDiasLimite');
            $this->bitacora_model->setValorAnterior($hor['diaslimite']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['duracion'] != $duracion) {
            $this->bitacora_model->setCampo('nHorDuracion');
            $this->bitacora_model->setValorAnterior($hor['duracion']);
            $this->bitacora_model->bitacoraIns();
        }
        
        if($hor['costo'] != $this->input->post('txt_upd_hor_costo')) {
            $this->bitacora_model->setCampo('nHorCosto');
            $this->bitacora_model->setValorAnterior($hor['costo']);
            $this->bitacora_model->bitacoraIns();
        }
    }
    
    function fechadeInicio($fechas){
        $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $arreglo[$v] = substr($var, $i, 10);
            $v++;
        }
        return $arreglo[0];
    }
    
    function fechadeFin($fechas){
        $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $arreglo[$v] = substr($var, $i, 10);
            $v++;
        }
        return end($arreglo);
    }
    
    function numeroSesiones($fechas){
        $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $arreglo[$v] = substr($var, $i, 10);
            $v++;
        }
        return count($arreglo);
    }
    
    function diasHorario($fechas){
        $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $dia = $this->horario_model->diaFecha(substr($var, $i, 10));
            switch ($dia){
                case 1 : $valorDia = "Domingo";
                         break;
                case 2 : $valorDia = "Lunes";
                         break;
                case 3 : $valorDia = "Martes";
                         break;
                case 4 : $valorDia = "Miercoles";
                         break;
                case 5 : $valorDia = "Jueves";
                         break;
                case 6 : $valorDia = "Viernes";
                         break;
                case 7 : $valorDia = "Sabado";
                         break;
                default : $valorDia = "-";
                          break;
                    
            }
            $arreglo[$v] = $valorDia;
            $v++;
        }
        $listaSimple = array_unique($arreglo);
        $listaSimpleFinal = array_values($listaSimple);
        
        $listaDias = "";
        for($i = 0; $i < count($listaSimpleFinal); $i++){
            if($i == 0){
                $listaDias = $listaSimpleFinal[$i];
            }
            else{
                    $listaDias = $listaDias."-".$listaSimpleFinal[$i];
                }
        }
        
        return $listaDias;
    }
    
    function insertarSesionesInactivas(){
        $idHorario = $this->input->post('hid_idhorario');
        $fechas = $this->horario_model->fechasHorario($idHorario);
        $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $arreglo[$v] = substr($var, $i, 10);
            $v++;
        }
        $longitud2 = count($arreglo);
        for($i = 0; $i < $longitud2; $i++){
            $this->horario_model->setFechaTemporal($arreglo[$i]);
            $this->horario_model->setIdhorario($idHorario);
            $resul = $this->horario_model->horarioSesionesInactivasIns();
        }
        
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function validarHorario($idHorario, $fechas, $horaInicio, $horaFin, $ambiente){
        //var_dump($idHorario, $fechas, $horaInicio, $horaFin, $ambiente);
        if($idHorario == null){
            $arreglo = $this->horario_model->validarHorario(null);
           //var_dump($arreglo);
        }
        else{
            $arreglo = $this->horario_model->validarHorario($idHorario);
        }
        if($arreglo != null){
            $nro = count($arreglo);
                $var2 = str_replace(",", "", $fechas);
                $longitud2 = strlen($var2);
                $v2 = 0;
                for ($j = 0; $j < $longitud2; $j = $j + 10) {
                    $arregloFechas[$v2] = substr($var2, $j, 10);
                    $v2++;
                }
            for($i = 0; $i < $nro; $i++){
                $fechasActivas = strstr($arreglo[$i], '-', true);
                $temp = strstr($arreglo[$i], '-');
                $cadena2 = substr($temp, 1);
                $ambienteActivo = strstr($cadena2, '_', true);
                $temp2 = strstr($cadena2, '_');
                $cadena3 = substr($temp2, 1);
                $horaInicioActiva = substr($cadena3, 0, 5);
                $horaFinActiva = substr($cadena3, 5, 10);
                
                    $var = str_replace(",", "", $fechasActivas);
                    $longitud = strlen($var);
                    $v = 0;
                    for($j = 0; $j < $longitud; $j = $j + 10){
                        $arregloFechasActivas[$v] = substr($var, $j, 10);
                        $v++;
                    }
                $hInicioActiva = ($horaInicioActiva);
                $hFinActiva = ($horaFinActiva);
                $hInicio = ($horaInicio);
                
                $hFin = ($horaFin);
                
                // 0 -> se cruza
                // 1 -> no se cruza
                // null -> no hay filas con que comparar
                
                $filArrFecActivas = count($arregloFechasActivas);
                $filArrFec = count($arregloFechas);
                for($a = 0; $a < $filArrFecActivas; $a++){
                    for($b = 0; $b < $filArrFec; $b++){

                        if($arregloFechasActivas[$a] == $arregloFechas[$b]){
                            if($hInicioActiva >= $hInicio && $hInicioActiva <= $hFin){
                                if($ambienteActivo == $ambiente){
                                    $resp[$b] = 0;
                                }
                                else{
                                    $resp[$b] = 1;
                                }
                            }
                            else{
                                if ($hFinActiva >= $hInicio && $hFinActiva <= $hFin) {
                                    if ($ambienteActivo == $ambiente) {
                                      //var_dump($arregloFechasActivas[$a]);
                                       //var_dump($arregloFechas[$b]);
                                         $resp[$b] = 0;
                                    } else {
                                        $resp[$b] = 1;
                                    }
                                }
                                else{
                                    $resp[$b] = 1;
                                }
                            }
                        }
                        else{
                            $resp[$b] = 1;
                        }
                    }
                    $maxResp = min($resp);
                    $respFila[$a] = $maxResp;
                }
                $respTotal[$i] = min($respFila);
            }
            $resultado = min($respTotal);
            //var_dump($resultado);
        }
        else{
            $resultado = -1;
        }
        return $resultado;
    }

    function horarioIns() {
        $this->form_validation->set_rules('txt_ins_hor_horainicio', 'Hora Inicio', '|trim|required');
        $this->form_validation->set_rules('txt_ins_hor_horafin', 'Hora Fin', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_hor_ambiente', 'Ambiente', '|trim|required');
        $this->form_validation->set_rules('txt_ins_hor_diaslimite', 'Dias Limite', '|trim|required');
        $this->form_validation->set_rules('txt_ins_hor_costo', 'Costo', '|trim|required');
        $this->form_validation->set_rules('txt_ins_hor_fechas', 'Fechas del Horario', '|trim|required');
        $this->form_validation->set_rules('txt_ins_hor_descuento', 'Descuento', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            if($this->input->post('txt_ins_hor_horainicio') < $this->input->post('txt_ins_hor_horafin')){
                $this->horario_model->setIdDocente($this->input->post('cbo_hor_docente'));
                $this->horario_model->setIdCurso($this->input->post('cbo_ins_hor_curso'));
                $this->horario_model->setFechainicio($this->fechadeInicio($this->input->post('txt_ins_hor_fechas')));
                $this->horario_model->setFechafin($this->fechadeFin($this->input->post('txt_ins_hor_fechas')));
                $this->horario_model->setDia($this->diasHorario($this->input->post('txt_ins_hor_fechas')));
                $this->horario_model->setHorainicio($this->input->post('txt_ins_hor_horainicio'));
                $this->horario_model->setHorafin($this->input->post('txt_ins_hor_horafin'));
                $this->horario_model->setAmbiente($this->input->post('cbo_ins_hor_ambiente'));
                $this->horario_model->setDiaslimite($this->input->post('txt_ins_hor_diaslimite'));
                $this->horario_model->setDuracion($this->numeroSesiones($this->input->post('txt_ins_hor_fechas')));
                $this->horario_model->setCosto($this->input->post('txt_ins_hor_costo'));
                $this->horario_model->setFechas($this->input->post('txt_ins_hor_fechas'));
                $this->horario_model->setNroCuotas($this->input->post('cbo_ins_hor_cuotas'));
                $this->horario_model->setNroModulos($this->input->post('cbo_ins_hor_modulos'));
                $this->horario_model->setCupoMax($this->input->post('txt_ins_hor_cupoMax'));
                $this->horario_model->setDescuento($this->input->post('txt_ins_hor_descuento'));
                //$valor = $this->validarHorario(null, $this->input->post('txt_ins_hor_fechas'), $this->input->post('txt_ins_hor_horainicio'), $this->input->post('txt_ins_hor_horafin'), $this->input->post('cbo_ins_hor_ambiente'));
                $valor = 1;
                //var_dump($valor);
                if($valor == 1){
                    $resul = $this->horario_model->horarioIns();
                    if ($resul) {
                        echo 1;
                        exit;
                    } else {
                        echo 0;
                        exit;
                    }
                }
                if($valor == -1){
                    $resul = $this->horario_model->horarioIns();
                    if ($resul) {
                        echo 1;
                        exit;
                    } else {
                        echo 0;
                        exit;
                    }
                }
                if($valor == 0){
                    echo 3;
                    exit;
                }
            }
            else{
                echo 4;
                exit;
            }
            
        } else {
            $this->index();
        }
    }

    function horarioQry($criterio = null) {
        $opcionesGrid = array(
            "Iniciar Horario" => "check",
            "Editar" => "pencil",
            "Prorroga" => "plus",
            "Asistencia" => "clipboard",
            "Inasistencia" => "note",
            "Promedios" => "star",
                   "Reportes" => "search",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'horario_model',
                    'metodo' => 'horarioQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'ID',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'ID',
                        'Docente',
                        'Horario',
                        'Ambiente',
                        'opcion'
                    ),
                )
        );
    }

    function horarioQryActivos($criterio = null) {
        $opcionesGrid = array(
            "Iniciar Horario" => "check",
            "Editar" => "pencil",
            "Asistencia" => "clipboard",
            "Inasistencia" => "note",
               "Reportes" => "search",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'horario_model',
                    'metodo' => 'horarioQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'ID',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'ID',
                        'Docente',
                        'Horario',
                        'Ambiente',
                        'opcion'
                    ),
                )
        );
    }

    function popupEditarHorario($idHorario) {
        $data['horario'] = $this->horarioGet($idHorario);
        $data['curso'] = $this->horario_model->CursoCbo();
        $data['usuario'] = $this->horario_model->DocenteCbo();
        $this->load->view('campus_virtual/horario/upd_view', $data);
    }
    
    function popupActivarHorario($idHorario) {
        $data['horario'] = $this->horario_model->horarioGetDetalle($idHorario);
        $data['verificar'] = $this->horario_model->verificarHorarioActivo($idHorario);
        $this->load->view('campus_virtual/horario/ins_view_mostrarSesiones', $data);
    }
    
    function popupAsistenciasDocente($idHorario) {
        $data['sesiones'] = $this->horario_model->sesionesHorario($idHorario);
        $data['asistencias'] = $this->horario_model->asistenciasDocenteHorario($idHorario);
        $this->load->view('campus_virtual/horario/qry_view_asistenciasDocente', $data);
    }
    
 function popupProrroga($idHorario) {
        $data['idHorario'] = $idHorario;
        $data['horario'] = $this->horarioGet($idHorario);
        $data['fechaHoy'] = $this->horario_model->fechaActual();
        $this->load->view('campus_virtual/horario/upd_view_prorroga', $data);
    }

    function popupInasistenciaSesion($idHorario) {
        $data['idHorario'] = $idHorario;
        $data['sesiones'] = $this->horario_model->sesionesFinalizadasHorario($idHorario);
        $data['horario'] = $this->horarioGet($idHorario);
        $this->load->view('campus_virtual/horario/upd_view_inasistencia', $data);
    }
        function popupReporteAlumno($idHorario) {
        $data['alumnos']=$this->docente_model->alumnosCurso($idHorario);
        $data['fecha_fin']=$this->docente_model->dame_fechaFin($idHorario);
        $data['idHo']=$idHorario;
        $this->load->view('campus_virtual/horario/qry_view_alumnosCurso', $data);

    }

    function popupReportePromediosFinales($idHorario) {
        $data['idHorario'] = $idHorario;
        $data['promedios'] = $this->horario_model->promediosFinales($idHorario);
        $this->load->view('campus_virtual/horario/qry_view_promediosFinales', $data);
    }
    
    function exportarPromediosFinales($idHorario){
        $sql = $this->horario_model->promediosFinales($idHorario);
        $data['tabla'] = $this->to_excel($sql);
        $this->load->view('campus_virtual/horario/qry_view_exportarPromedios', $data);
    }
    
    function to_excel($array) {
        
        $tabla = '';

//         Filter all keys, they'll be table headers
        $h = array();
        foreach($array as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                 $h[] = $key;   
                }
                }
                }
                //echo the entire table headers
                $tabla = $tabla.'<table><tr>';
                foreach($h as $key) {
                    $key = ucwords($key);
                    $tabla = $tabla. '<th>'.$key.'</th>';
                }
                $tabla = $tabla. '</tr>';
                
                foreach($array as $row){
                     $tabla = $tabla. '<tr>';
                    foreach($row as $val)
                        $tabla = $tabla.'<td>'.utf8_decode($val).'</td>';
//                         $this->writeRow($val);   
                }
                $tabla = $tabla. '</tr>';
                $tabla = $tabla. '</table>';
                
        return $tabla;
    }
    
  
    function horarioGet($idHorario) {
        $query = $this->horario_model->horarioGet($idHorario);
        if ($query) {
            $horario['idHorario'] = $this->horario_model->getIdhorario();
            $horario['idDocente'] = $this->horario_model->getIdDocente();
            $horario['idCurso'] = $this->horario_model->getIdCurso();
            $horario['dia'] = $this->horario_model->getDia();
            $horario['horainicio'] = $this->horario_model->getHorainicio();
            $horario['horafin'] = $this->horario_model->getHorafin();
            $horario['ambiente'] = $this->horario_model->getAmbiente();
            $horario['fechainicio'] = $this->horario_model->getFechainicio();
            $horario['fechafin'] = $this->horario_model->getFechafin();
            $horario['diaslimite'] = $this->horario_model->getDiaslimite();
            $horario['duracion'] = $this->horario_model->getDuracion();
            $horario['costo'] = $this->horario_model->getCosto();
            $horario['fechas'] = $this->horario_model->getFechas();
            $horario['nroCuotas'] = $this->horario_model->getNroCuotas();
            $horario['cupoMax'] = $this->horario_model->getCupoMax();
            $horario['descuento'] = $this->horario_model->getDescuento();
            $horario['fechaSumada'] = $this->horario_model->sumarDias($this->horario_model->getFechafin());
            return $horario;
        } else {
            return false;
        }
    }
    
    function horarioUpdProrroga(){
        $this->horario_model->setIdhorario($this->input->post('hid_upd_hor_idHorario'));
        $this->horario_model->setFechaProrroga($this->input->post('txt_upd_hor_fechaProrroga'));
        $resul = $this->horario_model->horarioUpdProrroga();
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }
    
    function sesionRecuperacionIns(){
        $this->form_validation->set_rules('txt_ins_ses_fecha', 'Fecha Recuperacion', '|trim|required');
        $this->form_validation->set_rules('txt_ins_ses_observacion', 'Observacion', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->sesion_model->setIdSesion($this->input->post('hid_idSesion'));
            $this->sesion_model->setIdhorario($this->input->post('hid_idhorario'));
            $this->sesion_model->setFecha($this->input->post('txt_ins_ses_fecha'));
            $fechaAnterior = $this->input->post('hid_fechaAnterior');
            $this->sesion_model->setObservacion($fechaAnterior . " - " . $this->input->post('txt_ins_ses_observacion'));
            $resul = $this->sesion_model->sesionRecuperacionIns();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }else {
            $this->index();
        }
        
    }

    function horarioUpd() {
        $this->form_validation->set_rules('txt_upd_hor_horainicio', 'Hora Inicio', '|trim|required');
        $this->form_validation->set_rules('txt_upd_hor_horafin', 'Hora Fin', '|trim|required');
        $this->form_validation->set_rules('cbo_upd_hor_ambiente', 'Ambiente', '|trim|required');
        $this->form_validation->set_rules('txt_upd_hor_diaslimite', 'Dias Limite', '|trim|required');
        $this->form_validation->set_rules('txt_upd_hor_costo', 'Costo', '|trim|required');
        $this->form_validation->set_rules('txt_upd_hor_fechas', 'Fechas del Horario', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->horario_model->setIdhorario($this->input->post('hid_upd_hor_idHorario'));
            $this->horario_model->setIdDocente($this->input->post('cbo_hor_docente'));
            $this->horario_model->setIdCurso($this->input->post('cbo_upd_hor_curso'));
            $this->horario_model->setFechainicio($this->fechadeInicio($this->input->post('txt_upd_hor_fechas')));
            $this->horario_model->setFechafin($this->fechadeFin($this->input->post('txt_upd_hor_fechas')));
            $this->horario_model->setDia($this->diasHorario($this->input->post('txt_upd_hor_fechas')));
            $this->horario_model->setHorainicio($this->input->post('txt_upd_hor_horainicio'));
            $this->horario_model->setHorafin($this->input->post('txt_upd_hor_horafin'));
            $this->horario_model->setAmbiente($this->input->post('cbo_upd_hor_ambiente'));
            $this->horario_model->setDiaslimite($this->input->post('txt_upd_hor_diaslimite'));
            $this->horario_model->setDuracion($this->numeroSesiones($this->input->post('txt_upd_hor_fechas')));
            $this->horario_model->setCosto($this->input->post('txt_upd_hor_costo'));
            $this->horario_model->setFechas($this->input->post('txt_upd_hor_fechas'));
            $this->horario_model->setNroCuotas($this->input->post('cbo_upd_hor_cuotas'));
            $this->horario_model->setCupoMax($this->input->post('txt_upd_hor_cupoMax'));
            $this->horario_model->setDescuento($this->input->post('txt_upd_hor_descuento'));
           //$valor = $this->validarHorario($this->input->post('hid_upd_hor_idHorario'), $this->input->post('txt_upd_hor_fechas'), $this->input->post('txt_upd_hor_horainicio'), $this->input->post('txt_upd_hor_horafin'), $this->input->post('cbo_upd_hor_ambiente'));
            $valor =1;
            if($valor != null && $valor == 1){
                $this->bitacoraInsU($this->input->post('hid_upd_hor_idHorario'));
                $this->horario_model->setIdhorario($this->input->post('hid_upd_hor_idHorario'));
                $this->horario_model->setIdDocente($this->input->post('cbo_hor_docente'));
                $this->horario_model->setIdCurso($this->input->post('cbo_upd_hor_curso'));
                $this->horario_model->setFechainicio($this->fechadeInicio($this->input->post('txt_upd_hor_fechas')));
                $this->horario_model->setFechafin($this->fechadeFin($this->input->post('txt_upd_hor_fechas')));
                $this->horario_model->setDia($this->diasHorario($this->input->post('txt_upd_hor_fechas')));
                $this->horario_model->setHorainicio($this->input->post('txt_upd_hor_horainicio'));
                $this->horario_model->setHorafin($this->input->post('txt_upd_hor_horafin'));
                $this->horario_model->setAmbiente($this->input->post('cbo_upd_hor_ambiente'));
                $this->horario_model->setDiaslimite($this->input->post('txt_upd_hor_diaslimite'));
                $this->horario_model->setDuracion($this->numeroSesiones($this->input->post('txt_upd_hor_fechas')));
                $this->horario_model->setCosto($this->input->post('txt_upd_hor_costo'));
                $this->horario_model->setFechas($this->input->post('txt_upd_hor_fechas'));
                $this->horario_model->setNroCuotas($this->input->post('cbo_upd_hor_cuotas'));
                $this->horario_model->setCupoMax($this->input->post('txt_upd_hor_cupoMax'));
                $this->horario_model->setDescuento($this->input->post('txt_upd_hor_descuento'));
                $resul = $this->horario_model->horarioUpd();
                //$this->UpdSesionesInactivas($this->input->post('hid_upd_hor_idHorario'));
                if ($resul) {
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    exit;
                }
            }
            else{
                echo 3;
                exit;
            }
        } else {
            $this->index();
        }
    }

      /*function UpdSesionesInactivas($id_horario){
        $fechas = $this->horario_model->fechasHorario($id_horario);
       $var = str_replace(",", "", $fechas);
        $longitud = strlen($var);
        $v = 0;
        for($i = 0; $i < $longitud; $i = $i + 10){
            $arreglo[$v] = substr($var, $i, 10);
            $v++;
        }
        $longitud2 = count($arreglo);
        for($i = 0; $i < $longitud2; $i++){
            var_dump($arreglo[$i]);
            $this->horario_model->setFechaTemporal($arreglo[$i]);
            $this->horario_model->setIdhorario($id_horario);
            $resul = $this->horario_model->horarioSesionesInactivasUpd();
        }
        
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }*/
    function docentesCbo() {
        $result = $this->horario_model->docentesCbo();
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }
    
    function horarioDel($idHorario){
        $this->horario_model->setIdhorario($idHorario);
        $result = $this->horario_model->horarioDel();
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
    
    function mostrarSesionRecuperacion($concatenado){
        $idSesion = strstr($concatenado, '_', true);
        $c = strstr($concatenado, '_');
        $cadena = substr($c, 1);
        $anteriorFechaProgramada = str_replace("-", "/", $cadena);
        
        if ($concatenado != null) {
            $result = "";
            $result .= '<table>';
            $result .= '<tr>';
            $result .= '<td valign="middle">Fecha Recuperacion: </td>';
            $result .= '<td style="padding-left: 10px">';
            $result .= '<input type="text" name="txt_ins_ses_fecha" id="txt_ins_ses_fecha" style="resize:none;width:120px; class="cajascalendar" readonly="yes" required="required" data-original-title="Escriba Fecha de recuperacion"/>';
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '<tr>';
            $result .= '<td valign="middle">Observacion: </td>';
            $result .= '<td style="padding-left: 10px; padding-top: 10px;">';
            $result .= '<textarea rows="4" cols="50" name="txt_ins_ses_observacion" id="txt_ins_ses_observacion" style="resize:none;width:200px; class="input-medium input-prepend tip" required="required" data-original-title="Escriba la Observacion"></textarea>';
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '<tr>';
            $result .= '<td></td>';
            $result .= '<td style="padding-left: 10px; padding-top: 10px;">';
            $result .= "<input type='submit' name='btn_ins_sesRecuperacion' id='btn_ins_sesRecuperacion' value='Registrar Sesion Recuperacion' class='btn btn-primary'>";
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '</table>';
            $result.="<input type='hidden' name='hid_fechaAnterior' id='hid_fecha' value='" . $anteriorFechaProgramada . "'>";
            $result.="<input type='hidden' name='hid_idSesion' id='hid_idSesion' value='" . $idSesion . "'>";
            
            echo $result;
            
        } else {
            return false;
        }
    }
    
}

?>

