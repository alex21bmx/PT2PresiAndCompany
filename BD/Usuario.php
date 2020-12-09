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
  
  public function select() {
    $this->query = "SELECT id, username, password, tipo_usuario FROM usuarios";
    $this->get_results_from_query();
    foreach ($this->rows[0] as $property => $value)
        $this->$property = $value;
  }
  
  public function insert($userData = array()) {
    
    if (array_key_exists("id", $userData)) {
      $this->select($userData["id"]);
      if ($userData["id"]!= $this->id) {
        foreach ($userData as $property => $value)
          $$property = $value;
        $this->query="INSERT INTO usuarios (id, username, password, tipo_usuario)
                      VALUES ('$id', '$username', '$password', '$tipo_usuario')";
        $this->execute_single_query();
      }
      
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