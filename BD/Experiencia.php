<?php

require_once('DBAbstractModel.php');

class Experiencia extends DBAbstractModel {
    private $id_experiencia;
    private $fecha_de_publicacion;
    private $texto;
    private $imagen;
    private $coordenadas;
    private $categoria;
    private $valoraciones_positivas;
    private $valoraciones_negativas;
    private $estado;
    private $id_usuario;

    function __construct() {
        $this->db_name = "viajes";
    }

    public function select() {
        $this->query = "SELECT * FROM experiencias";
        $this->get_results_from_query();
        for($i=0; $i<count($this->rows); $i++){
          $resultSet[] = $this->rows[$i];
        }

        return $resultSet;
    }

    public function selectExperienciasPrincipales(){
        $this->query = "SELECT localizacion, imagen, id_usuario, fecha_de_publicacion FROM experiencias";
        $this->get_results_from_query();
        for($i=0; $i<count($this->rows); $i++){
          $resultSet[] = $this->rows[$i];
        }

        return $resultSet;
    }

}
?>