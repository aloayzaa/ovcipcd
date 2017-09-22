<?php

class Migracion_model extends CI_Model {

    private $regcol = '';
    private $id = '';
    private $apellidop = '';
    private $apellidom = '';
    private $nombres = '';
    private $dni='';
    private $telefono='';
    private $celular='';
    private $email = '';
    private $direccion = '';
    

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getRegcol() {
        return $this->regcol;
    }

    public function setRegcol($regcol) {
        $this->regcol = $regcol;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getApellidop() {
        return $this->apellidop;
    }

    public function setApellidop($apellidop) {
        $this->apellidop = $apellidop;
    }

    public function getApellidom() {
        return $this->apellidom;
    }

    public function setApellidom($apellidom) {
        $this->apellidom = $apellidom;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    
        
    function get_listar_migracion() {
        $colegiados = $this->db->query("select cUsuNick as regcol from usuario where cUsuNick not like '%-T' and nUsuTipo='7'");
        $parametro = '';
        $count = 1;
        foreach ($colegiados->result() as $row) {
            $valor = $row->regcol;
            if ($count == 1) {
                $parametro = $valor;
            } else {
                $parametro = $parametro . "," . $valor;
            }
            $count++;
        }
        $query = $this->db_bdcolegio->query("select regcol,md5(lecol) as clave,lecol from colegiado where regcol <> ('%NUT%' and '%NUE%') and tipoclase <> 'E' and regcol not like '%-T' and falleccol='V' and regcol not in($parametro) order by regcol desc");
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result();
        } else {
            return null;
        }
    }

    function get_listar_ingresados() {
        $lista_a_migrar=$this->get_listar_migracion();
        foreach ($lista_a_migrar as $migracion) {
         $parametro = $migracion->lecol;
          $query = $this->db->query("select nPerId, cPdeValor as lecol from persona_detalle where nParId='1' and nPcaId='1' and bPdeEliminado='0' and cPdeValor ='$parametro'");
          if($query->num_rows()>0){
            $row = $query->row();
            $valor = $row->lecol;
                        $data[]=$migracion;
          }else{
          }
        }
return $data;  
    }
        function get_listar_colegiados($cap) {
              $query = $this->db_bdcolegio->query("SELECT DISTINCT c.regcol AS id, concat( c.apecol, ' ', c.apematcol, ' ', c.nomcol ) AS datosPersonales, c.tipoclase, c.fecaportcol,ca.codcap
FROM colegiado c
INNER JOIN col_titulo ct ON ct.regcol = c.regcol
INNER JOIN titulo t ON ct.codtitulo = t.codtitulo
INNER JOIN especialidad e ON e.codesp = t.codesp
INNER JOIN capitulo ca ON e.codcap = ca.codcap
LEFT JOIN transferencia tr ON c.regcol = tr.regcol
AND tr.tipotransfer = 'E'
WHERE tr.regcol IS NULL
AND c.regcol <> ( '%NUT%'
AND '%NUE%' )
AND c.tipoclase <> 'E'
AND c.regcol NOT LIKE '%-T'
AND c.falleccol = 'V'
AND ca.codcap = ?
GROUP BY c.regcol
ORDER BY c.regcol",array($cap));
                $i=0;
        foreach ($query->result() as $row) {
            $valor = $row->id;
            $nombre = $row->datosPersonales;
            $clase = $row->tipoclase;
            $fecha_aporte = $row->fecaportcol;
                     $this->load->database('db_colegiado', TRUE);
                     $query1=$this->db_bdcolegio->query("call USP_DEUDA_COLEGIADOFIX(?,?)",array($valor,$clase));
                                                                  $this->db_bdcolegio->close();
            $row = $query1->row();
            $v_deuda= $row->Deuda;

             $query2=$this->db_bdcolegio->query("select CASE WHEN (sum(multelec)) is NULL then 0 ELSE sum(multelec) end  as multa from col_eleccion ce inner join 
eleccion e on ce.codelec=e.codelec where regcol=? and estadoelec='O'",array($valor));
            $row = $query2->row();
            $multa= $row->multa;

            $query3=$this->db_bdcolegio->query("SELECT cl.codcuota, c.mes as mes, c.año as anio
FROM colcuota cl
INNER JOIN cuota c ON cl.codcuota = c.codcuota
WHERE cl.regcol = ? order by cl.codcuota desc limit 1",array($valor));
          if($query3->num_rows()>0){
                  $row = $query3->row();
            $mes= $row->mes;
            $anio= $row->anio;
          }else{
                 $mes= 0;
            $anio= 0;
          }
             $parametro[$valor] = array();
                array_push($parametro[$valor],$valor);
                    array_push($parametro[$valor],$nombre);
                                     array_push($parametro[$valor],$mes);
                 array_push($parametro[$valor],$anio);
                array_push($parametro[$valor],$v_deuda);
                 array_push($parametro[$valor],$multa);
                   array_push($parametro[$valor],$fecha_aporte);
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

    function listar_cbocapitulos() { 
        $query = $this->db_bdcolegio->query("select * from capitulo order by codcap asc;");
        if ($query->num_rows() > 0) {
            $this->db_bdcolegio->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    function getDatosPersonales($id) {
        $query = $this->db_bdcolegio->query("select apecol,apematcol,nomcol,lecol,telcol,celcol,emailsec,direcol,regcol from colegiado where regcol= ?", array($id));
        $this->db_bdcolegio->close();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->setApellidop($row->apecol);
            $this->setApellidom($row->apematcol);
            $this->setNombres($row->nomcol);
            $this->setDni($row->lecol);
            $this->setTelefono($row->telcol);
            $this->setCelular($row->celcol);
            $this->setEmail($row->emailsec);
            $this->setDireccion($row->direcol);
            $this->setRegcol($row->regcol);
            return true;
        } else {
            return null;
        }
    }

    function MigracionUsuariosIns($parametros) {
        $query = $this->db->query("call USP_I_MIGRACION_USUARIOS(?,?,?,?,?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function MigracionUsuariosRestantesIns($parametros) {
        
        $query = $this->db->query("call USP_I_MIGRACION_USUARIOS_REST(?,?,?,?,?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

}