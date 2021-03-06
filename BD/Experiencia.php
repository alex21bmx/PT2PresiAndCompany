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

    public function select($position="",$usuario="",$likes="",$categoria="") {
        if($usuario=="null" && $categoria=="null"){
          $where = " ";
        }else if($usuario!="null" && $categoria!="null"){
          $where = "AND experiencias.categoria='".$categoria."' AND usuarios.username='".$usuario."'";
        }else if($usuario!="null" && $categoria=="null"){
          $where = "AND usuarios.username='".$usuario."'";
        }else if($usuario=="null" && $categoria!="null"){
          $where = "AND experiencias.categoria='".$categoria."'";
        }

        if($likes=="null"){
          $order = " ";
        }else if($likes=="MENOS"){
          $order = "ORDER BY valoraciones asc";
        }else{
          $order = "ORDER BY valoraciones desc";
        }
        
        $origen = $position - 8;
        $this->query = "SELECT usuarios.*,experiencias.* , count(ValoracionesUsuario.id_experiencia) as valoraciones FROM `experiencias` LEFT JOIN ValoracionesUsuario ON experiencias.id_experiencia = ValoracionesUsuario.id_experiencia JOIN usuarios ON experiencias.id_usuario=usuarios.id WHERE experiencias.estado='Publicada' ".$where." GROUP BY experiencias.id_experiencia ".$order." limit 8 offset $origen";
        error_log("SELECT usuarios.*,experiencias.* , count(ValoracionesUsuario.id_experiencia) as valoraciones FROM `experiencias` LEFT JOIN ValoracionesUsuario ON experiencias.id_experiencia = ValoracionesUsuario.id_experiencia JOIN usuarios ON experiencias.id_usuario=usuarios.id WHERE experiencias.estado='Publicada' ".$where." GROUP BY experiencias.id_experiencia ".$order." limit 8 offset $origen");
        $this->get_results_from_query();
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

    public function selectExperienciasAdmin(){
      $this->query = "SELECT * FROM experiencias";
      $this->get_results_from_query();
      if(count($this->rows)!=0){
        for($i=0; $i<count($this->rows); $i++){
          $resultSet[] = $this->rows[$i];
        }
      }else
        $resultSet=0;
      return $resultSet;
    }

    public function selectExperienciasReportadas(){
      $this->query = "SELECT * FROM experiencias WHERE reportado='1' order by fecha_de_publicacion asc";
      $this->get_results_from_query();
      if(count($this->rows)!=0){
        for($i=0; $i<count($this->rows); $i++){
          $resultSet[] = $this->rows[$i];
        }
      }else
        $resultSet=0;

      return $resultSet;
    }

    public function selectExperienciasByUser($idUsuario=""){
      if($idUsuario!=""){
        $this->query = "SELECT * FROM experiencias WHERE id_usuario='$idUsuario'";
        $this->get_results_from_query();
        if(count($this->rows)!=0){
          for($i=0; $i<count($this->rows); $i++){
            $resultSet[] = $this->rows[$i];
          }
        }else
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
      $id_experiencia = $expData["id_experiencia"];
      $texto = $expData["texto"];
      $imagen = $expData["imagen"];
      $categoria = $expData["categoria"];
      $latitud = $expData["latitud"];
      $longitud = $expData["longitud"];
      $localizacion = $expData["localizacion"];
      $this->query = "UPDATE experiencias SET texto= '$texto', imagen= '$imagen', categoria= '$categoria', latitud= '$latitud', longitud= '$longitud', localizacion= '$localizacion' WHERE id_experiencia='$id_experiencia'";
      $this->execute_single_query($this->query);
      return "ok";
    }

    public function updateReporte($idExperiencia=""){
      if($idExperiencia!=""){
        $this->query = "UPDATE experiencias SET reportado='0' WHERE id_experiencia='$idExperiencia'";
        $this->execute_single_query($this->query);
        return "ok";
      }else
        return "fail";

    }

    public function updateReporteAdd($idExperiencia=""){
      if($idExperiencia!=""){
        $this->query = "UPDATE experiencias SET reportado='1' WHERE id_experiencia='$idExperiencia'";
        $this->execute_single_query($this->query);
        return "ok";
      }else
        return "fail";

    }
    
    public function delete ($idExperiencia="") {
      if($idExperiencia!=""){
            $this->query = "DELETE FROM experiencias WHERE id_experiencia ='$idExperiencia'";
            $this->execute_single_query($this->query);
            return "ok";
      }
    }
  }
?>