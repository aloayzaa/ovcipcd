<?php

class Expediente_model extends CI_Model {

    private $nTramieId;
    private $PerApellidoPaterno;
    private $PerApellidoMaterno;
    private $PerNombres;
    private $PerEmail;
    private $PerTelefono;
    private $docIdentidad;
    private $nTramiteId;
    private $cExpedienteAsunto;
    private $cExpedienteSumilla;
    private $EdeNumeroFolios;
    private $IdSolicitante;
    private $ReqId;
    private $TipoDocumento;
    private $ExpGenerado;
    private $IdExpediente;
    private $hdIdExpediente;
    private $cExpedienteFechaRegistro;
    private $cmultLink;
    private $nMultCodigo = '';

    public function getNTramieId() {
        return $this->nTramieId;
    }

    public function setNTramieId($nTramieId) {
        $this->nTramieId = $nTramieId;
    }

    public function getPerApellidoPaterno() {
        return $this->PerApellidoPaterno;
    }

    public function setPerApellidoPaterno($PerApellidoPaterno) {
        $this->PerApellidoPaterno = $PerApellidoPaterno;
    }

    public function getPerApellidoMaterno() {
        return $this->PerApellidoMaterno;
    }

    public function setPerApellidoMaterno($PerApellidoMaterno) {
        $this->PerApellidoMaterno = $PerApellidoMaterno;
    }

    public function getPerNombres() {
        return $this->PerNombres;
    }

    public function setPerNombres($PerNombres) {
        $this->PerNombres = $PerNombres;
    }

    public function getPerEmail() {
        return $this->PerEmail;
    }

    public function setPerEmail($PerEmail) {
        $this->PerEmail = $PerEmail;
    }

    public function getPerTelefono() {
        return $this->PerTelefono;
    }

    public function setPerTelefono($PerTelefono) {
        $this->PerTelefono = $PerTelefono;
    }

    public function getDocIdentidad() {
        return $this->docIdentidad;
    }

    public function setDocIdentidad($docIdentidad) {
        $this->docIdentidad = $docIdentidad;
    }

    public function getNTramiteId() {
        return $this->nTramiteId;
    }

    public function setNTramiteId($nTramiteId) {
        $this->nTramiteId = $nTramiteId;
    }

    public function getCExpedienteAsunto() {
        return $this->cExpedienteAsunto;
    }

    public function setCExpedienteAsunto($cExpedienteAsunto) {
        $this->cExpedienteAsunto = $cExpedienteAsunto;
    }

    public function getEdeNumeroFolios() {
        return $this->EdeNumeroFolios;
    }

    public function setEdeNumeroFolios($EdeNumeroFolios) {
        $this->EdeNumeroFolios = $EdeNumeroFolios;
    }

    public function getIdSolicitante() {
        return $this->IdSolicitante;
    }

    public function setIdSolicitante($IdSolicitante) {
        $this->IdSolicitante = $IdSolicitante;
    }

    public function getReqId() {
        return $this->ReqId;
    }

    public function setReqId($ReqId) {
        $this->ReqId = $ReqId;
    }

    public function getTipoDocumento() {
        return $this->TipoDocumento;
    }

    public function setTipoDocumento($TipoDocumento) {
        $this->TipoDocumento = $TipoDocumento;
    }

    public function getCExpedienteSumilla() {
        return $this->cExpedienteSumilla;
    }

    public function setCExpedienteSumilla($cExpedienteSumilla) {
        $this->cExpedienteSumilla = $cExpedienteSumilla;
    }

    public function getExpGenerado() {
        return $this->ExpGenerado;
    }

    public function setExpGenerado($ExpGenerado) {
        $this->ExpGenerado = $ExpGenerado;
    }

    public function getIdExpediente() {
        return $this->IdExpediente;
    }

    public function setIdExpediente($IdExpediente) {
        $this->IdExpediente = $IdExpediente;
    }

    public function getCExpedienteFechaRegistro() {
        return $this->cExpedienteFechaRegistro;
    }

    public function setCExpedienteFechaRegistro($cExpedienteFechaRegistro) {
        $this->cExpedienteFechaRegistro = $cExpedienteFechaRegistro;
    }

    public function getHdIdExpediente() {
        return $this->hdIdExpediente;
    }

    public function setHdIdExpediente($hdIdExpediente) {
        $this->hdIdExpediente = $hdIdExpediente;
    }

    public function getCmultLink() {
        return $this->cmultLink;
    }

    public function setCmultLink($cmultLink) {
        $this->cmultLink = $cmultLink;
    }

    public function getNMultCodigo() {
        return $this->nMultCodigo;
    }

    public function setNMultCodigo($nMultCodigo) {
        $this->nMultCodigo = $nMultCodigo;
    }

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function cboTipoDocumento($accion) {
        $p_valor = null;
        $parametro = array($accion, $p_valor);
        $query = $this->db->query("call USP_STD_S_CrearExpediente(?,?)", $parametro);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    // COMBO DE TRAMITES
    function cboTramites($accion) {
        $p_valor = null;
        $parametro = array($accion, $p_valor);
        $query = $this->db->query("call USP_STD_S_CrearExpediente(?,?)", $parametro);
        if ($query->num_rows() > 0) {
            $data = creaComboCPH($query->result());
            $result = form_dropdown("c_cbo_ins_exp_tramitev", $data, '', 'id="c_cbo_ins_exp_tramitev" data-placeholder="Seleccione un tramite" class="chzn-select {required:true}" onchange="ShowSelected();" style="width:400px" required="required"');
            return $result;
        } else {
            return false;
        }
    }

    function cboTramiteUpd() {
        $query = $this->db->query("select nTramiteId,cTramiteTitulo from tb_sistram_tramite where nTramiteEstado=1;");
        if (count($query) > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function reqXptramiteGet($accion, $nTramiteId) {
        $parametros = array($accion, $nTramiteId);
        $fila = $this->db->query("call USP_STD_S_CrearExpediente(?,?)", $parametros);
        if ($fila->num_rows() > 0) {
            $row = $fila->row();
            $this->setNTramieId($row->nTramiteId);
            return true;
        } else {
            return false;
        }
    }

    // OBTIENE DATOS DE UNA PERSONA POR NRO. DE DOCUMENTO (DNI)
    function personaXdniGet($accion, $txt_ins_exp_nrodocumento) {
        $parametros = array($accion, $txt_ins_exp_nrodocumento);
        $fila = $this->db->query("call USP_STD_S_Persona(?,?)", $parametros);

        if ($fila->num_rows() > 0) {
            $row = $fila->row();
            $this->setPerApellidoPaterno($row->cPerApellidoPaterno);
            $this->setPerApellidoMaterno($row->cPerApellidoMaterno);
            $this->setPerNombres($row->cPerNombres);
            $this->setPerEmail($row->email);
            $this->setPerTelefono($row->telefono);

            return true;
        } else {
            return false;
        }
    }
        // OBTIENE DATOS DE UNA PERSONA POR CARNET DE EXTRANJERIA
    function personaXcarnetGet($accion, $txt_ins_exp_nrodocumento) {
        $parametros = array($accion, $txt_ins_exp_nrodocumento);
        $fila = $this->db->query("call USP_STD_S_Persona(?,?)", $parametros);

        if ($fila->num_rows() > 0) {
            $row = $fila->row();
            $this->setPerApellidoPaterno($row->cPerApellidoPaterno);
            $this->setPerApellidoMaterno($row->cPerApellidoMaterno);
            $this->setPerNombres($row->cPerNombres);
            $this->setPerEmail($row->email);
            $this->setPerTelefono($row->telefono);

            return true;
        } else {
            return false;
        }
    }

    // OBTIENE DATOS DE UNA PERSONA POR NRO. DE DOCUMENTO (RUC)
    function personaXrucGet($accion, $txt_ins_exp_nrodocumento) {
        $parametros = array($accion, $txt_ins_exp_nrodocumento);
        $fila = $this->db->query("call USP_STD_S_Persona(?,?)", $parametros);
        if ($fila->num_rows() > 0) {
            $row = $fila->row();
            $this->setPerNombres($row->cPerNombres);
            $this->setPerEmail($row->email);
            $this->setPerTelefono($row->telefono);
            return true;
        } else {
            return false;
        }
    }

    function reqXTramiteGet($accion, $nTramiteId) {
        $parametros = array($accion, $nTramiteId);
        $query = $this->db->query("call USP_STD_S_CrearExpediente(?,?)", $parametros);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    //GENERAR CARGO DE EXPEDIENTE

    function generar_Expcargo($id_expediente) {
        $query = $this->db->query("select te.nExpedienteCodigo,te.cExpedienteFechaRegistro,te.cExpedienteSumilla,te.cExpedienteAsunto,UPPER(p.cPerNombres)as cPerNombres, UPPER(concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno)) as apellidos,pd.cPdeValor as dni,pc.cPdeValor as correo,pr.cPdeValor as ruc,pex.cPdeValor as carnet
FROM tb_sistram_expediente te inner join persona p on p.nPerId=te.nPerId
left join persona_detalle pd on pd.nPerId=p.nPerId and pd.nParId=1 and pd.nPcaId=1
left join persona_detalle pex on pex.nPerId=p.nPerId and pex.nParId=2 and pex.nPcaId=1
left join persona_detalle pc on pc.nPerId=p.nPerId and pc.nParId=1 and pc.nPcaId=4
left join persona_detalle pr on pr.nPerId=p.nPerId and pr.nParId=3 and pr.nPcaId=1
WHERE te.nExpedienteCodigo = ?;", array($id_expediente));
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return null;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

//LISTAR REQUISITOS DE EXPEDIENTE
    function dame_requisitos($id_expediente) {
        $id_exp = $this->db->query("select nExpedienteId from tb_sistram_expediente where nExpedienteCodigo=?", array($id_expediente));
        $row = $id_exp->row();
        $this->setIdExpediente($row->nExpedienteId);
        $query = $this->db->query("SELECT re.nExpedienteId,re.nRequisitosId,r.cRequisitosDescripcion FROM tb_sistram_expedienterequisitos re
 inner join tb_sistram_requisitos r on re.nRequisitosId=r.nRequisitosId where re.nExpedienteId=?", array($this->getIdExpediente()));

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
   function getUsuariosCargo(){
        $query=$this->db->query("select * from tb_sistram_areas where cAreasEstado='1'");
        if($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return false;
        }
    }
    // CREAR EXPEDIENTE (INSERT)
    function crearExpedienteIns() {
if($this->getIdSolicitante()=='0'){
$this->setIdSolicitante('Externo');
}
if($this->getTipoDocumento()>3){
    $tipo_expediente = 2;
}else{
     $tipo_expediente = 1;
}
        $parametros = array($this->getDocIdentidad(), $this->getPerNombres(), $this->getPerApellidoPaterno(), $this->getPerApellidoMaterno(), $this->getPerEmail(),
            $this->getPerTelefono(), $this->getIdSolicitante(),$this->getNTramiteId(), $this->getCExpedienteSumilla(), $this->getCExpedienteAsunto(), $this->getEdeNumeroFolios(),
            $this->getTipoDocumento(),$tipo_expediente);
     
                        $this->db->trans_start();
        $query = $this->db->query("call USP_STD_I_CrearExpediente(?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $expediente = $this->db->query("select nExpedienteCodigo from tb_sistram_expediente order by nExpedienteId desc limit 1");
        if ($expediente) {
            $row = $expediente->row();
            $this->setExpGenerado($row->nExpedienteCodigo);
            $valor = explode(',', $this->getReqId());
            foreach ($valor as $valor) {
                $v_expediente = array($this->getExpGenerado(), $valor);
                $query = $this->db->query("INSERT INTO tb_sistram_expedienterequisitos(nExpedienteId,nRequisitosId)VALUES(?,?)", $v_expediente);
            }
        }
        $ruta = 'uploads/sistram/' . $this->getExpGenerado() . '.pdf';
        $valores = array($this->getCExpedienteSumilla(), $ruta, $this->getExpGenerado());
        $cargo = $this->db->query("insert into tb_sistram_multimedia values(NULL,?,?,1,curdate(),?)", $valores);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    

    //qry expediente mesa de partes
    function expedientesQry() {
        $query = $this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo,exp.nEstadoProveido
,exp.cExpedienteObservacion,exp.cExpedienteEstado
from tb_sistram_expediente as exp inner join tb_sistram_tipo_expediente as 
tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
where exp.nEstadoProveido=0 and bPdeEliminado=1 order by exp.cExpedienteFechaRegistro");

        if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return null;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    //enviar expedientes a decanato
    function enviarAdmin($expediente,$usuario) {
        if($usuario=='Secretario'){
            $estadoProveido=1;
        }
        else {
            $estadoProveido=2;
        }
        $parametros = array($estadoProveido,$expediente);
        $query = $this->db->query("UPDATE tb_sistram_expediente SET nEstadoProveido= ? WHERE nExpedienteId=?;", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    // evaluar si la derivacion es correcta dependiendo del tramite
    function  verificarenvio($expediente,$usuario){
        
        $parametros=array($expediente);
        $query=$this->db->query("select t.cTramiteTipoPersona,e.nExpedienteCodigo from tb_sistram_expediente as e inner join tb_sistram_tramite as t on e.nTramiteId=t.nTramiteId where e.nExpedienteId=?",$parametros);
        if($query){
            $row=$query->row();
            $tipopersona=$row->cTramiteTipoPersona;
            if($usuario==$tipopersona){
                return true;
            }
            else {
                $this->setExpGenerado($row->nExpedienteCodigo);
                return false;
            }
                       
        }
        
        
    }

    //guardar info cargo multimedia
    function reenviarAdmin($usuario,$observacion, $expediente) {
        $parametros = array($usuario,$observacion, $expediente);
        $query = $this->db->query("UPDATE tb_sistram_expediente SET nEstadoProveido=?,cExpedienteObservacion=?,cExpedienteEstado='Subsanado' WHERE nExpedienteId=?;", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    //funcion expedienteGet (devuelve los datos del expediente)
    function expedienteGet($nExpedienteId) {
        $parametros = array($nExpedienteId);
        $query = $this->db->query("select t.nTramiteId, e.nExpedienteId,e.nExpedienteCodigo,e.cExpedienteSumilla,p.cPerNombres,p.cPerApellidoPaterno,p.cPerApellidoMaterno,e.cExpedienteFechaRegistro,e.cExpedienteFolios from tb_sistram_expediente e inner join tb_sistram_tramite t on e.nTramiteId=t.nTramiteId inner join  persona p on  e.nPerId=p.nPerId and  bPdeEliminado=1 and nExpedienteId=?", $parametros);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setIdExpediente($row->nExpedienteId);
            $this->setExpGenerado($row->nExpedienteCodigo);
            $this->setCExpedienteSumilla($row->cExpedienteSumilla);
            $this->setPerNombres($row->cPerNombres);
            $this->setPerApellidoPaterno($row->cPerApellidoPaterno);
            $this->setPerApellidoMaterno($row->cPerApellidoMaterno);
            $this->setCExpedienteFechaRegistro($row->cExpedienteFechaRegistro);
            $this->setEdeNumeroFolios($row->cExpedienteFolios);
            $this->setNTramiteId($row->nTramiteId);

            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    //funcion de actualizacion de expediente
    function expedienteUpd() {
        $id = array($this->getIdExpediente());
        $valor = $this->getReqId();
        $this->db->trans_start();
        $baja = $this->db->query("delete from tb_sistram_expedienterequisitos where nExpedienteId=?;", $id);
        foreach ($valor as $v) {
            $v_expediente = array($this->getIdExpediente(), $v);
            $expediente = $this->db->query("INSERT INTO tb_sistram_expedienterequisitos(nExpedienteId,nRequisitosId)VALUES(?,?)", $v_expediente);
        }
        $parametros = array($this->getIdExpediente(), $this->getCExpedienteSumilla(), $this->getPerNombres(), $this->getPerApellidoPaterno(), $this->getPerApellidoMaterno(), $this->getEdeNumeroFolios(), $this->getNTramiteId());
        $query = $this->db->query("call USP_S_U_Expediente(?,?,?,?,?,?,?)", $parametros);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    //funcion model de subir upload file a servidor
    function expedienteUploadPdf($sumilla) {
        $parametros = array($sumilla, $this->getCmultLink(), $this->getHdIdExpediente()
        );
        $query = $this->db->query("insert into tb_sistram_multimedia values(NULL,?,?,1,curdate(),?)", $parametros);
    
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function insertarMultimedia($texto,$link,$expediente){
        $parametros=array($texto,$link,$expediente);
        
        $query = $this->db->query("insert into tb_sistram_multimedia values(NULL,?,?,1,curdate(),?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    //funcion model listar archivos multimedia segun expediente
    function ExpMultimediaqry($nExpedienteId) {
       
        $query = $this->db->query("select * from tb_sistram_multimedia where nExpedienteId=? and cMultimediaEstado=1", $nExpedienteId);
      
        if ($query->num_rows() > 0) {
        
            return $query->result_array();
        } else {
            return null;
        }
    }

    //Funcion para cargar Requisitos segun Expediente 
    function ExpRequisitosqry($nTramiteId) {
        $query = $this->db->query("SELECT *
FROM tb_sistram_requisitostramite sr inner join tb_sistram_requisitos st on sr.nRequisitosId=st.nRequisitosId where sr.nTramiteId =?", $nTramiteId);
        if ($query->num_rows() > 0) {

            return $query->result_array();
            $this->db->close();
        } else {
            return null;
        }
    }

    function RequisitosXTramiteqry($nExpedienteId) {
        $query = $this->db->query("SELECT exp.nExpedienteId,exp.nRequisitosId,req.cRequisitosDescripcion  FROM tb_sistram_expedienterequisitos as exp inner join tb_sistram_requisitos as req on exp.nRequisitosId=req.nRequisitosId where req.cRequisitosEstado=1 and exp.nExpedienteId=?", $nExpedienteId);
        if ($query->num_rows() > 0) {
            return $query->result_array();
            $this->db->close();
        } else {
            return null;
        }
    }

    //funcion model eliminar archivo multimedia
    function MultimediaDel() {
        $parametros = array($this->getNMultCodigo());
        $query = $this->db->query("CALL USP_STD_D_MultExpediente(?)", $parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //funcion model eliminar archivo multimedia
    function darbajaExpediente() {
        $parametros = array($this->getIdExpediente());
        $query = $this->db->query("CALL USP_STD_D_BajaExpediente(?)", $parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//obtener codigo generado de expediente
    function dame_codigo($codigo) {
        $query = $this->db->query("select nExpedienteCodigo from tb_sistram_expediente where nExpedienteId= $codigo");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $tipo = $row->nExpedienteCodigo;
            return $tipo;
        }
    }
      function movimientosGet($expedientecodigo){
        $parame=array($expedientecodigo);
     //    echo "expediente ID".$expedientecodigo;
        $query=$this->db->query("SELECT * 
FROM tb_sistram_movimiento AS mov
INNER JOIN tb_sistram_areas AS a ON mov.nAreasIdReceptor = a.nAreasId
WHERE mov.nExpedienteId=?",$parame);
    
         
        if($query->num_rows()>0){
           return $query->result();
        }
        else {
            return null;
        }
    }
     function expedienteQueryxfecha($fechainicio,$fechafin){
        $parametros=array($fechainicio,$fechafin);
        $query=$this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo,exp.nEstadoProveido
,exp.cExpedienteObservacion,exp.cExpedienteEstado
from tb_sistram_expediente as exp 
inner join tb_sistram_tipo_expediente as tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
        where date(exp.cExpedienteFechaRegistro) >=? and date(exp.cExpedienteFechaRegistro) <=? and exp.bPdeEliminado=1 and exp.nEstadoProveido>0",$parametros);
             
        if($query->num_rows()>0){
           return $query->result();
        }
        else {
            return null;
        }
        
    }

}
