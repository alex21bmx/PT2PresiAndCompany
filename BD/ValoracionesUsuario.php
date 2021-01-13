<?php

require_once('DBAbstractModel.php');

class ValoracionesUsuario extends DBAbstractModel {
  private $id_experiencia;
  private $id_usuario;
  
  function __construct() {
    $this->db_name = "a18sergribra_viajes";
  }

  public function insert($data = array()){
    $idusuario = intval($data["id_usuario"]);
    $idexp = intval($data["id_experiencia"]);
    $this->query="INSERT INTO ValoracionesUsuario ( id_experiencia, id_usuario)
            VALUES ($idexp, $idusuario)";
    $this->execute_single_query();
    return $idusuario."ok".$idexp;
  }

  //Hace un select para comprovar que el usuario que intenta registrarse no existe
  public function selectValoraciones($id_experiencia=""){
    if($id_experiencia!=""){
      $this->query = "SELECT * FROM ValoracionesUsuario WHERE id_experiencia='$id_experiencia'";
      $this->get_results_from_query();
      if(count($this->rows)==0){
          return 0;
      }else{
          return count($this->rows);
      }
    }
  }
  public function selectExistsValoracion($id_experiencia="", $id_usuario=""){
    if($id_experiencia!="" && $id_usuario!=""){
      $this->query = "SELECT EXISTS (SELECT * FROM ValoracionesUsuario WHERE id_experiencia='$id_experiencia' AND id_usuario='$id_usuario')";
      $this->get_results_from_query();
    }
    
    return $this->rows[0];

  }

  //Comprueva que el usuario existe para el Login
  public function selectExistsUser($userName="", $pass=""){
    if($userName!="" && $pass!=""){
      $this->query = "SELECT EXISTS (SELECT * FROM usuarios WHERE username='$userName' AND password='$pass')";
      $this->get_results_from_query();
    }
    
    return $this->rows[0];

  }
  
  public function update ($userName="", $pass="") {
    if($userName!="" && $pass!=""){
      $resultado = $this->selectExistsUserByUserName($userName);
      foreach($resultado as $key => $value){
        if ($value==1) {
          $this->query = "UPDATE usuarios SET password= '$pass' WHERE username='$userName'";
          $this->execute_single_query($this->query);
          return "ok";
        }else return "fail";
      }
    }
  }
  
  public function delete ($id_exp="", $id_user="") {
    $this->query = "DELETE FROM ValoracionesUsuario WHERE id_experiencia ='$id_exp' AND id_usuario ='$id_user'";
    $this->execute_single_query($this->query);
    return "ok"; 
  }
}

?>