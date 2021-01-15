<?php

require_once('DBAbstractModel.php');

class Experiencia extends DBAbstractModel {
    private $id_experiencia;
    private $fecha_de_publicacion;
    private $texto;
    private $imagen;
    private $longitud;
    private $latitud;
    private $categoria;
    private $valoraciones_positivas;
    private $valoraciones_negativas;
    private $estado;
    private $id_usuario;

    function __construct() {
        $this->db_name = "a18sergribra_viajes";
    }

    public function select($position="") {
        
        $origen = $position - 8;
        $this->query = "SELECT usuarios.*,experiencias.* , count(ValoracionesUsuario.id_experiencia) as valoraciones FROM `experiencias` LEFT JOIN ValoracionesUsuario ON experiencias.id_experiencia = ValoracionesUsuario.id_experiencia JOIN usuarios ON experiencias.id_usuario=usuarios.id WHERE experiencias.estado='Publicada' GROUP BY experiencias.id_experiencia limit 8 offset $origen";
        $this->get_results_from_query();
        error_log("entroXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
        if(count($this->rows)!=0){
          for($i=0; $i<count($this->rows); $i++){
            error_log("volta");
            $resultSet[] = $this->rows[$i];
          }
        }else{
          $resultSet=0;
        }

        return $resultSet;
    }

    public function selectExperienciasPrincipales(){
        $this->query = "SELECT localizacion, imagen, id_usuario, fecha_de_publicacion FROM experiencias LIMIT 10";
        $this->get_results_from_query();
        for($i=0; $i<count($this->rows); $i++){
          $resultSet[] = $this->rows[$i];
        }

        return $resultSet;
    }

    public function selectExistsExperiencia($array = array()){
      $texto = $array["texto"];
      $imagen = $array["imagen"];
      $categoria = $array["categoria"];
      $latitud = $array["latitud"];
      $longitud = $array["longitud"];
      $id_usuario = $array["idUsuario"];
      $localizacion = $array["localizacion"];

      $this->query = "SELECT EXISTS (SELECT * FROM experiencias WHERE localizacion='$localizacion' AND id_usuario='$id_usuario' AND texto='$texto' AND imagen='$imagen' AND categoria='$categoria' AND longitud='$longitud' AND latitud='$latitud')";
      $this->get_results_from_query();

      return $this->rows[0];
    }

    public function insert($expData = array()){
      $resultado = $this->selectExistsExperiencia($expData);
      foreach($resultado as $key => $value){
        if ($value==0) {
          $texto = $expData["texto"];
          $imagen = $expData["imagen"];
          $categoria = $expData["categoria"];
          $latitud = $expData["latitud"];
          $longitud = $expData["longitud"];
          $estado = $expData["estado"];
          $id_usuario = $expData["idUsuario"];
          $localizacion = $expData["localizacion"];

          $this->query="INSERT INTO experiencias (texto, imagen, categoria, latitud, longitud, estado, id_usuario, fecha_de_publicacion, localizacion, reportado)
            VALUES ('$texto', '$imagen', '$categoria', '$latitud', '$longitud', '$estado', '$id_usuario', CURRENT_TIMESTAMP(), '$localizacion', '0')";
          $this->execute_single_query();
          
          return "ok";
        }else return "fail";
      }
    }

    public function selectExistsExperienciaByIdAndUsuario($idExp="", $idUsu=""){
      if($idExp!="" && $idUsu!=""){
        $this->query = "SELECT EXISTS (SELECT * FROM experiencias WHERE id_experiencia='$idExp' AND id_usuario='$idUsu')";
        $this->get_results_from_query();
      }

      return $this->rows[0];

    }

    public function update ($expData = array()) {
      $resultado = $this->selectExistsExperienciaByIdAndUsuario($expData["id_experiencia"], $expData["id_usuario"]);
      foreach($resultado as $key => $value){
        if ($value==1) {
          $id_experiencia = $expData["id_experiencia"];
          $id_usuario = $expData["id_usuario"];
          $texto = $expData["texto"];
          $imagen = $expData["imagen"];
          $categoria = $expData["categoria"];
          $latitud = $expData["latitud"];
          $longitud = $expData["longitud"];
          $localizacion = $expData["localizacion"];
          $this->query = "UPDATE experiencias SET texto= '$texto', imagen= '$imagen', categoria= '$categoria', latitud= '$latitud', longitud= '$longitud', localizacion= '$localizacion' WHERE id_experiencia='$id_experiencia' AND id_usuario='$id_usuario'";
          $this->execute_single_query($this->query);
          return "ok";
        }else return "fail";
      }
    }
    
    public function delete ($idExperiencia="", $idUsuario="") {
      if($idExperiencia!="" && $idUsuario!=""){
        $resultado = $this->selectExistsExperienciaByIdAndUsuario($idExperiencia);
        foreach($resultado as $key => $value){
          if ($value==1) {
            $this->query = "DELETE FROM experiencias WHERE id_experiencia ='$idExperiencia'";
            $this->execute_single_query($this->query);
            return "ok";
          }else return "fail";
        }
      }
    }
  }
?>