<?php

require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel {
  private $id;
  private $username;
  private $password;
  private $tipo_usuario;
  
  function __construct() {
    $this->db_name = "viajes";
  }

  public function insert($userName="", $pass=""){
    $resultado = $this->selectExistsUserByUserName($userName);
    foreach($resultado as $key => $value){
      if ($value==0) {
        $this->query="INSERT INTO usuarios (username, password, tipo_usuario)
          VALUES ('$userName', '$pass', 'usuario')";
        $this->execute_single_query();
      }else
        echo "<script>alert('Este usuario ya existe');
        window.location.href='../index.php'</script>";
    }
  }



  
  function __toString() {
    return "(" . $this->id . ", " . $this->username . ", " . $this->password . ", " . $this->tipo_usuario . ")";
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

  //Devuelve el nombre del usuario a partir de su id
  public function selectUserName($idUsuario){
    if($idUsuario!=""){
      $this->query = "SELECT username FROM usuarios WHERE id='$idUsuario'";
      $this->get_results_from_query();
      return $this->rows[0];
    }
  }
  
  public function update ($edituser = array()) {
    //$tipo_usuario = new tipo_usuario(tipo_usuario::$userData["tipo_usuario"]);
    foreach ($editUser as $property => $value)
      $$property = $value;
    $this->query = "UPDATE usuarios SET username='$username', password= '$password', tipo_usuario = '$tipo_usuario' WHERE id='$id'";
    $this->execute_single_query($this->query);
  }
  
  public function delete ($id="") {
    $this->query = "DELETE FROM usuarios WHERE id ='$id'";
    $this->execute_single_query($this->query);
  }
 
    
}

?>