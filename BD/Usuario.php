<?php

require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel {
  private $id;
  private $username;
  private $password;
  private $tipo_usuario;
  
  function __construct() {
    $this->db_name = "a18sergribra_viajes";
  }

  public function insert($userName="", $pass=""){
    $resultado = $this->selectExistsUserByUserName($userName);
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

  //Hace un select para comprovar que el usuario que intenta registrarse no existe
  public function selectExistsUserByUserName($userName=""){
    if($userName!=""){
      $this->query = "SELECT EXISTS (SELECT * FROM usuarios WHERE username='$userName')";
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

  //Devuelve los datos del usuario especifico para el login
  public function selectUser($userName="", $pass=""){
    if($userName!="" && $pass!=""){
      $this->query = "SELECT * FROM usuarios WHERE username='$userName' AND password='$pass'";
      $this->get_results_from_query();
      return $this->rows[0];
    }
  }

  public function selectIdUser($usuario=""){
    if($usuario!=""){
      $this->query = "SELECT id FROM usuarios WHERE username='$usuario'";
      $this->get_results_from_query();
      return $this->rows[0];
    }

  }

  public function selectUsers(){
    $this->query = "SELECT * FROM usuarios";
    $this->get_results_from_query();
    if(count($this->rows)!=0){
      for($i=0; $i<count($this->rows); $i++){
        $resultSet[] = $this->rows[$i];
      }
    }else
      $resultSet=0;
    return $resultSet;
  }

  //Devuelve el nombre del usuario a partir de su id
  public function selectUserName($idUsuario){
    if($idUsuario!=""){
      $this->query = "SELECT username FROM usuarios WHERE id='$idUsuario'";
      $this->get_results_from_query();
      return $this->rows[0];
    }
  }

  //Devuelve el id del usuario segun su nombre
  public function selectIdUsuarioByUsername($username=""){
    if($username!=""){
      $this->query = "SELECT id FROM usuarios WHERE username='$username'";
      $this->get_results_from_query();
      return $this->rows[0];
    }
  }

  public function update ($id="", $username="",$role="",$password="") {
          $this->query = "UPDATE usuarios SET username= '$username',password= '$password',tipo_usuario= '$role' WHERE id='$id'";
          $this->execute_single_query($this->query);
          return "ok";
  }
  
  public function delete ($userName="") {
          $this->query = "DELETE FROM usuarios WHERE id ='$userName'";
          $this->execute_single_query($this->query);
          return "ok";
        
  }
}

?>