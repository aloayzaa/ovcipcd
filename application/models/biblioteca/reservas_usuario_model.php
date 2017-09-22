<?php
class Reservas_usuario_model extends CI_Model{
    
    
    private $cap='';
     private $ano='';
    
     public function getCap() {
         return $this->cap;
     }

     public function setCap($cap) {
         $this->cap = $cap;
     }

     public function getAno() {
         return $this->ano;
     }

     public function setAno($ano) {
         $this->ano = $ano;
     }

         
    
    
    
    
    
//        function estaQry() {
//      $query = $this->db_biblioteca->query("SELECT c.desccap as Capitulo, t.Tesis 
//                                            FROM bdcolegio.capitulo c
//                                            inner join (SELECT codcap, count( * ) Tesis
//                                            FROM tbl_bib_catatesis
//                                            GROUP BY codcap
//                                            )t ON c.codcap = t.codcap");
// //       $query = $this->bdhelpdesk->query("CALL USP_HLDSK_S_Area()");
//        if ($query->num_rows() > 0) {
//            $this->db_biblioteca->close();
//            return $query->result();
//        } else {
//            return null;
//        }
//    }
    
    
      function ultimaTesisQry() {
      $query = $this->db_biblioteca->query("select c.desccap as Capitulo,cMatTitulo as Titulo,cMatAutor as Autor
                                            from tbl_bib_catatesis
                                            inner join bdcolegio.capitulo c on tbl_bib_catatesis.codcap=c.codcap
                                            ORDER BY nMatId DESC
                                            limit 2;");
 //       $query = $this->bdhelpdesk->query("CALL USP_HLDSK_S_Area()");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    
      function ultimaRyLQry() {
      $query = $this->db_biblioteca->query("(
                                            SELECT cMatTitulo as Titulo, cMatAutor as Autor, cMatCategoria as Categoria,cMatTipo AS Tipo
                                            FROM tbl_bib_matbibliografico
                                            WHERE cMatTipo = 'L'
                                            ORDER BY nMatId DESC
                                            LIMIT 1
                                            )
                                            UNION (

                                            SELECT cMatTitulo, cMatAutor, cMatCategoria,cMatTipo
                                            FROM tbl_bib_matbibliografico
                                            WHERE cMatTipo = 'R'
                                            ORDER BY nMatId DESC
                                            LIMIT 1
                                            )");
 //       $query = $this->bdhelpdesk->query("CALL USP_HLDSK_S_Area()");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    function listaUltimaReservas() {
      $query = $this->db_biblioteca->query("
                                            SELECT  c.desccap as Capitulo, t.cMatTitulo as Titulo, concat( bdcolegio.colegiado.apecol, ' ', bdcolegio.colegiado.apematcol, ' ', bdcolegio.colegiado.nomcol ) AS Nombres
                                            FROM tbl_bib_reserva r
                                            INNER JOIN bdcolegio.colegiado ON colegiado.regcol = r.nPerId
                                            INNER JOIN tbl_bib_catatesis t ON r.nMatId = t.nMatId
                                            INNER JOIN bdcolegio.capitulo c ON t.codcap = c.codcap
                                            WHERE r.cMatTipor = 'T'
                                           
                                            ORDER BY nResId DESC
                                            LIMIT 2
                                            ");
 //       $query = $this->bdhelpdesk->query("CALL USP_HLDSK_S_Area()");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    
    
    
    
    
    
    
    function CapituloCbo(){

            $query=$this->db_biblioteca->query("SELECT codcap,desccap FROM bdcolegio.capitulo");
            if(count($query)>0){


                return $query->result();

            }
            else{
                return false;
            }

        }
        
        
//        function listar_tesis()
//        {
//            $query = $this->db_biblioteca->query("select * from tbl_bib_catatesis where cMatEstado=0");
//        
//        if ($query->num_rows() > 0) {
//            $this->db_biblioteca->close();
//            return $query->result_array();
//        } else {
//            return null;
//        }
//        }
        
        function tesisQry() {
        $parametros = array($this->getCap(),$this->getAno());
        $query = $this->db_biblioteca->query("call USP_LISTA_TESIS_USUARIO (?,?)",$parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
            function libroQry($parametros) {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_LISTA_LIBRO_USUARIO (?)",$parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

     function revistaQry($parametros) {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_LISTA_REVISTA_USUARIO (?)",$parametros);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
        function EspecialidadCbo(){

            $query=$this->db_biblioteca->query("SELECT codesp,descesp FROM bdcolegio.especialidad");
            if(count($query)>0){


                return $query->result();

            }
            else{
                return false;
            }
        

        }
        
      public function especialidades($capitulos)
    {
//        $this->db->where('codcap',$capitulos);
//        $this->db->order_by('poblacion','asc');
//        $query = $this->db->get('especialidad');
        $query=$this->db_biblioteca->query("SELECT * FROM bdcolegio.especialidad WHERE codcap='$capitulos'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }
    
    
        
    function revistaMultimediaqry($nMatId) {
//        $nNotCodigo = array($this->getNNotCodigo());
        $query = $this->db_biblioteca->query("CALL USP_GEN_REVISTA_MULTIMEDIA(?)",$nMatId);
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
}
?>
