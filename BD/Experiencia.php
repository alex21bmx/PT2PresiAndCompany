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
        $this->db_name = "a18sergribra_viajes";
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

    public function selectExistsExperienciaByLocalizacionAndIdUsuario($localizacion="", $idUsuario=""){
      $this->query = "SELECT EXISTS (SELECT * FROM usuarios WHERE username='$userName')";
      $this->get_results_from_query();
    }

    public function insert($expData = array()){
      $resultado = $this->selectExistsExperienciaByLocalizacionAndIdUsuario($expData["localizacion"], $expData["id_usuario"]);
      foreach($resultado as $key => $value){
        if ($value==0) {
          $this->query="INSERT INTO usuarios (username, password, tipo_usuario)
            VALUES ('$userName', '$pass', 'usuario')";
          $this->execute_single_query();
          return "ok";
        }else
          return "fail";
      }
    }

}
?>