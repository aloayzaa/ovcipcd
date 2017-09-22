<?php

class Docente_model extends CI_Model {

    private $idPersona;
    private $cip = '';
    private $dni = '';
    private $nombres = '';
    private $apellidoPaterno = '';
    private $apellidoMaterno = '';
    private $telefono = '';
    private $correoElectronico = '';
    private $tipo = '';
    private $usuario = '';
    private $contraseña = '';
    private $estadoCivil = '';
    private $direccion = '';
    private $curso ='';
    private $docente = '';
    private $hinicio = '';
    private $hfin = '';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getCip() {
        return $this->cip;
    }

    public function setCip($cip) {
        $this->cip = $cip;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    public function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    public function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
       public function getDocente() {
        return $this->docente;
    }

    public function setDocente($docente) {
        $this->docente = $docente;
    }

 public function getHinicio() {
        return $this->hinicio;
    }

    public function setHinicio($hinicio) {
        $this->hinicio = $hinicio;
    }
    public function getHfin() {
        return $this->hfin;
    }

    public function setHfin($hfin) {
        $this->hfin = $hfin;
    }



    function docenteQry() {
        $query = $this->db->query("select p.nPerId as id, 
                                   CONCAT(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as DatosPersonales 
                                   from persona p 
                                   where p.cPerTipo = 'DO'");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
     function reporteListaQry($idHorario) {
                $query = $this->db->query("select p.nPerId as id, CONCAT(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,', ',p.cPerNombres) as datosPersonales, pd.cPdeValor as DNI 
        from matricula m 
        inner join persona p on m.nPerId = p.nPerId 
        inner join persona_detalle pd on p.nPerId = pd.nPerId 
        inner join horario h on m.nHorId = h.nHorId 
        where h.nHorId = ? 
        and pd.nParId = 1 
        and pd.nPcaId = 1 and m.nMatTipo='1' and m.nMatEstado='1';", array($idHorario));
                $i=0;
        foreach ($query->result() as $row) {
            $valor = $row->id;
            $nombre = $row->datosPersonales;
           $query1=$this->db->query("SELECT cNotValor FROM nota n INNER JOIN sesion s ON n.nSesId = s.nSesId WHERE s.nHorId =? AND n.nPerId =?",array($idHorario,$valor));
            if ($valor > 0) {
                $parametro[$valor] = $query1->result_array();
                array_push($parametro[$valor],$nombre);
            } 
            $i++;
        }
        //var_dump($parametro);
        //exit();
        if ($parametro > 0) {
            return $parametro;
        } else {
           return null;
        }
}
 function dame_curso($idHorario){
        $query = $this->db->query("SELECT c.cCurNombre as curso, concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as docente,h.cHorFechaInicio as inicio,h.cHorFechaFin as fin
FROM horario h
INNER JOIN curso c ON h.nCurId = c.nCurId
INNER JOIN persona p on h.nPerId = p.nPerId
WHERE h.nHorId =?
AND h.nHorEstado =0", array($idHorario));
        
            /*$this->db->close();
      $row = $query->row();
      return  $row->curso;*/

        $row = $query->row();
        if ($query->num_rows() > 0) {
            $this->setCurso($row->curso);
            $this->setDocente($row->docente);
             $this->setHinicio($row->inicio);
              $this->setHfin($row->fin);
            $this->db->close();
            return true;
        } else {
            return false;
        }
    }

    function docenteIns() {
        $tipo = 'DO';
        $parametros = array($this->getNombres(), $this->getApellidoPaterno(), $this->getApellidoMaterno(), $this->getTelefono(), $this->getCorreoElectronico(), $this->getCip(), $tipo, $this->getDni(), $this->getFoto(), $this->getCurriculum(), $this->getEspecialidad(), $this->getReferenciaLaboral(), $this->getUsuario(), $this->getContraseña());
        $query = $this->bdcampus->query("call USP_CVI_I_Docente(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->bdcampus->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    

    function docenteUpdTipo($idPersona){
        $query = $this->db->query("update persona set cPerTipo='DO' where nPerId=?", array($idPersona));
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function docenteInsTipo($dni){
        $query1 = $this->bdcolegio->query("select ifnull(apecol,'') as Apellido_Paterno, 
                                                  ifnull(apematcol,'') as Apellido_Materno,
                                                  ifnull(nomcol,'') as Nombre, 
                                                  ifnull(direcol,'') as Dirección,
                                                  ifnull(telcol,'') as Telefono,
                                                  ifnull(emailsec,'') as Correo,
                                                  ifnull(lecol,'') as DNI,
                                                  ifnull(regcol,'') as CIP
                                           from colegiado
                                           where lecol=ltrim(rtrim(?));", array($dni));
        if($query1->num_rows() > 0) {
            $row1 = $query1->row();
            $parametros = array($row1->Apellido_Paterno,
                               $row1->Apellido_Materno,
                               $row1->Nombre,
                               '0',
                               'DO',
                               $row1->DNI,
                               $row1->Dirección,
                               $row1->Telefono,
                               $row1->Correo,
                               $row1->CIP,
                               $row1->CIP
                               );
        }
        $query = $this->db->query("call USP_CVI_I_Persona(?,?,?,?,?,?,?,?,?,?,?)",$parametros);
        if ($query) {
            $this->db->close();
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function docenteUpd() {
        $parametros = array($this->getIdPersona(), $this->getNombres(), $this->getApellidoPaterno(), $this->getApellidoMaterno(), $this->getTelefono(), $this->getCorreoElectronico(), $this->getDni(), $this->getDireccion());
        $query = $this->db->query("call USP_CVI_U_Docente(?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function buscarDocente($dni) {
        $resp = false;
        
        $query = $this->db->query("select p.nPerId,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno, p.cPerTipo,      
        pr.cPdeValor as DNI,      
        ifnull(pt.cPdeValor,'') as Telefono,      
        ifnull(pdt.cPdeValor,'') as Direccion,
        ifnull(pe.cPdeValor,'') as Correo,
        ifnull(pc.cPdeValor,'') as CIP 
        from persona p            
        inner join persona_detalle pr on pr.nPerId=p.nPerId and pr.nParId=1 and pr.nPcaId=1 and pr.bPdeEliminado ='0'      
        left join persona_detalle pt on pt.nPerId=p.nPerId and pt.nParId=1 and pt.nPcaId=3 and pt.bPdeEliminado ='0'      
        left join persona_detalle pdt on pdt.nPerId=p.nPerId and pdt.nParId=1 and pdt.nPcaId=7 and pdt.bPdeEliminado ='0'      
        left join persona_detalle pe on pe.nPerId=p.nPerId and pe.nParId=1 and pe.nPcaId=4 and pe.bPdeEliminado ='0' 
        left join persona_detalle pc on pc.nPerId=p.nPerId and pc.nParId=2 and pc.nPcaId=15 and pc.bPdeEliminado ='0'
        where pr.cPdeValor=ltrim(rtrim(?));", array($dni));
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setIdPersona($row->nPerId);
            $this->setNombres($row->cPerNombres);
            $this->setApellidoPaterno($row->cPerApellidoPaterno);
            $this->setApellidoMaterno($row->cPerApellidoMaterno);
            $this->setDni($row->DNI);
            $this->setCip($row->CIP);
            $this->setTelefono($row->Telefono);
            $this->setCorreoElectronico($row->Correo);
            $this->setDireccion($row->Direccion);
            $this->setTipo($row->cPerTipo);
            $resp = true;
        }
        else{   $query1 = $this->bdcolegio->query("select apecol as Apellido_Paterno, 
                                                          apematcol as Apellido_Materno,
                                                          nomcol as Nombre, 
                                                          direcol as Direccion,
                                                          telcol as Telefono,
                                                          emailsec as Correo,
                                                          lecol as DNI,
                                                          regcol as CIP
                                                   from colegiado
                                                   where lecol=ltrim(rtrim(?));", array($dni));
                if($query1->num_rows() > 0){
                    $row1 = $query1->row();
                    $this->setIdPersona("nada");
                    $this->setNombres($row1->Nombre);
                    $this->setApellidoPaterno($row1->Apellido_Paterno);
                    $this->setApellidoMaterno($row1->Apellido_Materno);
                    $this->setDni($row1->DNI);
                    $this->setCip($row1->CIP);
                    $this->setTelefono($row1->Telefono);
                    $this->setCorreoElectronico($row1->Correo);
                    $this->setDireccion($row1->Direccion);
                    $resp = true;
                    $this->db->query("");
                }
                else{
                    $resp = false;
                }
        }
        
        return $resp;
    }
    
    function buscarDocenteIdPersona($idPersona) {
        $resp = false;
        
        $query = $this->db->query("select p.nPerId,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno, p.cPerTipo,      
        pr.cPdeValor as DNI,      
        ifnull(pt.cPdeValor,'') as Telefono,      
        ifnull(pdt.cPdeValor,'') as Direccion,
        ifnull(pe.cPdeValor,'') as Correo 
        from persona p            
        inner join persona_detalle pr on pr.nPerId=p.nPerId and pr.nParId=1 and pr.nPcaId=1 and pr.bPdeEliminado ='0'      
        left join persona_detalle pt on pt.nPerId=p.nPerId and pt.nParId=1 and pt.nPcaId=3 and pt.bPdeEliminado ='0'      
        left join persona_detalle pdt on pdt.nPerId=p.nPerId and pdt.nParId=1 and pdt.nPcaId=7 and pdt.bPdeEliminado ='0'      
        left join persona_detalle pe on pe.nPerId=p.nPerId and pe.nParId=1 and pe.nPcaId=4 and pe.bPdeEliminado ='0'     
        where p.nPerId=?", array($idPersona));
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setIdPersona($row->nPerId);
            $this->setNombres($row->cPerNombres);
            $this->setApellidoPaterno($row->cPerApellidoPaterno);
            $this->setApellidoMaterno($row->cPerApellidoMaterno);
            $this->setDni($row->DNI);
            $this->setTelefono($row->Telefono);
            $this->setCorreoElectronico($row->Correo);
            $this->setDireccion($row->Direccion);
            $this->setTipo($row->cPerTipo);
            $resp = true;
        }
        else{
                $resp = false;
            }
        
        return $resp;
    }
    
    function cursosDocente($criterio=''){
        $idPersona = strstr($criterio['criterio'], '-', true);
        $f = strstr($criterio['criterio'], '-');
        $fecha = substr($f, 1);
        $mes = substr($fecha, 0, 2);
        $año = substr($fecha, 3, 4);
        $concatenar = $año."/".$mes;
        $query = $this->db->query("select h.nHorId as id, c.cCurNombre as Nombre, CONCAT(h.cHorDia, ' ', h.cHorHoraInicio, ' - ' , h.cHorHoraFin) as Horario, DATE_FORMAT(h.cHorFechaInicio, '%d/%m/%Y') as FechaInicio, DATE_FORMAT(h.cHorFechaFin, '%d/%m/%Y') as FechaFin from horario h 
        inner join persona p on h.nPerId=p.nPerId 
        inner join curso c on h.nCurId=c.nCurId 
        where p.nPerId= ? 
        and INSERT(h.cHorFechaInicio, 8, 4, '') = ?;", array($idPersona, $concatenar));
        
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function cursosCbo($valor) {
        $queryIguales = $this->db->query("select h.nHorId, CONCAT(c.cCurNombre, ' > ', h.cHorDia, '  ', h.cHorHoraInicio, ' - ', h.cHorHoraFin) as cCurNombre, h.cHorFechaFinProrroga from horario h 
                                   inner join curso c on c.nCurId = h.nCurId 
                                   where h.nPerId = ? and 
                                   h.nHorEstado = 0 and 
                                   h.cHorFechaFin = h.cHorFechaFinProrroga;", array($valor));
        $queryDiferentes = $this->db->query("select h.nHorId, CONCAT(c.cCurNombre, ' > ', h.cHorDia, '  ', h.cHorHoraInicio, ' - ', h.cHorHoraFin) as cCurNombre, h.cHorFechaFinProrroga from horario h 
                                   inner join curso c on c.nCurId = h.nCurId 
                                   where h.nPerId = ? and 
                                   h.nHorEstado = 0 and 
                                   h.cHorFechaFin != h.cHorFechaFinProrroga;", array($valor));
        $iguales = $queryIguales->result();
        $diferentes = $queryDiferentes->result();
        
        $queryfechaHoy = $this->db->query("select date_format(curdate(), '%Y/%m/%d') as hoy;");
        $row = $queryfechaHoy->row();
        $fechaHoy = $row->hoy;
        
        $arreglo = null;
        foreach($iguales as $fila){
            $queryfecha = $this->db->query("select date_format(date('".$fila->cHorFechaFinProrroga."'), '%Y/%m/%d') as fecha;");
            $row = $queryfecha->row();
            $fecha = $row->fecha;
            
            
            $queryNuevaFecha = $this->db->query("select date_format(adddate('".$fecha."', interval 7 day), '%Y/%m/%d') as nuevaFecha;");
            $row = $queryNuevaFecha->row();
            $nuevafecha = $row->nuevaFecha;
            
            if($fechaHoy <= $nuevafecha){
                $arreglo[$fila->nHorId] = $fila->cCurNombre;
            }
        }
        foreach($diferentes as $fila){
            if($fechaHoy <= $fila->cHorFechaFinProrroga){
                $arreglo[$fila->nHorId] = $fila->cCurNombre;
            }
        }
        
        if ($arreglo != null) {
            return $arreglo;
        } else {

            return false;
        }
    }
    
    function alumnosCurso($idHorario){
        $query = $this->db->query("select p.nPerId as id, UPPER(CONCAT(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,', ',p.cPerNombres)) as datosPersonales, pd.cPdeValor as CORREO 
        from matricula m 
                inner join horario h on m.nHorId = h.nHorId 
        inner join persona p on m.nPerId = p.nPerId 
        left join persona_detalle pd on p.nPerId = pd.nPerId 
        where h.nHorId = ? 
        and pd.nParId = 1 
        and pd.nPcaId = 4 and m.nMatTipo='1' and m.nMatEstado='1';", array($idHorario));
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
            //echo $fecha_fin;
        } else {
            return null;
        }
    }
    
    function alumnosAsistencia($criterio, $idHorario){
        $query = $this->db->query("select p.nPerId as id, CONCAT(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,', ',p.cPerNombres) as datosPersonales, pd.cPdeValor as DNI, a.cAsiValor as valorAsistencia 
        from matricula m 
        inner join persona p on m.nPerId = p.nPerId 
        inner join persona_detalle pd on p.nPerId = pd.nPerId 
        inner join horario h on m.nHorId = h.nHorId 
        inner join asistencia a on p.nPerId = a.nPerId 
        inner join sesion s on a.nSesId = s.nSesId 
        where h.nHorId = ? 
        and pd.nParId = 1 
        and pd.nPcaId = 1 
        and s.nSesId = ? and m.nMatTipo='1' and m.nMatEstado='1';", array($idHorario, $criterio));
        
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
    
    function alumnosNota($criterio, $idHorario){
        $query = $this->db->query("select p.nPerId as id, CONCAT(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,', ',p.cPerNombres) as datosPersonales, pd.cPdeValor as DNI, n.cNotValor as valorNota 
        from matricula m 
        inner join persona p on m.nPerId = p.nPerId 
        inner join persona_detalle pd on p.nPerId = pd.nPerId 
        inner join horario h on m.nHorId = h.nHorId 
        inner join nota n on p.nPerId = n.nPerId 
        inner join sesion s on n.nSesId = s.nSesId 
        where h.nHorId = ? 
        and pd.nParId = 1 
        and pd.nPcaId = 1 
        and s.nSesId = ? and m.nMatTipo='1' and m.nMatEstado='1';", array($idHorario, $criterio));
        
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }
    
    function dameNotasAlumno($idPersona, $idHorario){
        $query = $this->db->query("select concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Persona, s.cSesTitulo as Titulo, n.cNotValor as Nota from sesion s 
                                  inner join nota n on s.nSesId = n.nSesId 
                                  inner join persona p on n.nPerId = p.nPerId 
                                  inner join horario h on s.nHorId = h.nHorId 
                                  where p.nPerId = ? and h.nHorId = ?;", array($idPersona, $idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function dameAsistenciasAlumno($idPersona, $idHorario){
        $query = $this->db->query("select concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Persona, s.cSesTitulo as Titulo, DATE_FORMAT(s.cSesFechaProgramada,'%d/%m/%Y') as Fecha, a.cAsiValor as Estado from sesion s 
                                  inner join asistencia a on s.nSesId = a.nSesId 
                                  inner join persona p on a.nPerId = p.nPerId 
                                  inner join horario h on s.nHorId = h.nHorId 
                                  where p.nPerId = ? and h.nHorId = ?;", array($idPersona, $idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function docentePermisosIns() {
        $parametros = array($this->getIdPersona());
        $query1 = $this->db->query("select nUsuId from usuario where nPerId = ?",$parametros);
        foreach($query1->result() as $row) {
            $usuario = $row->nUsuId;
        }
        
        $query2 = $this->db->query("select nUsuId,nObjId
                                    from usuario_objeto
                                    where nUsuId = ".$usuario." and nObjId = 9;");
        if($query2->num_rows() == 0) {
            $query = $this->db->query("CALL USP_CVI_I_PermisosDocente(?)",array($usuario));
            $this->db->close();
            if ($query) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }
        }
        else {
            return true;
        }
    }
    function idPersonaSegunDni($dni) {
        $query = $this->db->query("select p.nPerId as id from persona p 
                                  inner join persona_detalle pd on p.nPerId = pd.nPerId 
                                  where pd.cPdeValor = ?;", array($dni));
        $row = $query->row();
        $idPersona = $row->id;
        
        return $idPersona;
    } 
    function dame_fechaFin($idHorario) {
        $query = $this->db->query("select h.cHorFechaFin as fecha_fin from horario h where h.nHorId=? and h.nHorEstado=0;", array($idHorario));
        $row = $query->row();
        $fecha_fin = $row->fecha_fin;
        return $fecha_fin;
    }       

}

?>
