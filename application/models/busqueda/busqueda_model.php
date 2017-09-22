<?php

class Busqueda_model extends CI_Controller {
    // Parametros secuendarios Procedimiento
    private $tipo = '';
    private $lecol = '';
    private $nombre = '';
    private $ApellidoP = '';
    private $ApellidoM = '';
    private $telcol = '';
    private $email = '';
    private $evento = '';
    private $observacion = '';
    private $celcol = '';
    private $nEveId = '';
    private $admin = '';
    private $nInscripcionId = '';
    private $cInscripcionAsistencia = '';
    private $nInscripcionPago = '';
    private $cInscripcionTipoComprobante = '';
    private $tipoCertificado;
    
    function getTipoCertificado() {
        return $this->tipoCertificado;
    }

    function setTipoCertificado($tipoCertificado) {
        $this->tipoCertificado = $tipoCertificado;
    }
    function getCInscripcionTipoComprobante() {
        return $this->cInscripcionTipoComprobante;
    }

    function setCInscripcionTipoComprobante($cInscripcionTipoComprobante) {
        $this->cInscripcionTipoComprobante = $cInscripcionTipoComprobante;
    }

    function getNInscripcionPago() {
        return $this->nInscripcionPago;
    }

    function setNInscripcionPago($nInscripcionPago) {
        $this->nInscripcionPago = $nInscripcionPago;
    }

    function getCInscripcionAsistencia() {
        return $this->cInscripcionAsistencia;
    }

    function setCInscripcionAsistencia($cInscripcionAsistencia) {
        $this->cInscripcionAsistencia = $cInscripcionAsistencia;
    }

    function getNInscripcionId() {
        return $this->nInscripcionId;
    }

    function setNInscripcionId($nInscripcionId) {
        $this->nInscripcionId = $nInscripcionId;
    }

    function getadmin() {
        return $this->admin;
    }

    function setadmin($admin) {
        $this->admin = $admin;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getLecol() {
        return $this->lecol;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidoP() {
        return $this->ApellidoP;
    }

    function getApellidoM() {
        return $this->ApellidoM;
    }

    function getTelcol() {
        return $this->telcol;
    }

    function getEmail() {
        return $this->email;
    }

    function getEvento() {
        return $this->evento;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getCelcol() {
        return $this->celcol;
    }

    function getNEveId() {
        return $this->nEveId;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setLecol($lecol) {
        $this->lecol = $lecol;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidoP($ApellidoP) {
        $this->ApellidoP = $ApellidoP;
    }

    function setApellidoM($ApellidoM) {
        $this->ApellidoM = $ApellidoM;
    }

    function setTelcol($telcol) {
        $this->telcol = $telcol;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEvento($evento) {
        $this->evento = $evento;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setCelcol($celcol) {
        $this->celcol = $celcol;
    }

    function setNEveId($nEveId) {
        $this->nEveId = $nEveId;
    }

    public function __construct() {
        parent::__construct();
        $this->colegiado = $this->load->database('db_colegiado', TRUE);
    }
    function get_persona_existe($valor, $evento) {
        $parametros = array($valor, $evento);
        $fila = $this->db->query("select cInscripcionDni from inscripcion where cInscripcionDni=? and nInscripcionEveId=? AND cInscripcionEstado=1", $parametros);
        if ($fila->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function BusquedaIns() {
        $parametros = array(
            $this->getTipo(),
            $this->getlecol(),
            $this->getNombre(),
            $this->getApellidoP(),
            $this->getApellidoM(),
            $this->getTelcol(),
            $this->getEmail(),
            $this->getNEveId(),
            null,
            null,
            $this->getCelcol(),
            'Admin',
            $this->getTipoCertificado()
        );
        $query = $this->db->query("CALL USP_INS_INSCRIPCION (?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $query3=true;
        $query2=$this->db->query("select * from evento where nEveId=?",$this->getNEveId());
        $row=$query2->row();
        $tipoevento=$row->nEveTipoEvento;
 if($tipoevento==0 || $this->getTipoCertificado()!='PAR'){
            $param=array($this->getNEveId(),$this->getlecol());
            $query3=$this->db->query("update inscripcion set cInscripcionAsistencia='Si' where nInscripcionEveId=? and cInscripcionDni=?",$param);
            
        }
        
        if ($query&&$query3) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
        
    }
function exportarpdf($evento) {
 $query = $this->db->query("select i.nInscripcionId, i.cInscripcionDni DNI,UPPER(concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres)) as NOMBRES,pdt.cPdeValor as TELEFONO,pda.cPdeValor as CORREO,i.cInscripcionFechaRegistro as FechaRegistro
from inscripcion i inner join persona_detalle pd on i.cInscripcionDni=pd.cPdeValor  and pd.nParId=1 and pd.nPcaId=1 
inner join persona p on pd.nPerId=p.nPerId  
left join persona_detalle pdt on p.nPerId=pdt.nPerId and pdt.nParId=3 and  pdt.nPcaId=3 
left join persona_detalle pda on p.nPerId=pda.nPerId and pda.nParId=1 and  pda.nPcaId=4
where i.nInscripcionEveId=$evento and i.cInscripcionEstado=1 and i.ctipoCertificado='PAR' order by NOMBRES asc;");
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
 function dame_asistencia($id){
      $query=$this->db->query("select cInscripcionAsistencia from inscripcion where nInscripcionId='$id' and cInscripcionEstado='1'");
      $asistencia = $query->row();
      $valor=$asistencia->cInscripcionAsistencia;
      return $valor;
    }

   function dame_evento($evento){
      $cuenta=$this->db->query("select cEveTitulo from evento where nEveId='$evento'");
      $reg = $cuenta->row();
      $Nombre_evento=$reg->cEveTitulo;
      return $Nombre_evento;
    }

   function dame_evento_cuenta($evento){
      $cuenta=$this->db->query("select cEveCuentaIngreso from evento where nEveId='$evento'");
      $reg = $cuenta->row();
      $evento=$reg->cEveCuentaIngreso;
      return $evento;
    }
      function dame_cuenta($cuenta){
      $cuenta=$this->colegiado->query("SELECT valorctaing as monto FROM cuenta_ing where codctaing='$cuenta'");
      $reg = $cuenta->row();
      $v_cuenta=$reg->monto;
      return $v_cuenta;
    }
    function listar_inscripciones($evento) {   //agregar distinct a la consulta
        $query = $this->db->query("select i.nInscripcionId CODIGO,i.cInscripcionDni DNI ,
UPPER(concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres)) as NOMBRES,cInscripcionFechaRegistro FECHA_DE_REGISTRO,nInscripcionPago PAGO ,cInscripcionComprobante COMPROBANTE,
cInscripcionTipoComprobante TIPO_DE_COMPROBANTE,cInscripcionCuentaIngreso CUENTA_DE_INGRESO,cInscripcionAsistencia ASISTENCIA,pdc.cPdeValor as CORREO,pdt.cPdeValor as Celular,cInscripcionObservacion OBSERVACION 
from inscripcion i inner join 
persona_detalle pd on i.cInscripcionDni=pd.cPdeValor
left join persona_detalle pdc on pdc.nPerId = pd.nPerId and pdc.nParId=1 and pdc.nPcaId=4 
left join persona_detalle pdt on pdt.nPerId = pd.nPerId and pdt.nParId=3 and pdt.nPcaId=3 
inner join persona p on pd.nPerId=p.nPerId where pd.nParId=1 and pd.nPcaId=1 and i.cInscripcionEstado=1 and i.ctipoCertificado='PAR' and i.nInscripcionEveId =$evento order by i.cInscripcionFechaRegistro asc");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function listar_Comboinscripcion() { //intervalo original es de 45 días.
        $query = $this->db->query("select * from evento where curdate()<= adddate(cFechaEven,interval 300 day) and nEveTipoEvento<>0");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    function listar_InscripcionesMesFecha($tipo,$Ano,$Mes,$evento) {
        $consulta="";
        if($Mes==0){
            $consulta=$consulta;
        }else{
            $consulta=$consulta." and month(cInscripcionFechaRegistro)=$Mes ";
        }

        if($tipo==0){
            $consulta=$consulta." and nEveTipoEvento=0 ";
        }else if($tipo==100) {
            $consulta=$consulta." and nEveTipoEvento=100 ";
        }else {
             $consulta=$consulta." and nEveTipoEvento>0 and nEveTipoEvento<100";
        }
        
        if($evento==0){
            $consulta=$consulta;
        }
        else{
            $consulta=$consulta." and nEveId=".$evento;
        }
           
        $query = $this->db->query("select i.nInscripcionId CODIGO, i.cInscripcionDni DNI,cEveTitulo EVENTO, 
concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as NOMBRES,pdc.cPdeValor as CORREO,cInscripcionFechaRegistro FECHA_DE_REGISTRO,nInscripcionPago PAGO,cInscripcionComprobante COMPROBANTE,cInscripcionTipoComprobante  TIPO_DE_COMPROBANTE,cInscripcionCuentaIngreso CUENTA_INGRESO,cInscripcionAsistencia ASISTENCIA,cInscripcionObservacion OBSERVACION from inscripcion i 
inner join 
persona_detalle pd on i.cInscripcionDni=pd.cPdeValor
left join persona_detalle pdc on pdc.nPerId = pd.nPerId and pdc.nParId=1 and pdc.nPcaId=4 
left join persona_detalle pdt on pdt.nPerId = pd.nPerId and pdt.nParId=3 and pdt.nPcaId=3 
inner join persona p on pd.nPerId=p.nPerId
inner join evento on i.nInscripcionEveId=nEveId where pd.nParId=1 and pd.nPcaId=1 and cInscripcionEstado=1 and 
 year(cInscripcionFechaRegistro)=$Ano ".$consulta." order by evento and cEveTitulo and cInscripcionFechaRegistro");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
   
    function listar_capitulo($evento) {
        $tipo = $this->db->query("select nEveTipoEvento as tipo from evento where nEveId= $evento");
        if ($tipo->num_rows() > 0) {
            $parametro = $tipo->row();
            $tipo = $parametro->tipo;
        }
        $this->db->close();
         $query = $this->colegiado->query("select desccap from capitulo where codcap= $tipo");
        $this->colegiado->close();
        if($query->num_rows()>0){
            $row = $query->row();
            $evento_tipo="CAPITULO ".$row->desccap;
        }
        
        if($tipo==0){
            $evento_tipo="Evento Externo";
        }
        if($tipo==100){
            $evento_tipo="Evento CIP-CDLL";
        }
         if($tipo==101){
            $evento_tipo="Evento CIP-CDLL (Certificado)";
        }else{
                   $evento_tipo="Evento CIP-CDLL";
        }
        return $evento_tipo;
    }

    function traer_evento($evento) {
        $query = $this->db->query("select cEveTitulo from evento where nEveId= $evento");
          $this->db->close();
        if ($query->num_rows() > 0) {
        $row = $query->row();
        return array("valor"=>$row->cEveTitulo);
    }
    }
    function InscripcionDel() {
        $parametros = array($this->getNInscripcionId());
        $query = $this->db->query("call USP_INSCRIPCION_DEL(?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function asistencias($Id, $valor) {
        $parametros = array($Id, $valor);
        $query = $this->db->query("update inscripcion set cInscripcionAsistencia=? where nInscripcionId=?", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function ObservacionGet($id) {
        $query = $this->db->query("select nInscripcionId as id,cInscripcionObservacion,nInscripcionPago,cInscripcionTipoComprobante from inscripcion  where nInscripcionId=?", array($id));
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setNInscripcionId($row->id);
                $this->setObservacion($row->cInscripcionObservacion);
                $this->setNInscripcionPago($row->nInscripcionPago);
                $this->setCInscripcionTipoComprobante($row->cInscripcionTipoComprobante);


                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function cuenta_ingresoGet($cuenta_ingreso) {
        $query = $this->colegiado->query("select valorctaing from cuenta_ing where codctaing=?", array($cuenta_ingreso));
        $row = $query->row();
        return $row->valorctaing;
    }

    function exportar_excel() {
        $query = $this->db->query("select nInscripcionId, cInscripcionDni from inscripcion");
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    function exportar_pdf() {
        $query = $this->db->query("select nInscripcionId, cInscripcionDni from inscripcion");
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
     function obtenerInscripciones($evento){
         $query = $this->db->query("select * from inscripcion where nInscripcionEveId='$evento'");
            if ($query) {
                return $query->result();
            } else {
              throw new Exception('error al recuperar datos de la BD');
            }
    }
    function actualizarInscripcion($dni,$evento){
      $cuenta=$this->db->query("select * from evento where nEveId='$evento'");
      $reg = $cuenta->row();
      $cuenta_ingreso=$reg->cEveCuentaIngreso;

     $v_cuenta=$this->colegiado->query("select valorctaing from cuenta_ing where codctaing='$cuenta_ingreso'");
      if ($v_cuenta->num_rows> 0){
      $cuenta = $v_cuenta->row();
          $cu_ingreso=$cuenta->valorctaing;
      }else{
   return 0;
      }
      //echo "cuenta".$cu_ingreso;
      
        $parametros = array($dni,$evento);
        $query = $this->colegiado->query("select * from deta_fac dt inner join factura f on f.codfac=dt.codfac where dt.descripcion like '%".$dni."%' and dt.codctaing='$cuenta_ingreso' and f.estadofac='P'");
     //   $query=$this->colegiado->query("call USP_S_FACTURA(?,?)",$parametros);
        $montoTotal=0;
        $observacionAct='';
        $bandera="";
        $i=0;
        if ($query) {
            
            if($query->num_rows() > 0){
               
                foreach ($query->result() as $reg){
                    $codfac= $reg->codfac;
                    $codctaing= $reg->codctaing;
                    $preciofac= $reg->preciofac;
                    $preciofac = round(($preciofac+(0.18*$preciofac)));
                    //echo $codfac." ".$codctaing." ".$preciofac;
                           
                    $query2=$this->db->query("select cInscripcionComprobante from inscripcion where nInscripcionEveId ='$evento' and cInscripcionDni='$dni' and cInscripcionEstado=1");
                 
                    if($query2->num_rows() > 0){
                        
                        $row = $query2->row();
                        $comprobante=$row->cInscripcionComprobante;
                      //  echo "comprobante".$comprobante;
                        if($comprobante==""){
                          //  echo "comprobante vacio";
                               $query3 = $this->db->query("UPDATE inscripcion SET  nInscripcionPago =  '$preciofac',
                                cInscripcionComprobante=  '$codfac',
                                cInscripcionTipoComprobante =  'Factura',
                                cInscripcionCuentaIngreso =  '$codctaing' WHERE  nInscripcionEveId ='$evento' and cInscripcionDni='$dni'");
                                                 if ($query3) {
                                                     return 1;
                                                 }
                                                 else {
                                                     return 0;
                                                 }
                                break;
                        } 
                        else {
                            $i++;
                            if($i<=$query->num_rows()){
                               
                                $observacionAct=$observacionAct."Comprobante:".$codfac." Monto:".$preciofac;
                                $bandera="concatenado";
                            }
                             $montoTotal=$montoTotal+$preciofac;
                        }
                    }
                               
                }
                if($bandera=="concatenado"){
                    if($montoTotal<>$cu_ingreso){
     $query3 = $this->db->query("UPDATE inscripcion SET  nInscripcionPago =  '$montoTotal',
                                cInscripcionComprobante=  '$codfac',
                                cInscripcionTipoComprobante =  'Factura',
                                cInscripcionCuentaIngreso =  '$codctaing', 
                                cInscripcionObservacion = '.$observacionAct.' WHERE  nInscripcionEveId ='$evento' and cInscripcionDni='$dni' and cInscripcionEstado=1");
                  
                                                 if ($query3) {
                                                     return 1;
                                                 }
                                                 else {
                                                     return 0;
                                                 }
                    }
                //realizar aqui la consulta;
                  // echo "cuando hay algo".$montoTotal." ".$observacionAct." ".$codfac;
             
                }
                
            }
        }
        else {
              return 0;
            }
      
      
    }
   function generarReporte($anio,$mes){
        
        $parametros=array($anio,$mes);
        if($mes==0){
             $cad="select tmp.nEveId,tmp.cEveTitulo,tmp.nEveTipoEvento,tmp.cFechaEven,count(*) as inscripciones,sum(tmp.asistencia) as asistentes,count(tmp.cInscripcionCuentaIngreso) as certificado from (select e.nEveId,e.cEveTitulo,e.cFechaEven,i.cInscripcionCuentaIngreso,e.nEveTipoEvento ,if(i.cInscripcionAsistencia='Si',1,0) as asistencia from inscripcion as i inner join evento as e on i.nInscripcionEveId=e.nEveId where 
year(e.cFechaEvenInicio)=? and e.nEveTipoEvento>0 and e.nEveTipoEvento<100 and i.ctipoCertificado='PAR' and i.cInscripcionEstado=1 ) tmp group by tmp.nEveId";
        }else {
               $cad="select tmp.nEveId,tmp.cEveTitulo,tmp.nEveTipoEvento,tmp.cFechaEven,count(*) as inscripciones,sum(tmp.asistencia) as asistentes,count(tmp.cInscripcionCuentaIngreso) as certificado from (select e.nEveId,e.cEveTitulo,e.cFechaEven,i.cInscripcionCuentaIngreso,e.nEveTipoEvento ,if(i.cInscripcionAsistencia='Si',1,0) as asistencia from inscripcion as i inner join evento as e on i.nInscripcionEveId=e.nEveId where 
year(e.cFechaEvenInicio)=? and month(e.cFechaEvenInicio)=? and e.nEveTipoEvento>0 and e.nEveTipoEvento<100 and i.ctipoCertificado='PAR' and i.cInscripcionEstado=1 ) tmp group by tmp.nEveId";
     
        }
        $query=$this->db->query($cad,$parametros);
        $query2 = $this->getCapitulos();
         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                foreach ($query2 as $row2) {
                    if ($row->nEveTipoEvento == $row2->codcap) {
                        $row->nEveTipoEvento = $row2->desccap;
                    }
                }
            }
            return $query->result();
        } else {
            return null;
        }
    }
     function getCapitulos() {
        $query = $this->colegiado->query("select * from capitulo");
        if ($query) {
            return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function get_combo_eventos_fecha($anio,$mes,$tipo) {
        //$query = $this->db->query("select * from evento where curdate()<= adddate(cFechaEven,interval 3 day)");
        $parametros=array($anio,$mes);
          if($tipo==0){
            $consulta=" and nEveTipoEvento=0 ";
        }else if($tipo==100) {
            $consulta=" and nEveTipoEvento=100 ";
        }else {
             $consulta=" and nEveTipoEvento>0 and nEveTipoEvento<100";
        }
        
        
       
        $query = $this->db->query("select * from evento where year(cFechaEvenInicio)=? and month(cFechaEvenInicio)=?".$consulta,$parametros);
       
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                  $data['0']="Seleccione Evento";
                foreach ($query->result() as $reg) {
                    $data[$reg->nEveId] = $reg->cEveTitulo;
                }
               $result=form_dropdown("cbo_evento_fecha", $data,'','id="cbo_evento_fecha"  style="width:250px" required="required"');
                //$result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" style="width:auto" required="required"');
                return $result;
            }
        } else {
            return false;
        }
    }
    
    
    
    
}
?>