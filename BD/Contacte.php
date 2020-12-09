<?php

require_once('DBAbstractModel.php');

class Contacte extends DBAbstractModel {
  private $nom;
  private $cognom1;
  private $cognom2;
  private $telefon;
  private $email;
  
  function __construct() {
    $this->db_name = "agenda";
    //echo "constant " . parent::DBPASS;
    }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->nom . ", " . $this->cognom1 . ", " . $this->cognom2 . ", " .  
      $this->telefon . ", " . $this->email . ")";
  }
  
  function __destruct() {
    unset ($this);
  }
  
  public function select($userEmail="") {
    if ($userEmail!="") {
      $this->query = "SELECT id, firstname, lastname, email, password
                    FROM users
                    WHERE email='$userEmail'";
      $this->get_results_from_query();
    }
    // Any register selected
    if (count($this->rows)==1) {
      foreach ($this->rows[0] as $property => $value)
        $this->$property = $value;
      }
  }
  
  public function insert($userData = array()) {
    
    if (array_key_exists("email", $userData)) {
      $this->select($userData["email"]);
      if ($userData["email"]!= $this->email) {
        foreach ($userData as $property => $value)
          $$property = $value;
        $this->query="INSERT INTO users (firstname, lastname, email, password)
                      VALUES ('$firstname', '$lastname', '$email', '$password')";
        $this->execute_single_query();
      }
      
    }
  }
  
  public function update ($contactData = array()) {
    foreach ($contactData as $property => $value)
      $$property = $value;
    $this->query = "UPDATE users SET firstname='$firstname', lastname= '$lastname',
    password = '$password' WHERE email='$email'";
    $this->execute_single_query($this->query);
  }
  
  public function delete ($contactEmail="") {
    $this->query = "DELETE FROM contactes WHERE email ='$contactEmail'";
    $this->execute_single_query($this->query);
  }
 
    
}

?>