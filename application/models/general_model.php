<?php

class General_model extends CI_Model {

    private $tipo = '';
    private $valdni = '';

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getValdni() {
        return $this->valdni;
    }

    public function setValdni($valdni) {
        $this->valdni = $valdni;
    }

//CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->colegiado = $this->load->database('db_colegiado', TRUE);
    }

    function get_combo_eventos() {
        //$query = $this->db->query("select * from evento where curdate()<= adddate(cFechaEven,interval 3 day)");
        $query = $this->db->query("select * from evento");
        
        $result = "";
        if ($query) {
            if ($query->num_rows() == 0) {
                return false;
            } else {
                foreach ($query->result() as $reg) {
                    $data[$reg->nEveId] = $reg->cEveTitulo;
                }
               $result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" class="chzn-select" style="width:250px" required="required"');
                //$result=form_dropdown("cbo_evento_listar", $data,'','id="cbo_evento_listar" style="width:auto" required="required"');
                return $result;
            }
        } else {
            return false;
        }
    }
    
    function get_persona_dni($valor) {
        if ($valor != null) {
            $parametros = array($valor);
            //$query = $this->colegiado->query("select regcol, lecol, concat(nomcol,' ',apecol,' ',apematcol) as datos from colegiado where lecol=?",$parametros);
            $query =true;
            $queryExt = $this->db->query("select p.nPerId,pdd.cPdeValor lecol,pdc.cPdeValor correo,pdr.cPdeValor cip, concat(p.cPerNombres,' ',p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno) as datos from persona p left join
persona_detalle pdc on p.nPerId =pdc.nPerId and pdc.nParId=1 and pdc.nPcaId=4 
left join
persona_detalle pdd on p.nPerId =pdd.nPerId and pdd.nParId=1 and pdd.nPcaId=1
left join
persona_detalle pdr on p.nPerId =pdr.nPerId and pdr.nParId=2 and pdr.nPcaId=15
where pdd.cPdeValor=? and pdd.bPdeEliminado=0 and pdc.bPdeEliminado=0 and p.bPerEstado=0;", $parametros);
              if ($query) {
              /*if ($query->num_rows() > 0) {
                    $fila = $query->row();
                    $this->setValdni($fila->lecol);
                    $this->setTipo('1');
                    return $fila;
                } else {*/
                    if ($queryExt) {
                        if ($queryExt->num_rows() > 0) {
                            $fila = $queryExt->row();
                            $this->setValdni($fila->lecol);
                            $this->setTipo('2');
                            return $fila;
                        }
                    }
                    else {
                        $this->setTipo('3');
                    }
                }
            } 
            else {
                    

                return false;
            }
        }
          /* return false;
    }*/

}

?>