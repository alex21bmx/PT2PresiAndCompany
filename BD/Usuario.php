<?php

require_once('DBAbstractModel.php');
//require_once('enums/tipo_usuario.php');

class Usuario extends DBAbstractModel {
  private $id;
  private $username;
  private $password;
  private $tipo_usuario;
  
  function __construct() {
    $this->db_name = "viajes";
    }
  
  function __toString() {
    return "(" . $this->id . ", " . $this->username . ", " . $this->password . ", " . $this->tipo_usuario . ")";
  }
  
  /*function __destruct() {
    unset ($this);
  }*/
  
  //FUNCIONA EL SELECT GENERAL
  public function select() {
    $this->query = "SELECT * FROM usuarios";
    $this->get_results_from_query();
    for($i=0; $i<count($this->rows); $i++){
      $resultSet[] = $this->rows[$i];
    }

    print_r($resultSet);

    /*foreach($resultSet as $property => $value){
      echo $value["username"] . "<br>";
    }*/
  }

  //FUNCIONA EL SELECT PARA EL LOGIN
  public function selectExistsUser($userName="", $pass=""){
    if($userName!="" && $pass!=""){
      $this->query = "SELECT EXISTS (SELECT * FROM usuarios WHERE username='$userName' AND password='$pass')";
      $this->get_results_from_query();
    }
    
    return $this->rows[0];

  }

  public function selectUser($userName="", $pass=""){
    if($userName!="" && $pass!=""){
      $this->query = "SELECT * FROM usuarios WHERE username='$userName' AND password='$pass'";
      $this->get_results_from_query();

      return $this->rows[0];
    }
  }
  
  //FUNCIONA PERO EL INSERT VA UN POCO RARO CUANDO LOS NOMBRES COINCIDEN
  public function insert($userData = array()) {
    if (array_key_exists("username", $userData)) {
      $this->select($userData["username"]);
      echo $userData["username"];
      echo $this->username;
      if ($userData["username"]!= $this->username) {
        foreach ($userData as $property => $value)
          $$property = $value;
        $this->query="INSERT INTO usuarios (username, password, tipo_usuario)
                      VALUES ('$username', '$password', '$tipo_usuario')";
        $this->execute_single_query();
      }else
        echo "Este usuario ya ha sido introducido"; 
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