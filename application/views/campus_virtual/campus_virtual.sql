//------------- INICIO INSERT DE CURSO --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `bdcampusvirtual`.`USP_CVI_I_Curso` $$
CREATE PROCEDURE `bdcampusvirtual`.`USP_CVI_I_Curso` (in p_nombre varchar(45),
in p_tipo varchar(9), in p_duracion int, in p_duracionTipo varchar(15),
in p_descripcion varchar(250), in p_costo double)

BEGIN

insert into curso values(null, p_nombre, p_tipo, p_duracion, p_duracionTipo, p_descripcion, p_costo, 1);

END $$

DELIMITER ;

//------------- FIN INSERT DE CURSO --------------------------

//------------- INICIO UPDATE DE CURSO --------------------------
DELIMITER $$
USE `cipbdintegrada`$$
CREATE PROCEDURE `USP_CVI_U_Curso`
   (IN `p_idCurso` INT,
	IN `p_nombre` VARCHAR(45),
	IN `p_tipo` VARCHAR(9),
	IN `p_descripcion` VARCHAR(250))

BEGIN

update curso 
set cCurNombre=p_nombre, 
	cCurTipo=p_tipo,
	cCurDescripcion=p_descripcion
where nCurId=p_idCurso;

END$$

DELIMITER ;

//------------- FIN UPDATE DE CURSO --------------------------

//------------- INICIO INSERT DE PREGUNTA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `bdcampusvirtual`.`USP_CVI_I_Pregunta` $$
CREATE PROCEDURE `bdcampusvirtual`.`USP_CVI_I_Pregunta` (in p_enunciado varchar(100))

BEGIN

insert into pregunta values(null,p_enunciado);

END $$

DELIMITER ;

//------------- FIN INSERT DE PREGUNTA --------------------------

//------------- INICIO UPDATE DE PREGUNTA --------------------------
DELIMITER $$
USE `cipbdintegrada`$$
CREATE PROCEDURE `USP_CVI_U_Curso`
   (IN `p_idpregunta` INT,
	IN `p_enunciado` VARCHAR(100),
	IN `p_bloque` INT(1)
BEGIN

update pregunta
set cPreEnunciado=p_enunciado, 
	nPreBloque=p_bloque 
where nPreId=p_idpregunta;

END$$

DELIMITER ;

//------------- FIN UPDATE DE PREGUNTA --------------------------

//------------- INICIO INSERT DE DOCENTE --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `bdcampusvirtual`.`USP_CVI_I_Docente` $$
CREATE PROCEDURE `bdcampusvirtual`.`USP_CVI_I_Docente` (in p_nombre varchar(45), in p_apellidoPaterno varchar(45),
in p_apellidoMaterno varchar(45), in p_telefono varchar(10), in p_correoElectronico varchar(30),
in p_cip varchar(7), in p_tipo char(2), in p_dni char(8), in p_foto blob, in p_curriculum varchar(45),
in p_especialidad varchar(45), in p_referenciaLaboral varchar(45), p_usuario varchar(45), p_contraseña varchar(45))

BEGIN

insert into usuario values(null, p_nombre, p_apellidoPaterno, p_apellidoMaterno, p_telefono, p_correoElectronico,
p_cip, p_tipo, p_dni, p_foto, p_curriculum, p_especialidad, p_referenciaLaboral, p_usuario, p_contraseña);


END $$

DELIMITER ;

//------------- FIN INSERT DE DOCENTE --------------------------

//------------- INICIO UPDATE DE DOCENTE --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada`.`USP_CVI_U_Docente` $$
CREATE PROCEDURE `cipbdintegrada`.`USP_CVI_U_Docente` (in p_idPersona int, in p_nombre varchar(45), in p_apellidoPaterno varchar(45),
in p_apellidoMaterno varchar(45), in p_telefono varchar(10), in p_correoElectronico varchar(30),
in p_dni char(8), p_direccion varchar(100))

BEGIN

update persona set cPerNombre=p_nombre, cPerApellidoPaterno=p_apellidoPaterno, cPerApellidoMaterno=p_apellidoMaterno 
where nPerId=p_idPersona;

update persona_detalle set cPdeValor=p_telefono 
where nPerId=p_idPersona and nParId=1 and nPcaId=3; 

update persona_detalle set cPdeValor=p_correoElectronico 
where nPerId=p_idPersona and nParId=1 and nPcaId=4; 

update persona_detalle set cPdeValor=p_direccion 
where nPerId=p_idPersona and nParId=1 and nPcaId=7; 

END $$

DELIMITER ;

//------------- FIN DOCENTE DE DOCENTE --------------------------


//------------- INICIO INSERT DE HORARIO --------------------------
DELIMITER $$
USE `cipbdintegrada`$$
CREATE PROCEDURE `cipbdintegrada`.`USP_CVI_I_Horario` 
    (in p_idHorario int,
     in p_idDocente int,
     in p_idCurso int,
     in p_fechaInicio varchar(10),
     in p_dia varchar(10),
     in p_horaInicio varchar(5),
     in p_ambiente varchar(20),
     in p_fechaFin varchar(10),
     in p_horaFin varchar(5),
     in p_diasliminte int, 
     IN p_duracion INT,
     IN p_duracionTipo VARCHAR(12),
     IN p_costo DOUBLE)

BEGIN

insert into horario 
    values(null,
	   p_idDocente,
           p_idCurso,
           p_fechaInicio,
           p_dia,
           p_horaInicio,
           p_ambiente, 
           p_fechaFin,
           p_horaFin,
           p_dialimite,
           p_duracion, 
           p_duracionTipo, 
           p_costo);
END$$

DELIMITER ;
//------------- FIN INSERT DE HORARIO --------------------------

//------------- INICIO INSERT DE PERSONA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `bdcampusvirtual`.`USP_CVI_I_Persona` $$
CREATE PROCEDURE `bdcampusvirtual`.`USP_CVI_I_Persona` (in p_cPerNombres varchar(200), in p_cPerApellidoPaterno varchar(80),
in p_cPerApellidoMaterno varchar(80), in p_telefono varchar(10), in p_correoElectronico varchar(30),
in p_bPerEstado char(1), in p_cPerTipo char(1), in p_cPerDni char(8), in p_foto blob, in p_curriculum varchar(45),
in p_especialidad varchar(45), in p_referenciaLaboral varchar(45), p_usuario varchar(45), p_contraseña varchar(45))

BEGIN

insert into persona values(null, p_nombre, p_apellidoPaterno, p_apellidoMaterno, p_telefono, p_correoElectronico,
p_cip, p_tipo, p_dni, p_foto, p_curriculum, p_especialidad, p_referenciaLaboral, p_usuario, p_contraseña);


END $$

DELIMITER ;

//------------- FIN INSERT DE PERSONA --------------------------

//------------- Buscar Cursos por Horario

USE `bdcampusvirtual`;
DROP procedure IF EXISTS `USP_CVI_S_CursosHorario`;

DELIMITER $$
USE `bdcampusvirtual`$$
CREATE PROCEDURE `bdcampusvirtual`.`USP_CVI_S_CursosHorario` (IN `fecha` VARCHAR (10))
BEGIN

SELECT c.idCurso, c.Nombre 
FROM curso AS c 
   INNER JOIN horario AS h 
WHERE h.FechaFin>fecha
AND c.Estado = 1;

END$$

DELIMITER ;

//----------------Fin

//------------- INICIO UPDATE DE HORARIO --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_U_Horario` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_U_Horario` (in p_idHorario int, in p_idDocente int, in p_idCurso int,
in p_fechainicio varchar(10), in p_dia varchar(10), in p_horaInicio varchar(10), in p_duracion int,
in p_fechaFin varchar(10), in p_diasLimite int, in p_duracionTipo varchar(12), in p_ambiente varchar(20),
in p_horaFin varchar(5), in p_costo double)

BEGIN

update horario set nPerId=p_idDocente, nCurId=p_idCurso, cHorFechaInicio=p_fechainicio,cHorDia=p_dia, 
cHorHoraInicio=p_horaInicio, cHorDuracion=p_duracion, cHorFechaFin=p_fechaFin, nHorDiasLimite=p_diasLimite, 
cHorDuracionTipo=p_duracionTipo, cHorAmbiente=p_ambiente, cHorHoraFin=p_horaFin,Costo=p_costo 
where nHorId=p_idHorario;


END $$

DELIMITER ;

//------------- FIN UPDATE DE HORARIO --------------------------

//------------- INICIO INSERT DE HORARIO TEMPORAL --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_I_HorarioTemporal` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_HorarioTemporal` (in p_fechaTemporal varchar(10), in p_idHorario int)

BEGIN

insert into horario_temporal values(p_fechaTemporal, p_idHorario);

END $$

DELIMITER ;

//------------- FIN INSERT DE HORARIO TEMPORAL --------------------------

//------------- INICIO INSERT DE SESION --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_I_Sesion` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_Sesion` (in p_idhorario int,
in p_fecha char(10), in p_titulo varchar(50))

BEGIN

insert into sesion values(null, p_idhorario, p_fecha, p_titulo);

END $$

DELIMITER ;

//------------- FIN INSERT DE CURSO --------------------------

//------------- INICIO INSERT DE ASISTENCIA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_I_Asistencia` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_Asistencia` (in p_idsesion int, in p_idpersona int,
in p_fecha char(10), in p_valor char(2))

BEGIN

insert into asistencia values(p_idsesion, p_idpersona, p_fecha, p_valor);

END $$

DELIMITER ;

//------------- FIN INSERT DE ASISTENCIA --------------------------

//------------- INICIO INSERT DE MATRICULA ------------------------

USE `cipbdintegrada2`;
DROP procedure IF EXISTS `USP_CVI_I_Matricula`;

DELIMITER $$
USE `cipbdintegrada2`$$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_Matricula` 
				(IN `p_idAlumno` INT(11),
				 IN `p_idHorario` INT(11),
				 IN `p_Estado`INT(1)
				)
BEGIN

insert into matricula values(p_idAlumno, 
							 p_idHorario,
							 p_Edtado);

END$$

DELIMITER ;

//------------- FIN INSERT DE MATRICULA ------------------------

//------------- INICIO UPDATE DE ASISTENCIA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_U_Asistencia` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_U_Asistencia` (in p_idsesion int, in p_idpersona int,
in p_valor char(2))

BEGIN

update asistencia set cAsiValor = p_valor 
where nSesId=p_idsesion and nPerId=p_idpersona;

END $$

DELIMITER ;

//------------- FIN UPDATE DE ASISTENCIA --------------------------

//------------- INICIO UPDATE DE NOTA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_U_Nota` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_U_Nota` (in p_idpersona int, in p_idsesion int, 
in p_valor char(2))

BEGIN

update nota set cNotValor = p_valor 
where nPerId = p_idpersona and nSesId = p_idsesion;

END $$

DELIMITER ;

//------------- FIN UPDATE DE NOTA --------------------------

//------------- INICIO SELECT FILTRO MATRICULAS BY TIPO -----------------------------
DELIMITER $$
USE `cipbdintegrada2`$$
CREATE DEFINER=`CH`@`192.168.2.32` PROCEDURE `USP_CVI_S_Matricula_ByTipo`(IN `p_tipo` INT(1))
BEGIN

SELECT CONCAT(p.cPerApellidoPaterno,' ',
			  p.cPerApellidoMaterno,' ',
			  p.cPerNombres) as Alumno, 
	   m.nPerId as AlumnoId,
	   c.cCurNombre as Curso,
	   h.cHorFechaInicio as Fecha_Inicio,
	   h.cHorDia as Dia,
	   h.cHorHoraInicio  as Hora_Inicio,
	   h.cHorHoraFin as Hora_Fin,
	   h.cHorAmbiente as Ambiente,
	   m.nHorId as HorarioId
FROM matricula as m
 INNER JOIN persona as p
 INNER JOIN horario as h
 INNER JOIN curso as c
WHERE m.nPerId = p. nPerId
  AND m.nHorId = h.nHorId
  AND h.nCurId = c.nCurId
  AND m.nMatTipo = p_tipo
  AND m.nMatEstado = 1;
END$$

DELIMITER ;
//------------- FIN SELECT FILTRO MATRICULAS BY TIPO -----------------------------

//------------- INICIO INSERT DE MATERIAL --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_I_Material` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_Material` (in p_idsesion int, in p_tipoArchivo varchar(7),
in p_ubicacion varchar(255))

BEGIN

insert into material_curso values(null, p_idsesion, p_tipoArchivo, p_ubicacion);

END $$

DELIMITER ;

//------------- FIN INSERT DE MATERIAL --------------------------

//------------- INICIO MODIFICAR ESTADO MATRICULA -------------------------
USE `cipbdintegrada2`;
DROP procedure IF EXISTS `USP_CVI_U_MatriculaEstado`;

DELIMITER $$
USE `cipbdintegrada2`$$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_U_MatriculaEstado` (IN `p_idAlumno` INT(11),
																IN `p_idHorario` INT(11))
BEGIN

UPDATE matricula
SET nMatEstado = 0
WHERE nPerId = p_idAlumno
  AND nHorId = p_idHorario;

END$$

DELIMITER ;
//------------- FIN MODIFICAR ESTADO MATRICULA -------------------------

//------------- INICIO GET COSTO CURSO -------------------
USE `cipbdintegrada2`;
DROP procedure IF EXISTS `USP_CVI_S_GetCostoCurso`;

DELIMITER $$
USE `cipbdintegrada2`$$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_S_GetCostoCurso` (IN p_idHorario INT(11))
BEGIN

SELECT h.nHorCosto
FROM horario as h
WHERE h.nHorId = p_idHorario;

END$$

DELIMITER ;
//------------- FIN GET COSTO CURSO -------------------

//------------- INICIO INSERTAR PAGO -------------------
USE `cipbdintegrada2`;
DROP procedure IF EXISTS `USP_CVI_I_Pago`;

DELIMITER $$
USE `cipbdintegrada2`$$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_Pago` (IN p_idHorario INT(11),
													 IN p_idAlumno INT (11),
													 IN p_monto INT(11),
													 IN p_fecha CHAR(10),
													 IN p_nroVoucher INT(11))
BEGIN
insert into pago values(null,p_idHorario,p_idAlumno,p_monto,p_fecha,p_nroVoucher);
END$$

DELIMITER ;
//------------- INICIO INSERTAR PAGO -------------------

//------------- INICIO MODIFICAR DE SESION --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_U_Sesion` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_U_Sesion` (in p_titulo varchar(50), in p_idsesion int)

BEGIN

update sesion set cSesTitulo=p_titulo where nSesId=p_idsesion;

END $$

DELIMITER ;

//------------- FIN MODIFICAR DE SESION --------------------------

//------------- INICIO ELIMINAR DE MATERIAL --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_D_Material` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_D_Material` (in p_idmaterial int)

BEGIN

delete from material_curso where nMcuId=p_idmaterial;

END $$

DELIMITER ;

//------------- FIN ELIMINAR DE MATERIAL --------------------------

//------------- INICIO ELIMINAR DE NOTA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_D_Nota` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_D_Nota` (in p_idsesion int)

BEGIN

delete from nota where nSesId = p_idsesion;

END $$

DELIMITER ;
//------------- FIN ELIMINAR DE NOTA --------------------------

//------------- INICIO ELIMINAR DE HORARIO --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_D_Horario` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_D_Horario` (in p_idhorario int)

BEGIN

update horario set nHorEstado = 1 where nHorId = p_idhorario;

END $$

DELIMITER ;
//------------- FIN ELIMINAR DE HORARIO --------------------------

//------------- INICIO MODIFICAR DE HORARIO PRORROGA --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_U_HorarioProrroga` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_U_HorarioProrroga` (in p_idhorario int, in p_fechaprorroga varchar(10))

BEGIN

update horario set cHorFechaFinProrroga=p_fechaprorroga where nHorId=p_idhorario;

END $$

DELIMITER ;
//------------- FIN MODIFICAR DE HORARIO PRORROGA --------------------------

//------------- INICIO INSERT DE SESIONES TEMPORALES --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_I_SesionTemporal` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_SesionTemporal` (in p_idhorario int,
in p_fecha varchar(10))

BEGIN

insert into sesion values(null, p_idhorario, p_fecha, null, 0, null);

END $$

DELIMITER ;

//------------- FIN INSERT DE SESIONES TEMPORALES --------------------------

//------------- INICIO INSERT DE SESION RECUPERACION --------------------------
DELIMITER $$

DROP PROCEDURE IF EXISTS `cipbdintegrada2`.`USP_CVI_I_SesionRecuperacion` $$
CREATE PROCEDURE `cipbdintegrada2`.`USP_CVI_I_SesionRecuperacion` (in p_idhorario int,
in p_fecha varchar(10), in p_observacion varchar(250))

BEGIN

insert into sesion values(null, p_idhorario, p_fecha, null, 0, p_observacion);

END $$

DELIMITER ;

//------------- FIN INSERT DE SESION RECUPERACION --------------------------