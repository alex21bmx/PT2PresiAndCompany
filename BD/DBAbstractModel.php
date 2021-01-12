
<?php

//INSERT INTO `experiencias` VALUES (2, 'esto es un texto', 'src/foto3.jpg', 'familiar', 0.000000, 0.000000, 0, 0, 'publicada', 2, '2021-01-12', 'Burgos', 0);

abstract class DBAbstractModel {
 
  private static $db_host = "labs.iam.cat";
  private static $db_user = "a18sergribra_u";
  private static $db_pass = "Ausias12*";

  protected $db_name;

  protected $query;

  protected $rows=array();

  private $conn;

  private function open_connection() {
    $this->conn = new mysqli (self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
  }
  
  private function close_connection(){
    $this->conn->close();
  }
  
  protected function execute_single_query(){
    $this->open_connection();
    $this->conn->query($this->query);
    $this->close_connection();
  }
  
  protected function get_results_from_query () {
    $this->open_connection();
    $result = $this->conn->query($this->query);
    for ($i=0;$i<$result->num_rows;$i++)
      $this->rows[$i]=$result->fetch_assoc();
    $result->close();
    $this->close_connection();
  }



}

?>