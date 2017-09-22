CURSO
        --Insertar Curso--
        CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PI_I_CursoT`(IN `p_nombre` VARCHAR(45), IN `p_tipo` VARCHAR(9), IN `p_descripcion` VARCHAR(250))
            NO SQL
        BEGIN

        insert into curso values(null, p_nombre, p_tipo, p_descripcion, 0, 1);
        END

        --Update Curso--
        CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PI_U_CursoT`(IN `p_idCurso` INT, IN `p_nombre` VARCHAR(45), IN `p_tipo` VARCHAR(9), IN `p_descripcion` VARCHAR(250))
            NO SQL
        BEGIN

        update curso 
        set cCurNombre=p_nombre, 
                cCurTipo=p_tipo,
                cCurDescripcion=p_descripcion
                where nCurId=p_idCurso;
        END

        --Cambiar Estado--
        CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_PI_U_CursoTEstado`(IN `p_idCurso` INT)
        BEGIN

        update curso 
        set nCurTemporal=0 
        where nCurId=p_idCurso;

        END

------------------------------------------------------------------------------------------------
Sugerencia
--Cambio estado sugerencia---
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_SUGERENCIA_DEL`(IN `p_nSugerenciaId` INT)
    NO SQL
BEGIN
update sugerencia set cSugEstado=0 where
nSugerenciaId=p_nSugerenciaId;
END
------------------------------------------------------------------------------------------------
Valorizacion

--Update---
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_VALORIZACION_UPD`(IN `p_n_ValId` INT, IN `p_c_ValFechaCaducidad` CHAR(10), IN `p_c_ValDesripcionCurso` TEXT)
    NO SQL
BEGIN
    UPDATE valorizacion      
        SET  c_ValDesripcionCurso  =p_c_ValDesripcionCurso,
             c_ValFechaCaducidad   =p_c_ValFechaCaducidad                   
        WHERE  n_ValId     =p_n_ValId; 
END

--Cambio de estado--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_VALORIZACION_DEL`(IN `p_n_ValId` INT)
    NO SQL
BEGIN
update valorizacion set n_ValEstado=0 where
n_ValId=p_n_ValId;
END

------------------------------------------------------------------------------------------------
Anuncio
--Listar Anuncio--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_NOTICIA_BOLSA2`()
    NO SQL
BEGIN
SELECT nNotCodigo, cNotTitulo,cNotSumilla,cNotContenido, cNotFechaFinal FROM anuncio WHERE nNotEstado=1;
END
--Listar Multimedia--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_MULTIMEDIA_ANUNCIO`(IN `p_nNotCodigo` INT)
    NO SQL
begin
select * from anuncio where nNotCodigo=p_nNotCodigo;
end
--Combo Tipo Multimedia(Imagenes - Pdf)--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_TIPO_MULTIMEDIA2`()
    NO SQL
BEGIN
  SELECT 
               nTMultCodigo,
               cTMultDescripcion,
               nTMultEstado
        FROM   tb_portal_tipomultimedia
        WHERE  nTMultEstado=1;
END
--Inertar--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_BOLSA_TRABAJO2`(IN `p_cNotFechaFinal` CHAR(10), IN `p_cNotTitulo` VARCHAR(500), IN `p_cNotSumilla` VARCHAR(500), IN `p_cNotContenido` TEXT)
    NO SQL
BEGIN
INSERT  INTO   anuncio    
               (    
                      cNotTitulo          ,
                      cNotSumilla         ,
                      cNotContenido       ,
                      cNotFechaInicial    ,
                      cNotFechaFinal      ,    
                      cMultLinkMiniatura  ,       
                      nNotEstado       
                      
               )    
               VALUES    
               (    
                      p_cNotTitulo ,
                      p_cNotSumilla,
                      p_cNotContenido,
                      now(),           
                      p_cNotFechaFinal,
                      'default.jpg',  
                      1    
                      
               ); 
END
--Update--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_U_NOTICIAS_ACTUALIZA3`(IN `p_nNotCodigo` INT, IN `p_cNotFechaFinal` CHAR(10), IN `p_cNotTitulo` VARCHAR(500), IN `p_cNotSumilla` VARCHAR(500), IN `p_cNotContenido` TEXT)
    NO SQL
BEGIN
    UPDATE anuncio      
        SET    cNotTitulo    =p_cNotTitulo,  
               cNotSumilla   =p_cNotSumilla,
               cNotContenido =p_cNotContenido,      
               cNotFechaFinal=p_cNotFechaFinal              
        WHERE  nNotCodigo    =p_nNotCodigo;
END
--Eliminar Anuncio--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_D_NOTICIAS_ELIMINAR3`(IN `p_nNotCodigo` INT)
    NO SQL
BEGIN  update anuncio   SET    nNotEstado=0   WHERE  nNotCodigo=p_nNotCodigo;   END
--Eliminar Multimedia--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_D_MULTIMEDIA_ELIMINAR3`(IN `p_nNotCodigo` INT)
    NO SQL
BEGIN
update anuncio SET nMultEstado=0   WHERE  nNotCodigo=p_nNotCodigo;   
END
--Anuncio Upload--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_MULTIMEDIA_ANUNCIO`(IN `p_cMultLinkMiniatura` VARCHAR(255), IN `p_nNotCodigo` INT)
    NO SQL
begin 
update anuncio set cMultLinkMiniatura=p_cMultLinkMiniatura
where nNotCodigo =p_nNotCodigo;
end
--Anuncio Upload PDF--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_NOTICIAS_MULTIMEDIAPDF2`(IN `p_cMultLink` VARCHAR(255), IN `p_nNotCodigo` INT)
    NO SQL
begin
begin 
INSERT

        INTO tb_portal_multimedia

               (                     
					  nTMultCodigo,

                      nCMultCodigo      ,

                      cMultLinkMiniatura,

                      cMultLink         ,

                      cMultTitulo       ,

                      cMultDesc         ,

                      cMultFecha        ,

                      cMultFechapub     ,

                      nMultEstado       ,

                      nVistas

               )

               VALUES

               (

					  4,

                      1,

                      'pdf.png',

					  p_cMultLink,

                      null,

                      null,

					 now(),

					 now(),

                      1,0

               );
end;
begin
declare p_nMultCodigo int;  
set p_nMultCodigo = (SELECT nMultCodigo FROM  tb_portal_multimedia ORDER BY nMultCodigo DESC limit 1);

INSERT INTO   tb_portal_noticia_y_multimedia
           (  nNotCodigo, nMultCodigo)
               VALUES
               (p_nNotCodigo,p_nMultCodigo);
end;
end

------------------------------------------------------------------------------------------------
Noticias
--Listar Noticias--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_NOTICIAS2`(IN `p_nTNotCodigo` INT)
    NO SQL
BEGIN
SELECT  
tpn.nNotCodigo,cNotTitulo,cNotSumilla,cNotContenido,cNotFechaInicial,cNotFechaFinal, 
ifnull((SELECT m.cMultLinkMiniatura FROM tb_portal_noticia_y_multimedia nm 
INNER JOIN tb_portal_multimedia m on m.nMultCodigo=nm.nMultCodigo 
WHERE nm.nNotCodigo=tpn.nNotCodigo and m.nMultEstado=1 order BY nm.nMultCodigo DESC limit 1), 
'ico_notas_prensa_default.jpg') as cMultLinkMiniatura    
FROM tb_portal_noticia tpn  
WHERE nTNotCodigo= p_nTNotCodigo 
AND nNotEstado=1  
ORDER BY nNotCodigo DESC;
END
--Listar Multimedia--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_MULTIMEDIA_BOLSA2`(IN `p_nNotCodigo` INT)
    NO SQL
BEGIN
SELECT  pm.nMultCodigo,pm.cMultLinkMiniatura,pm.cMultLink ,  
                         pm.cMultTitulo         ,  
                         pm.cMultDesc           ,  
                         pm.nTMultCodigo        ,  
                         pm.nMultEstado         ,  
                         pm.cMultFecha          ,  
                         pnm.nNYMEsPrincipal    
                FROM     tb_portal_multimedia pm  
                         INNER JOIN tb_portal_noticia_y_multimedia pnm  
                         ON       pm.nMultCodigo = pnm.nMultCodigo  
                WHERE    pnm.nNotCodigo=p_nNotCodigo and pm.nMultEstado=1; 
END
--Combo Tipo Multimedia(Imagenes - Pdf)--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_TIPO_MULTIMEDIA2`()
    NO SQL
BEGIN
  SELECT 
               nTMultCodigo,
               cTMultDescripcion,
               nTMultEstado
        FROM   tb_portal_tipomultimedia
        WHERE  nTMultEstado=1;
END
--Inertar--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_INFORMACION_INTRANET2`(IN `p_cNotFechaFinal` CHAR(10), IN `p_cNotTitulo` VARCHAR(500), IN `p_cNotSumilla` VARCHAR(500), IN `p_cNotContenido` TEXT, IN `p_cNotipoCodigo` CHAR(10))
    NO SQL
BEGIN
INSERT  INTO   tb_portal_noticia    
               (    
                      cNotTitulo          ,
                      cNotSumilla         ,
                      cNotContenido       ,
                      cNotFechaPublicacion,
                      cNotFechaInicial    ,
                      cNotFechaFinal      ,    
                      nTNotCodigo         ,       
                      nUniOrgCodigo       ,       
                      nUsurCodigo    ,
                      nNotEstado       
               )    
               VALUES    
               (    
                      p_cNotTitulo ,
					  p_cNotSumilla,
                      p_cNotContenido                   ,
                      now(),
                      now(),            
                      p_cNotFechaFinal                  ,
                      p_cNotipoCodigo                               ,  
                      1                  ,    
                      1       ,  
                      1        
               ); 
END
--Update--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_U_NOTICIAS_ACTUALIZA2`(IN `p_nNotCodigo` INT, IN `p_cNotFechaFinal` CHAR(10), IN `p_cNotTitulo` VARCHAR(500), IN `p_cNotSumilla` VARCHAR(500), IN `p_cNotContenido` TEXT)
    NO SQL
BEGIN
    UPDATE tb_portal_noticia      
        SET    cNotTitulo    =p_cNotTitulo,
               cNotSumilla   =p_cNotSumilla,           
               cNotContenido =p_cNotContenido,      
               cNotFechaFinal=p_cNotFechaFinal              
        WHERE  nNotCodigo    =p_nNotCodigo;
END
--Eliminar Noticias--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_D_NOTICIAS_ELIMINAR2`(IN `p_nNotCodigo` INT)
    NO SQL
BEGIN  update tb_portal_noticia   SET    nNotEstado=0   WHERE  nNotCodigo=p_nNotCodigo;   END
--Eliminar Multimedia--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_D_MULTIMEDIA_ELIMINAR2`(IN `p_nMultCodigo` INT)
    NO SQL
BEGIN
update tb_portal_multimedia SET nMultEstado=0   WHERE  nMultCodigo=p_nMultCodigo;   
END
--Anuncio Upload--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_NOTICIAS_MULTIMEDIA2`(IN `p_cMultLinkMiniatura` VARCHAR(255), IN `p_nNotCodigo` INT)
    NO SQL
begin
begin 
INSERT

        INTO tb_portal_multimedia

               (                     

					  nTMultCodigo,

                      nCMultCodigo      ,

                      cMultLinkMiniatura,

                      cMultLink         ,

                      cMultTitulo       ,

                      cMultDesc         ,

                      cMultFecha        ,

                      cMultFechapub     ,

                      nMultEstado       ,

                      nVistas

               )

               VALUES

               (

					  2,

                      1,

                      p_cMultLinkMiniatura,

					  null,

                      null,

                      null,

					 now(),

					 now(),

                      1,0

               );
end;
begin
declare p_nMultCodigo int;  
set p_nMultCodigo = (SELECT nMultCodigo FROM  tb_portal_multimedia ORDER BY nMultCodigo DESC limit 1);

INSERT INTO   tb_portal_noticia_y_multimedia
           (  nNotCodigo, nMultCodigo)
               VALUES
               (p_nNotCodigo,p_nMultCodigo);
end;
end
--Anuncio Upload PDF--

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_NOTICIAS_MULTIMEDIAPDF2`(IN `p_cMultLink` VARCHAR(255), IN `p_nNotCodigo` INT)
    NO SQL
begin
begin 
INSERT

        INTO tb_portal_multimedia

               (                     
					  nTMultCodigo,

                      nCMultCodigo      ,

                      cMultLinkMiniatura,

                      cMultLink         ,

                      cMultTitulo       ,

                      cMultDesc         ,

                      cMultFecha        ,

                      cMultFechapub     ,

                      nMultEstado       ,

                      nVistas

               )

               VALUES

               (

					  4,

                      1,

                      'pdf.png',

					  p_cMultLink,

                      null,

                      null,

					 now(),

					 now(),

                      1,0

               );
end;
begin
declare p_nMultCodigo int;  
set p_nMultCodigo = (SELECT nMultCodigo FROM  tb_portal_multimedia ORDER BY nMultCodigo DESC limit 1);

INSERT INTO   tb_portal_noticia_y_multimedia
           (  nNotCodigo, nMultCodigo)
               VALUES
               (p_nNotCodigo,p_nMultCodigo);
end;
end