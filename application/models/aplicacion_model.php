<?php
//CODIGO AUTOGENERADO - renzot
//Fecha:12-09-2012 10:25:48
	class Aplicacion_model extends CI_Model {
		//DECLARACION DE VARIABLES
		private $nAplId = '';
		private $cAplNombre = '';
		private $bAplEliminado = '';
		private $nAplTipo = '';

		//CONSTRUCTOR DE LA CLASE
		function __construct($idaplicacion=null){
			parent::__construct();
			if($idaplicacion!=null){
				$this->get_ObjAplicacion($idaplicacion);
			}
		}

		//FUNCIONES SET
		function set_nAplId($nAplId){
			$this->nAplId = $nAplId;
		}
		function set_cAplNombre($cAplNombre){
			$this->cAplNombre = $cAplNombre;
		}
		function set_bAplEliminado($bAplEliminado){
			$this->bAplEliminado = $bAplEliminado;
		}
		function set_nAplTipo($nAplTipo){
			$this->nAplTipo = $nAplTipo;
		}

		//FUNCIONES GET
		function get_nAplId(){
			return $this->nAplId;
		}
		function get_cAplNombre(){
			return $this->cAplNombre;
		}
		function get_bAplEliminado(){
			return $this->bAplEliminado;
		}
		function get_nAplTipo(){
			return $this->nAplTipo;
		}

		//CONSTRUCTOR DEL OBJETO APLICACIÓN
        function get_ObjAplicacion($idaplicacion){
            $query = $this->db->query("SELECT * FROM aplicacion WHERE nAplId=? AND bAplEliminado=0", array($idaplicacion));
            if ($query->num_rows() > 0){
                $row = $query->row();
                //CREANDO EL OBJETO
                $this->set_nAplId($row->nAplId);
                $this->set_cAplNombre($row->cAplNombre);
                $this->set_bAplEliminado($row->bAplEliminado);
                $this->set_nAplTipo($row->nAplTipo);
            }
        } 
	}
?>