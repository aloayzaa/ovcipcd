<?php

class Graficos_model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->database();
    }

function get_activity($idHorario, $bloque)
          {
    $query = $this->db->query("SELECT r.nRenValor as Colores , count(r.nRenValor) as Numero , p.nPreBloque as Bloque
                               FROM respuesta r
                               INNER JOIN pregunta p ON r.nPreId = p.nPreId 
                               WHERE  r.nHorId = ? group by Colores
                               LIMIT 1
                               UNION ALL SELECT r.nRenValor as Colores , count(r.nRenValor) as Numero , p.nPreBloque as Bloque
                               FROM respuesta r
                               INNER JOIN pregunta p ON r.nPreId = p.nPreId 
                               WHERE  p.nPreBloque = ? and r.nHorId = ? group by Colores",array($idHorario,$bloque,$idHorario));
             if($query->num_rows()>0) {
                 return $query->result();
              }
             else {
                  return NULL;}
          }
      }
?>
