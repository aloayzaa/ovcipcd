CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_MATERIAL_ADD`( 
in p_cMatTipo varchar(2),
in p_cMatTitulo varchar(100),
in p_cMatAutor varchar(100),
in p_codcap  int(11),
in p_codesp   int(11),
in p_codinsacad int(11),
in p_dMatAño varchar(12),
in p_cMatResumen varchar(100),
in p_cMatObservacion varchar(100)
)
BEGIN
INSERT INTO `tbl_bib_matebibliografico`(`cMatTipo`,`cMatTitulo`,`cMatAutor`,`codcap`,`codesp`,`codinsacad`,`dMatAño`,   `cMatResumen`,`cMatObservacion`) VALUES (p_cMatTipo,p_cMatTitulo,p_cMatAutor,p_codcap,p_codesp,p_codinsacad,p_dMatAño,p_cMatResumen,p_cMatObservacion);
END

--procedimiento prueba
CREATE PROCEDURE [dbo].[USP_SIT_S_Empadronado]                  
@tipo char(1),                  
@nombre varchar(80)=null,                  
@Dni varchar(8)=null,                   
@Id varchar(20)=null,                  
@Formato varchar(13)=null,                   
@Exp varchar(4)=null,                
@nEmpId int=null                   
as                  
if @tipo='l' --devuelve empadronado                  
begin                  
 select e.nEmpId ,                  
 (p.cPerApellidoPaterno+' '+p.cPerApellidoMaterno+' '+p.cPerNombres)as nombre,                  
 cPdeValor AS Dni,                  
 case when e.nParIdTipo=1 then 'Conductor' else(CASE WHEN e.nParIdTipo=2 THEN 'Cobrador' ELSE ''END)end AS tipoemp,                  
 lc.nParIdCategoria, lc.nParIdClase,                  
 --p1.cParDescripcion as claseLC,                  
 --p7.cParDescripcion as tipoLC,                  
 --(CASE WHEN nParIdClase=1 THEN p6.cParDescripcion else (CASE WHEN nParIdClase=2 THEN p4.cParDescripcion else p5.cParDescripcion end) end)as categoriaLC,                  
 --lc.nLicNumero,                  
   case when e.nParIdTipo=1 then p1.cParDescripcion else '' end AS claseLC,                  
   case when e.nParIdTipo=1 then p7.cParDescripcion else '' end AS tipoLC,                  
   case when e.nParIdTipo=1 then (CASE WHEN nParIdClase=1 THEN p6.cParDescripcion else (CASE WHEN nParIdClase=2 THEN p4.cParDescripcion else p5.cParDescripcion end) end) else '' end AS categoriaLC,         
   case when e.nParIdTipo=1 then lc.nLicNumero else '' end AS nLicNumero,         
 D.cDioNumero,EV.cDddNumerado,ev.dDddFechaInicio,CONVERT(VARCHAR(10),dDddFechaFin,103) as dEsvFechaVence,                  
 p2.cParDescripcion as estadoexam,                  
 EV.nDddId,                  
 CONVERT(varchar(10), nExpNumero_Temp)+'-'+CONVERT(varchar(4), nExpAño_Temp)+'-'+rtrim(ltrim(cExpSigla_Temp))+'-'+CONVERT(varchar(4), rtrim(ltrim(nEdeNumeroDetalle_Temp))) as expcompleto,                  
 e.cEmpFoto                     
 from persona p                   
 inner join EMPADRONADO e on p.nPerId=e.nPerId                  
 inner join PERSONA_DETALLE pd on pd.nPerId=p.nPerId and pd.nParId=1 and pd.nPcaId=1                  
 left join LICENCIA_CONDUCIR lc on p.nPerId=lc.nPerId and lc.cLicEstado ='H' and lc.nParIdTipoLC<>5                  
 left join EMPADRONADO_DOCUMENTARIO c on e.nEmpId =c.nEmpId                   
 LEFT JOIN DOCUMENTARIO D ON c.nDioId=D.nDioId                  
 LEFT JOIN DOCUMENTARIO_DETALLE EV ON D.nDioId =EV.nDioId and ev.cDddEstado ='H'                   
 LEFT JOIN PSICOLOGICO PS ON e.nEmpId =ps.nempid and ps.cPsiEstado='H'                  
 left join parametro p2 on ps.nParIdEstadoExam=p2.nParId and p2.npcaid=787                  
 left join PARAMETRO p1 on lc.nParIdClase =p1.nParId and p1.nPcaId=794                   
 left join PARAMETRO p6 on lc.nParIdCategoria =p6.nParId and p6.nPcaId=795                  
 left join PARAMETRO p4 on lc.nParIdCategoria =p4.nParId and p4.nPcaId=796                  
 left join PARAMETRO p5 on lc.nParIdCategoria =p5.nParId and p5.nPcaId=797                  
 left join PARAMETRO p7 on lc.nParIdTipoLC =p7.nParId and p7.nPcaId=785                  
 where  e.nPcaIdTipo =782 and                  
 (p.cPerApellidoPaterno+' '+p.cPerApellidoMaterno+' '+p.cPerNombres like '%'+replace(@nombre,'%2F',' ')+'%'  or @nombre='a')                  
 and (cPdeValor like '%'+@Dni+'%'  or @Dni='a')                  
 and e.cEmpEstado ='H' AND p.bPerEstado='0'                    
 and (D.cDioNumero like '%'+@Id+'%' or @Id='a')                     
 and (EV.cDddNumerado like '%'+@Formato+'%' or @Formato='a')                     
 and (CAST(EV.nExpNumero_Temp AS varchar(4)) like '%'+@Exp+'%' or @Exp='a')                
    ORDER BY nEmpId DESC                   
end                  
                  
else if @tipo ='d' --devuelve una persona para ser asignada como empadronado                  
begin                  
 select p.nPerId,(p.cPerNombres+' '+p.cPerApellidoPaterno+' '+p.cPerApellidoMaterno)as Nombre                   
 from persona p     
 inner join PERSONA_DETALLE pd on pd.nPerId=p.nPerId                   
 where rtrim(pd.cPdeValor)=rtrim(@dni)          
end                  
else if @tipo='s'                  
begin                  
 if(select COUNT(*) from PERSONA_DETALLE where nPcaId=1 and nParId=1 and cPdeValor=ltrim(rtrim(@dni)))>0                    
 begin                  
  select p.nPerId,P.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno,                  
  ltrim(rtrim(p.cPerApellidoPaterno))+' '+ltrim(rtrim(p.cPerApellidoMaterno))+' '+ltrim(rtrim(P.cPerNombres)) as titular,                  
  pr.cPdeValor as DNI ,                  
  isnull(pt.cPdeValor,'') as Telefono,                  
  isnull(pdt.cPdeValor,'') as Direccion,                  
  isnull(pn.bPnaSexo,'') as sexo,                  
  ISNULL(CONVERT(VARCHAR(10),fPnaFechaNacimiento,103),'') as fnac,                  
  ISNULL(pa.nMulIdNivelEducativo,'13') as instruccion                  
  from persona p                    
  inner join PERSONA_NATURAL pn ON pn.nPerId=P.nPerId                  
  inner join PERSONA_DETALLE pr on pr.nPerId=p.nPerId and pr.nParId=1 and pr.nPcaId=1 and pr.bPdeEliminado ='0'                  
  LEFT join PERSONA_DETALLE pt on pt.nPerId=p.nPerId and pt.nParId=1 and pt.nPcaId=3 and pt.bPdeEliminado ='0'                  
  LEFT join PERSONA_DETALLE pdt on pdt.nPerId=p.nPerId and pdt.nParId=1 and pdt.nPcaId=7 and pdt.bPdeEliminado ='0'                  
  LEFT join PERSONA_DETALLE pe on pe.nPerId=p.nPerId and pe.nParId=1 and pe.nPcaId=4 and pe.bPdeEliminado ='0'                  
  left join PERSONA_ACADEMICO pa on p.nperid=pa.nPerId and cPacEstado='A'                  
  WHERE pr.cPdeValor=ltrim(rtrim(@dni))                  
 end                  
 else                  
 begin                  
  SELECT P.nombres as cPerNombres ,P.apepat as cPerApellidoPaterno,P.apemat as cPerApellidoMaterno,                  
  '' as Telefono,'' as Direccion,'' as sexo,'' as fnac,'13' as instruccion                  
  FROM persona.dbo.Padron_Nacionales P where dni=LTRIM(RTRIM(@dni))                  
 end                  
END                  
                  
else if @tipo='n'                  
begin                  
 select nEmpId,P.cPerNombres,p.cPerApellidoPaterno ,p.cPerApellidoMaterno,                  
 pr.cPdeValor as DNI ,p.nPerId,                  
 isnull(pt.cPdeValor,'') as Telefono,                  
 isnull(ltrim(rtrim(pdt.cPdeValor)),'') as Direccion,                  
 isnull(pn.bPnaSexo,'') as sexo,                  
 ISNULL(CONVERT(VARCHAR(10),fPnaFechaNacimiento,103),'') as fnac,                  
 ISNULL(pa.nMulIdNivelEducativo,'13') as instruccion,                  
 e.*,                  
 cParDescripcion as tipoemp                  
 from persona p                    
 inner join PERSONA_NATURAL pn ON pn.nPerId=P.nPerId                  
 inner join PERSONA_DETALLE pr on pr.nPerId=p.nPerId and pr.nParId=1 and pr.nPcaId=1 and pr.bPdeEliminado ='0'                  
 LEFT join PERSONA_DETALLE pt on pt.nPerId=p.nPerId and pt.nParId=1 and pt.nPcaId=3 and pt.bPdeEliminado ='0'                  
 LEFT join PERSONA_DETALLE pdt on pdt.nPerId=p.nPerId and pdt.nParId=1 and pdt.nPcaId=7 and pdt.bPdeEliminado ='0'                  
 LEFT join PERSONA_DETALLE pe on pe.nPerId=p.nPerId and pe.nParId=1 and pe.nPcaId=4 and pe.bPdeEliminado ='0'                  
 left join PERSONA_ACADEMICO pa on p.nperid=pa.nPerId and cPacEstado='A'                  
 inner join EMPADRONADO e on p.nPerId=e.nPerId and e.nPcaIdTipo =782                  
 left join PARAMETRO par on e.nParIdTipo =par.nParId and par.nPcaId =782                  
 WHERE e.nEmpId=@nEmpId                   
end     
    
else if @tipo='o' --devuelve los empadronados segun dni para registro de CHC                  
begin                  
 select top(1) e.nEmpId ,                  
 (p.cPerApellidoPaterno+' '+p.cPerApellidoMaterno+' '+p.cPerNombres)as nombre,                  
 cPdeValor AS Dni,                  
 case when e.nParIdTipo=1 then 'Conductor' else(CASE WHEN e.nParIdTipo=2 THEN 'Cobrador' ELSE ''END)end AS tipoemp,                  
 lc.nParIdCategoria, lc.nParIdClase,                  
 --p1.cParDescripcion as claseLC,                  
 --p7.cParDescripcion as tipoLC,                  
 --(CASE WHEN nParIdClase=1 THEN p6.cParDescripcion else (CASE WHEN nParIdClase=2 THEN p4.cParDescripcion else p5.cParDescripcion end) end)as categoriaLC,                  
 --lc.nLicNumero,                  
   case when e.nParIdTipo=1 then p1.cParDescripcion else '' end AS claseLC,                  
   case when e.nParIdTipo=1 then p7.cParDescripcion else '' end AS tipoLC,                  
   case when e.nParIdTipo=1 then (CASE WHEN nParIdClase=1 THEN p6.cParDescripcion else (CASE WHEN nParIdClase=2 THEN p4.cParDescripcion else p5.cParDescripcion end) end) else '' end AS categoriaLC,         
   case when e.nParIdTipo=1 then lc.nLicNumero else '' end AS nLicNumero,         
 D.cDioNumero,EV.cDddNumerado,ev.dDddFechaInicio,CONVERT(VARCHAR(10),dDddFechaFin,103) as dEsvFechaVence,                  
 p2.cParDescripcion as estadoexam,                  
 EV.nDddId,                  
 CAST(nExpNumero_Temp AS varchar(4))+'-'+CAST(nExpAño_Temp AS varchar(4))+'-'+                  
 CAST(cExpSigla_Temp AS varchar(5))+'-'+CAST(nEdeNumeroDetalle_Temp AS varchar(1)) as expcompleto,                  
 e.cEmpFoto                     
 from persona p                   
 inner join EMPADRONADO e on p.nPerId=e.nPerId                  
 inner join PERSONA_DETALLE pd on pd.nPerId=p.nPerId and pd.nParId=1 and pd.nPcaId=1                  
 left join LICENCIA_CONDUCIR lc on p.nPerId=lc.nPerId and lc.cLicEstado ='H' and lc.nParIdTipoLC<>5                  
 left join EMPADRONADO_DOCUMENTARIO c on e.nEmpId =c.nEmpId                   
 LEFT JOIN DOCUMENTARIO D ON c.nDioId=D.nDioId                  
 LEFT JOIN DOCUMENTARIO_DETALLE EV ON D.nDioId =EV.nDioId and ev.cDddEstado ='H'                   
 LEFT JOIN PSICOLOGICO PS ON e.nEmpId =ps.nempid and ps.cPsiEstado='H'                  
 left join parametro p2 on ps.nParIdEstadoExam=p2.nParId and p2.npcaid=787                  
 left join PARAMETRO p1 on lc.nParIdClase =p1.nParId and p1.nPcaId=794                   
 left join PARAMETRO p6 on lc.nParIdCategoria =p6.nParId and p6.nPcaId=795                  
 left join PARAMETRO p4 on lc.nParIdCategoria =p4.nParId and p4.nPcaId=796                  
 left join PARAMETRO p5 on lc.nParIdCategoria =p5.nParId and p5.nPcaId=797                  
 left join PARAMETRO p7 on lc.nParIdTipoLC =p7.nParId and p7.nPcaId=785                  
 where   e.nPcaIdTipo =782 and                  
 (cPdeValor like '%'+@Dni+'%')                  
 and e.cEmpEstado ='H' AND p.bPerEstado='0'                             
    ORDER BY nEmpId DESC                                               
end   
  
  
else if @tipo='t' --devuelve los tipos de empadronados                
begin                  
 select e.nEmpId ,                  
 (p.cPerApellidoPaterno+' '+p.cPerApellidoMaterno+' '+p.cPerNombres)as nombre,                  
 cPdeValor AS Dni,                  
 case when e.nParIdTipo=1 then 'Conductor' else(CASE WHEN e.nParIdTipo=2 THEN 'Cobrador' ELSE ''END)end AS tipoemp,                  
 lc.nParIdCategoria, lc.nParIdClase,                  
 --p1.cParDescripcion as claseLC,                  
 --p7.cParDescripcion as tipoLC,                  
 --(CASE WHEN nParIdClase=1 THEN p6.cParDescripcion else (CASE WHEN nParIdClase=2 THEN p4.cParDescripcion else p5.cParDescripcion end) end)as categoriaLC,                  
 --lc.nLicNumero,                  
   case when e.nParIdTipo=1 then p1.cParDescripcion else '' end AS claseLC,                  
   case when e.nParIdTipo=1 then p7.cParDescripcion else '' end AS tipoLC,                  
   case when e.nParIdTipo=1 then (CASE WHEN nParIdClase=1 THEN p6.cParDescripcion else (CASE WHEN nParIdClase=2 THEN p4.cParDescripcion else p5.cParDescripcion end) end) else '' end AS categoriaLC,         
   case when e.nParIdTipo=1 then lc.nLicNumero else '' end AS nLicNumero,         
 D.cDioNumero,EV.cDddNumerado,ev.dDddFechaInicio,CONVERT(VARCHAR(10),dDddFechaFin,103) as dEsvFechaVence,                  
 p2.cParDescripcion as estadoexam,                  
 EV.nDddId,                  
 CAST(nExpNumero_Temp AS varchar(4))+'-'+CAST(nExpAño_Temp AS varchar(4))+'-'+                  
 CAST(cExpSigla_Temp AS varchar(5))+'-'+CAST(nEdeNumeroDetalle_Temp AS varchar(1)) as expcompleto,                  
 e.cEmpFoto                     
 from persona p                   
 inner join EMPADRONADO e on p.nPerId=e.nPerId                  
 inner join PERSONA_DETALLE pd on pd.nPerId=p.nPerId and pd.nParId=1 and pd.nPcaId=1                  
 left join LICENCIA_CONDUCIR lc on p.nPerId=lc.nPerId and lc.cLicEstado ='H' and lc.nParIdTipoLC<>5                  
 left join EMPADRONADO_DOCUMENTARIO c on e.nEmpId =c.nEmpId                   
 LEFT JOIN DOCUMENTARIO D ON c.nDioId=D.nDioId                  
 LEFT JOIN DOCUMENTARIO_DETALLE EV ON D.nDioId =EV.nDioId and ev.cDddEstado ='H'                   
 LEFT JOIN PSICOLOGICO PS ON e.nEmpId =ps.nempid and ps.cPsiEstado='H'                  
 left join parametro p2 on ps.nParIdEstadoExam=p2.nParId and p2.npcaid=787                  
 left join PARAMETRO p1 on lc.nParIdClase =p1.nParId and p1.nPcaId=794                   
 left join PARAMETRO p6 on lc.nParIdCategoria =p6.nParId and p6.nPcaId=795                  
 left join PARAMETRO p4 on lc.nParIdCategoria =p4.nParId and p4.nPcaId=796                  
 left join PARAMETRO p5 on lc.nParIdCategoria =p5.nParId and p5.nPcaId=797                  
 left join PARAMETRO p7 on lc.nParIdTipoLC =p7.nParId and p7.nPcaId=785                  
 where   e.nPcaIdTipo =782 and                  
 (cPdeValor like '%'+@Dni+'%')                  
 and e.cEmpEstado ='H' AND p.bPerEstado='0'                             
    ORDER BY nEmpId DESC                                               
end 